<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

$edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

                     $pagina_atual = $_GET['pagina_atual'];
					 
					 $escolha=$_GET['escolha'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="CONSULTAplanomessemanaV2.php";
$titulo="Plano Semanal";


//require("GRAVAR_DIAS_SEMANA.php"); //apena ativar quando um ano novo


?>

<form action="CONSULTAplanomessemanaV2.php"  name="nome_formulario" id="nome_formulario" method="POST" >
<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");?>

<a href="CONSULTAplanomessemanaV2.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<titulogeral><? echo "$titulo";?></titulogeral>

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
$listaordemselecionada=$_GET['listaordemselecionada'];




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
$programa="CONSULTAplanomessemanaV2.php";


if (!IsSet($ano)){
 $ano=date('Y');
//$ano="2013";
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








if (!IsSet($escolha)){

   $escolha="pesquisa";
    $diahojeteste=date('d');

    //$diahojeteste="04";

    $achadianovo1dd= "SELECT min(a.NR_SEMANA) SEMANA
    from aux_semana a,meses_bi b
                 WHERE a.NR_MES='$mes' and a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias and
                 a.NR_DIA_FINAL >='$diahojeteste' ";
				 
				 $datapegou2 = $conn->Execute($achadianovo1dd);
                 while ( !$datapegou2->EOF) {
                         $semanapegoumostrar=$datapegou2->fields["0"];
						 
                 $datapegou2->MoveNext();
                 }



    

    $achaMINIMOMES= "SELECT MIN(NR_MES) MESINICIO,MAX(NR_MES) MESFINAL
    FROM aux_semana WHERE NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano'";
    
	
	$achaMINIMOMES2 = $conn->Execute($achaMINIMOMES);
                 while ( !$achaMINIMOMES2->EOF) {
                         $mesinicio=$achaMINIMOMES2->fields["0"];
						 $mesfinal=$achaMINIMOMES2->fields["1"];
						 
                 $achaMINIMOMES2->MoveNext();
                 }

    

    //para o primeiro mes da semna
    $achadianovo1dd77= "SELECT NR_DIA_INICIAL DIA1 from aux_semana
                 WHERE nr_mes='$mesinicio' and NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano' ";
				 $achadianovo1dd772 = $conn->Execute($achadianovo1dd77);
                 while ( !$achadianovo1dd772->EOF) {
                         $primeirodia=$achadianovo1dd772->fields["0"];
						 
						 
                 $achadianovo1dd772->MoveNext();
                 }

    

    $datapesquisainicial=$primeirodia."/".$mesinicio."/".$ano;

    //para segudno mes da semana

    $achadianovo1dd88= "SELECT NR_DIA_FINAL DIA2 from aux_semana
                 WHERE nr_mes='$mesfinal' and NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano'";
				 
				 $achadianovo1dd882 = $conn->Execute($achadianovo1dd88);
                 while ( !$achadianovo1dd882->EOF) {
                         $ultimodia=$achadianovo1dd882->fields["0"];
						 
						 
                 $achadianovo1dd882->MoveNext();
                 }
   

    $datapesquisafinal=$ultimodia."/".$mesfinal."/".$ano;






}
else
{//existe escolha


   if ($mudoumesano=="sim"){
   

   $datapegou1 = "SELECT a.nr_sequencia SEQUENCIA,a.NR_DIA_INICIAL DIA1,a.NR_DIA_FINAL DIA2,a.NR_SEMANA SEMANA
   from aux_semana a,meses_bi b
                 WHERE a.NR_MES='$mes' and a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias and
                 a.NR_SEMANA in (select MIN(NR_SEMANA) FROM aux_semana WHERE NR_MES='$mes' and cd_ano='$ano')";
				 
                 $datapegou2 = $conn->Execute($datapegou1);
                 while ( !$datapegou2->EOF) {
                         $primeirodia=$datapegou2->fields["DIA1"];
						 $ultimodia=$datapegou2->fields["DIA2"];
                         $semanapegou=$datapegou2->fields["SEMANA"];
                         $semanapegoumostrar=$datapegou2->fields["SEMANA"];
                 $datapegou2->MoveNext();
                 }

   

    }
    ELSE
    {
		//quando sobrepoem dias de um mes para outro



                 $achadianovo1dds= "SELECT NR_DIA_INICIAL DIA1,NR_DIA_FINAL DIA2,NR_MES,NR_SEMANA SEMANA from aux_semana
                 WHERE NR_SEMANA='$semanapegou' ";
				 
				 $achadianovo1dds3 = $conn->Execute($achadianovo1dds);
                 while ( !$achadianovo1dds3->EOF) {
                         $primeirodia=$achadianovo1dds3->fields["0"];
						 $ultimodia==$achadianovo1dds3->fields["1"];
						 $mes=$achadianovo1dds3->fields["2"];
                         $semanapegoumostrar=$achadianovo1dds3->fields["3"];
						 
                 $achadianovo1dds3->MoveNext();
                 }
     

    $achaMINIMOMES= "SELECT MIN(NR_MES) MESINICIO,MAX(NR_MES) MESFINAL
    FROM aux_semana WHERE NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano'";
	
	
    
	$achaMINIMOMES5 = $conn->Execute($achaMINIMOMES);
                 while ( !$achaMINIMOMES5->EOF) {
                         $mesinicio=$achaMINIMOMES5->fields["0"];
						 $mesfinal=$achaMINIMOMES5->fields["1"];
						 
						 
                 $achaMINIMOMES5->MoveNext();
                 }
				 
				 $achadianovo1dds= "SELECT NR_DIA_FINAL from aux_semana
                 WHERE NR_SEMANA='$semanapegou' AND NR_MES='$mesinicio' and cd_ano='$ano'";
				 
				 $achadianovo1dds3 = $conn->Execute($achadianovo1dds);
                 while ( !$achadianovo1dds3->EOF) {
                         $ultimodiaperiodo1=$achadianovo1dds3->fields["0"];
						 
						 
                 $achadianovo1dds3->MoveNext();
                 }
    
    
    //para o primeiro mes da semna
    $achadianovo1dd77= "SELECT NR_DIA_INICIAL DIA1 from aux_semana
                 WHERE nr_mes='$mesinicio' and NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano' ";
				 
                 $achadianovo1dd772 = $conn->Execute($achadianovo1dd77);
                 while ( !$achadianovo1dd772->EOF) {
                         $primeirodia=$achadianovo1dd772->fields["0"];
						
						 
						 
                 $achadianovo1dd772->MoveNext();
                 }
    
	

    $datapesquisainicial=$primeirodia."/".$mesinicio."/".$ano;

    
	//para segudno mes da semana

    $achadianovo1dd88= "SELECT NR_DIA_FINAL DIA2 from aux_semana
                 WHERE nr_mes='$mesfinal' and NR_SEMANA='$semanapegoumostrar' and cd_ano='$ano'";
				 $achadianovo1dd886 = $conn->Execute($achadianovo1dd88);
                 while ( !$achadianovo1dd886->EOF) {
                         $ultimodia=$achadianovo1dd886->fields["0"];
						
						 
						 
                 $achadianovo1dd886->MoveNext();
                 }

        $datapesquisafinal=$ultimodia."/".$mesfinal."/".$ano;


    }//nao mudou o mes

}//NAO existe escolha



if (!IsSet($fabricaescolha))
{

$fabricaescolha="99999";
}

?>
<titulogeral>-Semana:<? echo $semanapegou;?> Mês:<? echo $mes;?>/<? echo $ano;?></titulogeral>
<?
IF ($escolha=="1")
{
?>

<center>



<?
  

if ($mesinicio==$mesfinal){
?>
<table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">
<tr>
 
 <th>Equipamento</th>
 <th></th>
 <th>Unidade</th>

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
	  ?><th><?echo $dia;?></br><?echo $passa1;?></th>
<?
}
else
{
?><th><?echo $dia;?></br><?echo $passa1;?></th>
<?

}

}//final dos dias
?>
</tr>
<tr>
<?




IF ($grupoordens=="T"){

$achasemana1= "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,CA.DS_COMPO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,CA.DS_COMPO,FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";



}



IF ($grupoordens=="C"){
$achasemana1= "SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,CA.DS_COMPO,FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";



}

IF ($grupoordens=="P"){
	
	$achasemana1= "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,CA.DS_COMPO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisafinal','dd/mm/YYYY') 
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
 ";
				 
	

}


$mostragrid1 = $conn->Execute($achasemana1);
while ( !$mostragrid1->EOF)
{
                         $compo1=$mostragrid1->fields["CD_COMPONENTE"];
						 $compo2=$mostragrid1->fields["DS_COMPO"];
						 $ativi1=$mostragrid1->fields["CD_ATIVIDADE"];
						 $unid1=$mostragrid1->fields["CD_FABRICA"];

?>


<?
IF ($compo1==$compoanterior){
?>
<td></td>
<td></td>
<td></td>
<?
}
else
{
?>
<td><?

                                $sachaequide47 = "SELECT DS_COMPO FROM   COMPONENTE_AUXILIAR  WHERE CD_COMPO='$compo1'";
                                $sachaequide473 = $conn->Execute($sachaequide47);
                                while ( !$sachaequide473->EOF) {
									
                                         $componentedescricao5=$sachaequide473->fields["0"];
						                 
				                $sachaequide473->MoveNext();
                                }
					  
					  






 echo $compo1;?></h1>
</td>
<td><?echo $componentedescricao5;?></td>
<td><?echo $unid1;?></td>
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

       

      $sachaequide478="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
      CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
      WHERE TRUNC(EC.DATA_INICIO) = to_date('$datapesquisa1','dd/mm/YYYY')
        AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'";
	   
	   $sachaequide4781 = $conn->Execute($sachaequide478);
                                while ( !$sachaequide4781->EOF) {
									
                                         $quantos1=$sachaequide4781->fields["CONTADOR1"];
										 $quantos2=$sachaequide4781->fields["CONTADOR1"];
										 $somatotal=$quantos1+$quantos2;
						                 
				                $sachaequide4781->MoveNext();
                                }

        



    if ($somatotal >"0"){
      
	  
	  $achaexiste= "SELECT  to_char(OC.DATA_PLANE,'mm') MES,to_char(OC.DATA_PLANE,'dd') DIA,
      to_char(OC.DATA_INICIO,'dd') DIABAIXA,
      to_char(OC.DATA_PLANE,'yyyy') ANO,
      OC.STATUS STATUS,to_char(OC.DATA_TERMINO,'mm') MES2,to_char(OC.DATA_TERMINO,'dd') DIA2,
      to_char(OC.DATA_TERMINO,'yyyy') ANO2,OC.NUMERO_ORDEM ORDEM
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       UNION
       SELECT  to_char(EC.DATA_INICIO,'mm') MES,
       to_char(EC.DATA_INICIO,'dd') DIA,to_char(EC.DATA_FIM,'dd') DIABAIXA,
      to_char(EC.DATA_INICIO,'yyyy') ANO,
       EC.STATUS STATUS,to_char(EC.DATA_FIM,'mm') MES2,to_char(EC.DATA_FIM,'dd') DIA2,
      to_char(EC.DATA_FIM,'yyyy') ANO2,EC.NUMERO ORDEM
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')";
	   
       $achaexiste9 = $conn->Execute($achaexiste);
                                while ( !$achaexiste9->EOF) {
									
                                         $mes1=$achaexiste9->fields["MES"];
										 $dia1=$achaexiste9->fields["DIA"];
										 $dia1iniciobaixa=$achaexiste9->fields["DIABAIXA"];
										 $ano1=$achaexiste9->fields["ANO"];
										 $mes2=$achaexiste9->fields["MES2"];
										 $dia2=$achaexiste9->fields["DIA2"];
										 $ano2=$achaexiste9->fields["ANO2"];
										 $status1=$achaexiste9->fields["STATUS"];
										 $ordembaixa=$achaexiste9->fields["ORDEM"];
										 
						                 
				                $achaexiste9->MoveNext();
                                }

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
               if ($mes1==$meshoje){

                  if ($dia1<$diahoje){$cor="red";}else{$cor="green";}
               }
               if ($mes1>$meshoje){

                  $cor="green";
               }


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

          $datapesquisa1=$ultimodia."/".$mes."/".$ano;




          $achaexistecontadorbaixa="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE)=to_date('$datapesquisa1','dd/mm/YYYY')
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
     WHERE TRUNC(EC.DATA_INICIO)=to_date('$datapesquisa1','dd/mm/YYYY')
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
       ";
	   $achaexistecontadorbaixa3 = $conn->Execute($achaexistecontadorbaixa);
                                while ( !$achaexistecontadorbaixa3->EOF) {
									
                                         $quantos1b=$achaexiste9->fields["CONTADOR1"];
										 $quantos2b=$achaexiste9->fields["CONTADOR2"];
										 $somatotalb=$quantos1b+$quantos2b;
										 
						                 
				                $achaexistecontadorbaixa3->MoveNext();
                                }

       


        if ($cor=="BLUE")
		{
             IF ($grupoordens=="P"){
             ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>
             </h1>



             </td>
             <?
             }
             ELSE
             {
              ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>
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
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>

             </td>
              <?
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
$mostragrid1->MoveNext();
                 }


?>
</table>

<?

}//final quando é no mesmo mes




if ($mesfinal >$mesinicio)
{
	
	

?>

<center><table  border=0
 style='background:white;' width="80%" align="center" class="tabela1">
<tr>
 <th>TAG</th>
 <th>Equipamento</th>




  <?

  
  

 $contadoriteminicial2=$primeirodia;

 for ($passa12=$contadoriteminicial2;$passa12 <=$ultimodiaperiodo1;$passa12++){

      $data = $ano."-".$mesinicio."-".$passa12;

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
	  ?><th><?echo $dia;?></br><?echo $passa12;?></th>
<?
}
else
{
?><th><?echo $dia;?></br><?echo $passa12;?></th>
<?

}

}//final dos dias




 for ($passa13=1;$passa13 <=$ultimodia;$passa13++){

      $data = $ano."-".$mesfinal."-".$passa13;

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
	  ?><th><?echo $dia;?></br><?echo $passa13;?></th>
<?
}
else
{
?><th><?echo $dia;?></br><?echo $passa13;?></th>
<?

}

}//final dos dias
?>
</tr>



<?




IF ($grupoordens=="T"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisainicial','dd/mm/YYYY')
		AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisainicial','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like ='%$fabricapesquisa%'
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";



}


IF ($grupoordens=="C"){
$achasemana1="SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA likw '%$fabricapesquisa%'
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";



}

IF ($grupoordens=="P"){
	
	$achasemana1= "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisainicial','dd/mm/YYYY')
       AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisafinal','dd/mm/YYYY') 
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
 ";



}


$mostragrid1 = $conn->Execute($achasemana1);
while ( !$mostragrid1->EOF)
{
                         $compo1=$mostragrid1->fields["CD_COMPONENTE"];
						 $ativi1=$mostragrid1->fields["CD_ATIVIDADE"];




?>

<tr>


<?
IF ($compo1==$compoanterior){
?>
<td></td>
<td></td>
<?
}
else
{
?>
<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
<?

                      $sachaequide47 = "SELECT DS_COMPO FROM   COMPONENTE_AUXILIAR  WHERE CD_COMPO='$compo1'";
                                $sachaequide473 = $conn->Execute($sachaequide47);
                                while ( !$sachaequide473->EOF) {
									
                                         $componentedescricao5=$sachaequide473->fields["0"];
						                 
				                $sachaequide473->MoveNext();
                                }
								
                      






 echo $compo1;?></h1>
</td>
<td><?echo $componentedescricao5;?></td>
<?
$compoanterior=$compo1;
}


$contadoriteminicial=$primeirodia;
$contadoritem=$ultimodia;


$somatotalb="0";




for ($passa6=$contadoriteminicial;$passa6 <=$ultimodiaperiodo1;$passa6++){

        $somatotalb="0";
        IF ($passa6 <"10"){$passa1555="0".$passa6;}else{$passa1555=$passa6;}

        $datapesquisa1=$passa1555."/".$mesinicio."/".$ano;



      $sachaequide478="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) = to_date('$datapesquisa1','dd/mm/YYYY')
             AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
              AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'";
	   
	   $sachaequide4781 = $conn->Execute($sachaequide478);
                                while ( !$sachaequide4781->EOF) {
									
                                         $quantos1=$sachaequide4781->fields["CONTADOR1"];
										 $quantos2=$sachaequide4781->fields["CONTADOR1"];
										 $somatotal=$quantos1+$quantos2;
						                 
				                $sachaequide4781->MoveNext();
                                }


        



    if ($somatotal >"0"){
      $achaexiste="SELECT  to_char(OC.DATA_PLANE,'mm') MES,to_char(OC.DATA_PLANE,'dd') DIA,
      to_char(OC.DATA_INICIO,'dd') DIABAIXA,
      to_char(OC.DATA_PLANE,'yyyy') ANO,
      OC.STATUS STATUS,to_char(OC.DATA_TERMINO,'mm') MES2,to_char(OC.DATA_TERMINO,'dd') DIA2,
      to_char(OC.DATA_TERMINO,'yyyy') ANO2,OC.NUMERO_ORDEM ORDEM
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       UNION
       SELECT  to_char(EC.DATA_INICIO,'mm') MES,
       to_char(EC.DATA_INICIO,'dd') DIA,to_char(EC.DATA_FIM,'dd') DIABAIXA,
      to_char(EC.DATA_INICIO,'yyyy') ANO,
       EC.STATUS STATUS,to_char(EC.DATA_FIM,'mm') MES2,to_char(EC.DATA_FIM,'dd') DIA2,
      to_char(EC.DATA_FIM,'yyyy') ANO2,EC.NUMERO ORDEM
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       FA.CD_FABRICA like '%$fabricapesquisa%'";


	   $achaexiste9 = $conn->Execute($achaexiste);
                                while ( !$achaexiste9->EOF) {
									
                                         $mes1=$achaexiste9->fields["MES"];
										 $dia1=$achaexiste9->fields["DIA"];
										 $dia1iniciobaixa=$achaexiste9->fields["DIABAIXA"];
										 $ano1=$achaexiste9->fields["ANO"];
										 $mes2=$achaexiste9->fields["MES2"];
										 $dia2=$achaexiste9->fields["DIA2"];
										 $ano2=$achaexiste9->fields["ANO2"];
										 $status1=$achaexiste9->fields["STATUS"];
										 $ordembaixa=$achaexiste9->fields["ORDEM"];
										 
						                 
				                $achaexiste9->MoveNext();
                                }

        


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
               if ($mes1==$meshoje){

                  if ($dia1<$diahoje){$cor="red";}else{$cor="green";}
               }
               if ($mes1>$meshoje){

                  $cor="green";
               }


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

          $datapesquisa1=$ultimodia."/".$mesinicio."/".$ano;




          $achaexistecontadorbaixa="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA like '%$fabricapesquisa%' and
       OC.STATUS='B'
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
              AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'
       and
       EC.STATUS='B'
       ";


	   $achaexistecontadorbaixa3 = $conn->Execute($achaexistecontadorbaixa);
                                while ( !$achaexistecontadorbaixa3->EOF) {
									
                                         $quantos1b=$achaexistecontadorbaixa3->fields["CONTADOR1"];
										 $quantos2b=$achaexistecontadorbaixa3->fields["CONTADOR2"];
										 $somatotalb=$quantos1b+$quantos2b;
										 
						                 
				                $achaexistecontadorbaixa3->MoveNext();
                                }

        


           if ($cor=="BLUE")
		   {
			   
             IF ($grupoordens=="P")
			 {
             ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><? echo "$ativi1";?>
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
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>

             </td>
              <?
             }


           }


   }
   else
   {

            ?>
            <td></td>

   <?
   }




}//final do for  primeiro


for ($passa67=1;$passa67 <=$ultimodia;$passa67++){


        $somatotalb="0";
        IF ($passa67 <"10"){$passa15557="0".$passa67;}else{$passa15557=$passa67;}

        $datapesquisa1=$passa15557."/".$mesfinal."/".$ano;

       //ECHO "</BR>ENTRA//DIA:$datapesquisa1</BR>";

      $achaexistecontador="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
              AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       UNION
       SELECT  COUNT(*) CONTADOR1
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
              AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'";
	   
	   $achaexistecontadorbaixa39 = $conn->Execute($achaexistecontador);
                                while ( !$achaexistecontadorbaixa39->EOF) {
									
                                         $quantos1=$achaexistecontadorbaixa39->fields["CONTADOR1"];
										 $quantos2=$achaexistecontadorbaixa39->fields["CONTADOR1"];
										 $somatotal=$quantos1+$quantos2;
						                 
				                $achaexistecontadorbaixa39->MoveNext();
                                }

        


    if ($somatotal >"0"){
      $achaexistecontadornovo="SELECT  to_char(OC.DATA_PLANE,'mm') MES,to_char(OC.DATA_PLANE,'dd') DIA,
      to_char(OC.DATA_INICIO,'dd') DIABAIXA,
      to_char(OC.DATA_PLANE,'yyyy') ANO,
      OC.STATUS STATUS,to_char(OC.DATA_TERMINO,'mm') MES2,to_char(OC.DATA_TERMINO,'dd') DIA2,
      to_char(OC.DATA_TERMINO,'yyyy') ANO2,OC.NUMERO_ORDEM ORDEM
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       UNION
       SELECT  to_char(EC.DATA_INICIO,'mm') MES,
       to_char(EC.DATA_INICIO,'dd') DIA,to_char(EC.DATA_FIM,'dd') DIABAIXA,
      to_char(EC.DATA_INICIO,'yyyy') ANO,
       EC.STATUS STATUS,to_char(EC.DATA_FIM,'mm') MES2,to_char(EC.DATA_FIM,'dd') DIA2,
      to_char(EC.DATA_FIM,'yyyy') ANO2,EC.NUMERO ORDEM
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       FA.CD_FABRICA like '%$fabricapesquisa%'";

       $achaexistecontadorbaixa39 = $conn->Execute($achaexistecontadornovo);
                                while ( !$achaexistecontadorbaixa39->EOF) {
									$mes1=$achaexistecontadorbaixa39->fields["MES"];
										 $dia1=$achaexistecontadorbaixa39->fields["DIA"];
										 $dia1iniciobaixa=$achaexistecontadorbaixa39->fields["DIABAIXA"];
										 $ano1=$achaexistecontadorbaixa39->fields["ANO"];
										 $mes2=$achaexistecontadorbaixa39->fields["MES2"];
										 $dia2=$achaexistecontadorbaixa39->fields["DIA2"];
										 $ano2=$achaexistecontadorbaixa39->fields["ANO2"];
										 $status1=$achaexistecontadorbaixa39->fields["STATUS"];
										 $ordembaixa=$achaexistecontadorbaixa39->fields["ORDEM"];
						                 
				                $achaexistecontadorbaixa39->MoveNext();
                                }
									
									

        


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
               if ($mes1==$meshoje){

                  if ($dia1<$diahoje){$cor="red";}else{$cor="green";}
               }
               if ($mes1>$meshoje){

                  $cor="green";
               }


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

          $datapesquisa1=$ultimodia."/".$mesfinal."/".$ano;




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
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&navegando=sim&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>
			 </h1>
             </td>
             <?
             }
             ELSE
             {
              ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&navegando=sim&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>
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
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&navegando=sim&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomessemanaV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ordembaixa";?></a>

             </td>
              <?
             }


           }







         
   }
   else
   {

            ?>
            <td></td>

   <?
   }



}//final do for segundo

?>

</tr>

<?

$mostragrid1->MoveNext();
}

?>
</table>






<?

}

}//final quando nao escolhe nada tela de entrada





if ($escolha=="verservico"){
?>
<div  style="display: block;" id="telamostraatividade">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1&semanapegou=<?echo $semanapegou;?>">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>

<?

$mostraservicdd="select  ds_atividade from atividades where cd_atividade='$atividadegrava'";
$mostraservic2mostradescr5= $conn->Execute($mostraservicdd);
$descricaoatividade=$mostraservic2mostradescr5->fields["0"];


$pegaintervalo="select distinct b.cd_intervalo,b.intervalo INTERVALO 
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_servico=e.cd_servico";
$pegaintervalo2= $conn->Execute($pegaintervalo);
$mostrauni=$pegaintervalo2->fields["0"];
$intervalo75=$pegaintervalo2->fields["INTERVALO"];

      if ($mostrauni=="D"){$mostrauni="Dias";}
      if ($mostrauni=="H"){$mostrauni="Horas";}
      $intervalomostra=$intervalo75."-".$mostrauni;

?>
Ordem Serviço:<a href="baixamanutencao_versao5.php?escolha=maodeobra&numeroordempesquisa=<? echo $listaordemselecionada;?>&navegando=sim&fabricapesquisa=<?ECHO $fabricapesquisa;?>" style="text-decoration:none"><? echo $listaordemselecionada;?></a>

<? 
echo "Atividade:$atividadegrava-$descricaoatividade-Intervalo:$intervalomostra";    


$mostraservic="select  distinct a.ds_atividade ATIVIDADE,e.ds_servico SERVICO2,
b.cd_intervalo UNIDADEINTERVALO,b.intervalo INTERVALO,d.cd_servico SERVICO
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_componente='$compo1' and
d.cd_servico=e.cd_servico
                       ";


                       ?>
 </br></br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">

    <tr>
    <th>Codigo</th>
    <th>Serviço</th>

    </tr>
    <?
	
	$mostraservic2 = $conn->Execute($mostraservic);
    while ( !$mostraservic2->EOF)
	{
					     
						 $intervalo7=$mostraservic2->fields["INTERVALO"];
						 $unidadeintervalo7=$mostraservic2->fields["UNIDADEINTERVALO"];
						 $servico7=$mostraservic2->fields["SERVICO2"];
                         $codigoservico=$mostraservic2->fields["SERVICO"];
		
      if ($unidadeintervalo7=="D"){$mostrauni="Dias";}
      if ($unidadeintervalo7=="H"){$mostrauni="Horas";}
      $intervalomostra=$intervalo7."-".$mostrauni;
      ?>
      <tr>
       <td><? echo $codigoservico;?></td>
       <td><? echo $servico7;?></td>
       </tr>
      <?
    $mostraservic2->MoveNext();
	}
                                
    
  ?>
  </table>



        <input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="fabricapesquisa" value="<?echo $fabricapesquisa;?>">
		<input type="hidden" name="grupoordens" value="P">

        <input type="hidden" name="semanapegou" value="<?echo $semanapegou;?>">
        <input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">
		




</div>
<?
}//final ve servico
?>

</div>


<?

//pesquisas

if ($escolha=="pesquisa"){
	 
					 if (!IsSet($ordenaatual))
					 {
						 $pegavariavel[1]="cd_compo";
						 $pegavariavel[2]="cd_fabrica";
						 $ordenaatual="codigo";
						 $mensagemordena="Listas Ordenadas por Código ";
					 }
					 else
					 {
						if ($ordenaatual=="descricao")
						{
							$pegavariavel[1]="cd_compo";
							$pegavariavel[2]="cd_fabrica";
							$mensagemordena="Listas Ordenadas por Código ";
							$ordenaatual="codigo";
						}
						else
                        {
							$pegavariavel[1]="ds_compo";
							$pegavariavel[2]="ds_fabrica";
							$mensagemordena="Listas Ordenadas por Descrição";
							$ordenaatual="descricao";
							
						} 						
					 
					 }
require("classepesquisanova.php");
					 

}//FIAL DA PESQUISA?>

</form>







