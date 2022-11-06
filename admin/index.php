<?php 
session_start();
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title>Admin Panel</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<body  style="background-color:#DEDEDE;">

<!-- Sidebar -->
<div class="w3-sidebar w3-blue w3-bar-block " style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="index.php" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Home</a>
  <a href="index.php?page=add_products_page" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Add Products</a>
  <a href="index.php?page=order_details" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Order Details</a>
  <a href="index.php?page=product_details" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Product Details</a>
  <a href="index.php?page=product_category" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Products Category</a>
  <a href="index.php?page=feedback_details" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue">Feedback Messages</a>
  <a href="admin_logout.php" class="btn btn-danger">Logout</a>
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-black">
  <h1>Online Fancy Stores</h1>
</div>

<div class="w3-container">
<?php 
  if(isset($_GET['page'])){
		$page = "admin_".$_GET['page'].".php";
		include($page);
	}
  else{
    $page = "admin_home.php";
    include($page);
  }
?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

