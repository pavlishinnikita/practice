<?php
require_once 'autoload.php';


if (isset($_GET['action'])) {
    $a = $_GET['action'];
}else{
    $a = $_GET['action']? : "index"; // тернартый оператор $var = condition ? exp1 : exp2;
}
if(isset($_GET['cont'])){
    $c = ucfirst($_GET['cont']);
}else{
    $c = ucfirst($_GET['cont']?: "Main");
}

$controller = "controllers\\{$c}Controller";
$controller = new $controller;
$link = '1';
call_user_func(array($controller,$a));
//call_user_func(array($controller, $a),array($link));
?>