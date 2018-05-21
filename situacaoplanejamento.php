<html>
<head>
<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var funcaochegando = what.value;
      document.location=(funcaochegando);
   }
}
</Script>


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



#primeiro{
margin-top: 5px;
margin-left: 12px;
left: 50%;
top: 10%;
position: fixed;
background-color:blue"
}

#segundo{
margin-top: 5px;
margin-left: 12px;
left: 50%;
top: 10%;
position: fixed;
background-color:blue"
}




</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="situacaoplanejamento.php";
document.forms.nome_formulario.submit();
}
</script>



<script>
function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}




</script>

</head>

<form action="situacaoplanejamento.php" method="POST" name="nome_formulario">

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
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$contador=$_GET['contador'];
$data1=$_GET['data1'];
$data2=$_GET['data2'];
$year=$_GET['year'];
$month=$_GET['month'];
$dia=$_GET['dia'];
$datainicio=$_GET['datainicio'];

$yearf=$_GET['yearf'];
$monthf=$_GET['monthf'];
$diaf=$_GET['diaf'];

$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$sequenciarecebe=$_GET['sequenciarecebe'];
$statusacao=$_GET['statusacao'];
$padraoexecucao=$_GET['padraoexecucao'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$pedidoaltera=$_GET['pedidoaltera'];
$vercalendario=$_GET['vercalendario'];
$acessoudiacalendario=$_GET['acessoudiacalendario'];

$ficanatela=$_GET['ficanatela'];

$vertudopendente=$_GET['vertudopendente'];



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

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

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$executor=$_POST['executor'];
$ordem=$_POST['ordem'];
$banco=$_POST['banco'];
$acao=$_POST['acao'];
$sequenciarecebe=$_POST['sequenciarecebe'];
$hora=$_POST['hora'];
$hora2=$_POST['hora2'];
$meutexto=$_POST['meutexto'];
$fecharsoli=$_POST['fecharsoli'];
$velocidade1=$_POST['velocidade1'];
$velocidadepadrao=$_POST['velocidadepadrao'];
$solicitantepesquisa=$_POST['solicitantepesquisa'];
$mantenedor=$_POST['mantenedor'];
$maquina=$_POST['maquina'];
$atividade=$_POST['atividade'];


$datainicio=$_POST['datainicio'];
$datafinal=$_POST['datafinal'];
$contador=$_POST['contador'];

$ficanatela=$_POST['ficanatela'];

}



require("configuraoracle.php");
require("estilo2.css");
require("configuramysql.php");



  if (!IsSet($year)){
   $year=date('Y');
  }

  if (!IsSet($month)){
   $month=date('m');

  }

  if (!IsSet($dia)){
   $dia="01";
  }

  if (!IsSet($contador)){
   $contador="0";
  }
  
  if (!IsSet($acessoudiacalendario)){
   $acessoudiacalendario="nao";
  }




  
  if ($acessoudiacalendario=="sim")
  {
      $contador=$contador+1;
  }
  
  
  if (!IsSet($ficanatela)){
   $ficanatela="sim";
  }

  if (!IsSet($vertudopendente)){
   $vertudopendente="sim";
  }
  
  
   if (!IsSet($solicitantepesquisa)){
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA IN (SELECT MIN(CD_FABRICA)
                 FROM FABRICAS)";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }
  else
  {
     $solicitantepesquisa=trim($solicitantepesquisa);

     $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA='$solicitantepesquisa'";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }




  //echo "contador:$contador//FICA NA TELA:$ficanatela//data inicio:$datainicio//data final:$datafinal";


if ($vertudopendente=="sim"){
 $anoinicio=$year-1;
 $mesfinal=$month;
 

 
                   $result2pegadata1= "SELECT TO_CHAR(MIN(OC.DATA_PLANE),'DD/MM/YYYY') DATA
                   FROM ATIVIDADES A,ROT_COMPO RC,ORDEM_COMP OC,COMPONENTE_AUXILIAR CA, MAQUINAS MA
                   WHERE A.CD_ATIVIDADE = RC.CD_ATIVIDADE
                   AND RC.ATIVIDADE_ATIVA = 'S'
                   AND RC.CD_COMPONENTE = OC.CD_COMPONENTE
                   AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
                   AND OC.CD_COMPONENTE = CA.CD_COMPO
                   AND CA.CD_MAQUINA = MA.CD_MAQUINA
                   AND OC.STATUS <> 'B' AND
                   OC.CD_FABRICA='$solicitantepesquisa'";
                   $result3DTA = @OCIParse($ora_conexao,$result2pegadata1);
				   @OCIExecute($result3DTA, OCI_DEFAULT);
				   while (OCIFetchInto($result3DTA,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				   {
                     $datainicio=ociresult($result3DTA, "DATA") ;
                   }


                   if ($mesfinal <"10"){$mesfinal=substr($mesfinal,1,1);}

                   $contador66mese= "SELECT qt_dias DIAS from meses_bi where cd_mes='$mesfinal'";
                   $resmese = mysql_db_query($banco,$contador66mese,$conexao);
                   $valor8mese=mysql_fetch_array($resmese);
                   $datafinalmes=$valor8mese["DIAS"];





                   $datafinal=$datafinalmes."/".$mesfinal."/".$year;




}
else
{




     if ($ficanatela=="sim"){

                  if ($contador=="0"){
                   $datainicio="01/".$month."/".$year;
                   
                   if ($month <"10"){$mesfinal=substr($month,1,1);}

                   $contador66mese = "SELECT qt_dias DIAS from meses_bi where cd_mes='$mesfinal'";
                   $resmese = mysql_db_query($banco,$contador66mese,$conexao);
                   $valor8mese=mysql_fetch_array($resmese);
                   $datafinalmes=$valor8mese["DIAS"];



                   $datafinal=$datafinalmes."/".$month."/".$year;
                   $datainiciograva=$datainicio;
                  }



                  if ($contador=="1"){

                   if ($acessoudiacalendario=="sim"){
                      $datainicio=$dia."/".$month."/".$year;
                      $datainiciograva=$datainicio;
                   }
                   else
                   {

                     $datainicio=$datainicio;


                   }



                  }


                  if ($contador=="2"){

                   $datafinal=$dia."/".$month."/".$year;
                   $datainicio=$datainicio;


                  }



        }


}

  if ($mespesquisa=="8"){$mespesquisamostra="Agosto";}
  if ($mespesquisa=="5"){$mespesquisamostra="Maio";}
  if ($mespesquisa=="1"){$mespesquisamostra="Janeiro";}
  if ($mespesquisa=="2"){$mespesquisamostra="Fevereiro";}
  if ($mespesquisa=="3"){$mespesquisamostra="Março";}
  if ($mespesquisa=="4"){$mespesquisamostra="Abril";}
  if ($mespesquisa=="6"){$mespesquisamostra="Junho";}
  if ($mespesquisa=="7"){$mespesquisamostra="Julho";}
  if ($mespesquisa=="9"){$mespesquisamostra="Setembro";}
  if ($mespesquisa=="10"){$mespesquisamostra="Outubro";}
  if ($mespesquisa=="11"){$mespesquisamostra="Novembro";}
  if ($mespesquisa=="12"){$mespesquisamostra="Dezembro";}



 
 ?>
 
  <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="mes2" value="12">
		<input type="hidden" name="tipoconsulta" value="<?echo $tipoconsulta;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="variacao3" value="<?echo $variacao3;?>">
		<input type="hidden" name="descricaocurva" value="<?echo $descricaocurva;?>">
		<input type="hidden" name="valorpeso" value="<?echo $valorpeso;?>">
		<input type="hidden" name="vertudopendente" value="<?echo $vertudopendente;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="dia" value="<?echo $dia;?>">







 <center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Status  Planejamento</font></br>



                 <select name="solicitantepesquisa" onchange="this.form.submit()" style="background-color:#8B8378;color: white;">


                 <option value="<?echo $solicitantepesquisa;?>">Empresa:<?echo $solicitantepesquisa;?></option>


				 <?
                 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS order by DS_FABRICA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}</option>";
                 }
				 ?>
				 </select>


                 <?$datainicio=trim($datainicio);?>

				 <input type="hidden"  name="datainicio" value="<?echo $datainicio;?>" size="7"  >


                 <input type="hidden"   name="datafinal" value="<?echo $datafinal;?>"   size="7" >


                 <input type="txt"    name="datamostra" value="<?echo $datainicio;?> a <?echo $datafinal;?>" onchange="this.form.submit()"  size="19" style="background-color:#8B8378;color: white;" disabled >








                 <select name="maquina" onchange="this.form.submit()" style="background-color:#8B8378;color: white;">


                 <option value="<?echo $maquina;?>">Equipamento:<? echo $maquina;?></option>
                 <option value="">Todos</option>

				 <?
				 

                 
                 
                 $result2 = "SELECT distinct a.cd_componente CODIGO,b.ds_compo DESCRICAO
                 FROM ordem_comp a,componente_auxiliar b WHERE a.cd_componente=b.cd_compo and
                 a.cd_fabrica='$solicitantepesquisa' order by b.ds_compo asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CODIGO"]}\">{$row["CODIGO"]}</option>";
                 }
				 ?>
				 </select>
				 

                 <select name="atividade" onchange="this.form.submit()" style="background-color:#8B8378;color: white;">


                 <option value="<?echo $atividade;?>">Atividade:<? echo $atividade;?></option>
                 <option value="">Todas</option>

				 <?




                 $result2 = "SELECT distinct a.cd_atividade CODIGO,b.ds_atividade DESCRICAO
                 FROM ordem_comp a,atividades b WHERE a.cd_atividade=b.cd_atividade and
                 a.cd_fabrica='$solicitantepesquisa' order by b.ds_atividade asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CODIGO"]}\">{$row["CODIGO"]}</option>";
                 }
				 ?>
				 </select>
				 
				 <a href="situacaoplanejamento.php?navegando=sim&vercalendario=sim&contador=0&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=<?ECHO $month;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&ficanatela=sim&vertudopendente=nao">Calendário</a>


             |<a href="situacaoplanejamento.php?navegando=sim&vercalendario=nao&contador=0&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=<?ECHO $month;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&ficanatela=nao&vertudopendente=sim">Pendencia</a>




<?



if (!IsSet($escolha) or ($escolha=="1")  ){


                                  $sgrava1= OCIParse($ora_conexao, "DELETE FROM situacao_planej");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);


$fabrica=$solicitantepesquisa;

if (($datainicio=="//") or ($datafinal=="//"))
{
?></br><center><font style='font-size: 15px;color: red;text-align:left;bold: Negrito' >
<?echo "Defina um Intervalo Válido de Datas...";?></font>
<?
}
else
{



$query = ("BEGIN sit_plan(:P_FABRICA,:P_AREA,:P_CENTRO,:P_FAMILIA,:P_MAQUINA,:P_COMPO,:P_TIPO,:P_DATA1,:P_DATA2); END;");
             $executa= @OCIParse($ora_conexao,$query);
             OCIBindByName($executa,":P_FABRICA" , $fabrica,30);
             OCIBindByName($executa,":P_AREA" , $area,30);
             OCIBindByName($executa,":P_CENTRO" , $centro,30);
             OCIBindByName($executa,":P_FAMILIA" , $familia,30);
             OCIBindByName($executa,":P_MAQUINA" , $maquina,30);
             OCIBindByName($executa,":P_COMPO" , $componente,30);
             OCIBindByName($executa,":P_TIPO" , $tipo,30);
             OCIBindByName($executa,":P_DATA1" , $datainicio,30);
             OCIBindByName($executa,":P_DATA2" , $datafinal,30);
             @OCIExecute($executa);
}

?>
</br></br>

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">


 <tr>


    			<th>Equipamento</th>
                <th>Atividade</th>
                <th>Descrição</th>
                <th>Intervalo</th>
                <th>Unid.</th>
                <th>Acumulado</th>
                <th>Diferença</th>
                <th>Nr ordem</th>
                <th>Situação</th>




   </tr>
<?


 
 $s = OCIParse($ora_conexao, "select CD_COMPONENTE COMPO,CD_ATIVIDADE ATIVIDADE1,DS_ATIVIDADE ATIVIDADE2,
 INTERVALO,CD_INTERVALO,ACUMULADO,DIFERENCA,SITUACAO,NUMERO_ORDEM
 FROM SITUACAO_PLANEJ where CD_ATIVIDADE like '%$atividade%'");

 OCIExecute($s, OCI_DEFAULT);
 While (OCIFetch($s)) {
      $codigocomponente=ociresult($s, "COMPO") ;
      $codigoatividade=ociresult($s, "ATIVIDADE1") ;
      $descricaoatividade=ociresult($s, "ATIVIDADE2") ;
      $intevalo=ociresult($s, "INTERVALO") ;
      $unidintevalo=ociresult($s, "CD_INTERVALO") ;
      $acumulado=ociresult($s, "ACUMULADO") ;
      $diferenca=ociresult($s, "DIFERENCA") ;
      $situacao=ociresult($s, "SITUACAO") ;
      $numeroordem=ociresult($s, "NUMERO_ORDEM") ;
      


          ?>
			<tr>
					<td ><?echo $codigocomponente;?></td>
                    <td ><?echo $codigoatividade;?></td>

					<td ><?echo $descricaoatividade;?></td>
					<td ><?echo $intevalo;?></td>
					<td ><?echo $unidintevalo;?></td>
					<td ><?echo $acumulado;?></td>
					<td ><?echo $diferenca;?></td>
                    <td ><?echo $numeroordem;?></td>
                    <?
                    if ($situacao=="VENCIDO"){$cor="red";}
                    if ($situacao=="EM AVISO"){$cor="YELLOW";}
                    if ($situacao=="BOM"){$cor="GREEN";}
                    ?>




                    <td BGCOLOR=<?echo $cor;?> ><font style='font-size: 12px;color:BLACK;text-align:left;bold: Negrito' >
                    <?echo $situacao;?></td>




           <?}?>
           </tr>
 </table>



<?
}//final da tela de abertura






if ($vercalendario=="sim" and $contador <"2"){

?>
</br></br>

<div style="display: block;" id="primeiro">



<?
$programa="situacaoplanejamento.php";



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

               $year=date('Y');




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



        </br></br></br>

        <table border="0" width="176" align="center" style="border-width:1px">
        <tr>
        <td  style="border-width:1px">
        <table width="175" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="silver">
        <tr bgcolor="#f5f5f5">
            <td colspan="7" align="left"><font size="2" face="verdana">


            <b><? echo "$month_name $year"; ?></b></font>
            <?$proximo=$year+1;$anterior=$year-1;?>

            <a href="<?echo $programa;?>?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&year=<?ECHO $proximo;?>&localbanco=<?ECHO $localbanco;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&vercalendario=sim&vertudopendente=nao">+</a>

             <a href="<?echo $programa;?>?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&year=<?ECHO $anterior;?>&localbanco=<?ECHO $localbanco;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&vercalendario=sim&vertudopendente=nao">-</a>



             
             <a href="situacaoplanejamento.php?navegando=sim&vercalendario=nao&codigoempresa=<?ECHO $codigoempresa;?>&mudoumes=nao&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=<?ECHO $month;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&vertudopendente=nao">-----Fechar</a>
             </br>
             


             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=1&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Jan</a>
             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=2&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Fev</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=3&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Mar</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=4&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Abr</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=5&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Mai</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=6&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Jun</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=7&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Jul</a>


             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=8&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Ago</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=9&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Set</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=10&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Out</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=11&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Nov</a>

             <a href="<?echo $programa;?>?navegando=sim&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&month=12&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&year=<?echo $year;?>&contador=<?echo $contador;?>&datainicio=<?echo $datainicio;?>&vertudopendente=nao">Dez</a>

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
               if ($contador=="3"){

               ?>
              <td <?=$bg?> align="center"><font color=#0000CD><?=$d?></a></td>
              <?
              }
              else
              {




              ?>

             <td <?=$bg?> align="center"><font color=#0000CD>
             <a href="situacaoplanejamento.php?navegando=sim&escolha=1&vercalendario=sim&codigoempresa=<?ECHO $codigoempresa;?>&contador=<?echo $contador;?>&banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>&tipoconsulta=<?ECHO $tipoconsulta;?>&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>&dia=<?echo $d;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&month=<?echo $month;?>&codigousuario=<?echo $codigousuario;?>&dataanterior=<?echo $dataanterior;?>&mesanterior=<?echo $mesanterior;?>&year=<?echo $year;?>&acessoudiacalendario=sim&datainicio=<?echo $datainicio;?>&ficanatela=<?echo $ficanatela;?>&vertudopendente=nao"><?=$d?></a>
             </td>

          <?
          }

          }


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
           
           </br>
           </table>


</div>

<?}//final quando mostra calendario e a data vai verais
else
{
//quando a data nao vai mais variar sempre buscar no calendario
$ficanatela="nao";

}
?>

<input type="hidden" name="ficanatela" value="<?echo $ficanatela;?>">

</form>
</html>

