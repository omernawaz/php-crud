<?php 

$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');

$password_file_path = getenv('PASSWORD_FILE_PATH');

$db_pass = trim(file_get_contents($password_file_path));

$db_handle = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// $db_handle->exec("
//     CREATE DATABASE 'arbi-feedback'
// ");

$db_handle->exec("
 CREATE TABLE IF NOT EXISTS `arbi-feedback`.`userfeedback` 
 (`id` INT NOT NULL AUTO_INCREMENT , 
 `email` VARCHAR(255) NOT NULL , 
 `name` VARCHAR(255) NOT NULL , 
 `body` TEXT NOT NULL , 
 `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
 PRIMARY KEY (`id`)) 
 ENGINE = InnoDB;
");


    // define("DB_HOST", 'localhost:3306');
    // define("DB_USER", "root");
    // define("DB_PASS", "mysql123");
    // define("DB_NAME", "arbi-feedback");

    // $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // if($conn->connect_error) {
    //     die("Connection Error: " . $conn->connect_error);
    // }

?>
