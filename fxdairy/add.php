<?php
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
$result = mysql_query($query) ; }
?>
	<form action="add.php" method="POST">
	trendas<br>
Sanderio įvedimo forma:<br>
Data: <input type="text" name="sanderio_data"><br>
<?php //Savaitės diena: <input type="text" name="savaites_diena"><br> ?>
Sanderio laikas: <input type="text" name="sanderio_laikas"><br>
Sanderio tipas: <input type="text" name="sanderio_tipas"><br>
EMA15 padėtis: <input type="text" name="EMA15"><br>
EMA15 kirtimas: <input type="text" name="EMA15_kirtimas"><br>
EMA5 padėtis:<input type="text" name="EMA5"><br>
FZR ir NK kirtimas: <input type="text" name="FZR_ir_NK"><br>
FOS: <input type="text" name="FOS"><br>
Atidarymo kaina: <input type="text" name="kaina"><br>
TP kaina: <input type="text" name="TP"><br>
SL kaina: <input type="text" name="SL"><br>
FIBO atidirbimas: <input type="text" name="FIBO"><br>
Prekybos planas: <textarea rows="10" cols="30" name="Planas_ir_komentarai"></textarea><br>
Paveikslėlis VP: <input type="text" name="paveikslelis_did_tf"><a href="betaupload.php" target="_blank">Įkelti nuotrauką</a><br>
Paveikslėlis TP: <input type="text" name="paveikslelis_ein_tf"><a href="betaupload.php" target="_blank">Įkelti nuotrauką</a><br>
Suveikęs orderis: <input type="text" name="rezultato_orderis"><br>
Paveikslėlis po uždarymo: <input type="text" name="paveikslelis_po"><a href="betaupload.php" target="_blank">Įkelti nuotrauką</a><br>
Komentarai ir analizės:<textarea rows="10" cols="30" name="komentarai_analizes"></textarea> <br>
Pagal trenda: <input type="text" name="Pagal_trenda"><br>
<a href="betaupload.php" target="_blank">Įkelti nuotrauką</a><br>
<input type="submit" name="submit" value="Siųsti">
<input type="reset" name="reset" value="Trinti">
	</form>

<?php

?>