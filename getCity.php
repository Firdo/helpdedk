<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM critical WHERE id = '" . $_POST["state_id"] . "' ";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected></option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["response"]; ?>"><?php echo $city["response"]; ?></option>
<?php
    }
}
?>