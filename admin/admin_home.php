<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
?>
<h1 class='text-success text-center'>Welcome <?php echo $_SESSION['name']; ?></h1>
<div class="container text-center">
    <img src="images/slider1.jpg" alt="" class='img-fluid'>
</div>