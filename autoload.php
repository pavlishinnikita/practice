<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 16.06.2017
 * Time: 10:09
 */
function __autoload($className){
    $classPieces = explode('\\',$className);
    switch ($classPieces[0]){
        //case 'controllers':
        //  require_once __DIR__.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR,$classPieces).'.php';
        // break;
        default:
            require_once __DIR__.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR,$classPieces).'.php';
            break;
    }
}
?>