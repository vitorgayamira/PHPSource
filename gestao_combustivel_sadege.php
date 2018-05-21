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



 #div_1 { position: relative; width: 100%; height: 700px; background-color: white; border:1;float: center; text-align: center; color: #E8E8E8;  }




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
 
function funcao1()
{
    if (document.combu.veiculo.value=='sem'){
      	 alert("Tem que Existir Veiculo")
      	 document.combu.recebe.value='N'
      	 document.combu.veiculo.select()
         document.combu.veiculo.focus()
         var a ='N';
   	}

    if (document.combu.veiculo.value !='sem'){
      document.combu.recebe.value='S'
      var a ='S';
    }

 return a;
}

function Mascara_Hora2(Hora2)
{
         var hora01 = '';
         hora01 = hora01 + Hora2;
         if (hora01.length == 2){
              hora01 = hora01 + ':';
              document.forms[0].Hora2.value = hora01;
          }
          if (hora01.length == 5){
             Verifica_Hora2();
          }
}

function Mascara_Hora(Hora)
{
         var hora01 = '';
         hora01 = hora01 + Hora;
         if (hora01.length == 2){
           hora01 = hora01 + ':';
           document.forms[0].Hora.value = hora01;
         }
         if (hora01.length == 5){
            Verifica_Hora();
         }
}

function Verifica_Hora()
{
        hrs = (document.forms[0].Hora.value.substring(0,2));
        min = (document.forms[0].Hora.value.substring(3,5));
        estado = "";
       if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
            estado = "errada";
       }

       if (document.forms[0].Hora.value == "") {
          estado = "errada";
       }

        if (estado == "errada") {
            alert("Hora inválida!");
            document.forms[0].Hora.focus();
        }
}


function Verifica_Hora2()
{
           hrs = (document.forms[0].Hora2.value.substring(0,2));
           min = (document.forms[0].Hora2.value.substring(3,5));
           hrsinicio = (document.forms[0].Hora.value.substring(0,2));

           estado = "";
           if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
              estado = "errada";
           }

           if (document.forms[0].Hora2.value == "") {
              estado = "errada";
           }

           if (hrsinicio >= hrs) {
              estado = "errada";
           }

           if (estado == "errada") {
                  document.getElementById('Gravacaofuncionario').disabled = true;
                  alert("Hora inválida!");
                  document.forms[0].Hora2.focus();

           }
           else
           {
           document.getElementById('Gravacaofuncionario').disabled = false;
           document.getElementById('fecharordem').disabled = false;
           }



}





</script>

</head>

<form  name="combu" method="post"  action="gestao_combustivel_sadege.php">





<?

//var objetoDados = document.getElementById(“dados”);
//<input type=“hidden” id=“dados” name=“dados_enviar” value=“” />

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$acao=$_GET['acao'];
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
$veiculo=$_GET['veiculo'];
$cadastro=$_GET['cadastro'];
$localbanco=$_GET['localbanco'];




}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$acao=$_POST['acao'];
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
            $krodado=$_POST['krodado'];
            $horimetro=$_POST['horimetro'];
            $veiculo=$_POST['veiculo'];
            $combustivel=$_POST['combustivel'];
            $quantidade=$_POST['quantidade'];
            $destinoestoque=$_POST['destinoestoque'];
            $localbanco=$_POST['localbanco'];
            $veiculopesquisaexclusao=$_PSOT['veiculopesquisaexclusao'];



}


require("configuraoracle.php");
require("configuramysql.php");

require("estilo2.css");


if (!IsSet($fabricapesquisa)){
//acha uni  dae de lotacao

    $achaunidade= "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO IN (SELECT CD_EMPRESA FROM USUARIO_BI  WHERE CD_USUARIO='$codigousuario')";
    $achaunidade2 = mysql_db_query($banco,$achaunidade,$conexao);
    $achaunidade3=mysql_fetch_array($achaunidade2);
    $unidadelotacao1=$achaunidade3["DESCRICAO"];


    $result28 = "select CD_FABRICA FROM  FABRICAS WHERE DS_FABRICA='$unidadelotacao1'";
                 $result38 = @OCIParse($ora_conexao, $result28);
				 @OCIExecute($result38, OCI_DEFAULT);
				 while (OCIFetchInto($result38,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $fabricapesquisa=ociresult($result38, "CD_FABRICA") ;
                 }
}

if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($mes)){
$mes=date('m');
}



?>
 <CENTER>
<a href="gestao_combustivel_sadege.php?pagina=1&escolha=ELIMINAASSOCIACAO&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&veiculo=<?echo $veiculo;?>&cadastro=<?echo $cadastro;?>&localbanco=<?ECHO $localbanco;?>">
<img width=50 height=60  BORDER=1 src="eliminar_acao.GIF" ></a>

<a href="gestao_combustivel_sadege.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&codigousuario=<?echo $codigousuario;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&fabricapesquisa=<?echo $fabricapesquisa;?>&veiculo=<?echo $veiculo;?>&cadastro=<?echo $cadastro;?>&localbanco=<?ECHO $localbanco;?>"><img width=50 height=60 BORDER=1 src="atualizar.GIF"></a>

<a href="gestao_combustivel_sadege.php?pagina=1&escolha=mudaperiodo&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&localbanco=<?ECHO $localbanco;?>"><img width=50 height=60 BORDER=1  src="parametro6.GIF">
</a>

<HR>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Abastecimento</font>
<font style='font-size: 10px;color: BLACK;text-align:left;bold: Negrito' ></BR>








<?

if ($escolha=="mudaperiodo"){
?>
<center><table bgcolor="#FF8C00" borde="1">

<tr>
Definindo Parametrização
<td>Unidade</td>
<td><select name="fabricapesquisa">
                 <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>
</td>
</tr>

<tr>
<td>Ano</td>
<td>
<input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">
</td>
</tr>
<tr>
<td>Mes </td>
<td>
<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mes" >
    <option value="<?echo $mes;?>"><?echo $mes;?></option>
	<option value="01">Janeiro</option>
    <option value="02">Fevereiro</option>
    <option value="03">Março</option>
    <option value="04">Abril</option>
    <option value="05">Maio</option>
    <option value="06">Junho</option>
    <option value="07">Julho</option>
    <option value="08">Agosto</option>
    <option value="09">Setembro</option>
    <option value="10">Outubro</option>
    <option value="11">Novembro</option>
    <option value="12">Dezembro</option>
   	</select>
</td>
</tr>


<tr>
<td>Veículo</td>

<td><select name="veiculo" id=“veiculo” onblur="funcao1()">
                       <option value="<?echo $veiculo;?>"><?echo $veiculo;?></option>
                      <?
				      $result2 = "SELECT a.CD_MAQUINA CODIGO,a.DS_MAQUINA DESCRICAO FROM MAQUINAS a,SECAOS b,AREAS c,CENTRO_TRABALHOS d
                      WHERE a.CD_MAQUINA IN (SELECT CD_EQUIPAMENTO FROM
                      COMBUSTIVEL_EQUIPAMENTOS WHERE CD_COMBUSTIVEL IN (SELECT CD_MATERIAL FROM
                      MAT_PECAS where combustivel='S')) and a.cd_centro=d.cd_centro and d.cd_secao=b.cd_secao and
                      b.cd_area=c.cd_area  ORDER BY a.CD_MAQUINA ASC
                      ";
				      $result3 = @OCIParse($ora_conexao, $result2);
				      @OCIExecute($result3, OCI_DEFAULT);
				      while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				      {
					     print "<option value=\"{$row["CODIGO"]}\">{$row["CODIGO"]}</option>";
                      }
				      ?>
</td>                      </select>
</tr>

<tr>
<td>Motorista</td>
<td><select name="cadastro">
                       <option value="<?echo $cadastro;?>"><?echo $cadastro;?></option>
                      <?
				      $result2 = "SELECT a.CADASTRO CODIGO,a.NOME NOME FROM FUNCIONARIO_SADEGE a,SECAOS b,AREAS c
				      where a.cd_sec=b.cd_secao and
                      b.cd_area=c.CD_AREA ";
				      $result3 = @OCIParse($ora_conexao, $result2);
				      @OCIExecute($result3, OCI_DEFAULT);
				      while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				      {
					     print "<option value=\"{$row["CODIGO"]}\">{$row["NOME"]}</option>";
                      }
				      ?>
                      </select>
</td>

</tr>
</table>

  	    <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="projeto" value="<?echo $projeto;?>">
		<input type="hidden" name="localbanco" value="<?ECHO $localbanco;?>">


  <input type="hidden" name="escolha" value="1">





  <input  type="submit"   VALUE="Buscar">

 <?
 }
if (!IsSet($escolha) OR ($escolha=="1")){
?>



<body onLoad="AlternarAbas('td_cadastro','div_cadastro')">






<div id="div_1">

<center><table width="500" height="500" cellspacing="0" cellpadding="0"
border="0" style="border-left: 1px solid #000000;">

 <tr>
  <td height="20" width="300" class="menu" id="td_cadastro"
  onClick="AlternarAbas('td_cadastro','div_cadastro')">
   Definir Consumo
  </td>
  <td height="20" width="100" class="menu" id="td_consulta"
  onClick="AlternarAbas('td_consulta','div_consulta')">
   Consulta
  </td>
  <td height="20" width="100" class="menu" id="td_manutencao"
  onClick="AlternarAbas('td_manutencao','div_manutencao')">
   Materiais
  </td>

 </tr>


 <tr>
  <td height="300" class="tb-conteudo" colspan="4">
   <div id="div_cadastro" class="conteudo" style="display: none">



                      <?echo "Fábrica:$fabricapesquisa";?></br>
                      <?echo "Mes:$mes - $ano";?></br>
                      Veiculo:<?echo "$veiculo";?> - Motorista:<?echo "$cadastro";?> </br>
                      <hr>
                      Destino:<select name="destinoestoque">
                      <?
				      $result2 = "SELECT CODIGO,CENTRO FROM CENTRO_CUSTOS";
				      $result3 = @OCIParse($ora_conexao, $result2);
				      @OCIExecute($result3, OCI_DEFAULT);
				      while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				      {
					     print "<option value=\"{$row["CODIGO"]}\">{$row["CENTRO"]}</option>";
                      }
				      ?>
                      </select>


                      <table>
                      <tr>
                      <td>
                      Dia
                      </td>
                      <td>
                      <input type="text" name="dia"  maxlength="2" size="3">
                      Hora Inicio:<input type="TXT" name="hora"  id="Hora" OnKeyUp="Mascara_Hora(this.value)" size="5" maxlength="5" >
                      Hora Fim:<input type="txt" name="hora2"  id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" ></br>
                      </td>
                      </tr>

                      <tr>
                      <td>
                      Hodômetro
                      </td>

                      <td>
                      
                      <?
                      

                      
                      $s99 = OCIParse($ora_conexao, "select MAX(km) ULTIMALEITURAKM,MAX(horimetro) HORA FROM CONSUMO_COMBUSTIVEL
                      WHERE CD_VEICULO='$veiculo' and
                      DATA_ENTRADA IN (SELECT MAX(DATA_ENTRADA) FROM  CONSUMO_COMBUSTIVEL WHERE CD_VEICULO='$veiculo') ");
                      OCIExecute($s99, OCI_DEFAULT);
                      While (OCIFetch($s99)) {
                        $ultimakm77=ociresult($s99, "ULTIMALEITURAKM") ;
                        $ultimahora77=ociresult($s99, "HORA") ;
                      }

                      ?>
                      <input type="txt" name="krodado" size="5" VALUE="<?echo $ultimakm77;?>">
                      </td>
                      </tr>
                      
                      <tr>
                      <td>Horimetro</td>
                      <td>
                      <input type="txt" name="horimetro"  size="5" VALUE="<?echo $ultimahora77;?>">
                      </td>
                      </tr>
                      
                      <tr>
                      <td>
                      Combustível
                      </td>
                      <td>
                      <select name="combustivel">
                      <?
				      $result2 = "select CD_MATERIAL,DS_MATERIAL,CD_UNIDADE FROM
                      MAT_PECAS where combustivel='S' order by CD_MATERIAL asc";
				      $result3 = @OCIParse($ora_conexao, $result2);
				      @OCIExecute($result3, OCI_DEFAULT);
				      while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				      {
					     print "<option value=\"{$row["CD_MATERIAL"]}\">{$row["DS_MATERIAL"]}-{$row["CD_UNIDADE"]}</option>";
                      }
				      ?>
                      </select>
                      Quantidade:<input type="txt" name="quantidade" id=“quantidade” ></br>
                      </td>

                      </tr>
                      
                      <tr>
                      <td>Obs</td>
                      <td>
                      <textarea  cols="76" rows="5" name="recomendacao"  value=" ">  </textarea></br>
                      </td>
                      </tr>


                      </table>
                      <input type="hidden" name="escolha" value="gravaconsumo">

                      <input type="hidden" name="banco" value="<?echo $banco;?>">
                      <input type="hidden" name="mes" value="<?echo $mes;?>">
                      <input type="hidden" name="ano" value="<?echo $ano;?>">
		              <input type="hidden" name="continuarmesmatela" value="sim">
		              <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		              <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		              <input type="hidden" name="veiculo" value="<?echo $veiculo;?>">
		              <input type="hidden" name="cadastro" value="<?echo $cadastro;?>">
		              <input type="hidden" name="localbanco" value="<?ECHO $localbanco;?>">
                      <input  type="submit"   VALUE="Gravar">






   </div>

   <div id="div_consulta" class="conteudo" style="display: none">

   </div>


   </div>


   <div id="div_manutencao" class="conteudo" style="display: none">

   <CENTER>
              <table width="100%" border="1">
              <tr>
         	  <th>Item</th>
	          <th>Descricao</th>
	          <th>Unidade</th>
              <th>Estoque Mínimo</th>
              <th>Saldo Inicial</th>
              <th>Valor (R$)</th>
              </tr>
              <?
              $s = OCIParse($ora_conexao, " select CD_MATERIAL,DS_MATERIAL,CD_UNIDADE,VALOR,SALDO_ESTOQUE,ESTOQUE_MINIMO FROM
              MAT_PECAS where combustivel='S' order by CD_MATERIAL asc");
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
  </td>
 </tr>
</table>

<?
}
?>

<font style='font-size: 32px;color: RED;text-align:left;bold: Negrito' >
<?


IF ($escolha=="gravaconsumo"){
 $datapesquisa1=$dia."/".$mes."/".$ano;




                                  $result2 = "select MAX(seq) DISTR FROM CONSUMO_COMBUSTIVEL ";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $sequencia1=ociresult($result3, "DISTR") ;
                                  }
                                  IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
 


 //testar se ja existe abastecimento
 
                                  $result2xistevei = "select count(*) CONTADOR  FROM CONSUMO_COMBUSTIVEL WHERE CD_VEICULO='$veiculo' ";
                                  $result3ver = @OCIParse($ora_conexao, $result2xistevei);
				                  @OCIExecute($result3ver, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $existeacaocombustivelcami=ociresult($result3ver, "CONTADOR") ;
                                  }

                                  if ($existeacaocombustivelcami >"0"){
                                  
                                      $result2xistevei99 = "select KM,HORIMETRO  FROM CONSUMO_COMBUSTIVEL WHERE CD_VEICULO='$veiculo' AND
                                       DATA_ENTRADA IN (SELECT MAX(DATA_ENTRADA) FROM  CONSUMO_COMBUSTIVEL WHERE CD_VEICULO='$veiculo')  ";

                                      $result399 = @OCIParse($ora_conexao, $result2xistevei99);
				                      @OCIExecute($result399, OCI_DEFAULT);
				                      while (OCIFetchInto($result399,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                      {
                                         $ultimokmleitura=ociresult($result399, "KM") ;
                                         $ultimohorimetroleitura=ociresult($result399, "HORIMETRO") ;

                                      }



                                  }
                                  else
                                  {

                                  $ultimokmleitura="0";
                                  $ultimohorimetroleitura="0";

                                  }
                                  

                                  
                                  $result2xistevei899 = "select to_char(sysdate,'dd') DIA from dual";
                                  $result3ver899 = @OCIParse($ora_conexao, $result2xistevei899);
				                  @OCIExecute($result3ver899, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver899,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $diahoje=ociresult($result3ver899, "DIA") ;
                                  }
                                  
                                  $result2xistevei899 = "select to_char(sysdate,'mm') DIA from dual";
                                  $result3ver899 = @OCIParse($ora_conexao, $result2xistevei899);
				                  @OCIExecute($result3ver899, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver899,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $meshoje=ociresult($result3ver899, "DIA") ;
                                  }
                                  
                                  $result2xistevei899 = "select to_char(sysdate,'yyyy') DIA from dual";
                                  $result3ver899 = @OCIParse($ora_conexao, $result2xistevei899);
				                  @OCIExecute($result3ver899, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver899,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $anohoje=ociresult($result3ver899, "DIA") ;
                                  }
                                  




                                  

                                  if ($ano <$anohoje) {
                                   $parametrograva="S";
                                  }

                                  if ($ano ==$anohoje) {

                                       if ($mes <$meshoje){
                                         $parametrograva="S";
                                       }
                                       
                                       if ($mes ==$meshoje){
                                          if ($dia <=$diahoje){
                                          $parametrograva="S";
                                          }

                                       } //final mes igual

                                   }//teste ano igual



                                  $quantidade = str_replace(',', '.', $quantidade);
                                  

                                  $result2xistevei8 = "select count(*) CONTADOR  FROM CONSUMO_COMBUSTIVEL WHERE CD_VEICULO='$veiculo' and
                                  data_entrada='$datapesquisa1' and HORA_ENTRADA='$hora2' ";

                                  $result3ver8 = @OCIParse($ora_conexao, $result2xistevei8);
				                  @OCIExecute($result3ver8, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $contadorchaveprimaria=ociresult($result3ver8, "CONTADOR") ;
                                  }
                                  
                                  $ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));

                             //ECHO "</BR> CHAVE PRIMEARI:$contadorchaveprimaria//PARAMETRO GRAVA:$parametrograva//KM ENTRADA:$krodado//ULTIMO KM:$ultimokmleitura//HORA ENTRADA:$horimetro//ULTIMA HORA:$ultimohorimetroleitura//DIA:$dia//ULTIMO DIA:$ultimo_dia</BR>";

                             if (($krodado >=$ultimokmleitura) and ($horimetro>=$ultimohorimetroleitura) and ($dia <=$ultimo_dia)){


                                  if (($krodado >="0") and ($krodado >=$ultimokmleitura) and ($contadorchaveprimaria=="0")AND ($parametrograva=="S")){

                                  IF ($ultimokmleitura=="0"){
                                      $kmporlitro="0";
                                  }
                                  ELSE
                                  {
                                  $kmporlitro=($krodado-$ultimokmleitura)/$quantidade;
                                  }


                                   $achavalormat1= "select VALOR FROM MAT_PECAS  WHERE CD_MATERIAL='$combustivel'";
                                   $achavalormat2= @OCIParse($ora_conexao, $achavalormat1);
				                  @OCIExecute($achavalormat2, OCI_DEFAULT);
				                  while (OCIFetchInto($achavalormat2,&$row, OCI_ASSOC+OCI_RETURN_NULLS)){
                                  $custounitariocombustivel=ociresult($achavalormat2, "VALOR") ;
                                  $custounitariocombustivel= str_replace(",", ".",$custounitariocombustivel);
                                  }


                                  

                                  

                                  $custototal=$custounitariocombustivel*$quantidade;


                                  IF ($cadastro==NULL){
                                    echo "ERRO:Voce Deve escolher um Motorista";
                                  }
                                  ELSE
                                  {
                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO
                                  CONSUMO_COMBUSTIVEL (seq,CD_FUNCIONARIO,
                                  CD_VEICULO,
                                  CD_COMBUSTIVEL,
                                  HORA_SAIDA,
                                  DATA_ENTRADA,
                                  HORA_ENTRADA,
                                  QTDE_ABASTECIDA,
                                  OBS,
                                  HORIMETRO,
                                  KM,
                                  KM_LITRO,
                                  VL_UNITARIO,
                                  VL_TOTAL,cd_centro_custo,vl_ultima_leitura_km,vl_ultima_leitura_hora) VALUES
                                  ('$maxima2','$cadastro','$veiculo','$combustivel','$hora','$datapesquisa1','$hora2',$quantidade,'$recomendacao',
                                  '$horimetro','$krodado',$kmporlitro,$custounitariocombustivel,$custototal,'$destinoestoque','$ultimokmleitura','$ultimohorimetroleitura')");

                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  ?>
                                  <font style='font-size: 15px;color: RED;text-align:left;bold: Negrito' >
                                  <? echo "Final da Gravação";
                                  }




                                  }//quando tem km rodado
                                  else
                                  {
                                  


                                     if ($krodado <$ultimokmleitura){
                                     ?>
                                     <font style='font-size: 15px;color: RED;text-align:left;bold: Negrito' >
                                     <?
                                      echo "Lançamento do Km Abaixo da última Leitura ";
                                     }
                                     else
                                     {
                                      ?>
                                     <font style='font-size: 15px;color: RED;text-align:left;bold: Negrito' >
                                     <?
                                      echo "Defina km Rodado para Gravação  ou ja existe Registro com data e hora de Abastecimento";

                                     }
                                     




                                  }
                                }
                                else
                                {
                                  ?>
                                     <font style='font-size: 15px;color: RED;text-align:left;bold: Negrito' >
                                     <?
                                      echo "leitura do Horometro ou Horimetro esta baixo da Última Leitura ou Dia do Mes Incorreto";


                                }//final quan o testou km e hora
                                  
//mostra oque esta gravado
?>

<div style="overflow: auto; auto; height: 457px;">
   <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="99%">
   <tr >
  <th>Destino</th>
  <th>Funcionário</th>
  <th>Veiculo</th>
  <th>Data</th>
  <th>Horimetro</th>
  <th>Diferença</th>
  <th>Km Atual</th>
  <th>Diferença</th>
  <th>Combustivel</th>
  <th>Consumo</th>
  <th>Km/Litro</th>
  <th>Litro/Hora</th>
  <th>Custo Unitário</br>(R$/Unid)</th>
  <th>Custo Total(R$)</th>




  </tr>
  <?

  $sm= OCIParse($ora_conexao, "select a.CD_FUNCIONARIO,a.CD_VEICULO VEICULO,a.CD_COMBUSTIVEL COMBU,a.HORA_SAIDA HORA_SAIDA,
  to_char(a.DATA_ENTRADA,'DD/MM/YYYY') DATA,a.HORA_ENTRADA HORA_ENTRADA,a.cd_centro_custo DESTINO,
                                  a.QTDE_ABASTECIDA QUANT,a.KM,c.NOME MOTORISTA,a.horimetro HORIMETRO,a.km KM,
                                  a.vl_ultima_leitura_km ULTIMALEITURAKM,a.km_litro KMLITRO ,a.VL_UNITARIO UNI,
                                  a.VL_TOTAL TOTAL,a.vl_ultima_leitura_hora ULTIMALEITURAHORA
                                   FROM CONSUMO_COMBUSTIVEL a,
                                  FUNCIONARIO_SADEGE c
                                  where a.CD_FUNCIONARIO=c.CADASTRO and
                                  a.cd_veiculo='$veiculo'
                                  ORDER  by a.DATA_ENTRADA desc");
        OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $motorista=ociresult($sm, "MOTORISTA") ;
          $codigovei=ociresult($sm, "VEICULO") ;
          $dataentada4=ociresult($sm, "DATA") ;
          $horas2=ociresult($sm, "HORA_SAIDA") ;
          $horae2=ociresult($sm, "HORA_ENTRADA") ;
          $quantcombu=ociresult($sm, "QUANT") ;
          $horimetromostra=ociresult($sm, "HORIMETRO") ;
          $kmmostra=ociresult($sm, "KM") ;
          $codigocombu=ociresult($sm, "COMBU") ;

          $kmmostra=ociresult($sm, "KM") ;
          $destinomostra=ociresult($sm, "DESTINO") ;
          $ultimokmleitura=ociresult($sm, "ULTIMALEITURAKM") ;
          $ultimoleiturahora=ociresult($sm, "ULTIMALEITURAHORA") ;
          $kmlitromostra=ociresult($sm, "KMLITRO") ;
          $valorunitario=ociresult($sm, "UNI") ;
          $valortotal=ociresult($sm, "TOTAL") ;

          if ($ultimokmleitura=="0"){
              $kmpercorrido="0";


           }
           else
           {
            $kmpercorrido=$kmmostra-$ultimokmleitura;
           }



           if ($ultimoleiturahora=="0"){
              $diferencahora="0";


           }
           else
           {
            $diferencahora=$horimetromostra-$ultimoleiturahora;
           }

           if ($diferencahora >"0"){
           $litrohora=$quantcombu/$diferencahora;
           }
           else
           {
           $litrohora="0";
           }


   ?>
   <tr>
   <td><?echo $destinomostra;?> </td>
   <td><?echo $motorista;?></td>
   <td><?echo $codigovei;?> </td>
   <td><?echo $dataentada4;?> - <?echo $horas2;?> - <?echo $horae2;?>  </td>
   <td><?echo $horimetromostra;?> </td>
   <td><?echo $diferencahora;?> </td>

   <td><?echo $kmmostra;?> </td>
   <td><?echo $kmpercorrido;?> </td>

   <td><?echo $codigocombu;?> </td>

   <td><?echo $quantcombu;?> </td>
   <td><?echo $kmlitromostra;?> </td>
   <td><?echo $litrohora;?> </td>
   <td><?echo $valorunitario;?> </td>
   <td><?echo $valortotal;?> </td>




   </tr>

   <?


}
?>
</TABLE>
</div>
<?



}//final da gravacao

if ($escolha=="ELIMINAASSOCIACAO"){


?>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Destino</th>
  <th>Veiculo</th>
  <th>Data</th>
  <th>Seleção</th>
  <th>Horimetro</th>
  <th>Km</th>

</tr>


<?

 $sachaveiclo1= OCIParse($ora_conexao, "SELECT distinct CD_VEICULO from
 CONSUMO_COMBUSTIVEL where cd_veiculo like '%$veiculo%'
 order by  CD_VEICULO asc");

 
 OCIExecute($sachaveiclo1, OCI_DEFAULT);
 While (OCIFetch($sachaveiclo1)){

 $veiculoteste=ociresult($sachaveiclo1, "CD_VEICULO") ;
 
              $s= OCIParse($ora_conexao, "SELECT a.seq SEQUENCIA,a.CD_VEICULO VEICULO,
              to_char(a.DATA_ENTRADA,'DD/MM/YYYY') DATA,
              a.cd_centro_custo DESTINO,HORA_SAIDA HORA1,HORA_ENTRADA HORA2,a.horimetro HORIMETRO,
              a.km KM
              FROM
              CONSUMO_COMBUSTIVEL a  where
              a.CD_VEICULO='$veiculoteste' and
              a.seq in (select MAX(seq) FROM
              CONSUMO_COMBUSTIVEL   where
              CD_VEICULO='$veiculoteste')
              ");

              
              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigovei=ociresult($s, "VEICULO") ;
          $dataentada4=ociresult($s, "DATA") ;
          $destinomostra=ociresult($s,"DESTINO") ;
          $sequenciamostra5=ociresult($s, "SEQUENCIA") ;
          $hoar1S=ociresult($s, "HORA1") ;
          $hoar1E=ociresult($s, "HORA2") ;
          $horametro88E=ociresult($s, "HORIMETRO") ;
          $km88E=ociresult($s, "KM") ;


   ?>
   <tr>
   <td><?echo $destinomostra;?> </td>
   <td><?echo $codigovei;?> </td>
   <td><?echo $dataentada4;?> - <?echo $hoar1S;?> - <?echo $hoar1E;?> </td>
   <td><?echo $horametro88E;?> </td>
   <td><?echo $km88E;?> </td>
   
   
   <td><input type="checkbox" name="lista[]" value="<?echo $sequenciamostra5;?>"></td>

   </tr>
 <?}
 }
 ?>

</table>



<input type="hidden" name="escolha" size="5" value="CONFIRMAELIMINA" >

<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="valorcalculo" value="<?echo $valorcalculo;?>">
		<input type="hidden" name="localbanco" value="<?ECHO $localbanco;?>">
		<input type="hidden" name="veiculo" value="<?ECHO $veiculo;?>">


<input type="submit"    value="Confirma">


<?

}


if ($escolha=="CONFIRMAELIMINA")
{
$lista=$_POST['lista'];

         $result2xistevei89 = "select count(*) CONTADOR  FROM CONSUMO_COMBUSTIVEL where CD_VEICULO='$veiculo'  ";

                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }




 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$lista[$passa];
        //ho "sequencia:$acao</br>";


             if ($acao >"0"){
             
             $sgrava1= OCIParse($ora_conexao, "delete from   CONSUMO_COMBUSTIVEL   WHERE SEQ='$acao'");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);

             }

}//final do loop
?><center><? ECHO "Ação Eliminada";
}//FIANL DA TELA


?>

</body>
</div>
</form>
</html>


