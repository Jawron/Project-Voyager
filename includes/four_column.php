<?php

$existing_footer = new FooterClass();

$existing_footer->returnFooterInfo('four_column');

?>



<div class="row">
    <div class="col-md-3 col-xs-12 offset-xs-0">
        <?php echo html_entity_decode($existing_footer->field_1); ?>
    </div>
    <div class="col-md-3 col-xs-12 offset-xs-0">
        <?php echo html_entity_decode($existing_footer->field_2); ?>
    </div>
    <div class="col-md-3 col-xs-12 offset-xs-0">
        <?php echo html_entity_decode($existing_footer->field_3); ?>
    </div>
    <div class="col-md-3 col-xs-12 offset-xs-0">
        <?php echo html_entity_decode($existing_footer->field_4); ?>
    </div>
</div>
<div class="col-md-12">
    <p class="lead" style="color:white;font-size:.8em;text-align: center;padding:15px"><?php echo html_entity_decode($existing_footer->copyright);?></p>

</div>

