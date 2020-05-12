

    <!-- top navbar -->
    <div class="top-navbar">
        
        <div class="open-sidnav" onclick="openNav()">
            <i class="fas fa-bars fa-2x"></i>
        </div>
        <div class="logo-website">
            <h2>LOGO</h2>
        </div>
    </div>

    <!-- side navbar -->

    <div class="sid-nav col-md-3" id="mySidenav">
        <div class="row">
            <div class="logo col-sm-12 ">
                <div class="profile-image">
                    <img src="layout/images/student-icon-png-16.png" title="" alt="" />
                </div>
                <div class="profile-name text-center">
                    <h4><?= $_SESSION['fullname']; ?></h4>
                </div>
            </div>
            <div class="nav-item col-sm-12">
                <ul>
                    <div class="con-item">
                        <li><a href="<?php if(isset($_SESSION['admin'])){echo "dashboard.php";}else{echo "home.php";} ?>"><i class="fas fa-home"></i>Home</a></li>
                    </div>
                    <div class="con-item">
                        <li><a href=""><i class="fas fa-address-card"></i>profile</a></li>
                    </div>
                    <?php if(!isset($_SESSION['admin'])): ?>
                    <div class="con-item">
                        <li><a href="?do=request"><i class="fas fa-edit"></i>request</a></li>
                    </div>
                    <?php
                    endif;
                    ?>
                    <div class="con-item">
                        <li><a href="?do=logout"><i class="fas fa-sign-out-alt"></i>logout</a></li>
                    </div>

                </ul>
            </div>
            <div class="close-nav" ><a href="javascript:void(0)" onclick="closeNav()" ><i class="fas fa-times "></i></a></div>
        </div>
    </div>