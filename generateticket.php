<?php if(!isset($_SESSION)){
session_start();}?>
<?php include'header/header.php';?>
<?php
include'db/dbconfig.php';
if($_POST['submit']){
    $name=$_SESSION['name'];
    $mobile=$_SESSION['mobile'];
    $problem=$_POST['issue'];
    $location=$_POST['location'];
    $status="open";
    date_default_timezone_set("Asia/Dubai");
    $time= date("Y/m/d H:i:s", strtotime("0 minutes"));
    $query="INSERT INTO issue SET name=:name,problem=:problem,location=:location,time=:time,ticket=:status,mobile=:mobile";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':problem', $problem);  
   $stmt->bindParam(':location', $location);
   $stmt->bindParam(':time', $time);
   $stmt->bindParam(':status', $status);
   $stmt->bindParam(':mobile', $mobile);
    
   if($stmt->execute()){
        
   //start of MAIL API
   
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.pepipost.com/v2/sendEmail",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"recipient\":\"firdous.f@dubaigem.ae\"}],\"from\":{\"fromEmail\":\"support@dgpspdp.in\",\"fromName\":\"IT Support\"},\"subject\":\"Ticket Number\",\"content\":\"Hi Team, <br><br><br><br>Please look in to below ticket<br> <br><br>Name: $name<br>Issue.$problem<br>Location:$location<br><br><br>Regards<br>IT Dept.\"}",
  CURLOPT_HTTPHEADER => array(
    "api_key: bc691451fb168e078d741e49031f83d6",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  #echo "cURL Error #:" . $err;
  $new=$err.$name.$time;
  $new1="\r\n".$new;
 $myfile = fopen("email_status.txt", "a");
fwrite($myfile, $new1);
fclose($myfile);
} else {
  #echo $response;
   $res=$response.$name.$time;
  $res1="\r\n".$res;
  $myfile = fopen("email_status.txt", "a");
fwrite($myfile, $res1);
fclose($myfile);
}
//END of MAIL API
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
                <div class="form-group col-md-6">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name'];?>" readonly>
                </div>
                
              
                
                
                 <div class="form-group col-md-6">
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
                
                 <div class="form-group col-md-12">
                    <label>problem Detail:</label>
                    <textarea rows="5" type="text" name="issue" class="form-control"></textarea>
                </div></div>
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
<?php include 'header/footer.php'; ?>