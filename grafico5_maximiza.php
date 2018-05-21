<?
$cortopo="#828282";
$corfundo="#4682B4";




//$banco="maker";


//require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];
$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
//$banco=$_GET['banco'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];




?>


<center><font style='font-size: 19px;color: black;text-align:center;bold: Negrito' >Grafico de GPD</font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >
<?echo "Base:$banco - Local do Banco:$localbanco</br>";?></font></br>




<?

echo "</br></br>Detalhando o Grafico</br>";

?>
<center><img  src="detalhegrafico2.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>">
</BR>



 

