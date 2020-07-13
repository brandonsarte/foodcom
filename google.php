<?php
    
    require_once("google_conn.php");
    include "mysqli_connect.php";
    
    
    if(isset($_SESSION['token'])){
        $init -> setAccessToken($_SESSION['token']);
    }

    else if(isset($_GET['code'])){
        $token = $init -> fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['token'] = $token;
    }
    else{
        redirect("login.php");
        die();
    }

    $oAuth= new Google_Service_Oauth2($init);
    $userData = $oAuth->userinfo_v2_me->get();
    //print_r($userData); //used to get the data from google account

    $first = $userData['givenName'];
    $last = $userData['familyName'];

    $_SESSION['google'] = true;
    $_SESSION['email'] = $userData['email'];
    $_SESSION['username'] = $userData['givenName'];
    $_SESSION['name'] = "$first $last";


    $gmail = $_SESSION['email'];
    $name = $_SESSION['name'];
    $uname = $_SESSION['username'];
    

    $query = "SELECT * from basic_info where email = '$gmail'";
    
    $result = mysqli_query($dbc,$query);
    $data = mysqli_fetch_assoc($result);
    
    //redirects user to homepage if there is already an account created in db
    if($gmail == $data['email']){
        $_SESSION['password'] = $data['password'];
        $_SESSION['username'] = $data['user_name'];
        redirect("home.php");
        die();
    }
    //creates an account in db using gmail credentials
    else{
        $pwd = password_generate(15);
        $_SESSION['password'] =$pwd;
        $input = "INSERT INTO basic_info (name, user_name, password, email) VALUES ('$name','$uname','$pwd','$gmail')";
        mysqli_query($dbc,$input);
        redirect("home.php");
        die();
    }


?>
