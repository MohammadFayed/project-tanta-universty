<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <!-- Meta For internet Explorer -->
        <meta http-equiv="X-UA-Compatible" content="IE-edage" />
        <!-- Meta For Mobile Devices -->
        <meta name="viewport" content="width=device-width initial-scale=1"/>
        <!-- Title Page -->
        <title><?php if(isset($page_name)){echo $page_name; }else{echo "Home";} ?></title>
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="<?=$layout; ?>bootstrap.min.css" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?=$font; ?>all.min.css" />
        <link rel="stylesheet" href="layout/css/style/nav.css" />
        <!--  style main page CSS -->
        <?php 
        $cssfile = "main";
        $style = explode(",",$cssfile);
        foreach($style as $val):
        echo "<link rel='stylesheet' href=' ".$mystyle.$val.".css' />";
        endforeach;
        
        ?>
        <script src="layout/js/html5shiv.min.js" ></script>
        <script src="layout/js/respond.min.js" ></script>
        
    </head>
<body>