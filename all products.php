<?php
include 'server.php';
include 'change.php';
if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Must log in as Admin first')</script>";
    echo "<script>location.replace('login.php')</script>";
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $delete = $_GET['id'];
        $sql_delete = "DELETE FROM products WHERE id = $delete";
        $result = mysqli_query($connection, $sql_delete);
        echo "<script>alert('item deleted')</script>";
        echo "<script>location.replace('all products.php')</script>";
    } else if ($_GET["action"] == "update") {
        $update = $_GET['id'];
        $price = $_POST['newprice'];
        $sql_delete = "update products set price=$price WHERE id = $update";
        $result = mysqli_query($connection, $sql_delete);
        echo "<script>alert('price updated')</script>";
        echo "<script>location.replace('all products.php')</script>";
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
            $("#nav-placeholder").load("adminnavbar.php");
        });
    </script>
    <!--end of Navigation bar-->
    <!--cardview-->
    <div class="grid">
        <?php
        $query = "select * from products order by id asc";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="card">
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
                        <a href="all products.php?action=delete&id=<?php echo $row["id"]; ?>">
                            <button class="addtocart" style="margin-bottom: 5px;">
                                <div class="pretext">Delete Product</div>
                            </button>
                        </a>
                        <form method="POST" action="all products.php?action=update&id=<?php echo $row["id"]; ?>" enctype="multipart/form-data">
                            <input type="number" name="newprice" class="form-control" style="width: 100%;padding: 5px 5px;margin-bottom: 8px;" required/>

                            <button type="submit" class="addtocart">
                                <div class="pretext">Update Price</div>
                            </button>

                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!--cardview-->
</body>

</html>