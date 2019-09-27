
<?php
$footer_type = new FooterClass();
if(isset($_POST['submit4'])){
    $footer_type->type = "four_column";
    $footer_type->field_1 = FooterClass::clean($_POST['field_1']);
    $footer_type->field_2 = FooterClass::clean($_POST['field_2']);
    $footer_type->field_3 = FooterClass::clean($_POST['field_3']);
    $footer_type->field_4 = FooterClass::clean($_POST['field_4']);
    $footer_type->copyright = FooterClass::clean($_POST['copyright']);



    $footer_type->saveFooterFourColumn();
}


$existing_footer = new FooterClass();

$existing_footer->returnFooterInfo('two_column');
?>
<h4>Currently using the 4 Column format</h4>

    <form action=""  method="post">
        <div class="row">
            <div class="col-md-6 col-xs 12">
                <div class="form-group">
                    <label for="field_1">Field 1</label>
                    <textarea type="text" name="field_1" class="form-control" rows="6"><?php echo $existing_footer->field_1; ?></textarea>
                </div>
            </div>
            <div class="col-md-6 col-xs 12">
                <div class="form-group">
                    <label for="field_2">Field 2</label>
                    <textarea type="text" name="field_2" class="form-control" rows="6"><?php echo $existing_footer->field_2; ?></textarea>
                </div>
            </div>
            <div class="col-md-6 col-xs 12">
                <div class="form-group">
                    <label for="field_3">Field 3</label>
                    <textarea type="text" name="field_3" class="form-control" rows="6"><?php echo $existing_footer->field_3; ?></textarea>
                </div>
            </div>
            <div class="col-md-6 col-xs 12">
                <div class="form-group">
                    <label for="field_4">Field 4</label>
                    <textarea type="text" name="field_4" class="form-control" rows="6"><?php echo $existing_footer->field_4; ?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="copyright">Copyright</label>
            <input type="text" name="copyright" class="form-control" value="<?php echo $existing_footer->copyright; ?>">
        </div>

        <div class="form-group">
            <input type="submit" value="Save" name="submit4" class="btn footer_column_btn w-100" >
        </div>
    </form>
</div>