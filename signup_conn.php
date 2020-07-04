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
    require_once "mysqli_connect.php";

    $name = $_POST['name2'];
    $uname =$_POST['user2'];
    $pwd = $_POST['pwd2'];
    $email = $_POST['email2'];

    $query = "SELECT * from basic_info where user_name = '$uname'";
    
    $result = mysqli_query($dbc,$query);
    
    if(mysqli_num_rows($result) == 1){
        phpAlert("The Username is already Taken.");
    }
    else{
        $input = "INSERT INTO basic_info (name, user_name, password, email) VALUES ('$name','$uname','$pwd','$email')";
        
        if (mysqli_query($dbc, $input)) {
            phpAlert("Account Created Successfuly!");
            redirect("login.php");
            exit();
          } else {
            phpAlert("Error: Please Try Again");
            redirect("login.php");
            exit();
          }
    }
    
?>