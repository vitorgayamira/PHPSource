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
$regiao=$_GET['regiao'];
$codigousuario=$_GET['codigousuario'];
$distrito=$_GET['distrito'];
$fabricante=$_GET['fabricante'];
$ano=$_GET['ano'];
$statusparou=$_GET['statusparou'];
$localbanco=$_GET['localbanco'];
$banco=$_GET['banco'];
}
require("configuraoracle.php");

//echo "banco:$banco//tipo:$tipoconsulta//fabrica:$fabrica//regiao:$regiao//distrito:$distrito//STATUS PAROU:$statusparou//familia:$codigofamilia</br>";
if ($tipoconsulta=="regiao"){


   $acha8 = OCIParse($ora_conexao, "select e.cd_fabrica,f.ds_distrito DIST,g.ds_regiao REG
                         from FABRICAS e,DISTRITO f,REGIAO g
                         WHERE e.cd_fabrica='$fabrica' and
                         e.cd_distrito=f.cd_distrito and
                         f.cd_regiao=g.cd_regiao and
                         g.cd_regiao='$regiao'");


                        OCIExecute($acha8, OCI_DEFAULT);
                        While (OCIFetch($acha8)) {

                           $descricaodistrito=ociresult($acha8, "DIST") ;
                           $descricaoregiao=ociresult($acha8, "REG") ;
                        }
  //echo "Região:$descricaoregiao - Distrito:$descricaodistrito - Fabrica:$fabrica";
  $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica')    order by CD_MAQUINA asc  ");
}

if ($tipoconsulta=="distrito"){


   $acha8 = OCIParse($ora_conexao, "select e.cd_fabrica,f.ds_distrito DIST,g.ds_regiao REG
                         from FABRICAS e,DISTRITO f,REGIAO g
                         WHERE e.cd_fabrica='$fabrica' and
                         e.cd_distrito=f.cd_distrito and
                         f.cd_regiao=g.cd_regiao and
                         f.cd_distrito='$distrito'");


                        OCIExecute($acha8, OCI_DEFAULT);
                        While (OCIFetch($acha8)) {

                           $descricaodistrito=ociresult($acha8, "DIST") ;
                           $descricaoregiao=ociresult($acha8, "REG") ;
                        }
  $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica' and cd_distrito='$distrito')    order by CD_MAQUINA asc  ");
}

if ($tipoconsulta=="familia"){

 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica' and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia')    order by CD_MAQUINA asc
   ");
}

if ($tipoconsulta=="modelo"){

 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica' and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo')    order by CD_MAQUINA asc
   ");
   

}

if ($tipoconsulta=="fabricante"){

 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica' and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' and
  ds_fabricante='$fabricante')    order by CD_MAQUINA asc
   ");


}

if ($tipoconsulta=="ano"){

 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' AND CD_FABRICA='$fabrica' and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' and
  ds_fabricante='$fabricante' and ds_ano_fabricacao='$ano')    order by CD_MAQUINA asc
   ");


}

if ($tipoconsulta=="totalregiao"){

 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' )    order by CD_MAQUINA asc
   ");
}

if ($tipoconsulta=="totaldistrito"){


  
 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' and cd_distrito='$distrito' )    order by CD_MAQUINA asc
   ");
}

if ($tipoconsulta=="totalfabricante"){



 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao'  and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' and
  ds_fabricante='$fabricante')    order by CD_MAQUINA asc
   ");
}


if ($tipoconsulta=="totalano"){



 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao'  and cd_distrito='$distrito' and CD_FAMILIA='$codigofamilia' and  DS_MODELO='$modelo' and
  ds_fabricante='$fabricante' and ds_ano='$ano')    order by CD_MAQUINA asc
   ");
}





if ($tipoconsulta=="totalfamilia"){


 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' and cd_distrito='$distrito' and cd_familia='$codigofamilia' )    order by CD_MAQUINA asc
   ");




}

if ($tipoconsulta=="totalmodelo"){


 $s = OCIParse($ora_conexao, "select distinct CD_MAQUINA DESCRICAO,CD_FAMLIA,CD_FABRICA,MODELO,ANO_FABRICACAO,STATUS_MAQUINA,
  FABRICANTE,NUMERO_SERIE,PATRIMONIO FROM MAQUINAS WHERE CD_MAQUINA IN (SELECT CD_MAQUINA FROM AUX_CONSULTA1 WHERE
  CD_REGIAO='$regiao' and cd_distrito='$distrito' and cd_familia='$codigofamilia' and ds_modelo='$modelo')    order by CD_MAQUINA asc
   ");




}






 ?>
 <center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Detalhe de Equipamentos</font></br>
<font style='font-size: 11px;color: white;text-align:left;bold: Negrito' ><?
ECHO "Base Oracle:$banco - Localização  do Banco:$localbanco</br>";?></font>

  

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">

<tr>
<th>Maquina</th>
<th>Status</th>
<th>Familia</th>
<th>Modelo</th>
<th>Ano Fabricação</th>
<th>Fabricante</th>
<th>Nr de Serie</th>
<th>Patrimônio</th>
<th>Imagens</th>
<?


  
  

  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
      $codigomaquina=ociresult($s, "DESCRICAO") ;

      ?>
      <tr>

      <td><center><? echo ociresult($s, "DESCRICAO");?></td>
      <td><center><? echo ociresult($s, "STATUS_MAQUINA");?></td>
      <td><center><? echo ociresult($s, "CD_FAMLIA");?></td>
      <td><center><? echo ociresult($s, "MODELO");?></td>
      <td><center><? echo ociresult($s, "ANO_FABRICACAO");?></td>
      <td><center><? echo ociresult($s, "FABRICANTE");?></td>
      <td><center><? echo ociresult($s, "NUMERO_SERIE");?></td>
      <td><center><? echo ociresult($s, "PATRIMONIO");?></td>
      <td><a href="#" onClick="window.open('slidefotomaquina.php?codigomaquina=<?echo "$codigomaquina";?>&navegando=sim&banco=<?echo "$banco";?>&codigousuario=<?echo "$codigousuario";?>&tipoconsulta=<?echo "$tipoconsulta";?>&regiao=<?echo "$regiao";?>&fabrica=<?echo "$fabrica";?>&codigoempresa=<?echo "$fabrica";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           Ver</a></td>
      
      </tr>
      <?

  }
  ?>

  </table>
