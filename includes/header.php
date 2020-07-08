<?php
    session_start();                          //starting a session on all the pages of the website, to make sure we have a session started on all the pages of the website
    session_regenerate_id(true);              // every time there is a new request, there will be a new session ID generated, thi si sto prevent session hijacking
    setcookie('key', '', time() + 3600, '/', null, true, true);  
    //print_r($_COOKIE); 

    //echo "<p style='margin: 30 30 30 350;'> Session ID = ".session_id()."</p>"; 
   ?> 

<main>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iYoga studio</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="javascript" href="script.js">

<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-orchid w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold; color: black; background-color: orchid;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b><a href="index.php" style="text-decoration: none;">iYoga</a></b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#iyoga" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">About iYoga</a> 
    <a href="studio.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Our Studio</a> 
    <a href="instructors.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Yoga Instructors</a> 
    <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
  
    <?php 
     if(isset($_SESSION['admin'])){
        echo '<a href="post.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Post</a>';  
        echo '<a href="reg_users.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Registered users</a>';  
    }
    if(isset($_SESSION['userUid'])){
        echo '<a href="blog.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Blog</a>
            <span class="w3-bar-item w3-button w3-hover-white">Hello '.$_SESSION['userUid'].', 
            <form action = "includes/logout.inc.php" method = "post">
            <button type="submit" name = "logout">Logout</button>
            </form>
            </a></span>';
    
    }else{
        echo '<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Register/Login</a> ';
    }
    ?>
    
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-orchid w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-orchid w3-margin-right" onclick="w3_open()">☰</a>
  <span>iYoga</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:40px" id="home">
    <h1 class="w3-jumbo"><b>iYoga Studio</b></h1>
  </div>
<div>


