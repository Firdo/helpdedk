<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if ( !empty($_POST["name_id"])) {
    $query = "SELECT * FROM login WHERE id = '$_POST[name_id]'";
    $results = $db_handle->runQuery($query);
    
    ?>
<option value disabled selected>Select Description</option>
<?php
    foreach ($results as $login) {
        ?>
<option value="<?php echo $login['id']; ?>"><?php echo $login['mobile']; ?></option>
<?php
    }
}
?>