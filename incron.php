<?php
include'db/dbconfig.php';

date_default_timezone_set("Asia/Dubai");
$time= date("Y/m/d H:i:s");
$time1= date("Y/m/d H:i:s", strtotime("-10 minutes"));
    
$query="SELECT name,id,mobile from issue WHERE finish between '$time1' AND '$time' AND status='Closed'";
$stmt=$con->prepare($query);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){


$id1=$row['id'];
$id=IT_SR_.$id1;
$name=$row['name'];
$problem=$row['problem'];

$number=$row['mobile'];

$number = str_replace(["-", "–"], '', $number);

$n=substr(($number), 1);

$num=971;

$mobile=$num.$n;


$data_string = '{ "userName":"DGPSchool",  
					"priority":1,
					"referenceId":"124154324",   
					"dlrUrl":null,    
					"msgType":0,   
					"senderId":"Dubaigem",
					"message":"Dear '.$name.',  Your Complaint '.$id.'  has been Resolved Successfully, For Detail Kindly visit it.dgpspdp.in ",   
					"mobileNumbers":{"messageParams":[{"mobileNumber":"'.$mobile.'"}]},
					"password":"Dgps2018#" }';
				 
					$ch = curl_init("https://api.me.synapselive.com/v1/multichannel/messages/sendsms");
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json;charset=utf-8',
						'Content-Length: ' . strlen($data_string)));
					$result = curl_exec($ch);
					curl_close($ch);
					echo $result;
curl_close($curl);
}

?>