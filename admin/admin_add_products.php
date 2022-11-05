<?php
session_start();
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
//database connection
include('connection.php');

// If upload button is clicked ...
if (isset($_POST['submit'])) {
	$pname = $_POST['productname'];
	$price = $_POST['price'];
	$cid = $_POST['cid'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];	
	$folder = "images/".$filename;

	// insert query execution
    $query = "INSERT INTO products (pid, pname, price, cid, pquantity, pdescription, pimage) VALUES ('', '$pname', '$price','$cid', '$quantity', '$description', '$filename')";
    if(mysqli_query($dbconn, $query)){
        //echo "Records inserted successfully.";
		$_SESSION['recordinserted']="product added";
    } else{
        //echo "ERROR: Could not able to execute";
		$_SESSION['errorrecordinserted']= "product couldnt be added";
    }
		
	// Now let's move the uploaded image into the folder: images
	if (move_uploaded_file($tempname, $folder)) {
	//$msg = "Image uploaded successfully";
    $_SESSION['imageupload']= "image uploaded";

	}else{
		//$msg = "Failed to upload image";
		$_SESSION['errorimageupload']= "failed to upload image";
	}
	header('Location:index.php?page=add_products_page');
}
//echo $msg;
?>
