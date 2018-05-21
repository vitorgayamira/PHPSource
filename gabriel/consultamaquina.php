<?
//session_start();
require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");

?>

<form action="consultamaquina.php" method="POST">


<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$modelopesquisa=$_GET['modelopesquisa'];
$anopesquisa=$_GET['anopesquisa'];
$fabricantepesquisa=$_GET['fabricantepesquisa'];
$ativopesquisa=$_GET['ativopesquisa'];
$seriepesquisa=$_GET['seriepesquisa'];
$patrimoniopesquisa=$_GET['patrimoniopesquisa'];
$localizacaopesquisa=$_GET['localizacaopesquisa'];

}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa1=$_POST['turnopesquisa1'];
$turnopesquisa2=$_POST['turnopesquisa2'];
$turno=$_POST['turno'];
$ano=$_POST['ano'];
$ano2=$_POST['ano2'];
$mes=$_POST['mes'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];
        $banco=$_POST['banco'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$quantaslinhasnutrientemp=$_POST['quantaslinhasnutrientemp'];
			$existenutriente=$_POST['existenutriente'];
			$telainiciarsimulacao=$_POST['telainiciarsimulacao'];
			$tipoconsulta2=$_POST['tipoconsulta2'];
            $gravandofinal=$_POST['gravandofinal'];
            $existenutriente=$_POST['existenutriente'];
            $itempesquisa2=$_POST['itempesquisa2'];
            $itempesquisa1=$_POST['itempesquisa2'];
            $tipoconsulta1=$_POST['tipoconsulta1'];
            $modelopesquisa=$_POST['modelopesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $fabricantepesquisa=$_POST['fabricantepesquisa'];
            $ativopesquisa=$_POST['ativopesquisa'];
            $seriepesquisa=$_POST['seriepesquisa'];
            $patrimoniopesquisa=$_POST['patrimoniopesquisa'];
            $localizacaopesquisa=$_POST['localizacaopesquisa'];

}


                  if (!IsSet($modelopesquisa)){$modelopesquisa="Todos";}
                  if (!IsSet($anopesquisa)){$anopesquisa="Todos";}
                  if (!IsSet($fabricantepesquisa)){$fabricantepesquisa="Todos";}
                  if (!IsSet($ativopesquisa)){$ativopesquisa="Todos";}
                  if (!IsSet($seriepesquisa)){$seriepesquisa="Todos";}
                  if (!IsSet($patrimoniopesquisa)){$patrimoniopesquisa="Todos";}
                  if (!IsSet($localizacaopesquisa)){$localizacaopesquisa="Todos";}



                  
if ($escolha=="mudarconteudo"){
?>

<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Alterando Preferencias</font></br>

<a href="consultamaquina.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>"><img width=40 height=50 BORDER=1 src="VOLTAR.GIF">
</a>
<hr>

    <TABLE class="MsoTableGrid" border="0" bgcolor="#FFA500"width="350">

    <tr bgcolor="#FF8C00">
	             <td>Equipamento Ativo</td>
	             <td>
                 <select name="ativopesquisa">
				 <option value="<?echo $ativopesquisa;?>"><?echo $ativopesquisa;?></option>
				 <option value="A"><?echo "Ativas";?></option>
				 <option value="I"><?echo "Inativas";?></option>

                 </select>
                 </td>
				 </tr>


	<tr bgcolor="#FF8C00">
	<td>Modelo</td>
	<td>
                <select name="modelopesquisa">
                <option value="Todos"></option>
                <option value=<?echo $modelopesquisa;?>><?echo $modelopesquisa;?></option>
				 <?
				 $result2 = "SELECT DISTINCT MODELO FROM MAQUINAS order by MODELO ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["MODELO"]}\">{$row["MODELO"]}</option>";
                 }
				 ?>

				 </select>



     </td>
	</tr>

    <tr bgcolor="#FF8C00">
	<td>Ano Fabricação</td>
	<td>
                 <select name="anopesquisa">
                 <option value="Todos"></option>
                 <option value=<?echo $anopesquisa;?>><?echo $anopesquisa;?></option>


				 <?
				 $result2 = "SELECT DISTINCT ANO_FABRICACAO FROM MAQUINAS order by ANO_FABRICACAO DESC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["ANO_FABRICACAO"]}\">{$row["ANO_FABRICACAO"]}</option>";
                 }
				 ?>
				 </select>
				 
				 </td>
				 </tr>
				 
				 <tr bgcolor="#FF8C00">
	             <td>Fabricante</td>
	             <td>
                 <select name="fabricantepesquisa">
                 <option value="Todos"></option>
                 <option value=<?echo $fabricantepesquisa;?>><?echo $fabricantepesquisa;?></option>
				 <?
				 $result2 = "SELECT DISTINCT FABRICANTE FROM MAQUINAS order by FABRICANTE ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["FABRICANTE"]}\">{$row["FABRICANTE"]}</option>";
                 }
				 ?>
				 </select>
				 </td>
				 </tr>
				 

				 <tr bgcolor="#FF8C00">
	             <td>Nr de Serie</td>
	             <td>
                 <select name="seriepesquisa">
                 <option value="Todos"></option>
                 <option value=<?echo $seriepesquisa;?>><?echo $seriepesquisa;?></option>
				 <?
				 $result2 = "SELECT DISTINCT  NUMERO_SERIE FROM MAQUINAS where NUMERO_SERIE is not null ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["NUMERO_SERIE"]}\">{$row["NUMERO_SERIE"]}</option>";
                 }
				 ?>
				 </select>
                 </td>
				 </tr>

                 <tr bgcolor="#FF8C00">
	             <td>Nr de Patrimônio</td>
	             <td>
                 <select name="patrimoniopesquisa">
                 <option value="Todos"></option>
				 <option value=<?echo $patrimoniopesquisa;?>><?echo $patrimoniopesquisa;?></option>
				 <?
				 $result2 = "SELECT DISTINCT PATRIMONIO FROM MAQUINAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["PATRIMONIO"]}\">{$row["PATRIMONIO"]}</option>";
                 }
				 ?>
				 </select>
				 </td>
				 </tr>
				 
                 <tr bgcolor="#FF8C00">
	             <td>Localização</td>
	             <td>
                 <select name="localizacaopesquisa">
                 <option value="Todos"></option>
				 <option value=<?echo $localizacaopesquisa;?>><?echo $localizacaopesquisa;?></option>
				 <?
				 $result2 = "SELECT DISTINCT LOCALIZACAO FROM MAQUINAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["LOCALIZACAO"]}\">{$row["LOCALIZACAO"]}</option>";
                 }
				 ?>
				 </select>
				 </td>
				 </tr>
				 </TABLE></BR>







   <input type="hidden" name="escolha" value="1">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

  <input  type="submit"   VALUE="Buscar">

<?
}


if (!IsSet($escolha) or $escolha=="1"  ){

 if (!IsSet($escolha)){
                   $modelopesquisa="Todos";
                   $anopesquisa="Todos";
                   $fabricantepesquisa="Todos";
                   $ativopesquisa="Todos";
                   $seriepesquisa="Todos";
                   $patrimoniopesquisa="Todos";
                   $localizacaopesquisa="Todos";


             ?>
              <font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando Equipamentos</font></br>
              <font style='font-size: 12px;color: red;text-align:left;bold: Negrito' >Preferências</font></br>
              <font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
              Status Equipamento:<?echo "$ativopesquisa";?></br>
              Modelo:<?echo "$modelopesquisa";?></br>
              Ano Fabricação:<?echo "$anopesquisa";?></br>
              Fabricante:<?echo "$fabricantepesquisa";?></br>
              Número de Serie:<?echo "$seriepesquisa";?></br>
              Nr.Patrimônio:<?echo "$patrimoniopesquisa";?></br>
              Localização:<?echo "$localizacaopesquisa";?></br>
              <a href="consultamaquina.php?navegando=sim&escolha=mudarconteudo&codigofamilia=<?echo "$codigofamilia";?>&navegando=sim">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           Definir Filtro</a>

<?}
if ($escolha=="1" ){

?>
              <font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando Equipamentos</font></br>
              <font style='font-size: 12px;color: red;text-align:left;bold: Negrito' >Preferências</font></br>
              <font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
              Status Equipamento:<?echo "$ativopesquisa";?></br>
              Modelo:<?echo "$modelopesquisa";?></br>
              Ano Fabricação:<?echo "$anopesquisa";?></br>
              Fabricante:<?echo "$fabricantepesquisa";?></br>
              Número de Serie:<?echo "$seriepesquisa";?></br>
              Nr.Patrimônio:<?echo "$patrimoniopesquisa";?></br>
              Localização:<?echo "$localizacaopesquisa";?></br>


              <a href="consultamaquina.php?navegando=sim&escolha=mudarconteudo&modelo=<?echo "$modelopesquisa";?>
              &anopesquisa=<?echo $anopesquisa;?>&seriepesquisa=<?echo $seriepesquisa;?>&patrimoniopesquisa=<?echo $patrimoniopesquisa;?>
              &localizacaopesquisa=<?echo $localizacaopesquisa;?>&fabricantepesquisa=<?echo $fabricantepesquisa;?>&ativopesquisa=<?echo $ativopesquisa;?>
              "><h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           Alterar  Filtro</a>

<?

}
?>



  <hr>
  </br>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

<tr>
<th>Família Maquina/Unidade</th>





<?
                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);

 $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {

      
      ?>
      <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' ><? echo ociresult($s, "CD_FABRICA");?></font></th><?

  }
  ?>
  <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' >Total</font></th>


  <?
  


  $totalempresa="0";
  $contador2="0";

  
 $s2 = OCIParse($ora_conexao, "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS");
  OCIExecute($s2, OCI_DEFAULT);
  While (OCIFetch($s2)) {
      $codigofamilia=ociresult($s2, "CD_FAMLIA") ;
      $totalfamilia="0";
      $contador="0";
      ?>
      </tr>
      <td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s2, "DS_FAMILIA");?></font></td>
      <?


        $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

                         $fabrica=ociresult($s, "CD_FABRICA") ;


                         $quantoss1 = OCIParse($ora_conexao, "select a.cd_maquina MAQUINA,a.MODELO MODELO,a.STATUS_MAQUINA STATUS,a.ANO_FABRICACAO ANO,
                         a.FABRICANTE FABRICANTE,a.NUMERO_SERIE SERIE,a.PATRIMONIO PATRIMONIO,a.LOCALIZACAO LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area and
                         d.cd_fabrica='$fabrica' and
                         a.cd_famlia='$codigofamilia'");


                        OCIExecute($quantoss1, OCI_DEFAULT);
                        While (OCIFetch($quantoss1)) {
                        $contador2=$contador2+1;
                           $maquinateste=ociresult($quantoss1, "MAQUINA") ;
                           $modeloteste=ociresult($quantoss1, "MODELO") ;
                           $statusteste=ociresult($quantoss1, "STATUS") ;
                           $anoteste=ociresult($quantoss1, "ANO") ;
                           $fabricanteteste=ociresult($quantoss1, "FABRICANTE") ;
                           $serieteste=ociresult($quantoss1, "SERIE") ;
                           $patrimonioteste=ociresult($quantoss1, "PATRIMONIO") ;
                           $localizacaoteste=ociresult($quantoss1, "LOCALIZACAO") ;

                           //echo "MODELO=$modeloteste//MODELO TESTE:$modelopesquisa//STATUS=$statusteste//ATIVO TESTE:$ativopesquisa//familia:$codigofamilia//fabrica:$fabrica</br>";
                           if ($modelopesquisa =="Todos"){
                             $recupera1="sim";
                           }
                           else
                           {
                             if ($modelopesquisa==$modeloteste){
                             $recupera1="sim";
                             }
                             else
                             {
                             $recupera1="nao";
                             }
                           }

                           if ($ativopesquisa =="Todos"){
                             $recupera2="sim";
                           }
                           else
                           {
                             if ($ativopesquisa==$statusteste){
                             $recupera2="sim";
                             }
                             else
                             {
                             $recupera2="nao";
                             }
                           }

                           if ($anopesquisa =="Todos"){
                             $recupera3="sim";
                           }
                           else
                           {
                             if ($anopesquisa==$anoteste){
                             $recupera3="sim";
                             }
                             else
                             {
                             $recupera3="nao";
                             }
                           }


                           if ($fabricantepesquisa =="Todos"){
                             $recupera4="sim";
                           }
                           else
                           {
                             if ($fabricantepesquisa==$fabricanteteste){
                             $recupera4="sim";
                             }
                             else
                             {
                             $recupera4="nao";
                             }
                           }

                           if ($seriepesquisa =="Todos"){
                             $recupera5="sim";
                           }
                           else
                           {
                             if ($seriepesquisa==$serieteteste){
                             $recupera5="sim";
                             }
                             else
                             {
                             $recupera5="nao";
                             }
                           }

                           if ($patrimoniopesquisa =="Todos"){
                             $recupera6="sim";
                           }
                           else
                           {
                             if ($patrimoniopesquisa==$patrimonioteste){
                             $recupera6="sim";
                             }
                             else
                             {
                             $recupera6="nao";
                             }
                           }
                           
                           if ($localizacaopesquisa =="Todos"){
                             $recupera7="sim";
                           }
                           else
                           {
                             if ($localizacaopesquisa==$localizacaoteste){
                             $recupera7="sim";
                             }
                             else
                             {
                             $recupera7="nao";
                             }
                           }


                           if ($recupera1=="sim" and $recupera2=="sim" and $recupera3=="sim" and $recupera4=="sim" and $recupera5=="sim" and $recupera6=="sim" and $recupera7=="sim"){

                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA1(CD_MAQUINA,CD_FAMILIA,CD_FABRICA,DS_MODELO,
                          DS_ANO_FABRICACAO,DS_STATUS,DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO) VALUES(
                          '$maquinateste','$codigofamilia','$fabrica','$modeloteste','$anoteste','$statusteste','$fabricanteteste',
                          '$serieteste','$patrimonioteste','$localizacaoteste')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

                           $contador=$contador+1;

                           }


                        }//final das maquinas


                        if ($contador >"0"){
                           $totalfamilia=$totalfamilia+$contador;
                           $totalempresa=$totalempresa+$contador;


                           ?><td width="230" >
                           <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&navegando=sim&modelo=<?echo "$modeloteste";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$contador";?></a></td><?
                         $contador="0";
                        }
                        else
                        {
                            ?><td bgcolor="white">-</td><?

                        }
                //$totalfamilia=$totalfamilia+$contador;
                //$totalempresa=$totalempresa+$contador;


        }//final da fabrica?>
        <td><? echo "$totalfamilia";?></td>
      </tr>
      <?

  } //final das familias
  ?>



<tr>






<th>Total da Unidade</th>
<?
$sacha5 = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($sacha5, OCI_DEFAULT);
        While (OCIFetch($sacha5)) {

                         $fabrica=ociresult($sacha5, "CD_FABRICA") ;


                         $quantoss19 = OCIParse($ora_conexao, "select count(*) CONTADOR  from AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica'");


                        OCIExecute($quantoss19, OCI_DEFAULT);
                        While (OCIFetch($quantoss19)) {
                           $quantidademaquina=ociresult($quantoss19, "CONTADOR") ;
                            ?>
                            <td><? echo "$quantidademaquina";?></td>
                            <?
                        }

       }
?>


<td><? echo "$totalempresa";?></td>


</tr>
</table>




  <?
  
  }







// Insert data into table...
//$s = OCIParse($c, "insert into tab1 values (1, 'Frank')");
//OCIExecute($s, OCI_DEFAULT);

                      //$qsvGetEmployees3 = " select COUNT(*)CONTADOR from origem_movimentacao ";
                      //$iStatement3 = @OCIParse($iDBConn, $qsvGetEmployees3);
                        //@OCIExecute($iStatement3, OCI_DEFAULT);
                        // while (OCIFetchInto($iStatement3, &$arrEmployee3, OCI_ASSOC+OCI_RETURN_NULLS))
                        // {
                        //$contador=$arrEmployee3['CONTADOR'] ;
                       // }

?>


