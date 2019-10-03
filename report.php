<?php include'header/header.php';?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="">
            <div class="form-row">
               
                   <div class="form-group col-md-3">
                    <label>Name</label>
                    <select class="form-control" name="name">
                        <?php 
include 'db/dbconfig.php';

$query="SELECT name from login";
$stmt=$con->prepare($query);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){?>
    
<option><?php echo $row[name];?></option>    
<?php
    
}
?> </select>
                </div>
                
                 <div class="form-group col-md-3">
                    <label>From</label>
                    <input type="date" name="from" class="form-control">
                </div>
                
                 
                 <div class="form-group col-md-3">
                    <label>To</label>
                    <input type="date" name="to" class="form-control">
                </div>
                
                  <div class="form-group col-md-3">
                    
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
              <th>Issue</th>
              <th>POA Category</th>
              <th>POA Detail</th>
              <th>Handledby</th>
              <th>Status</th>
               </tr>
        </thead>
        <tbody>
            
            <?php
            if(isset($_POST['submit']))
     {
  include 'db/dbconfig.php';
  

  $name=$_POST['name'];
  $from1=$_POST['from'];
  $to1=$_POST['to'];
  $category=$_POST['category'];
 
  $from=$from1.' 00:00:00';
  $to=$to1.' 23:59:59';
  

  
 $query="SELECT issue.id,issue.name,issue.poacategory,issue.problem,issue.solvedby,issue.poadetail,issue.ticket,poacategory.detail,poacategory.category,poadetails.category FROM issue, poacategory,poadetails WHERE issue.name='$name' AND issue.time BETWEEN '$from' AND '$to' AND issue.poadetail=poacategory.id AND issue.poacategory=poadetails.id";
 
#$query1="SELECT issue.id,issue.name,issue.poacategory,issue.poadetail,issue.ticket,poacategory.detail FROM issue, poacategory WHERE issue.poacategory='$category' AND issue.name='$name' AND issue.time BETWEEN '$from' AND '$to' AND issue.poadetail=poacategory.id";

$stmt=$con->prepare($query);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo"<tr>";
    echo"<td>";
    $ticket='IT_SR_'.$row[id];
    echo "$ticket";echo"</td>";
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
       echo "$row[ticket]";echo"</td>";
       echo"</tr>";
}

}?>
</tbody>
</div>
</table>




<?php include'header/footer.php';?>