<?php
function change()
{
    //for setting session if cookie is set
    if(isset($_COOKIE['user'])&&!isset($_SESSION['username'])){
        $_SESSION['username']=$_COOKIE['user'];
    }
    else if(isset($_COOKIE['admin'])&&!isset($_SESSION['admin'])){
        $_SESSION['admin']=$_COOKIE['admin'];
    }
    if (isset($_SESSION['username'])) {
        echo '<div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-user"></i> ' . $_SESSION['username'] . '</button>
        <div id="myDropdown" class="dropdown-content" align="left">
        <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
        <button class="dropbtn" type="submit" name="log-out">Log Out</button>
        </form>
        </div>
        </div>';
    } 
    else if (isset($_SESSION['admin'])) {
        echo '<div class="dropdown">
        <button class="dropbtn"><i class="fa-solid fa-user"></i> ' . $_SESSION['admin'] . '</button>
        <div id="myDropdown" class="dropdown-content" align="left">
        <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
        <button class="dropbtn" type="submit" name="log-out">Log Out</button>
        </form>
        </div>
        </div>';
    }
    else {
        echo '<a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a>';
    }
    if (isset($_SESSION['username']) && isset($_POST['log-out'])) {
        session_unset();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        setcookie("user",'',time()-86400);
        header("location:home.php");
    }
    else if (isset($_SESSION['admin']) && isset($_POST['log-out'])) {
        session_unset();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        setcookie("admin",'',time()-86400);
        header("location:home.php");
    }



    //for destroying session if cookie is unset

    // else if (isset($_SESSION['username']) && !isset($_COOKIE['user'])) {
    //     session_unset();
    //     if (ini_get("session.use_cookies")) {
    //         $params = session_get_cookie_params();
    //         setcookie(
    //             session_name(),
    //             '',
    //             time() - 42000,
    //             $params["path"],
    //             $params["domain"],
    //             $params["secure"],
    //             $params["httponly"]
    //         );
    //     }
    //     session_destroy();
    //     header("location:home.php");
    // }
    // else if (isset($_SESSION['admin']) && !isset($_COOKIE['admin'])) {
    //     session_unset();
    //     if (ini_get("session.use_cookies")) {
    //         $params = session_get_cookie_params();
    //         setcookie(
    //             session_name(),
    //             '',
    //             time() - 42000,
    //             $params["path"],
    //             $params["domain"],
    //             $params["secure"],
    //             $params["httponly"]
    //         );
    //     }
    //     session_destroy();
    //     header("location:home.php");
    // }
}
