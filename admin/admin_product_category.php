<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include "connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryname = $_POST["categoryname"];
    $query = "INSERT INTO product_category (cid, category_name) VALUES ('Null', '$categoryname')";
    if(mysqli_query($dbconn, $query)){
        //echo "Records inserted successfully.";
		$_SESSION['categoryinserted']="category added";
    }
}
?>
<div class="container">
    <div>  
        <h4>
            <?php
            if (isset($_SESSION['categoryinserted'])){
                echo('<h5 class="text-center text-success">Category Added</h5>');
                unset($_SESSION['categoryinserted']);
            }
            ?>
        </h4>
    </div>
<form action="" method="post">
    <h3>Add Product category</h3>
    <label>Enter product category</label><br>
    <input type="text" name="categoryname" >
    <input type="submit" value="Add" class="btn btn-info">
</form>
</div>
<br>
<div class="container">
<h2 class='text-primary text-center'>Category Details</h2><br>
<table class="table table-hover">
    <thead>
        <tr>
        <th class='text-center'>Category Id</th>
        <th class='text-center'>Category Name</th>
        <th class='text-center'>Options</th>
        </tr>
    </thead>
    <tbody>
    
        <?php 
        $records = mysqli_query($dbconn,"select * from product_category");
        while($data = mysqli_fetch_assoc($records))
        { ?><tr>
            <td class='text-center'><?php echo $data['cid']; ?></td>
            <td class='text-center'><?php echo $data['category_name']; ?></td>
            <td class='text-center'>options</td>
            </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>
</div>
