


<div class="container">
    <nav class="navbar navbar-expand-lg " style="z-index:1">
        <a class="navbar-brand" href="index.php">
            <img src="admin/images/logo.png" style="height: 70px;width: auto">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="navbar-nav custom-main-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="front_properties.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/login.php">Login</a>
                </li>
                <?php

                if(isset($_SESSION['user_id']['role'])){
                    echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href='admin/adm_index.php'>Dashboard</a>
            </li>";
                } else {
                    echo "";
                }
                ?>
            </ul>
        </div>
    </nav>
</div>
<style>

</style>























<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
<!--    <a class="navbar-brand" href="#">Navbar</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarNav">-->
<!--        <ul class="navbar-nav">-->
<!---->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Features</a>-->
<!--                </li><li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Features</a>-->
<!--                </li><li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Features</a>-->
<!--                </li><li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Features</a>-->
<!--                </li>-->


<!---->
<!---->
<!---->
<!---->
<!--            --><?php
//
//            if(isset($_SESSION['user_id']['role'])){
//                echo "<li class=\"nav-item\">
//                <a class=\"nav-link\" href=\"#\">only admins sees this</a>
//            </li>";
//            } else {
//                echo "<li class=\"nav-item\">
//                <a class=\"nav-link\" href=\"#\">all sees this</a>
//            </li>";
//            }
//
//            ?>
<!---->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Features</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Pricing</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="admin/adm_index.php">Admin</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->

