<?php 

class functions extends db{
    
       public function raiseTicket($name,$mobile,$problem,$location,$ticket){
        
        try{
            $query="INSERT INTO issue SET name=:name,mobile=:mobile,problem=:problem,location=:location,ticket=:ticket";
            
            $stmt=$this->connect()->prepare($query);
            
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":problem", $problem);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":ticket", $ticket);
            $stmt->execute();
            return true;
            }
        
        catch(PDOException $e){
            
             return false;
        }
        
    }
    
    }
    
    ?>