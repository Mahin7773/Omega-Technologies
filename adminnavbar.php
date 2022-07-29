<?php
include 'server.php';
include 'change.php';
?>

<header style="position: relative; margin:-10px; ">
    <img src="images/Omega Technologies-logos_transparent.png" alt="" height="100" width="100">
    <nav>
        <ul>
            <li><a href="admin.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
            <li><a href="all products.php"><i class="fa-solid fa-earth-americas"></i> All Products</a></li>
            <li><a href="new product.php"><i class="fa-solid fa-file-circle-plus"></i> New Product</a></li>
            <li><a href="inbox.php"><i class="fa-solid fa-message"></i> Inbox</a></li>
            <li>
                <?php
                change();
                ?>
            </li>
        </ul>
    </nav>
</header>