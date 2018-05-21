<HEAD>

<style  type="text/css">
#envolve { width: 100%}
 #div_1 { position: relative; width: 30%; height: 100%; background-color: #FFFFFF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 70%; height: 100%; background-color: #FFFFFF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }






 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
         background-color: white;

}



</style>

<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="painelcorretivamaoobraversao4.php";
document.forms.nome_formulario.submit();
}
</script>



</HEAD>

<form action="CONSULTAplanomessemana.php"  name="nome_formulario" id="nome_formulario" method="POST" >



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
$localbanco=$_GET['localbanco'];
$pagina=$_GET['pagina'];
$grupoordens=$_GET['grupoordens'];
$fabricaescolha=$_GET['fabricaescolha'];
$escolhemes=$_GET['escolhemes'];
$equipamentoescolha=$_GET['equipamentoescolha'];
$atividadegrava=$_GET['atividadegrava'];
$ultimodia=$_GET['ultimodia'];
$primeirodia=$_GET['primeirodia'];
$semanapegou=$_GET['semanapegou'];
$semanapegoumostrar=$_GET['semanapegoumostrar'];
$compo1=$_GET['compo1'];
$componente=$_GET['componente'];




}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$turnopesquisa=$_POST['turnopesquisa'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$tipodemanda1=$_POST['tipodemanda1'];
	$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
	$mercado55=$_POST['mercado55'];
	$tipodemanda1=$_POST['tipodemanda1'];
	$fabricaescolha=$_POST['fabricaescolha'];
	$grupoordens=$_POST['grupoordens'];
  $fabricapesquisa=$_POST['fabricapesquisa'];
		$equipamentoescolha=$_POST['equipamentoescolha'];
		$semanapegou=$_POST['semanapegou'];
		$mudoumesano=$_POST['mudoumesano'];
		$semanapegoumostrar=$_POST['semanapegoumostrar'];


}
$programa="CONSULTAplanomessemana.php";


require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");


if (!IsSet($ano)){
$ano=date('Y');
}


if (!IsSet($mes)){
$mes=date('m');
}
ELSE
{
   IF ($escolhemes=="anterior"){
     $mes=$mes-1;
   }

   IF ($escolhemes=="posterior"){
     $mes=$mes+1;
   }



}




if (!IsSet($grupoordens)){
$grupoordens="P";
}

if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}






if (!IsSet($anoescolha)){$anoescolha=date('Y');}
if (!IsSet($ano)){$ano=date('Y');}
if (!IsSet($mes)){$mes=date('m');}
if (!IsSet($year)){$year=date('Y');}
if (!IsSet($month)){$month=date('m');}else{$month=$mes;}


$anodehoje=date('Y');


if (!IsSet($fabricapesquisa)){
   $sachafabrica = OCIParse($ora_conexao, "SELECT MIN(CD_FABRICA) FABRICA FROM  FABRICAS");
   OCIExecute($sachafabrica, OCI_DEFAULT);
   While (OCIFetch($sachafabrica)) {

          $fabricapesquisa=ociresult($sachafabrica, "FABRICA") ;

   }
}



if (!IsSet($escolha)){


    $diahojeteste=date('d');

    $achadianovo1dd= "SELECT a.nr_sequencia SEQUENCIA,a.NR_DIA_INICIAL DIA1,a.NR_DIA_FINAL DIA2,a.NR_SEMANA SEMANA from aux_semana a,meses_bi b
                 WHERE a.NR_MES='$mes' and a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias and
                 a.NR_DIA_INICIAL<='$diahojeteste' and
                 a.NR_DIA_FINAL>='$diahojeteste'";



    $achadianovo2dd = mysql_db_query($banco,$achadianovo1dd,$conexao);
    $achadianovo3dd=mysql_fetch_array($achadianovo2dd);
    $primeirodia=$achadianovo3dd["DIA1"];
    $ultimodia=$achadianovo3dd["DIA2"];
    $semanapegou=$achadianovo3dd["SEQUENCIA"];
    $semanapegoumostrar=$achadianovo3dd["SEMANA"];


}
else
{


   if ($mudoumesano=="sim"){
   $mes="01";
   $month="01";
   $turno="1";

   require("GRAVAR_DIAS_SEMANA.php");


   $achadianovo1dd= "SELECT a.nr_sequencia SEQUENCIA,a.NR_DIA_INICIAL DIA1,a.NR_DIA_FINAL DIA2,a.NR_SEMANA SEMANA from aux_semana a,meses_bi b
                 WHERE a.NR_MES='$mes' and a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias and
                 a.NR_SEMANA in (select MIN(NR_SEMANA) FROM aux_semana WHERE NR_MES='$mes' and cd_ano='$ano')";



    $achadianovo2dd = mysql_db_query($banco,$achadianovo1dd,$conexao);
    $achadianovo3dd=mysql_fetch_array($achadianovo2dd);
    $primeirodia=$achadianovo3dd["DIA1"];
    $ultimodia=$achadianovo3dd["DIA2"];
    $semanapegou=$achadianovo3dd["SEQUENCIA"];
    $semanapegoumostrar=$achadianovo3dd["SEMANA"];

    }
    ELSE
    {
     $achadianovo1dd= "SELECT NR_DIA_INICIAL DIA1,NR_DIA_FINAL DIA2,NR_SEMANA SEMANA,NR_MES from aux_semana
                 WHERE NR_SEQUENCIA='$semanapegou' ";



    $achadianovo2dd = mysql_db_query($banco,$achadianovo1dd,$conexao);
    $achadianovo3dd=mysql_fetch_array($achadianovo2dd);
    $primeirodia=$achadianovo3dd["DIA1"];
    $ultimodia=$achadianovo3dd["DIA2"];
    $mes=$achadianovo3dd["NR_MES"];
    $semanapegoumostrar=$achadianovo3dd["SEMANA"];
    $month=$achadianovo3dd["NR_MES"];
    }



}




?>
<center><font style='font-size: 24px;color: black;text-align:left;bold: Negrito' >Plano Semanal
 <?echo $mes;?>/<?echo $ano;?></font> - <a href="CONSULTAplanomessemana.php?escolha=MUDARMES&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>">Trocar Ano
</a></center>
<?






if ($escolha=="MUDARMES"){
?>



    <input style="background-color:#8B8378;color: white;" type="txt" name="ano"  size="5" value="<?echo $ano;?>">

   <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">


		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">

		<input type="hidden" name="usuario" value="<?echo $usuario;?>">
		<input type="hidden" name="senhanova" value="<?echo $senhanova;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		
		<input type="hidden" name="mudoumesano" value="sim">



  <input  type="submit"   VALUE="Confirma">

<?

}













if (!IsSet($escolha) or ($escolha=="1")){



 
 
 $datapesquisainicial=$primeirodia."/".$month."/".$ano;
 $datapesquisafinal=$ultimodia."/".$month."/".$ano;
 



?>

<center>
<input type="hidden" name="mudoumesano" value="nao" onchange="this.form.submit()">

<select name="semanapegou" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $semanapegou;?>">Semana:<? echo $semanapegoumostrar;?></option>
                 <?
                 $stmt199 = "SELECT a.nr_sequencia SEQUENCIA,a.NR_SEMANA SEMANA,a.NR_DIA_INICIAL DIA1,
                 a.NR_DIA_FINAL DIA2,a.NR_MES MES,a.cd_ano ANO
                 from aux_semana a,meses_bi b
                 WHERE  a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias
                  ORDER BY a.nr_sequencia asc";
					 $res4 = mysql_db_query($banco,$stmt199,$conexao);
                     while ($valor1=mysql_fetch_array($res4)){

					 print "<option value=\"{$valor1["SEQUENCIA"]}\">{$valor1["SEMANA"]}</option>";
					 }
					 ?>
                 
     				 </select>

<select name="fabricapesquisa" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                 <option value="<?echo $fabricapesquisa;?>">Unidade:<? echo $fabricapesquisa;?></option>
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



    
    <select name="equipamentoescolha" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                 <option value="<?echo $equipamentoescolha;?>">Equipamento:<? echo $equipamentoescolha;?></option>
                 <option value="">Todos Equipamentos</option>
                 <?
                 $result2 = "SELECT DISTINCT OC.CD_COMPONENTE VALOR ,MA.DS_MAQUINA MAQUINA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE VALOR,MA.DS_MAQUINA MAQUINA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
              ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["VALOR"]}\">{$row["VALOR"]}-{$row["MAQUINA"]}</option>";
                 }
				 ?>
				 </select>

    <select style="background-color:#8B8378;color: white;"  name="grupoordens" onchange="this.form.submit()" >
    <option value="<?echo $grupoordens;?>">Grupo:<? echo $mostraordem;?></option>
    <option value="C">Não Planejadas</option>
    <option value="P">Planejadas</option>
    <option value="T">Todas</option>
 	</select>

        <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">


		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">

		<input type="hidden" name="usuario" value="<?echo $usuario;?>">
		<input type="hidden" name="senhanova" value="<?echo $senhanova;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="mes" value="<?echo $mes;?>">
		<input type="hidden" name="ano" value="<?echo $ano;?>">
		<input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">




  <hr>
  
  <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">
<tr>
 <td>Equipamentos</td>
 
 
  <?
  $contadoriteminicial=$primeirodia;
  
 for ($passa1=$contadoriteminicial;$passa1 <=$ultimodia;$passa1++){

      $data = $ano."-".$mes."-".$passa1;

 //dia de semana!
list ($year, $month, $day) = explode("-",$data);
$timedtE=mktime(0,0,0,$month,$day,$year);

$s = date("D",$timedtE); /* Mostra 3 primeiras letras do dia da semana em ingles */
$m = date("n",$timedtE); /* Mostra o Mês em números */
$d = date("d",$timedtE); /* Mostra dia da semana com 2 algarismos*/
$y = date("Y",$timedtE); /* Mostra o ano com 4 algarismos*/

$semana = array("Sun" => "Dom","Sat" => "Sab","Mon" => "Seg","Tue" => "Ter","Wed" => "Qua","Thu" => "Qui","Fri" => "Sex"); /* Dias da Semana. */

$dia = $semana[$s];
if ($dia=="Dom")
{
	  ?><td><h1 style='font-size: 9px;color: red;text-align:left;bold: Negrito text-decoration: none'><?echo $dia;?></br><?echo $passa1;?></td>
<?
}
else
{
?><td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $dia;?></br><?echo $passa1;?></td>
<?

}

}//final dos dias
?>
</tr>
<tr>
<?






IF ($grupoordens=="T"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >= '$datapesquisainicial'
       AND TRUNC(OC.DATA_PLANE) <= '$datapesquisafinal'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >= '$datapesquisainicial'
       AND TRUNC(EC.DATA_INICIO) <= '$datapesquisafinal'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");
       

       
}

IF ($grupoordens=="C"){
$s = OCIParse($ora_conexao, "SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >= '$datapesquisainicial'
       AND TRUNC(EC.DATA_INICIO) <= '$datapesquisafinal'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");



}

IF ($grupoordens=="P"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >= '$datapesquisainicial'
       AND TRUNC(OC.DATA_PLANE) <= '$datapesquisafinal'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ");

}



       

 OCIExecute($s, OCI_DEFAULT);
While (OCIFetch($s)) {

          $compo1=ociresult($s, "CD_COMPONENTE") ;
          $ativi1=ociresult($s, "CD_ATIVIDADE") ;





?>

<tr>


<?
IF ($compo1==$compoanterior){
?>
<td></td>
<?
}
else
{
?>
<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
<? echo $compo1;?></h1>
</td>
<?
$compoanterior=$compo1;
}

$contadoriteminicial=$primeirodia;
$contadoritem=$ultimodia;


$somatotalb="0";

for ($passa6=$contadoriteminicial;$passa6 <=$contadoritem;$passa6++){

        $somatotalb="0";
        IF ($passa6 <"10"){$passa1555="0".$passa6;}else{$passa1555=$passa6;}

        $datapesquisa1=$passa1555."/".$mes."/".$ano;

       //ECHO "</BR>ENTRA//DIA:$datapesquisa1</BR>";

      $achaexistecontador= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA='$fabricapesquisa'
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'");

        OCIExecute($achaexistecontador, OCI_DEFAULT);
        While (OCIFetch($achaexistecontador)) {

         $quantos1=ociresult($achaexistecontador, "CONTADOR1") ;
         $quantos2=ociresult($achaexistecontador, "CONTADOR1") ;
         $somatotal=$quantos1+$quantos2;
        }



    if ($somatotal >"0"){
      $achaexiste= OCIParse($ora_conexao, "SELECT  to_char(OC.DATA_PLANE,'mm') MES,to_char(OC.DATA_PLANE,'dd') DIA,
      to_char(OC.DATA_INICIO,'dd') DIABAIXA,
      to_char(OC.DATA_PLANE,'yyyy') ANO,
      OC.STATUS STATUS,to_char(OC.DATA_TERMINO,'mm') MES2,to_char(OC.DATA_TERMINO,'dd') DIA2,
      to_char(OC.DATA_TERMINO,'yyyy') ANO2,OC.NUMERO_ORDEM ORDEM
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA='$fabricapesquisa'
       UNION
       SELECT  to_char(EC.DATA_INICIO,'mm') MES,
       to_char(EC.DATA_INICIO,'dd') DIA,to_char(EC.DATA_FIM,'dd') DIABAIXA,
      to_char(EC.DATA_INICIO,'yyyy') ANO,
       EC.STATUS STATUS,to_char(EC.DATA_FIM,'mm') MES2,to_char(EC.DATA_FIM,'dd') DIA2,
      to_char(EC.DATA_FIM,'yyyy') ANO2,EC.NUMERO ORDEM
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA='$fabricapesquisa'");
       
       

        OCIExecute($achaexiste, OCI_DEFAULT);
        While (OCIFetch($achaexiste)) {

         $mes1=ociresult($achaexiste, "MES") ;
         $dia1=ociresult($achaexiste, "DIA") ;
         $dia1iniciobaixa=ociresult($achaexiste, "DIABAIXA") ;
         $ano1=ociresult($achaexiste, "ANO") ;


         $mes2=ociresult($achaexiste, "MES2") ;
         $dia2=ociresult($achaexiste, "DIA2") ;
         $ano2=ociresult($achaexiste, "ANO2") ;

         $status1=ociresult($achaexiste, "STATUS") ;
         $ordembaixa=ociresult($achaexiste, "ORDEM") ;


        $diahoje=date('d');
  		$meshoje=date('m');
  		$anohoje=date('Y');





         //ECHO "STATUS:$status1//DIA:$dia1//dia hoje:$diahoje//mes:$mes1//mes hoje:$meshoje//ano:$ano1//ano hoje:$anohoje</br>";

         IF ($status1=="G"){
           if ($ano1<$anohoje){
              $cor="red";
           }
           else
           {
           if ($ano1==$anohoje){
            if ($mes1<$meshoje){
               $cor="red";

             }
             else
             {
              if ($dia1<$diahoje){$cor="red";}else{$cor="green";}


             }//final do mes
            }//final quando ano igual ao atual

            if ($ano1 >$anohoje){
            $cor="green";
            }//maior com ano ayual

           }//teste ano
          }//final gerada


          IF ($status1=="B"){


          $cor="BLUE";

          }

          $datapesquisa1=$diahoje."/".$mes."/".$ano;




          $achaexistecontadorbaixa= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND TRUNC(OC.DATA_PLANE) = '$datapesquisa1'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA='$fabricapesquisa' and
       OC.STATUS='B'
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND TRUNC(EC.DATA_INICIO) = '$datapesquisa1'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricapesquisa'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'
       and
       EC.STATUS='B'
       ");



        OCIExecute($achaexistecontadorbaixa, OCI_DEFAULT);
        While (OCIFetch($achaexistecontadorbaixa)) {

         $quantos1b=ociresult($achaexistecontadorbaixa, "CONTADOR1") ;
         $quantos2b=ociresult($achaexistecontadorbaixa, "CONTADOR1") ;
         $somatotalb=$quantos1b+$quantos2b;
        }


            if ($cor=="BLUE"){
             IF ($grupoordens=="P"){
             ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$ativi1";?>
             </h1>



             </td>
             <?
             }
             ELSE
             {
              ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$ordembaixa";?>
             </h1>



             </td>
             <?
             }


           }
           ELSE
           {
             IF ($grupoordens=="P"){
             ?>


	         <td>
             <a href="CONSULTAplanomessemana.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomessemana.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>

             </td>
              <?
             }


           }







         }
   }
   else
   {

            ?>
            <td></td>

   <?
   }




}//final do for
?>

</tr>

<?

}//FINAL  dos componnete se ativiadade
?>
</table>

<?






}//final quando nao escolhe nada tela de entrada



if ($escolha=="verservico"){



echo "Ordem:$listaordemselecionada - Atividade:$atividadegrava";


$s = OCIParse($ora_conexao, "select  distinct a.ds_atividade ATIVIDADE,e.ds_servico SERVICO,
b.cd_intervalo UNIDADEINTERVALO,b.intervalo INTERVALO
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_componente='$componente' and
d.cd_servico=e.cd_servico
                       ");
                       

                       
                       
                       ?>
 </br></br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="40%">

    <tr>


    <th>Serviço</th>
    <th>Intervalo</th>





    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      ;

      $servico7=ociresult($s, "SERVICO") ;
      $intervalo7=ociresult($s, "INTERVALO") ;
      $unidadeintervalo7=ociresult($s, "UNIDADEINTERVALO") ;

      if ($unidadeintervalo7=="D"){$mostrauni="Dias";}
      if ($unidadeintervalo7=="H"){$mostrauni="Horas";}


      $intervalomostra=$intervalo7."-".$mostrauni;


      ?>
      <tr>


       <td><? echo $servico7;?></td>
       <td><? echo $intervalomostra;?></td>




      </tr>
      <?

  }
  ?>
  </table>



        <input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="fabricapesquisa" value="<?echo $fabricapesquisa;?>">
		<input type="hidden" name="grupoordens" value="P">

        <input type="hidden" name="semanapegou" value="<?echo $semanapegou;?>">
        <input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">



<input type="button" onclick="Botao2()" value="Retornar"></input>
<?
}







?>


</form>


  




