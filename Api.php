<?php
require "DBmanager.php";

$con = new DBmanager();
$response['success'] = false;

if(isset($_REQUEST["option"])){
    $response['success'] = true;
    //  Insert, Create, Update & Delete
    switch($_REQUEST["option"]){
        case 'list';
            $res = $con->search("users", "1");
            if($res){
                $response['success'] = true;
                $response['users'] = $res;
            }
        break;
        case 'create';
            $name = $_POST['name'];
            $email = $_POST['email'];
            $image = $_FILES['image']['name'];

            $target_dir = "img/";
            $target_file = $target_dir.basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

            $data = "'".$name."', '".$email."', '".$image."'";

            $res = $con->insert("users", $data);
            if($res){
                $response['success'] = true;
            }
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