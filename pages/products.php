<?php
include('connection.php'); // Using database connection file here
?>
<br><br>
<div class="container">
   <div class="row" style="padding 3px;">
   <?php
   $records = mysqli_query($dbconn,"select * from products"); // fetch data from database
    while($data = mysqli_fetch_assoc($records))
    {
   ?>
  <div class='col-lg-3 col-md-4' style='text-align: center; padding: 3px;'>
    <div class='card' style='width: 16rem; border: none; padding: 2px; background-color: #EBF5FB; border-radius: 5px;'>
    <img src='./admin/images/<?php echo $data['pimage']; ?>' class='card-img-top'height='200px'>
      <div class='card-body' style='text-align: center;'>
        <h5 class='card-title text-primary'><a href="index.php?page=pages/product_detail&pid=<?php echo $data['pid']; ?>"><?php echo $data['pname']; ?></a></h5>
        <span class="text-info">Price: <?php echo $data['price']; ?></span>
        <form action="index.php?page=pages/manage_cart" method="post">
          <input type="hidden" name="productid" value="<?php echo $data['pid']; ?>">
          <input type="hidden" name="price" value="<?php echo $data['price']; ?>"> <br>
          <input type="number" min="1" max="10" value="1" name="quantity" required> <br> <br>
          <input type="submit" name="cart" class="btn btn-success" value="Add to cart">
        </form>
        <hr>
        <p><?php echo $data['pdescription']; ?></p>
    </div>
</div>
</div>
<?php
}
?>
</div>
</div>
