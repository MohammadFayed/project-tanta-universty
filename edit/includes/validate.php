<?php
  $validate = TRUE;


    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        
        $valid = new form_validation();
        // if page login 
        if(isset($page_name) && $page_name == $valid->lower("login")):

          // Check validate Email.
                  // ---------------------
              if( ( $email = $valid->empty($_POST['email']) ) == FALSE ):
                    
                    $emailErr = "email is required";
                    $validate = FALSE;
              else:
                    $email = $valid->lower($email);
                    if( ($valid->tanta_email($email)) == FALSE ):

                          if($valid->student_code($email) == FALSE ){

                            $emailErr = "invalid email";
                            $validate = FALSE;
                          }
                    endif;

              endif;
              
              // Check validate password.
              // ------------------------
              if( ($password = $valid->empty($_POST['password'])) == FALSE ):
                    
                    $passwordErr = "password is required ";
                    $validate = FALSE;
            
              else:
                    $hashpass = $valid->hashpass($password);

                    if($valid->length($password, 8) == False ){
                    
                        $passwordErr = "must be greater than <strong>8</strong> chars" ;
                        $validate = FALSE;
                    }

              endif;
              // Check if input data correct
              if($validate == TRUE):

                  $conn = new db();
                  // Check if email and password are exists
                  // --------------------------------------
                  $param = array($email,$hashpass);
                  
                  $count = $conn->numrow("SELECT email,password FROM user WHERE email = ? AND password =? ",$param);
                  if($count > 0):
                      $fetch = $conn->select("SELECT user_id,fullname,groub_id FROM user WHERE email = ?", array($email));
                      if($fetch['groub_id'] == 1):
                        $_SESSION['id'] = $fetch['user_id'];
                        $_SESSION['admin'] = $fetch['groub_id'];
                        $_SESSION['fullname'] = $fetch['fullname'];
                        header("Location: dashboard.php");
                      else:
                        $_SESSION['id'] = $fetch['user_id'];
                        $_SESSION['fullname'] = $fetch['fullname'];
                        header("Location: home.php");
                      endif;
                  else:
                      $error_message = "email or password uncorrect";
                  endif;
               endif;
         else:
        // Check validate First name.
        // ---------------------------
        if( ($firstname = $valid->empty($_POST['first_name'])) == FALSE ):

          $firstnameErr =  "First name is required";
          $validate = FALSE;

        else:
            $firstname = $valid->lower($firstname);
            if( $valid->pregMtch($firstname) == FALSE){

              $firstnameErr =  "Only letter and white spaces";
              $validate = FALSE;
            }

        endif;

        // Check validate Last name.
        // -------------------------
        if( ($lastname = $valid->empty($_POST['last_name'])) == FALSE ):

          $lastnameErr = "last name is required ";
          $validate = FALSE;

        else:
            $lastname = $valid->lower($lastname);                
            if( $valid->pregMtch($lastname) == FALSE){

              $lastnameErr =  "Only letter and white spaces";
              $validate = FALSE;
            }

        endif;

        // merge first name and last name to database faild fullname.
        // -----------------------------------------------------------   
          $fullname = $firstname." ".$lastname;
        // Check validate Email.
        // ---------------------
        if( ( $email = $valid->empty($_POST['email']) ) == FALSE ):
          
              $emailErr = "email is required";
              $validate = FALSE;
        else:
              $email = $valid->lower($email);
              if( ($valid->tanta_email($email)) == FALSE ):

                    if($valid->student_code($email) == FALSE ){

                      $emailErr = "invalid email";
                      $validate = FALSE;
                    }
               endif;
              

        endif;

        // Check validate password.
        // ------------------------
        if( ($password = $valid->empty($_POST['password'])) == FALSE ):
              
            $passwordErr = "password is required ";
            $validate = FALSE;
        
        else:
            $hashpass = $valid->hashpass($password);

                if($valid->length($password, 8) == False ){
                
                  $passwordErr = "must be greater than <strong>8</strong> chars" ;
                  $validate = FALSE;
                }

        endif;

        // Check if confirm password is matched.
        // ------------------------------------
        if ( ($confirm = $valid->empty($_POST['r-password']) )  == FALSE ):
                  
            $confirmErr = "Confirm password is required";
            $valid = FALSE;
            
        else:
              if( $valid->confirm($confirm, $password) == FALSE){
                
                  $confirmErr = "Your Password did not match";
                  $validate = FALSE;
              }

        endif;
        $statue = $_POST['statue'];
        $gender = $_POST['gender'];
        // Check if data is correct and insert into database
        if($validate == TRUE):

          $conn = new db();

              // check if email already exist in database this mean to the person signup before
              // ------------------------------------------------------------------ 
              $count = $conn->numrow("SELECT email FROM user WHERE email = ?" , array($email));
              $emailErr = ($count > 0) ? "email already exist": TRUE;

              if($emailErr === TRUE):
                  $stmt = $conn->insert("INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?,0,0,now())"
                                        ,array($fullname, $email, $hashpass, $statue,$gender) );
                    if($stmt > 0):
                      $id = $conn->select("SELECT user_id FROM user WHERE fullname = ?",array($fullname));
                      $_SESSION['id'] =  $id['user_id'];
                      $_SESSION['fullname'] = $fullname;
                      header("Location: home.php");
                    endif;
              endif;
         endif;
      endif;
   endif;
?>