<?php
    require "header.php";
?>

<?php
$message_sent = false; //global variable to set default as false to check if either the message was sent from the user or not
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
    
            $mailTo = "lena.ovcearenco@gmail.com";
            $headers = "From: ".$mailFrom;
            $txt = "You have received an e-mail from ".$name.".\n\n".$message;
    
            mail($mailTo, $subject, $txt, $headers);
            $message_sent = true;
        } 
    }
?>

  <?php
    if($message_sent):
  ?>
    <div><img src="img/namaste.jpg" alt = "namaste girl and cat" width = "500px" height = "500px" style="margin: 0 0 0 250;"></div>
    <h3 style="vertical-align:middle;margin:0 0 0 250; color: orchid;"><b>Thank you, Your message was successfully sent!</b></h3>
  
  <?php 
    else:
  ?>
      <!-- Contact Form-->
      <div class="w3-container" id="contact" style="margin-top:10px">
          <h1 class="w3-xxxlarge w3-text-orchid"><b>Contact</b></h1>
          <hr style="width:50px;border:5px solid orchid" class="w3-round">
          <p>Do you want to ask us anything? Please fill out the form and send it to us, we will reply asap!</p>
          <form action="contact.php" method ="post">
            <div class="w3-section">
              <label>Name</label>
              <input class="w3-input w3-border" type="text" name="name" required>
            </div>
            <div class="w3-section">
              <label>Email</label>
              <input class="w3-input w3-border" type="email" name="email" required>
            </div>
            <div class="w3-section">
              <label>Subject</label>
              <input class="w3-input w3-border" type="text" name="subject" required>
            </div>
            <div class="w3-section">
              <label>Message</label>
              <input class="w3-input w3-border" type="text" name="message" required>
            </div>
            <button type="submit" name="form-submit" class="w3-button w3-block w3-padding-large w3-orchid w3-margin-bottom">Send Message</button>
            <div class="w3-section">
            </div>
          </form>  
      </div>
  
<?php
  endif;
?>

<!-- End page content -->
</div>
</body>
</main>

<?php
    require "footer.php";
?>