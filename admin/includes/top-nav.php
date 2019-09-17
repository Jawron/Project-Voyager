
<!---->
<!--<nav class="navbar navbar-expand-lg justify-content-center ">-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse justify-content-center " id="navbarNav">-->
<!--        <ul class="navbar-nav ">-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link active" href="users.php">USERS</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="categories.php">Categories</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="add_property.php">Add Property</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="properties.php">properties</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--            </li>-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gallery</a>-->
<!--                <div class="dropdown-menu">-->
<!--                    <a class="dropdown-item" href="add_photo.php">Add Photos</a>-->
<!--                    <a class="dropdown-item" href="photos.php">Gallery</a>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sliders</a>-->
<!--                <div class="dropdown-menu">-->
<!--                    <a class="dropdown-item" href="create_slider.php">Add Slider</a>-->
<!--                    <a class="dropdown-item" href="sliders.php">Sliders</a>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="settings.php" tabindex="-1">Settings</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->
<!---->

<style>
    .menu-icon-admin{
        /*width: 30px;*/
        text-align: center;
        margin: 0 auto;
        font-size: 1.5em;
    }
    .navbar-nav .nav-item > .nav-link{
        text-align: center;
        color: white;letter-spacing: 1px;
        font-family: 'Raleway', sans-serif;
        font-size: 0.8em;
        text-transform: uppercase;
        text-shadow: rgba(149,165,166 ,0.6) 1px 1px 1px,
        rgba(149,165,166 ,0.7) 2px 2px 2px,
        rgba(149,165,166 ,0.8) 3px 3px 3px,rgba(149,165,166 ,1) 4px 4px 4px;
    }
    .menu-li-admin{
        min-width: 130px;
        border: 1px solid rgba(255,255,255 ,0.2);
        margin-left: -1px;
        font-weight: 800;
        color: white;
        box-shadow: rgba(74,84,89 ,0.1) 1px 1px 1px;
    }
    .navbar-menu-admin{
        /*box-shadow: rgba(127,140,141 ,0.5) 1px 1px 1px 1px;*/
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-menu-admin" style="padding-top: 0px;background-color: rgba(105,121,126 ,0.4) !important;padding-bottom:5px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item  menu-li-admin">
                <a class="nav-link" href="adm_index.php">
                    <p class="menu-icon-admin"><i class="fas fa-tachometer-alt"></i></p>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item menu-li-admin">
                <a class="nav-link" href="properties.php">
                    <p class="menu-icon-admin"><i class="fas fa-house-damage"></i></p>
                    properties <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item menu-li-admin">
                <a class="nav-link" href="users.php">
                    <p class="menu-icon-admin"><i class="fas fa-users"></i></p>
                    Users <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item menu-li-admin">
                <a class="nav-link" href="categories.php">
                    <p class="menu-icon-admin"><i class="fas fa-align-center"></i></p>
                    categories <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item menu-li-admin">
                <a class="nav-link" href="photos.php">
                    <p class="menu-icon-admin"><i class="fas fa-photo-video"></i></p>
                    gallery <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item menu-li-admin">
                <a class="nav-link" href="settings.php">
                    <p class="menu-icon-admin"><i class="fas fa-cogs"></i></p>
                    settings <span class="sr-only">(current)</span>
                </a>
            </li>


        </ul>
    </div>
</nav>