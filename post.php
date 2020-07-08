<?php 
    require "header.php";
    include_once("includes/dbh.inc.php");

        function test_input($inputField){
            $inputField = htmlspecialchars(stripcslashes(strip_tags($inputField)));
            return $inputField;
        }

        if(isset($_SESSION['admin']) && $_SESSION['admin']= 1){
          
          if(isset($_POST['post'])){

            $title = test_input($_POST['title']);
            $content = test_input($_POST['content']);

            $title = mysqli_real_escape_string($conn, $title);
            $content = mysqli_real_escape_string($conn, $content);

            $date = date('l jS \of F Y h:i:s A');
            

            $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";
            
            if ($title == "" || $content == ""){
                echo "Please complete your post";
                return;
            }
          
            mysqli_query($conn, $sql);
            header("Location: blog.php");    
        } 
        }
        else {
          header("Location: blog.php");
        }
    ?>

  
 <!-- Blog post-->
 <div class="w3-container" id="contact" style="margin-top:10px">
          <h1 class="w3-xxxlarge w3-text-orchid"><b>Post</b></h1>
          <hr style="width:50px;border:5px solid orchid" class="w3-round">
          
          <form action="post.php" method ="post">
            <div class="w3-section">
              <label>Title</label>
              <input class="w3-input w3-border" type="text" name="title" placeholder="post title here" required>
            </div>
            <div class="w3-section">
              <label>Content</label>
              <textarea class="w3-input w3-border" type="textarea" name="content" placeholder="post content" rows="10" cols="30" required></textarea>
            </div>
            <button type="submit" name="post" class="w3-button w3-block w3-padding-large w3-orchid w3-margin-bottom">Post Now</button>
          </form>  
</div>

</body>

</main>

<?php
    require "footer.php";
?>