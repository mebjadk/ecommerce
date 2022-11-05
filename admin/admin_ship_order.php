<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include('connection.php'); 
$orderid = $_GET["orderid"];
echo $orderid;
$query = "UPDATE order_manager SET order_status='1' WHERE order_id='$orderid'";
if(mysqli_query($dbconn, $query))
{
    header('Location:index.php?page=order_details');
}
?>