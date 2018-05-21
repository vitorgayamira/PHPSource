<?
$cortopo="#828282";
$corfundo="#4682B4";
require("estilo2_sitenovo.css");


$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];


require("configuramysql.php");







$today = date('d/m/Y H:i:s');

?>



<font style='font-size: 10px;color: black;text-align:center;bold: Negrito' >
<?echo "Gerado:$today</br>";?></font></br>
</center>

<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >

<img  src="detalhegraficoterceiro.php?tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&banco=<?echo $banco;?>">








