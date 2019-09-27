<?php
?>






<div class="container">
    <div class="row">
        <h1 class="lead" style="text-align: center;font-size: 2.6em;padding: 30px"> SAVED PROPERTIES</h1>
    </div>
    <div class="row">
        <?php
        $saved_properties = new Property();
        $saved_properties->getWhislistProperties($id);
        ?>
    </div>
</div>
