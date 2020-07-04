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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodcom Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="css/food.css">
</head>

<body>
    
    <header></header>

    <h1 class="ltitle ">Food Commute</h1>

    <div class="container">
        <form class="form1" method="post" action="log_conn.php">
            <img src="css/pics/icon.png">

            <div class="form-group">
                <label for="user1">Username</label>
                <input type="text" class="form-control" id="user1" placeholder="Username" name="user1" required>
            </div>
            <div class="form-group">
                <label for="pwd1">Password</label>
                <input type="password" class="form-control" id="pwd1" placeholder="Password" name="pwd1" required>
            </div>
            <div class="form-inline">
                <button type="submit" class="btn btn-danger" name="submit">Login</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#sign">Sign Up</button>
            </div>
            
        </form>

        <!-- Modal -->
        <form method="post" action="signup_conn.php">
            <div id="sign" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sign Up Form</h4>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name2">Full Name</label>
                                <input type="text" class="form-control" id="name2" placeholder="Name" name="name2" required>
                            </div>
                            <div class="form-group">
                                <label for="user2">Username:</label>
                                <input type="text" class="form-control" id="user2" placeholder="Username" name="user2" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd2">Password:</label>
                                <input type="password" class="form-control" id="pwd2" placeholder="Password" name="pwd2" required>
                            </div>
                            <div class="form-group">
                                <label for="email2">E-mail:</label>
                                <input type="email" class="form-control" id="email2" placeholder="Email Address" name="email2" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
            

    </div>



</body>

</html>

<?php



?>