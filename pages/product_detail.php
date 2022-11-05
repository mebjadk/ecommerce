<?php
include('connection.php');
$records = mysqli_query($dbconn,"SELECT * FROM products WHERE pid='$_GET[pid]'");
while($data = mysqli_fetch_assoc($records))
{ 
?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <img src="./admin/images/<?php echo $data['pimage']; ?>" alt="image" class="img-fluid" style="height: 450px; width:100%; border-radius: 5px; opacity: 0.6;">
        </div>
        <div class="col-md-5">
            <h1><?php echo $data['pname']; ?></h1>
            <h3><?php echo $data['price']; ?> NRs</h3>
            <h5><?php echo $data['pdescription']; ?></h5>
        </div>
    </div>
</div>
<?php
}
?>