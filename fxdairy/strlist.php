<?php
// Prisijungimo prie MYSQL duomenus
$db_host="localhost";   // Mysql hostas
$db_user="testas";  // Mysql useris 
$db_pasw="testas"; // Mysql paswordas
$db_name="forex"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");

$do=$_GET["do"];
$id=$_GET["id"];
if ($do="trinti" && $id!=''){
//$rezultatai = mysql_query("DELETE * FROM strategija WHERE id = $id");
$query="DELETE FROM `forex`.`strategija` WHERE `strategija`.`id` =".$id.";";
//echo $query;
$result = mysql_query($query) ;
//echo "DELETE * FROM orderiai WHERE id = $id<br>";
//$num = mysql_num_rows($rezultatai);
echo 'Ištrintas įrašas NR:'.$id.'<br>';
}
echo '<a href="strlist.php" target="_self">Naujinti</a> '.'<br>';
echo '<a href="stredit.php" target="_blank">Naujas</a> '.'<br>';

echo 'Statėgijos:<BR>';
echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>ID</th><th>Data</th><th>Redaguoti</th><th>Trinti</th><th>Valiuta</th><th>Tipas</th><th>Periodas</th><th>Gr1</th><th>Komentaras</th><th>GR2</th><th>Komentaras</th><th>GR3</th><th>Komentaras</th><th>GR4</th><th>Komentaras</th><th>Taktika</th><th>Rezultatas</th></tr>'; //pavadinimai
 

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");  

$rezultatai = mysql_query("SELECT * FROM strategija ORDER BY `strategija`.`ID` DESC LIMIT 0 , 1000");

$num = mysql_num_rows($rezultatai);

  for ($i=0; $i<$num; $i++) {
      $eile = mysql_fetch_array($rezultatai);
	  
	 echo '<tr>'; //eulutės pradžia
     echo '<td>';
	 
     echo $eile["id"].' ';
	 echo '</td>';
	 echo '<td>';
	  //echo $eile["sanderio_data"].' ';
	  date_default_timezone_set("Europe/Minsk");
	  echo date("Y/m/d/ D H:i:s", $eile["sdata"]);
	 echo '</td>';
	  
echo '<td>';
echo '<a href="stredit.php?id='.$eile["id"].'" target="_blank">Taisyti</a> '.' ';
echo '</td>';

echo '<td>';
echo '<a href="strlist.php?id='.$eile["id"].'&do=trinti" >Trinti</a> '.'<br>';
echo '</td>';
	  
	  echo '<td>';
echo $eile["valiuta"].' ';
echo '</td>';
	  
	  echo '<td>';
	  echo $eile["srusis"].' ';
	  echo '</td>';
	  
echo '<td>';
echo $eile["speriodas"].' ';
echo '</td>';

echo '<td>';
echo $eile["gr1link"].' ';
echo '</td>';

echo '<td>';
echo $eile["gr1cmt"].' ';
echo '</td>';
	  
	  echo '<td>';
	  echo $eile["gr2link"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["gr2cmt"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["gr3link"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["gr3cmt"].' ';
	  echo '</td>';
	  
 echo '<td>';	  
echo $eile["gr4link"].' ';
 echo '</td>';
 


echo '<td>';
echo $eile["gr4cmt"].' ';
echo '</td>';

echo '<td>';
echo $eile["taktika"].' ';
echo '</td>';

echo '<td>';
echo $eile["arpasitvirtino"].' ';
echo '</td>';


echo '</tr>'; //elutės pabaiga
  }
echo '</table>';


?>