<?php

$message_sent = false;

function test_inputForm($inputForm){
    $inputForm = htmlspecialchars(stripcslashes(strip_tags($inputForm)));
    return $inputForm;
}
    if (isset($_POST['form-submit'])){

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){   //validating the email format is right
            $name = test_inputForm($_POST['name']);
            $mailFrom = test_inputForm($_POST['email']);
            $subject = test_inputForm($_POST['subject']);
            $message = test_inputForm($_POST['message']);
    
            $mailTo = "eovcearenco@hubspot.com";
            $headers = "From: ".$mailFrom;
            $txt = "You have received an e-mail from ".$name.".\n\n".$message;
    
            mail($mailTo, $subject, $txt, $headers);
            header("Location: contact.php?message=mailsent");   
        }
    }   
?>