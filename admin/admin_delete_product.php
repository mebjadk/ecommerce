<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include "connection.php";
$productid = $_GET["productid"];
$query = "DELETE FROM products WHERE pid='$productid'";
if(mysqli_query($dbconn, $query))
{
    header('Location:index.php?page=product_details');
}
?>