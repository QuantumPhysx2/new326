<div class="navigation">
    <div class="jumbo-1">
        <a class="home" href="index.php"><img src="assets/images/page-logo.png" alt="PC Buy Here"></a>
    </div>
    <div class="jumbo-2">
        <!-- Refer to: https://www.w3schools.com/icons/fontawesome_icons_webapp.asp -->
        <a class="nav-child" id="<?php echo (basename($_SERVER["PHP_SELF"]) == "marketplace.php" ? "active" : ""); ?>" href="marketplace.php"><i class="fa fa-cart-plus" title="Marketplace"></i></a>
        <a class="nav-child" href="#"><i class="fa fa-bell-o" title="Icon 2"></i></a>
        <a class="nav-child" href="#"><i class="fa fa-bell-o" title="Icon 3"></i></a>
        <a class="nav-child" id="<?php echo (basename($_SERVER["PHP_SELF"]) == "contact.php" ? "active" : ""); ?>" href="#"><i class="fa fa-phone" title="Contact"></i></a>
        <a class="nav-child" id="<?php echo (basename($_SERVER["PHP_SELF"]) == "welcome.php" ? "active" : ""); ?>" href="profile.php"><i class="fa fa-gears" title="My Profile"></i></a>
        <?php if (basename($_SERVER["PHP_SELF"]) == "register.php"): ?>
            <a class="nav-child" id="<?php echo (basename($_SERVER["PHP_SELF"]) == "register.php" ? "active" : ""); ?>" href="login.php"><i class="fa fa-user" title="Login"></i></a>
        <?php else: ?>
            <a class="nav-child" id="<?php echo (basename($_SERVER["PHP_SELF"]) == "login.php" ? "active" : ""); ?>" href="login.php"><i class="fa fa-user" title="Login"></i></a>
        <?php endif; ?>
    </div>
    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <div class="jumbo-3">
            <a href="logout.php" id="logout">Logout</a>
        </div>
    <?php endif; ?>
</div>