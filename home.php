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

    if(is_null($_SESSION['username'])){
        session_destroy();
        header("Location:login.php");
        die(); 
    }   

    $user = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodcom Home</title>

    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
   
    <link rel="stylesheet" type="text/css" href="css/food.css">

    <script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body>

    <header class="wall"></header>


    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand" href="http:/localhost/foodcom/home.php">Food Commute</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="meal_rand.php"><strong class="glyphicon glyphicon-cutlery"> RandomRecipe</strong></a></li>
            <!--
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo"$user";?></a></li>
            <li><a href="logout.php" class="g_id_signout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>           
        </ul>
    </div>
</nav>

    <div class="container">
    <div class="well">
        <div class="media">
            <a class="pull-left" href="https://www.yummy.ph/recipe/laing-recipe">
                <img class="media-object" src="https://images.summitmedia-digital.com/yummyph/images/2017/02/16/laing-webex.jpg">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Special Laing</h4>
            <p class="text-right">By SABRINA GO </p>
            <p>Laing is considered to be a staple in most Bicolano homes. 
            This laing recipe is simple-to-follow and uses readily-available ingredients from the grocery. 
            Making it at home is easy and fuss-free! You could adjust the taste accordingly by adding more shrimp paste or chili peppers. 
            Substituting the pork slices with dried fish is also a healthy alternative to this dish.

            Laing is primarily made up of dried taro (gabi) leaves simmered slowly in coconut milk. 
            Remember to cook this dish low and slow so that all the flavors can come together. 
            This dish is typically enjoyed with a serving of rice but puto or toasted bread works, too!
            </p>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                <li>|</li>
                <li>
                <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                </li>
                <li>|</li>
                <li>
                <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                <span><i class="fa fa-facebook-square"></i></span>
                <span><i class="fa fa-twitter-square"></i></span>
                <span><i class="fa fa-google-plus-square"></i></span>
                </li>
                </ul>
        </div>
        </div>
    </div>
    <div class="well">
        <div class="media">
            <a class="pull-left" href="https://www.angsarap.net/2017/09/22/pocherong-bisaya/">
                <img class="media-object" src="https://i0.wp.com/www.angsarap.net/wp-content/uploads/2017/09/Pocherong-Bisaya.jpg?w=1080&ssl=1">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Pocherong Bisaya</h4>
            <p class="text-right">By RAYMUND</p>
            <p>The first time I saw this I was confused, they call it Pochero but it looks like Bulalo but when you taste it then it’s a totally different dish. 
            The subtle differences form both mentioned dishes just gives it an edge in terms of flavour complexity. 
            The lemongrass gives it freshness, the garlic adds more savoury aspect to the dish, 
            the sweet corn and saba bananas give it a bit of sweetness while the bamboo shoots give it an interesting texture.</p>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                <li>|</li>
                <li>
                <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                </li>
                <li>|</li>
                <li>
                <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                <span><i class="fa fa-facebook-square"></i></span>
                <span><i class="fa fa-twitter-square"></i></span>
                <span><i class="fa fa-google-plus-square"></i></span>
                </li>
                </ul>
        </div>
        </div>
    </div>

    <div class="well">
        <div class="media">
            <a class="pull-left" href="https://www.tasteatlas.com/isaw/recipe">
                <img class="media-object" src="https://cdn.tasteatlas.com/Images/Dishes/03375695651946d2a7e7013aa6f2603b.jpg?mw=1300">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Isaw(Grilled Chicken Intestines)</h4>
            <p class="text-right">By N/A</p>
            <p>TIsaw is a popular Filipino street food dish consisting of marinated, boiled, and grilled chicken and pork intestines which are usually coiled and skewered on a stick. Although similar, pork isaw is typically slightly larger and chewier than the chicken version.
                The marinade is usually prepared with soy sauce, oil, ketchup, garlic, and seasonings. Thoroughly cleaning and boiling the intestines before they are placed on a grill is an essential part of the preparation process because it eliminates all food-born pathogens.
                The dish is usually dipped in a vinegar-based sauce that is made with chili peppers and onions (sawsawan). Because it is one of the cheapest Filipino street food meals, the dish is extremely popular, and there are even street stalls called isawan, devoted entirely to the preparation of this specialty.
                Isaw is usually enjoyed as an afternoon snack, and apart from its popularity on the streets, due to its low price, it is also a staple food for numerous university students.
                PHILIPPINES Asia
            </p>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                <li>|</li>
                <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                <li>|</li>
                <li>
                <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                </li>
                <li>|</li>
                <li>
                <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                <span><i class="fa fa-facebook-square"></i></span>
                <span><i class="fa fa-twitter-square"></i></span>
                <span><i class="fa fa-google-plus-square"></i></span>
                </li>
                </ul>
        </div>
        </div>
    </div>

    </div>

</body>


</html>