<HEAD>

<style type="text/css">
 BODY { background-image: url("fundotela.jpg");}
</style>
</HEAD>

<BODY>
<form action="<? echo $programa;?>" method="POST">


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


}
if ($pagina >"1"){
$mes=$pagina;
}

if (!IsSet($ano)){
$ano=date('Y');
}




//ECHO "Base Oracle:$banco - Local:$localbanco - Ambiente:$ambiente</br>";
require("configuraoracle.php");
//require("estilo2.css");
//require("estilonavegacaofundo.css");



 $programa="CONSULTAatividadesordens.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 $numeroregistropagina="12";
 $ultimo="144";
 ?>
    </br><center>
 <?
require("PAGINACAOmes.php");
$mes=$pagina;


 ?>


<CENTER><font style='font-size: 23px;color: BLACK;text-align:left;bold: Negrito' >Plano Mensal de Manutenção</font></BR>

<?



$ultimodia=date("t", mktime(0, 0, 0, $mes, 1, $ano));




//$numeroDeDias = intval(date("t",$mes));

//echo "dias:$numeroDeDias";



if (!IsSet($fabricaescolha)){
   $sachafabrica = OCIParse($ora_conexao, "SELECT MIN(CD_FABRICA) FABRICA FROM  FABRICAS");
   OCIExecute($sachafabrica, OCI_DEFAULT);
   While (OCIFetch($sachafabrica)) {

          $fabricaescolha=ociresult($sachafabrica, "FABRICA") ;

   }
}

 $contadoritem=$ultimodia;
 $contadoriteminicial="1";

?>




<h2>
<font style='font-size: 15px;color: black;text-align:left;bold: Negrito' >
Unidade de Negócio:<? echo $fabricaescolha; ?></br>
Ano:<? echo $ano; ?></br>
Mes:<? echo $mes; ?></br>
Tipo de Ordens:<?  if($grupoordens=="T"){$mostraordem="Preventiva/Corretiva";}
if($grupoordens=="P"){$mostraordem="Preventiva";}
if($grupoordens=="C"){$mostraordem="Corretiva";}

echo $mostraordem; ?></br>
</h2>

 <font style='font-size: 10px;color: black;text-align:left;bold: Negrito' >



<a href="<?echo $programa;?>?pagina=1&escolha=mudandomes&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1  src="calendario2.GIF" alt="Defina Parametro para consulta">
</a>





<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&mes=<?echo $mes;?>&projeto=<?echo $projeto;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&mes=<?echo $mes;?>&proejto=<?echo $projeto;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<?


if (!IsSet($escolha) or ($escolha=="1")){ 


?>


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

	
$datapesquisa2inicial="01/".$mes."/".$ano;
$datapesquisa2final=$ultimodia."/".$mes."/".$ano;

$compoanterior="XXX";

if (!IsSet($grupoordens)){
$grupoordens="T";
}


       
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'
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
       FA.CD_FABRICA='$fabricaescolha'");

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
       FA.CD_FABRICA='$fabricaescolha' and
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
       FA.CD_FABRICA='$fabricaescolha'
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
            ?>
	         <td><h1 style='font-size: 8px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$ativi1";?>
             <?echo "/$dia1iniciobaixa";?></h1>



             </td>
           <?
           }
           ELSE
           {
            ?>
	         <td><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?>
             <a href="conexao_baixaordem.php?pagina=1&escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>">Baixar</a>

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

}//FINAL  dos componnete se ativiadade
?>
</table>
<?
}//FINAL DA PRIMEIRA TELA


if ($escolha=="mudandomes"){ 


?>
<h1 style='font-size: 15px;color: black;bold: Negrito text-decoration: none' >
Etapa-1 Definindo Novos Parametros de Busca</br></br></br></h1>

Unidade de Negócio<select name="fabricaescolha">
                 <?
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by cd_fabrica asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>


    Mes:<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mes" >
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


    Ano:<input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">

   Grupo de Ordens:<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="grupoordens" >
    <option value="C">Não Planejadas</option>
    <option value="P">Planejadas</option>
    <option value="T">Todas</option>
 	</select>

        </br>


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorcentro" value="<?echo $contadorcentro;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
		<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
        <input type="hidden" name="escolha" value="1">
  
  <input  type="submit"   VALUE="Consultar">
<?
}//TERMINA QUANDO ESCOLHE MES E TURNO 



?>
</form>
</BODY>

  




