<? require("estilo.css");
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

?>



<form action="CONSULTAplanomes.php"  name="nome_formulario" id="nome_formulario" method="POST" >



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


if (!IsSet($fabricapesquisa)){
   $sachafabrica = OCIParse($ora_conexao, "SELECT MIN(CD_FABRICA) FABRICA FROM  FABRICAS");
   OCIExecute($sachafabrica, OCI_DEFAULT);
   While (OCIFetch($sachafabrica)) {

          $fabricapesquisa=ociresult($sachafabrica, "FABRICA") ;

   }
}


                 $diahoje=date('d-m-Y');
                 $ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));
                 
                 
                 $datapesquisa2inicial="01/".$mes."/".$ano;
$datapesquisa2final=$ultimodia."/".$mes."/".$ano;


?>






<center>

<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Plano Mensal</font></center>
<?



$ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));




//$numeroDeDias = intval(date("t",$mes));

//echo "dias:$numeroDeDias";





 $contadoritem=$ultimodia;
 $contadoriteminicial="1";


if (!IsSet($escolha) or ($escolha=="1")){
?>


<select name="fabricapesquisa" style="background-color:#8B8378;color: white;">
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


    <select style="background-color:#8B8378;color: white;"  name="mes" >
   	 <option value="<?echo $mes;?>">Mês:<? echo $mes;?></option>
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
	


    <input style="background-color:#8B8378;color: white;" type="txt" name="ano"  size="5" value="<?echo $ano;?>">
    
    <select name="equipamentoescolha" style="background-color:#8B8378;color: white;">
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

    <select style="background-color:#8B8378;color: white;"  name="grupoordens" >
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



  <input  type="submit"   VALUE="Buscar">
  <hr>
  
  <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">
<tr>
 <td>Equipamentos</td>
 
 
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
        AND TRUNC(OC.DATA_PLANE) >= '$datapesquisa2inicial'
       AND TRUNC(OC.DATA_PLANE) <= '$datapesquisa2final'
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
     WHERE TRUNC(EC.DATA_INICIO) >= '$datapesquisa2inicial'
       AND TRUNC(EC.DATA_INICIO) <= '$datapesquisa2final'
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
     WHERE TRUNC(EC.DATA_INICIO) >= '$datapesquisa2inicial'
       AND TRUNC(EC.DATA_INICIO) <= '$datapesquisa2final'
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
        AND TRUNC(OC.DATA_PLANE) >= '$datapesquisa2inicial'
       AND TRUNC(OC.DATA_PLANE) <= '$datapesquisa2final'
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

$contadoriteminicial="1";
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
             <a href="CONSULTAplanomes.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomes.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
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
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
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





<input type="button" onclick="Botao2()" value="Retornar"></input>
<?
}
?>


</form>


  




