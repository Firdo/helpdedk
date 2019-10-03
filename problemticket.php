<?php include 'header/header.php';?>
<?php
include'db/dbconfig.php';
if($_POST['submit']){
    $id=$_POST['id'];
    $observed=$_POST['observed'];
    $actiontaken=$_POST['actiontaken'];
    $handledby=$_POST['handledby'];
    date_default_timezone_set("Asia/Dubai");
    $time= date("Y/m/d H:i:s", strtotime("-720 minutes"));
    $query="INSERT INTO problemticket SET id=:id,observed=:observed,actiontaken=:actiontaken,handledby=:handledby,time=:time";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':id', $id); 
   $stmt->bindParam(':observed', $observed);  
   $stmt->bindParam(':actiontaken', $actiontaken);
   $stmt->bindParam(':handledby', $handledby);
   $stmt->bindParam(':time', $time);
   
    
   if($stmt->execute()){
        
    echo "<script>alert('Problem Ticket Has Been  Registered Successfully!');</script>";
   }
      else{
         echo "<script>alert('Please check your inputs !!!');</script>";
      }
      }?>

      <div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="service.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div><br
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>id:</label>
                    <input type="text" name="id" class="form-control" required="">
                </div>
                
                 <div class="form-group col-md-4">
                    <label>problem Observed:</label>
                    <input type="text" name="observed" class="form-control">
                </div>
                
                <div class="form-group col-md-4">
                    <label>Action Taken</label>
                    <input type="text" name="actiontaken" class="form-control">
                </div>
                
                <div class="form-group col-md-4">
                    <label>Handled By</label>
                      <select class="form-control" name="handledby">
                       <option>Riyadh Khan</option>
                       <option>Niyasuddin</option>
                       <option>Firdous Farith</option>
                       
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
                </div><br>
        </form>
        </div>
    </div>
    

</div>













<?php include 'header/footer.php';?>