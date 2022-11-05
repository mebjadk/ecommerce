<br> <br>
<h3 class='text-center text-success'>
    <?php
    if (isset($_SESSION['orderplaced'])){
        echo 'Dear! ' . $_SESSION['userlogin'] . $_SESSION['orderplaced'];
        unset($_SESSION['orderplaced']);
    }
    ?>
</h3>
<?php
include('connection.php');
?>
<html>
  <head>
    <style type="text/css">
    #slide{
      max-height: 450px;
      width: 100%;
    }
    </style>
    <script>
    var i = 0; 
    var images = [ "./admin/images/slider1.jpg",  "./admin/images/slider2.jpg",  "./admin/images/slider3.jpg",];
    var time = 2000;

    function change() {
      document.getElementById("slide").src = images[i];

      if (i < images.length - 1) {
        i++;
      } else {
        i = 0;
      }
      setTimeout("change()", time);
    }
    window.onload = change;
  </script>
  </head>
  <div class="container" style=" width: 1000px;">
    <img id="slide"/>
  </div>
  <br><br>

 <div class="container">
    <h1 class="text-center text-info">Our Products</h1>
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
        <h4 class='card-title text-primary'><?php echo $data['pname']; ?></h4>
        <span class="text-info">Price: <?php echo $data['price']; ?></span>
        <p><?php echo $data['pdescription']; ?></p>
        <!-- <a href='index.php?page=pages/order_page&productid=<?php echo $data['pid']; ?>' class='btn btn-info'>order now</a> -->
        <a href='index.php?page=pages/products' class='btn btn-success'>shop now</a>
    </div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</html>