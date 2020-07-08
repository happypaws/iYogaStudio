<?php   //this file is database handler in includes folder

    $servername = "localhost";  //because I am using XAMPP as local server the name of the variable is local server, 
    $dBUsername = "root";                          //when using an external server, the name of that server needs to be added there
    $dBPassword = "";
    $dBName = "login_database"; //the database name that I created in phpMyAdmin 

    //need to run the connection with the database
    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    //checking if the connection with the server has failed or not 
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }           