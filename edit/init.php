<?php

// #routs directory
$tpl        = "includes/templates/";    // templates directory
$lib        = "includes/libraries/";    // library directory
$layout     = "layout/css/";            // layout directory for bootstrap files
$font       = "layout/fonts/css/";      // font directory for fontawesome files
$mystyle    = "layout/css/style/";      // style directory for mystyle css files
// include important file
include $lib."formhelper.php";
include $lib."validation.php";
include $lib."database.php";
if (isset($page_name) && ($page_name == "signup" || $page_name == "login")):
    include "includes/validate.php";
endif;

$governorate = array(
                    "1" => array( 
                                "elgharbia" => array(
                                                    "1.3" => "El Mahalla El Kobra - First District",
                                                    "1.4" => "El Mahalla El Kobra - Second District",
                                                    "1.1" => "Tanta - First District",
                                                    "1.2" => "Tanta - Second District",
                                                    "1.5" => "Samanoud",
                                                    "1.6" => "Qutour",
                                                    "1.7" => "Elsantah",
                                                    "1.8" => "Basion",
                                                    "1.9" => "Zefta",
                                                    "2"   => "Kafr El Zayat"
                                                    )
                                ),

                    "2" => array( 
                                "Domietta" => array(
                                                    "1.1" => "Damietta Center",
                                                    "1.2" => "Faraskour Center",
                                                    "1.3" => "Kafr Saad Center",
                                                    "1.4" => "Zarqa Center",
                                                    "1.5" => "Kafr Al-Batikh Center"
                                                    )
                                ),
                    "3" => array( 
                                "alixadria" => array(
                                                    "1.1" => "Burj Al Arab Center"
                                                    )
                                )   
    
);

$city = array(
    "Cairo",
    "Alexandria",
    "Giza",
    "Shubra Al Khaimah",
    "Port Said",
    "Suez",
    "El Mahalla El Kobra",
    "Luxor",
    "Asyut",
    "Mansoura",
    "Tanta",
    "Fayoum",
    "Cairo",
    "Cairo",
    "Cairo",
    "Cairo",
)

?>