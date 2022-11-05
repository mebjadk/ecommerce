<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        </style>
    </head>
<body>
  <br><br>
<h2 class='text-primary text-center'>Order Details</h2>
<br><br>

<table class="table table-hover">
  <thead>
    <th class='text-center'>Order Id</th>
    <th class='text-center'>Order Placed By</th>
    <th class='text-center'>Contact No.</th>
    <th class='text-center'>Address</th>
    <th class='text-center'>Payment Mode</th>
    <th class='text-center'>Product Details</th>
    <th class='text-center'>Delivery Status</th>
  </thead>

<?php
include "connection.php"; // Using database connection file here
$records = mysqli_query($dbconn,"SELECT * FROM order_manager"); // fetch data from database
while($data = mysqli_fetch_assoc($records))
{
?>
  <tr>
    <td class='text-center'><?php echo $data['order_id']; ?></td>
    <td class='text-center'><?php echo $data['full_name']; ?></td>
    <td class='text-center'><?php echo $data['phone_no']; ?></td>
    <td class='text-center'><?php echo $data['address']; ?></td>
    <td class='text-center'><?php echo $data['payment_mode']; ?></td>
    <td class='text-center'><a href="index.php?page=ordered_product&orderid=<?php echo $data["order_id"]; ?>" class="text-primary"> View Ordered Products</a></td>
    <td class='text-center'>
    <?php
    if($data['order_status']==0)
    {
      echo('<p class="text-danger">Order Pending</p>');
    }
    else
    { 
      echo('<p class="text-success">Order Shipped</p>');
    }
    ?>
    </td>
  </tr>	
<?php
}
?>
</table>
</body>
</html>