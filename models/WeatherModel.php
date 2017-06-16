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
    private $cityName;

    public function getCity(){
        return $this->cityName;
    }
    public function setCity($c)
    {
        $this->cityName = $c;
    }
}