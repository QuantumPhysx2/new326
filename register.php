<?php
// Paths
DEFINE("LIB", $_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("VIEWS", LIB."/views");
DEFINE("PARTIALS", VIEWS."/partials");
DEFINE("MODELS", LIB."/models");

require __DIR__."../../../lib/controllers/registerScript.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__."../../../lib/views/templates/head.php"; ?>
        <title>Register | PC Buy Here</title>
    </head>

    <body>
        <header>
            <?php include __DIR__."../../../lib/views/templates/header.php"; ?>
        </header>

        <main>
            <div class="container">
                <div class="result">
                    <h1>Register</h1>
                    
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="text" name="firstname" placeholder="Firstname" autofocus required>
                        <input type="text" name="lastname" placeholder="Lastname" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>

                        <?php echo $msg; ?>
                        <div class="g-recaptcha" data-sitekey="6LdVBKUUAAAAAIqDNMCTPMi9qHckDKQS_6nEbYWB"></div>

                        <button type="submit" name="inp_REGISTER" id="register-button">Register</button>
                    </form>
                    
                    <p>Already have an account? Click <a href="login.php">here</a> to login</p>
                    
                    <?php if ($error): ?>
                        <?php echo $usernameErr; ?>
                        <?php echo $passwordErr; ?>
                        <?php echo $confirmPasswordErr; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <footer></footer>

        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>