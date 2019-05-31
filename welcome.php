<?php 
// Paths
DEFINE("LIB", $_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("VIEWS", LIB."/views");
DEFINE("PARTIALS", VIEWS."/partials");
DEFINE("MODELS", LIB."/models");

require __DIR__."../../../lib/utils/config.php";

// Reverse the session identification
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    // ...return cheeky user to the login page
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__."../../../lib/views/templates/head.php"; ?>
        <title>Welcome | PC Buy Here</title>
    </head>

    <body>
        <header>
            <?php include __DIR__."../../../lib/views/templates/header.php"; ?>
        </header>

        <main>
            <?php include __DIR__."../../../lib/views/templates/profile.php"; ?>
        </main>

        <footer></footer>
    </body>
</html>