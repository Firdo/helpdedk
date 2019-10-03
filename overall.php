<?php include'header/mainheader.php';?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="service.php"><button class="btn">Back</button> </a>
    </div>
    </div>
    </div>
<table class="table table-bordered table-hover table-condensed table-striped"> <div class="table responsive">
        <thead>
            <tr>
              <th>Ticket #</th>
              <th>Name</th>
              <th>Problem</th>
              <th>Time</th>
              <th>Status</th>
              <th>Action</th>
               </tr>
        </thead>
        <tbody>

<?php
include'db/dbconfig.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set records or rows of data per page
$records_per_page = 15;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

$query="SELECT * FROM issue order by time DESC LIMIT $from_record_num, $records_per_page";
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
       echo "$row[time]";echo"</td>";
         if($row['status']=='' && $row['ticket']=='open') {// 
         echo "<td style='background-color: #00FF00;'>".$row['ticket']."</td>"; 
             echo"<td>";
              echo"<a><img src='image\open.gif'></a>";
       echo"</td>";
             }
        elseif ($row['status']=='Change') {// 
        
              
         echo "<td style='background-color: #FF7F50;'>".$row['ticket']."</td>"; 
             echo"<td>";
              echo"<a href='view2change.php?id=$row[id]'><img src='image\settings.png'></a>";
       echo"</td>";
             }
             
             elseif ($row['status']=='Problem') {// 
         echo "<td style='background-color: #1e90ff;'>".$row['ticket']."</td>"; 
             echo"<td>";
              echo"<a href='view2problem.php?id=$row[id]'><img src='image\settings.png'></a>";
       echo"</td>";
             }
             
             elseif($row['status']=='' && $row['ticket']=='Closed'){
                 echo "<td style='background-color: #FF0000;'>".$row['ticket']."</td>";
                  echo"<td>";
                  echo"<a href='view.php?id=$row[id]'><img src='image\settings.png'></a>";
       echo"</td>";
             }
            
    echo"</tr>";
}?>
</tbody>
</div>
</table>
<?php
$query = "SELECT COUNT(*) as total_rows FROM issue";
$stmt = $con->prepare($query);
 
// execute query
$stmt->execute();
 
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];

// paginate records
$page_url="overall.php?";
include_once "paging.php"; ?> 
<?php include'header/footer.php';?>
