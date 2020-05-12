<?php
    $validate = TRUE;
    if($_SERVER['REQUEST_METHOD'] == "POST"):

        $valid = new form_validation();
        // Check if national id is correct
        // ------------------------------
        if( ($national_id = $valid->empty($_POST['national-id'])) == FALSE ):
            $national_idErr = "national ID is required";
            $validate = FALSE;

        else:
            if( $valid->number($national_id) == FALSE):
                $national_idErr = "national id should be number";
                $validate = FALSE;
            else:
                if($valid->national_id($national_id) == FALSE):
                    $national_idErr = "national id should be <strong>15</strong> number";
                    $validate = FALSE;
                endif;
            endif;
        endif;
        // Check validate Full name.
        // ---------------------------
        if( ($fullname = $valid->empty($_POST['fullname'])) == FALSE ):

            $fullnameErr =  "Full name is required";
            $validate = FALSE;
  
        else:
                $fullname = $valid->lower($fullname);
              if( $valid->pregMtch($fullname) == FALSE):
  
                    $fullnameErr =  "Only letter and white spaces";
                    $validate = FALSE;
              endif;
  
        endif;
        // Check validate details Address.
        // ---------------------------
        if( ($address = $valid->empty($_POST['address'])) == FALSE ):

            $addressErr =  "address is required";
            $validate = FALSE;
  
        else:
                $address = $valid->lower($address);
                if( $valid->address($address) == FALSE):
    
                    $fullnameErr =  "Only letter, white spaces and separetor should be (/)";
                    $validate = FALSE;
                endif;
  
        endif;
        // Check validate E-mail.
        // ---------------------------
        if( ($email = $valid->empty($_POST['email'])) == FALSE ):

            $emailErr =  "e-mail is required";
            $validate = FALSE;
  
        else:
                $email = $valid->lower($email);
                if( $valid->email($email) == FALSE):

                    $emailErr =  "invalid e-mail";
                    $validate = FALSE;
                endif;
  
        endif;
        // Check validate telephone.
        // ---------------------------
        if( ($tel = $valid->empty($_POST['tel'])) == FALSE ):

            $telErr =  "phone is required";
            $validate = FALSE;
  
        else:
                if( $valid->number($tel) == FALSE):
    
                        $telErr =  "Phone should be number";
                        $validate = FALSE;
                endif;
  
        endif;
        // Check validate mobile.
        // ---------------------------
        if( ($mobile = $valid->empty($_POST['mobile'])) == FALSE ):

            $mobileErr =  "mobile is required";
            $validate = FALSE;
  
        else:
                if( $valid->number($mobile) == FALSE):
    
                        $mobileErr =  "mobile should be number";
                        $validate = FALSE;
                else:
                    if( $valid->mobile($mobile) == FALSE):
                        $mobileErr =  "mobile should be <strong>11</strong> number";
                        $validate = FALSE;
                    endif;
                endif;

        endif;
        // Check validate Father name input.
        // ---------------------------
        if( ($father_name = $valid->empty($_POST['father-name'])) == FALSE ):

            $father_nameErr =  "father name is required";
            $validate = FALSE;
  
        else:
                $father_name = $valid->lower($father_name);
                if( $valid->pregMtch($father_name) == FALSE):
  
                    $father_nameErr =  "Only letter and white spaces";
                    $validate = FALSE;
                endif;
  
        endif;
        // Check if father national ID is correct
        // ------------------------------
        if( ($father_national_id = $valid->empty($_POST['father-national-id'])) == FALSE ):
            $father_national_idErr = "father national ID is required";
            $validate = FALSE;

        else:
            if( $valid->number($father_national_id) == FALSE):
                $father_national_idErr = "father national ID should be number";
                $validate = FALSE;
            else:
                if($valid->national_id($father_national_id) == FALSE):
                    $father_national_idErr = "father national  ID should be <strong>15</strong> number";
                    $validate = FALSE;
                endif;
            endif;
        endif;
        // Check validate Father job input.
        // ---------------------------
        if( ($father_job = $valid->empty($_POST['father-job'])) == FALSE ):

            $father_jobErr =  "father job is required";
            $validate = FALSE;
  
        else:
                $father_job = $valid->lower($father_job);
              if( $valid->pregMtch($father_job) == FALSE):
  
                    $father_jobErr =  "Only letter and white spaces";
                    $validate = FALSE;
              endif;
  
        endif;
          // Check validate father mobile.
        // ---------------------------
        if( ($father_mobile = $valid->empty($_POST['father-mobile'])) == FALSE ):

            $father_mobileErr =  "mobile is required";
            $validate = FALSE;
  
        else:
                if( $valid->number($father_mobile) == FALSE):
    
                        $father_mobileErr =  "mobile should be number";
                        $validate = FALSE;
                else:
                    if( $valid->mobile($father_mobile) == FALSE):
                        $father_mobileErr =  "mobile should be <strong>11</strong> number";
                        $validate = FALSE;
                    endif;
                endif;

        endif;
        // Check validate guardian name input.
        // ---------------------------
        if( ($guardian_name = $valid->empty($_POST['guardian-name'])) == FALSE ):

            $guardian_nameErr =  "guardian name is required";
            $validate = FALSE;
  
        else:
                $guardian_name = $valid->lower($guardian_name);
                if( $valid->pregMtch($guardian_name) == FALSE):
  
                    $guardian_nameErr =  "Only letter and white spaces";
                    $validate = FALSE;
                endif;
  
        endif;
        // Check if national id for the guardian is correct
        // ------------------------------
        if( ($guardian_national_id = $valid->empty($_POST['guardian-national-id'])) == FALSE ):
            $guardian_national_idErr = "guardian national ID is required";
            $validate = FALSE;

        else:
            if( $valid->number($guardian_national_id) == FALSE):
                $guardian_national_idErr = "guardian national ID should be number";
                $validate = FALSE;
            else:
                if($valid->national_id($guardian_national_id) == FALSE):
                    $guardian_national_idErr = "guardiannational ID should be <strong>15</strong> number";
                    $validate = FALSE;
                endif;
            endif;
        endif;
        // Check validate guardian link to student input.
        // ---------------------------
        if( ($guardian_link = $valid->empty($_POST['guardian-link'])) == FALSE ):

            $guardian_linkErr =  "guardian link is required";
            $validate = FALSE;
  
        else:
                $guardian_link = $valid->lower($guardian_link);
                if( $valid->pregMtch($guardian_link) == FALSE):
  
                    $guardian_linkErr =  "Only letter and white spaces";
                    $validate = FALSE;
                endif;
  
        endif;
        // check select day
        //-----------------
        $day = $_POST['day'];
        if( ($valid->check_select($day)) == FALSE ):
                $dayErr = "day of birth is required";
                $validate = "FALSE";
        endif;
        // check select month
        //-----------------
        $month = $_POST['month'];
        if( ($valid->check_select($month)) == FALSE ):
            $monthErr = "month of birth is required";
            $validate = "FALSE";
        endif;
        // check select year
        //-----------------
        $year = $_POST['year'];
        if( ($valid->check_select($year)) == FALSE ):
            $yearErr = "year of birth is required";
            $validate = "FALSE";
        endif;
        //  check validate place of birth
        // -----------------------------
        if(($place = $valid->empty($_POST['place'])) == FALSE):
            $placeErr = "place is required";
            $validate = FALSE;
        else:
            $valid->lower($place);
            if($valid->pregMtch($place) == FALSE):
                $placeErr = "only letter and white spaces";
                $validate = FALSE;
            endif;
        endif;
        // check select religion
        //-----------------
        $religion = $_POST['reg'];
        if( $valid->check_select($religion) == FALSE ):
            $religionErr = "religion is required";
            $validate = "FALSE";
        endif;
        // check select Governorate
        //-----------------
        $gov = $_POST['gov'];
        if( $valid->check_select($gov) == FALSE ):
            $govErr = "Governorate of birth is required";
            $validate = "FALSE";
        endif;
        //  check validate center of housing
        // -----------------------------
        if(($center = $valid->empty($_POST['center'])) == FALSE):
            $centerErr = "center is required";
            $validate = FALSE;
        else:
            $valid->lower($center);
            if($valid->address($center) == FALSE):
                $centerErr = "only letter and white spaces";
                $validate = FALSE;
            else:
                    if($valid->check_center($center) == FALSE):

                            $centerErr = "It must be present in the options";
                            $validate = FALSE;
                    endif;

            endif;
        endif;
         // check select collage
        //-----------------
        $collage = $_POST['collage'];
        if( $valid->check_select($collage) == FALSE ):
            $collageErr = "collage is required";
            $validate = "FALSE";
        endif;
         // check select the band
        //-----------------
        $band = $_POST['band'];
        if( $valid->check_select($band) == FALSE ):
            $bandErr = "band is required";
            $validate = "FALSE";
        endif;
         // check select Estimate last year
        //-----------------
        $estimate = $_POST['estimate'];
        if( $valid->check_select($estimate) == FALSE ):
            $estimateErr = "your estimate is required";
            $validate = "FALSE";
        endif;
        //check select Accommodation in previous years
        //-----------------
        $acc = $_POST['acc'];
        if( $valid->check_select($acc) == FALSE ):
            $accErr = "Accommodation is required";
            $validate = "FALSE";
        endif;
        //check select Accommodation type
        //-----------------
        $acc_type = $_POST['acc-type'];
        if( $valid->check_select($acc_type) == FALSE ):
            $acc_typeErr = "Accommodation type is required";
            $validate = "FALSE";
        endif;
        // Check validate student ratio.
        // ---------------------------
        if( ($ratio = $valid->empty($_POST['ratio'])) == FALSE ):

            $ratioErr =  "your ratio is required";
            $validate = FALSE;
  
        else:
                if( $valid->number($ratio) == FALSE):
    
                        $ratioErr =  "ratio should be number";
                        $validate = FALSE;
                else:
                    if( $valid->check_ratio($ratio) == FALSE):

                        $ratioErr = "ratio shouldn't greater than <strong>100%</strong> Or less than 0 ";
                        $validate = FALSE;
                    endif;
                endif;

        endif;
        // handle checkbox and radio button
        //---------------------------------
        // Checkbox
        if( isset($_POST['acc-w-feed']) ):
            $acc_w_feed = "true";
        else:
            $acc_w_feed = "false";
        endif;

        if( isset($_POST['special-needs']) ):
            $special_needs = "true";
        else:
            $special_needs = "false";
        endif;
        if( isset($_POST['f-out']) ):
            $f_out = "true";
        else:
            $f_out = "false";
        endif;
        // radio button
        if( isset($_POST['statue']) ):
            $father_statue = $_POST['statue'];
        endif;
        
        if($validate == TRUE):

            $conn = new db('test');
            $birthday = $day."-".$month."-".$year;
            $birthday = str_replace(" ","",$birthday);
            $param = array(
                            $_SESSION['id'],
                            $national_id,
                            $fullname,
                            $address,
                            $email,
                            $tel,
                            $mobile,
                            $father_name,
                            $father_national_id,
                            $father_job,
                            $father_mobile,
                            $guardian_name,
                            $guardian_national_id,
                            $guardian_link,
                            $birthday,
                            $place,
                            $religion,
                            $gov,
                            $center,
                            $collage,
                            $band,
                            $estimate,
                            $acc,
                            $acc_type,
                            $ratio,
                            $acc_w_feed,
                            $special_needs,
                            $f_out,
                            $father_statue
                        );

                $stmt = $conn->insert("INSERT INTO `order` VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);" 
                                                            ,$param);
        
                if($stmt > 0):
                    $stmt = $conn->update("UPDATE user SET stage = 1 WHERE user_id = ?", array($_SESSION['id']));
                    if($stmt > 0):
                        header("Location: home.php?do=success");
                    endif;
                endif;
            endif;
    endif;

?>