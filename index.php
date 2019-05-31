<?php
// If the server request does not receive a HTTPS version of the site...
// if (empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] === "off") {
//     // ...define a variable to request for the HTTPS version (if available) of the website
//     $httpsURL = "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
//     // Set context using HTTP protocol version 1.1 with server response of 301
//     header("HTTP/1.1 301 Moved Permanently");
//     // Redirect the page to the HTTPS version (if available)
//     header("location: ".$httpsURL);
//     // Use exit to terminate this segment
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__."../../../lib/views/templates/head.php"; ?>
        <title>Home | PC Buy Here</title>
    </head>

    <body>
        <header>
            <?php include __DIR__."../../../lib/views/templates/header.php"; ?>
        </header>

        <main>
            <div class="products">
                <a href="marketplace.php">
                    <div class="block cpu">
                        <h1>CPUs</h1>
                    </div>
                </a>

                <a href="marketplace.php">
                    <div class="block gpu">
                        <h1>Graphics Cards</h1>
                    </div>
                </a>
                
                <a href="marketplace.php">
                    <div class="block memory">
                        <h1>Memory</h1>
                    </div>
                </a>
            </div>
        </main>

        <footer></footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    </body>
</html>