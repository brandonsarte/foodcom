<?php
/*
Honor Code:
This is my own work and I have not received any unauthorized help in completing this. 
I have not copied from my classmate, friend, nor any unauthorized resource. 
I am well aware of the policies stipulated in the handbook regarding academic dishonesty. 
If proven guilty, I won't be credited any points for this endeavor.

NAME: Brandon John D. Sarte
COURSE: 2-BS Information Technology
Subject: PLATFORM TECHNOLOGIES

*/
session_start();

//function to generate random password
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

//function to redirect page
function redirect($msg){    //php function to use js redirection
    echo '<script> window.location.href="'.$msg .'" </script>';
}

//function alert
function phpAlert($msg) {   //php function to use js alert
    echo '<script type="text/javascript">alert("' . $msg . '");</script>';
}


DEFINE ('DB_USER', 'food_acc');
DEFINE ('DB_PASSWORD', 'Talapang1');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'food_acc');


//connection of php to db
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MYSQL: ' . 
mysqli_connect_error());


?>