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



    if(isset($_POST['user1'])){
        $uname =$_POST['user1'];
        $pwd = $_POST['pwd1'];

        $query = "SELECT * from basic_info where user_name = '$uname' AND password = '$pwd' ";

        $result = mysqli_query($dbc,$query);


        if(mysqli_num_rows($result) == 1){

            $data = mysqli_fetch_assoc($result);

            //phpAlert($get_name);
            
            $_SESSION['username'] = $uname;
            $_SESSION['password'] = $pwd;
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];

            redirect("home.php");
        }
        else{
            phpAlert("Incorrect Username/Password");
            redirect("login.php");
        }
    }

?>