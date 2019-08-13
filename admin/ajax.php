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


<table id="tblList">
    <tbody id="someTest">
    <tr data-userid="801992084067">
    <tr data-userid="451207954179">
    <tr data-userid="310896831399">
    <tr data-userid="863939754980">
    <tr data-userid="1123542226482">
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    $(document).ready(function(){

        var rowId = $("#someTest tr").last().attr("data-userid");

    })
</script>













<?php include("includes/footer.php"); ?>
