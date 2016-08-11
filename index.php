<?php session_start(); ?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" href="assets/css/style.css" />

    </head>

    <body>
        <?php
            if($_SESSION["login"] == 1){
                echo "You are logged in </br><a href='user_site.php'>My Site</a> </br>";
                echo "<form method='post' action='user_site.php'>
                    <input type='submit' value='My Site' name='submit' />
                </form></br>";

            }
        ?>
        <a href="login.php">Login</a>
        </br>
        <a href="register.php">Register user</a>

        </br>
        </br>

        <input type="button" value="logout" onclick="_send_data.log_out();" />

        <script src='assets/js/jquery.js'></script>
        <script src='assets/js/main.js'></script>
    </body>
</html>
