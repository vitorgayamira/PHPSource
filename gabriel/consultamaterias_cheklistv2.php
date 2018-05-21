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


$elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA_CUSTO");
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
<font style='font-size: 22px;color: RED;text-align:left;bold: Negrito' >Consulta Custo Padrão </font>
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


<?




if ($mudoumes=="sim"){

              $data2=$dia;
              $valorescolha="1";
              $valorcontador="2";

}
else
{
 if ($escolha=="1"){

            if ($contador=="1"){
              $data1=$dia;
              $valorescolha="1";
              $valorcontador="2";
            }

            if ($contador=="2"){
              $data2=$dia;
              $valorescolha="1";

            }

            if ($contador > "2"){
              $valorescolha="0";

            }


        }
        else
        {
           $valorcontador="1";
           $valorescolha="1";

        }

		$dataaux="0";
}



if (!IsSet($data1)){
$data1="1";
}

//echo "escolha:$escolha//valor escolha:$valorescolha//data1:$data1//data2:$data2//contador:$contador//mes:$month//ano:$ano//DIA ESCOLHIDO:$dia//mudou mes:$mudoumes//dia anterior:$dataanterior//me anterior:$mesanterior";

if ($dataanterior >"0"){
$primeirodia=$dataanterior;
$mesachou1=$mesanterior;
}
else
{
   if ($data1 >"0"){
   $primeirodia=$data1;
   }
   else
   {
   $primeirodia="1";
   $data1="1";
   }
$mesachou1=$month;
}

   if ($data2 >"0"){
    $ultimodia=$data2;
   }
   else
   {
     $ultimodia= date("t", mktime(0,0,0,$month,'01',$ano));
    $data2=$ultimodia;
   }
   $mesachou2=$month;


  $datapesquisainicial=$primeirodia."/".$mesachou1."/".$ano;
 $datapesquisafinal=$ultimodia."/".$mesachou2."/".$ano;

 ?>
 <center>
 </br></br></br>

<?


echo "Intervalo:".$datapesquisainicial." Até ".$datapesquisafinal; ?>

<a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&ano=<?ECHO "$ano";?>&localbanco=<?ECHO "$localbanco";?>&veiculo=<?ECHO "$veiculo";?>">Limpar Datas</a>

</td>

<?
 if (!IsSet($escolha) or ($escolha=="1")){


        if (isset($show_month)) {
        if ($show_month==">") {
          if($month==12) {
             $month=1;
             $year++;
             } else {
             $month++;
             }
             }
        if ($show_month=="<") {
          if($month==1) {
             $month=12;
             $year--;
             } else {
             $month--;
             }
             }
        }
        if (isset($day)) {
        if ($day<="9"&ereg("(^[1-9]{1})",$day)) {
          $day="0".$day;
          }
        }
        if (isset($month)) {
        if ($month<="9"&ereg("(^[1-9]{1})",$month)) {
          $month="0".$month;
          }
        }
        if (!isset($year)) {

               $acha21116="select ds_ano ANO from PARAMETRO_BI  ";
               $res = mysql_db_query($banco,$acha21116,$conexao);
               $valor8=mysql_fetch_array($res);
               $year=$valor8["ANO"];


		  //$year=date("Y",mktime());
          }
        if (!isset($month)) {
          $month=date("m",mktime());

		  }
        if (!isset($day)) {
          $day=date("d",mktime());
          }
        $thisday="$year-$month-$day";


        $day_name=array(Seg,Ter,Qua,Qui,Sex,Sáb,"<font color=\"#FF0000\">Dom</font>");
        $cp = "By";
        $month_abbr=array("",Janeiro,Fevereiro,Março,Abril,Maio,Junho,Julio,Agosto,Setembro,Outubro,Novembro,Dezembro);

        $y=date("Y");
           switch ($month) {
            case 1:  $month_name = Janeiro;	break;
            case 2:  $month_name = Fevereiro;	break;
            case 3:  $month_name = Março;	break;
            case 4:  $month_name = Abril;	break;
            case 5:  $month_name = Maio;	break;
            case 6:  $month_name = Junho;	break;
            case 7:  $month_name = Julho;	break;
            case 8:  $month_name = Agosto;	break;
            case 9:  $month_name = Setembro;break;
            case 10: $month_name = Outubro;	break;
            case 11: $month_name = Novembro;break;
            case 12: $month_name = Dezembro;break;
           }
           $cp .= " W";
        ?>

<td>
        <center><table border="0" width="70" align="center" style="border-width:1px">
        <tr>
        <td  style="border-width:1px">
        <table width="70" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="silver">
        <tr bgcolor="#f5f5f5">
            <td colspan="7" align="left"><font size="2" face="verdana">


            <b><? echo "$month_name $year"; ?></b></font>
             </br>


             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=1&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>">Jan</a>
             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=2&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Fev</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=3&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Mar</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=4&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Abr</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=5&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Mai</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=6&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Jun</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=7&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Jul</a>


             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=8&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Ago</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=9&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Set</a>

              <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=10&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Out</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=11&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Nov</a>

             <a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=12&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>">Dez</a>
             <hr><a href="consultamaterias_cheklist.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&ano=<?ECHO "$ano";?>&month=1&mudoumes=sim&dataanterior=<?ECHO "$data1";?>&mesanterior=<?ECHO $month;?>&localbanco=<?ECHO $localbanco;?>">Pular Mês</a>

            </td>
         </tr>
         <tr  align="center">
          <?
          $cp .= "ender";
          for ($i=0;$i<7;$i++) { ?>
          <td width="25" align="center" bgColor="ffffff"><? echo "$day_name[$i]"; ?></td>


          <? } ?>
         </tr>
         <tr  align="center">
          <?
          $cp .= " F";
          if (date("w",mktime(0,0,0,$month,1,$year))==0) {
            $start=7;
          } else {
            $start=date ("w",mktime(0,0,0,$month,1,$year));
            }
          for($a=($start-2);$a>=0;$a--)
             {
              $d=date("t",mktime(0,0,0,$month,0,$year))-$a;
          ?>
          <td bgcolor="#ffffff" align="center"><font color="#ffffff"><?=$d?></font></td>
          <? }
          for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++)
                {
            if($month==date("m")&$year==date("Y")&$d==date("d")) {
              $bg="bgcolor=\"#B0E2FF\"";
        	} else {
              $bg="bgcolor=\"#F5DEB3\"";
              }
          ?>
        <?
        $evento = "$d";
        $month_name = str_replace('ç','c',$month_name);
        $evento.= "$month_name$year.php";
        ?>
        <?
        if (file_exists("eventos/$evento"))
        {
        ?>
        <td bgcolor="#00FF7F" align="center" onClick=javaScript:window.open('<? echo "eventos/$evento" ?>','','scrollbars=yes,width=700,height=350,top=100,left=80');history.go(9) style="cursor:hand"><?=$d?></a></td>
        <?
        }

        else
        {



         if ($contador=="2"){

        ?>
          <td <?=$bg?> align="center"><font color=#0000CD><?=$d?></a></td>
        <?
         }


         if ($contador=="1"){
               if ($mudoumes=="sim"){

               $programa="consultamaterias_cheklist.php";
           $numeroregistropagina="1";
           $programa2="?";
           $programa3="programapai=";
           $programa9="DIRAentradasistema.php";
           $programa10="&dia=";
           $programa11="&escolha=";
           $programa12="&contador=";
           $programa13="&data1=";
           $programa14="&data2=";
           $programa15="&month=";
           $programa16="&year=";
           $programa17="&banco=";
           $programa18="&navegando=sim";
           $programa19="&codigousuario=";
           $programa20="&fabricapesquisa=";
           $programa21="&veiculo=";
           $programa22="&destino=";
           $programa23="&dataanterior=";
           $programa24="&mesanterior=";
           $programa25="&localbanco=";
           $programa26="&veiculo=";
           $programa27="&ano=";




            $programa=$programa.$programa2.$programa3.$programa.$programa10.$d.$programa11.$valorescolha.$programa12.$valorcontador.$programa13.$data1.$programa14.$data2.$programa15.$month.$programa16.$year.$programa17.$banco.$programa18.$programa19.$codigousuario.$programa20.$fabricapesquisa.$programa21.$veiculo.$programa22.$destino.$programa23.$dataanterior.$programa24.$mesanterior.$programa25.$localbanco.$programa26.$veiculo.$programa27.$ano;

           ?>
          <td <?=$bg?> align="center"><font color=#0000CD><a href="<?echo $programa;?>"><?=$d?></a></td>
               <?
               }
               else
               {


           $programa="consultamaterias_cheklist.php";
           $numeroregistropagina="1";
           $programa2="?";
           $programa3="programapai=";
           $programa9="DIRAentradasistema.php";
           $programa10="&dia=";
           $programa11="&escolha=";
           $programa12="&contador=";
           $programa13="&data1=";
           $programa14="&data2=";
           $programa15="&month=";
           $programa16="&year=";
           $programa17="&banco=";
           $programa18="&navegando=sim";
           $programa19="&codigousuario=";
           $programa20="&fabricapesquisa=";
           $programa21="&veiculo=";
           $programa22="&destino=";
           $programa23="&dataanterior=";
           $programa24="&mesanterior=";
           $programa25="&localbanco=";
           $programa26="&veiculo=";
           $programa27="&ano=";

            $programa=$programa.$programa2.$programa3.$programa.$programa10.$d.$programa11.$valorescolha.$programa12.$valorcontador.$programa13.$data1.$programa14.$data2.$programa15.$month.$programa16.$year.$programa17.$banco.$programa18.$programa19.$codigousuario.$programa20.$fabricapesquisa.$programa21.$veiculo.$programa22.$destino.$programa23.$dataanterior.$programa24.$mesanterior.$programa25.$localbanco.$programa26.$veiculo.$programa27.$ano;
      	 ?>
          <td <?=$bg?> align="center"><font color=#0000CD><a href="<?echo $programa;?>"><?=$d?></a></td>
         <?
         }


       }






          } ?>

          <?
          if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
          {
          ?>
         </tr>
         <tr align="center">
          <?
          }
          }

          $cp .= "ernandes";
          $da=$d+1;
              if(date("w",mktime(0,0,0,$month+1,1,$year))<>1)
              {
                  $d=1;
                  while(date("w",mktime(0,0,0,($month+1),$d,$year))<>1)
                  {
                      ?>
                      <td bgcolor="#ffffff" align="center" title="<? echo $cp; ?>" ><font color="#ffffff"><?=$d?></font></td>
                      <?
                      $d++;
                  }
                }

              ?>
          </tr>

          </table>

          </table>

 </td>

 <td>



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

//echo "Data Selecionada:".$datapesquisainicial." Até ".$datapesquisafinal;



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






          $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA_CUSTO(CD_COMPONENTE,VL_CUSTO_MATERIAL,
          VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina) VALUES(
                           '$codigoequipamento',$valorcusto,'0','0','0','$codigomaquina')");
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




          $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_PECAS=$valorcustopeca
          WHERE
          CD_COMPONENTE='$codigoequipamento'");

                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           



  }
  
  
  
  $achazero1= OCIParse($ora_conexao, "select CD_COMPONENTE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from
  AUX_CONSULTA_CUSTO  ");
  OCIExecute($achazero1, OCI_DEFAULT);
  While (OCIFetch($achazero1))
  {
   $componente4=ociresult($achazero1, "CD_COMPONENTE") ;
   $custo14=ociresult($achazero1, "VL_CUSTO_MATERIAL") ;
   $custo15=ociresult($achazero1, "VL_CUSTO_PECAS") ;
   $custo14= str_replace(",", ".","$custo14" );
   $custo15= str_replace(",", ".","$custo15" );


   $custototal16=$custo14+$custo15;




   $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_CUSTO_TOTAL=$custototal16 WHERE
          CD_COMPONENTE='$componente4'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }
  
  
  
                         $quantoss17mat= OCIParse($ora_conexao, "select TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')
                         VALOR, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999') VALOR2,
                         TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') VALOR3
                         from AUX_CONSULTA_CUSTO");
                         

                         
                         OCIExecute($quantoss17mat, OCI_DEFAULT);
                         While (OCIFetch($quantoss17mat)) {

                           $custototal7=ociresult($quantoss17mat, "VALOR") ;
                           $custototal7MAT=ociresult($quantoss17mat, "VALOR2") ;
                           $custototal7PECA=ociresult($quantoss17mat, "VALOR3") ;

                         }
  

   

  $gravapart= OCIParse($ora_conexao, "select CD_COMPONENTE,VL_CUSTO_TOTAL from AUX_CONSULTA_CUSTO ");
  OCIExecute($gravapart, OCI_DEFAULT);
  While (OCIFetch($gravapart))
  {
          $valorcusto44=ociresult($gravapart, "VL_CUSTO_TOTAL") ;
          $codigoequipamento=ociresult($gravapart, "CD_COMPONENTE") ;

         $participacao=($valorcusto44/$custototal7)*100;

                           $sgrava1= OCIParse($ora_conexao, "UPDATE AUX_CONSULTA_CUSTO SET VL_PARTICIPACAO=$participacao
                           WHERE  CD_COMPONENTE='$codigoequipamento'");
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
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Materiais (R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Peças (R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Custo Total(R$)</th>
  <th style='font-size: 11px;color: white;text-align:right;bold: Negrito'>Participação(%)</th>





  </tr>
  <?



  $smpegaaux= OCIParse($ora_conexao, "select CD_MAQUINA, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999')
  CUSTO, TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') CUSTO2, TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999') CUSTO3,
         TO_CHAR(SUM(VL_PARTICIPACAO),'999990.999')  PART from AUX_CONSULTA_CUSTO GROUP BY CD_MAQUINA
          order by PART desc");

  OCIExecute($smpegaaux, OCI_DEFAULT);
        While (OCIFetch($smpegaaux)) {

        $equipamento9=ociresult($smpegaaux, "CD_MAQUINA") ;
        $valorcustomat=ociresult($smpegaaux, "CUSTO") ;
        $valorcustopeca=ociresult($smpegaaux, "CUSTO2") ;
        $valorcustototal=ociresult($smpegaaux, "CUSTO3") ;
        $valorpart=ociresult($smpegaaux, "PART") ;



   ?>
   <tr>

   <td><?echo $equipamento9;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><? $valorcustomatmostra=number_format($valorcustomat, 2, ',', '.');

   echo $valorcustomatmostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><? $valorcustopecamostra=number_format($valorcustopeca, 2, ',', '.');

   echo $valorcustopecamostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><?  $valorcustototalmostra=number_format($valorcustototal, 2, ',', '.');

   echo $valorcustototalmostra;?></td>
   <td style='font-size: 11px;color: black;text-align:right;bold: Negrito'><?
    $valorpart=number_format($valorpart, 2, ',', '.');
   echo $valorpart;?></td>



   <?}?>


</tr>
<tr bgcolor="green">

<td><font style='font-size: 12px;color: white;text-align:right;bold: Negrito' >Total</td>

<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'><?
$custototal7M5=number_format($custototal7MAT, 2, ',', '.');
echo $custototal7M5;?>
</td>

<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'>
<?
$custototal7P5=number_format($custototal7PECA, 2, ',', '.');
echo $custototal7P5;?>
</td>


<td style='font-size: 12px;color: white;text-align:right;bold: Negrito'>
<?
$custototal7= str_replace(",", ".","$custototal7" );

$custototal7=number_format($custototal7, 2, ',', '.');
echo $custototal7;?>
</td>
<td></td>
</tr>


</TABLE>



  <?

}//final quando contador=1 ou 2

?>



</body>

</form>
</html>


