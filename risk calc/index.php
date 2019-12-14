<?php
$depozitas = $_POST["depozitas"];
$minrisk = $_POST["minimaliRizika"];
$maxrisk = $_POST["maksimaliRizika"];
$rizika = $_POST["rizika"];
?>
Įveskite duomenis<br>
<form action="index.php" method="POST">
Depozitas: <input type="text" name="depozitas" <?php if ( $depozitas >= '0') { echo 'value="'.$depozitas.'"';} else {echo 'value="500"';}; ?> > USD<br>
Minimali rizika: <input type="text" name="minimaliRizika" <?php if ( $minrisk >= '0') { echo 'value="'.$minrisk.'"';} else {echo 'value="2"';}; ?>> %<br>
Maksimali rizika: <input type="text" name="maksimaliRizika" <?php if ( $maxrisk >= '0') { echo 'value="'.$maxrisk.'"';} else {echo 'value="3"';}; ?>> %<br>
Stopas: <input type="text" name="rizika" <?php if ( $rizika >= '0') { echo 'value="'.$rizika.'"';}; ?> > pp<br>
<input type="submit" name="submit" value="Siųsti">
</form>
<?php

if ( $rizika > '0') {

echo 'Jūsų įvesti duomenys: depozitas<strong> '.$depozitas.'</strong> Rizika nuo <strong>'.$minrisk.' </strong> iki <strong>'.$maxrisk.'</strong>';
//skaičiuojam kiek doleriu rizikuojame
$minusd = $depozitas * $minrisk / 100;
$maxusd = $depozitas * $maxrisk / 100;
echo '<br> Rizikuojame nuo <strong>'.$minusd.' </strong>USD iki <strong>'.$maxusd.' </strong>USD<br>';

// lotų vertės
$l001 = 0.01;
$l002 = 0.02;
$l003 = 0.03;
$l004 = 0.04;
$l005 = 0.05;
$l01 = 0.1;
$l02 = 0.2;

function celesSpalva($usd,$usd1)
{
if ($usd <= $usd1 ) { $color="green";} else { $color="red";};
return $color;
}


//minimali rizika
$rl001 = $l001 * 10 * $rizika;
$rl002 = $l002 * 10 * $rizika;
$rl003 = $l003 * 10 * $rizika;
$rl004 = $l004 * 10 * $rizika;
$rl005 = $l005 * 10 * $rizika;
$rl01 = $l01 * 10 * $rizika;
$rl02 = $l02 * 10 * $rizika;

$c1 = celesSpalva($rl001,$minusd);
$c2 = celesSpalva($rl002,$minusd);
$c3 = celesSpalva($rl003,$minusd);
$c4 = celesSpalva($rl004,$minusd);
$c5 = celesSpalva($rl005,$minusd);
$c6 = celesSpalva($rl01,$minusd);
$c7 = celesSpalva($rl02,$minusd);


//maksimali rizika
$rh001 = $l001 * 10 * $rizika;
$rh002 = $l002 * 10 * $rizika;
$rh003 = $l003 * 10 * $rizika;
$rh004 = $l004 * 10 * $rizika;
$rh005 = $l005 * 10 * $rizika;
$rh01 = $l01 * 10 * $rizika;
$rh02 = $l02 * 10 * $rizika;

$maxiRisk =0;
if ($rh001 <= $maxusd) {$maxiRisk = $l001;};
if ($rh002 <= $maxusd) {$maxiRisk = $l002;};
if ($rh003 <= $maxusd) {$maxiRisk = $l003;};
if ($rh004 <= $maxusd) {$maxiRisk = $l004;};
if ($rh005 <= $maxusd) {$maxiRisk = $l005;};
if ($rh01 <= $maxusd) {$maxiRisk = $l01;};
if ($rh02 <= $maxusd) {$maxiRisk = $l02;};

$cm1 = celesSpalva($rh001,$maxusd);
$cm2 = celesSpalva($rh002,$maxusd);
$cm3 = celesSpalva($rh003,$maxusd);
$cm4 = celesSpalva($rh004,$maxusd);
$cm5 = celesSpalva($rh005,$maxusd);
$cm6 = celesSpalva($rh01,$maxusd);
$cm7 = celesSpalva($rh02,$maxusd);

echo '<table border="1"><tr>'; //lentelės pradžia
echo '<th>LOT</th><th>0,01</th><th>0,02</th><th>0,03</th><th>0,04</th><th>0,05</th><th>0,1</th><th>0,2</th></tr>'; //lot
echo '<th>1pp vertė USD</th><th>0,1</th><th>0,2</th><th>0,3</th><th>0,4</th><th>0,5</th><th>1</th><th>2</th></tr>';// kaina
echo '<th>SL '.$minrisk.'%</th><th bgcolor='.$c1.'>'.$rl001.'</th><th bgcolor='.$c2.'>'.$rl002.'</th><th bgcolor='.$c3.'>'.$rl003.'</th><th bgcolor='.$c4.'>'.$rl004.'</th><th bgcolor='.$c5.'>'.$rl005.'</th><th bgcolor='.$c6.'>'.$rl01.'</th><th bgcolor='.$c7.'>'.$rl02.'</th></tr>';// kaina
echo '<th>SL '.$maxrisk.'%</th><th bgcolor='.$cm1.'>'.$rh001.'</th><th bgcolor='.$cm2.'>'.$rh002.'</th><th bgcolor='.$cm3.'>'.$rh003.'</th><th bgcolor='.$cm4.'>'.$rh004.'</th><th bgcolor='.$cm5.'>'.$rh005.'</th><th bgcolor='.$cm6.'>'.$rh01.'</th><th  bgcolor='.$cm7.'>'.$rh02.'</th></tr>';// kaina
echo '</table>';
echo '<br>Maksimalus lotas: <strong>'.$maxiRisk.'</strong>';
}
?>