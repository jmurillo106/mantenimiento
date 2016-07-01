<?PHP
include "funciones.php";

if($_GET[action]=="Salir") header("location:/");
$o=$_GET[o];
$len=$_GET[l];
$step=$_GET[step];
$p=intval($len/$step)-1;
$punto=0;
$inicio=$o%$len;
$i=0;
$test="";


for ($x=0;$x<$p;$x++){
	 $punto+=$step;
	 $diseno.=$punto."P, ";
	$ponches[]=$punto;
	$corte=$len-$punto;
	}

$ponches[]=$len;
$diseno.=$len."C";



$programa="<br>PROGRAMA<br>";




foreach ($ponches as $data){
	if($ponches[0]>$inicio){
		break;
		}
	$ponches[]=array_shift($ponches);
//	$programa.=punch($data);
}




$programa.="<br>";
$i=0;
$last=$inicio;
$data2=0;
foreach($ponches as $x){
	$programa.=" $x,";
}
$programa.="<hr>";
$last=$inicio;
$tope=0;
foreach ($ponches as $data){
	$data2=$data+$tope;
	$programa.=sprintf("%03d %03d %03d %03d<br>",$last,$data2, $data2-$last,$tope);
	$last=$data2;
	if($data==$len) {
		$tope=$len;
	}
	
}






$dibujo=<<<dibujo
<svg width="600" height="300">
	<rect width="500"height="50"style="fill:white;stroke-width:1;stroke:black"/>
	<circle cx="50" cy=80 r="15" stroke="black" stroke-width="1" fill="white" />
	<circle cx="100" cy="80" r="15" stroke="black" stroke-width="1" fill="white" />
	<circle cx="150" cy="80" r="15" stroke="black" stroke-width="1" fill="white" />
	<rect x=10 y=15 width="20"height="20"style="fill:white;stroke-width:1;stroke:black"/>
	<rect x=110 y=15 width="20"height="20"style="fill:white;stroke-width:1;stroke:black"/>
	<rect x=210 y=15 width="20"height="20"style="fill:white;stroke-width:1;stroke:black"/>
	<rect x=310 y=15 width="20"height="20"style="fill:white;stroke-width:1;stroke:black"/>
	<rect x=410 y=15 width="20"height="20"style="fill:white;stroke-width:1;stroke:black"/>
	<ellipse cx="200" cy="80" rx="20" ry="15" style="fill:yellow;stroke:purple;stroke-width:2" />
	<line x1="0" y1="5" x2="500" y2="5" style="stroke:black;stroke-width:3" />
</svg>
dibujo;








print<<<html
<html>
<head>
<style>
body{background-color:silver;}
</style>
</head>0.
<body>

<h1>Calculo programas poste</h1>
<form action=poste.php method=get>
	Distancia de ponche a corte
	<input type=text name=o value="$o" style=width:50px;>
	pulgadas
	<br >

	Poste de 
	<input type=text name=l value="$len" style=width:50px;>
	pulgadas<br>
	Paso de Ponches 
	<input type=text name=step value="$step" style=width:50px;>
	pulgadas<br>

	<input type=submit value=Calcular   name=action   >
	<input type=submit value=Calcular2   name=action   >
	<input type=submit value=Salir   name=action   >

</form>

longitud de poste=$len <br>
Distancia entre ponche y corte: $o<br>
Ponches: $ponches
<br>
<hr>
Dise&ntildeo
$diseno
<hr>

inicio: $inicio
<hr>
$programa

</body>
<?html>
html;






?>
