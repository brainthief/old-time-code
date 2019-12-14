<?php

$db_host = "localhost";   // Mysql hostas
$db_user = "clicker";  // Mysql useris 
$db_pasw = "clicker"; // Mysql paswordas
$db_name = "clicker"; // Pasirinkta DB

$id = $_GET["id"];
//echo $id;
//echo $_SERVER["REMOTE_ADDR"];
//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//echo $hostname;

$db = mysql_connect("$db_host", "$db_user", "$db_pasw");
mysql_select_db("$db_name");
$rezultatai = mysql_query("SELECT `webpagelist`.`id` FROM webpagelist ORDER BY `webpagelist`.`id` DESC LIMIT 0 , 1000");

$min = $id;
$max = $id;
$num = mysql_num_rows($rezultatai);
$maxas = $num - 1;
for ($i = 0; $i < $num; $i++) {
	$eile = mysql_fetch_array($rezultatai);
	//echo $eile["id"].' ';
	if ($min > $eile["id"]) {
		$min = $eile["id"];
	}
	if ($max < $eile["id"]) {
		$max = $eile["id"];
	}
	if ($id == $eile["id"]) {
		$sekantis = $i + 1;
	}
	if ($sekantis == $i) {
		$sekantis_id = $eile["id"];
	}
	if ($sekantis > $maxas) {
		$sekantis_id = $max;
	}
}
//echo "Minimumas ".$min." Maksimumas ".$max;
// echo " Sekantis ".$sekantis_id;


if ($id != '') {
	$uzklausa = "SELECT `webpagelist`.`url` FROM `webpagelist` WHERE `webpagelist`.`id` =" . $id;
	$rezultatai1 = mysql_query($uzklausa);
	$num = mysql_num_rows($rezultatai1);
	for ($i = 0; $i < $num; $i++) {
		$eile1 = mysql_fetch_array($rezultatai1);
		// echo $eile1["url"];
	}
}
?>

<form name="redirect">
	<center>
		<font face="Arial"><b>Sekantis atnaujinimas po
				<form>
					<input type="text" size="3" name="redirect2">
				</form>
				sekundžių</b></font>
	</center>

	<script>
		<!--
		/*
Count down then redirect script
By JavaScript Kit (http://javascriptkit.com)
Over 400+ free scripts here!
*/

		//change below target URL to your own
		var targetURL = "http://88....:8080/clicker/index.php?id=<?php if ($id != '') {
																																																												echo $sekantis_id;
																																																											} else {
																																																												echo '24';
																																																											} ?>"
		//change the second to start counting down from
		var countdownfrom = 10


		var currentsecond = document.redirect.redirect2.value = countdownfrom + 1

		function countredirect() {
			if (currentsecond != 1) {
				currentsecond -= 1
				document.redirect.redirect2.value = currentsecond
			} else {
				window.location = targetURL
				return
			}
			setTimeout("countredirect()", 1000)
		}

		countredirect()
		//
		-->
	</script>
	<?php //echo $eile1["url"]; 
	?>

	<iframe src="http://<?php if ($id != '') {
																						echo $eile1["url"];
																					} else {
																						echo "www.google.lt";
																					}  ?>" width="100%" height="100%">
		<p>Your browser does not support iframes.</p>
	</iframe>