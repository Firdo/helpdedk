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
                    <label>Requested At</label>
                    <input type="text" name="time" class="form-control" value="<?php echo $row[time];?>" readonly>
                </div>
                
                 <div class="form-group col-md-3">
                    <label>Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" value="<?php echo $row[mobile];?>" readonly>
                </div>
                 
                </div>
                <br> <div class="form-row">
                    
                    <div class="form-group col-md-6">
                    <label>Incident Detail:</label>
                   <textarea rows="2" name="problem" class="form-control" readonly><?php echo $row[problem];?> </textarea>
                </div>
                    
                    <div class="form-group col-md-6">
                    <label>Root Cause:</label>
                     <textarea rows="2" name="rootcause" class="form-control"></textarea> </textarea>
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
                        <option>open</option>
                        <option>Closed</option>
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
                    <label>POA Category</label>
                    <select class="form-control" name="poacategory" id="poacategory">
                        <option value="">Select a Category</option>
                        <?php 
                        include'db/dbconfig.php';
                        $query="SELECT * from poacategory";
                        $stmt=$con->prepare($query);
                        $stmt->execute();
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='. $row[id].'>$row[category]</option>";}
                        ?>
                        
                    </select>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>POA Detail</label>
                    <select class="form-control" name="poadetail" id="poadetail">
                        <option value="">Select Description</option>
                        
                    </select>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Critical</label>
                   <input type="text" name="critical" class="form-control"> 
                </div>
                </div><br>
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
  $poacategory=$_POST['poacategory'];
  $poadetail=$_POST['poadetail'];
  $critical=$_POST['critical'];
  $finish=$_POST['time'];
  
$query="UPDATE issue SET name=:name, time=:time, problem=:problem, rootcause =:rootcause, handledby =:handledby, status =:status, timetaken =:timetaken, poacategory =:poacategory, poadetail =:poadetail, critical =:critical, finish=:finish WHERE  id =:id";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":name"=>$name,":time"=>$time,":problem"=>$problem,":rootcause"=>$rootcause,":handledby"=>$handledby,":status"=>$status,":timetaken"=>$timetaken,":poacategory"=>$poacategory,":poadetail"=>$poadetail, ":critical"=>$critical,":finish"=>$finish,":id"=>$id));
if($row){

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
    
    

  echo "<script type= 'text/javascript'>alert('SR Ticket Status Has Successfully changed');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}
}
?>
<script text='text/javascript'>
$(document).ready(function(){
    
    //AJAX call
    
    $('#poacategory').on('change',function(){
        
        var $category=$(this).val();
        
        if(category){
            
            $.ajax({
                
                type:'POST',
                url:'getdata.php',
                data:'category='+category,
                success:function(html)
                {
                   console.log(html);
                   $('#poadetail').html(html);
                },
                
            });  
        
            
        }
        
        else{
        $(#poadetail).html('<option value="">Select a Category First</option>')
            
        }
        
        
        
    });

    
    
    
    
    
    
});
    
    
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c6924b8f324050cfe339af1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<?php include'header/footer.php';?>

