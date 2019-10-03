<?php if(!isset($_SESSION)){
session_start();}?>
<?php include'header/header.php';?>

<?php
include'db/dbconfig.php';
if($_POST['submit']){
    $name=$_POST['name'];
    
    $problem=$_POST['issue'];
    $location=$_POST['location'];
    $status="open";
    $incident="Yes";
    date_default_timezone_set("Asia/Dubai");
    $time= date("Y/m/d H:i:s", strtotime("-0 minutes"));
    $query="INSERT INTO issue SET name=:name,problem=:problem,location=:location,time=:time,incident=:incident,ticket=:status";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':problem', $problem);  
   $stmt->bindParam(':location', $location);
   $stmt->bindParam(':time', $time);
   $stmt->bindParam(':status', $status);
   $stmt->bindParam(':incident', $incident);
  
    
   if($stmt->execute()){
        
   //start of MAIL API
   

    echo "<script>alert('Complaint Registered Successfully!');</script>";
   }
      else{
         echo "<script>alert('Please check your inputs !!!');</script>";
      }
      }?>

      <div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="index.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div><br
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Name:</label>
                    <select name="name" id="name" class="form-control">
                               <?php 
                    include'db/dbconfig.php';
                    $query="SELECT * FROM login order by name ASC";
                    $stmt=$con->prepare($query);
                    $stmt->execute();
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                           <?php 
                       echo"<option>$row[name]</option>";
                       } ?>
                   </select>
                   

                </div>

                
                 <div class="form-group col-md-4">
                    <label>problem Detail:</label>
                    <input type="text" name="issue" class="form-control">
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Location:</label>
                    <select class="form-control" name="location">
                        <option value="">Select a Location</option>
                    <?php 
                    include'db/dbconfig.php';
                    $type=$_SESSION['type'];
                    $query="SELECT * FROM department order by name ASC";
                    $stmt=$con->prepare($query);
                    $stmt->execute();
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                   <?php 
                       echo"<option>$row[name]</option>";
                       } ?>
                   </select>
                </div>
                <br>
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
<?php include 'header/footer.php'; ?>