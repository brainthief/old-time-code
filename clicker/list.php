<?php
// Prisijungimo prie MYSQL duomenus
$db_host="localhost";   // Mysql hostas
$db_user="clicker";  // Mysql useris 
$db_pasw="clicker"; // Mysql paswordas
$db_name="clicker"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");

$do=$_GET["do"];
$id=$_GET["id"];
if ($do="trinti" && $id!=''){
//$rezultatai = mysql_query("DELETE * FROM orderiai WHERE id = $id");
$query="DELETE FROM `clicker`.`webpagelist` WHERE `webpagelist`.`id` =".$id.";";
//echo $query;
$result = mysql_query($query) ;
//echo "DELETE * FROM orderiai WHERE id = $id<br>";
//$num = mysql_num_rows($rezultatai);
echo 'Ištrintas įrašas NR:'.$id.'<br>';
}
echo '<a href="list.php" target="_self">Naujinti</a> '.'<br>';
echo '<a href="add.php" target="_blank">Naujas</a> '.'<br>';

echo 'lentelė <BR>';
echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>ID</th><th>URL</th><th>Pavadinimas</th><th>Parodymų per dieną</th><th>Prioritetas</th><th>Būsena</th><th>Redaguoti</th><th>Trinti</th></tr>'; //pavadinimai
 

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");  

$rezultatai = mysql_query("SELECT * FROM webpagelist ORDER BY `webpagelist`.`id` DESC LIMIT 0 , 1000");

$num = mysql_num_rows($rezultatai);

  for ($i=0; $i<$num; $i++) {
      $eile = mysql_fetch_array($rezultatai);
	  
	 echo '<tr>'; //eulutės pradžia
     echo '<td>';
	 echo $eile["id"].' ';
	 echo '</td>';
	 
	  echo '<td>';
	  echo $eile["url"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["name"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["per_day"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["priory"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["comment"].' ';
	  echo '</td>';
	  
echo '<td>';
echo '<a href="edit.php?id='.$eile["id"].'" target="_blank">Taisyti</a> '.' ';
echo '</td>';

echo '<td>';
echo '<a href="list.php?id='.$eile["id"].'&do=trinti" >Trinti</a> '.'<br>';
echo '</td>';


echo '</tr>'; //elutės pabaiga
  }
echo '</table>';


?>