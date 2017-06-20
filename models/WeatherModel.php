<?php

/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 16.06.2017
 * Time: 11:05
 */
namespace models;
class WeatherModel
{
    public $city, $main, $description, $icon, $dt, $country,$deg,$speed,$rain,$clouds,$pressure, $humidity, $min_temp,$max_temp,
    $lat, $lon;
    public function save($l){
        //----------------------------//
        $stmt = $l->prepare("INSERT INTO weather(main, description, icon, country, city, rain, clouds, deg, speed, dt, pressure, humidity,min_temp,max_temp,lat,lon)
                             VALUES (:main, :description, :icon, :country,:city, :rain, :clouds, :deg, :speed, :dt, :pressure, :humidity, :min_temp, :max_temp, :lat, :lon)");
        $stmt->bindParam(':main', $this->main);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':icon', $this->icon);
        $stmt->bindParam(':country', $this->country);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':rain', $this->rain);
        $stmt->bindParam(':clouds', $this->clouds);
        $stmt->bindParam(':deg', $this->deg);
        $stmt->bindParam(':speed', $this->speed);
        $stmt->bindParam(':dt', $this->dt);
        $stmt->bindParam(':pressure', $this->pressure);
        $stmt->bindParam(':humidity', $this->humidity);
        $stmt->bindParam(':min_temp', $this->min_temp);
        $stmt->bindParam(':max_temp', $this->max_temp);
        $stmt->bindParam(':lat', $this->lat);
        $stmt->bindParam(':lon', $this->lon);

        if($stmt->execute())
            return true;
        else
            return false;
    }
        //----------------------------//
}