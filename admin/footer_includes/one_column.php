
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
<h4>Currently using the 1 Column format</h4>
<form action=""  method="post">
    <div class="form-group">
        <label for="field_1">Main field</label>
        <textarea type="text" name="field_1" class="form-control" rows="6"><?php echo $existing_footer->field_1; ?></textarea>
    </div>
    <div class="form-group">
        <label for="copyright">Copyright</label>
        <input type="text" name="copyright" class="form-control" value="<?php echo $existing_footer->copyright; ?>
">
    </div>
    <div class="form-group">
        <input type="submit" value="Save" name="submit1" class="btn footer_column_btn w-100" >
    </div>
</form>
