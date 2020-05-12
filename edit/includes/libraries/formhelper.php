<?php

// -----------------------------------------------------------------------
// * @kind              --> kind of alert message   (string)
// * @welcome_message   --> header message          (string)
// * @main_message      --> bode of message         (string)
// * @sub_message       --> footer of message       (string)
// function to alert and message [header message, body message, footer message]
    function alert($kind,$welcome_message = '',$main_message,$sub_message =''){

        echo "<div class='alert alert-".$kind." ' role='alert'>";
        if(!empty($welcome_message)):

        echo "<h4 class='alert-heading'>".$welcome_message."</h4>";

        endif;
        echo "<p>".$main_message."</p>";
        if(!empty($sub_message)):

        echo "<hr>";
        echo "<p class='mb-2'>".$sub_message."</p>";

        endif;
        echo "</div>";

    }
?>