<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];

$baseoracle=$_GET['baseoracle'];

echo "Base:$baseoracle</br>";

}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
}

//echo "banco:$banco";

require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];
//$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$banco=$_GET['banco'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];




?>
<hr>





<font style='font-size: 19px;color: red;text-align:center;bold: Negrito' >Valor de GPD</font>

<center><img  src="detalhegrafico2.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>">




<?

echo "</br></br>Detalhando o Grafico</br>";


//}//final do setor?>
 

