$number=$_POST['mobile'];

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
					"message":"Dear '.$name.',  Your Complaint '.$id1.'  has been Resolved Successfully, For Detail Kindly visit www.it.dgpspdp.in ",   
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
					#echo $result;
    
    