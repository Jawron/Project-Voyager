<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role != 'admin'){
        redirect('edit_user.php?id='.Users::clean($_SESSION['user_id']['id']));
    }
}

?>

<div class="container">

    <div class="col-md-12">
        <?php echo "<h1>$session_message </h1>"; ?>

        <?php

        $user = new Users();
        $user_user = $user->findAll();
        ?>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>UserName</th>
                <th>FirstName</th>
                <th>LastName</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($user_user as $user){ ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->role; ?></td>
                    <td>
                        <?php echo $user->username; ?>
                        <div class="action_link">
                            <a href="delete_user.php?id=<?php echo $user->id;?>">Delete</a>
                            <a href="edit_user.php?id=<?php echo $user->id;?>">Edit</a>
                        </div>
                    </td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php echo $user->user_image; ?></td>

                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>

</div>



<?php include("includes/footer.php"); ?>
