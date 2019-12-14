<?php
//echo time();
date_default_timezone_set("Europe/Minsk");
echo date("m/d/y H:i:s",time());
echo '<br>';
echo mktime(16,22,50,11,15,2000);
echo '<br>';
echo date("m/d/y N D H:i:s",mktime(16,22,50,11,15,2010));
echo '<br>';
$date = "04/30/1973";
list($month, $day, $year) = split('[/.-]', $date);
echo "Month: $month; Day: $day; Year: $year<br />\n";

$time = "12:45:00";
list($valanda, $minute, $sekunde) = split('[:.-]', $time);
echo "Valanda: $valanda; Minute: $minute; Sekundë: $sekunde<br />\n";

//mktime(hour,minute,second,month,day,year,is_dst)
?>