<html>
<head>
<title> Utilização de Abas - Javascript </title>
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
 background-color: #FFFFFF;
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
 padding: 5px;
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
 width: 860px;
 height: 460px;
}


#envolve { width: 1300px;background-color: black;}
 #div_1 { position: relative; width: 800px; height: 700px; background-color: white; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 500px; height: 700px;background-color: black;  float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }



</style>
<script language="JavaScript">

 function stAba(menu,conteudo)
 {
  this.menu = menu;
  this.conteudo = conteudo;
 }

 var arAbas = new Array();
 arAbas[0] = new stAba('td_cadastro','div_cadastro');
 arAbas[1] = new stAba('td_consulta','div_consulta');
 arAbas[2] = new stAba('td_manutencao','div_manutencao');

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

<form  action="LISTAMATERIASESTOQUEsadege.php" method="POST">
<div id="envolve">

<font style='font-size: 32px;color: white;text-align:left;bold: Negrito' >Listagem de Materiais</font>
<font style='font-size: 12px;color: white;text-align:left;bold: Negrito' >
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
$usuario=$_GET['usuario'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$fabricaescolha=$_GET['fabricaescolha'];
$componente=$_GET['componente'];
$acaoeliminar=$_GET['acaoeliminar'];
$acaogravar=$_GET['acaogravar'];
$atividadegrava=$_GET['atividadegrava'];
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
            $fabricapesquisa=$_POST['fabricapesquisa'];
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
            $fabricapequisa=$_POST['fabricapequisa'];
            $ordembaixa=$_POST['ordembaixa'];
            $databaixa=$_POST['databaixa'];
            $grupoordens=$_POST['grupoordens'];
            $tipo=$_POST['tipo'];
            $codigomaquina=$_POST['codigomaquina'];
            $fabricaescolha=$_POST['fabricaescolha'];
            $numeroordempesquisa=$_POST['numeroordempesquisa'];
            $modalidade=$_POST['modalidade'];
            $acaogravar=$_POST['acaogravar'];
            $listaordemselecionada=$_POST['listaordemselecionada'];
            $cadastro=$_POST['cadastro'];
            $hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $componente=$_POST['componente'];
            $recomendacao=$_POST['recomendacao'];
            $atividadegrava=$_POST['atividadegrava'];
            $contadoreliminar=$_POST['contadoreliminar'];
            $edicao=$_POST['edicao'];
            $atividadepequisa=$_POST['atividadepequisa'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $requisicao=$_POST['requisicao'];
            $datasolicitacao=$_POST['datasolicitacao'];
            $solicitante=$_POST['solicitante'];
            $item=$_POST['item'];
            $acao=$_POST['acao'];
            $cordiv=$_POST['cordiv'];


}


require("configuraoracle.php");
require("estilo2.css");

if (!IsSet($acao)){
//teste de integracao
require("integraestoque.php");
}



?>

</font>
</br>

<body onLoad="AlternarAbas('td_cadastro','div_cadastro')">






<div id="div_1">
<table width="760" height="480" cellspacing="0" cellpadding="0"
border="0" style="border-left: 1px solid #000000;">
 <tr>
  <td height="20" width="100" class="menu" id="td_cadastro"
  onClick="AlternarAbas('td_cadastro','div_cadastro')">
   Cadastro
  </td>
  <td height="20" width="100" class="menu" id="td_consulta"
  onClick="AlternarAbas('td_consulta','div_consulta')">
   Classificação
  </td>
  <td height="20" width="100" class="menu" id="td_manutencao"
  onClick="AlternarAbas('td_manutencao','div_manutencao')">
   Manutenção
  </td>
  <td width="460" style="border-bottom: 1px solid #000000">

  <td>
 </tr>
 <tr>
  <td height="460" class="tb-conteudo" colspan="4">
   <div id="div_cadastro" class="conteudo" style="display: none">

              <div class='divscroll'  style='height:400;width:80%'>
              <CENTER>
              <table width="100%" border="1">
              <tr>
         	  <th>Item</th>
	          <th>Descricao</th>
	          <th>Unidade</th>
              <th>Estoque Mínimo</th>
              <th>Saldo</th>
              <th>Valor (R$)</th>
              </tr>
              <?
              $s = OCIParse($ora_conexao, " select CD_MATERIAL,DS_MATERIAL,CD_UNIDADE,VALOR,SALDO_ESTOQUE,ESTOQUE_MINIMO FROM
              MAT_PECAS order by CD_MATERIAL asc");
              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)) {
                 $codigomaterial=ociresult($s, "CD_MATERIAL") ;
                 $descricaomaterial=ociresult($s, "DS_MATERIAL") ;
                 $valoritem=ociresult($s, "VALOR") ;
                 $saldoritem=ociresult($s, "SALDO_ESTOQUE") ;
                 $saldoritem=number_format($saldoritem, 0, ',', '.');
                 $minimoitem=ociresult($s, "ESTOQUE_MINIMO") ;
                 $unidadeitem=ociresult($s, "CD_UNIDADE") ;
                 ?>
                <tr>
                <td><center><? echo $codigomaterial;?></td>
                <td><center><? echo $descricaomaterial;?></td>
                <td><center><? echo $unidadeitem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $minimoitem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $saldoritem;?></td>
                <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $valoritem;?></td>

                </tr>
                <?
              }
              ?>
              </table>
            </div>




   </div>
   <div id="div_consulta" class="conteudo" style="display: none">
    CONSULTA
   </div>


   <div id="div_manutencao" class="conteudo" style="display: none">
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
				      <input type="hidden" name="acao" value="comecandogravar">
                      <input type="hidden" name="escolha" value="1">
                      <input type="hidden" name="banco" value="<?echo $banco;?>">
		              <input type="hidden" name="continuarmesmatela" value="sim">
		              <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		              <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		              <input type="hidden" name="cordiv" value="black">
                      <input  type="submit"  VALUE="Atualizar">
   </div>
  </td>
 </tr>
</table>
</div>

<div id="div_2" background-color: <?echo "$cordiv";?>>
</center>
                     <?

                       if ($acao=="comecandogravar"){

                       echo "Ação:Manutenção de cadastro</br>Classificando  Materiais"
                       ?>
                       <hr>
                       <?
                       $contadorordem="0";


                       $s = OCIParse($ora_conexao, "SELECT CD_MATERIAL MATERIAL,DS_MATERIAL DESCRICAO
                       FROM MAT_PECAS a
                       order by a.DS_MATERIAL asc ");
                       ?>
                     <div class='divscroll'  style='height:550;width:80%'>
                     <center><table border="1">

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
                     </div>

                     <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">
                     <input  type="submit" name="finalpeca"  VALUE="Atualizar">
                     <?}//final da acao rava?>


</body>
</div>
</form>
</html>


