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
        redirect('adm_index.php');
    }
}

?>


<?php
if(empty($_GET['id'])){
    redirect('users.php');
}
$user = Users::findById($_GET['id']);


if(isset($_POST['update'])) {
        $user->username = $_POST['username'];
        $user->password = sha1($_POST['password']);
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->bio = $_POST['bio'];
        $user->phone_number = $_POST['phone_number'];
        $user->birthday = $_POST['birthday'];
        if($role == "admin"){
            $user->role = $_POST['role'];
        }

        if(!empty($_FILES['file_upload'])){
            $user->save();
            $user->saveImage();
            $user->interests();
            $session->message("The user has been updated");
            if($role != "client"){
                redirect('users.php');
            }
        }
}

?>
<style>
    .edit-user-image{
        overflow: hidden;
        margin-top: 30px;
    }
    .img-edit-user{
        padding:5px;
        width: 400px;
        height: 400px;
        margin:  0 auto;
        border-radius: 100%;
        border: 3px solid rgba(97,97,97 ,1);
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#file-css-upload-1').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-1').text(fileName);
        });
        $('#file-css-upload-2').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-2').text(fileName);
        });
        $('#file-css-upload-3').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-3').text(fileName);
        });

    });
</script>


<div class="container">
    <h2 style="text-align: center;margin-top:30px">Edit User: <?php echo $user->username; ?></h2>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12 offset-xs-0">
            <div class="edit-user-image">
                <img class="img-edit-user" src="<?php echo $user->imagePlaceholder();?>">

            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-xs-0">

            <form action="" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label >Choose images to upload</label>
                            <label class="label-css" for="file-css-upload-2">
                                <span class="file-upload-text-2">File upload</span>
                                <span class="button-file-upload-2"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                            </label>
                            <input type="file"  name="file_upload" id="file-css-upload-2" class="upload-field-css" >
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username;?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name;?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name;?>">
                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password;?>">
                        </div>


                        <div class="form-group" style="margin-top: 30px">
                            <label for="last_name">Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" value="<?php echo $user->phone_number;?>">
                        </div>
                        <div class="form-group">

                            <?php if($role == "admin"){ ?>
                                <label for="">Set Roles</label>
                                <select name="role" class="form-control">
                                    <option value="<?php echo $user->role; ?>"><?php echo $user->role; ?></option>
                                    <option value="client">Client</option>
                                    <option value="broker">Broker</option>
                                </select>
                            <?php  }?>
                        </div>
                        <div class="form-group">
                            <label for="start">Birthday:</label>
                            <input type="date" id="start" name="birthday"
                                   value="<?php echo $user->birthday;?>"
                                   min="1930-01-01" max="2018-12-31" class="form-control">
                        </div>
                    </div>
                    <hr>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">BIo</label>
                                <textarea cols="100" rows="6" name="bio" type="text" ><?php echo $user->bio;?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Update User" name="update" class="btn btn-primary edit-photo-button" >
                                <a href="delete_user.php?id=<?php echo $user->id;?>" id="user_id" class="btn btn-danger delete-photo-button">Delete User</a>
                            </div>
                        </div>

                </div>
            </form>

        </div>
    </div>
</div>


























<!---->
<!---->
<!---->
<!--<div id="page-wrapper">-->
<!--    <div class="container-fluid">-->
<!--        <!-- Page Heading -->-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <h1 class="page-header">-->
<!--                    <span class="test">Edit User</span>-->
<!--                    <small>Subheading</small>-->
<!--                </h1>-->
<!--                <p class="lead">Test:--><?php //echo $session_message;?><!--</p>-->
<!--                <p class="lead">Test:--><?php //echo $user->interests();?><!--</p>-->
<!---->
<!--                <div class="col-md-6 user_image_box">-->
<!--                    <a href="" data-toggle="modal" data-target="#photo_modal"><img class="img-responsive" src="--><?php //echo $user->imagePlaceholder();?><!--"></a>-->
<!--                </div>-->
<!---->
<!--                <form action="" enctype="multipart/form-data" method="post">-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group">-->
<!--                            <label for="file_upload">Image Upload</label>-->
<!--                            <input type="file" name="file_upload" class="form-control">-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="username">BIo</label>-->
<!--                            <textarea cols="20" name="bio" type="text" >--><?php //echo $user->bio;?><!--</textarea>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="last_name">Interests</label>-->
<!--                            <input type="checkbox" name="interests[]" value="Daily">Daily<br>-->
<!--                            <input type="checkbox" name="interests[]" value="Sunday">Sunday<br>-->
<!--                            <input type="checkbox" name="interests[]" value="Monday">Monday<br>-->
<!--                            <input type="checkbox" name="interests[]" value="Tuesday">Tuesday <br>-->
<!--                            <input type="checkbox" name="interests[]" value="Wednesday">Wednesday<br>-->
<!--                            <input type="checkbox" name="interests[]" value="Thursday">Thursday <br>-->
<!--                            <input type="checkbox" name="interests[]" value="Friday">Friday<br>-->
<!--                            <input type="checkbox" name="interests[]" value="Saturday">Saturday <br>-->
<!--                        </div>-->
<!---->
<!--                        <!---->
<!--                        <select name="interests" class="mdb-select md-form">-->
<!--                                <option value="undecided" disabled selected>Choose your option</option>-->
<!--                                <option value="Buying">Buying</option>-->
<!--                                <option value="Renting">Renting2</option>-->
<!--                            </select>-->
<!---->
<!--                        -->-->
<!---->
<!---->
<!---->
<!--                        <div class="form-group">-->
<!--                            <input type="submit" value="Update the Motherfucker" name="update" class="btn btn-primary pull-right" >-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <a href="delete_user.php?id=--><?php //echo $user->id;?><!--" id="user_id" class="btn btn-danger">Delete the Motherfucker</a>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </form>-->
<!--                <hr>-->
<!--            </div>-->
<!--        </div>-->
<!--        <!-- /.row -->-->
<!--    </div>-->
<!--    <!-- /.container-fluid -->-->
<!--</div>-->


<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>






