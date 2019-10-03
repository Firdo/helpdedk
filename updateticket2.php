<?php include'header/header.php';?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM poadetails";
$results = $db_handle->runQuery($query);
?>
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id']:die('ERROR:No Record Found');
include 'db/dbconfig.php';
//read current record's data
try
{
//prepare select query
$query="SELECT * FROM issue WHERE id= ? LIMIT 0,1";
$stmt= $con -> prepare($query);
// this is the first question mark
$stmt->bindParam(1, $id);
$stmt->execute();
//store retrived row to variable
$row=$stmt->fetch(PDO::FETCH_ASSOC);
//values to fill up our form
}
//show error
catch(PDOException $exception){
die('ERROR:'.$exception->getMessage());
}
?>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'state_id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="viewopen.php"><button class="btn">Back</button> </a>
    </div>
        <div class="col-md-3">
    <form action="cron5.php" method="GET">
    <input type="submit" value="Get Number" class="btn"></div>
    
</form>

    </div>
    </div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>SR #</label>
                    <input type="text" name="id" class="form-control" value="<?php $ticket="IT_SR_".$id ; 
                    echo $ticket; ?>" readonly>
                </div>
                
                 <div class="form-group col-md-3">
                    <label>Requested By:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row[name];?>" readonly>
                </div>
                
                <div class="form-group col-md-3">
                    <label>Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" value="<?php echo $row[mobile];?>" readonly>
                </div>
                 
                 <div class="form-group col-md-3">
                    <label>Requested At</label>
                    <input type="text" name="time" class="form-control" value="<?php echo $row[time];?>" readonly>
                </div>
                
                 
                </div>
                <br> <div class="form-row">
                    
                    <div class="form-group col-md-6">
                    <label>Incident Detail:</label>
                   <textarea rows="2" name="problem" class="form-control" readonly><?php echo $row[problem];?> </textarea>
                </div>
                    
                    <div class="form-group col-md-6">
                    <label>Root Cause:</label>
                     <textarea rows="2" name="rootcause" class="form-control"></textarea>
                </div>
             </div>
             <div class="form-row">
             <div class="form-group col-md-12">
                    <label>Action Taken:</label>
                     <textarea rows="2" name="actiontaken" class="form-control"></textarea>
                </div>
                </div>
                
                <div class="form-row">
                   <div class="form-group col-md-3">
                    <label>Handled By</label>
                    <select class="form-control" name="handledby">
                        <option>Riyadh Khan</option>
                        <option>Mohammed Niyasuddin</option>
                        <option>Firdous Farith</option>
                    </select>
                </div>
                
                   <div class="form-group col-md-3">
                    <label>Status</label>
                    <select class="form-control" name="ticket">
                        
                        <option>Open</option>
                        <option>Closed</option>
                       
                    </select>
                </div>
                
                  <div class="form-group col-md-3">
                    <label>Forward To</label>
                    <select class="form-control" name="status">
                        
                        <option></option>
                        <option>Problem</option>
                        <option>Change</option>
                    </select>
                </div>
                
                 <div class="form-group col-md-3">
                    <label>Time Taken:</label>
                   <input type="text" name="timetaken" class="form-control"> 
                </div>
                 </div>
                 <br>
                 <div class="form-row">
            <div class="form-group col-md-4">
<label>POA Category</label><br/>
<select name="poacategory" id="country-list" class="form-control" onChange="getState(this.value);">
<option value disabled selected>Select Category</option>
<?php
foreach($results as $category) {
?>
<option value="<?php echo $category["id"]; ?>"><?php echo $category["category"]; ?></option>
<?php
}
?>
</select>
</div>
<div class="form-group col-md-4">
<label>POA Description:</label><br/>
<select name="poadetail" id="state-list" class="form-control"  onChange="getCity(this.value);">
<option value="">Select Description</option>
</select></div>
<div class="form-group col-md-4">
<label>Critical</label><br/>
<select name="critical" id="city-list" class="form-control" >
<option value=""></option>
</select>
</div></div><br>
                <div class="form-row">
                 <div class="form-group col-md-4">
                    <input type="checkbox" name="submitted" value="Yes" />&nbspSend Sms</input>
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" name="submit" class="form-control btn btn-info">
                </div>
                </div></div><br>
        </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit']))
     {
  include 'db/dbconfig.php';
  

  $id1=$_POST['id'];
  $id=substr($id1, 6);
  $name=$_POST['name'];
  $time=$_POST['time'];
  $problem=$_POST['problem'];
  $rootcause=$_POST['rootcause'];
  $handledby=$_POST['handledby'];
  $solvedby=$_POST['handledby'];
  $status=$_POST['status'];
  $timetaken=$_POST['timetaken'];
  $ticket=$_POST['ticket'];
  $actiontaken=$_POST['actiontaken'];
  $poacategory=$_POST['poacategory'];
  $poadetail=$_POST['poadetail'];
  $critical=$_POST['critical'];
  date_default_timezone_set("Asia/Dubai");
  $finish= date("Y/m/d H:i:s", strtotime("0 minutes"));
 
  
$query="UPDATE issue SET name=:name, time=:time, problem=:problem, rootcause =:rootcause, handledby =:handledby,solvedby =:solvedby,ticket=:ticket, status =:status, timetaken =:timetaken,actiontaken=:actiontaken, poacategory =:poacategory, poadetail =:poadetail, critical =:critical, finish=:finish WHERE  id =:id";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":name"=>$name,":time"=>$time,":problem"=>$problem,":rootcause"=>$rootcause,":handledby"=>$handledby,":status"=>$status,":timetaken"=>$timetaken,":actiontaken"=>$actiontaken,":solvedby"=>$solvedby,":poacategory"=>$poacategory,":poadetail"=>$poadetail,":ticket"=>$ticket, ":critical"=>$critical,":finish"=>$finish,":id"=>$id));
if($row){

if(isset($_POST['submitted']) && 
   $_POST['submitted'] == 'Yes') 
{ 
    #sms
    

$id1;
$name;

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
					"message":"Dear '.$name.',  Your Complaint '.$id1.'  has been Resolved Successfully, For Detail Kindly visit helpdesk.dgpspdp.in Regards,DGPS IT Dept",     
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
    



$query="SELECT email FROM login WHERE name='$name'";
$stmt=$con->prepare($query);
$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);

$curl = curl_init();

$email=$row['email'];
$id1;
$name;
$problem;
$actiontaken;

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.pepipost.com/v2/sendEmail",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"recipient\":\"$email\"}],\"from\":{\"fromEmail\":\"support@dgpspdp.in\",\"fromName\":\"DGPS-Technical Support\"},\"subject\":\"Complaint – Ticket NO $id1\",\"content\":\"Dear $name <br><br>We have successfully solved your Complaint.<br><br><b>Your Complaint Detail:</b><br><i>$problem</i><br><b>Status:</b> <color:#00ff00>Closed<br>Action Taken:<br> $actiontaken<br>Closed By:$handledby <br><br>Thank you for contacting Support Center<br><br>Best regards,<br>Virtual Assistant<br>IT Support Center-DGPS \"}",
  CURLOPT_HTTPHEADER => array(
    "api_key: bc691451fb168e078d741e49031f83d6",
    "content-type: application/json"
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

#echo $err;
#echo $response;

curl_close($curl);
			
}
  echo "<script type= 'text/javascript'>alert('SR Ticket Status Has Successfully changed');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}
}
?>

