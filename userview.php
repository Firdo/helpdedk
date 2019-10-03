<?php include'header/header.php';?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
       <a href="index.php"><button class="btn">Back</button> </a>
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
              <th>View</th>
               </tr>
        </thead>
        <tbody>

<?php
include'db/dbconfig.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set records or rows of data per page
$records_per_page = 8;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

$name=$_SESSION['name'];
$query="SELECT * FROM issue where name='$name' order by time DESC LIMIT $from_record_num, $records_per_page";
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
       
       
         if($row['ticket']=='Closed' && $row['status']=='Change') {// 
         
         echo "<td style='background-color: #FF0000;'>".$row['ticket']."</td>"; 
         echo"<td>";
              echo"<a href='userchange.php?id=$row[id]'><img src='image/view.png'></a>"; echo"</td>";
             }
             
             
              elseif($row['ticket']=='Closed' && $row['status']=='Problem') {// 
         
         echo "<td style='background-color: #FF0000;'>".$row['ticket']."</td>"; 
         echo"<td>";
              echo"<a href='userproblem.php?id=$row[id]'><img src='image/view.png'></a>"; echo"</td>";
             }
             
                 elseif($row['ticket']=='open' && $row['status']=='Change') {// 
         
         echo "<td style='background-color: #00FF00;'>".$row['ticket']."</td>"; 
         echo"<td>";
              echo"<a href='userchange.php?id=$row[id]'><img src='image/view.png'></a>"; echo"</td>";
             }
             
             
                 elseif($row['ticket']=='open' && $row['status']=='Problem') {// 
         
         echo "<td style='background-color: #00FF00;'>".$row['ticket']."</td>"; 
         echo"<td>";
              echo"<a href='userproblem.php?id=$row[id]'><img src='image/view.png'></a>"; echo"</td>";
             }
             
             
             elseif($row['ticket']=='Closed' && $row['status']=='') {// 
         
         echo "<td style='background-color: #FF0000;'>".$row['ticket']."</td>"; 
         echo"<td>";
              echo"<a href='userticket.php?id=$row[id]'><img src='image/view.png'></a>"; echo"</td>";
             }
             
             
             else{
                 echo "<td style='background-color: #00FF00;'>".$row['ticket']."</td>";
                 echo"<td>";
              echo"<a'><img src='image/open.gif'></a>"; echo"</td>";
                 
             }
            
      
    
    echo"</tr>";
}?>
</tbody>
</div>
</table>
<?php
$name=$_SESSION['name'];
$query = "SELECT COUNT(*) as total_rows FROM issue where name='$name'";
$stmt = $con->prepare($query);
 
// execute query
$stmt->execute();
 
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];

// paginate records
$page_url="userview.php?";
include_once "paging.php"; ?> 
<?php include'header/footer.php';?>