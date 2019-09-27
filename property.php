<?php include("includes/header.php"); ?>
<?php include("includes/main-nav.php"); ?>


<?php
$existing_property = Property::findById($_GET['id']);
$existing_photo = Photo::findById($_GET['id']);
?>

<style>
    .thumb-images-property{
        width: 30%;
        height: auto;
        margin: 5px;
        border: 1px solid #fff;
        display: inline;
    }
    .fluid-bg-property-gallery{
        background-color: #303441;
        padding:25px;
    }
    .fluid-bg-title{
        padding: 25px;
        background-color: #3b3e4b;
        color: white;
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
    }
    .fluid-bg-title h2 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 200;
    }
    .property-contact-info{
        width: 100%;
        min-height: 300px;
        background-color: rgba(250,250,250 ,1);
        padding: 15px;
        margin: 35px 5px 5px 5px;
        box-shadow: 10px 11px 30px rgba(0,0,0,.25);
        border-top: 3px solid rgba(158,158,158 ,1);
    }
    .property-contact-info .c-title{
        text-align: center;
        font-weight: 300;
        font-size: 1.1em;
        padding: 10px 0 15px;
    }
    .property-contact-info .c-info{
        margin: 5px;
        font-weight: 700;
        text-shadow: rgba(189,189,189 ,1) 1px 1px 1px;
        position: relative;
    }
    .property-contact-info .c-info span {
        right: 4px;
        position: absolute;
        color: #3b3e4b;
        font-weight: 300;
    }
    .property-contact-info .c-info .fas{
        color: rgba(229,115,115 ,1);
        padding-right: 2px;
        width: 20px;
    }
    .property-options {
        border: 1px solid #1d2124;
        padding:20px 10px
    }
    .option-property {
        display: inline-block;
        width: 24%;
        padding:5px;
        text-align: center;
        font-weight: 300;
        font-size: .9em;
        margin-bottom: 0;
    }
    .option-property .fas {
        color: rgba(76,175,80 ,1);
    }
    .big-icon{
        text-align: right;
        font-size: 2.9em;
    }
    .big-icon-text{
        padding-top: 14px;
        margin-left: -15px;
        line-height: 1.4em;
    }

</style>

<div class="container-fluid fluid-bg-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h2><?php echo $existing_property->title;?></h2>
            </div>
            <div class="col-md-6 col-xs-12">
                <h2 style="text-align: right;padding-right: 15px"><strong>Price: </strong><?php echo $existing_property->price;?> $</h2>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fluid-bg-property-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: auto">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php $existing_property->getPhotosProperty($_GET['id']) ?>
                            <?php $existing_property->getPhotosPropertyFeaturedImage($_GET['id']); ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php $existing_property->getAllPropertyImagesThumb($_GET['id']);?>
                <div class="container">
                    <div class="row">
                        <div class="property-contact-info">
                            <p class="c-title">Contact Information</p>
                            <p class="c-info"><i class="fas fa-user"></i> Sold by:<span><?php echo $existing_property->getUsernameFromId($_GET['id']);?></span></p>
                            <p class="c-info"><i class="fas fa-phone"></i> Phone Number:<span><?php echo $existing_property->contact_number;?></span></p>
                            <p class="c-info"><i class="fas fa-table"></i> Valid until:<span><?php echo $existing_property->convertUnixTimeToDate($existing_property->expiration)   ;?></span></p>
                            <p class="c-info"><i class="fas fa-hands-helping"></i> Transaction:<span><?php echo $existing_property->transaction   ;?></span></p>
                            <p class="c-info"><i class="fas fa-dollar-sign"></i> Price:<span><?php echo $existing_property->price   ;?></span></p>
                            <p class="c-info"><i class="fas fa-home"></i> Type:<span><?php echo $existing_property->type   ;?></span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <p class="lead">Description</p>
            <?php echo $existing_property->description   ;?>
        </div>
        <div class="col-md-6 col-xs-12">
            <p class="lead" style="margin-bottom: 15px;padding-bottom: 1px"><strong>Adress:</strong> <?php echo $existing_property->address;?></p>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="450" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?php echo $existing_property->address;?>&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                <style>.mapouter{position:relative;height:450px;width:100%;}
                    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
                </style>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="lead">Property options:</p>
            <div class="property-options">

                <?php $options= $existing_property->stringToArray($existing_property->options);

                foreach ($options as $option){?>


                        <p class="option-property"><i class="fas fa-check-square"></i> <?php echo $option;?></p>



               <?php } ?>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <p class='big-icon'style=""><i class="fas fa-check-square"></i></p>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <p class="big-icon-text">Bathrooms<br> 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<?php include("includes/footer.php"); ?>