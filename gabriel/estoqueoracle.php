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


<form action="estoqueoracle.php" method="POST">
<body onLoad="AlternarAbas('td_cadastro','div_cadastro')">


<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
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
$ordena=$_GET['ordena'];
$usuario=$_GET['usuario'];



}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
$fabricapesquisa=$_POST['fabricapesquisa'];
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
            $fabricaestoque=$_POST['fabricaestoque'];
            $classificacaoestoque=$_POST['classificacaoestoque'];


}



require("configuraoracle.php");
require("estilo2.css");





$programa="estoqueoracle.php";



if ($_POST[finalpeca]) {
$atual="Atalizando Estoque";

$lista=$_POST['lista'];
$fabricaestoque=$_POST['fabricaestoque'];
$classificacaoestoque=$_POST['classificacaoestoque'];



         $sacharegiao = OCIParse($ora_conexao, "SELECT count(*) VALOR
         FROM MAT_PECAS WHERE CD_FABRICA IS NULL");
         OCIExecute($sacharegiao, OCI_DEFAULT);
         While (OCIFetch($sacharegiao)) {
            $ultimo=ociresult($sacharegiao, "VALOR") ;
         }


 for ($passa=0;$passa < $ultimo;$passa++)
 {


     $final=$lista[$passa];


                   if ($final >"0"){
                        if ($fabricapesquisa >"0"  and $classificacaoestoque >"0"){

                          $sgrava1= OCIParse($ora_conexao, "UPDATE MAT_PECAS SET CD_FABRICA='$fabricapesquisa',CD_ITEM_CLASSIFICACAO='$classificacaoestoque' WHERE
                          CD_MATERIAL='$final'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);

                         }
                         else
                         {
                         ?><font style='font-size: 12px;color: green;text-align:center;bold: Negrito' >
                           <?echo "Não foi possível Associar ";?></font><?
                         }
                   }//final selecionado
                   


  }


}



?>



<center><font style='font-size: 32px;color: red;text-align:center;bold: Negrito' >Parametrização Estoque de Materias</font> </BR>
<?
ECHO "Unidade de Pesquisa:$fabricapesquisa</br>";?>
<hr>
<table width="900" height="50%" cellspacing="0" cellpadding="0"
border="0" style="border-left: 1px solid #000000;">
 <tr>
  <td height="5"  class="menu" id="td_cadastro"
  onClick="AlternarAbas('td_cadastro','div_cadastro')">
   Definir  Unidade de Fábrica


   <? IF ($fabricapesquisa >"0"){?>
  <td height="5"  class="menu" id="td_consulta2"
  onClick="AlternarAbas('td_consulta2','div_consulta2')">
   Consultar Cadastro
  </td>





  <?}else{?><td height="5"  class="menu" id="td_consulta2"
  onClick="AlternarAbas('td_consulta2','div_consulta2')" disabled>
   Consultar Cadastro
  </td>
  <?}?>


  <? IF ($fabricapesquisa >"0"){?>
  <td height="5"  class="menu" id="td_consulta3"
  onClick="AlternarAbas('td_consulta3','div_consulta3')">
   Especificar Fábrica de Uso/Tipo
  </td>

  <?}else{?><td height="5"  class="menu" id="td_consulta3"
  onClick="AlternarAbas('td_consulta3','div_consulta3')" DISABLED>
   Especificar Fábrica de Uso/Tipo
  </td>
  <?}?>


 </tr>
 


 <tr>


  <td height="20" class="tb-conteudo" colspan="3">

   <div id="div_cadastro" class="conteudo" style="display: none">


   Unidades:<select name="fabricapesquisa">
   



                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
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
       <center><input  type="submit"  name="busca" VALUE="Acessar">





		





   </div>
   









   <div id="div_consulta2" class="conteudo" style="display: none">

    <font style='font-size: 10px;color: red;text-align:center;bold: Negrito' >
                        <?



                       $contadorordem="0";
                       
                       ECHO "SELECT a.CD_MATERIAL MATERIAL,a.DS_MATERIAL DESCRICAO,b.ds_tipo DESCRICAOTIPO
                       FROM MAT_PECAS a,TIPO_ITEM b
                 where a.CD_ITEM_CLASSIFICACAO=b.cd_tipo(+) and
                 a.cd_fabrica='$fabricapesquisa'";


                       $s = OCIParse($ora_conexao, "SELECT a.CD_MATERIAL MATERIAL,a.DS_MATERIAL DESCRICAO,b.ds_tipo DESCRICAOTIPO
                       FROM MAT_PECAS a,TIPO_ITEM b
                 where a.CD_ITEM_CLASSIFICACAO=b.cd_tipo(+) and
                 a.cd_fabrica='$fabricapesquisa'");





        ?>

 <div class='divscroll'  style='height:550;width:50%'>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">

    <tr>
    <th></center><font style='font-size: 10px;color: white;text-align:left;bold: Negrito' >Codigo</th>
	<th>Descrição</th>
	<th>Classificação de Uso</th>


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $material=ociresult($s, "MATERIAL") ;
      ?>
      <tr>
      <td><font style='font-size: 10px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s, "MATERIAL");?></td>
      <td><? echo ociresult($s, "DESCRICAO");?></td>
      <td><? echo ociresult($s, "DESCRICAOTIPO");?></td>

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
    $contadorordem="0";


                       $s = OCIParse($ora_conexao, "SELECT a.CD_MATERIAL MATERIAL,a.DS_MATERIAL DESCRICAO,b.ds_tipo DESCRICAOTIPO
                       FROM MAT_PECAS a,TIPO_ITEM b
                       where a.CD_ITEM_CLASSIFICACAO=b.cd_tipo(+) and
                       ((a.cd_fabrica IS NULL) or (a.cd_fabrica='$fabricapesquisa')) order by a.DS_MATERIAL asc ");
                 





        ?>
 <hr>
 </br>
 

				 
				 Definir Classificação :<select name="classificacaoestoque">
                 <?
				 $result2 = "SELECT CD_TIPO,DS_TIPO  FROM TIPO_ITEM ORDER by DS_TIPO ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_TIPO"]}\">{$row["DS_TIPO"]}</option>";
                 }
				 ?>
				 </select>
				 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

    <tr>
    <th>Codigo </a></th>
    <th>Descrição</a></th>
    <th>Seleção</th>


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
            $contadorordem=$contadorordem+1;
            $codigo=ociresult($s, "MATERIAL");
      ?>
      <tr>
      <td><center><? echo ociresult($s, "MATERIAL");?></td>
      <td><center><? echo ociresult($s, "DESCRICAO");?></td>
       <td ><input type="checkbox" name="lista[]"   value="<?echo $codigo;?>"></td>



      </tr>
      <?

  }
  ?>
  </table>




    <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">




   <input  type="submit" name="finalpeca"  VALUE="Atualizar">

   </div>
		
</body>

</form>

