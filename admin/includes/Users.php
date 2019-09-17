<?php
require_once("C:/xampp/htdocs/Project-Voyager/vendor/autoload.php");

class Users extends  Main_object
{

    protected static $db_table = "users";
    protected static $db_table_fields = [
        'first_name',
        'last_name',
        'email',
        'role',
        'bio',
        'username',
        'password',
        'validation_code',
        'active',
        'phone_number',
        'birthday'
    ];
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $role;
    public $user_image;
    public $bio;
    public $username;
    public $password;
    public $validation_code;
    public $active;
    public $date_created;
    public $phone_number;
    public $interests;
    public $birthday;
    public $tmp_path;
    public $type;
    public $size;
    public $errors = array();
    public $upload_directory = "images";
    public $image_placeholder = "https://via.placeholder.com/100&text=image";


    private function setError($message) {
        if (empty($this->errors)) {
            $this->errors = $message;
        }
    }

    public function getError(){
        if(is_array($this->errors)){
            foreach ($this->errors as $error) {
                return $error;
            }
        } else {
            return $this->errors;
        }
    }


    public function interests(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->interests = implode(',',$_POST['interests']);
            //echo var_dump($this->interests);
            global $database;
            $sql = "UPDATE users SET interests = '".$this->interests."' WHERE id = ".$this->id;
            $database->query($sql);
        }

    }

    public function imagePlaceholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }

    public function saveImage(){
        if($_SERVER['REQUEST_METHOD'] == "FILES" || $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->user_image = $this->username.'-'.$_FILES['file_upload']['name'];
            $this->size =$_FILES['file_upload']['size'];
            $this->tmp_path =$_FILES['file_upload']['tmp_name'];
            $this->type=$_FILES['file_upload']['type'];
        }
        $exploded = explode('.',$this->user_image);
        $file_ext = strtolower(end($exploded));

        $extensions= array("jpeg","jpg","png");

        if(empty($this->tmp_path) || empty($this->user_image)){
            $this->errors[] = "File not found!";
        }

        if(file_exists($this->user_image)){
            $this->errors[] = "File with the name $this->user_image already exists";
        }

        if(in_array($file_ext,$extensions)=== false){
            $this->errors[]="Extension not allowed, please choose a JPEG or PNG file.";
        }

        if($this->size > 4097152){
            $this->errors[]='File size must be lower than 4MB';
        }

        if(empty($errors)==true){
            if(move_uploaded_file($this->tmp_path,$this->upload_directory.DS.$this->user_image)){
                unset($this->tmp_path);
                global $database;
                $sql = "UPDATE users SET user_image = '".$this->user_image."' WHERE id = ". $this->id;
                $database->query($sql);

            }
        }else{
            foreach ($this->errors as $error){
                echo $error;
            }
        } 
    }

    public function deleteUser(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->user_image;

            return unlink($target_path) ? true : false;

        } else {
            return false;
        }
    }


    //Checks if the user exists in the database and retrieves some information
    public function verifyUser($username, $password,$remember)
    {
        global $database;
        $username = $database->escapeString($username);
        $password = $database->escapeString($password);
        $remember = $database->escapeString($remember);

        $errors = [];
        if (empty($username)) {
            $errors[] = "Email field cannot be <strong>EMPTY</strong>";
        }

        if (empty($password)) {
            $errors[] = "Password field cannot be <strong>EMPTY</strong>";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo Main_object::displayValidationErrors($error);
            }
        } else {

                $sql = "SELECT id,username,role,password,email FROM users WHERE ";
                $sql .= "username = '$username' ";
                $sql .= "AND active = 1 ";
                $sql .= "LIMIT 1";

                $result = $database->query("$sql");

                if($this->rowCount($result) == 1){
                    //the result is stored as an array
                    $row = mysqli_fetch_assoc($result);
                    $db_password = $row['password'];
                    $db_username = $row['username'];

                    if(sha1($password) === $db_password){
//                        if ($remember == 1) {
//                            return setcookie("username", $db_username, time() + 86400);
//                        }
                        //if the stored variable is NOT empty will return it
                        if (!empty($row)) {
                            return $row;
                        } else {
                            return false;
                        }
                    }
                }





            }
        }







    public function sentMail($email, $subject, $msg, $headers = null)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host = Mail_info::SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = Mail_info::SMTP_USER;                     // SMTP username
            $mail->Password = Mail_info::SMTP_PASSWORD;                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = Mail_info::SMTP_PORT;                                    // TCP port to connect to
            $mail->setFrom('lapos.alex88@gmail.com', 'Lapos Alex');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $msg;
            $mail->AltBody = $msg;

            if ($mail->send()) {
                echo 'Message has been sent';

                return true;
            }


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    //Generates a token for the the cookie user
    public function tokenGenerator()
    {
        $token = $_SESSION['token'] = sha1(uniqid(mt_rand(), true));

        return $token;
    }

    //counts the row affected
    public function rowCount($result)
    {
        return mysqli_num_rows($result);
    }

    //Checks if a email exists
    public function emailExist($email)
    {
        global $database;
        $sql = "SELECT id FROM users WHERE email = '$email'";

        $result = $database->query($sql);

        if ($this->rowCount($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    //Checks if a username exists
    public function usernameExist($username)
    {
        global $database;
        $sql = "SELECT id FROM users WHERE username = '$username'";

        $result = $database->query($sql);

        if ($this->rowCount($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    //User registration function
    public function registerUser($first_name, $last_name, $username, $email, $password)
    {
        global $database;
        $first_name = $database->escapeString($first_name);
        $last_name = $database->escapeString($last_name);
        $username = $database->escapeString($username);
        $email = $database->escapeString($email);
        $password = $database->escapeString($password);
        $role = "client";

        if ($this->emailExist($email)) {
            return false;
        } elseif ($this->usernameExist($username)) {
            return false;
        } else {

            $password = sha1(
                $password
            ); //transforms the password in a non human readable format to be stored in the database

            $validation_code = sha1($username.microtime()); //generates a code for the activate user form

            $sql = "INSERT INTO users (first_name,last_name,username,role,email,password,validation_code,active,date_created )";
            $sql .= " VALUES('$first_name','$last_name','$username','$role','$email','$password','$validation_code','0',NOW())";
            $result = $database->query($sql);


            //Creates the headers,subject,message for the activate user email
            $subject = "Activate account";
            $msg = "Please click the link below to activate your account<br>
            <a href='".$_SERVER['HTTP_HOST']."/login/activate.php?email=$email&code=$validation_code'>
            http://".$_SERVER['HTTP_HOST']."/login/activate.php?email=$email&code=$validation_code
            </a>";
            $headers = "From: noreply@localhost.ro";

            //if the mail has been sent return true
            if ($this->sentMail($email, $subject, $msg, $headers)) {
                return true;
            }

        }
    }

    //Validates the form to check it respects the rules
    public function validateUserRegistration()
    {
        if (isset($_POST['submit'])) {
            $first_name = Main_object::clean($_POST['first_name']);
            $last_name = Main_object::clean($_POST['last_name']);
            $username = Main_object::clean($_POST['username']);
            $email = Main_object::clean($_POST['email']);
            $password = Main_object::clean($_POST['password']);
            $confirm_password = Main_object::clean($_POST['confirm_password']);

            $min = 3;// minimum length for the username,first name,last name
            $max = 30;// maximum length for the username,first name,last name
            $values = ['first_name' => 'Fist Name', 'last_name' => 'Last Name', 'username' => 'Username'];
            $errors = [];

            //Loops thru the array and checks if its values respect the $min or $max
            foreach ($values as $key => $value) {
                if (strlen($$key) < $min || strlen($$key) > $max) {
                    $errors[] = "<strong>$value</strong> dosent corespond with the required length , needs to me grater than 3 and smaller than 30!!";
                }
            }

            //Checks if the mail exists and outputs an error if it does
            if ($this->emailExist($email)) {
                $errors[] = "<strong>$email</strong> already exists!!";
            }

            //Checks if the username exists and outputs an error if it does
            if ($this->usernameExist($username)) {
                $errors[] = "<strong>$username</strong> is already taken!!";
            }

            //Checks if the passwords are the same and outputs an error if it does
            if ($password !== $confirm_password) {
                $errors[] = "Password <strong>DOES NOT </strong> match! Ensure that they do.";
            }

            //If the above code has generated an error the following function will output the errors
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $this->displayValidationErrors($error);
                }
            } else {
                if ($this->registerUser($first_name, $last_name, $username, $email, $password)) {

                    //$session->message("<p class='bg-success text-center'>Please check your email for activation code</p>");

                    //redirect("../index.php");

                    echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                User: <strong>$username</strong> has been registered with success.
                <br>Please check your email for activation code<br>
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>";
                } else {
                    echo "Mild error with regisering";
                    //$session->message("<p class='bg-danger text-center'>Sorry , we could not register the user</p>");
                }
            }
        }
    }


    //Activates the user via a GET method, How it works:
    //  -after the user has registered a validation code has been generated, stored in the database and sent it to his email withing a link
    // that he can click
    //  -after he clicks on the link the validation code from the database will be 0 and the active field from the
    // database will be 1 (meaning he is active)
    public function activateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['email'])) {
                global $database;
                global $session;
                $email = Main_object::clean($_GET['email']);
                $validation_code = Main_object::clean($_GET['code']);

                $sql = "SELECT id FROM users WHERE email = '".$database->escapeString(
                        $email
                    )."' AND validation_code = '".$database->escapeString($validation_code)."'";
                $result = $database->query($sql);
                //echo var_dump($result);

                if ($this->rowCount($result) == 1) {
                    $sql = "UPDATE users SET active = 1, validation_code = 0 WHERE email = '".$database->escapeString(
                            $email
                        )."' AND validation_code='".$database->escapeString($validation_code)."'";
                    $result = $database->query($sql);


                    $session->message(
                        "Your account has been <strong>Activated</strong>. Please login."
                    );

                    redirect("login.php");
                } else {
                    $session->message(
                        "Your account <strong>could NOT</strong> be activated.Check your email 
                                address or try again to register."
                    );

                    redirect("register.php");
                }

            }
        }
    }



    public function recoverPassword(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            global $database;
            global $session;
            if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']){
                $email = $database->escapeString($_POST['email']);

                if($this->emailExist($email)){

                    $validation_code = sha1($email . microtime());

                    setcookie('temp_access_code', $validation_code, time() + 600);

                    $sql = "UPDATE users SET validation_code ='".$database->escapeString($validation_code)."' WHERE email = '".$database->escapeString($email)."'";
                    $result = $database->query($sql);

                    $subject = "Please reset your password";
                    $msg = "Here is your password reset code:<br>
                    <strong>$validation_code</strong><br>
                    <strong>http://localhost:8181/Project-Voyager/admin/code.php?email=$email&code=$validation_code</strong>
                    Click here to reset password <a href=''><strong>GO TO RECOVER PASSWORD</strong></a>
                ";
                    $headers = "From my appLogin";

                    if($this->sentMail($email,$subject,$msg,$headers)){
                        echo "<div class=\"alert alert - warning alert - dismissible fade show\" role=\"alert\">
                Email has been registered with <strong>success</strong>.
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>";
                    }

                    $session->message("Please check your email for a password  code");
                    redirect("../index.php");

                } else {
                    echo Main_object::displayValidationErrors("this email dosen't exist");
                }
            } else {
                redirect('index.php');
            }

            if(isset($_POST['cancel_submit'])) {
                redirect("login.php");
            }
        }

    }




    public function validateCode(){
        global $session;
        if(isset($_COOKIE['temp_access_code'])){

            global $database;

            if(!isset($_GET['email']) && !isset($_GET['code'])){
                redirect("../index.php");

            } else if (!isset($_GET['email']) || !isset($_GET['code'])){
                redirect("../index.php");
            } else {
                if(isset($_POST['code'])){
                    $email = Main_object::clean($_GET['email']);
                    $validation_code = Main_object::clean($_POST['code']);

                    $sql = "SELECT id FROM users WHERE validation_code ='".$database->escapeString($validation_code)."' AND email = '".$database->escapeString($email)."'";
                    $result = $database->query($sql);

                    if($this->rowCount($result) == 1){

                        setcookie('temp_access_code', $validation_code, time() + 1500);
                        redirect("reset.php?email=$email&code=$validation_code");

                    } else {
                        echo Main_object::displayValidationErrors("Wrong validation code!!!");
                    }



                }
            }

        } else {
            $session->message("Sorry , your validation cookie is expired");
            redirect('recover.php');
        }

    }


    public function passwordReset(){
        global $database;
        global $session;
        if(isset($_COOKIE['temp_access_code'])) {
            if (isset($_GET['email']) && isset($_GET['code'])) {

                if (isset($_SESSION['token']) && isset($_POST['token'])){
                    if($_POST['token'] === $_SESSION['token']) {

                        if($_POST['password'] === $_POST['confirm_password']){

                            $updated_passowrd = Main_object::clean($_POST['password']);
                            $encripted_pass = sha1($updated_passowrd);
                            $email = Main_object::clean($_GET['email']);

                            $sql = "UPDATE users SET password = '".$database->escapeString($encripted_pass)."', validation_code = 0 WHERE email = '".$database->escapeString($email)."'";
                            $result = $database->query($sql);

                            $session->message("Your password has been updated, please login");

                            redirect("login.php");

                        }


                    }

                }
            }
        }  else {
            $session->message("<p class='bg-danger'>Sorry, your time has expired</p>");
            redirect("recover.php");
        }
    }








































}// end of class Users