<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include('connection.php'); 
$productid = $_GET["productid"];
$records = mysqli_query($dbconn,"select * from products where pid='$productid'");
while($data = mysqli_fetch_assoc($records))
{?>
<br> <br>
<div class="container" style="background-color: lightyellow; padding: 5px; border-radius: 5px; width: 80%;">
<h3 class="text-info text-center"> Update product details</h3>
<form action="admin_update_product.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" class="form-control" name="pid" value="<?php echo $data['pid']; ?>" > <br>
  </div>
  <div class="form-group text-center">
  <img src="images/<?php echo $data['pimage']; ?>" width="300" height="200">
  </div>
  <div class="form-group">
  <label><b> Product Name</b></label> <br>
    <input type="text" class="form-control" name="productname" value="<?php echo $data['pname']; ?>" required > <br>
  </div>
  <div class="form-group">
  <label><b> Product Price</b></label> <br>
    <input type="number" class="form-control" name="price" value="<?php echo $data['price']; ?>" required > <br>
  </div>
  <div class="form-group">
  <label><b> Product Quantity</b></label> <br>
    <input type="number" class="form-control" name="quantity" value="<?php echo $data['pquantity']; ?>"required > <br>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"><h5 class="text-primary"> Update product image</h5></label>
    <input type="file" class="form-control-file" value="<?php echo $data['pimage']; ?>" name="image"> <br>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Update product</button>
</form>
</div>

<?php
}
?>