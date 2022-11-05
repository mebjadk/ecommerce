<?php
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
include('connection.php');
function getproductname(int $pid) {
    include('connection.php');
    $sql = "SELECT * FROM products
    WHERE pid='$pid'";
    $records = mysqli_query($dbconn,$sql);
    while($data = mysqli_fetch_assoc($records))
    {
        return $data['pname'];
    }
}
?>
<html>
<head>

</head>
<body> 
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $query = "SELECT * FROM user_orders WHERE order_id = $_GET[orderid] ";
                        $records = mysqli_query($dbconn,$query);
                        while($data = mysqli_fetch_assoc($records))
                        { 
                            $total = $total +  $data['price']*$data['quantity']; 
                        ?>
                        <tr>
                            <td class="text-center"><?php echo getproductname($data['product_id']); ?></td>
                            <td class="text-center"><?php echo $data['quantity']; ?></td>
                            <td class="text-center"><?php echo $data['price']; ?></td>
                            <td class="text-center"><?php echo $data['quantity']*$data['price']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="col-md-4">
                <h4>Grand Total: </h4>
                <h5> <?php echo $total; ?></h5>
                <hr>
                <a href="#" class="btn btn-secondary">Print Bill</a>
                <a href="index.php?page=ship_order&orderid=<?php echo $_GET['orderid']; ?>" class="btn btn-primary">Ship Order</a>
            </div>
        </div>
    </div>
</body>
</html>
