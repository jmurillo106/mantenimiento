<?PHP
include "funciones.php";
session_START();
$directorio="";
$d = dir("./imagenes/");
while (false !== ($entry = $d->read())) {
	if(substr($entry,-3)=="svg"){
		$txt=substr($entry,0,-4);
		$directorio.= "<input type=submit name=i value=$entry> <BR>";
	}
	if(false and substr($entry,-3)=="jpg"){
		$txt=substr($entry,0,-4);
		$directorio.= "<input type=submit name=i value=\"$entry\"> <BR>";
			}
}
$directorio="<form action=/ metod=get>$directorio</form>";
$directorio.="
<form action=poste.php>
<input type=submit Value=\"CALCULO POSTE\">
";
$d->close();

$directorio.="<br>";
if(isset($_GET[i])) $imagen="<img src=\"imagenes/$_GET[i]\" >";


$salida="<div id=diag>$directorio $imagen</div>";

print<<<html
<html>
<head>
</head>
<body>
$salida 

</body>
</html>
html;

?>
