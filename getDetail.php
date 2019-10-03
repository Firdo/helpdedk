<?php
include 'dbcontroller.php';
$db_handle = new DBController();
$_POST["detail_id"]=10011;
if (! empty($_POST["detail_id"])) {
    $query = "SELECT * FROM poadetail WHERE cat_id = '" . $_POST["detail_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["id"]; ?>"><?php echo $state["description"]; ?></option>
<?php
    }
}
?>