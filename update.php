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

    $user = $_SESSION['username'];


    if(is_null($_SESSION['username'])){
        session_destroy();
        header("Location:login.php");
    }

    $user = $_SESSION['username'];
    $pwd = $_SESSION['password'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];


    if(isset($_POST['submit']) ){
        $nname = $_POST['nname'];
        $nemail = $_POST['nmail'];
        $nuser = $_POST['nuser'];

        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if($pwd == $pass1 AND $pass1 == $pass2){
            $update = "UPDATE basic_info SET name='$nname', email='$nemail', user_name='$nuser' where user_name='$user' ";
            $result = mysqli_query($dbc,$update);

            $_SESSION['name'] =$nname;
            $_SESSION['email'] =$nemail;
            $_SESSION['username'] =$nuser;
            $_SERVER['password'] =$pwd;

        
            phpAlert("Account Updated!");
            redirect("profile.php");
            die();
        }
        else{
            phpAlert("Wrong Password!");
            redirect("profile.php");
            die();
        }
        
    }
?>