<?
//session_start();
require("configuraoracle.php");
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
}



if ($tipoconsulta=="familia"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica' and
  CD_FAMILIA='$codigofamilia'  ");
}

if ($tipoconsulta=="modelo"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica' and
  CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' ");
}
if ($tipoconsulta=="totalfabrica"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica' and cd_familia in
  (SELECT CD_FAMILIA FROM AUX_FILTRO) and
                 ds_modelo in (SELECT CD_modelo FROM AUX_FILTRO) ");
}

if ($tipoconsulta=="totalfabrica2"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE  cd_familia in
  (SELECT CD_FAMILIA FROM AUX_FILTRO) and
                 ds_modelo in (SELECT CD_modelo FROM AUX_FILTRO) ");
}

if ($tipoconsulta=="totalfamilia"){

 $s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE
  CD_FAMILIA='$codigofamilia'
    ");
}

if ($tipoconsulta=="modelosemfabrica"){

$s = OCIParse($ora_conexao, "select CD_MAQUINA DESCRICAO,CD_FAMILIA,CD_FABRICA,DS_MODELO,DS_ANO_FABRICACAO,DS_STATUS,
  DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO FROM AUX_CONSULTA1 WHERE
  CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' ");


}

?>
 </br>
 <font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Detalhando Pesquisa de Equipamentos/Máquinas</font>
 <hr>
  

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
<th>Localização</th>

<?


  
  

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
