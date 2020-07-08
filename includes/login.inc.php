`<?php
 //testing the input for html tags, extra space, or \
 function test_input($inputField){
    $inputField = htmlspecialchars(stripcslashes(strip_tags($inputField)));
    return $inputField;  
}

    $admin = $row['admin'];  
    if(isset($_POST['login'])){

       require 'dbh.inc.php';

        $mailuid = test_input($_POST['mailuid']);
        $password = test_input($_POST['pwd']);
        
    
        if(empty($mailuid) || empty($password)){  //error handler in case where one of the fields was left out empty in the login form
            header("Location: ../register.php?error=emptyfields");
            exit();
        }
        else{    // error handler to check if the username and password matches with the details stored in database
            $sql = "SELECT * FROM users WHERE uidUsers=?  OR emailUsers=?;";   //?-using  placeholder so we are using prepared statmenets afterwards for security of the system
            //create prepared statement
            $stmt = mysqli_stmt_init($conn);   //initializing       // the query statmenets is allowing the user to input either the username or the email address into username field
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../register.php?error=sqlerror");
            exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);   
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if ($pwdCheck == false) {
                        header ("Location: ../register.php?error=wrongpwd");
                        exit();
                    } else if ($pwdCheck == true) { //we need to start a session when user is successfully logged in
                        session_start();
                        $_SESSION['userUid'] = $row['uidUsers'];  //creating session variable with users uid
                        $admin = $row['admin'];     
                        if($admin == 1){
                                $_SESSION['admin'] = 1;
                            }
                            header("Location: ../index.php?login=success");

                    } else {
                        header ("Location: ../register.php?error=wrongpwd");
                        exit();
                    }
                } else {
                    header("Location: ../register.php?error=nouser");
                    exit();
                }
            }
        }                                                                      
    }else {
            header("Location: ../register.php");
            exit();
        }
    