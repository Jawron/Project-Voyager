
<?php
$footer_type = new FooterClass();
if(isset($_POST['submit4'])){
    $footer_type->type = "four_column";
    $footer_type->field_1 = $_POST['field_1'];
    $footer_type->field_2 = $_POST['field_2'];
    $footer_type->field_3 = $_POST['field_3'];
    $footer_type->field_4 = $_POST['field_4'];
    $footer_type->copyright = $_POST['copyright'];



    $footer_type->saveFooterFourColumn();
}


$existing_footer = new FooterClass();

$existing_footer->returnFooterInfo('two_column');
?>






<div class="container">
    <form action=""  method="post">
        <div class="form-group">
            <label for="field_1">Field 1</label>
            <input type="text" name="field_1" class="form-control" value="<?php echo $existing_footer->field_1; ?>">
        </div>
        <div class="form-group">
            <label for="field_2">Field 2</label>
            <input type="text" name="field_2" class="form-control" value="<?php echo $existing_footer->field_2; ?>">
        </div>
        <div class="form-group">
            <label for="field_3">Field 3</label>
            <input type="text" name="field_3" class="form-control" value="<?php echo $existing_footer->field_3; ?>">
        </div>
        <div class="form-group">
            <label for="field_4">Field 4</label>
            <input type="text" name="field_4" class="form-control" value="<?php echo $existing_footer->field_4; ?>">
        </div>
        <div class="form-group">
            <label for="copyright">Copyright</label>
            <input type="text" name="copyright" class="form-control" value="<?php echo $existing_footer->copyright; ?>">
        </div>

        <div class="form-group">
            <input type="submit" value="Create a ONE" name="submit4" class="btn btn-primary pull-right" >
        </div>
    </form>
</div>