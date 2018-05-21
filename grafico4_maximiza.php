<?
$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];
$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];
//$banco=$_GET['banco'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];


}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
}

//echo "banco:$banco";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");



if (!IsSet($ano)){
$achaano1 = "select DS_ANO ANO FROM PARAMETRO_BI";
$res8 = mysql_db_query($banco,$achaano1,$conexao);
$valor88=mysql_fetch_array($res8);
$ano=$valor88["ANO"];

}
$ano="2010";

if (!IsSet($mes)){


$mes=date('m');
}









//ajusta para mostrar por pagina
$programa="grafico4_maximiza.php";

    $numeroregistropagina="10";
    $contador66 = "SELECT COUNT(*) CONTADOR
    FROM  EXECUCAO_MANUTENCAO_SAP
    ";
    $res = mysql_db_query($banco,$contador66,$conexao);
    $valor8=mysql_fetch_array($res);
    $ultimo=$valor8["CONTADOR"];

    require("DIRAPAGINACAO.php");
//final do tratamento de paginas


?>


<center><font style='font-size: 19px;color: black;text-align:center;bold: Negrito' >Historico de Ordens Executadas no Ano:<? echo "$ano";?>
 - Mes:<? echo "$mes";?></font></br>
<font style='font-size: 12px;color: black;text-align:center;bold: Negrito' >
<?echo "Base:$baseoracle - Local do Banco:$localbanco</br>";?></font></br>


<center><img  src="detalhegrafico4.php?banco=<?echo $banco;?>&labelcoluna=Mil Cab.&labellinha=Dias&titulografico=<?echo $titulografico1;?>&tipo=utilizacaohora&turno=<?echo $turno;?>&ano=<?echo $ano;?>&mes=<?echo $mes;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>">
</BR>



<?

echo "</br></br>Detalhando o Grafico</br>";

  $sql99 = "select ANO_FIM, NR_MES_FIM,DT_FIM,tp,DS_PRIORIDADE,DS_HORA,NR_NOTA,ANO_INICIO,NR_MES_INICIO,DT_INICIO,NR_ORDEM,DS_TEXTO,
  DS_TEXTO_BREVE,DS_CENTRO_TRABALHO,DT_ENTRADA,DS_STATUS,DS_STATUS_SISTEMA,DT_FIM_REAL,DS_FIM_REAL FROM  EXECUCAO_MANUTENCAO_SAP where
  ANO_INICIO='$ano' order by  ANO_FIM, NR_MES_FIM,DT_FIM asc
  LIMIT $limiteacima,$limiteabaixo
  ";

  //echo "$sql99";

?>

 </br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

<tr>
                <th align=left>Ano Execução</th>
				<th align=left>Mes Execução</th>
				<th>Data Final Execução</th>
                <th>Hora Abertura</th>
                <th>Nr Nota</th>
                <th>Status</th>
                <th>Descrição da Ocorrencia</th>



</tr>


<?



            $res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {
			?>

			   <tr>
               	<td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["ANO_FIM"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["NR_MES_FIM"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["DT_FIM"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["DS_HORA"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["NR_NOTA"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["DS_STATUS"];?></td>
                <td><h1 style='font-size: 10px;color: black;text-align:left;bold: Negrito text-decoration: none' >
                <?echo $valor["DS_TEXTO_BREVE"];?></td>


                </tr><?

			 }

 ?>
 </table>
                
                
 

