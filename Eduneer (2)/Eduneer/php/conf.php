<?php



require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$db_connection = getenv('DB_CONNECTION');
$db_host        = getenv('DB_HOST');
$db_database    = getenv('DB_DATABASE');


// echo $db_connection, $db_host, $db_database, $db_username ,$db_password;

$dsn    =  $db_connection . ':host=' . $db_host .  ';dbname=' . $db_database ;
$user   = getenv('DB_USERNAME');
$pass   = getenv('DB_PASSWORD');
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    echo 'Failed To Connect' . $e->getMessage;
}
