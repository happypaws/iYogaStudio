<?php 
    require "header.php";
    include_once "includes/dbh.inc.php";
?>

<!-- A table with all login_database data -->
    <h3 style="margin:auto;">Registered users of iYoga website</h3>
    <hr style="width:50px;border:5px solid orchid;" class="w3-round">
    <table style="border:2px solid orchid;border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
   
<?php
    if(isset($_SESSION['admin']) && $_SESSION['admin']= 1){

        $sql = "SELECT idUsers, uidUsers, emailUsers, pwdUsers FROM users;"; //quering all the users and all the data about them from users table
        $res = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($res);

        if($resultCheck > 0){
           while($row = mysqli_fetch_assoc($res)){
               echo "<tr><td>".$row['idUsers']."</td><td>".$row['uidUsers']."</td><td>".$row['emailUsers']."</td><td>".$row['pwdUsers']. "</td></tr>";
            }
            echo "</table>";
        }
    }
    else {
        header("Location: index.php");
    }
?>
 
</body>
</main>

<?php
    require "footer.php";
?>
