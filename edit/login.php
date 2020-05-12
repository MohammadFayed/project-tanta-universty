<?php 
session_start();
    $page_name = 'login';
    
    if(isset($_SESSION['fullname'])):

        header("Location: home.php");

    else:
        include "init.php";
        include $tpl."header.php";

?>

<body class="sign">
        <div class="container">
            <div class="header-sign">
                <h3>Welcome to <span>the university city</span> of Tanta</h3>
            </div>
            <div class="form-con">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate >
                    <h3>Login</h3>
    <!-- The example down to show how set valid Message-->
    <!-- To show the valid message, "is-valid" must be inserted into the input class -->
    <!-- for example <input type="password" class="form-control is-valid col" name="password" placeholder="Inter your password" autocomplete="new-password" /> -->
                    <!--Start Style error message -->
                    <?php if(isset($error_message)){ 
                        echo "<div class='err alert alert-danger text-center'>".$error_message."</div>"; 
                    }
                    ?>
                    <!-- End Style error message -->
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control <?php if(isset($emailErr)){echo "is-invalid";} ?>" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="Student code OR University email" autocomplete="off" />
                        <div class="invalid-feedback">
                            <?php if(isset($emailErr)){echo $emailErr;} ?>
                        </div>
                    </div>
    <!-- The example down to show how set Errors-->
    <!-- To show the error message, "is-invalid" must be inserted into the input class -->
    <!-- for example <input type="password" class="form-control is-invalid col" name="password" placeholder="Inter your password" autocomplete="new-password" /> -->
                    <div class="form-group col-sm-12">
                        <input type="password" class="form-control <?php if(isset($passwordErr)){echo "is-invalid";} ?>" name="password" placeholder="Inter your password" autocomplete="new-password" />
                        <div class='invalid-feedback'>
                            <?php if(isset($passwordErr)){echo $passwordErr;} ?>
                        </div>
                    </div>
                    <input type="submit" class="btn m-auto" name="send" value="Login">
                </form>
                <div class="line"></div>
                <div class="option">
                    <div class="reset-password">
                        <span> Forgot your password ? </span>
                        <a href="#" >Reset password</a>
                    </div>
                    <div class="login">
                        <span> Don't have an account ? </span>
                        <a href="signup.php" >Signup Now</a>
                    </div>
                </div>
            </div>
        </div>

<?php include $tpl."footer.php"; ?>
<?php endif; ?>