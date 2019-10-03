<?php include'header/header.php';?>
<?php

$id=$_SESSION[username];
include 'db/dbconfig.php';
try
{
$query="SELECT * FROM login WHERE username= ? LIMIT 0,1";
$stmt= $con -> prepare($query);
$stmt->bindParam(1, $id);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

catch(PDOException $exception){
die('ERROR:'.$exception->getMessage());
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="index.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row[username];?>" readonly>
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row[name];?>" readonly>
                </div>
                
                 
                 <div class="form-group col-md-4">
                    <label>password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $row[password];?>" >
                </div>
                
                 
                </div>
                
                         <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Email ID</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row[email] ;?>" >
                </div>
                
                 <div class="form-group col-md-4">
                    <label>Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" value="<?php echo $row[mobile];?>" placeholder="971********">
                </div>
                </div>

                <div class="form-row">
                 <div class="form-group col-md-4">
                    
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" name="submit" class="form-control btn btn-info" value="ADD">
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
  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];

  
$query="UPDATE login SET password=:password, email =:email, mobile =:mobile WHERE username =:username";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":password"=>$password,":email"=>$email,":mobile"=>$mobile, ":username"=>$username));
if($row){

  echo "<script type= 'text/javascript'>alert('Profile Has successfully Been Updated !');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}
}
?>


<?php include'header/footer.php';?>