<?php include("includes/header.php"); ?>
<?php include("includes/main-nav.php"); ?>






<!--<div class="container">-->
<!--    <div class="jumbotron">-->
<!--        <h1 class="display-4">--><?php //echo $session_message;?><!--</h1>-->
<!--        <p class="lead">This is the index page of the front end of the site.</p>-->
<!--        <hr class="my-4">-->
<!--        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>-->
<!--        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>-->
<!--    </div>-->
<!--</div>-->

<!---->
<!--    --><?php //$slides = new Slider(); ?>
<!--    <div class="container-fluid front-page-slider">-->
<!--        <div id="slideshow" style="margin-bottom: 20px">-->
<!--            <div class="slide-wrapper">-->
<!--                --><?php //$slides->returnFrontPageSlider(); ?>
<!----><?php ////$slides->getPhotos($_GET['id']); ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php $slides = new Slider();
?>

<style>

</style>
    <div id="demo" class="carousel slide front-page-slider" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active">sddsdsd</li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php $slides->returnFrontPageSlider(); ?>
            <div class="carousel-item active">
                <img src="la.jpg" alt="Los Angeles" width="1100" height="610">
                <div class='container-fluid'>
                    <div class='slider-text-info'>
                        <p class='title-slider'>{$slides['title']}</p>
                        <p class='desc'>{$slides['description']}</p>
                        <p class='call-to-action'><a href='front-properties.php'>{$slides['call_to_action']} <i class='fas fa-arrow-right'></i></a></p>
                        </div>
                    </div>
                </div>

        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev" style="z-index: 111">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next"  style="z-index: 111">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
<div class="clearfix" style="padding-top: 610px"></div>


<?php

$properties = new Property();


?>
<style>


</style>
<div class="container" ">
    <div class="row">

        <?php $properties->getAllProperties(6); ?>
    </div>
</div>
<style>

</style>

<!--    <div class="container" >-->
<?php //$search_term = 'banner';?>
<!--    <h3>Searching for : "--><?php //echo $search_term; ?><!--"</h3><br><br><br>-->
<!--    <div class="row">-->
<!---->
<!--        --><?php //$properties->getSearchProperties($search_term); ?>
<!--    </div>-->
<!--    </div>-->
<br>
<br>
<br>
<div class="container">

    <form action="search.php" method="post">
        <input type="text" name="search_term">
        <input type="submit" name="search" value="SEARCH">
    </form>
</div>























<?php include("includes/footer.php"); ?>