<?php if(!isset($_SESSION)){
session_start();}?>
<?php include'header/header.php';?>
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
        <form method="POST" action="" enctype='multipart/form-data'>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name'];?>" readonly>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>problem Detail:</label>
                    <input type="text" name="issue" class="form-control">
                </div>
                
                
                <div class="form group col-md-4">
<label>Photo:</label>
<input type="file" name="image" id="name" class="form-control"/><br /><br /></div></div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                    <label>Location:</label>
                    <select class="form-control" name="location">
                        <option value="">Select a Location</option>
                    <?php 
                    include'db/dbconfig.php';
                    $type=$_SESSION['type'];
                    $query="SELECT * FROM department where type='$type' order by name ASC";
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
    
    <?php
include'db/dbconfig.php';
if($_POST['submit']){
    $name=$_SESSION['name'];
    $problem=$_POST['issue'];
    $location=$_POST['location'];
    $status="open";
      date_default_timezone_set("Asia/Dubai");
    $time= date("Y/m/d H:i:s", strtotime("-0 minutes"));
    
     if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $file_names = $_FILES['image']['name'].$time;
      
      $expensions= array("jpeg","jpg","png","pptx","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 104857600){
         $errors[]='File size must be excately 2 MB';
      }
        $path=move_uploaded_file($file_tmp,"images/".$file_names);
      
      if(empty($errors)==true){
         $path;
        }else{
         //print_r($errors);
      }
   }
      $image="images/".$file_names; 
      
      
  
    $query="INSERT INTO issue SET name=:name,problem=:problem,location=:location,image=:image,time=:time,status=:status";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':problem', $problem);  
   $stmt->bindParam(':location', $location);
   $stmt->bindParam(':image', $image);
   $stmt->bindParam(':time', $time);
   $stmt->bindParam(':status', $status);
    
   if($stmt->execute()){
        $message='Hi,'.$name.' We have received your Complaint our IT reps will be there ASAP.';
    $to="it@gmail.com";
    $subject="SR Ticket";
    $headers = 'From: support@dubaigem.com' . "\r\n" .
    'Reply-To: support@dubaigem.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    echo "<script>alert('Complaint Registered Successfully!');</script>";
   }
      else{
         echo "<script>alert('Please check your inputs !!!');</script>";
      }
      }?>
    

</div>
<?php include 'header/footer.php'; ?>