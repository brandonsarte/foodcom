<?php
    require_once("vendor/autoload.php");
    $init = new Google_Client();
    $init->setClientId("969555137157-hmrvpkr9ho0th1u2469r41mgi8v67att.apps.googleusercontent.com");
    $init->setClientSecret("54e2Nr05oJGgycQu4Zu-fWb6");
    $init->setApplicationName("Food Commute");
    $init->setRedirectUri("http://localhost/foodcom/google.php");
    $init->addScope("email");
    $init->addScope("profile");
    
    //creates url to use google api login
    $loginURL = $init->createAuthUrl();
?>