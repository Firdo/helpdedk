<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if ( !empty($_POST["country_id"])) {
    $query = "SELECT * FROM poacategory WHERE category = '$_POST[country_id]'";
    $results = $db_handle->runQuery($query);
    e
    ?>
<option value disabled selected>Select Description</option>
<?php
    foreach ($results as $detail) {
        ?>
<option value="<?php echo $detail["id"]; ?>"><?php echo $detail["detail"]; ?></option>
<?php
    }
}
?>