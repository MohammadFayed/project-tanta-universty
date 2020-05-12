<?php
    $page_name = "request";
    if(empty($_SESSION)):
        header("Location: login.php");
    else:
        include "includes/validate_order.php";
        $conn = new db();
        $fetch = $conn->select("SELECT * FROM user WHERE user_id = ?",array($_SESSION['id']));
        
?>
<div class="request">
        <div class="container">
            <div class="order-form">
                <div class="title-form text-center">
                    <i class="far fa-edit fa-2x"></i>
                    <h4>Submit an application for university city for the year 2019-2020</h4>
                </div>
                <div class="row">
                    <div class="details name col-sm-12">
                        <span><strong>Name : </strong></span><span><?= $fetch['fullname']; ?></span>
                    </div>
                    <div class="details email col-sm-12">
                        <span><strong>E-mail : </strong></span><span><?= $fetch['email']; ?></span>
                    </div>
                    <div class="details study-statue col-sm-12 ">
                        <span><strong>Study statue : </strong></span><span><?= $fetch['statue']; ?> student</span>
                    </div>
                    <div class="details gender col-sm-12 ">
                        <span><strong>Gender : </strong></span><span><?= $fetch['gender']; ?></span>
                    </div>
                </div>
                <form action="<?= "?do=request"; ?>" method="POST" novalidate autocomplete="off" >
                    <div class="row">
<!-- Start the necessary inputs for the student to fill out-->
                        <div class="input-text col-sm-12">
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($national_idErr)){echo "is-invalid";} ?>  " name="national-id" placeholder="National ID" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($national_idErr)){echo $national_idErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($fullnameErr)){echo "is-invalid";} ?> " value="<?php if(isset($fullname)){echo $fullname; } ?>" name="fullname" placeholder="The Fullname Is Quadruple" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($fullnameErr)){echo $fullnameErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($addressErr)){echo "is-invalid";} ?> " value="<?php if(isset($address)){echo $address;} ?>" name="address" placeholder="Detailed address" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($addressErr)){echo $addressErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($emailErr)){echo "is-invalid";} ?> " value="<?php if(isset($email)){echo $email;} ?>" name="email" placeholder="E-mail" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($emailErr)){echo $emailErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($telErr)){echo "is-invalid";} ?> " name="tel" placeholder="Telephone" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($telErr)){echo $telErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($mobileErr)){echo "is-invalid";} ?> " name="mobile" placeholder="Mobile" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($mobileErr)){echo $mobileErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($father_nameErr)){echo "is-invalid";} ?> " value="<?php if(isset($father_name)){echo $father_name;} ?>" name="father-name" placeholder="Father's name" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($father_nameErr)){echo $father_nameErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($father_national_idErr)){echo "is-invalid";} ?> " name="father-national-id" placeholder="Father national id" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($father_national_idErr)){echo $father_national_idErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($father_jobErr)){echo "is-invalid";} ?> " value="<?php if(isset($father_job)){echo $father_job;} ?>" name="father-job" placeholder="Father's job" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($father_jobErr)){echo $father_jobErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($father_mobileErr)){echo "is-invalid";} ?> " name="father-mobile" placeholder="father's Mobile"  />
                                    <div class="invalid-feedback">
                                        <?php if(isset($father_mobileErr)){echo $father_mobileErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($guardian_nameErr)){echo "is-invalid";} ?> " value="<?php if(isset($guardian_name)){echo $guardian_name;} ?>" name="guardian-name" placeholder="Name of the guardian"  />
                                    <div class="invalid-feedback">
                                        <?php if(isset($guardian_nameErr)){echo $guardian_nameErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="number" class="form-control <?php if(isset($guardian_national_idErr)){echo "is-invalid";} ?> " name="guardian-national-id" placeholder="National ID of the guardian"  />
                                    <div class="invalid-feedback">
                                        <?php if(isset($guardian_national_idErr)){echo $guardian_national_idErr;} ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <input type="text" class="form-control <?php if(isset($guardian_linkErr)){echo "is-invalid";} ?> " value="<?php if(isset($guardian_link)){echo $guardian_link;} ?>" name="guardian-link" placeholder="Guardian link" />
                                    <div class="invalid-feedback">
                                        <?php if(isset($guardian_linkErr)){echo $guardian_linkErr;} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- start the necessary choices, the student must choose one of them-->
                        <div class="input-select col-sm-12">
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                    <!-- select box to day -->
                                        <div class="form-group select col-sm">
                                            <label for="day" >Day:</label>
                                            <div class="select-box">
                                                <select name="day" class="<?php if(isset($dayErr)){echo "select-error"; } ?>" >
                                                <option value="---">---</option>
                                                <?php
                                                    for($i = 1; $i <= 31; $i++):
                                                        echo "<option value=' ".$i." '>".$i."</option>";
                                                    endfor;
                                                ?>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Day birthday</small>
                                        </div>
                                        <!-- select box to month -->
                                        <div class="form-group select col-sm">
                                            <label for="month" >Month:</label>
                                            <div class="select-box">
                                                <select name="month" class="<?php if(isset($monthErr)){echo "select-error"; } ?>"  >
                                                <option value="---">---</option>
                                                <?php
                                                    for($i = 1; $i <= 12; $i++):
                                                        echo "<option value=' ".$i." '>".$i."</option>";
                                                    endfor;
                                                ?>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Month birthday</small>
                                        </div>
                                        <!-- select box to year -->
                                        <div class="form-group select col-sm">
                                            <label for="year" >Year:</label>
                                            <div class="select-box">
                                                <select name="year" class="<?php if(isset($yearErr)){echo "select-error"; } ?>"  >
                                                <option value="---">---</option>
                                                <?php
                                                    for($i = (date("Y")-25); $i <= date("Y"); $i++):
                                                        echo "<option value=' ".$i." '>".$i."</option>";
                                                    endfor;
                                                ?>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Year birthday</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <!-- select place of birth  -->
                                        <div class="form-group select col-sm">
                                            <label for="place" >Place:</label>
                                            <div class="select-box autocomplete">
                                                    <input type="text" id="country" class="search <?php if(isset($placeErr)){echo "select-error"; } ?>" value="<?php if(isset($place)){echo $place; } ?>" name="place" placeholder="Type to select" />
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Place of birth</small>
                                        </div>
                                        <div class="form-group select col-sm">
                                            <!-- select box for religion -->
                                            <label for="reg" >Religion:</label>
                                            <div class="select-box">
                                                <select name="reg" class="<?php if(isset($religionErr)){echo "select-error"; } ?>" >
                                                    <option value="---">---</option>
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Christian">Christian</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Your religion</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <!-- select box for Governorate -->
                                        <div class="form-group select col-sm">
                                            <label for="gov" >Governorate:</label>
                                            <div class="select-box">
                                                <select name="gov" class="<?php if(isset($govErr)){echo "select-error"; } ?>" >
                                                    <option value="---">---</option>
                                                    <option value="Elgharbia">Elgharbia</option>
                                                    <option value="Elsharqia">Elsharqia</option>
                                                    <option value="Cairo">Cairo</option>
                                                    <option value="Alixandria">Alixandria</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Governorate of birthday</small>
                                        </div>
                                        <!-- select center of housing -->
                                        <div class="form-group select col-sm">
                                            <label for="center" >Center:</label>
                                            <div class="select-box">
                                                    <input type="text" id="center" class="search <?php if(isset($centerErr)){echo "select-error"; } ?>" value="<?php if(isset($center)){echo $center; } ?>" name="center" placeholder="Type to select"  />
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Center of birth</small>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <!-- select box for collage -->
                                        <div class="form-group select col-sm">
                                            <label for="collage" >Collage:</label>
                                            <div class="select-box">
                                                <select name="collage" class="<?php if(isset($collageErr)){echo "select-error"; } ?>" >
                                                    <option  value="---">---</option>
                                                    <option value="Medicine">Medicine</option>
                                                    <option value="Science">Science</option>
                                                    <option value="Pharmacy">Pharmacy</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Your collage</small>
                                        </div>
                                        <!-- select box for band -->
                                        <div class="form-group select col-sm">
                                            <label for="band" >The band:</label>
                                            <div class="select-box">
                                                <select name="band" class="<?php if(isset($bandErr)){echo "select-error"; } ?>" >
                                                    <option  value="---">---</option>
                                                    <option value="The first">The first</option>
                                                    <option value="The second">The second</option>
                                                    <option value="The third">The third</option>
                                                    <option value="The fourth">The fourth</option>
                                                    <option value="The fifth">The fifth</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Your band</small>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <!-- select box for Estimate -->
                                        <div class="form-group select col-sm">
                                            <label for="estimate" >Estimate last year:</label>
                                            <div class="select-box ">
                                                <select name="estimate" class="<?php if(isset($estimateErr)){echo "select-error"; } ?>" >
                                                    <option  value="---">---</option>
                                                    <option value="Excellent">Excellent</option>
                                                    <option value="Very good">Very good</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Weak">Weak</option>
                                                    <option value="Unsuccessful">Unsuccessful</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Your estimate last year</small>
                                        </div>
                                        <!-- select box for Accommodation in previous years -->
                                        <div class="form-group select col-sm">
                                            <label for="acc" >Accommodation in previous years:</label>
                                            <div class="select-box">
                                                <select name="acc" class="<?php if(isset($accErr)){echo "select-error"; } ?>" >
                                                    <option  value="---">---</option>
                                                    <option value="Old student">Old student</option>
                                                    <option value="New student">New student</option>
                                                    <option value="Intermittent">Intermittent</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">Accommodation in previous years</small>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <!-- select box for Accommodation type: -->
                                        <div class="form-group select col-sm">
                                            <label for="acc-type" >Accommodation type:</label>
                                            <div class="select-box">
                                                <select name="acc-type" class="<?php if(isset($acc_typeErr)){echo "select-error"; } ?>" >
                                                    <option  value="---">---</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Special">Special</option>
                                                </select>
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                            <small class="form-text text-muted">The type of Accommodation you want?</small>

                                        </div>
                                        <!-- input  for The ratio -->
                                        <div class="form-group ratio col-sm">
                                            <label for="ratio" >The ratio %:</label>
                                            <div class="select-box" >
                                                <input type="text" class="form-control <?php if(isset($ratioErr)){echo "select-error"; } ?>"" value="<?php if(isset($ratio)){echo $ratio; } ?>" name="ratio" placeholder="Your ratio %" autocomplete="off" />
                                                <span>%</span>
                                            </div>
                                            <small class="form-text text-muted">The type of Accommodation you want?</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- Start the necessary radio button, the student must choose one of them-->
                        <div class="input-check col-sm-12">
                            <div class="statue col-md col-sm-12">
                                <div class="row">
                                    <div class="checkbox row col-sm-12">
                                            <label class="text col-md col-sm-12">
                                                <input type="checkbox" name="acc-w-feed" value="Accommodation without feeding" />
                                                <span class="design"></span>
                                                <span class="text">Accommodation without feeding</span>
                                            </label>
                                            <label class="text col-md col-sm-12">
                                                <input type="checkbox" name="special-needs" value="special needs" />
                                                <span class="design"></span>
                                                <span class="text">With special needs</span>
                                            </label>
                                            <label class="text col-md col-sm-12">
                                                <input type="checkbox" name="f-out" value="family is out" />
                                                <span class="design"></span>
                                                <span class="text">The family is out</span>
                                            </label>
                                    </div>
                                    <div class="radio row col-sm-12">
                                        <label  >Statue yoer father :</label>
                                            <label class="text col">
                                                <input type="radio" name="statue" value="Dead" />
                                                <span class="design"></span>
                                                <span class="text">Dead</span>
                                            </label>
                                            <label  class="text col">
                                                <input type="radio" name="statue" value="A Live" />
                                                <span class="design"></span>
                                                <span class="text">Live</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        end form-->
                        <div class="col-sm-12">
                            <input type="submit" class="btn m-auto" name="send" value="Continue info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php 
include $tpl."footer.php";
        endif;
?>