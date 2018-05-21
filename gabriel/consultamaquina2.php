<?
$cortopo="#828282";
$corfundo="#4682B4";


require("estilo2.css");
require("estilonavegacaofundo.css");



$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$fabrica=$_GET['fabrica'];
$modelo=$_GET['modelo'];
$codigofamilia=$_GET['codigofamilia'];
$fabrica=trim($fabrica);
$codigofamilia=trim($codigofamilia);
$tipoconsulta=$_GET['tipoconsulta'];
$localbanco=$_GET['localbanco'];
}

//echo "local:$localbanco//banco:$banco";

require("configuraoracle.php");
?>
 <center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Detalhe de Equipamentos</font></br>
<font style='font-size: 11px;color: white;text-align:left;bold: Negrito' ><?
ECHO "Base Oracle:$banco - Localização  do Banco:$localbanco</br>";?></font>

  

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="800">

<tr>
<th>Maquina</th>
<th>Status</th>
<th>Familia</th>
<th>Unidade</th>
<th>Modelo</th>
<th>Ano Fabricação</th>
<th>Fabricante</th>
<th>Nr de Serie</th>
<th>Patrimônio</th>
<th>Obs</th>

<?


 if ($tipoconsulta=="linhacoluna"){
  
  $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica' and
  CD_FAMILIA='$codigofamilia'  ");
  
 }
 
 if ($tipoconsulta=="familia"){

  $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE
  CD_FAMILIA='$codigofamilia'  ");

 }
 if ($tipoconsulta=="unidade1"){
 
 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE
  CD_FABRICA='$fabrica'  ");

 }
 
 if ($tipoconsulta=="unidade2"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1  ");

 }

  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {


      ?>
      <tr>

      <td><center><? echo ociresult($s, "DESCRICAO");?></td>
      <td><center><? echo ociresult($s, "DS_STATUS");?></td>
      <td><center><? echo ociresult($s, "CD_FAMILIA");?></td>
      <td><center><? echo ociresult($s, "CD_FABRICA");?></td>
      <td><center><? echo ociresult($s, "DS_MODELO");?></td>
      <td><center><? echo ociresult($s, "DS_ANO_FABRICACAO");?></td>
      <td><center><? echo ociresult($s, "DS_FABRICANTE");?></td>
      <td><center><? echo ociresult($s, "NR_SERIE");?></td>
      <td><center><? echo ociresult($s, "DS_PATRIMONIO");?></td>
      <td><center><? echo ociresult($s, "DS_LOCALIZACAO");?></td>

      
      </tr>
      <?

  }
  ?>

  </table>
