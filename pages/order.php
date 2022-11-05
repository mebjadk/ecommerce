<?php
if (!isset($_SESSION['userlogin'])){
    header('Location:index.php?page=pages/user_login');
}
include('connection.php'); 

$ordered_by = $_POST['username'];
$product_id = $_POST['productid'];
$product_quantity = $_POST['quantity'];
$delivery_address = $_POST['address'];
$user_contact = $_POST['contact'];
//die($user_contact);
$order_message = $_POST['message'];
//retriving product name from product id 
$record = mysqli_query($dbconn, "SELECT * FROM products WHERE pid = '$product_id'");
$data = mysqli_fetch_assoc($record);
if ($data !== null){
    $ordered_product = $data['pname'];
}

$query = "INSERT INTO orderdetails (order_id, ordered_by, ordered_product, product_quantity, delivery_address, user_contact, order_message, order_status ) 
         VALUES ('Null', '$ordered_by', '$ordered_product', '$product_quantity', '$delivery_address', '$user_contact', '$order_message', '0')";
if(mysqli_query($dbconn, $query))
{
    $_SESSION['orderplaced'] = "  Your order is accepted";
    header('Location:index.php?page=pages/home');
}
?>