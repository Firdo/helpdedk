<?php
header("Content-Type:application/json");
include'db/db_con_fun.php';
include'db/functions.php';
$function=new functions();

	$name=$_GET['name'];
		$mobile=$_GET['mobile'];
			$problem=$_GET['problem'];
				$location=$_GET['location'];
					$ticket=$_GET['ticket'];

if($function->raiseTicket($name,$mobile,$problem,$location,$ticket)){
    
    $status="Success";
    header("HTTP/1.1 ".$status);
    $json_response = json_encode($status);
	echo $json_response;
}



?>