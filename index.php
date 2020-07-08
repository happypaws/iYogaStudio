<?php
    require "header.php";
?>

<h1 class="w3-xxxlarge w3-text-orchid"><b>Your health and wealth..</b></h1>
<hr style="width:50px;border:5px solid orchid" class="w3-round">
</div>

  <!-- Photo grid (modal) -->
  <div class="w3-row-padding">
    <div class="w3-half">
      <img src="img/yoga1.jpeg" style="width:100%" onclick="onClick(this)" alt="yoga mat">
      <img src="img/yoga9.jpeg" style="width:100%" onclick="onClick(this)" alt="yoga mat">
      <img src="img/yoga3.jpeg" style="width:100%" onclick="onClick(this)" alt="lotus pose">
    </div>

    <div class="w3-half">
      <img src="img/yoga4.jpeg" style="width:100%" onclick="onClick(this)" alt="Windows for the atrium">
      <img src="img/yoga5.jpeg" style="width:100%" onclick="onClick(this)" alt="Bedroom and office in one space">
      <img src="img/yoga6.jpeg" style="width:100%" onclick="onClick(this)" alt="Scandinavian design">
    </div>
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- About iYoga-->
  <div class="w3-container" id="iyoga" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-orchid"><b>About iYoga</b></h1>
    <hr style="width:50px;border:5px solid orchid" class="w3-round">
    <p>We are lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam!</p>
    <p>Some text about our instructors - what we do and what we offer. We are lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

<!-- End page content -->
</div>
</body>
</main>

<?php
    require "footer.php";
?>