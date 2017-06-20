<?php

namespace controllers;
use models\WeatherModel;
use models\WindModel;
use PDO;
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'Weather');
class MainController
{
    private $WEATHER_API_KEY = "7849d93ecbddf37f0fb21a586fedec15";
    public static function connect()
    {
        $link = new PDO('mysql:host='.MYSQL_SERVER.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        return $link;
    }
    public function index()
    {
        //readfile('views/main.php'); // я хз, надеюсь это адекватно
        include 'views/main.php'; // я хз, надеюсь это адекватно
    }
    private $model,$lat,$lon;
    private function getDateFromTimeStamp($d){
        $date = new \DateTime();
        $date->setTimestamp($d);
        return $date->format('Y-m-d');
    }
    public function weather()
    {
        $city = $_POST['city'];
        $date = $_POST['date'];
        $deg = $_POST['userDeg'];
        $link = self::connect();
        $stmt = $link->prepare("SELECT main,description,icon,country,city,rain,clouds,deg,speed,dt,pressure,humidity,min_temp,max_temp,lat,lon FROM weather WHERE weather.city=:city AND weather.dt BETWEEN :dt AND :dt + INTERVAL 5 DAY ");
        $stmt->bindParam(":city",$city);
        $stmt->bindParam(":dt",$date);
        $stmt->execute();
        $megaReq = $stmt->fetchAll();
        if($megaReq!=null){
            $this->model = (object)$megaReq;
            $this->lon = $megaReq[0]['lon'];
            $this->lat = $megaReq[0]['lat'];
            // отдаем виду данные + говорим, что они из
        }else {
            $str = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city."&mode=json&units=".$deg."&appid=".$this->WEATHER_API_KEY."&cnt=5");
            $request_arr = json_decode($str);
            $this->lon = $request_arr->city->coord->lon;
            $this->lat = $request_arr->city->coord->lat;
            for ($i = 0; $i < 5; $i++) {
                $m = new WeatherModel();
                $m->city = $request_arr->city->name;
                $m->lon=$request_arr->city->coord->lon;
                $m->lat=$request_arr->city->coord->lat;
                $m->country = $request_arr->city->country;
                $m->main = $request_arr->list[$i]->weather[0]->main;
                $m->description = $request_arr->list[$i]->weather[0]->description;
                $m->icon = $request_arr->list[$i]->weather[0]->icon;
                $m->dt = $this->getDateFromTimeStamp($request_arr->list[$i]->dt);
                $m->deg = $request_arr->list[$i]->deg;
                $m->speed = $request_arr->list[$i]->speed;
                $m->clouds = $request_arr->list[$i]->clouds;
                $m->pressure = $request_arr->list[$i]->pressure;
                $m->humidity = $request_arr->list[$i]->humidity;
                $m->rain = $request_arr->list[$i]->rain;
                $m->min_temp = $request_arr->list[$i]->temp->min;
                $m->max_temp = $request_arr->list[$i]->temp->max;
                if ($m->save($link))
                    $this->model[] = $m;
            }
        }
        include 'views/weather.php';
    }
}