<?php
    require "header.php";
    require "includes/dbh.inc.php"; 
?>

  <?php 

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
  header("Location: adminhub.php");
}

if(isset($_SESSION['userUid'])){
      $sql = "SELECT * FROM posts ORDER BY id DESC";  // quering all the posts from the posts table in Blog database
      $res = mysqli_query($conn, $sql) or die (mysqli_error());
      $posts = "";

          if (mysqli_num_rows($res) > 0){
              while($row = mysqli_fetch_assoc($res)){
                  $id = $row['id'];
                  $title = $row['title'];
                  $content = $row['content'];
                  $date = $row['date'];
      
                  $posts .= "<div><h2><p>$title</p></h2><p>$content</p><h5>$date</h5><hr style='width:50px;border:5px solid orchid' class='w3-round'></div>";
              }
              echo $posts;
          } else {
              echo "Sorry, there are no posts!";
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