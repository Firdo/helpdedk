<?php include'header/header.php';?>
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id']:die('ERROR:No Record Found');

if(isset($_GET['category']) && ($_GET['detail'])){

$category=$_GET['category'];

$detail=$_GET['detail'];

}


include 'db/dbconfig.php';
//read current record's data
try
{
//prepare select query
$query="SELECT issue.problem,issue.name,issue.time,changeticket.actiontaken,issue.status,issue.critical,issue.rootcause,issue.ticket,changeticket.closedtime,changeticket.solvedby FROM issue INNER join changeticket on issue.id=changeticket.id Where issue.id= ? LIMIT 0,1";
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
       <a href="overall.php"><button class="btn">Back</button> </a>
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
                     <textarea rows="2" name="rootcause" readonly class="form-control"><?php echo $row[rootcause];?></textarea> 
                </div>
                
                
                </div>
                
                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label>Handled By</label>
                   <input type="text" class="form-control" value="<?php echo $row[solvedby];?>" readonly>
                </div>
                
                  <div class="form-group col-md-4">
                    <label>Status</label>
                   <input type="text" class="form-control" value="<?php echo $row[ticket];?>" readonly>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Closed Time:</label>
                   <input type="text" name="timetaken" class="form-control" value="<?php echo $row[closedtime];?>" readonly> 
                </div>
                 </div>
                 <br>
                 <div class="form-row">
                          <div class="form-group col-md-4">
                    <label>POA Category</label>
                    <textarea rows="2"  readonly class="form-control"><?php echo $category;?></textarea> 
                </div>
                
                <div class="form-group col-md-4">
                    <label>POA Detail</label>
                    <textarea rows="2"  readonly class="form-control"><?php echo $detail;?></textarea> 
                </div>
                
                <div class="form-group col-md-4">
                    <label>Action Taken</label>
                    <textarea rows="2"  readonly class="form-control"><?php echo $row[actiontaken];?></textarea> 
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Critical</label>
                   <input type="text" class="form-control" value="<?php echo $row[critical];?>" readonly> 
                </div>
                </div><br>
               </div><br>
        </form>
        </div>
    </div>
</div>
<?php include'header/footer.php';?>

