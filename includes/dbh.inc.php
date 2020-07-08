<?php   //this file is database handler in includes folder

    $servername = "lden1.mysql4.gear.host";  //because I am using XAMPP as local server the name of the variable is local server, 
    $dBUsername = "logindatabase11";                          //when using an external server, the name of that server needs to be added there
    $dBPassword = "Uq6ftwl4?-97";
    $dBName = "logindatabase11"; //the database name that I created in phpMyAdmin 

    //need to run the connection with the database
    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    //checking if the connection with the server has failed or not 
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }           