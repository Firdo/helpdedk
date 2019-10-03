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
       <a href="showticket.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>SR #</label>
                    <input type="text" name="id" class="form-control" value="<?php $ticket="IT_SR_".$id ; 
                    echo $ticket; ?>" readonly>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Requested By:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row[name];?>" readonly>
                </div>
                
                 
                 <div class="form-group col-md-4">
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
                   <div class="form-group col-md-4">
                    <label>Handled By</label>
                    <select class="form-control" name="handledby">
                        <option>Riyadh Khan</option>
                        <option>Mohammed Niyasuddin</option>
                        <option>Firdous Farith</option>
                    </select>
                </div>
                
                  <div class="form-group col-md-4">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        
                        <option>Closed</option>
                        <option>Problem</option>
                        <option>Change</option>
                    </select>
                </div>
                
                 <div class="form-group col-md-4">
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
  $status=$_POST['status'];
  $timetaken=$_POST['timetaken'];
  $actiontaken=$_POST['actiontaken'];
  $poacategory=$_POST['poacategory'];
  $poadetail=$_POST['poadetail'];
  $critical=$_POST['critical'];
  $finish=$_POST['time'];
  
$query="UPDATE issue SET name=:name, time=:time, problem=:problem, rootcause =:rootcause, handledby =:handledby, status =:status, timetaken =:timetaken,actiontaken=:actiontaken, poacategory =:poacategory, poadetail =:poadetail, critical =:critical, finish=:finish WHERE  id =:id";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":name"=>$name,":time"=>$time,":problem"=>$problem,":rootcause"=>$rootcause,":handledby"=>$handledby,":status"=>$status,":timetaken"=>$timetaken,":actiontaken"=>$actiontaken,":poacategory"=>$poacategory,":poadetail"=>$poadetail, ":critical"=>$critical,":finish"=>$finish,":id"=>$id));
if($row){

  echo "<script type= 'text/javascript'>alert('SR Ticket Status Has Successfully changed');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}
}
?>

