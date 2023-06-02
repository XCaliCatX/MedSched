<!DOCTYPE html>
<html>
<?php
include "createdb.php"
?>
    <head>
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <nav>
            <div class = "heading">
                <h4><a class="title" href="home.html">Med-Sched</a></h4>
            </div>
            <ul class = "nav-links">
                <li><a class = "active" href = "home.php">Home</a></li>
                <li><a class = "active" href = "signup.html">Sign Up</a></li>
                <li><a class = "active" href = "login.html">Login</a></li>
            </ul>
        </nav>
        <?php?>
        <div class = "body-text"><img src="images/logo.png" alt="Med-Sched Logo"></div>
        <div class = "container-flexbox">
        <div class = "body-text">
            <input type="button" class="button" onclick="location.href='signup.html';" value="Sign Up" />
        </div>
        
    </body>
</html>