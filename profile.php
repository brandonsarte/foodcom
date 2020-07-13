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
    $pwd = $_SESSION['password'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/food.css">

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
                <li><a href="meal_rand.php"><strong class="glyphicon glyphicon-cutlery"> RandomRecipe</strong></a></li>
                <!--
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo"$user";?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <hr class="container">
        <h1 style="text-align: center;">Edit Profile</h1>
        <div>
            <div class="row">
                
                <!-- edit form column -->
                
                <div class="col-md-8 col-md-offset-2 personal-info">

                    <!--
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-coffee"></i>
                        This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    -->
                    <h3>Personal info</h3>
                    
                    <form class="form-horizontal" role="form" action="update.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo"$name";?>" name="nname" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo"$email";?>" name="nmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                            <input class="form-control" type="text" value="<?php echo"$user";?>" name="nuser">
                            </div>
                        </div>
                        <?php
                        if(!$_SESSION['google']){
                        echo
                        '<div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                            <input class="form-control" type="password" name="pass1" id ="pass1" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                            <input class="form-control" type="password" name="pass2" id="pass2" placeholder="Confirm Password" required>
                            </div>
                        </div>';
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes" name="submit">
                            <input type="reset" class="btn btn-default" value="Cancel">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" style="float: right">Delete Account</button>
            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <hr>
</body>

        <!-- Modal -->
        <form method="post" action="delete.php">
            <div id="delete" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <?php
                                if(!$_SESSION['google']){
                                    echo '<h4 class="modal-title">Please type your password to confirm account deletion<h4>';
                                }
                                else{
                                    echo '<h4 class="modal-title align-center">WARNING<h4>';
                                }
                            
                            ?>
                        </div>
                        <div class="modal-body">
                        <?php
                            //code if user didn't use a google account to login
                            if(!$_SESSION['google']){
                                echo
                                '<div class="form-group">
                                    <label for="pwd1">Password</label>
                                    <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd2">Confirm Password</label>
                                    <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Enter Password" required>
                                </div>';
                            }
                            else{
                                echo'
                                <div class="form-group" style="text-align:center; font-size: 20px;">Do you want to delete your account?</div>';
                            }
                        ?>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

</html>

