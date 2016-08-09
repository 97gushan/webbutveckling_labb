<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" href="assets/css/style.css" />

    </head>

    <body>
        <?php
            $salt = "";

            for($x = 0; $x < 10; $x++){
                $rand_num = rand(0,26) + 97;
                $salt = $salt . chr($rand_num);
            }


        ?>
        <form id="form">
            <input type="text" id="mail" class="text_field" placeholder="Enter E-Mail"/>
            <input type="password" id="pass" class="text_field" placeholder="Enter password"/>

            <input type="button" value="submit" onclick="_send_data.register_user('<?=$salt?>');" />
        </form>


        <script src='assets/js/jquery.js'></script>
        <script src='assets/js/main.js'></script>
    </body>
</html>
