<?php
/* Database configurations */
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
// $db_pass = '';
$db_database = 'myplan';
$db = new mysqli($db_host, $db_user, $db_pass, $db_database);
$connection = $db;
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
