
<?php
$footer_type = new FooterClass();
if(isset($_POST['submit1'])){
    $footer_type->type = "one_column";
    $footer_type->field_1 = $_POST['field_1'];
    $footer_type->copyright = $_POST['copyright'];

    $footer_type->saveFooterOneColumn();
}



$existing_footer = new FooterClass();

$existing_footer->returnFooterInfo('one_column');


?>






<div class="container">
<form action=""  method="post">
    <div class="form-group">
        <label for="field_1">Field 1</label>
        <input type="text" name="field_1" class="form-control" value="<?php echo $existing_footer->field_1; ?>
">
    </div>
    <div class="form-group">
        <label for="copyright">Copyright</label>
        <input type="text" name="copyright" class="form-control" value="<?php echo $existing_footer->copyright; ?>
">
    </div>

    <div class="form-group">
        <input type="submit" value="Create a ONE" name="submit1" class="btn btn-primary pull-right" >
    </div>

</form>
</div>
