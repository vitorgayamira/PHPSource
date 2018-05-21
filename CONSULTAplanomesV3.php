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
$programa="CONSULTAplanomesV3.php";
$titulo="Consulta Plano Mês:";


//require("GRAVAR_DIAS_SEMANA.php"); //apena ativar quando um ano novo

  function dia_seguinte($data){
  $temp = explode("/", $data);
  return date("d/m/Y", mktime(0, 0, 0, $temp[1], 
     $temp[0] + 1, $temp[2]));
}

?>

<form action="CONSULTAplanomesV3.php"  name="nome_formulario" id="nome_formulario" method="POST" >
<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");?>

<a href="CONSULTAplanomesV3.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>


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
$datalargada=$_GET['datalargada'];
$tipoconsulta=$_GET['tipoconsulta'];




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
		$datalargada=$_POST['datalargada'];
        $tipoconsulta=$_POST['tipoconsulta'];

}
$programa="CONSULTAplanomesV3.php";


if (!IsSet($ano)){
 $ano=date('Y');
}


if (!IsSet($mes)){
$mes=date('m');
}

$year=$ano;
$month=$mes;



if (!IsSet($grupoordens)){
$grupoordens="P";
}

if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}






if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($year)){$year=date('Y');}
if (!IsSet($month)){$month=date('m');}else{$month=$mes;}


$anodehoje=date('Y');

if (!IsSet($escolha)){
   $escolha="1";
   
}



if (!IsSet($fabricaescolha))
{

$fabricaescolha="99999";
}

if ( $fabricaescolha=="99999")//todas de acesso apenas
{
	                         $delecaousauio1= "delete from   AUX_USUARIO_UNIDADE where cd_usuario='$edusuario'";
			                 $delecaousauio12= $conn->Execute($delecaousauio1);
							 
							 $result2Fmus5 = "select cd_fabrica from usuario_fabrica where cd_usuario in (select cd_usuario from usuario_bi 
                             where nm_usuario='$edusuario')";
				             $result2Fmus51= $conn->Execute($result2Fmus5);
                             while ( !$result2Fmus51->EOF) {
				                    $pegafabrica=$result2Fmus51->fields["0"];
	                         	    $usu18ussG7dgpa7 = "insert into  AUX_USUARIO_UNIDADE(cd_usuario,cd_unidade) values
				                    ('$edusuario','$pegafabrica')";
			                        $resultussG77= $conn->Execute($usu18ussG7dgpa7);
							$result2Fmus51->MoveNext();
                            }

}
else
{
	                         $delecaousauio1= "delete from   AUX_USUARIO_UNIDADE where cd_usuario='$edusuario'";
			                 $delecaousauio12= $conn->Execute($delecaousauio1);
							 
	                         $usu18ussG7dgpa7f = "insert into  AUX_USUARIO_UNIDADE(cd_usuario,cd_unidade) values
				             ('$edusuario','$fabricaescolha')";
			                 $resultussG77f= $conn->Execute($usu18ussG7dgpa7f);
}

                 
				 
				 $achadianovo1dd= "SELECT qt_dias from meses_bi where cd_mes='$mes'";
				 $datapegou2 = $conn->Execute($achadianovo1dd);
                 $numerodias=$datapegou2->fields["0"];
?>				
<titulogeral><? echo "$titulo";?><?echo $mes;?> Grupo de Ordens: <? echo "$mostraordem";?></titulogeral>
<?

IF ($escolha=="1")
{
?>

<center>


<table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">
<tr>
 <th>Unidade</th>
 <th>Equipamento</th>
 <th></th>
 

<?
    $datalargada=$ano."-".$mes."-01";
    $dia1i=substr($datalargada,8,2);
	$mes1i=substr($datalargada,5,2);
	$ano1i=substr($datalargada,0,4);
	
	
	$datalargada2=$dia1i."/".$mes1i."/".$ano1i;
	$datanalise=$datalargada2;
	
 for ($passa1=0;$passa1 <$numerodias;$passa1++){
  
    $anoMO=substr($datanalise,6,4);
	$mesMO=substr($datanalise,3,2);
	$diaMO=substr($datanalise,0,2);

   $dataseguinte=dia_seguinte($datanalise);
    
      $datapegasemana=$anoMO."-".$mesMO."-".$diaMO;
	

 //dia de semana!
list ($year, $month, $day) = explode("-",$datapegasemana);
$timedtE=mktime(0,0,0,$month,$day,$year);

$s = date("D",$timedtE); /* Mostra 3 primeiras letras do dia da semana em ingles */
$m = date("n",$timedtE); /* Mostra o Mês em números */
$d = date("d",$timedtE); /* Mostra dia da semana com 2 algarismos*/
$y = date("Y",$timedtE); /* Mostra o ano com 4 algarismos*/

$semana = array("Sun" => "Dom","Sat" => "Sab","Mon" => "Seg","Tue" => "Ter","Wed" => "Qua","Thu" => "Qui","Fri" => "Sex"); /* Dias da Semana. */

$dia = $semana[$s];
if ($dia=="Dom")
{
	  ?><th><?echo $dia;?></br><?echo $diaMO;?></th>
<?
}
else
{
?><th><?echo $dia;?></br><?echo $diaMO;?></th>
<?

}
 
   $datanalise=$dataseguinte;
 }//final dos dias

 $datachegada2=$dataseguinte;
 ?>
</tr>
<tr>
<?






IF ($grupoordens=="T"){

$achasemana1= "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,CA.DS_COMPO,FA.DS_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND 
		OC.CD_COMPONENTE = CA.CD_COMPO and
		((TRUNC(OC.DATA_PLANE) >=to_date('$datalargada2','dd/mm/YYYY')) or (TRUNC(OC.DATA_TERMINO) >=to_date('$datalargada2','dd/mm/YYYY'))) AND 
		((TRUNC(OC.DATA_PLANE) <=to_date('$datachegada2','dd/mm/YYYY')) or (TRUNC(OC.DATA_TERMINO) <=to_date('$datachegada2','dd/mm/YYYY')))
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,CA.DS_COMPO,FA.DS_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE 
	     EC.CD_COMPONENTE = CA.CD_COMPO and
		 ((TRUNC(EC.DATA_INICIO) >=to_date('$datalargada2','dd/mm/YYYY')) or (TRUNC(EC.DATA_FIM) >=to_date('$datalargada2','dd/mm/YYYY'))) AND 
		 ((TRUNC(EC.DATA_INICIO) <=to_date('$datachegada2','dd/mm/YYYY')) or (TRUNC(EC.DATA_FIM) <=to_date('$datachegada2','dd/mm/YYYY')))
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
        AND MA.CD_FAMLIA = F.CD_FAMLIA
        AND MA.CD_CENTRO = CT.CD_CENTRO
        AND CT.CD_SECAO = SE.CD_SECAO
        AND SE.CD_AREA = AR.CD_AREA
        AND AR.CD_FABRICA = FA.CD_FABRICA AND
        FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
        AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
        ORDER BY DS_FABRICA,CD_COMPONENTE,CD_ATIVIDADE";



}




IF ($grupoordens=="C"){
$achasemana1= "SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,CA.DS_COMPO,FA.DS_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE 
	    EC.CD_COMPONENTE = CA.CD_COMPO AND 
		((TRUNC(EC.DATA_INICIO) >=to_date('$datalargada2','dd/mm/YYYY')) or (TRUNC(EC.DATA_FIM) >=to_date('$datalargada2','dd/mm/YYYY'))) AND 
		((TRUNC(EC.DATA_INICIO) <=to_date('$datachegada2','dd/mm/YYYY')) or (TRUNC(EC.DATA_FIM) <=to_date('$datachegada2','dd/mm/YYYY')))
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       ORDER BY DS_FABRICA,CD_COMPONENTE,CD_ATIVIDADE";



}

IF ($grupoordens=="P"){
	
	$achasemana1= "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,CA.DS_COMPO,FA.DS_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
      CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
      WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE AND
	  ((TRUNC(OC.DATA_PLANE) >=to_date('$datalargada2','dd/mm/YYYY')) or (TRUNC(OC.DATA_TERMINO) >=to_date('$datalargada2','dd/mm/YYYY'))) AND 
		((TRUNC(OC.DATA_PLANE) <=to_date('$datachegada2','dd/mm/YYYY')) or (TRUNC(OC.DATA_TERMINO) <=to_date('$datachegada2','dd/mm/YYYY')))
      AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       AND OC.CD_COMPONENTE LIKE '%$equipamentoescolha%' ORDER BY DS_FABRICA,CD_COMPONENTE,CD_ATIVIDADE
 ";
				 
//echo "$achasemana1";

}

$mostragrid1 = $conn->Execute($achasemana1);
while ( !$mostragrid1->EOF)
{
                         $compo1=$mostragrid1->fields["CD_COMPONENTE"];
						 $compo2=$mostragrid1->fields["DS_COMPO"];
						 $descricaounidade=$mostragrid1->fields["DS_FABRICA"];
						 
						 
						 
						 
						 $ativi1=$mostragrid1->fields["CD_ATIVIDADE"];

?>


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
<td><?echo $descricaounidade;?></td>
<td>

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

    $datalargada2=$dia1i."/".$mes1i."/".$ano1i;
	$datanalise=$datalargada2;

	$datapesquisa1=$datanalise;
for ($passa1=1;$passa1 <=$numerodias;$passa1++){

        //$dataseguinte=dia_seguinte($datanalise);

       // $datapesquisa1=$dataseguinte;

       

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
	   AND OC.STATUS='G'
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
       EC.CD_ATIVIDADE='$ativi1' AND  EC.STATUS='G'";
	   
	   $sachaequide4781 = $conn->Execute($sachaequide478);
	   while ( !$sachaequide4781->EOF) {
									
                                         $quantos1=$sachaequide4781->fields["CONTADOR1"];
										 $quantos2=$sachaequide4781->fields["CONTADOR1"];
										 $somatotal=$quantos1+$quantos2;
						                 
				                $sachaequide4781->MoveNext();
                                }

	   
			

			
		$sachaequide478teste2="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_TERMINO) =to_date('$datapesquisa1','dd/mm/YYYY')
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
      WHERE TRUNC(EC.DATA_FIM) = to_date('$datapesquisa1','dd/mm/YYYY')
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
	   
	   //if ($ativi1=="INSP T"){echo "$sachaequide478teste2";}
	   
	   $sachaequide478teste23 = $conn->Execute($sachaequide478teste2);
	   while ( !$sachaequide478teste23->EOF) {
									
                                        
       $quantos1t=$sachaequide478teste23->fields["CONTADOR1"];
	   $quantos2t=$sachaequide478teste23->fields["CONTADOR1"];
	   $somatotalteste2=$quantos1t+$quantos2t;	
						                 
				                $sachaequide478teste23->MoveNext();
                                }
	   
	   	
			
		
       $achaexiste= "SELECT  to_char(OC.DATA_PLANE,'mm') MES,to_char(OC.DATA_PLANE,'dd') DIA,
      to_char(OC.DATA_INICIO,'dd') DIABAIXA,
      to_char(OC.DATA_PLANE,'yyyy') ANO,
      OC.STATUS STATUS,to_char(OC.DATA_TERMINO,'mm') MES2,to_char(OC.DATA_TERMINO,'dd') DIA2,
      to_char(OC.DATA_TERMINO,'yyyy') ANO2,OC.NUMERO_ORDEM ORDEM
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE AND 
	   ((TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')) or (TRUNC(OC.DATA_TERMINO) =to_date('$datapesquisa1','dd/mm/YYYY'))) AND 
       OC.CD_COMPONENTE = CA.CD_COMPO
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
     WHERE 
	 ((TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')) or (TRUNC(EC.DATA_FIM) =to_date('$datapesquisa1','dd/mm/YYYY')))
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
      								
                                         $mes1=$achaexiste9->fields["MES"];
										 $dia1=$achaexiste9->fields["DIA"];
										 $dia1iniciobaixa=$achaexiste9->fields["DIABAIXA"];
										 $ano1=$achaexiste9->fields["ANO"];
										 $mes2=$achaexiste9->fields["MES2"];
										 $dia2=$achaexiste9->fields["DIA2"];
			                             $ordembaixa=$achaexiste9->fields["ORDEM"];   
                                         $diahoje=date('d');
  		                                 $meshoje=date('m');
  		                                 $anohoje=date('Y');										 
     //IF ($compo1=="VSC 001 ALJ"){
     // echo "dia:$datapesquisa1//Componente:$compo1//atividade:$ativi1//ordem:$ordembaixa//soma1:$somatotal//soma2:$somatotalteste2//teste1:$quantos1t//teste2:$quantos2t</br></br>";
     //} 
	 
	 if ($somatotal =="0" and $somatotalteste2=="0")
	 { 
	   $mostraordem="nao";
	 
	 }
	 if ($somatotal >"0" and $somatotalteste2=="0" )
	 { 
	   $mostraordem="sim";
	   
	       if ($ano1==$anohoje)
		   {
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
	       }
		   if ($ano1 >$anohoje){
            $cor="green";
            }//maior com ano ayual
	 
	 }
	 if ($somatotal =="0" and $somatotalteste2 >"0" )
	 { 
	   $mostraordem="sim";
	   $cor="blue";
	 
	 }
	  		

        //$diahoje=date('d');
  		//$meshoje=date('m');
  		//$anohoje=date('Y');
        //$datapesquisa1=$ultimodia."/".$mes."/".$ano;



//echo "dia:$datapesquisa1//Componente:$compo1//atividade:$ativi1//ordem:$ordembaixa//soma1:$somatotal//soma2:$somatotalteste2//teste1:$quantos1t//teste2:$quantos2t//MOSTRA:$mostraordem//COR:$cor</br></br>";
    
     
       
     if ($mostraordem=="sim")
	 {

        if ($cor=="BLUE" )
		{
             IF ($grupoordens=="P"){
             ?>
	         <td><h1 style='font-size: 10px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomesV3.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>&datalargada=<?echo $datalargada;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>
             </h1>



             </td>
             <?
             }
             ELSE
             {
              ?>
	         <td><h1 style='font-size: 10px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'>
			 <a href="CONSULTAplanomesV3.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>&datalargada=<?echo $datalargada;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
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
             <a href="CONSULTAplanomesV3.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>&datalargada=<?echo $datalargada;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomesV3.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&compo1=<?ECHO $compo1;?>&datalargada=<?echo $datalargada;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
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

	  $dataseguinte=dia_seguinte($datanalise);

      $datapesquisa1=$dataseguinte;

       
$datanalise=$dataseguinte;
}//final do for
?>

</tr>

<?
$mostragrid1->MoveNext();
 }


?>
</table>

<?

}//final quando nao escolhe nada tela de entrada





if ($escolha=="verservico"){
?>
<div  style="display: block;" id="telamostraatividade">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1&datalargada=<?echo $datalargada;?>">
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

        <input type="hidden" name="datalargada" value="<?echo $datalargada;?>">		




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







