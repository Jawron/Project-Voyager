<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role != 'admin'){
        redirect('adm_index.php');
    }
}

?>

    <div class="container"><!--  container alert  -->
        <?php
        if(!empty($session_message)){
            echo "
            <div class=\"col-md-12\">
                <div class=\"alert alert-custom-session alert-dismissible fade show\" role=\"alert\">
                    <div class=\"row\">
                        <div class=\"col-sm-1\">
                            <div class=\"session-icon\">
                                <i class=\"fas fa-exclamation-circle fa-2x\"></i>
                            </div>
                        </div>
                        <div class=\"col-sm-11\">
                            <div class=\"alert-session-text\">
                                <h1 >Hey look! An Update!</h1>
                                $session_message
                            </div>
                        </div>
                    </div>
        
        
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
            </div>
            ";
        }
        ?>
    </div>






        <?php

        $user = new Users();
        $user_user = $user->findAll();
        ?>

    <style>

    </style>

    <div class="container">
        <div class="col">
            <div class="header-container">
                <h1>Users</h1>
                <p>Showing all registered users, active and non-active ones</p>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <?php foreach ($user_user as $user){ ?>
                <div class="col-md-4" >
                    <div class="outer-users-container">
                        <div class="option-users-container">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="edit_user.php?id=<?php echo $user->id;?>">Edit</a>
                                    <a class="dropdown-item" href="delete_user.php?id=<?php echo $user->id;?>">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="top-inner-container">
                            <div class="inner-user-image">
                                <img src="<?php echo $user->imagePlaceholder();?>" class="card-img-top">
                            </div>
                            <div class="inner-top-text">
                                <h4><?php echo $user->username; ?></h4>
                                <p class="user-email"><i class="fas fa-globe"></i> <a href="#"><?php echo $user->email; ?></a></p>
                                <p class="user-created"><i class="far fa-calendar-alt"></i> <?php echo $user->date_created; ?></p>
                                <?php
                                    if($user->active == "1"){
                                        echo "<p class=\"user-status-active\"><i class=\"fas fa-check-circle\"></i> Verified</p>";
                                    } else {
                                        echo "<p class=\"user-status-notactive\"><i class=\"fas fa-user-times\"></i> Not Active</p>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="middle-inner-container">
                            <div class="inner-middle-info">
                                <div class="inner-middle-name">
                                    <p><strong><i class="fas fa-signature"></i></strong> <?php echo $user->first_name; ?></p>
                                    <p><strong><i class="fas fa-signature"></i></strong> <?php echo $user->last_name; ?></p>
                                </div>
                                <div class="inner-middle-contact">
                                    <p><strong><i class="fas fa-address-book"></i></strong> <?php echo $user->phone_number; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-inner-name">
                            <div class="inner-user-bio">
                                <h5>Bio:</h5>
                                <p><span class="quotes-users">"</span><?php echo $user->bio; ?><span class="quotes-users">"</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
    </div>



<?php include("includes/footer.php"); ?>
