
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
        <ul class="navbar-nav mx-5">
            <li class="nav-item">
                <a class="nav-link no-shadow" href="../index.php"><i class="fab fa-houzz"></i> Homepage</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle no-shadow" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Useful Links
                </a>
                <div class="dropdown-menu custom-dropmenu-admin" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="edit_user.php?id=<?php echo $_SESSION['user_id']['id'];?>"><i class="fas fa-user"></i> Edit Persona</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fas fa-user-slash"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>

</style>