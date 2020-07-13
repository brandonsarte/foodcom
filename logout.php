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
    require_once("google_conn.php");

    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['token']);
    unset($init);
    session_abort();
    session_destroy();
    header("Location:login.php");
    exit();
?>