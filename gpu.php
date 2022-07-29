<?php
include 'server.php';
include 'change.php';
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="example1.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/processor.css">
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://kit.fontawesome.com/bf8b0e333e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>processors</title>
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
    <!--cardview-->
    <div class="grid">
        <?php
        $query = "select * from products where type='gpu' order by id asc";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="card">
                    <form method="post" action="gpu.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div>
                            <img src="<?php echo $row["image"]; ?>" alt="Avatar" style="width:100%; border-radius: 10px">
                        </div>
                        <div class="card-body">
                            <h4>
                                <b><?php echo $row["name"]; ?></b>
                            </h4>
                            <ul>
                                <?php
                                $pieces = explode("$", $row["description"]);
                                for ($i = 0; $i < count($pieces); $i++) {
                                    echo '<li>' . $pieces[$i] . '</li>';
                                }
                                ?>
                            </ul>
                            <h4 align="center"><?php echo $row["price"]; ?> TK</h4>
                            <input type="text" name="quantity" class="form-control" value="1" style="width: 100%;padding: 5px 5px;margin-bottom: 8px;" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                            <button type="submit" class="addtocart" name="add_to_cart">
                                <div class="pretext">
                                    <i class="fas fa-cart-plus"></i>ADD TO CART
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!--cardview-->
    <div class="footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</body>

</html>