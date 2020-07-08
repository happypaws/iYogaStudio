<?php 
    require "header.php";
    include_once("includes/dbh.inc.php");

        function test_input($inputField){
            $inputField = htmlspecialchars(stripcslashes(strip_tags($inputField)));
            return $inputField;
        }

        if(!isset($_GET['pid'])){
            header("Location: blog.php");
        }

        $pid = $_GET['pid'];

        if(isset($_POST['update'])){

            $title = test_input($_POST['title']);
            $content = test_input($_POST['content']);

            $title = mysqli_real_escape_string($conn, $title);
            $content = mysqli_real_escape_string($conn, $content);

            $date = date('l jS \of F Y h:i:s A');
            

            $sql = "UPDATE posts SET title = '$title', content = '$content', date = '$date' WHERE id=$pid";
            
            if ($title == "" || $content == ""){
                echo "Please complete your post";
                return;
            }
           
            mysqli_query($conn, $sql);
            header("Location: blog.php");    
        }
    ?>

    <!-- Blog post-->
 <div class="w3-container" id="contact" style="margin-top:10px">
          <h1 class="w3-xxxlarge w3-text-orchid"><b>Post</b></h1>
          <hr style="width:50px;border:5px solid orchid" class="w3-round">
    
    <?php 
        $sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";  
        $res = mysqli_query($conn, $sql_get);
      

        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
                $title = $row['title'];
                $content = $row['content'];

                echo "<form action='edit_post.php?pid=$pid' method ='post'>";
                echo "<div class='w3-section'><label>Title</label>
                     <input class='w3-input w3-border' type='text' name='title' placeholder='post title here' value='$title' required>
                     </div>";
                echo "<div class='w3-section'><label>Content</label>
                     <textarea class='w3-input w3-border' type='textarea' name='content' placeholder='content' rows='10' cols='30'required>$content</textarea>
                     </div>";
            }
        }
    ?>     
                <button type="submit" name="update" class="w3-button w3-block w3-padding-large w3-orchid w3-margin-bottom">Update</button>
                </form>  
</div>

</body>

</main>

<?php
    require "footer.php";
?>