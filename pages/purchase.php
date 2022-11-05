<?php
include('connection.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['purchase']))
    {
        $query= "INSERT INTO `order_manager`(`full_name`, `phone_no`, `address`, `payment_mode`,`order_status`) VALUES ('$_POST[fullname]','$_POST[phone]','$_POST[address]','$_POST[paymentmode]',0)";
        if(mysqli_query($dbconn,$query))
        {
            $query2="INSERT INTO `user_orders`(`order_id`, `product_id`, `price`, `quantity`) VALUES (?,?,?,?)";
            $order_id = mysqli_insert_id($dbconn);
            $stmt = mysqli_prepare($dbconn,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"iiii",$order_id,$product_id,$price,$quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $product_id = $values['productid'];
                    $price = $values['price'];
                    $quantity = $values['quantity'];
                    mysqli_stmt_execute($stmt);
                    unset($_SESSION['cart']);
                    echo "<script>
                    alert('order placed');
                    window.location.href = 'index.php?page=pages/home';
                    </script>";
                }
            }
            else
            {
                echo "<script>
                alert('error placing order');
                window.location.href = 'index.php?page=pages/cart';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('error placing order');
                window.location.href = 'index.php?page=pages/cart';
                </script>";
        }
    }
}
?>