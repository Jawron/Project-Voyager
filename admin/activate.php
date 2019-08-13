<?php include ('includes/header.php');?>


<section>
    <div class="container">
        <div class="jumbotron border-b-1-0">
            <h1 class="display-4">
                <?php
                    $activate = new Users;
                    $activate->activateUser();
                    $session->message("The category  : {$category->cat_name} has been created");
                ?>
            </h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
</section>




<?php include ('includes/footer.php');?>