<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/stylebody.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <div class="text logo-text">
                    <span class="name"><?php
                                        session_start();
                                        $name = $_SESSION['name'];
                                        echo $name;
                                        ?>
                    </span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="http://localhost/PHP/ASSIGNMENT/user.php?s=0&p=8">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">User</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="http://localhost/PHP/ASSIGNMENT/product.php?s=0&p=4">
                            <i class='bx bxs-basket icon'></i>
                            <span class="text nav-text">Product</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="register_page.php">
                            <i class='bx bxs-user-plus icon'></i>
                            <span class="text nav-text">Add User</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
            <?php
            $name = $_SESSION['name'];
            echo 'Welcome ' . $name;
            ?>
        </div>
        <!-- <?php
        include("user.php")
        ?> -->
    </section>

    <script src="js/body.js"></script>

</body>

</html>