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

    <style>
        @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');




        img {
            max-width: 100%;
            box-sizing: border-box;
        }

        p {
            margin-bottom: 5px;
        }

        h3 {
            margin: 0;
        }

        h5 {
            margin: 10px 0;
        }

        li {
            margin-bottom: 0;
        }

        .meal {
            margin: 20px 0;
        }

        .text-center {
            text-align: center;
        }

        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 25px;
            height: 0;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>

    <header class="wall"></header>


    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand" href="http:/localhost/foodcom/home.php">Food Commute</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li class="active"><a href="meal_rand.php"><strong class="glyphicon glyphicon-cutlery"> RandomRecipe</strong></a></li>
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
        <div class="row text-center">
            <h3>
                Feeling hungry?
            </h3>
            <h5>Get a random meal by clicking below</h5>
            <button class="button-primary" id="get_meal">Get Random Recipe </button>
        </div>
        <div id="meal" class="row meal"></div>
    </div>

</body>

<script> 
    const get_meal_btn = document.getElementById('get_meal');
    const meal_container = document.getElementById('meal');

    get_meal_btn.addEventListener('click', () => {
	fetch('https://www.themealdb.com/api/json/v1/1/random.php')
		.then(res => res.json())
		.then(res => {
			createMeal(res.meals[0]);
		})
		.catch(e => {
			console.warn(e);
		});
    });

    const createMeal = meal => {
        const ingredients = [];

        // Get all ingredients from the object. Up to 20
        for (let i = 1; i <= 20; i++) {
            if (meal[`strIngredient${i}`]) {
                ingredients.push(
                    `${meal[`strIngredient${i}`]} - ${meal[`strMeasure${i}`]}`
                );
            } else {
                // Stop if there are no more ingredients
                break;
            }
        }

        const newInnerHTML = `<br>
            <div class="row">
                <div class="columns five">
                    <div class="text-center"><img src="${meal.strMealThumb}" alt="Meal Image" style="width:150pt ; height:150pt"></div>
                    ${
                        meal.strCategory
                            ? `<p><strong>Category:</strong> ${meal.strCategory}</p>`
                            : ''
                    }
                    ${meal.strArea ? `<p><strong>Area:</strong> ${meal.strArea}</p>` : ''}
                    ${
                        meal.strTags
                            ? `<p><strong>Tags:</strong> ${meal.strTags
                                    .split(',')
                                    .join(', ')}</p>`
                            : ''
                    }
                    <h5>Ingredients:</h5>
                    <ul>
                        ${ingredients.map(ingredient => `<li>${ingredient}</li>`).join('')}
                    </ul>
                </div>
                <div class="columns seven">
                    <h4>${meal.strMeal}</h4>
                    <p>${meal.strInstructions}</p>
                </div>
            </div>
            ${
                meal.strYoutube
                    ? `
            <div class="row">
                <h5>Video Recipe</h5>
                <div class="videoWrapper">
                    <iframe width="420" height="315"
                    src="https://www.youtube.com/embed/${meal.strYoutube.slice(-11)}">
                    </iframe>
                </div>
            </div>`
                    : ''
            }
        `;

        meal_container.innerHTML = newInnerHTML;
    };
</script>
</html>