<?php ?>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

* {
	box-sizing: border-box;
}

body {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 30px 0;
	min-height: calc(100vh - 60px);
}

img {
	max-width: 100%;
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
<div class="container">
	<div class="row text-center">
		<h3>
			Feeling hungry?
		</h3>
		<h5>Get a random meal by clicking below</h5>
		<button class="button-primary" id="get_meal">Get Meal 🍔</button>
	</div>
	<div id="meal" class="row meal"></div>
</div>

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

        const newInnerHTML = `
            <div class="row">
                <div class="columns five">
                    <img src="${meal.strMealThumb}" alt="Meal Image">
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