<?php include ('includes/header.php');?>


<section>
    <div class="container">
        <div class="jumbotron border-b-1-0">
            <h1 class="display-4">
                <?php
                if(!empty($_GET)){
                    $activate = new Users;
                    $activate->activateUser();
                } else {
                    redirect("../index.php");
                }


                ?>
            </h1>
        </div>
    </div>
</section>




<?php include ('includes/footer.php');?>