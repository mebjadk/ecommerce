<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
?>
<!DOCTYPE html>
<html>
<body>
<br><br>
<h2 class='text-primary text-center'>Product Details</h2>
<table class="table table-hover table-striped">
  <thead>
    <th class='text-center'>Product Id</th>
    <th class='text-center'>Product Name</th>
    <th class='text-center'>Price</th>
    <th class='text-center'>Quantity</th>
    <th class='text-center'>Product Description</th>
    <th class='text-center'>Product Images</th>
    <th class='text-center'>Update/Delete</th>
  </thead>

<?php
include "connection.php"; // Using database connection file here
$records = mysqli_query($dbconn,"select * from products"); // fetch data from database
while($data = mysqli_fetch_assoc($records))
{
?>
  <tr>
    <td class='text-center'><?php echo $data['pid']; ?></td>
    <td class='text-center'><?php echo $data['pname']; ?></td>
    <td class='text-center'><?php echo $data['price']; ?></td>
    <td class='text-center'><?php echo $data['pquantity']; ?></td>
    <td class='text-center'><?php echo $data['pdescription']; ?></td>
    <td class='text-center'><img src="images/<?php echo $data['pimage']; ?>" width="75" height="75"></td>
    <td class='text-center'>
    <a href="index.php?page=update_page&productid=<?php echo $data["pid"]; ?>" class="btn btn-info btn-sm">Update
    <a href="index.php?page=delete_product&productid=<?php echo $data["pid"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
  </td>
  </tr>	
<?php
}
?>
</table>
</body>
</html>