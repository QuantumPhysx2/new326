<?php
// --- Section done by Gia ---
require __DIR__."../../../lib/utils/config.php";

// Initialize variables to empty
$email = $password = $confirmPassword = "";
$emailErr = $passwordErr = $confirmPasswordErr = "";
$error = "";

// Declare boolean for incorrect registration entered
$LoggedIn = false;

// If User has a stored Cookie session...
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // ...Automatically redirect user to assigned page if already logged in
    header("location: welcome.php");
    // ...Terminate this block scope
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if Email is empty...
    if (empty(trim($_POST["email"]))) {
        // ...Return an error
        // This should not occur due to the 'required' constraint in the form 
        $emailErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Please enter an Email</p>";
    } else {
        // ...Save to database
        $email = trim($_POST["email"]);
    }

    // Check if Password is empty...
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Please enter a Password</p>";
    } else {
        $password = trim($_POST["password"]);
    }

    // If there is no error with Email or Password...
    if (empty($emailErr) && empty($passwordErr)) {
        // ...Prepare our query into the database where the Email matches an Email from the database
        $query = "SELECT *
                  FROM customers
                  WHERE email=:email";
        $stmt = $conn->prepare($query);
        
        if ($stmt) {
            // Use same bindParam logic where we use Placeholders (:) and tell PDO to identify them as a formatted string (PDO::PARAM_STR)
            $stmt->bindParam(":email", $paramEmail, PDO::PARAM_STR);
            // Eliminate whitespace characters from the input
            $paramEmail = trim($_POST["email"]);

            // Attempt to execute the Statement...
            // Use the object operator (->) to assign $stmt with the function execute()
            if ($stmt->execute()) {
                // ...If there is a matching Username...
                if ($stmt->rowCount() == 1) {
                    // ...Check if the associated column values match the user input
                    // Use fetch() instead of fetchall() to return only one record
                    if ($row = $stmt->fetch()) {
                        // ...Associate the appropriate columns with the provided inputs
                        $id = $row["customerID"];
                        $firstname = $row["firstName"];
                        $email = $row["email"];
                        $hashedPassword = $row["password"];
                        
                        // If the password_verify() function returns true...
                        // Call the password_verify() function giving the string as hash as parameters
                        if (password_verify($password, $hashedPassword)) {
                            // ...create a new session if successful
                            session_start();
                            
                            // ...store session credentials and place them into variables to be passed-by-values
                            $_SESSION["loggedin"] = true;
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION["customerID"] = $id;
                            $_SESSION["email"] = $email;

                            // Set the state to identify whether we log in correctly or not (used to display the error handlers)
                            $LoggedIn = true;
                            
                            // ...redirect to assigned page
                            header("location: welcome.php");
                        } else {
                            // Should only occur if the password is incorrect
                            $passwordErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Password is incorrect. Please try again</p>";
                        }
                    } else {
                        // !!! NOTE: Will change this to be more broad in future. For now, I'm leaving it as is just to identify future errors !!!
                        $emailErr = "<p class='errorMessage'>[PHP] ".__LINE__.": Email is incorrect. Please try again</p>";
                    }
                } else {
                    $error = "<p class='errorMessage'>[PHP] ".__LINE__.": Incorrect email or password. Please try again</p>";
                }
            }
        }
        // Close the Statement
        unset($stmt);
    }
    // Close the PDO connection
    unset($conn);
}
// --- End Gia section ---
?>