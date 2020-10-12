<?php

$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];


$archivo = fopen("info.txt","a");
$datos= "\n"."Latitud: ".$latitud."\r\n"."Longitud: ".$longitud."\n"."\n"."####################"."\n";
fwrite($archivo,$datos);
fclose($archivo);
echo "<meta http-equiv='refresh' content='1;url=dates.html'>  ";
?>