<html>
<head>
<title> Utilização de Abas - Javascript </title>
<style>

body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
         background-color: white;

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

<form  method="POST">


<?

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
$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$contador=$_GET['contador'];
$cadastropesquisa=$_GET['cadastropesquisa'];
$combustivelpesquisa=$_GET['combustivelpesquisa'];
$localbanco=$_GET['localbanco'];
$veiculocodigoe=$_GET['veiculocodigoe'];
$acao=$_GET['acao'];




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
            $data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$contador=$_POST['contador'];
$cadastropesquisa=$_POST['cadastropesquisa'];
$combustivelpesquisa=$_POST['combustivelpesquisa'];
$veiculocodigoe=$_POST['veiculocodigoe'];
$year=$_POST['year'];

}



if (!IsSet($month)){
$month=date('m');
}
if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($turno)){
$turno="1";
}
if (!IsSet($diasemana)){
$diasemana=date('d');
}
if (!IsSet($contador)){
$contador="1";
}
if (!IsSet($mudoumes)){
$mudoumes="nao";
}

//if (!IsSet($year)){
//$year=date('Y');
//}

//echo "Local banco:$localbanco";

//if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($mesescolha)){$mesescolha=date('m');}

$mes=$mesescolha;
//$ano=$anoescolha;

require("configuraoracle.php");
require("configuramysql.php");
require("estilo2.css");


$elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA_CUSTO_ANO");
OCIExecute($elimina1, OCI_DEFAULT);
oci_commit($ora_conexao);

$elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA_CUSTO_ANO_PART");
OCIExecute($elimina1, OCI_DEFAULT);
oci_commit($ora_conexao);




if (!IsSet($fabricapesquisa)){
//acha uni  dae de lotacao

    $achaunidade= "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO IN (SELECT CD_PESSOA FROM USUARIO_GRUPO_BI  WHERE CD_USUARIO='$codigousuario')";
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

//if (!IsSet($ano)){
//$ano=date('Y');
//}

if (!IsSet($mes)){
$mes=date('m');
}



?>
<CENTER>
 </br>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Consulta Custo Padrão Mês </font>
<hr>

<table>

<tr>


<td>

<table>

<tr>
<td>Unidade</td><td><select name="fabricapesquisa">
                 <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <option value="">Todas</option>
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


<?
if (!IsSet($ano))
{

$acha21116="select ds_ano ANO from PARAMETRO_BI  ";
               $res = mysql_db_query($banco,$acha21116,$conexao);
               $valor8=mysql_fetch_array($res);
               $yearacha=$valor8["ANO"];
               $ano=$yearacha;
               $year=$yearacha;
}
else
{

$year=$ano;
$yearacha=$ano;
}

?>

<tr>
<input type="hidden" name="year" value="<?echo $year;?>">
<td>Ano</td><td><input type="txt" name="ano" value="<?echo $yearacha;?>"></td>
</tr>
</table>


  	    <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">

		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">

		<input type="hidden" name="month" value="<?echo $month;?>">



  <input  type="submit"   VALUE="Buscar">

</td>
</tr>
</table>

<?






$sqachames= "SELECT  CD_MES MES,QT_DIAS DIA from meses_bi order by cd_mes asc";
$sqachames2= mysql_db_query($banco,$sqachames,$conexao);
while ($sqachames3=mysql_fetch_array($sqachames2)){
              	  $mesamostra=$sqachames3["MES"];
              	  $ultimodia=$sqachames3["DIA"];

$datapesquisainicial="01/".$mesamostra."/".$ano;
$datapesquisafinal=$ultimodia."/".$mesamostra."/".$ano;

  //grava a auxiliar

  $sm= OCIParse($ora_conexao, "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO,d.cd_maquina MAQUINA
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cd_material=b.cd_material AND
  b.flag='M' and
  a.cd_componente=c.cd_componente and
  a.cd_componente=d.cd_compo and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente,d.cd_maquina ORDER BY VALOR DESC
  ");





  OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $valorcusto=ociresult($sm, "VALOR") ;
          $codigoequipamento=ociresult($sm, "CODIGOEQUIPAMENTO") ;
          $codigomaquina=ociresult($sm, "MAQUINA") ;

          $valorcusto= str_replace(",", ".","$valorcusto" );






                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA_CUSTO_ANO(CD_COMPONENTE,VL_CUSTO_MATERIAL,CD_MES,
                           VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina) VALUES(
                          '$codigoequipamento',$valorcusto,'$mesamostra','0','0','0','$codigomaquina')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);




  }


  $sm= OCIParse($ora_conexao, "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente ORDER BY VALOR DESC
  ");
  

  OCIExecute($sm, OCI_DEFAULT);
        While (OCIFetch($sm)) {

          $valorcustopeca=ociresult($sm, "VALOR") ;
          $codigoequipamento=ociresult($sm, "CODIGOEQUIPAMENTO") ;

          $valorcustopeca= str_replace(",", ".","$valorcustopeca" );




          $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO_ANO SET VL_CUSTO_PECAS=$valorcustopeca
          WHERE
          CD_COMPONENTE='$codigoequipamento' AND CD_MES='$mesamostra'");

                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           



  }
  


  
  
  $achazero1= OCIParse($ora_conexao, "select CD_COMPONENTE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from
  AUX_CONSULTA_CUSTO_ANO WHERE CD_MES='$mesamostra'  ");
  OCIExecute($achazero1, OCI_DEFAULT);
  While (OCIFetch($achazero1))
  {
   $componente4=ociresult($achazero1, "CD_COMPONENTE") ;
   $custo14=ociresult($achazero1, "VL_CUSTO_MATERIAL") ;
   $custo15=ociresult($achazero1, "VL_CUSTO_PECAS") ;
   $custo14= str_replace(",", ".","$custo14" );
   $custo15= str_replace(",", ".","$custo15" );


   $custototal16=$custo14+$custo15;




   $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO_ANO SET VL_CUSTO_TOTAL=$custototal16 WHERE
          CD_COMPONENTE='$componente4' AND CD_MES='$mesamostra'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }
  
  }//TERINA ANALISAR MES
  
//TRENINA GARVA O TOTAL POR MES


                         $quantoss17mat= OCIParse($ora_conexao, "select TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999')
                         VALOR
                         from AUX_CONSULTA_CUSTO_ANO");
                         OCIExecute($quantoss17mat, OCI_DEFAULT);
                         While (OCIFetch($quantoss17mat)) {

                           $custototal7=ociresult($quantoss17mat, "VALOR") ;


                         }


  

   

  $gravapart= OCIParse($ora_conexao, "select CD_MAQUINA,SUM(VL_CUSTO_TOTAL) VALOR from AUX_CONSULTA_CUSTO_ANO GROUP BY CD_MAQUINA
   ");
  OCIExecute($gravapart, OCI_DEFAULT);
  While (OCIFetch($gravapart))
  {
          $valorcusto44=ociresult($gravapart, "VALOR") ;
          $codigoequipamento=ociresult($gravapart, "CD_MAQUINA") ;

         $participacao=($valorcusto44/$custototal7)*100;
         

                          $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA_CUSTO_ANO_PART(CD_MAQUINA,
                           VL_PARTICIPACAO) VALUES(
                          '$codigoequipamento',$participacao)");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);




  }
  

  











  ?>
  <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
   mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">
   <tr>


  <th style='font-size: 11px;color: white;text-align:left;bold: Negrito'>Equipamento</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Jan</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Fev</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Mar</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Abr</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Mai</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Jun</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Jul</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Ago</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Set</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Out</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Nov</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Dez</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Total(R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>
  <a href="consultamaterias_cheklistano.php?codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&itemselecionado=<?echo $codigo;?>&acao=mostragraficotoparticipacao&fabricapesquisa=<?echo $fabricapesquisa;?>&ano=<?echo $ano;?>"><font style='font-size: 12px;color: white;text-align:right;bold: Negrito' >%</a>
</th>






  </tr>
  <?



  $smpegaaux= OCIParse($ora_conexao, "select  CD_MAQUINA,TO_CHAR(VL_PARTICIPACAO,'999990.99') PART from AUX_CONSULTA_CUSTO_ANO_PART
  ORDER BY VL_PARTICIPACAO DESC");

  OCIExecute($smpegaaux, OCI_DEFAULT);
        While (OCIFetch($smpegaaux)) {

        $equipamento9=ociresult($smpegaaux, "CD_MAQUINA") ;
        $valorpart=ociresult($smpegaaux, "PART") ;



   ?>
   <tr>

    <td style='font-size: 11px;color: black;text-align:left;bold: Negrito'><a href="consultamaterias_cheklistano.php?codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&itemselecionado=<?echo $codigo;?>&acao=mostragrafico&fabricapesquisa=<?echo $fabricapesquisa;?>&maquinapassa=<?echo $equipamento9;?>&ano=<?echo $ano;?>"><? echo $equipamento9;?></a>
 </td>

   <?
   $sqachames66= "SELECT  CD_MES MES from meses_bi order by cd_mes asc";
   $sqachames266= mysql_db_query($banco,$sqachames66,$conexao);
   While ($sqachames366=mysql_fetch_array($sqachames266)){
          $mesamostra7=$sqachames366["MES"];
          ?>
          <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'>
          <?
          $smpegaaux8= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO
          WHERE CD_MES='$mesamostra7' AND CD_MAQUINA='$equipamento9' ");
          OCIExecute($smpegaaux8, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8)) {

            $valorcustototal=ociresult($smpegaaux8, "CUSTO3") ;
            $valorcustototalmostra=number_format($valorcustototal, 0, ',', '.');
            echo $valorcustototalmostra;
          }

          ?></td>


   <?}?>


          <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'>
          <?
          $smpegaaux8= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO
          WHERE  CD_MAQUINA='$equipamento9' ");
          OCIExecute($smpegaaux8, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8)) {

            $valorcustototal=ociresult($smpegaaux8, "CUSTO3") ;
            $valorcustototalmostra=number_format($valorcustototal, 0, ',', '.');
            echo $valorcustototalmostra;
          }

          ?></td>
          
          <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><?
          $valorpart=number_format($valorpart, 2, ',', '.');
          echo $valorpart;?></td>

</tr>


</tr>
<?}//FINAL DO EQUIPAMENTO
?>


<tr bgcolor="green">

<td>
<a href="consultamaterias_cheklistano.php?codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&itemselecionado=<?echo $codigo;?>&acao=mostragraficototal&fabricapesquisa=<?echo $fabricapesquisa;?>&ano=<?echo $ano;?>"><font style='font-size: 12px;color: white;text-align:right;bold: Negrito' >Totais</a>
</td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='01'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='02'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='03'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='04'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='05'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='06'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='07'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='08'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='09'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='10'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='11'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>
<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO where cd_mes='12'");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?></td>




<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'>
<?

$smpegaaux8total= OCIParse($ora_conexao, "select  TO_CHAR(SUM(VL_CUSTO_TOTAL),'99999999990.999') CUSTO3
          from AUX_CONSULTA_CUSTO_ANO");
          OCIExecute($smpegaaux8total, OCI_DEFAULT);
          While (OCIFetch($smpegaaux8total)) {

            $valorcustototal6=ociresult($smpegaaux8total, "CUSTO3") ;
            $valorcustototalmostra6=number_format($valorcustototal6, 0, ',', '.');
          }
echo $valorcustototalmostra6;?>
</td>
<td></td>






</TABLE>

<?
if ($acao=="mostragrafico"){
?>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Custo Padrão Total por Mês </font>
<?echo "Equipamento:$maquinapassa";
?>
</br>
<center><img  src="detalhegraficolinhacustoano.php?banco=<?echo $banco;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&maquinapassa=<?echo $maquinapassa;?>">
<?
}

if ($acao=="mostragraficototal"){
?>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Custo Padrão Total Ano </font>

</br>
<center><img  src="detalhegraficolinhacustoanototal.php?banco=<?echo $banco;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&maquinapassa=<?echo $maquinapassa;?>">
<?
}
if ($acao=="mostragraficotoparticipacao"){
?>
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Custo Padrão Total Por participação </font>

</br>
<center><img  src="detalhegraficoanopizza.php?banco=<?echo $banco;?>&baseoracle=<?echo $baseoracle;?>&localbanco=<?echo $localbanco;?>&maquinapassa=<?echo $maquinapassa;?>">
<?
}



?>



</body>

</form>
</html>


