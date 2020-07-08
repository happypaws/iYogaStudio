<?php 
// testing the input from the user, where htmlspecialchars is a string method that does'nt allow to execute html tags inside the form input
// stripcslashes is a string method that deletes \ from the string
//strip_tags is method that deletes the html tags
function test_input($inputField){
    $inputField = htmlspecialchars(stripcslashes(strip_tags($inputField)));
    return $inputField;
}

    if(isset($_POST['register'])){     //this function checks if the user actually came to the signup page 
                                           // by clicking the register-now buttton, rather than going into url and setting the path of the folder 
                                           // this basically checks if the user got to this page legitimally 
        require 'dbh.inc.php';              // makes possible the connection to our database on the sign up
    
        // we are fetching all the information from the form when the users signs up inside the website

        $username = test_input($_POST['uid']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['pwd']);
        $passwordRepeat = test_input($_POST['pwd-repeat']);
        

        //adding error handlers to notify users when he/she makes mistakes in input
        //checking if one of the fields from the registration form is left empty to display error message to user
        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header ("Location: ../register.php?error=emptyfields&uid=".$username."&email=".$email);  //if one of the fields is empty after hitting the register button, 
            exit();                                                                               //the user will be redirected to home page again and all the fields in registration form will be cleared
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../register.php?error=invalidemailuid");  //checking a valid email and valid username  not sending any information back to the user, not sending anythign back to the user
            exit(); 
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){   //checking if the input email is valid
            header("Location: ../register.php?error=invalidemail"); 
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){   //preg match function - search pattern to check if the 
            header("Location:  ../register.php?error=invaliduid"); 
            exit();
        }
        //checking if the 2 passwords are not the same 
        else if ($password !== $passwordRepeat){
            header("Location:  ../register.php?error=passwordcheckuid"); 
            exit();
        }
        //eror handler if the user is trying to sign up with a username that is already existing in the database
        else { 
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";  //!!! secure feature using prepared statements is a way to run an sql statement inside our database without an attacker trying to destroy our database
            $stmt = mysqli_stmt_init($conn);                       //creating a prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../register.php?error=sqlerror");
                exit();
            } 
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("Location: ../register.php?error=usertaken");
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";  //inserting data from the user into our users table in login_database 
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../register.php?error=sqlerror");
                        exit();
                    } 
                    else {    //hashing the password using bcrypt - the safest encrypting method, up to date    
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //bcrypt password hashing, password_hash - is strong hashing alghoritm, salt method is included in password_has function
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);    //!!!we are going to hash the password here, we don't want to have the password available in the database as it is, in case of a hacker attack
                        mysqli_stmt_execute($stmt);                                             //this is why hashing is used, take the password and turn the password to a bunch of different characters
                        header("Location: ../register.php?register=success");
                        exit();
                    }
                }
            }
        }
        //closing the statements and close the connection to the database to save resources when it comes to phph and mysql, so the website doesnt run uneccesary resources
        mysqli_stmt_close($stmt); //closing the statement
        mysqli_close($conn); // closing the connection after user is registered
   
    }
    else {
        header("Location: ../register.php");
        exit();
    }
  
