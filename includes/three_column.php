<?php

$existing_footer = new FooterClass();

$existing_footer->returnFooterInfo('three_column');

?>



<div class="col-md-6 offset-3">
    <h1><?php echo $existing_footer->field_1; ?></h1>
</div>
<div class="col-md-12">
    <p class="lead"><?php echo $existing_footer->copyright;?></p>

</div>
