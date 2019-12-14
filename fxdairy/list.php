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
//$rezultatai = mysql_query("DELETE * FROM orderiai WHERE id = $id");
$query="DELETE FROM `forex`.`orderiai` WHERE `orderiai`.`id` =".$id.";";
//echo $query;
$result = mysql_query($query) ;
//echo "DELETE * FROM orderiai WHERE id = $id<br>";
//$num = mysql_num_rows($rezultatai);
echo 'Ištrintas įrašas NR:'.$id.'<br>';
}
echo '<a href="list.php" target="_self">Naujinti</a> '.'<br>';
echo '<a href="edit.php" target="_blank">Naujas</a> '.'<br>';

echo 'lentelė <BR>';
echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>ID</th><th>Data</th><th>Redaguoti</th><th>Trinti</th><th>Sanderio tipas</th><th>Atidarymo kaina</th><th>TP</th><th>SL</th><th>EMA15 padėtis</th><th>EMA15 kirtimas</th><th>EMA5 kirtimas</th><th>NK kirtimas ir FZR</th><th>FOS</th><th>FIBO</th><th>Planas</th><th>VP</th><th>IP</th><th>Suveikęs orderis</th><th>Po</th><th>Pagal trendą</th><th>Analizė</th></tr>'; //pavadinimai
 

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");  

$rezultatai = mysql_query("SELECT * FROM orderiai ORDER BY `orderiai`.`id` DESC LIMIT 0 , 1000");

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
	  if ($eile["sanderio_data"]>=974298170) {echo date("Y/m/d/ D H:i:s", $eile["sanderio_data"]);} else {echo $eile["sanderio_data"].' ';} ;
	 echo '</td>';
	  
echo '<td>';
echo '<a href="edit.php?id='.$eile["id"].'" target="_blank">Taisyti</a> '.' ';
echo '</td>';

echo '<td>';
echo '<a href="list.php?id='.$eile["id"].'&do=trinti" >Trinti</a> '.'<br>';
echo '</td>';
	  
	  echo '<td>';
	  echo $eile["sanderio_tipas"].' ';
	  echo '</td>';
	  
echo '<td>';
echo $eile["kaina"].' ';
echo '</td>';

echo '<td>';
echo $eile["TP"].' ';
echo '</td>';

echo '<td>';
echo $eile["SL"].' ';
echo '</td>';
	  
	  echo '<td>';
	  echo $eile["EMA15"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["EMA15_kirtimas"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["EMA5"].' ';
	  echo '</td>';
	  
	  echo '<td>';
	  echo $eile["FZR_ir_NK"].' ';
	  echo '</td>';
	  
 echo '<td>';	  
echo $eile["FOS"].' ';
 echo '</td>';
 


echo '<td>';
echo $eile["FIBO"].' ';
echo '</td>';

echo '<td>';
echo $eile["Planas_ir_komentarai"].' ';
echo '</td>';

echo '<td>';
echo $eile["paveikslelis_did_tf"].' ';
echo '</td>';

echo '<td>';
echo $eile["paveikslelis_ein_tf"].' ';
echo '</td>';

echo '<td>';
echo $eile["rezultato_orderis"].' ';
echo '</td>';

echo '<td>';
echo $eile["paveikslelis_po"].' ';
echo '</td>';

echo '<td>';
echo $eile["Pagal_trenda"].' ';
echo '</td>';

echo '<td>';
echo $eile["komentarai_analizes"].' ';
echo '</td>';



echo '</tr>'; //elutės pabaiga
  }
echo '</table>';


?>