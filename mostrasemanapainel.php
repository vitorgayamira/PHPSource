<?
if (!IsSet($ano)){
$ano=date('Y');
}


if (!IsSet($mes)){
$mes=date('m');
}



   /*
   if ($banco=="malharia"){
    $mes="01";
    $month="01";
    $turno="1";
    require("GRAVAR_DIAS_SEMANA.php");
     echo "terminou";
   }
   exit;
   */

if (!IsSet($grupoordens)){
$grupoordens="P";
}



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




    $diahojeteste=date('d');

    $achadianovo1dd= "SELECT a.nr_sequencia SEQUENCIA,a.NR_DIA_INICIAL DIA1,a.NR_DIA_FINAL DIA2,a.NR_SEMANA SEMANA
    from aux_semana a,meses_bi b
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




 
 
 $datapesquisainicial=$primeirodia."/".$month."/".$ano;
 $datapesquisafinal=$ultimodia."/".$month."/".$ano;
 



?>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">
<tr>
 <th>TAG</th>
 <th>Equipamento</th>
 
 
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
<?
  $sachaequide4 = OCIParse($ora_conexao, "SELECT DS_COMPO FROM   COMPONENTE_AUXILIAR
                      WHERE CD_COMPO='$compo1'");
                      OCIExecute($sachaequide4, OCI_DEFAULT);
                      While (OCIFetch($sachaequide4)) {
                          $componentedescricao5=ociresult($sachaequide4, "DS_COMPO") ;

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
             <a href="CONSULTAplanomessemanapainel.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&componente=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a>

             </td>
             <?
             }
             ELSE
             {
              ?>
              <td>
             <a href="CONSULTAplanomessemanapainel.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&semanapegou=<?ECHO $semanapegou;?>&semanapegoumostrar=<?ECHO $semanapegoumostrar;?>&componente=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
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

</form>


  




