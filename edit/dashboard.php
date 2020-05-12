<?php
session_start();
    $page_name = "dashboard";
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
        else:
            $conn = new db();
            $fetchall = $conn->fetchall("SELECT * FROM `order`");
            

?>
    <div class="main" id="main">
        <div class="container">
        <div class="row">
                <div class="dash col-md-12">
                    <div class="row">
                        <div class="static col-sm-12">
                            <div class="row">
                                <div class="stat col text-center">
                                    <h4>Number of students registered</h4>
                                    <hr />
                                    <p>
                                        <?php 
                                            $number_student = $conn->numrow("SELECT * FROM `order`");
                                            echo $number_student; 
                                        ?>
                                    </p>
                                </div>
                                <div class="stat col text-center">
                                    <h4>Students with special needs</h4>
                                    <hr />
                                    <p>
                                        <?php 
                                            $number_student = $conn->numrow("SELECT * FROM `order` WHERE statue_father = 'Dead'");
                                            echo $number_student; 
                                        ?>
                                    </p>
                                </div>
                                <div class="stat col text-center">
                                    <h4>Students whose father died</h4>
                                    <hr />
                                    <p>
                                        <?php 
                                            $number_student_regester = $conn->numrow("SELECT * FROM `order` WHERE special_needs = 'true'");
                                            echo $number_student_regester; 
                                        ?>
                                    </p>
                                </div>

                                
                            </div>
                        </div>
                        <?php if(!empty($fetchall)): ?>
                        <div class="show-stat-user col-sm-12">
                            <form>
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                    <?php foreach($fetchall[0] as $k => $val):
                                                    echo "<th scope='col'>".$k."</th>";
                                            endforeach;
                                    ?>
                                    <th scope='col'>Accepte</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach($fetchall as $val):
                                                echo "<tr>";
                                                    foreach($val as $v):
                                                        echo "<td>";
                                                        echo "$v";
                                                        echo "</td>";
                                                    endforeach;
                                                echo  "<td>".
                                                    "<div class='statue'>".
                                                    "<div class='radio'>".
                                                        "<label>".
                                                            "<input type='radio' name='stage-student".$i."' value='new'/>".
                                                            "<span class='design'></span>".
                                                            "<span class='text'>Accepte</span>".
                                                        "</label>".
                                                        "<label>".
                                                            "<input type='radio' name='stage-student".$i."' value='old' />".
                                                            "<span class='design'></span>".
                                                            "<span class='text'>refuse</span>".
                                                        "</label>".
                                                    "</div>".
                                                    "</div>".
                                                "</td>";
                                                echo "</tr>";
                                                $i++;
                                            endforeach;
                                             ?>
                                    </tbody>
                                    
                                </table>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn m-auto" name="send" value="Continue info">
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
    </div>
    </div>
<?php
    endif;
include $tpl."footer.php";
    endif;
?>
