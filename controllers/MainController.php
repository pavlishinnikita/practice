<?php

namespace controllers;
use models\WeatherModel;
use PDO;
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'Weather');
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 15.06.2017
 * Time: 22:55
 *         // соединение больше не нужно, закрываем
            $sth = null;
            $dbh = null;
 */
class MainController
{
//http://api.openweathermap.org/data/2.5/forecast?q=Zaporizhzhya&units=Metric&appid=7849d93ecbddf37f0fb21a586fedec15 // для цельсия. Менять для других нужно units
    private $WEATHER_API_KEY = "7849d93ecbddf37f0fb21a586fedec15";
    //$res =  file("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['city']."&appid=".$WEATHER_API_KEY); // не уверен в адекватности способа // &mode=html добавить для получения картинки
//echo $res->name . "<br>" . $res->coord->lat; // for test
//return $res;
    public static function connect()
    {
        $link = new PDO('mysql:host='.MYSQL_SERVER.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
        //$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        //or die("Error: ".mysqli_error($link));
        /*if(!mysqli_set_charset($link, "utf8")){
            printf("Error: ".mysqli_error($link));
        }*/
        $db = $link;
        return $link;
    }
    public function index()
    {
        //readfile('views/main.php'); // я хз, надеюсь это адекватно
        include 'views/main.php'; // я хз, надеюсь это адекватно
    }
    public function weather()
    {
        $link = self::connect();
        // здесь мы каким-то образом используем соединение
        $sth = $link->query('SELECT * FROM test');
        foreach ($sth as $row) {
            print $row['id'] . "\t";
            print $row['name'] . "\t";
        }
        $model = new WeatherModel();
        $request_arr = json_decode(file_get_contents('testForcast.json'));
        $model->setCity($request_arr->city->name);
        echo "<br>";
        foreach ($request_arr->list as $item){
            print_r($item->main);
            echo "<br>";
        }
        //print_r($request_arr->list[0]->main);
        //print_r($request_arr->weather);
        include 'views/weather.php';
    }

    public function map()
    {
        include "views/map.php";
    }
}