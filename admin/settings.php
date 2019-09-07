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
<?php
$footer = new FooterClass();
if(isset($_POST['submitvv'])){
    $footer->type = $_POST['type'];

    $footer->saveFooterType();
}



?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add a Category
                        <small>Subheading</small>
                    </h1>
                </div>
                <div class="col-md-10 offset-1" style="background-color: #dadfe1;border-radius: 5px;border:1px solid #fff">
                    <div class="col">
                        <h1>Footer Options</h1>
                        <form action=""  method="post">
                            <select name="type" id="single">
                                <option value="one_column">One Column</option>
                                <option value="two_column">Two Column</option>
                                <option value="three_column">Three Column</option>
                                <option value="four_column">Four Column</option>
                            </select>

                            <div class="form-group">
                                <input type="submit" value="Save footer type" name="submitvv" class="btn btn-primary pull-right" >
                            </div>
                        </form>

                        <div class="col offset-2" id="footer-selection">
                            <?php $footer->getType($footer->findTypeDb());?>
                        </div>
                        <p><?php echo html_entity_decode("&lt;?php echo &quot;TEST2&quot;; ?&gt;")?></p>

                    </div>
                </div>

                <hr>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

<!--    <script>-->
<!--        function displayVals() {-->
<!--            var singleValues = $( "#single" ).val();-->
<!---->
<!--            $( "#footer-selection" ).load( ""+ singleValues +");
//        }
//
//        $( "select" ).change( displayVals );
//        displayVals();
//    </script>-->
<?php include("includes/footer.php"); ?>