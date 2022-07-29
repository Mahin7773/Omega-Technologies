<?php
include 'server.php';
include 'change.php';
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
if (isset($_POST["checkout"]) && isset($_SESSION["shopping_cart"])) {
    global $connection;
    $errors = array();
    $username = $_SESSION['username'];
    $location = $_POST['location'];
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        $item = $values['item_name'];
        $quantity = $values['item_quantity'];
        $price = $values['item_price'];
        $total = $quantity * $price;
        $query = "insert into orders(id,username,location,item,quantity,price,total) 
			values('','$username','$location','$item',$quantity,$price,$total)";
        $result = mysqli_query($connection, $query);
    }
    unset($_SESSION["shopping_cart"]);
    if (!isset($_SESSION["shopping_cart"])) {
        echo "<script>alert('checkout complete')</script>";
        echo "<script>location.replace('cart.php')</script>";
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/table.css">
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://kit.fontawesome.com/bf8b0e333e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <!--Navigation bar-->
    <div id="nav-placeholder">

    </div>

    <script>
        $(function() {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>
    <!--end of Navigation bar-->
    <div style="clear:both"></div>
    <br />
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="customers">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td><?php echo $values["item_price"]; ?> TK</td>
                        <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> TK</td>
                        <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"><?php echo number_format($total, 2); ?> TK</td>
                    <td></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="new">
        <form action="" method="POST" enctype="multipart/form-data">

            <label for="location">Shipping Address</label>
            <input type="text" id="location" name="location" required>

            <button type="submit" name="checkout" style="border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            width: 100%;
            padding: 8px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;"><i class="fa-solid fa-bag-shopping"></i> checkout</button>
        </form>
    </div>

</body>

</html>