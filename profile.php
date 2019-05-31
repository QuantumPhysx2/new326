<?php
// Look in 'register.php'
// Basically inverting the logic of whether there the user has logged in or not
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__."../../../lib/views/templates/head.php"; ?>
        <title>My Profile | PC Buy Here</title>
    </head>

    <body>
        <header>
            <?php include __DIR__."../../../lib/views/templates/header.php"; ?>
        </header>

        <main></main>

        <footer></footer>
    </body>
</html>