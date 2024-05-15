<?php
require "DBmanager.php";

$con = new DBmanager();
$response['success'] = false;

if(isset($_REQUEST["option"])){
    $response['success'] = true;
    //  Insert, Create, Update & Delete
    switch($_REQUEST["option"]){
        case 'list';
            $response['success'] = true;
        break;
        case 'create';
            $response['success'] = true;
        break;
        case 'update';
            $response['success'] = true;
        break;
        case 'delete';
            $response['success'] = true;
        break;
    }
}

$con = null;
die(json_encode($response))


?>