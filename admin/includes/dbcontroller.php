<?php
$DB_host = "localhost";
$DB_user = "sriniva1";
$DB_pass = "93Tr;T11-bvYPk";
$DB_name = "sriniva1_mcapro";
try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 $e->getMessage();
}
?>