<?php
class db{
public function connect(){
$DB_host = "localhost";
$DB_user = "dgpspdpi_farith";
$DB_pass = "Farith@1990";
$DB_name = "dgpspdpi_inventory";
try
{
 $conn = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;
}
catch(PDOException $e)
{
echo "connection Failed".$e;
}

}

}
?>