<?php
/*

// Prisijungimo prie MYSQL duomenus
$db_host="localhost";   // Mysql hostas
$db_user="testas";  // Mysql useris 
$db_pasw="testas"; // Mysql paswordas
$db_name="forex"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw") or die ("Negaliu prisijungti");
	mysql_select_db ("$db_name");  

//gauti iš formos kintamieji
$sanderio_data = $_POST["sanderio_data"];
$sanderio_laikas = $_POST["sanderio_laikas"];
//Apdorojam laika
date_default_timezone_set("Europe/Minsk");
list($valanda, $minute, $sekunde) = split('[:.-]', $sanderio_laikas);
//echo "Valanda: $valanda; Minute: $minute; Sekunde: $sekunde<br />\n";

if ( $diena != ''){
//echo mktime(0,0,0,$menuo,$diena,$metai);
$sanderio_data = mktime(0,0,0,$menuo,$diena,$metai);
};
//$date = "04/30/1973";
list($metai, $menuo, $diena) = split('[/.-]', $sanderio_data);
//echo "Metai: $metai; Mėnuo: $menuo; Diena: $diena<br />\n";
//date_default_timezone_set("Europe/Minsk");
if ( $diena != ''){
//echo mktime($valanda,$minute,$sekunde,$menuo,$diena,$metai);
$sanderio_data = mktime($valanda,$minute,$sekunde,$menuo,$diena,$metai);
};

$sanderio_tipas = $_POST["sanderio_tipas"];
$EMA15 = $_POST["EMA15"];
$EMA15_kirtimas = $_POST["EMA15_kirtimas"];
$EMA5 = $_POST["EMA5"];
$FZR_ir_NK = $_POST["FZR_ir_NK"];
$FOS = $_POST["FOS"];
$kaina = $_POST["kaina"];
$TP = $_POST["TP"];
$SL = $_POST["SL"];
$FIBO = $_POST["FIBO"];
$Planas_ir_komentarai = $_POST["Planas_ir_komentarai"];
$paveikslelis_did_tf = $_POST["paveikslelis_did_tf"];
$paveikslelis_ein_tf = $_POST["paveikslelis_ein_tf"];
$rezultato_orderis = $_POST["rezultato_orderis"];
$paveikslelis_po = $_POST["paveikslelis_po"];
$komentarai_analizes = $_POST["komentarai_analizes"];
$Pagal_trenda = $_POST["Pagal_trenda"];


//echo $sanderio_data.' '.$sanderio_laikas; 
if ($sanderio_data != ''){
$query = "INSERT INTO orderiai (sanderio_data,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda')";
$result = mysql_query($query) ; } */
?>
*/
<form action="add.php" method="POST">
<br>
Staito įvedimo forma:<br>
URL: <input type="text" name="url"><br>
Pavadinimas: <input type="text" name="url_name"><br>
Parodymų iš vieno IP per dieną: <input type="text" name="per_dieną"><br>
Prioritetas [10..1,0-neskaičiuojam]: <input type="text" name="EMA15"><br>
Aktyvus: <input type="radio" name="actyve" value="1"> Taip
<input type="radio" name="actyve" value="0"> Ne
	</form>

<?php

?>