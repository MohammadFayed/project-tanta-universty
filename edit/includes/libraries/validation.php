<?php

class form_validation{

    


    public function empty($data){


        return empty($data) ? FALSE : $this->test_input($data);
    }

    public function test_input($data){

        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = Filter_Var($data, FILTER_SANITIZE_STRING);
        return $data;
      }

    public function pregMtch($data)
    {
        return !preg_match("/^[a-zA-Z ]*$/",$data) ? FALSE : TRUE;

    }
    public function address($data)
    {
        return !preg_match("/^[a-zA-Z \-\d]*$/",$data) ? FALSE : TRUE;

    }

    public function email($data){

        return !Filter_Var($data, FILTER_VALIDATE_EMAIL) ? FALSE : TRUE ;

    }
    public function tanta_email($data){

        if(!preg_match("/^[a-zA-Z\d]*(@science.tanta.edu.eg)+$/",$data)):
            return FALSE;
        else:
            
            return TRUE ;
        endif;

    }
    public function student_code($data){

        return !preg_match("/^[a-zA-Z\d]*$/",$data) ? FALSE : TRUE ;

    }
    public function lower($data){

        return strtolower($data);

    }
    public function upper($data){

        return strtoupper($data);

    }
    
    public function hashpass($password){

        return md5(sha1($password));
    }

    public function length($data, $length){

        return (strlen($data) < $length) ? False : TRUE;

    
    }
    public function confirm($confirm, $password){

        return ($confirm !== $password) ? FALSE : TRUE;
    }
    public function number($data){

        return (!is_numeric($data)) ? FALSE : TRUE;
    }
    public function national_id($data){

        return (is_numeric($data) && strlen($data) == 15) ? TRUE : FALSE;
    }
    public function mobile($data){

        return (is_numeric($data) && strlen($data) == 11) ? TRUE : FALSE;
    }
    public function check_select($data){

        return isset($data) && $data == "---" ? FALSE : TRUE;
    }
    public function check_center($data){

        $center = array("El Mahalla El Kobra - First District",
                "El Mahalla El Kobra - Second District",
                "Tanta - First District",
                "Tanta - Second District",
                "Samanoud",
                "Qutour",
                "Elsantah",
                "Basion",
                "Zefta",
                "Kafr El Zayat",
                "Damietta Center",
                "Faraskour Center",
                "Kafr Saad Center",
                "Zarqa Center",
                "Kafr Al-Batikh Center",
                "Burj Al Arab Center"
    );

        return in_array($data , $center,TRUE) ? TRUE : FALSE;
        
    }
    public function check_ratio($data){

        return ($data > 100 || !ctype_digit( $data) ) ? FALSE : TRUE;

    }
    // Is a Natural number  (0,1,2,3, etc.)
    public function is_natural($data){

        return ctype_digit($data);
    }
    // Is a Natural number, but not a zero  (1,2,3, etc.)
    public function is_natural_no_zero($str)
	{
		return ($str != 0 && ctype_digit((string) $str));
	}


}


?>
