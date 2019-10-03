<?php
include'db/dbconfig.php';

 date_default_timezone_set("Asia/Dubai");
  $time= date("Y/m/d H:i:s", strtotime("0 minutes"));
     $time1= date("Y/m/d H:i:s", strtotime("-100 minutes"));


$query="SELECT name,id from issue WHERE mobile='' AND incident='Yes' AND time between '$time1' AND '$time'";
$stmt=$con->prepare($query);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

 $name= $row['name'];
 $id=$row['id'];

 
 $query1="select mobile from login where name='$name'";
 $stmt1=$con->prepare($query1);
$stmt1->execute();
 $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
 $mobile=$row1[mobile];

  
$query2="UPDATE issue SET mobile=:mobile WHERE  id =:id";

$stmt2=$con->prepare($query2);

$row2=$stmt2->execute(array(":mobile"=>$mobile,":id"=>$id));

}

?>
 

<script>window.location.href = 'viewopen.php';</script>



?>