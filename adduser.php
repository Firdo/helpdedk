<?php if(!isset($_SESSION)){
session_start();}?>
<?php include'header/header.php';?>
<?php
include'db/dbconfig.php';
if($_POST['submit']){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
        
    $query="INSERT INTO login SET name=:name,password=:password,username=:username,type=:type";
   $stmt=$con->prepare($query);
   $stmt->bindParam(':name', $name); 
   $stmt->bindParam(':password', $password);  
   $stmt->bindParam(':username', $username);
   $stmt->bindParam(':type', $type);

    
   if($stmt->execute()){
            echo "<script>alert('User Registered Successfully!');</script>";
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
                <div class="form-group col-md-3">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control"> 
                </div>
                
              
                   <div class="form-group col-md-6">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control"> 
                </div>
                
                 <div class="form-group col-md-3">
                    <label>password:</label>
                    <input type="text" name="password" class="form-control"> 
                </div></div>
                 <div class="form-row">
                 <div class="form-group col-md-6">
                    <label>Department:</label>
                <select class="form-control" name="type">
                        <option value="primary">Primary</option>
                        <option value="secondary">Secondary</option>
                        <option value="admin1">Admin</option></select>
                   
                </div></div>
                <br><br>
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