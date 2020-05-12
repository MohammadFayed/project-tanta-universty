<?php
session_start();
    $page_name = 'signup';
    if(!empty($_SESSION)):
        header("Location: index.php");
    else:
        include "init.php";
        include $tpl."header.php";
?>

<div class="sign">
        <div class="container">
            <div class="header-sign">
                <h3>Welcome to <span>the university city</span> of Tanta</h3>
            </div>
            <div class="form-con">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate >
                    <h3>Sign up</h3>
                    <div class="form-group row col-sm-12">
                        <div class="con-input col-md col-sm-12">
                            <input type="text" class="form-control <?php if(isset($firstnameErr)){ echo "is-invalid"; } ?> " value="<?php if(isset($firstname)){echo $firstname;}?>" name="first_name" placeholder="First Name" autocomplete="off" />
                            <div class="invalid-feedback">
                            <?php if(isset($firstnameErr)){ echo $firstnameErr; } ?>
                            </div>
                        </div>
                        <div class="con-input col-md col-sm-12">
                            <input type="text" class="form-control <?php if(isset($lastnameErr)){ echo "is-invalid"; } ?> " value="<?php if(isset($lastname)){echo $lastname;}?>" name="last_name" placeholder="Last Name" autocomplete="off" />
                            <div class="invalid-feedback">
                            <?php if(isset($lastnameErr)){ echo $lastnameErr; } ?>
                            </div>
                        </div>
                    </div>
    <!-- The example down to show how set valid Message-->
    <!-- To show the valid message, "is-valid" must be inserted into the input class -->
    <!-- for example <input type="password" class="form-control is-valid col" name="password" placeholder="Inter your password" autocomplete="new-password" /> -->
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control <?php if(isset($emailErr)){ echo "is-invalid"; } ?> " value="<?php if(isset($email)){echo $email;}?>" name="email" placeholder="Student code OR University email" autocomplete="off" />
                        <div class="invalid-feedback">
                            <?php if(isset($emailErr)){ echo $emailErr; } ?>
                        </div>
                    </div>
    <!-- The example down to show how set Errors-->
    <!-- To show the error message, "is-invalid" must be inserted into the input class -->
    <!-- for example <input type="password" class="form-control is-invalid col" name="password" placeholder="Inter your password" autocomplete="new-password" /> -->
                    <div class="form-group col-sm-12">
                        <input type="password" class="form-control <?php if(isset($passwordErr)){ echo "is-invalid"; } ?>" name="password" placeholder="Inter your password" autocomplete="new-password" />
                        <div class="invalid-feedback">
                            <?php if(isset($passwordErr)){ echo $passwordErr; } ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="password" class="form-control <?php if(isset($confirmErr)){ echo "is-invalid"; } ?>" name="r-password" placeholder="Confirm password" autocomplete="new-password" />
                        <div class="invalid-feedback">
                            <?php if(isset($confirmErr)){ echo $confirmErr; } ?>
                        </div>
                    </div>
                    <div class="statue row">
                        <div class="radio row col-sm-12">
                                <label class="col">
                                    <input type="radio" name="statue" value="new" checked />
                                    <span class="design"></span>
                                    <span class="text">New Student</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="statue" value="old" />
                                    <span class="design"></span>
                                    <span class="text">Old Student</span>
                                </label>
                        </div>
                    </div>
                        <div class="statue gender row">
                            <div class="radio row col-sm-12">
                                <label class="col">
                                    <input type="radio" name="gender" value="male" checked />
                                    <span class="design"></span>
                                    <span class="text">Male</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="gender" value="female" />
                                    <span class="design"></span>
                                    <span class="text">Female</span>
                                </label>
                            </div>
                        </div>
                    <input type="submit" class="btn m-auto" name="send" value="Continue info">
                </form>
                <div class="line"></div>
                <div class="option">
                <div class="login">
                    <span> Are you signup before ? </span>
                    <a href="login.php" >Login Now</a>
                </div>
                    
            </div>
        </div>
<?php include $tpl."footer.php"; ?>
<?php endif; ?>