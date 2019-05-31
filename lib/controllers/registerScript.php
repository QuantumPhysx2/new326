<?php
// --- Section done by Gia ---
// Note: use '../' to navigate one directory UP
require __DIR__."../../../lib/utils/config.php";

// Look in 'login.php' for more detail
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Initialize variables to empty
$firstname = $lastname = $username = $password = $confirmPassword = "";
$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $confirmPasswordErr = "";

// Declare boolean for incorrect registration entered
$error = false;

// If the server receives a POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Firstname validation
    if (empty(trim($_POST["firstname"]))) {
        // This error shouldn't occur due to the 'required' constraint in HTML
        $firstnameErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Please provide your Firstname</p>";
    } else {
        // ...Save firstname input and remove any whitespaces if true
        $firstname = trim($_POST["firstname"]);
    }
    
    // Lastname validation
    if (empty(trim($_POST["lastname"]))) {
        $lastnameErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Please provide your Lastname</p>";
    } else {
        $lastname = trim($_POST["lastname"]);
    }
    
    // If the Username input box is empty...
    if (empty(trim($_POST["email"]))) {
        // ...return an error message
        // Use __LINE__ to get the current line number of the error message
        $usernameErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Missing an email. Please try again</p>";
    } else {
        // ...otherwise if provided, execute following code
        // Set our query
        $query = "SELECT customerID 
                  FROM customers 
                  WHERE email=:email";
        // Prepare the query
        $stmt = $conn->prepare($query);
        
        if ($stmt) {
            // Bind variable to the prepared statement as parameters
            $stmt->bindParam(":email", $paramUsername, PDO::PARAM_STR);
            // Set Username parameter
            $paramUsername = trim($_POST["email"]);

            // Attempt to execute prepared statement
            if ($stmt->execute()) {
                // If there is a matching username in the table...
                if ($stmt->rowCount() == 1) {
                    // ...Return an error
                    // ERROR: Should only occur if the same username is provided
                    $usernameErr = "<p class='errorMessage'>[PHP] ".__LINE__.": That email is taken. Please try again</p>";
                } else {
                    // Strip whitespaces from BEGINNING and END of given input
                    // Set the Username to the given value
                    $username = trim($_POST["email"]);
                }
            } else {
                // Should only occur if there was a connection to database error
                echo "<p class='errorMessage'>[PHP] ".__LINE__.": Login Error: Something went wrong. Please try again</p>";
            }
        }
        // Destroy and reset $stmt variable for re-use in this block scope
        unset($stmt);
    }

    // If the Password input box is empty...
    if (empty(trim($_POST["password"]))) {
        // ...return error message
        $passwordErr = "<p class='errorMessage'>[PHP]".__LINE__.": Missing a Password. Please try again</p>";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        // ...if Password is less than 8 characters long
        $passwordErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Password must be at least 8 characters long. Please try again</p>";
    } else {
        // ...otherwise, set Password to the given input
        $password = trim($_POST["password"]);
    }

    // If the Confirm Password input box is empty...
    if (empty(trim($_POST["confirmpassword"]))) {
        // Shouldn't occur because of 'required' in each input
        $confirmPasswordErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Please re-enter your password</p>";
    } else {
        $confirmPassword = trim($_POST["confirmpassword"]);
        
        // If there is an empty password AND password doesn't match confirmation password...
        if (empty($passwordErr) && ($password != $confirmPassword)) {
            // ...return an error message if passwords do not match each other
            $confirmPasswordErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Passwords did not match. Please try again</p>";
        }
    }

    // If there are no errors found in the inputs...
    if (empty($firstnameErr) && empty($lastnameErr) && empty($usernameErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // Setting up ID randomizer
        $min = 100000;
        $max = 999999;
        // Set variable to become the random value between min and max
        // Note: We use 'random_int()' to generate a cryptographically secure and unpredictable ID
        // Note: Do not lower the range. Doing so will limit the random factor
        $randVal = random_int($min, $max);
        
        // Insert into the database the retrieved details
        // Insert the random value as the 'customerID'. PHPMyAdmin UNIQUE modifier should be set to prevent duplicates
        $query = "INSERT INTO customers (customerID, firstName, lastname, email, password)
                  VALUES ($randVal, :firstname, :lastname, :email, :password)";
        // Re-defining our statement for THIS block scope
        $stmt = $conn->prepare($query);
                
        if ($stmt) {
            // >>> THIS SECTION CONTROLS WHAT YOU CAN APPEND TO THE DATABASE <<<
            // ...bind statement with Username and Password and represent as SQL character
            $stmt->bindParam(":firstname", $paramFirstname, PDO::PARAM_STR);
            $stmt->bindParam(":lastname", $paramLastname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $paramUsername, PDO::PARAM_STR);
            $stmt->bindParam(":password", $paramPassword, PDO::PARAM_STR);
            
            $paramFirstname = $firstname;
            $paramLastname = $lastname;
            // Set Username parameter to given Username input value
            $paramUsername = $username;
            // Set Password parameter to a hashed Password input value using 'PASSWORD_DEFAULT' as our salting algorithm
            $paramPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Attempt to execute prepared statement
            if ($stmt->execute()) {
                // ...Return this file on success
                header("location: register.php");
            } else {
                echo "<p class='errorMessage'>[PHP] ".__LINE__.": Something bizarre happened. Please try again";
            }
        }
        // Reset the statement for re-use in this block scope
        unset($stmt);
    }
    
    // We place the error handler here if all except the block scope above is executed successfully
    $error = True;
    
    // Destroy the connection on fail
    unset($conn);
}

require __DIR__."../../../lib/controllers/recaptcha.php";
// --- End Gia section ---
?>