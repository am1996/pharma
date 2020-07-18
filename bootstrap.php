<?php
// Load our autoloader
use Models\UsersModel;
$vendor_autoload = require_once __DIR__.'/vendor/autoload.php';
session_start();
if( !empty($_COOKIE["token"]) && empty($_SESSION["token"]) ){
    $model = new UsersModel();
    $user = $model->getUserByToken($_COOKIE["token"]);
    $_SESSION["token"] = $user["token"];
    $_SESSION["user_id"] = $user["id"];
}

?>