<?php
    require "header.php";
?>

<!-- Register and login forms page -->

<div>
<h1 class="w3-xxxlarge w3-text-orchid"><b>Register/Login</b></h1>
<hr style="width:50px;border:5px solid orchid" class="w3-round">
</div>

 <!-- Register form-->
 <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom">
      <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Register here</li>
        <form action="includes/register.inc.php" method="post"><!-- Important security feature to use POST method instead of get method, using post method hides all the sensitive information -->
        <li class="w3-padding-16"> <input type="text" name="uid" placeholder="username" required></li>
          <li class="w3-padding-16"> <input type="text" name="email" placeholder="e-mail" required></li>
          <li class="w3-padding-16"> <input type="password" name="pwd" placeholder="password" minlength="8" required></li>
          <li class="w3-padding-16"> <input type="password" name="pwd-repeat" placeholder="confirm password" minlength="8" required> </li>
          <li class="w3-light-grey w3-padding-16"><button type="submit" name="register" class="w3-button w3-white w3-padding-large w3-hover-black">Register</button></li>
          <?php
            if(isset($_GET['error'])){                                              //displaying errors to the user
              $errorCheck = $_GET['error'];                                         
                if ($errorCheck == "emptyfields"){                                  //erorr when one of the form fields ar empty                        
                    echo '<p class="error">Fill in all fields!</p>';
                } else if ($errorCheck == "invalidemailuid"){                        //erorr when either username or email is not valid    
                    echo '<p class="error">Invalid username and/or e-mail</p>';
                } else if ($errorCheck == "invaliduid"){                             //erorr when username is not valid  
                    echo '<p class="error">Invalid username</p>';
                } else if ($errorCheck == "invalidemail"){                         //erorr when email is not valid 
                    echo '<p class="error">Invalid e-mail</p>';
                } else if ($errorCheck == "passwordcheckuid"){                      //erorr when the password and cofirm password field sdon't match
                    echo '<p class="error">The passwords do not match</p>';
                } else if ($errorCheck == "usertaken"){                             //erorr when the username is already taken by other account
                    echo '<p class="error">The username is already taken</p>';
                }
            }
            if(isset($_GET['register'])){
                  if($_GET['register'] == "success"){
                    echo '<p class="success">Registered successfully, please login</p>';
                  }
            }
          ?>
        </form>      
      </ul>
    </div>
      
      <!-- Creating a login form -->
    <div class="w3-half">
      <ul class="w3-ul w3-light-grey w3-center">
      <li class="w3-dark-grey w3-xlarge w3-padding-32">Login now</li>
            <form action="includes/login.inc.php" method="post"> <!-- Important security feature to use POST method instead of get method, using post method hides all the sensitive information -->
                <li class="w3-padding-16"> <input type="text" name="mailuid" placeholder="username" required> </li>
                <li class="w3-padding-16"> <input type="password" name="pwd" placeholder="password" required> </li>
                <li class="w3-padding-16"> <button type="submit" name="login" class="w3-button w3-white w3-padding-large w3-hover-black">Login</button></li>
                  <?php          
                      if(isset($_GET['error'])) {    
                      $errorCheck = $_GET['error'];
                          if ($errorCheck == "wrongpwd"){    //errors displayed to user when the password is incorrect
                            echo '<p class="error">Username and/or password is incorrect!</p>';
                          } 
                          else if($errorCheck == "nouser"){  //errors displayed to user when the username is incorrect
                            echo '<p class="error">Username and/or password is incorrect!</p>';
                        }
                      }
                  ?>
            </form>
      </ul>
    </div>
  </div>
  </div>
  </body>
  </main>

  <?php
    require "footer.php";
  ?>


