  <?php 
  $comma="\r\n";
$data_string = '{ "userName":"DGPSchool",  
					"priority":1,
					"referenceId":"124154324",   
					"dlrUrl":null,    
					"msgType":0,   
					"senderId":"Dubaigem",
					"message":"Dear Teacher, Your Complaint SR677  has been Resolved Successfully, For Detail Kindly visit helpdesk.dgpspdp.in",   
					"mobileNumbers":{"messageParams":[{"mobileNumber":"971527956958"}]},
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
			 ?>
			 
			 
<?php
                  $number="052-7956958";
  $number1=str_replace('|','',$number);
  $number2=substr($number1,1);
  $number3="971".$number1;
  
  ?>