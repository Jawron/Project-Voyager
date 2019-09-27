<?php include("includes/header.php"); ?>
<?php include("includes/main-nav.php"); ?>
<?php
$search = new Property();
if(isset($_POST['search'])){
    $search_term = trim($_POST['search_term']);

}

?>

<div class="container">
    <div class="row">
        <?php $search->getSearchProperties($search_term); ?>
    </div>
</div>
