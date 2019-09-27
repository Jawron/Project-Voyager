<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role == 'client'){
        redirect('edit_user.php?id='.Users::clean($_SESSION['user_id']['id']));
    }
    $id = Users::clean($_SESSION['user_id']['id']);
    if($role == 'client'){
        redirect('adm_index.php');
    }
}

?>
<?php

    $photo = new Photo();

    if(isset($_POST['submit'])){
        $file = $_FILES['photos'];
        $user_id = $id;
        if($photo->saveImages($file,$user_id)){
            $session->message("Upload Successfuly");
            redirect("add_photo.php");
        }

    }
?>

<div class="container"><!--  container alert  -->
    <?php
    if(!empty($session_message)){
        echo "
        <div class=\"col-md-12\">
            <div class=\"alert alert-custom-session alert-dismissible fade show\" role=\"alert\">
                <div class=\"row\">
                    <div class=\"col-sm-1\">
                        <div class=\"session-icon\">
                            <i class=\"fas fa-exclamation-circle fa-2x\"></i>
                        </div>
                    </div>
                    <div class=\"col-sm-11\">
                        <div class=\"alert-session-text\">
                            <h1 >Hey look! An Update!</h1>
                            $session_message
                        </div>
                    </div>
                </div>
    
    
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        </div>
        ";
    }
    ?>
    <?php
    if(!empty($photo->getError())){
        echo Main_object::displayValidationErrors($photo->getError());
    }
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0">
            <div class="header-container">
                <h1 style="padding-top:50px;text-align: center">Add new Images</h1>

            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="title">Choose images to upload</label>
                    <input type="file" style="display: none" name="photos[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                    <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1
                             0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6
                              3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                            Choose a file&hellip;</strong>
                    </label>

                </div>

                <div class="form-group">
                    <input type="submit" value="Upload" name="submit" class="button-save-submit" >
                </div>
            </form>
            <ul class="add-property-info">
                <li><i class="fas fa-info-circle"></i> Only png and jpeg/jpg extensions are available</li>
                <li><i class="fas fa-info-circle"></i> Size must not excel 4 MB (4194304 bytes)</li>
                <li><i class="fas fa-info-circle"></i> You can choose multiple images to upload or just a single one.</li>
                <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                    describe two appropriate category names.</li>
            </ul>
        </div>
    </div
</div>


<script>

    'use strict';

    ( function ( document, window, index )
    {
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
            input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
        });
    }( document, window, 0 ));
</script>



<?php include("includes/footer.php"); ?>
