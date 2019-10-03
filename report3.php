<?php include'header/header.php';?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
               
                
                 <div class="form-group col-md-4">
                    <label>From</label>
                    <input type="date" name="from" class="form-control">
                </div>
                
                 
                 <div class="form-group col-md-4">
                    <label>To</label>
                    <input type="date" name="to" class="form-control">
                </div>
                
          </div>
   <div class="form-row">
  <div class="form-group col-md-6">
    <input type="submit" class="btn btn-danger" name="submit"></div></div>
</form>
</div>
</div>
</div>

<table class="table table-bordered table-hover table-condensed table-striped"> <div class="table responsive">
        <thead>
            <tr>
              <th>Ticket #</th>
              <th>Name</th>
              <th>Problem</th>
              <th>Category</th>
              <th>Detail</th>
               <th>Handled By</th>
              <th>Action Taken</th>
              <th>Action</th>
               </tr>
        </thead>
        <tbody>
             <?php
            if(isset($_POST['submit']))
     {
  include 'db/dbconfig.php';
  

  $from1=$_POST['from'];
  $to1=$_POST['to'];

  $from=$from1.' 00:00:00';
  $to=$to1.' 23:59:59';

 $query="SELECT issue.id,issue.name,issue.poacategory,issue.actiontaken,issue.problem,issue.solvedby,issue.poadetail,issue.ticket,issue.status,poacategory.detail,poacategory.category,poadetails.category FROM issue, poacategory,poadetails WHERE issue.time BETWEEN '$from' AND '$to' AND issue.poadetail=poacategory.id AND issue.poacategory=poadetails.id";
$stmt=$con->prepare($query);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    echo"<tr>";
     echo"<td>";
    $ticket='IT_SR_'.$row[id];
    echo $ticket;
    echo"</td>";
    echo"<td>";
     echo "$row[name]";echo"</td>";
     echo"<td>";
      echo "$row[problem]";echo"</td>";
      echo"<td>";
       echo "$row[category]";echo"</td>";
        echo"<td>";
       echo "$row[detail]";echo"</td>";
         echo"<td>";
       echo "$row[solvedby]";echo"</td>";
        echo"<td>";
       echo "$row[actiontaken]";echo"</td>";
       
        if($row['status']=='Change') {// 
         echo"<td>";
          echo"<a href='getreport1.php?id=$row[id] &category=$row[category]&detail=$row[detail]'>View</a>"; echo"</td>";
             }
        elseif ($row['status']=='Problem') {// 
     echo"<td>";
             echo"<a href='getreport2.php?id=$row[id] &category=$row[category]&detail=$row[detail]'>View</a>"; echo"</td>";
  
             }
             
             elseif($row['status']=='Closed'){
                  echo"<td>";
                  echo"<a href='getreport.php?id=$row[id] &category=$row[category]&detail=$row[detail]'>View</a>"; echo"</td>";
      
             }
                 elseif($row['status']==''){
                  echo"<td>";
                  echo"<a href='getreport3.php?id=$row[id] &category=$row[category]&detail=$row[detail]'>View</a>"; echo"</td>";
      
             }
            
      }
        echo"</tr>"; 
      

          }?>
</tbody>
</div>
</table>



<?php include'header/footer.php';?>