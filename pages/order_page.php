<?php
if (!isset($_SESSION['userlogin'])){
    header('Location:index.php?page=pages/user_login');
    $_SESSION['orderdirectedlogin'] = 'login first to order products';
}

$username = $_SESSION['userlogin'];
$product_id = $_GET['productid'];
include('connection.php'); // Using database connection file here
?>
<br> <br>
<div class="container">
<div class="row">
<div class="col-md-6">
<?php
$records = mysqli_query($dbconn,"SELECT * FROM products WHERE pid = '$product_id'"); // fetch data from database
while($data = mysqli_fetch_assoc($records))
{
?>
<div class='col-lg-3 col-md-4' style='text-align: center; padding: 3px;'>
<div class='card' style='width: 20rem; border: none; padding: 5px; background-color: #EBF5FB; border-radius: 5px;'>
    <img src='./admin/images/<?php echo $data['pimage']; ?>' class='card-img-top'height='350px'>
    <div class='card-body' style='text-align: center;'>
        <h3 class='card-title'><?php echo $data['pname']; ?></h3>
        <span><?php echo $data['price']; ?></span>
        <p><?php echo $data['pdescription']; ?></p>
    </div>
</div>
</div>
<?php
}
?>
</div>
<div class="col-md-6">
<div>
    <h1 class="text-info text-center">
		<?php
		echo'Hello! ' . $username;
		?>
	</h1>
    <h4 class="text-primary text-center"> Enter correct information</h4>
</div>
<form action='index.php?page=pages/order' method='post' style="background-color: lightgoldenrodyellow; padding: 5px; border-radius: 5px;">
	<div class="form-group">
		<label class="text-danger"><h6>Enter quantity in Litres for liquid items and in KGs for others </h6></label>
		<input type="number" class="form-control" name='quantity' placeholder="Quantity" required > <br>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name='address' placeholder="Address" required > <br>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name='contact' placeholder="Contact Number"required > <br>
	</div>
    <input type='hidden' name='productid' value='<?php echo $product_id; ?>'>
    <input type='hidden' name='username' value='<?php echo $username; ?>'>
	<div class="form-group">
	<div class="form-group shadow-textarea">
		<textarea class="form-control z-depth-1" id="" rows="3" name='message' placeholder="Write message here..." required ></textarea><br><br>
	</div>
	</div>
	<button type="submit" class="btn btn-info" name='order'>Order Now</button>
</form>
</div>
</div>
</div>