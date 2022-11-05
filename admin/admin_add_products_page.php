<?php
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include('connection.php');

?>
<br> <br>
<div >
  <h5 class="text-success text-center">
  <?php 
    if (isset($_SESSION['recordinserted'])){
      echo $_SESSION['recordinserted'];
      unset($_SESSION['recordinserted']);
    }
  ?>
  </h5>
</div>
<div>
  <h5 class="text-success text-center">
    <?php
      if (isset($_SESSION['imageupload'])){
        echo $_SESSION['imageupload'];
        unset($_SESSION['imageupload']);
      }
    ?>
  </h5>  
</div>
<div>
  <h5 class="text-success text-center">
    <?php
    if (isset($_SESSION['errorrecordinserted'])){
        echo $_SESSION['errorrecordinserted'];
        unset($_SESSION['errorrecordinserted']);
    }
    ?>
  </h5>  
</div>
<div>
  <h5 class="text-success text-center">
    <?php
    if (isset($_SESSION['errorimageupload'])){
        echo $_SESSION['errorimageupload'];
        unset($_SESSION['errorimageupload']);
    }
    ?>
  </h5>  
</div>
<!--
<div class="container">
<form action="admin_add_products.php" method="post" enctype="multipart/form-data" class='text-center'>
    <input type="text" placeholder="Product Name" name="productname" required > <br><br>
    <input type="number" placeholder="Price" name="price" required > <br><br>
    <input type="number" placeholder="Quantity" name="quantity" required > <br><br>
    <textarea name="description" placeholder="Product Description" required ></textarea><br><br>
    <input type="file" name="image" required class='text-center'><br><br>
    <input type="submit" name="submit" value="Add Product" class='btn btn-success'>
</form>
</div> -->
<div class="container" style="background-color: lightyellow; padding: 5px; border-radius: 5px; width: 80%;">
<h3 class="text-info text-center"> Enter product details</h3>
<form action="admin_add_products.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="form-control" name="productname" required placeholder="Product Name"> <br>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" name="price" required placeholder="Product Price"> <br>
  </div>
  <div class="form-group">
    <label>Choose a Category:</label> <br>
    <select name="cid" required>
    <?php 
    $records = mysqli_query($dbconn,"select * from product_category");
    while($data = mysqli_fetch_assoc($records))
    { ?>
    <option value="<?php echo $data['cid'];?>"><?php echo $data['category_name'];?></option>
    <?php
    }
    ?>
    </select>
  </div><br>
  <div class="form-group">
    <input type="number" class="form-control" name="quantity" required placeholder="Product Quantity"> <br>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"><h5 class="text-primary"> Choose product image</h5></label>
    <input type="file" class="form-control-file" name="image" required > <br>
  </div>
  <div class="form-group">
    <textarea class="form-control" rows="3" name="description" placeholder="Product description....." required ></textarea> <br>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Add product</button>
</form>
</div>
