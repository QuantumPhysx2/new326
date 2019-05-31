<?php
// Paths
DEFINE("LIB", $_SERVER['DOCUMENT_ROOT']."/../lib");
DEFINE("VIEWS", LIB."/views");
DEFINE("PARTIALS", VIEWS."/partials");
DEFINE("MODELS", LIB."/models");

require __DIR__."../../../lib/controllers/loginScript.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__."../../../lib/views/templates/head.php"; ?>
        <title>Login | PC Buy Here</title>
    </head>

    <body>
        <header>
            <?php include __DIR__."../../../lib/views/templates/header.php"; ?>
        </header>

        <main>
            <div class="container">
                <div class="result">
                    <h1>Login</h1>
                    
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="email" name="email" placeholder="Email" autofocus required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" name="inp_LOGIN" id="login-button">Login</button>
                    </form>
                    
                    <p>Don't have an account? Click <a href="register.php">here</a> to register</p>
                    
                    <?php if (!($LoggedIn)): ?>
                        <?php echo $emailErr; ?>
                        <?php echo $passwordErr; ?>
                        <?php echo $confirmPasswordErr; ?>
                        <?php echo $error; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        
        <footer></footer>
    </body>
</html>