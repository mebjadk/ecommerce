<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include('connection.php'); 
$pid = $_POST["pid"];
$pname = $_POST["productname"];
$price = $_POST["price"];
$pquantity = $_POST["quantity"];
if(!empty($_FILES["image"]["name"]))
{
    $filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];	
	$folder = "images/".$filename;
    $query = "UPDATE `products` SET `pname`='$pname',`price`='$price',`pquantity`='$pquantity',`pimage`='$filename' WHERE pid=+'$pid'";
    if(mysqli_query($dbconn, $query) && move_uploaded_file($tempname, $folder))
    {
        header('Location:index.php?page=product_details');
    }
    else
    {
        echo "<script>
            alert('error updating product');
            window.location.href ='index.php?page=pages/product_details';
            </script>";
    }
}
else
{
    $query = "UPDATE products SET pname='$pname',price='$price',pquantity='$pquantity' WHERE pid='$pid'";
if(mysqli_query($dbconn, $query))
{
    header('Location:index.php?page=product_details');
}
}
?>