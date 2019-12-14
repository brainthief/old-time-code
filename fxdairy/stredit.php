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

//gauti iš formos kintamieji
$sdata = $_POST["sdata"];

//Apdorojam laika
date_default_timezone_set("Europe/Minsk");
//echo date("Y/m/d/H:i:s",time());
//$sdata =date("Y/m/d/H:i:s",time());
if ($sdata != '') {
list($metai, $menuo, $diena, $valandos) = split('[/.-]', $sdata);
//echo "Metai: $metai; Mėnuo: $menuo; Diena: $diena<br />\n";
list($valanda, $minute, $sekunde) = split('[:.-]', $valandos);
//echo "Valanda: $valanda; Minute: $minute; Sekunde: $sekunde<br />\n";
date_default_timezone_set("Europe/Minsk");
echo mktime($valanda,$minute,$sekunde,$menuo,$diena,$metai);
$sdata = mktime($valanda,$minute,$sekunde,$menuo,$diena,$metai);
}

$valiuta = $_POST["valiuta"];
$speriodas = $_POST["speriodas"];
$gr1link = $_POST["gr1link"];
$gr2link = $_POST["gr2link"];
$gr3link = $_POST["gr3link"];
$gr4link = $_POST["gr4link"];
$gr1cmt = $_POST["gr1cmt"];
$gr2cmt = $_POST["gr2cmt"];
$gr3cmt = $_POST["gr3cmt"];
$gr4cmt = $_POST["gr4cmt"];

//$query = "INSERT INTO strategija (sanderio_data,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda')";
if ( $do == 'keisti' ) {
if ( $id != '') {
//$query = "UPDATE strategija SET (sanderio_data,savaites_diena,sanderio_laikas,sanderio_tipas,EMA15,EMA15_kirtimas,EMA5,FZR_ir_NK,FOS,kaina,TP,SL,FIBO,Planas_ir_komentarai,paveikslelis_did_tf,paveikslelis_ein_tf,rezultato_orderis,paveikslelis_po,komentarai_analizes,Pagal_trenda) VALUES('$sanderio_data','$savaites_diena','$sanderio_laikas','$sanderio_tipas','$EMA15','$EMA15_kirtimas','$EMA5','$FZR_ir_NK','$FOS','$kaina','$TP','$SL','$FIBO','$Planas_ir_komentarai','$paveikslelis_did_tf','$paveikslelis_ein_tf','$rezultato_orderis','$paveikslelis_po','$komentarai_analizes','$Pagal_trenda') WHERE 'id` =$id";
//$query = "UPDATE strategija SET sanderio_data = '$sanderio_data' WHERE 'id` =$id";
$query="UPDATE `forex`.`strategija` SET `sdata` = '".$sdata."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `valiuta` = '".$valiuta."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `speriodas` = '".$speriodas."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;

$query="UPDATE `forex`.`strategija` SET `gr1link` = '".$gr1link."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr2link` = '".$gr2link."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr3link` = '".$gr3link."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr4link` = '".$gr4link."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;

$query="UPDATE `forex`.`strategija` SET `gr1cmt` = '".$gr1cmt."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr2cmt` = '".$gr2cmt."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr3cmt` = '".$gr3cmt."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;
$query="UPDATE `forex`.`strategija` SET `gr4cmt` = '".$gr4cmt."' WHERE `strategija`.`id` =".$id.";";
$result = mysql_query($query) ;

echo 'Pakeista<br>';
}
else { 
echo "nera id";
$query = "INSERT INTO `forex`.`strategija` (sdata,valiuta,speriodas,gr1link,gr1cmt,gr2link,gr2cmt,gr3link,gr3cmt,gr4link,gr4cmt) VALUES('$sdata','$valiuta','$speriodas','$gr1link','$gr1cmt','$gr2link','$gr2cmt','$gr3link','$gr3cmt','$gr4link','$gr4cmt')";
$result = mysql_query($query) ;
echo $query;
} // klaida po ID tikrinimo

}

//tikriname as yra $id	
if ($id != '') {
$rezultatai = mysql_query("SELECT * FROM `strategija` WHERE `id` =".$id);
//echo  $rezultatai;
$num = mysql_num_rows($rezultatai);

for ($i=0; $i<$num; $i++) {
$eile = mysql_fetch_array($rezultatai);
date_default_timezone_set("Europe/Minsk");
if ($eile["sdata"]>=974298170) {$sdata_old=date("Y/m/d/H:i:s", $eile["sdata"]);} else {$sanderio_data_old=$eile["sdata"];} ;
$valiuta_old=$eile["valiuta"];
$speriodas_old=$eile["speriodas"];
$gr1link_old=$eile["gr1link"];
$gr2link_old=$eile["gr2link"];
$gr3link_old=$eile["gr3link"];
$gr4link_old=$eile["gr4link"];
$gr1cmt_old=$eile["gr1cmt"];
$gr2cmt_old=$eile["gr2cmt"];
$gr3cmt_old=$eile["gr3cmt"];
$gr4cmt_old=$eile["gr4cmt"];
  }
  }

?>
	
	<form action="stredit.php?do=keisti&id=<?php echo $id;?>" method="POST">
	<br>
<b><h1>Stratėgijos įvedimo forma:</h1></b><br>
<b>Data:</b> <input type="text" name="sdata" value="<?php if ($sdata_old!='') {echo $sdata_old;} else {echo date("Y/m/d/H:i:s",time());}?>">
<?php
/*
<b>Rušis:</b> 
<input type="radio" name="srusis" value="MIŠRI" <?php if ($sanderio_tipas_old == 'VP'){ echo 'checked';} ?> > Sell
<input type="radio" name="srusis" value="MF" <?php if ($sanderio_tipas_old == 'IP'){ echo 'checked';} ?> > Buy
<input type="radio" name="srusis" value="VSA" <?php if ($sanderio_tipas_old == 'VP'){ echo 'checked';} ?> > Sell
*/ ?>

<b>Instrumentas:</b>
<input type="radio" name="valiuta" value="EUR/USD" <?php if ($valiuta_old == 'EUR/USD'){ echo 'checked';} ?> > EUR/USD
<input type="radio" name="valiuta" value="GBP/USD" <?php if ($valiuta_old == 'GBP/USD'){ echo 'checked';} ?> > GBP/USD
<input type="radio" name="valiuta" value="kita..." <?php if ($valiuta_old == 'kita...'){ echo 'checked';} ?> > kita...
<br>

<b>Periodas:</b>
<input type="radio" name="speriodas" value="IP" <?php if ($speriodas_old == 'IP'){ echo 'checked';} ?> > IP
<input type="radio" name="speriodas" value="VP" <?php if ($speriodas_old == 'VP'){ echo 'checked';} ?> > VP
<input type="radio" name="speriodas" value="TP" <?php if ($speriodas_old == 'TP'){ echo 'checked';} ?> > TP
<a href="betaupload.php" target="_blank">Įkelti nuotrauką</a>
<br>
<b>Grafikas 1: </b><input type="text" name="gr1link" value="<?php echo $gr1link_old;?>"> <br>
<?php if ( $gr1link_old != '' ) {echo '<a href="images/'.$gr1link_old.'" target="_blank"><img width=800 src="images/'.$gr1link_old.'" alt="Nera1" /></a><br>';}?>
<b>Aprašymas: </b><br><textarea rows="10" cols="100" name="gr1cmt"><?php echo $gr1cmt_old;?></textarea> <br>
<b>Grafikas 2: </b><input type="text" name="gr2link" value="<?php echo $gr2link_old;?>"> <br>
<?php if ( $gr2link_old != '' ) {echo '<a href="images/'.$gr2link_old.'" target="_blank"><img width=800 src="images/'.$gr2link_old.'" alt="Nera1" /></a><br>';}?>
<b>Aprašymas: </b><br><textarea rows="10" cols="100" name="gr2cmt"><?php echo $gr2cmt_old;?></textarea> <br>
<b>Grafikas 3: </b><input type="text" name="gr3link" value="<?php echo $gr3link_old;?>"> <br>
<?php if ( $gr3link_old != '' ) {echo '<a href="images/'.$gr3link_old.'" target="_blank"><img width=800 src="images/'.$gr3link_old.'" alt="Nera1" /></a><br>';}?>
<b>Aprašymas: </b><br><textarea rows="10" cols="100" name="gr3cmt"><?php echo $gr3cmt_old;?></textarea> <br>
<b>Grafikas 4: </b><input type="text" name="gr4link" value="<?php echo $gr4link_old;?>"> <br>
<?php if ( $gr4link_old != '' ) {echo '<a href="images/'.$gr4link_old.'" target="_blank"><img width=800 src="images/'.$gr4link_old.'" alt="Nera1" /></a><br>';}?>
<b>Aprašymas: </b><br><textarea rows="10" cols="100" name="gr4cmt"><?php echo $gr4cmt_old;?></textarea> <br>

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

