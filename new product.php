<?php
include 'server.php';
include 'change.php';
if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Must log in as Admin first')</script>";
    echo "<script>location.replace('login.php')</script>";
}

if (isset($_POST["add"])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description=$_POST['description'];
    $file = $_FILES['image'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {

        $destfile = 'images/' . $filename;

        move_uploaded_file($filepath, $destfile);

        $sql = "INSERT INTO products (type, name, image, price, description)
					VALUES ('$type', '$name', '$destfile', '$price', '$description')";
        $result = mysqli_query($connection, $sql);
        echo "<script> alert('Product Added Successfully'); </script>";
        echo "<script>location.replace('new product.php')</script>";
    }
}

?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/processor.css">
<link rel="stylesheet" href="css/form.css">
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
    <h4>Add New Product</h4>

    <div class="new">
        <form action="" method="POST" enctype="multipart/form-data">

            <label for="name"><b>Product Name</b></label>
            <input type="text" id="name" name="name" required>

            <label for="type"><b>Type</b></label>
            <select id="type" name="type">
                <option value="processor">processor</option>
                <option value="casing">casing</option>
                <option value="cooler">cooler</option>
                <option value="fan">fan</option>
                <option value="gpu">gpu</option>
                <option value="hdd">hdd</option>
                <option value="monitor">monitor</option>
                <option value="motherboard">motherboard</option>
                <option value="psu">psu</option>
                <option value="ram">ram</option>
                <option value="ssd">ssd</option>
            </select>

            <label for="image"><b>Image source<br></b></label>
            <input type="file" id="image" name="image" required><br>
            <label for="price"><b>Price</b></label>
            <input type="number" id="price" name="price" required>
            <label for="description"><b>Description</b></label>
            <input type="text" id="description" name="description" placeholder="seperate by $ sign" required>

            <button type="submit" name="add" style="border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            width: 100%;
            padding: 8px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;"><i class="fa-solid fa-plus"></i> Add</button>
        </form>
    </div>

</body>

</html>