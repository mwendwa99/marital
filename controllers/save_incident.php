<?php

$name = $_POST['name'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];
$case_description = $_POST['message'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$category = $_POST['category'];
$case_date = date("Y-m-d h:i:sa");

// get the incident details and save it to the database
$query = "INSERT INTO `cases`
                        ( `reportername`,
                        `user_id`, 
                        `case_date`,
                        `case_description`,
                        `abuse_category`,
                        `email`,
                        `phone`,
                        `address`)
                        VALUES ('$name',
                        '$user_id',
                        CURRENT_TIME(),
                        '$case_description',
                        '$category',
                        '$email',
                        '$phone',
                        '$address')";

include('connect.php');

// handle connection error
if (!$connection->query($query)) {
  echo ("Error description: " . $connection->error);
}

$connection->close();

echo "OK";
