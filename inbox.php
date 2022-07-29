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
        $sql_delete = "DELETE FROM inbox WHERE id = $delete";
        $result = mysqli_query($connection, $sql_delete);
        echo "<script>alert('message deleted')</script>";
		echo "<script>location.replace('inbox.php')</script>";
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/processor.css">
<link rel="stylesheet" href="css/table.css">
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
    <div style="clear:both"></div>
    <br />
    <div class="table-responsive">
        <table class="table table-bordered" id="customers">
            <tr>
                <th width="10%">User</th>
                <th widht="60%">Message</th>
                <th width="20%">Time</th>
                <th width="10%">Action</th>
            </tr>
            <?php
            $query = "select * from inbox order by id asc";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td align="center"><a href="inbox.php?action=delete&id=<?php echo $row["id"]; ?>"><button style="border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            padding: 5px 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;"><i class="fa-solid fa-trash-can"></i> Remove</button></a></td>
                    </tr>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>