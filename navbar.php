<?php
include 'server.php';
include 'change.php';
?>
<header style="position: relative; margin:-10px; ">
    <img src="images/Omega Technologies-logos_transparent.png" alt="" height="100" width="100">
    <nav>
        <ul>
            <li><a href="home.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="contact us.php"><i class="fa-solid fa-tty"></i> Contact Us</a></li>
            <li>
                <?php
                change();
                ?>
            </li>
            <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn"><img src="images/burger.png" alt="" height="30" width="30" align="center" class="burger"></button>
                    <div id="myDropdown" class="dropdown-content" align="left">
                        <a href="processor.php">Processor</a>
                        <a href="cooler.php">CPU Cooler</a>
                        <a href="mobo.php">Motherboard</a>
                        <a href="ram.php">RAM</a>
                        <a href="hdd.php">Hard Disk Drive</a>
                        <a href="ssd.php">SSD</a>
                        <a href="gpu.php">GPU</a>
                        <a href="psu.php">Power Supply</a>
                        <a href="casing.php">Casing</a>
                        <a href="fan.php">Casing Cooler</a>
                        <a href="monitor.php">Monitors</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>