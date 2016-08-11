<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" href="assets/css/style.css" />

    </head>

    <body>
        <form id="form">
            <input type="text" id="mail" class="text_field" placeholder="Enter E-Mail"/>
            <input type="password" id="pass" class="text_field" placeholder="Enter password"/>

            <input type="button" value="submit" onclick="_send_data.login_user();" />
        </form>


        <script src='assets/js/jquery.js'></script>
        <script src='assets/js/main.js'></script>
    </body>
</html>
