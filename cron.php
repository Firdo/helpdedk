<?php

include'db/dbconfig.php';

date_default_timezone_set("Asia/Dubai");
$time= date("Y/m/d H:i:s", strtotime("0 minutes"));
$time1= date("Y/m/d H:i:s", strtotime("-5 minutes"));
    
$query="SELECT login.email, issue.name,issue.id,issue.problem from login INNER JOIN issue ON issue.name=login.name WHERE issue.time between '$time1' AND '$time'; ";
$stmt=$con->prepare($query);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    
   

$curl = curl_init();

$email=$row['email'];
$id1=$row['id'];
$id=IT_SR_.$id1;
$name=$row['name'];
$problem=$row['problem'];


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.pepipost.com/v2/sendEmail",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"recipient\":\"$email\"}],\"from\":{\"fromEmail\":\"support@dgpspdp.in\",\"fromName\":\"DGPS-Technical Support\"},\"subject\":\"Complaint – Ticket NO $id\",\"content\":\"Dear $name <br><br>We received your complaint, and our Technical Support team is now looking into the issue. Thank you for bringing this matter to our attention.<br> <b>Your Complaint Detail:</b><br>  <i>$problem</i><br><b>Status:</b> <color:#00ff00>Open<br><br>Within 24 hour, we will provide a more substantive response to your problem and a suitable solution.<br>Thank you for contacting Support Center<br><br><br>Best regards,<br>Virtual Assistant<br>IT Support Center-DGPS \"}",
  CURLOPT_HTTPHEADER => array(
    "api_key: bc691451fb168e078d741e49031f83d6",
    "content-type: application/json"
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {

 
  $status=$err;
 
  include'db/dbconfig.php';
  
    $query="INSERT INTO maildelivery SET name=:name, time=:time,status=:status";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':time', $time);  
   $stmt->bindParam(':status', $status);
    
   $stmt->execute();
    

 

} 

else {
  
  $status=$response;
   include'db/dbconfig.php';
   $query="INSERT INTO maildelivery SET name=:name, time=:time,status=:status";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':time', $time);  
   $stmt->bindParam(':status', $status);
   $stmt->execute();
   
}

}

?>