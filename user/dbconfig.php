<?php

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','myplan');

    try{
        $dbh = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASSWORD);
    }catch(PDOException $e){
        exit("Error".$e->getMessage());
    }
?>