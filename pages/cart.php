<?php
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
                <div class="col-md-12">
                    <h1>My Cart</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead class="text-center">
                            <th>S.no</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $total = 0;
                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $key=>$value)
                                { 
                                    $sn = $key+1;
                                    $total = $total +  $value['price']*$value['quantity'];
                                ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td>
                                    <?php 
                                       echo getproductname($value['productid']); ?>
                                    </td>
                                    <td> <?php echo $value['price']; ?></td>
                                    <td>
                                        <form action="index.php?page=pages/manage_cart" method="post">
                                            <input type="hidden" name="changequantity" value="<?php echo $value['productid']; ?>">
                                            <input type="number" onchange="this.form.submit();" name="quantity" min=1 max=10 value="<?php echo $value['quantity']; ?>">
                                        </form>
                                    </td>
                                    <td>
                                    <?php echo $value['price']*$value['quantity']; ?>
                                    </td>
                                    <td>
                                        <form action="index.php?page=pages/manage_cart" method="post">
                                            <input type="hidden" name="itemtoremove" value="<?php echo $value['productid']; ?>">
                                            <input class="btn btn-outline-danger btn-sm" type="submit" value="Remove" name="remove">
                                        </form>
                                    </td>
                                </tr>
                                    
                                 <?php   
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <hr>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12"><h4>Total: </h4><h5> <?php echo $total; ?></h5></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                            { ?>
                            <form action="index.php?page=pages/purchase" method="post">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Fullname" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="phone" class="form-control" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="paymentmode" value="COD" checked>
                                <label>Cash on Delivary</label><br>
                                <input type="radio" name="paymentmode" value="Online">
                                <label>Esewa/Khalti</label><br>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info" name="purchase" type="submit" value="Place order">
                            </div>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>