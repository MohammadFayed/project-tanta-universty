<?php
session_start();
$page_name = "home";
if(empty($_SESSION)):
    header("Location: login.php");
else:
    include "init.php";
    include $tpl."header.php";
    include $tpl."navbar.php";

    $option = '';
    $option = (isset($_GET['do'])) ? $_GET['do'] : "home";
        if(isset($option) && $option == "logout"):

            session_unset($_SESSION);
            session_destroy();
            header("Location: login.php");

        elseif (isset($option) && $option == "request"):
            include "request.php";
        elseif (isset($option) && $option == "success"):
             ?>
                <div class="success-message">
                    <div class="alert alert-success text-center p-4">Residence in the university city of Tanta has been requested, please wait while the official has checked the conditions</div>
                </div>
        <?php
        else:
    ?>

    <div class="main" id="main">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        </div>
<?php
        endif;
    include $tpl."footer.php";
endif;
?>