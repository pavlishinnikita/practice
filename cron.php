<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'Weather');
$link = new PDO('mysql:host='.MYSQL_SERVER.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
$stmt = $link->prepare("DELETE FROM weather WHERE weather.dt NOT BETWEEN :dt AND :dt + INTERVAL 5 DAY");
$dt = date('Y-m-d');
$stmt->bindParam(":dt",$dt);
$stmt->execute();
var_dump($stmt->fetchAll());
?>