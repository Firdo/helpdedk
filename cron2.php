<?php
include'db/dbconfig.php';

date_default_timezone_set("Asia/Dubai");
$time= date("Y/m/d H:i:s");
$time1= date("Y/m/d H:i:s", strtotime("-10 minutes"));
    
$query="SELECT mobile,name,id,rootcause,handledby,finish,status from issue Where finish between '$time1' AND '$time' AND status='Change'";
$stmt=$con->prepare($query);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 $mobile= $row['mobile'];
  $name= $row['name'];
   $id= $row['id'];
    $rootcause= $row['rootcause'];
    $finish= $row['finish'];
    $status="open";
    $handledby=$row['handledby'];
   

$query="INSERT INTO changeticket SET id=:id,name=:name,handledby=:handledby,rootcause=:rootcause,mobile=:mobile,finish=:finish,status=:status";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':id', $id); 
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':mobile', $mobile); 
   $stmt->bindParam(':rootcause', $rootcause);  
   $stmt->bindParam(':handledby', $handledby);  
   $stmt->bindParam(':finish', $finish);
   $stmt->bindParam(':status', $status);
  if( $stmt->execute()){
      
     
  }
    
 

} 


?>