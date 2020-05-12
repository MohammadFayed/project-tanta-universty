<?php 

class db {

    private $dsn = "mysql:host=localhost;dbname=test";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function __construct(){
        $this->conn = $this->connectdb();
    }
    // Method To check and connect the database.
    public function connectdb(){
        
        try{
            $conn = new PDO($this->dsn, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            
            echo "Faild connect to database ".$e->getMessage();
        }
    }

    // Method To Insert In Database
    public function insert($query,$pindparam=array()){
        
        $stmt = $this->conn->prepare($query);
        if(empty($pindparam)):

             $stmt->execute();

        else:

             $stmt->execute($pindparam);

        endif;
        $count = $stmt->rowCount();
        return $count;
        
    }
    // Method To Select And Fetch Data From Database
    public function select($query,$pindparam=array()){
        
        $stmt = $this->conn->prepare($query);
        
        if(empty($pindparam)):
            $stmt->execute();
        else:
            $stmt->execute($pindparam);
        endif;
        $result = $stmt->Fetch(PDO::FETCH_ASSOC);
            
            return ( !empty($result) ) ? $result : "";
    }
    public function fetchall($query,$pindparam=array()){
        
        $stmt = $this->conn->prepare($query);
        
        if(empty($pindparam)):
            $stmt->execute();
        else:
            $stmt->execute($pindparam);
        endif;
        $result = $stmt->Fetchall(PDO::FETCH_ASSOC);
            
            return ( !empty($result) ) ? $result : "";
    }
    // Method to check if find data.
    public function numrow($query,$pindparam=array()){
        $stmt = $this->conn->prepare($query);
        
            if(empty($pindparam)){
                $stmt->execute();
            }else{
                $stmt->execute($pindparam);
            }
        $rowcount = $stmt->rowCount();
        return $rowcount;
    }
    public function numcol($query,$pindparam=array()){
        $stmt = $this->conn->prepare($query);
        
            if(empty($pindparam)){
                $stmt->execute();
            }else{
                $stmt->execute($pindparam);
            }
        $colcount = $stmt->columnCount();
        return $colcount;
    }
    public function update($query,$pindparam=array()){
        $stmt = $this->conn->prepare($query);
        
            if(empty($pindparam)){
                $stmt->execute();
            }else{
                $stmt->execute($pindparam);
            }
        $rowcount = $stmt->rowCount();
        return $rowcount;
    }
}

?>