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
$programa="CONSULTAplanomesV2.php";
$titulo="Plano Mensal";

?>



<form action="CONSULTAplanomesv2.php"  name="nome_formulario" id="nome_formulario" method="POST" >
<?require("areasuperior2.php");
require("carregamenumilenionovo2.php");?>

<a href="CONSULTAplanomesV2.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>




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
$grupoordens=$_GET['grupoordens'];
$fabricaescolha=$_GET['fabricaescolha'];
$escolhemes=$_GET['escolhemes'];
$equipamentoescolha=$_GET['equipamentoescolha'];
$atividadegrava=$_GET['atividadegrava'];
$compo1=$_GET['compo1'];
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


}




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





                 $diahoje=date('d-m-Y');
                 $ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));
                 
                 
                 $datapesquisa2inicial="01/".$mes."/".$ano;
$datapesquisa2final=$ultimodia."/".$mes."/".$ano;


$ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));

 $contadoritem=$ultimodia;
 $contadoriteminicial="1";
 
if (!IsSet($escolha))
{
$escolha="pesquisa";
}

if (!IsSet($fabricaescolha))
{

$fabricaescolha="99999";
}


IF ($escolha=="1")
{
	
?>
<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<titulogeral><? echo "$titulo";?>- Mês:<? echo "$mes";?> Grupo de Ordens: <? echo "$mostraordem";?></titulogeral>
       
	
<div style="height:99%;overflow:scroll" >   
<table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">
 
<tr>
 <th>Equipamentos</th>
 <th></th>
 <th>Unidade</th>
 
 
  <?
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
	  ?><th><h1 style='font-size: 9px;color: white;text-align:left;bold: Negrito text-decoration: none'><?echo $dia;?></br><?echo $passa1;?></th>
<?
}
else
{
?><th><h1 style='font-size: 9px;color: white;text-align:left;bold: Negrito text-decoration: none'><?echo $dia;?></br><?echo $passa1;?></th>
<?

}

}//final dos dias
?>
</tr>
<tr>
<?






IF ($grupoordens=="T"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,FA.CD_FABRICA,CA.DS_COMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisa2inicial','dd/mm/YYYY')
       AND TRUNC(OC.DATA_PLANE) <= to_date('$datapesquisa2final','dd/mm/YYYY')
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
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,FA.CD_FABRICA,CA.DS_COMPO
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisa2inicial','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisa2final','dd/mm/YYYY')
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
$achasemana1="SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,FA.CD_FABRICA,CA.DS_COMPO
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisa2inicial','dd/mm/YYYY') 
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisa2final','dd/mm/YYYY')
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

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,FA.CD_FABRICA,CA.DS_COMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisa2inicial','dd/mm/YYYY') 
       AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisa2final','dd/mm/YYYY')
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
						 $fabrica1=$mostragrid1->fields["CD_FABRICA"];







?>

<tr>


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
<td><? echo $compo1;?></td>
<td><? echo $compo2;?></td>
<td><? echo $fabrica1;?></td>
<?
$compoanterior=$compo1;
}

$contadoriteminicial="1";
$contadoritem=$ultimodia;


$somatotalb="0";

for ($passa6=$contadoriteminicial;$passa6 <=$contadoritem;$passa6++){

        $somatotalb="0";
        IF ($passa6 <"10"){$passa1555="0".$passa6;}else{$passa1555=$passa6;}

        $datapesquisa1=$passa1555."/".$mes."/".$ano;

       //ECHO "</BR>ENTRA//DIA:$datapesquisa1</BR>";
	   
	   $sachaequide478="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       AND TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       AND TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
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

          $datapesquisa1=$ultimodia."/".$mes."/".$ano;




      $achaexistecontadorbaixa="SELECT  count(*) CONTADOR1
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
      CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
      WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) =to_date('$datapesquisa1','dd/mm/YYYY')
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
       AND TRUNC(EC.DATA_INICIO) =to_date('$datapesquisa1','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA  like '%$fabricapesquisa%'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'
       and
       EC.STATUS='B'
       ";
	   $achaexistecontadorbaixa3 = $conn->Execute($achaexistecontadorbaixa);
                                while ( !$achaexistecontadorbaixa3->EOF) {
									
                                         $quantos1b=$achaexiste9->fields["CONTADOR1"];
										 $quantos2b=$achaexiste9->fields["CONTADOR1"];
										 $somatotalb=$quantos1b+$quantos2b;
										 
						                 
				                $achaexistecontadorbaixa3->MoveNext();
                                }

       


            if ($cor=="BLUE"){
             IF ($grupoordens=="P"){
             ?>
	         <td>
			  <a href="CONSULTAplanomesV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 10px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$ativi1";?></h1></a>
			 
             

             </td>
             <?
             }
             ELSE
             {
              ?>
			  <td><a href="CONSULTAplanomesV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 13px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$ordembaixa";?></h1></a>
			 
             </td>
             <?
             }


           }
           ELSE
           {
             IF ($grupoordens=="P"){
             ?>


	         <td>
             <a href="CONSULTAplanomesV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 10px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomesV2.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 13px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
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
</div>

<?






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
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_servico=e.cd_servico";
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
}
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


  




