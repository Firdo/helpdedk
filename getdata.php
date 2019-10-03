<?php

include'db\dbconfig.php';
$category=$_POST['category'];

if(isset($_POST['category'])){
    $category=$_POST['category'];
    $query="SELECT * from poadetail where cat_id='.$category.'";
                        $stmt=$con->prepare($query);
                        $stmt->execute();
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='. $row[id].'>$row[description]</option>";}
    
    
}

?>