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
    include "mysqli_connect.php";

    session_start();

    $user = $_SESSION['username'];

    $delete = "DELETE from basic_info where user_name = '$user'";

    $result = mysqli_query($dbc,$delete);

    $password = $_SESSION['password'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];

    if($password == $pwd1 AND $pwd1 == $pwd2){
        if(mysqli_num_rows($result) == 0){

            phpAlert("Account Deleted!");
            session_destroy();
            redirect("login.php");
            exit();
        }
        else{
            phpAlert("Error: Please Try again!");
            redirect("profile.php");
        }
    }
    else{
        phpAlert("Error: Wrong Password!");
        redirect("profile.php");
    }
?>