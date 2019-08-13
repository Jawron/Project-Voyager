

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <ul class="navbar-nav mx-5">
                    <?php
                    if($_SESSION['user_id']['role'] == "admin"){
                        echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">only admins sees this</a>
            </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-bell"></i> Notifications</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-envelope"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-user-slash"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
