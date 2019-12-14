<?php

$db_host="localhost";   // Mysql hostas
$db_user="testas";  // Mysql useris 
$db_pasw="testas"; // Mysql paswordas
$db_name="forex"; // Pasirinkta DB

//Jungiamës prie duombazës
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");

$do=$_GET["do"];
$id=$_GET["id"];
//$rezultatai = mysql_query("DELETE * FROM orderiai WHERE id = $id");
$query="DELETE FROM `forex`.`orderiai` WHERE `orderiai`.`id` =".$id.";";
echo $query;

?>