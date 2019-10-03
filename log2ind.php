<?php 

include_once ('db\db_con_fun.php');

class login{
    
    private $db;
    
    public function __construct(){
        
        $this->db =new database_connection();
        
        $this->db=$this->db->connect();   
        
    }
    
    
    
    public function verify($name, $pass){
        
        
        if(!empty($name) && !empty($pass)){
            
            $stmt= $this->db->prepare("SELECT * from login Where username=? and password=?");
            
            $stmt=bindParam(1, $name);
            $stmt=bindParam(2, $pass);
            $stmt->execute();
            
            if($stmt->rowCount()==1){
                
                echo"User Verified, Access Granted";
            }
            
            else{
                
                echo"Incorrect credentials";
            }
        }
        
        else{
            
            echo "Please Check your inputs";
            
        }
        
        
        
    }

    
}




?>