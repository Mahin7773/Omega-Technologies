<?php
include 'server.php';
include 'change.php';
if (isset($_SESSION["admin"])) {
  echo "<script>location.replace('admin.php')</script>";
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://kit.fontawesome.com/bf8b0e333e.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Omega Technologies</title>
</head>

<body>
  <!--Navigation bar-->
  <div id="nav-placeholder">

  </div>

  <script>
    $(function() {
      $("#nav-placeholder").load("navbar.php");
    });
  </script>
  <!--end of Navigation bar-->


  <!-- Slideshow container -->
  <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <img src="images/delivery.png" style="width:100%">
    </div>

    <div class="mySlides fade">
      <img src="images/warranty.png" style="width:100%">
    </div>

    <div class="mySlides fade">
      <img src="images/customer care.png" style="width:100%">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>


  <div class="footer">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <script src="js/home.js"></script>
</body>

</html>