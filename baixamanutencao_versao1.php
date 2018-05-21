<head>

<style>

body, table {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 color: #000000;
}

.menu {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 10px;
 font-weight: normal;
 color: #000033;
 background-color: white;
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
 padding: 10px;
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
 width: 100%;
 height: 460px;
}


</style>

<script language="JavaScript">

 function stAba(menu,conteudo)
 {
  this.menu = menu;
  this.conteudo = conteudo;
 }

 var arAbas = new Array();
 arAbas[0] = new stAba('td_cadastro','div_cadastro');

 arAbas[1] = new stAba('td_consulta2','div_consulta2');

 arAbas[2] = new stAba('td_manutencao','div_manutencao');
 arAbas[3] = new stAba('td_manutencao2','div_manutencao2');
 arAbas[4] = new stAba('td_manutencao3','div_manutencao3');
 arAbas[5] = new stAba('td_manutencao4','div_manutencao4');





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

</script>

</head>


<form action="conexao_baixaordem.php" method="POST">
<body onLoad="AlternarAbas('td_cadastro','div_cadastro')">


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

}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
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
            $fabricantepesquisa=$_POST['fabricantepesquisa'];
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


}

                           $sgrava1= OCIParse($ora_conexao, "DELETE FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


if ($escolha=="1"){

            if ($contador=="1"){
              $data1=$dia;
              $valorescolha="1";
              $valorcontador="2";

            }
            if ($contador=="2"){
              $data2=$dia;
              $valorescolha="1";
              $valorcontador="3";


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


if (!IsSet($atual)){
//echo "mes:$month//ano:$year//dia:$data1//dia2:$data2//fabrica:$fabricapesquisa//maquina:$maquinapesquisa";
$atual="Todas as Ordens em Aberto";
$datapesquisa1=$data1."/".$month."/".$year;
$datapesquisa2=$data2."/".$month."/".$year;

}

if ($_POST[avanca]) {
 $atual="Iniciando Baixa";
 echo "$atual";

}
if ($_POST[busca]) {
$atual="Selecionando Ordens";
echo "$atual";
 }

if ($_POST[finalpeca]) {
$atual="Finalizando Baixa";
}






if ($atual=="Selecionando Ordens"){

           if ($data1 >"0"){
           echo "grava o perido selecionado";
           
           $sgrava1= OCIParse($ora_conexao, "DELETE FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           
                           
           $datapesquisa1=$data1."/".$month."/".$year;
           $datapesquisa2=$data2."/".$month."/".$year;
           
           echo "INSERT INTO AUX_BAIXAORDEM (CD_USUARIO,CD_EMPRESA,DT_INICIO,DT_FINAL)
                            VALUES ('$codigousuario','$fabricapesquisa', '$datapesquisa1','$datapesquisa2')";
                            
                            
           $sgrava1= OCIParse($ora_conexao, "INSERT INTO AUX_BAIXAORDEM (CD_USUARIO,CD_EMPRESA,DT_INICIO,DT_FINAL)
                            VALUES ('$codigousuario','$fabricapesquisa', '$datapesquisa1','$datapesquisa2')");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);

           }

}

if ($atual=="Finalizando Baixa"){


 

                            $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET STATUS='B',DATA_INICIO='$databaixa',DATA_TERMINO='$databaixa'
                            WHERE NUMERO_ORDEM='$ordembaixa'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            
                            $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET STATUS='B',DATA_INICIO='$databaixa',DATA_FIM='$databaixa'
                            WHERE NUMERO='$ordembaixa'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);


}






?>

<center><font style='font-size: 23px;color: black;text-align:center;bold: Negrito' >Baixa de Ordens</font></br>

<table width="100%" height="450" cellspacing="0" cellpadding="0"
border="0" style="border-left: 1px solid #000000;">
 <tr>
  <td height="5"  class="menu" id="td_cadastro"
  onClick="AlternarAbas('td_cadastro','div_cadastro')">
   Parametrização
  </td>

  <td height="5"  class="menu" id="td_consulta2"
  onClick="AlternarAbas('td_consulta2','div_consulta2')">
   Ordens Selecionadas
  </td>
  <td height="5"  class="menu" id="td_manutencao"
  onClick="AlternarAbas('td_manutencao','div_manutencao')">
   Funcionários
  </td>
  <td height="5"  class="menu" id="td_manutencao2"
  onClick="AlternarAbas('td_manutencao2','div_manutencao2')">
   Materiais/Peças
  </td>
  <td height="5"  class="menu" id="td_manutencao3"
  onClick="AlternarAbas('td_manutencao3','div_manutencao3')">
    Serviço Terceiros
  </td>
  <td height="5"  class="menu" id="td_manutencao4"
  onClick="AlternarAbas('td_manutencao4','div_manutencao4')">
   Defeitos
  </td>


 </tr>
 


 <tr>
  <td height="20" class="tb-conteudo" colspan="8">
   <div id="div_cadastro" class="conteudo" style="display: none">





         <?



		
		
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


               //$data = date('Y-m-d');
               $year="2012";



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
        <table border="0" width="176" align="center" style="border-width:1px">
        <tr>
        <td  style="border-width:1px">
        <table width="175" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="silver">
         <tr bgcolor="#f5f5f5">
            <td colspan="7" ><font size="2" face="verdana"><b><b><b><b><b><b>
                 <?
                 if ($contador=="2"){?>



                 <font style='font-size: 10px;color: blue;text-align:left;bold: Negrito' >

                 Unidades</br>
                 <select name="fabricapesquisa">
                 <option value="">Todas</option>
                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select></BR>


				 Máquina</br>
                 <select name="maquinapesquisa">
                 <option value="">Todas</option>
                 <?



				 $result2 = "SELECT a.CD_MAQUINA MAQUINA FROM MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 where a.CD_CENTRO=b.cd_centro and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area
                 AND a.cd_maquina in (select DISTINCT CD_MAQUINA
                 FROM EMER_COMP
                 WHERE STATUS='G')";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["MAQUINA"]}\">{$row["MAQUINA"]}</option>";
                 }
				 ?>
				 </select></BR>





				 Numero da Ordem</br>
                 <input type="TXT" name="numeroordem" value="Todas"></BR>


                 <?

                         $quantosfabricas199 = OCIParse($ora_conexao, "SELECT MAX(dt_inicio) DATA1,MAX(dt_final) DATA2 from
                         AUX_BAIXAORDEM WHERE CD_USUARIO='$usuario'");


                        OCIExecute($quantosfabricas199, OCI_DEFAULT);
                        While (OCIFetch($quantosfabricas199)) {
                            $datapesquisa1=ociresult($quantosfabricas199, "DATA1") ;
                            $datapesquisa2=ociresult($quantosfabricas199, "DATA2") ;
                        }
                        $datapesquisa1=$data1."/".$month."/".$year;
                        $datapesquisa2=$data2."/".$month."/".$year;

                        ?>
                        Período Selecionado:<? echo $datapesquisa1;?> Até <? echo $datapesquisa2;?>
                        </font>

        <input type="hidden" name="escolha" value="avancando3">
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

        <center><input  type="submit"  name="busca" VALUE="Buscar ordens"></br></br></br></br>
        <?}
        ?>


            <a href="conexao_baixaordem.php?cliente=maximiza&baseoracle=vit&escolha=<?echo $valorescolha;?>&contador=<?echo $valorcontador;?>&month=<?echo $month+1;?>&fabricapesquisa=<?echo $fabricapesquisa;?>&codigousuario=<?echo $codigousuario;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>&banco=<?ECHO $banco;?>"><img width=15 height=15 BORDER=1 src="messeguinte.jpg"></a>

            <? echo "$month_name $year"; ?>
            <a href="conexao_baixaordem.php?cliente=maximiza&baseoracle=vit&escolha=<?echo $valorescolha;?>&contador=<?echo $valorcontador;?>&month=<?echo $month-1;?>&fabricapesquisa=<?echo $fabricapesquisa;?>&codigousuario=<?echo $codigousuario;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>&banco=<?ECHO $banco;?>"><img width=15 height=15 BORDER=1 src="mesanterior.jpg"></a>
            </font></td>
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
         else
         {


		  ?>
          <td <?=$bg?> align="center"><font color=#0000CD><a href="conexao_baixaordem.php?cliente=maximiza&baseoracle=vit&escolha=<?echo $valorescolha;?>&contador=<?echo $valorcontador;?>&month=<?echo $month;?>&dia=<?echo $d;?>&data1=<?echo $data1;?>&year=<?echo $year;?>&fabricapesquisa=<?echo $fabricapesquisa;?>&codigousuario=<?echo $codigousuario;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>&banco=<?ECHO $banco;?>"><?=$d?></a></td>
        <?
         }

          } ?>

          <?
          if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
          {
          ?>
         </tr>
         <tr align="center">
          <?   }}
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


         


		





   </div>
   









   <div id="div_consulta2" class="conteudo" style="display: none">

   <?
                       $contadorordem="0";
                       $s = OCIParse($ora_conexao, "select  NUMERO,CD_MAQUINA MAQUINA,DATA_INICIO DATA,CD_FABRICA,CD_ATIVIDADE,CD_COMPONENTE
                       FROM EMER_COMP
                       where STATUS='G' AND
                       CD_FABRICA  in ( select DISTINCT CD_EMPRESA FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario')  AND
                       data_INICIO <= (select MAX(DT_FINAL) FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario') and
                       data_INICIO >= (select MIN(DT_INICIO) FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario')
                       union
                       select  NUMERO_ORDEM NUMERO,CD_MAQUINA MAQUINA,DATA_PLANE DATA,CD_FABRICA ,CD_ATIVIDADE,CD_COMPONENTE FROM ORDEM_COMP
                       where STATUS='G' AND
                       CD_FABRICA  in ( select DISTINCT CD_EMPRESA FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario')  AND
                       DATA_PLANE <= (select MAX(DT_FINAL) FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario')
                       and
                       DATA_PLANE >= (select MIN(DT_INICIO) FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario')
                       ");




        
                         
        ?>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="40%">

    <tr>
    <th>Unidade</th>
    <th>Nr.Ordem</th>
	<th>Codigo Maquina</th>
	<th>Codigo Atividade</th>
	<th>Codigo Componente</th>

	<th>Data Planejada Execução</th>
	<th>selecao</th>

    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $ordem=ociresult($s, "NUMERO") ;
      $contadorordem=$contadorordem+1;
      ?>
      <tr>
      <td><center><? echo ociresult($s, "CD_FABRICA");?></td>
      <td><center><? echo ociresult($s, "NUMERO");?></td>
      <td><center><? echo ociresult($s, "MAQUINA");?></td>
      <td><center><? echo ociresult($s, "CD_ATIVIDADE");?></td>
      <td><center><? echo ociresult($s, "CD_COMPONENTE");?></td>
      <td><center><? echo ociresult($s, "DATA");?></td>
      <td ><input type="radio" name="listaordem[]"   value="<?echo $ordem;?>"></td>

      </tr>
      <?

  }
  ?>
  </table>
  
    <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">
    <input type="hidden" name="atual" value="<?echo $atual;?>">
    <input type="hidden" name="datapesquisa1" value="<?echo $datapesquisa1;?>">
    <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">


   <input  type="submit" name="avanca"  VALUE="Iniciando Baixa">

   </div>

  <div id="div_manutencao" class="conteudo" style="display: none">


  <?echo "Em Construção";?>


  </div>

  <div id="div_manutencao2" class="conteudo" style="display: none">


  <?

  if ($atual=="Iniciando Baixa"){

               $listaordemselecionada=$listaordem[0];
                            echo "Ordem Selecionada:$listaordemselecionada</br>";


    ?>

    <input type="TXT" name="ordembaixa" value="<?echo $listaordemselecionada;?>">


  Peça:<input type="txt" name="peca">
  Quantidade:<input type="txt" size="5" name="quantidadepeca" value="0">

  Data Baixa:<input type="TXT" name="databaixa" value="xx/xx/xxxx">

  <input type="hidden" name="atual" value="<?echo $atual;?>">
  <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">

  <input  type="submit" name="finalpeca"  VALUE="Finalizar Baixa">


  <?}?>


  </div>

<div id="div_manutencao3" class="conteudo" style="display: none">
<table>
<?echo "Em Construção";?>
</table>


</div>

<div id="div_manutencao4" class="conteudo" style="display: none">
<?echo "Em Construção";?>
</div>

<div id="div_manutencao5" class="conteudo" style="display: none">
<?echo "Em Construção";?>
</div>


</table>

		
</body>
</form>

