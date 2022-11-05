<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myarray = array_column($_SESSION['cart'],'productid');
            if(in_array($_POST['productid'], $myarray))
            {
                echo "<script>
                alert('Item already in cart');
                window.location.href = 'index.php?page=pages/products';
                </script>";
            }
            else
            {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('productid'=>$_POST['productid'],'price'=>$_POST['price'],'quantity'=>$_POST['quantity']);
                echo "<script>
                    alert('Item added to cart');
                    window.location.href ='index.php?page=pages/products';
                    </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('productid'=>$_POST['productid'],'price'=>$_POST['price'],'quantity'=>$_POST['quantity']);
            echo "<script>
                alert('Item added to cart');
                window.location.href ='index.php?page=pages/products';
                </script>";
        }
    }
    if(isset($_POST['remove']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['productid'] == $_POST['itemtoremove'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                    alert('Item removed from cart');
                    window.location.href ='index.php?page=pages/cart';
                    </script>";
            }
        }
    }
    if(isset($_POST['quantity']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['productid'] == $_POST['changequantity'])
            {
                $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                echo "<script>
                    window.location.href ='index.php?page=pages/cart';
                    </script>";
            }
        }
    }
}
?>
