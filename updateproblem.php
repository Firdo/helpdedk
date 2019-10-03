<?php include'header/header.php';?>
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id']:die('ERROR:No Record Found');
include 'db/dbconfig.php';
//read current record's data
try
{
//prepare select query
$query="SELECT * FROM problemticket WHERE id= ? LIMIT 0,1";
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
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="viewproblem.php"><button class="btn">Back</button> </a>
    </div>
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
                    <label>Forwarded By</label>
                    <input type="text" name="handledby" class="form-control" value="<?php echo $row[handledby];?>" readonly>
                </div>
                
                 
                </div>
                <br> <div class="form-row">
                    
                    <div class="form-group col-md-6">
                    <label>Problem Observed</label>
                   <textarea rows="2" name="rootcause" class="form-control" readonly><?php echo $row[rootcause];?></textarea>
                </div>
                    
                    <div class="form-group col-md-6">
                    <label>Forwarded Time:</label>
                     <textarea rows="2" name="finish" class="form-control" readonly><?php echo $row[finish];?></textarea>
                </div>
             </div>
             <div class="form-row">
             <div class="form-group col-md-12">
                    <label>Action Taken:</label>
                     <textarea rows="2" name="actiontaken" class="form-control"></textarea>
                </div>
                </div>
                
                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label>Handled By</label>
                    <select class="form-control" name="solvedby">
                        <option>Riyadh Khan</option>
                        <option>Mohammed Niyasuddin</option>
                        <option>Firdous Farith</option>
                    </select>
                </div>
                
                  <div class="form-group col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        
                        <option>Closed</option>
                        
                    </select>
                </div>
                
             
                 </div>
                 <br>
                 
                <div class="form-row">
                 <div class="form-group col-md-4">
                    
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
  $finish=$_POST['finish'];
  $mobile=$_POST['mobile'];
  $rootcause=$_POST['rootcause'];
  $handledby=$_POST['handledby'];
  $status=$_POST['status'];
  $actiontaken=$_POST['actiontaken'];
  $solvedby=$_POST['solvedby'];
  date_default_timezone_set("Asia/Dubai");
  $closedtime= date("Y/m/d H:i:s", strtotime("0 minutes"));
 
  
$query="UPDATE problemticket SET name=:name, finish=:finish, mobile=:mobile, rootcause =:rootcause, handledby =:handledby, status =:status,actiontaken=:actiontaken, solvedby =:solvedby,closedtime=:closedtime WHERE  id =:id";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":name"=>$name,":finish"=>$finish,":mobile"=>$mobile,":rootcause"=>$rootcause,":handledby"=>$handledby,":status"=>$status,":actiontaken"=>$actiontaken,":solvedby"=>$solvedby,":closedtime"=>$closedtime,":id"=>$id));
if($row){
    
     $query="UPDATE issue SET ticket =:status,actiontaken=:actiontaken, solvedby=:solvedby WHERE  id =:id";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":status"=>$status,":actiontaken"=>$actiontaken,":solvedby"=>$solvedby,":id"=>$id));

    
    


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
					"message":"Dear '.$name.',  Your Complaint '.$id1.'  has been Resolved Successfully, For Detail Kindly visit www.helpdesk.dgpspdp.in Regards, DGPS IT Dept.",   
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
    
    
    $query="SELECT login.email,issue.problem FROM issue,login WHERE login.name=issue.name AND login.name='$name' AND issue.id='$id'";
$stmt=$con->prepare($query);
$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);

$curl = curl_init();

$email=$row['email'];
$id1;
$name;
$problem=$row['problem'];
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
    

  echo "<script type= 'text/javascript'>alert('SR Ticket Status Has Successfully changed');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}
}
?>

