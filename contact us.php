<?php
include 'server.php';
include 'change.php';
if (!isset($_SESSION["username"])) {
    echo "<script>alert('You Must Log In First')</script>";
    echo "<script>location.replace('login.php')</script>";
}
if (isset($_POST["send"])) {
    global $connection;
    $errors = array();
    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $query = "insert into inbox(id,username,message) 
			values('','$username','$message')";
    $result = mysqli_query($connection, $query);
    echo "<script>alert('message sent')</script>";
    echo "<script>location.replace('contact us.php')</script>";
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="css/home.css">
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://kit.fontawesome.com/bf8b0e333e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omega Technologies</title>
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

    <div class="form-container sign-in-container">
        <form action="#" method="post">
            <h1>Enter Your Message</h1>
            <input type="text" placeholder="type here" name="message" required style="background-color: white;
    border: none;
    padding: 15px;
    margin-bottom: 10px;
    width: 50%;" />
            <button type="submit" name="send" style="border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;"><i class="fa-solid fa-paper-plane"></i> Send</button>
        </form>
    </div>

    <div class="footer">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <script src="js/home.js"></script>
</body>

</html>