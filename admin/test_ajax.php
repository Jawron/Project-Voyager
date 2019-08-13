<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
}

?>
<script>
    $(document).ready(function(){
        var commentsCount = 2;
        $("#btn").click(function(){
            commentsCount = commentsCount + 2;
            $("#comments").load("load-comments.php",{
                commentNewCount: commentsCount
            });
        });
    });
</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div id="comments" style="padding-bottom:10px;background-color: #fff">
                <?php
                $user= Users::findByQuery("SELECT * FROM users LIMIT 2");

                foreach ($user as $user){ ?>

                        <?php echo $user->username; ?></br>
                        <?php echo $user->role; ?>

                <?php } ?>
                </div>
                <button id="btn">Show more comments</button>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<?php include("includes/footer.php"); ?>
