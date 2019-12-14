<?php


// Prisijungimo prie MYSQL duomenus
$db_host="localhost";   // Mysql hostas
$db_user="clicker";  // Mysql useris 
$db_pasw="clicker"; // Mysql paswordas
$db_name="clicker"; // Pasirinkta DB

//Jungiamės prie duombazės
$db = mysql_connect("$db_host","$db_user","$db_pasw") or die ("Negaliu prisijungti");
	mysql_select_db ("$db_name");  

echo $_POST["url_name"];
//gauti iš formos kintamieji
$url = $_POST["url"];
$url_name = $_POST["url_name"];
$per_diena = $_POST["per_diena"];
$priory = $_POST["priory"];
$actyve = $_POST["actyve"];

//echo $sanderio_data.' '.$sanderio_laikas; 

if ($url != '') {$query = "INSERT INTO webpagelist (url,name,per_day,priory,actyve,comment) VALUES('$url','$url_name','$url_name','$per_diena','$priory','$actyve')";
$result = mysql_query($query) ; }
?>

<form action="add.php" method="POST">
<br>
Staito įvedimo forma:<br>
URL: <input type="text" name="url"><br>
Pavadinimas: <input type="text" name="url_name"><br>
Parodymų iš vieno IP per dieną [0 neskaičuojama]: <input type="text" name="per_diena"><br>
Prioritetas [10..1]: <input type="text" name="priory"><br>
Aktyvus: <input type="radio" name="actyve" value="1"> Taip
<input type="radio" name="actyve" value="0"> Ne
<br>
<input type="submit" name="submit" value="Siųsti">
<input type="reset" name="reset" value="Trinti">
	</form>

<?php

?>