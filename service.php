<?php include'header/header.php';?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="index.php"><button class="btn hvr-grow">Back</button> </a>
    </div>
    </div>
    </div><br>

   <div class="container">
<div class="row">

<?php if($_SESSION['type']=='admin') { ?>
    
    <div class="col-md-6">
      <div class="box dept"> 
       <p><a href="dashboard.php">Dashboard</a></p>
            
            
       
  </div>
        </div>
        
         <div class="col-md-6">
      <div class="box dept"> 
           
          <p><a href="overall.php">View All Tickets</a></p>  
       
  </div>
        </div>
        

<?php }?>
   
</div>
</div>

<?php include'header/footer.php';?>