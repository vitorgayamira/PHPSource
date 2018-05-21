<?

$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];



}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
}


require("configuraoracle.php");
require("estilo2.css");
//require("estilonavegacaofundo.css");







$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];



}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
$fabricapesquisa=$_POST['fabricapesquisa'];
}



require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>

<head>

<style>

body, table {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 color: #000000;
}

.menu {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 font-weight: normal;
 color: #000033;
 background-color: white;
 border-right: 1px solid #000000;
 border-top: 1px solid #000000;
 border-bottom: 1px solid #000000;
 padding: 5px;
 cursor: hand;

}

.menu-sel {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 font-weight: bold;
 color: #000033;
 background-color: #CCCCCC;
 border-right: 1px solid #000000;
 border-top: 1px solid #000000;
 padding: 10px;
 cursor: hand;
}

.tb-conteudo {
 border-right: 1px solid #000000;
 border-bottom: 1px solid #000000;
}

.conteudo {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 font-weight: normal;
 color: #000033;
 background-color: #CCCCCC;
 padding: 5px;
 width: 100%;
 height: 460px;
}


</style>

<script language="JavaScript">

 function stAba(menu,conteudo)
 {
  this.menu = menu;
  this.conteudo = conteudo;
 }

 var arAbas = new Array();
 arAbas[0] = new stAba('td_cadastro','div_cadastro');
 arAbas[1] = new stAba('td_consulta2','div_consulta2');
 arAbas[2] = new stAba('td_consulta3','div_consulta3');




 function AlternarAbas(menu,conteudo)
 {
  for (i=0;i<arAbas.length;i++)
  {
   m = document.getElementById(arAbas[i].menu);
   m.className = 'menu';
   c = document.getElementById(arAbas[i].conteudo)
   c.style.display = 'none';
  }
  m = document.getElementById(menu)
  m.className = 'menu-sel';
  c = document.getElementById(conteudo)
  c.style.display = '';
 }

</script>

</head>


<form action="maquinasoracle.php" method="POST">
<body onLoad="AlternarAbas('td_cadastro','div_cadastro')">


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
$familiapesquisa=$_GET['familiapesquisa'];
$baseoracle=$_GET['baseoracle'];
$month=$_GET['month'];
$year=$_GET['year'];
$dia=$_GET['dia'];
$fabricapesquisa=$_GET['fabricapesquisa'];

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
            $familiapesquisa=$_POST['familiapesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $selecaofabrica=$_POST['selecaofabrica'];
            $contadorlinha=$_POST['contadorlinha'];
            $contadorfamilia=$_POST['contadorfamilia'];
            $contadorfabrica=$_POST['contadorfabrica'];
            $contadorregiao=$_POST['contadorregiao'];
            $contadordistrito=$_POST['contadordistrito'];


            $listamodelo=$_POST['listamodelo'];
            $listafamilia=$_POST['listafamilia'];
            $lista=$_POST['lista'];
            $listafabricante=$_POST['listafabricante'];
            $listaano=$_POST['listaano'];
            $listaregiao=$_POST['listaregiao'];
            $listadistrito=$_POST['listadistrito'];
            $listafabrica=$_POST['listafabrica'];
            $baseoracle=$_POST['baseoracle'];
            $habilita=$_POST['habilita'];

            $usuario=$_POST['usuario'];
            $usuarioinicio=$_POST['usuarioinicio'];
            $senha=$_POST['senha'];
            $senhanova=$_POST['senhanova'];

            $contador66=$_POST['contador66'];
            $listaordem=$_POST['listaordem'];
            $contadorordem=$_POST['contadorordem'];
            $peca=$_POST['peca'];
            $quantidadepeca=$_POST['quantidadepeca'];
            $ordematual=$_POST['ordematual'];
            $atual=$_POST['atual'];
            $datapesquisa1=$_POST['datapesquisa1'];
            $equipemento=$_POST['equipemento'];
            $unidadevida=$_POST['unidadevida'];


}





if ($_POST[busca]) {
$atual="Selecionada um Equipemanto";
//echo "$atual";
 }


if ($_POST[finalpeca]) {
$atual="Atalizando Tipos de Itens";

$lista=$_POST['lista'];
$uso=$_POST['uso'];
$vidautil=$_POST['vidautil'];



         $sacharegiao = OCIParse($ora_conexao, "SELECT count(*) VALOR
         FROM TIPO_ITEM");
         OCIExecute($sacharegiao, OCI_DEFAULT);
         While (OCIFetch($sacharegiao)) {
            $ultimo=ociresult($sacharegiao, "VALOR") ;
         }


 for ($passa=0;$passa < $ultimo;$passa++)
 {


     $uso2=$uso[$passa];
     $vida2=$vidautil[$passa];
     $final=$lista[$passa];

	 $uso2=str_replace(",",".", $uso2);

                        if ($uso2 >"0"  and $equipemento >"0"){

                          $sgrava1= OCIParse($ora_conexao, "INSERT INTO TIPO_MAQUINAS (CD_TIPO,CD_MAQUINA,CD_UNID_USO,
                          QT_USO,CD_UNID_VIDA,VL_VIDA_UTIL)
                            VALUES ('$final','$equipemento','Un','$uso2','$unidadevida','$vida2')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                           ?><font style='font-size: 12px;color: green;text-align:center;bold: Negrito' >
                           <?echo "$atual: com Peças da Ordem $ordematual com Sucesso</br>";?></font><?
                         }
                         else
                         {
                         ?><font style='font-size: 12px;color: green;text-align:center;bold: Negrito' >
                           <?echo "Não foi possível Associat Tipo ao Equipemtnos";?></font><?
                         }


  }


}










ECHO "</BR>Unidade:$fabricapesquisa";
ECHO "</BR>Equipamento:$listaordem[0]";



?>



<center><font style='font-size: 19px;color: red;text-align:center;bold: Negrito' >Cadastro de Equipamentos</font>

<table width="900" height="50%" cellspacing="0" cellpadding="0"
border="0" style="border-left: 1px solid #000000;">
 <tr>
  <td height="5"  class="menu" id="td_cadastro"
  onClick="AlternarAbas('td_cadastro','div_cadastro')">
   parametrizacao


   <? IF ($fabricapesquisa >"0"){?>
  <td height="5"  class="menu" id="td_consulta2"
  onClick="AlternarAbas('td_consulta2','div_consulta2')">
   Equipamentos
  </td>





  <?}else{?><td height="5"  class="menu" id="td_consulta2"
  onClick="AlternarAbas('td_consulta2','div_consulta2')" disabled>
   Equipamentos
  </td>
  <?}?>


  <? IF ($listaordem >"0"){?>
  <td height="5"  class="menu" id="td_consulta3"
  onClick="AlternarAbas('td_consulta3','div_consulta3')">
   Especificação de Peças e Matériais
  </td>

  <?}else{?><td height="5"  class="menu" id="td_consulta3"
  onClick="AlternarAbas('td_consulta3','div_consulta3')" DISABLED>
   Especificação de Peças e Matériais
  </td>
  <?}?>


 </tr>
 


 <tr>


  <td height="20" class="tb-conteudo" colspan="3">

   <div id="div_cadastro" class="conteudo" style="display: none">

   <?echo "usuario:$usuario</br>";


   ?>


   Unidades:<select name="fabricapesquisa">
   



                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS where
                 CD_FABRICA IN (SELECT CD_FABRICA FROM AREAS WHERE CD_AREA IN (SELECT CD_AREA FROM SECAOS WHERE CD_SECAO IN (
                 SELECT cd_sec FROM FUNCIONARIO_SADEGE WHERE CADASTRO='$usuario')))";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select></BR>
				 <input type="hidden" name="escolha" value="avancando3">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="usuario" value="<?echo $usuario;?>">
		<input type="hidden" name="senhanova" value="<?echo $senhanova;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
       <center><input  type="submit"  name="busca" VALUE="Buscar Equipamentos">





		





   </div>
   









   <div id="div_consulta2" class="conteudo" style="display: none">

    <font style='font-size: 10px;color: red;text-align:center;bold: Negrito' >
                        <?



                       $contadorordem="0";
                       $s = OCIParse($ora_conexao, " SELECT a.CD_MAQUINA MAQUINA,a.DS_MAQUINA DESCRICAO FROM MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 where a.CD_CENTRO=b.cd_centro and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica='$fabricapesquisa'  ");





        ?>
        <input  type="submit"  name="busca" VALUE="Confirma">
 <div class='divscroll'  style='height:550;width:50%'>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">

    <tr>
    <th></center><font style='font-size: 10px;color: white;text-align:left;bold: Negrito' >Codigo</th>


	<th>Descrição</th>
	<th>selecao</th>

    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $maquina=ociresult($s, "MAQUINA") ;
      $contadorordem=$contadorordem+1;
      ?>
      <tr>
      <td><font style='font-size: 10px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s, "MAQUINA");?></td>
      <td><? echo ociresult($s, "DESCRICAO");?></td>
      <td><input type="radio" name="listaordem[]"   value="<?echo $maquina;?>"></td>

      </tr>
      <?

  }
  ?>
  </table>
   </div>



        <input type="hidden" name="escolha" value="avancando3">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="usuario" value="<?echo $usuario;?>">
		<input type="hidden" name="senhanova" value="<?echo $senhanova;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">




   </div>



   <div id="div_consulta3" class="conteudo" style="display: none">
   <?

                      $equipamento=$listaordem[0];
                      echo "Equipamento:$listaordem[0]</br>";

                       $s = OCIParse($ora_conexao, " select  a.CD_TIPO CODIGO,b.DS_TIPO DESCRICAO,a.QT_USO USO,a.VL_VIDA_UTIL VIDA,
                       c.ds_unidade DESCRICAOUNIDADE,d.ds_unidade DESCRICAOUNIDADEVIDA
                         FROM TIPO_MAQUINAS a,TIPO_ITEM b,UNIDADES c,UNIDADES d
                       WHERE a.CD_MAQUINA='$equipamento' and
                       a.cd_tipo=b.cd_tipo AND
                       b.cd_unidade=c.cd_unidade  and
                       a.CD_UNID_VIDA=d.cd_unidade
                       ");





        ?>

 <center>Classificação de Itens do Equipamento

 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

    <tr>
    <th>Item</th>
    <th>Descricao</th>
    <th>Quant.uso</th>
    <th>Unid</th>
    <th>Vida Util</th>
    <th>Unid</th>

    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {


      ?>
      <tr>
      <td><center><? echo ociresult($s, "CODIGO");?></td>
      <td><center><? echo ociresult($s, "DESCRICAO");?></td>
      <td><center><? echo ociresult($s, "USO");?></td>
      <td><center><? echo ociresult($s, "DESCRICAOUNIDADE");?></td>
      <td><center><? echo ociresult($s, "VIDA");?></td>
      <td><center><? echo ociresult($s, "DESCRICAOUNIDADEVIDA");?></td>

      </tr>
      <?

  }
  ?>
  </table>


    <?
    $contadorordem="0";
                       $s = OCIParse($ora_conexao, " select CD_TIPO,DS_TIPO FROM TIPO_ITEM");





        ?>
 <hr>
 Atualizando Registros</br>
 
                 Definir Unidade para Vida Util:<select name="unidadevida">
                 <?
				 $result2 = "SELECT CD_UNIDADE FROM UNIDADES order by CD_UNIDADE ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_UNIDADE"]}\">{$row["CD_UNIDADE"]}</option>";
                 }
				 ?>
				 </select>
				 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

    <tr>
    <th>Codigo</th>
    <th>Classificação</th>
    <th>Quant.uso</th>
    <th>Vida Util</th>


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
            $contadorordem=$contadorordem+1;
            $codigo=ociresult($s, "CD_TIPO");
      ?>
      <tr>
      <td><center><? echo ociresult($s, "CD_TIPO");?></td>
      <td><center><? echo ociresult($s, "DS_TIPO");?></td>
      <td  align="left"><input type="TXT" SIZE="10" name="uso[]" value="0" >
      <input type="hidden" name="lista[]" value="<?echo $codigo;?>"></td>

      <td  align="left"><input type="TXT" SIZE="10" name="vidautil[]" value="0" >



      </tr>
      <?

  }
  ?>
  </table>




    <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">
    <input type="hidden" name="atual" value="<?echo $atual;?>">
    <input type="hidden" name="equipemento" value="<?echo $equipamento;?>">



   <input  type="submit" name="finalpeca"  VALUE="Atualizar">

   </div>
		
</body>

</form>

