<?php
// Prisijungimo prie MYSQL duomenus
$db_host = "localhost";   // Mysql hostas
$db_user = "fxdairy";  // Mysql useris 
$db_pasw = ""; // Mysql paswordas
$db_name = "fxdairy"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host", "$db_user", "$db_pasw");
mysql_select_db("$db_name");

$data = $_POST["data"];
$lotai = $_POST["lotai"];
$valiuta = $_POST["valiuta"];

if ($data != '') {
	$query = "INSERT INTO rating (DATA,LOTAI,VALIUTA) VALUES('$data','$lotai','$valiuta')";
	$result = mysql_query($query);
}

$do = $_GET["do"];
$id = $_GET["id"];
if ($do = "trinti" && $id != '') {
	$query = "DELETE FROM rating WHERE id=" . $id . ";";
	$result = mysql_query($query);
	echo 'Ištrintas įrašas NR:' . $id . '<br>';
}

?>



<form action="rating.php" method="POST">
	<br>
	Loto įvedimo forma:<br>
	Data: <input type="text" name="data"><br>
	LOTAI: <input type="text" name="lotai"><br>
	<input type="radio" name="valiuta" value="EUR/USD"> EUR/USD
	<input type="radio" name="valiuta" value="GBP/USD"> GBP/USD
	<input type="submit" name="submit" value="Siųsti">
	<input type="reset" name="reset" value="Trinti">
</form>

<?php
echo 'EUR/USD <BR>';
echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>ID</th><th>Data</th><th>Vertė</th><th>Trinti</th><tr>'; //pavadinimai

$db = mysql_connect("$db_host", "$db_user", "$db_pasw");
mysql_select_db("$db_name");
$rezultatai = mysql_query("SELECT * FROM rating WHERE `rating`.`VALIUTA` LIKE 'EUR/USD' ORDER BY `rating`.`id` DESC LIMIT 0 , 4");

$num = mysql_num_rows($rezultatai);
$sum = 0;
for ($i = 0; $i < $num; $i++) {
	$eile = mysql_fetch_array($rezultatai);

	echo '<tr>'; //eulutės pradžia
	echo '<td>';
	echo $eile["ID"] . ' ';
	echo '</td>';

	echo '<td>';
	echo $eile["DATA"] . ' ';
	echo '</td>';

	echo '<td>';
	echo $eile["LOTAI"] . ' ';
	echo '</td>';

	echo '<td>';
	echo '<a href="rating.php?id=' . $eile["ID"] . '&do=trinti" >Trinti</a> ';
	echo '</td><tr>';
	$sum = $sum + $eile["LOTAI"];
}
$sum = $sum / 4;
$summ = $sum - 1000;
$sump = $sum + 1000;
echo 'Vidurikis <b>' . $sum . '</b> <br>Minimali reitingo reikšmę (-1000) <b>' . $summ . '</b><br> Maksimali reitingo reikšmė (+1000) <b>' . $sump . '</b>';
//echo 'Vidurikis <b>'.$sum.'</b> Minimali reitingo reikšmę (-1000)'. $sum-1000 . 'Maksimali reitingo reikšmė (+1000)'. $sum+1000;
echo '</table>';
echo '<BR>GBP/USD <BR>';
echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>ID</th><th>Data</th><th>Vertė</th><th>Trinti</th><tr>'; //pavadinimai

$db = mysql_connect("$db_host", "$db_user", "$db_pasw");
mysql_select_db("$db_name");
$rezultatai = mysql_query("SELECT * FROM rating WHERE `rating`.`VALIUTA` LIKE 'GBP/USD' ORDER BY `rating`.`id` DESC LIMIT 0 , 4");

$num = mysql_num_rows($rezultatai);
$sum = 0;
for ($i = 0; $i < $num; $i++) {
	$eile = mysql_fetch_array($rezultatai);

	echo '<tr>'; //eulutės pradžia
	echo '<td>';
	echo $eile["ID"] . ' ';
	echo '</td>';

	echo '<td>';
	echo $eile["DATA"] . ' ';
	echo '</td>';

	echo '<td>';
	echo $eile["LOTAI"] . ' ';
	echo '</td>';

	echo '<td>';
	echo '<a href="rating.php?id=' . $eile["ID"] . '&do=trinti" >Trinti</a> ';
	echo '</td><tr>';
	$sum = $sum + $eile["LOTAI"];
}
$sum = $sum / 4;
$summ = $sum - 1000;
$sump = $sum + 1000;
echo 'Vidurikis <b>' . $sum . '</b> <br>Minimali reitingo reikšmę (-1000) <b>' . $summ . '</b><br> Maksimali reitingo reikšmė (+1000) <b>' . $sump . '</b>';
//echo 'Vidurikis <b>'.$sum.'</b> Minimali reitingo reikšmę (-1000)'. $sum-1000 . 'Maksimali reitingo reikšmė (+1000)'. $sum+1000;
echo '</table>';
?>