<?php
// Prisijungimo prie MYSQL duomenus
$db_host="localhost";   // Mysql hostas
$db_user="testas";  // Mysql useris 
$db_pasw="testas"; // Mysql paswordas
$db_name="forex"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw");
	mysql_select_db ("$db_name");  

$id=$_GET["id"];	
$do=$_GET["do"];
//echo $do;
//echo $id;

echo "to do: msf kirtimai<br>depas<br>sajungininkai<br>";

//forma
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
date_default_timezone_set("Europe/Minsk");
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

//$query = "INSERT INTO orderiai (sanderio_data,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda')";
if ( $do == 'keisti' ) {
if ( $id != '') {
//$query = "UPDATE orderiai SET (sanderio_data,savaites_diena,sanderio_laikas,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$savaites_diena','$sanderio_laikas','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda') WHERE 'id` =$id";
//$query = "UPDATE orderiai SET sanderio_data = '$sanderio_data' WHERE 'id` =$id";
$query="UPDATE `forex`.`orderiai` SET `sanderio_data` = '".$sanderio_data."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `sanderio_tipas` = '".$sanderio_tipas."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `EMA15` = '".$EMA15."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `EMA15_kirtimas` = '".$EMA15_kirtimas."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `EMA5` = '".$EMA5."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `FZR_ir_NK` = '".$FZR_ir_NK."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `FOS` = '".$FOS."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `kaina` = '".$kaina."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `TP` = '".$TP."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `SL` = '".$SL."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `FIBO` = '".$FIBO."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `Planas_ir_komentarai` = '".$Planas_ir_komentarai."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `paveikslelis_did_tf` = '".$paveikslelis_did_tf."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `paveikslelis_ein_tf` = '".$paveikslelis_ein_tf."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `rezultato_orderis` = '".$rezultato_orderis."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `paveikslelis_po` = '".$paveikslelis_po."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `komentarai_analizes` = '".$komentarai_analizes."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`orderiai` SET `Pagal_trenda` = '".$Pagal_trenda."' WHERE `orderiai`.`id` =".$id.";";
$result = mysql_query($query) ;
echo 'Pakeista<br>';
}
else { 
echo "nera id";
$query = "INSERT INTO orderiai (sanderio_data,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda')";
$result = mysql_query($query) ;
} // klaida po ID tikrinimo

}

//tikriname as yra $id	
if ($id != '') {
$rezultatai = mysql_query("SELECT * FROM `orderiai` WHERE `id` =".$id);
//echo  $rezultatai;
$num = mysql_num_rows($rezultatai);

  for ($i=0; $i<$num; $i++) {
      $eile = mysql_fetch_array($rezultatai);
      //echo $eile["id"].' ';
	  //echo $eile["sanderio_data"].' ';
	  //echo $eile["savaites_diena"].' ';
      //echo $eile["sanderio_laikas"].' ';
	  //echo $eile["sanderio_tipas"].' ';
	  //echo $eile["EMA15"].' ';
	  //echo $eile["EMA15_kirtimas"].' ';
	  //echo $eile["EMA5"].' ';
	  //echo $eile["FZR_ir_NK"].' ';
      //echo $eile["FOS"].' ';
      //echo $eile["kaina"].' ';
      //echo $eile["TP"].' ';
      //echo $eile["SL"].' ';
      //echo $eile["Planas_ir_komentarai"].' ';
      //echo $eile["paveikslelis_did_tf"].' ';
      //echo $eile["paveikslelis_ein_tf"].' ';
      //echo $eile["rezultato_orderis"].' ';
      //echo $eile["paveikslelis_po"].' ';
      //echo $eile["Pagal_trenda"].' ';
      //echo $eile["komentarai_analizes"].' '.'<br>';
	  //echo $eile["Pagal_trenda"];
	 

//$sanderio_data_old=$eile["sanderio_data"];
date_default_timezone_set("Europe/Minsk");
if ($eile["sanderio_data"]>=974298170) {$sanderio_data_old=date("Y/m/d", $eile["sanderio_data"]);} else {$sanderio_data_old=$eile["sanderio_data"];} ;

if ($eile["sanderio_data"]>=974298170) {$sanderio_laikas_old=date("H:i:s", $eile["sanderio_data"]);} else {$sanderio_laikas_old=$eile["sanderio_laikas"];} ;
$sanderio_tipas_old=$eile["sanderio_tipas"];
$EMA15_old=$eile["EMA15"];
$EMA15_kirtimas_old=$eile["EMA15_kirtimas"];
$EMA5_old=$eile["EMA5"];
$FZR_ir_NK_old=$eile["FZR_ir_NK"];
$FOS_old=$eile["FOS"];
$kaina_old=$eile["kaina"];
$TP_old=$eile["TP"];
$SL_old=$eile["SL"];
$FIBO_old=$eile["FIBO"];
$Planas_ir_komentarai_old=$eile["Planas_ir_komentarai"];
$paveikslelis_did_tf_old=$eile["paveikslelis_did_tf"];
$paveikslelis_ein_tf_old=$eile["paveikslelis_ein_tf"];
$rezultato_orderis_old=$eile["rezultato_orderis"];
$paveikslelis_po_old=$eile["paveikslelis_po"];
$Pagal_trenda_old=$eile["Pagal_trenda"];
$komentarai_analizes_old=$eile["komentarai_analizes"];
//echo $Pagal_trenda_old;
  }
  }





 


?>
	<form action="edit.php?do=keisti&id=<?php echo $id;?>" method="POST">
	trendas<br>
<b><h1>Sanderio įvedimo forma:</h1></b><br>
<b>Data:</b> <input type="text" name="sanderio_data" value="<?php echo $sanderio_data_old;?>">
<b>Sanderio laikas:</b> <input type="text" name="sanderio_laikas" value="<?php echo $sanderio_laikas_old;?>">
<b>Sanderio tipas:</b>
<input type="radio" name="sanderio_tipas" value="Buy" <?php if ($sanderio_tipas_old == 'Buy'){ echo 'checked';} ?> > Buy
<input type="radio" name="sanderio_tipas" value="Sell" <?php if ($sanderio_tipas_old == 'Sell'){ echo 'checked';} ?> > Sell
<b>   Pagal trenda:</b> 
<input type="radio" name="Pagal_trenda" value="Taip" <?php if ($Pagal_trenda_old == 'Taip'){ echo 'checked';} ?> > Taip
<input type="radio" name="Pagal_trenda" value="Ne" <?php if ($Pagal_trenda_old == 'Ne'){ echo 'checked';} ?> > Ne<br><br>
<b>EMA15 padėtis: </b>
<input type="text" name="EMA15" value="<?php echo $EMA15_old;?>">
<b>EMA15 kirtimas: </b><input type="text" name="EMA15_kirtimas" value="<?php echo $EMA15_kirtimas_old;?>">
<b>EMA5 padėtis: </b><input type="text" name="EMA5" value="<?php echo $EMA5_old;?>"><br>
<b>FZR ir NK kirtimas: </b><input type="text" name="FZR_ir_NK" value="<?php echo $FZR_ir_NK_old;?>"><br>
<b>FOS: </b>
<input type="radio" name="FOS" value="Taip" <?php if ($FOS_old == 'Taip'){ echo 'checked';} ?> > Taip
<input type="radio" name="FOS" value="Ne" <?php if ($FOS_old == 'Ne'){ echo 'checked';} ?> > Ne<br>
<b>Atidarymo kaina: </b><input type="text" name="kaina" value="<?php echo $kaina_old;?>">
<b>TP kaina: </b><input type="text" name="TP" value="<?php echo $TP_old;?>">
<b>SL kaina: </b><input type="text" name="SL" value="<?php echo $SL_old;?>"><br>
<b>Prekybos planas: </b><br><textarea rows="10" cols="100" name="Planas_ir_komentarai"><?php echo $Planas_ir_komentarai_old;?></textarea><br>
<b>Paveikslėlis VP: </b><input type="text" name="paveikslelis_did_tf" value="<?php echo $paveikslelis_did_tf_old;?>"> 
<b>Paveikslėlis TP: </b><input type="text" name="paveikslelis_ein_tf" value="<?php echo $paveikslelis_ein_tf_old;?>">
<b>Paveikslėlis po uždarymo: </b><input type="text" name="paveikslelis_po" value="<?php echo $paveikslelis_po_old;?>"><a href="betaupload.php" target="_blank">Įkelti nuotrauką</a><br>
<b>FIBO atidirbimas: </b><input type="text" name="FIBO" value="<?php echo $FIBO_old;?>">
<b>Suveikęs orderis: </b>
<input type="radio" name="rezultato_orderis" value="TP" <?php if ($rezultato_orderis_old == 'TP'){ echo 'checked';} ?> > TP
<input type="radio" name="rezultato_orderis" value="SL" <?php if ($rezultato_orderis_old == 'SL'){ echo 'checked';} ?> > SL
<input type="radio" name="rezultato_orderis" value="Pats uždariau" <?php if ($rezultato_orderis_old == 'Pats uždariau'){ echo 'checked';} ?> > Pats uždariau
<br>



<b>Komentarai ir analizės: </b><br><textarea rows="10" cols="100" name="komentarai_analizes"><?php echo $komentarai_analizes_old;?></textarea> <br>

<br>
<input type="submit" name="submit" value="Siųsti">
<input type="reset" name="reset" value="Trinti">
	</form>
 <br>
 <?php
 //echo $paveikslelis_did_tf_old;
 //echo '<img src="images/'.$paveikslelis_did_tf_old.'" alt="Angry face" />';
 if ( $paveikslelis_did_tf_old != '' ) { echo '<img src="images/'.$paveikslelis_did_tf_old.'" alt="Nera3" /><br>';}
 if ( $paveikslelis_ein_tf_old != '' ) { echo '<img src="images/'.$paveikslelis_ein_tf_old.'" alt="Nėra2" /><br>';}
 if ( $paveikslelis_po_old != '' ) { echo '<img src="images/'.$paveikslelis_po_old.'" alt="Nera1" />';}
 
 
 /*<input type="text" name="sanderio_tipas"  value="<?php echo $sanderio_tipas_old;?>"><br>*/
 /* <input type="text" name="FOS" value="<?php echo $FOS_old;?>"><br>*/
 /*<input type="text" name="Pagal_trenda" value="<?php echo $Pagal_trenda_old;?>">*/
 /*<input type="text" name="rezultato_orderis" value="<?php echo $rezultato_orderis_old;?>"><br>*/
 ?>

