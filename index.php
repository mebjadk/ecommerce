<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Online Fancy Stores</title>
    <style>
        .navbar-nav {
            margin-left: auto;
        }
        a {
          color:white;
         }
         .collapse .navbar-nav .nav-item a:after {
  display:block;
  content: '';
  border-bottom: solid 3px #019fb6;  
  transform: scaleX(0); 
  transition: transform 250ms ease-in-out;
}
.collapse .navbar-nav .nav-item a:hover:after {
letter-spacing: 4px;
transform: scaleX(1);
}
.collapse .navbar-nav .nav-item a.fromRight:after{  letter-spacing: 4px;
 transform-origin:100% 50%; }
.collapse .navbar-nav .nav-item a.fromLeft:after{   letter-spacing: 4px;
 transform-origin:  0% 50%; }
    </style>
  </head>
  <body style="background-color: #DEDEDE;">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2980B9;">
   <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
    <img src="./admin/images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:50%;">
    Online Fancy Stores
  </a>
  <?php
  if(isset($_SESSION['userlogin']))
  {
    echo $_SESSION['userlogin'];
  }
  ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item mx-5">
          <a class="nav-link" href="index.php?page=pages/home">Home</a>
        </li>
        <li class="nav-item mx-5 ">
          <a class="nav-link" href="index.php?page=pages/products">Products</a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link" href="index.php?page=pages/cart">Cart <sup class="text-warning"><b>(
          <?php 
          $count=0;
          if(isset($_SESSION['cart']))
          {
            $count = count($_SESSION['cart']);
          }
          echo $count;
          ?>
          )</b></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=pages/contact">Contact Us</a>
        </li>
        <?php
        if (isset($_SESSION['userlogin']))
        {
        echo"<li class='nav-item'>
           <a class='nav-link btn btn-danger' href='index.php?page=pages/user_logout'><i class='fa fa-fw fa-user'></i> Logout</a> 
        </li>";
        }
        else{
          echo"<li class='nav-item'>
          <a class='nav-link btn btn-secondary ms-5' href='index.php?page=pages/user_login'><i class='fa fa-fw fa-user'></i> Login</a> 
          </li>";
        }
        ?>
      </ul>
    </div>
  </div>
 </nav>
 <div class="w3-container">
    <?php 
      if(isset($_GET['page']))
      {
		   $page = $_GET['page'].".php";
		   include($page);
	    }
      else{
        $page = "pages/home.php";
        include($page);
      }
    ?>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <script>
      function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.031 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

window.initMap = initMap;

    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>

  </body>
  <br> <br>
  <?php
  include('pages/footer.php');
  ?>
</html>