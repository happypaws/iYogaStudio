<?php 
    require "header.php";
    include_once("includes/dbh.inc.php");

   // if(!isset($_SESSION['userId'])){
     //   header("Location: register.php");
       // return;
    //}
    if(!isset($_GET['pid'])){
        header("Location: blog.php");
    }else{
        $pid = $_GET['pid'];
        $sql = "DELETE FROM posts WHERE id=$pid";
        mysqli_query($conn, $sql);
        header("Location: blog.php");
    }
        
?>
