<?
$cortopo="#828282";
$corfundo="#4682B4";




//$banco="maker";



require("estilo2.css");
require("estilonavegacaofundo.css");


$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];
$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];

$ano=$_GET['ano'];
$mes=$_GET['mes'];
$localbanco=$_GET['localbanco'];
$usuariofroms=$_GET['usuario'];



require("configuraoracle.php");

?>


<center><font style='font-size: 19px;color: black;text-align:center;bold: Negrito' >Disponibilidade de Máquinas</font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >
<?echo "Base:$banco - Local do Banco:$localbanco</br>";?></font></br><hr>

<font style='font-size: 19px;color: black;text-align:center;bold: Negrito' >Parmetros</font>

<?
$s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA,CD_AREA,DS_AREA,CD_SECAO,DS_SECAO,CD_CENTRO_TRABALHO,
	DS_CENTRO_TRABALHO,
	CD_CENTRO_CUSTO,
	DS_CENTRO_CUSTO,
	CD_FAMILIA,
	DS_FAMILIA,
	CD_MAQUINA,
	DS_MAQUINA,
	CD_UNID_MAQ,
	DS_UNID_MAQ,
	CD_COMPONENTE,
	DS_COMPONENTE,
	CD_ATIVIDADE,
	DS_ATIVIDADE,
	CD_TIPO,
	DS_TIPO,
	CD_MAO_OBRA,
	DS_MAO_OBRA,
	DATA_INICIO,
	DATA_FIM FROM FILTRO where cd_usuario='$usuarioforms'
        ");



 OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {

      $descricaofabrica=ociresult($s, "DS_FABRICA") ;
      $codigofabrica=ociresult($s, "CD_FABRICA") ;

      if ($codigofabrica >"0"){ ECHO "Fábrica:$descricaofabrica";   }
      
      


    }
?>
<center><img  src="detalhegrafico1.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>">
</BR>




 

