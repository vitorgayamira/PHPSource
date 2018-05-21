<?
//session_start();
require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>

<head>

<script language=javascript>

cont = 0;
function CheckAll2() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'lista[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

cont = 0;
function CheckAll3() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listamodelo[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

cont = 0;
function CheckAll4() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listafamilia[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

cont = 0;
function CheckAll5() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listafabricante[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

cont = 0;
function CheckAll6() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listaano[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}

</script>



</head>


<form action="consultamaquinaversa2.php" name="formulario" method="POST">


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
            $contadormodelo=$_POST['contadormodelo'];
            $contadorfabricante=$_POST['contadorfabricante'];
            $contadorfabricante=$_POST['contadorfabricante'];
            $contadorano=$_POST['contadorano'];


            $listamodelo=$_POST['listamodelo'];
            $listafamilia=$_POST['listafamilia'];
            $lista=$_POST['lista'];
            $listafabricante=$_POST['listafabricante'];
            $listaano=$_POST['listaano'];
            $baseoracle=$_POST['baseoracle'];

}


                  if (!IsSet($modelopesquisa)){$modelopesquisa="Todos";}
                  if (!IsSet($anopesquisa)){$anopesquisa="Todos";}
                  if (!IsSet($fabricantepesquisa)){$fabricantepesquisa="Todos";}
                  if (!IsSet($ativopesquisa)){$ativopesquisa="Todos";}
                  if (!IsSet($seriepesquisa)){$seriepesquisa="Todos";}
                  if (!IsSet($patrimoniopesquisa)){$patrimoniopesquisa="Todos";}
                  if (!IsSet($localizacaopesquisa)){$localizacaopesquisa="Todos";}
                  if (!IsSet($familiapesquisa)){$familiapesquisa="";}


if ($_POST[avanca]) {
 $atual="A";
 }
if ($_POST[busca]) {
$atual="B";
  }
  if ($_POST[inicio]) {
$atual="I";
$msotratitulo="Todos os Equipamentos da Base";
  }
  
if ($_POST[inativos]) {
$atual="INATIVAS";
$msotratitulo="Todos os Equipamentos Inativos";
  }
  
  if ($_POST[ativos]) {
$atual="ATIVOS";
$msotratitulo="Todos os Equipamentos Ativos";
  }

if (!IsSet($atual)){
$msotratitulo="Todos os Equipamentos da Base";
}

ECHO "base Oracle:$baseoracle</br>";

if (!IsSet($atual) or $atual=="I"){

                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);
?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando </font><?ECHO "$msotratitulo";?></br>

                  <input type="hidden" name="banco" value="<?echo $banco;?>">
		          <input type="hidden" name="continuarmesmatela" value="sim">
		          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		          <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
                  <input type="hidden" name="escolha" value="conteudo1">
                  <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">


<input  type="submit" name="avanca"  VALUE="Definir Filtro">
<input  type="submit" name="inativos"  VALUE="Equipamentos Inativos">
<input  type="submit" name="ativos"  VALUE="Equipamentos Ativos">



  </br></br>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

<tr>
<th>Família Maquina/Unidade</th>





<?


 $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {


      ?>
      <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' ><? echo ociresult($s, "CD_FABRICA");?></font></th><?

  }
  ?>
  <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' >Total</font></th>


  <?



  $totalempresa="0";
  $contador2="0";


 $s2 = OCIParse($ora_conexao, "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS where cd_famlia like '%$familiapesquisa%'");
  OCIExecute($s2, OCI_DEFAULT);
  While (OCIFetch($s2)) {
      $codigofamilia=ociresult($s2, "CD_FAMLIA") ;
      $totalfamilia="0";
      $contador="0";
      ?>
      </tr>
      <td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s2, "DS_FAMILIA");?></font></td>
      <?


        $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

                         $fabrica=ociresult($s, "CD_FABRICA") ;


                         $quantoss1 = OCIParse($ora_conexao, "select a.cd_maquina MAQUINA,a.MODELO MODELO,a.STATUS_MAQUINA STATUS,a.ANO_FABRICACAO ANO,
                         a.FABRICANTE FABRICANTE,a.NUMERO_SERIE SERIE,a.PATRIMONIO PATRIMONIO,a.LOCALIZACAO LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area and
                         d.cd_fabrica='$fabrica' and
                         a.cd_famlia='$codigofamilia'");


                        OCIExecute($quantoss1, OCI_DEFAULT);
                        While (OCIFetch($quantoss1)) {
                        $contador2=$contador2+1;
                           $maquinateste=ociresult($quantoss1, "MAQUINA") ;
                           $modeloteste=ociresult($quantoss1, "MODELO") ;
                           $statusteste=ociresult($quantoss1, "STATUS") ;
                           $anoteste=ociresult($quantoss1, "ANO") ;
                           $fabricanteteste=ociresult($quantoss1, "FABRICANTE") ;
                           $serieteste=ociresult($quantoss1, "SERIE") ;
                           $patrimonioteste=ociresult($quantoss1, "PATRIMONIO") ;
                           $localizacaoteste=ociresult($quantoss1, "LOCALIZACAO") ;

                           //echo "MODELO=$modeloteste//MODELO TESTE:$modelopesquisa//STATUS=$statusteste//ATIVO TESTE:$ativopesquisa//familia:$codigofamilia//fabrica:$fabrica</br>";
                           if ($modelopesquisa =="Todos"){
                             $recupera1="sim";
                           }
                           else
                           {
                             if ($modelopesquisa==$modeloteste){
                             $recupera1="sim";
                             }
                             else
                             {
                             $recupera1="nao";
                             }
                           }

                           if ($ativopesquisa =="Todos"){
                             $recupera2="sim";
                           }
                           else
                           {
                             if ($ativopesquisa==$statusteste){
                             $recupera2="sim";
                             }
                             else
                             {
                             $recupera2="nao";
                             }
                           }

                           if ($anopesquisa =="Todos"){
                             $recupera3="sim";
                           }
                           else
                           {
                             if ($anopesquisa==$anoteste){
                             $recupera3="sim";
                             }
                             else
                             {
                             $recupera3="nao";
                             }
                           }


                           if ($fabricantepesquisa =="Todos"){
                             $recupera4="sim";
                           }
                           else
                           {
                             if ($fabricantepesquisa==$fabricanteteste){
                             $recupera4="sim";
                             }
                             else
                             {
                             $recupera4="nao";
                             }
                           }

                           if ($seriepesquisa =="Todos"){
                             $recupera5="sim";
                           }
                           else
                           {
                             if ($seriepesquisa==$serieteteste){
                             $recupera5="sim";
                             }
                             else
                             {
                             $recupera5="nao";
                             }
                           }

                           if ($patrimoniopesquisa =="Todos"){
                             $recupera6="sim";
                           }
                           else
                           {
                             if ($patrimoniopesquisa==$patrimonioteste){
                             $recupera6="sim";
                             }
                             else
                             {
                             $recupera6="nao";
                             }
                           }

                           if ($localizacaopesquisa =="Todos"){
                             $recupera7="sim";
                           }
                           else
                           {
                             if ($localizacaopesquisa==$localizacaoteste){
                             $recupera7="sim";
                             }
                             else
                             {
                             $recupera7="nao";
                             }
                           }


                           if ($recupera1=="sim" and $recupera2=="sim" and $recupera3=="sim" and $recupera4=="sim" and $recupera5=="sim" and $recupera6=="sim" and $recupera7=="sim"){

                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA1(CD_MAQUINA,CD_FAMILIA,CD_FABRICA,DS_MODELO,
                          DS_ANO_FABRICACAO,DS_STATUS,DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO) VALUES(
                          '$maquinateste','$codigofamilia','$fabrica','$modeloteste','$anoteste','$statusteste','$fabricanteteste',
                          '$serieteste','$patrimonioteste','$localizacaoteste')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

                           $contador=$contador+1;

                           }


                        }//final das maquinas


                        if ($contador >"0"){
                           $totalfamilia=$totalfamilia+$contador;
                           $totalempresa=$totalempresa+$contador;


                           ?><td width="230" >
                           <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=linhacoluna&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$contador";?></a></td><?
                         $contador="0";
                        }
                        else
                        {
                            ?><td bgcolor="white">-</td><?

                        }
                //$totalfamilia=$totalfamilia+$contador;
                //$totalempresa=$totalempresa+$contador;


        }//final da fabrica?>
        <td>
        <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=familia&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
        <? echo "$totalfamilia";?></a></td>
      </tr>
      <?

  } //final das familias
  ?>



<tr>






<th>Total da Unidade</th>
<?
$sacha5 = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($sacha5, OCI_DEFAULT);
        While (OCIFetch($sacha5)) {

                         $fabrica=ociresult($sacha5, "CD_FABRICA") ;


                         $quantoss19 = OCIParse($ora_conexao, "select count(*) CONTADOR  from AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica'");


                        OCIExecute($quantoss19, OCI_DEFAULT);
                        While (OCIFetch($quantoss19)) {
                           $quantidademaquina=ociresult($quantoss19, "CONTADOR") ;
                            ?>
                            <td>
                            <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade1&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                            <? echo "$quantidademaquina";?></a></td>
                            <?
                        }

       }
?>


<td>
<a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade2&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
<? echo "$totalempresa";?></a></td>


</tr>
</table>



  <?
}//final quando nao  existe


if ($atual=="A"){

?>

<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando Equipamentos</font></br>

<input  type="submit" name="inicio"  VALUE="Retornar">

<?
 if ($escolha=="avancando6"){
 ?> <input  type="submit"  name="busca" VALUE="Executar"><?}else{?>

 <input  type="submit" name="avanca"  VALUE="Avançar">
 <input  type="submit"  name="busca" VALUE="Executar">
 <?}?>



<hr>

<?
if ($escolha=="conteudo1"){
?>

Etapa-1 <font style='font-size: 13px;color: red;text-align:left;bold: Negrito' >Equipamentos Ativo</font></br>
<?
$elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);
                          
?>

                 Seleção<select name="ativopesquisa">
     			 <option value="A"><?echo "Ativas";?></option>
				 <option value="I"><?echo "Inativas";?></option>

                 </select>

                  <input type="hidden" name="escolha" value="avancando2">
                  <input type="hidden" name="banco" value="<?echo $banco;?>">
		          <input type="hidden" name="continuarmesmatela" value="sim">
		          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		          <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		          <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">




<?}

if ($escolha=="avancando2"){
?>




   <center><div class='divscroll' style='height:390;width:650'>

   Etapa-2 Seleção de Unidades</br>

   <input type=checkbox name="selall" onClick="CheckAll2()">
   <span id="checar">Marcar todos</span>


  <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
  style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
  solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
  mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="400">
  <tr>

				<th>Unidade</th>
				<th>Nome</th>
               	<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>
<?
                 $contadorfabrica="0";

                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS ORDER  by DS_FABRICA ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                 $contadorfabrica=$contadorfabrica+1;

                 ?>
                    <tr>

					<td><?echo $row["CD_FABRICA"];?></td>
					<td><?echo $row["DS_FABRICA"];?></td>
					<td ><input type="checkbox" name="lista[]"   value="<?echo $row["CD_FABRICA"];?>"></td>
                    </tr>
                    

                 <?
                 }

 ?>



   </table>
   <input type="hidden" name="escolha" value="avancando3">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
   <input type="hidden" name="continuarmesmatela" value="sim">
   <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
   <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
   <input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
   <input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
   <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
</div>



<?
}




if ($escolha=="avancando3"){
?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-3 Seleção de famílias</br>

   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>
   
     <?
     $elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where CD_FABRICA IS NOT NULL");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);





 for ($passa=0;$passa <=$contadorfabrica;$passa++)
 {
                           $criafinal=$lista[$passa];


                           if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_FABRICA) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }


  ?>






<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Familia</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorfamilia="0";
                 $result2 = "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS WHERE  CD_FAMLIA IN (SELECT a.cd_famlia FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 a.status_maquina='$ativopesquisa' and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO)) ORDER  by DS_FAMILIA ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfamilia=$contadorfamilia+1;
                 ?>
                    <tr>

					<td><?echo $row["CD_FAMLIA"];?></td>
					<td ><input type="checkbox" name="listafamilia[]" value="<?echo $row["CD_FAMLIA"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>

        <input type="hidden" name="escolha" value="avancando4">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="contadorfamilia" value="<?echo $contadorfamilia;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

</div>
  
<?
}

if ($escolha=="avancando4"){
?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-4 Seleção de Modelos</br>

   <input type=checkbox name="selall" onClick="CheckAll3()">
   <span id="checar">Marcar todos</span>
   <?
         $elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where CD_FAMILIA IS NOT NULL");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);


                   


 for ($passa=0;$passa <=$contadorfamilia;$passa++)
 {
  $criafinal=$listafamilia[$passa];
  if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_FAMILIA) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 }


?>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Modelo</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadormodelo="0";
                 $result2 = "select DISTINCT  a.MODELO MODELO FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND a.MODELO IS NOT NULL
                 ORDER  by a.MODELO  ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadormodelo=$contadormodelo+1;
                 ?>
                    <tr>

					<td><?echo $row["MODELO"];?></td>
					<td ><input type="checkbox" name="listamodelo[]" value="<?echo $row["MODELO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
	<input type="hidden" name="escolha" value="avancando5">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
			<input type="hidden" name="contadormodelo" value="<?echo $contadormodelo;?>">
			<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
			<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

 </div>

<?
}

if ($escolha=="avancando5"){



for ($passa=0;$passa <=$contadormodelo;$passa++)
 {
  $criafinal=$listamodelo[$passa];
  if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_MODELO) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 }

?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-5 Seleção de Fabricante</br>

   <input type=checkbox name="selall" onClick="CheckAll5()">
   <span id="checar">Marcar todos</span>
   <?
         $elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where FABRICANTE IS NOT NULL");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);








?>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Fabricante</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorfabricante="0";
                 $result2 = "select DISTINCT  a.FABRICANTE FABRICANTE FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND
                 a.modelo in (SELECT CD_MODELO FROM AUX_FILTRO)
                 AND a.FABRICANTE IS NOT NULL
                 ORDER  by a.FABRICANTE  ASC";
                 

                 
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfabricante=$contadorfabricante+1;
                 ?>
                    <tr>

					<td><?echo $row["FABRICANTE"];?></td>
					<td ><input type="checkbox" name="listafabricante[]" value="<?echo $row["FABRICANTE"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
	<input type="hidden" name="escolha" value="avancando6">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
			<input type="hidden" name="contadorfabricante" value="<?echo $contadorfabricante;?>">
			<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
			<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

 </div>

<?
}//final do fabricante


if ($escolha=="avancando6"){



for ($passa=0;$passa <=$contadorfabricante;$passa++)
 {

  $criafinal=$listafabricante[$passa];
  if ($criafinal>"0"){


                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(FABRICANTE) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 }//final do for

?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-6 Ano de Fabricação</br>

   <input type=checkbox name="selall" onClick="CheckAll6()">
   <span id="checar">Marcar todos</span>
   <?
         $elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where VL_ANO IS NOT NULL");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);








?>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Anos</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorano="0";
                 $result2 = "select DISTINCT  a.ANO_FABRICACAO ANO FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND
                 a.modelo in (SELECT CD_MODELO FROM AUX_FILTRO)
                 AND a.ANO_FABRICACAO IS NOT NULL
                 ORDER  by a.ANO_FABRICACAO  desc";



				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorano=$contadorano+1;
                 ?>
                    <tr>

					<td><?echo $row["ANO"];?></td>
					<td ><input type="checkbox" name="listaano[]" value="<?echo $row["ANO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
	<input type="hidden" name="escolha" value="avancando7">
   <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
			<input type="hidden" name="contadorano" value="<?echo $contadorano;?>">
			<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
			<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

 </div>

<?
}//final do fabricante



}//final quando nao tem busca ainda definida


if ($atual=="B"){



if ($escolha=="avancando2"){

 for ($passa=0;$passa <=$contadorfabrica;$passa++)
 {
                           $criafinal=$lista[$passa];


                           if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_FABRICA) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }
}//fial da selecao =2


                          
if ($escolha=="avancando4"){

 for ($passa=0;$passa <=$contadorfamilia;$passa++)
 {
  $criafinal=$listafamilia[$passa];
  if ($criafinal>"0"){
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_FAMILIA) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 } //final for
 }//fianl da escolha=4
 
 if ($escolha=="avancando5"){

 for ($passa=0;$passa <=$contadorlinha;$passa++)
 {

  $criafinal=$listamodelo[$passa];
  if ($criafinal>"0"){

                           
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_MODELO) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 }//final do for
 
 }//final quando escolha=5
 
 
 if ($escolha=="avancando7"){

 for ($passa=0;$passa <=$contadorlinha;$passa++)
 {

  $criafinal=$listaano[$passa];
  if ($criafinal>"0"){


                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(VL_ANO) VALUES(
                           '$criafinal')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

  }

 }//final do for

 }//final quando escolha=6
 
 



 //MOSTRA O RESULTADO DA PESQUISA
 
                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);



?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando Equipamentos</font></br>
<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
<input  type="submit" name="inicio"  VALUE="Retornar">
<hr>
</br>


<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="40%">

<tr>
<th>Unidade</th>

<?
                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);

 $s = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO  where cd_fabrica is not null order by CD_FABRICA asc");
  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  ?>
      <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' ><? echo ociresult($s, "FABRICA");?></font></th><?

  }
  ?>
  <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' >Total</font></th>


  <?



  $totalempresa="0";
  $contador2="0";


 $s21 = OCIParse($ora_conexao, "select distinct CD_FAMILIA FROM AUX_FILTRO WHERE CD_FAMILIA IS NOT NULL  order by CD_FAMILIA  asc");
  OCIExecute($s21, OCI_DEFAULT);
  While (OCIFetch($s21)) {
      $finalfamilia="0";
      $codigofamilia=ociresult($s21,"CD_FAMILIA") ;
      ?>
      <tr>
      <td>Família:<? echo ociresult($s21, "CD_FAMILIA");?></font></td>
      <?

                         $acha2  = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO
                         where cd_fabrica is not null order by CD_FABRICA asc");
                         OCIExecute($acha2, OCI_DEFAULT);
                         While (OCIFetch($acha2)) {
                         $codigofabrica5=ociresult($acha2, "FABRICA") ;

                         $quantoss17 = OCIParse($ora_conexao, "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia'");


                        OCIExecute($quantoss17, OCI_DEFAULT);
                        While (OCIFetch($quantoss17)) {

                           $acha55=ociresult($quantoss17, "CONTADOR") ;
                        }

                         if ($acha55 >"0"){
                         $finalfamilia=$finalfamilia+$acha55;

                         $quantoss1799 = OCIParse($ora_conexao, "select a.cd_maquina MAQUINA,a.MODELO MODELO,a.STATUS_MAQUINA STATUS,
                         a.ANO_FABRICACAO ANO,
                         a.FABRICANTE FABRICANTE,a.NUMERO_SERIE SERIE,a.PATRIMONIO PATRIMONIO,a.LOCALIZACAO LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia'");


                        OCIExecute($quantoss1799, OCI_DEFAULT);
                        While (OCIFetch($quantoss1799)) {

                           $maquinateste=ociresult($quantoss1799, "MAQUINA") ;
                           $modeloteste=ociresult($quantoss1799, "MODELO") ;
                           $anoteste=ociresult($quantoss1799, "ANO") ;
                           $statusteste=ociresult($quantoss1799, "STATUS") ;
                           $fabricanteteste=ociresult($quantoss1799, "FABRICANTE") ;
                           $serieteste=ociresult($quantoss1799, "SERIE") ;
                           $patrimonioteste=ociresult($quantoss1799, "PATRIMONIO") ;
                           $localizacaoteste=ociresult($quantoss1799, "LOCALIZACAO") ;
                           

                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA1(CD_MAQUINA,CD_FAMILIA,CD_FABRICA,DS_MODELO,
                           DS_ANO_FABRICACAO,DS_STATUS,DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO) VALUES(
                          '$maquinateste','$codigofamilia','$codigofabrica5','$modeloteste','$anoteste','$statusteste','$fabricanteteste',
                          '$serieteste','$patrimonioteste','$localizacaoteste')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                         }
                         ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>&tipoconsulta=familia&codigofamilia=<?echo "$codigofamilia";?>&navegando=sim&modelo=<?echo "$modeloteste";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$acha55";?></a></td>
                         <?
                         }
                         else
                         {
                         ?>
                         <td>-</td>
                         <?
                         }
                         }//FINAL DA FABRICA
                         ?>

                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=totalfamilia&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$finalfamilia";?></a></td>


                         <?
         $finalmodelo="0";
         $s22 = OCIParse($ora_conexao, "select distinct CD_MODELO FROM AUX_FILTRO WHERE CD_MODELO IS NOT NULL  order by CD_MODELO  asc");
         OCIExecute($s22, OCI_DEFAULT);
         While (OCIFetch($s22)) {

            $codigomodelo=ociresult($s22,"CD_MODELO") ;
            $finalmodelo="0";

          ?>
          <tr>

          <td>Modelo:<? echo ociresult($s22, "CD_MODELO");?></font></td>
          <?
           $acha2  = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO
                         where cd_fabrica is not null order by CD_FABRICA asc");
                         OCIExecute($acha2, OCI_DEFAULT);
                         While (OCIFetch($acha2)) {
                         $codigofabrica5=ociresult($acha2,"FABRICA") ;

                         $quantoss17 = OCIParse($ora_conexao, "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' AND
                         a.modelo='$codigomodelo'");


                        OCIExecute($quantoss17, OCI_DEFAULT);
                        While (OCIFetch($quantoss17)) {

                           $acha55=ociresult($quantoss17, "CONTADOR") ;
                        }

                         if ($acha55 >"0"){
                         $finalmodelo=$finalmodelo+$acha55;
                         ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelo&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$acha55";?></a></td>
                         <?
                         }
                         else
                         {
                         ?>
                         <td>-</td>
                         <?
                         }





                        }//FINAL DA FABRICA
                        ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelosemfabrica&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$finalmodelo";?></a>



            </tr>
            <?
            }//FINAL DO MODELO



         $finalfabricante="0";
         $s22 = OCIParse($ora_conexao, "select distinct FABRICANTE FROM AUX_FILTRO WHERE FABRICANTE IS NOT NULL  order by FABRICANTE  asc");
         OCIExecute($s22, OCI_DEFAULT);
         While (OCIFetch($s22)) {

            $codigofabricante=ociresult($s22,"FABRICANTE") ;
            $finalfabricante="0";

          ?>
          <tr>

          <td>Fabricante:<? echo ociresult($s22, "FABRICANTE");?></font></td>
          <?
           $acha2  = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO
                         where cd_fabrica is not null order by CD_FABRICA asc");
                         OCIExecute($acha2, OCI_DEFAULT);
                         While (OCIFetch($acha2)) {
                         $codigofabrica5=ociresult($acha2,"FABRICA") ;

                         $quantoss17 = OCIParse($ora_conexao, "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' AND
                         a.modelo='$codigomodelo'
                         AND a.fabricante='$codigofabricante'
                         ");
                         echo "</br>select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' AND
                         a.modelo='$codigomodelo'
                         AND a.fabricante='$codigofabricante'";

                        OCIExecute($quantoss17, OCI_DEFAULT);
                        While (OCIFetch($quantoss17)) {

                           $acha55=ociresult($quantoss17, "CONTADOR") ;
                        }

                         if ($acha55 >"0"){
                         $finalfabricante=$finalfabricante+$acha55;
                         ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelo&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$acha55";?></a></td>
                         <?
                         }
                         else
                         {
                         ?>
                         <td>-</td>
                         <?
                         }

                        }//FINAL DA FABRICA
                        ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelosemfabrica&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$finalfabricante";?></a>



            </tr>
            <?
            }//FINAL DO FABRICANTE

            $finalano="0";
         $s22 = OCIParse($ora_conexao, "select distinct VL_ANO FROM AUX_FILTRO WHERE VL_ANO IS NOT NULL  order by VL_ANO DESC");
         OCIExecute($s22, OCI_DEFAULT);
         While (OCIFetch($s22)) {

            $codigoano=ociresult($s22,"VL_ANO") ;
            $finalano="0";

          ?>
          <tr>

          <td>Ano Fabricação:<? echo ociresult($s22, "VL_ANO");?></font></td>
          <?
           $acha2  = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO
                         where cd_fabrica is not null order by CD_FABRICA asc");
                         OCIExecute($acha2, OCI_DEFAULT);
                         While (OCIFetch($acha2)) {
                         $codigofabrica5=ociresult($acha2,"FABRICA") ;

                         $quantoss17 = OCIParse($ora_conexao, "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' AND
                         a.modelo='$codigomodelo'
                         AND a.fabricante='$codigofabricante' and
                         a.ano_fabricacao='$codigoano'
                         ");
                         echo "</br>select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         a.status_maquina='$ativopesquisa' and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' AND
                         a.modelo='$codigomodelo'
                         AND a.fabricante='$codigofabricante' and
                         a.ano_fabricacao='$codigoano'";

                        OCIExecute($quantoss17, OCI_DEFAULT);
                        While (OCIFetch($quantoss17)) {

                           $acha55=ociresult($quantoss17, "CONTADOR") ;
                        }

                         if ($acha55 >"0"){
                         $finalano=$finalano+$acha55;
                         ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelo&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$acha55";?></a></td>
                         <?
                         }
                         else
                         {
                         ?>
                         <td>-</td>
                         <?
                         }

                        }//FINAL DA FABRICA
                        ?>
                         <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=modelosemfabrica&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$finalano";?></a>



            </tr>
            <?
            }//FINAL DO ano



            ?>

            </tr>
            <?
            }//FINAL DA FAMILIA
            ?>




<tr>
<td>Total da Unidade</td>



<?
$totalempresa="0";
$sacha5 = OCIParse($ora_conexao, "select distinct cd_fabrica FABRICA FROM AUX_FILTRO  where cd_fabrica is not null order by CD_FABRICA asc");
        OCIExecute($sacha5, OCI_DEFAULT);
        While (OCIFetch($sacha5)) {

                         $fabrica=ociresult($sacha5, "FABRICA") ;

                 if ($escolha=="avancando4"){//parou familia
                 $quantoss19 = OCIParse($ora_conexao, "SELECT count(*) CONTADOR
                 FROM  MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica='$fabrica'  AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO)
                         ");
                  }

                 if ($escolha=="avancando5"){//parou modelo
                 $quantoss19 = OCIParse($ora_conexao, "SELECT count(*) CONTADOR
                 FROM  MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica='$fabrica'  AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) and
                 a.modelo in (SELECT CD_modelo FROM AUX_FILTRO)
                         ");
                 }
                 
                 if ($escolha=="avancando6"){//parou fabricante
                 $quantoss19 = OCIParse($ora_conexao, "SELECT count(*) CONTADOR
                 FROM  MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica='$fabrica'  AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) and
                 a.modelo in (SELECT CD_modelo FROM AUX_FILTRO) and
                 a.fabricante in (SELECT FABRICANTE FROM AUX_FILTRO)
                         ");
                 }
                 
                 if ($escolha=="avancando7"){//parou no ano de fabricacao
                 $quantoss19 = OCIParse($ora_conexao, "SELECT count(*) CONTADOR
                 FROM  MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 a.status_maquina='$ativopesquisa' and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica='$fabrica'  AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) and
                 a.modelo in (SELECT CD_modelo FROM AUX_FILTRO) and
                 a.fabricante in (SELECT FABRICANTE FROM AUX_FILTRO) and
                 a.ano_fabricacao in (SELECT VL_ANO FROM AUX_FILTRO)
                         ");
                 }

                        OCIExecute($quantoss19, OCI_DEFAULT);
                        While (OCIFetch($quantoss19)) {
                           $quantidademaquina=ociresult($quantoss19, "CONTADOR") ;
                           $totalempresa=$totalempresa+$quantidademaquina;
                            ?>
                            <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$fabrica";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=totalfabrica&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$quantidademaquina";?></a></td>
                           

                            <?
                        }

       }
?>

<td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$fabrica";?>
                            &codigofamilia=<?echo "$codigofamilia";?>&tipoconsulta=totalfabrica2&navegando=sim&modelo=<?echo "$codigomodelo";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$totalempresa";?></a></td>
                           



</tr>
</table>




  <?

  }//FINAL DA BSUSCA onde deterninou
  


if ($atual=="INATIVAS"){


                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);
?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando </font><?ECHO "$msotratitulo";?></br>

                  <input type="hidden" name="banco" value="<?echo $banco;?>">
		          <input type="hidden" name="continuarmesmatela" value="sim">
		          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		          <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		          <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		          
		          <input  type="submit" name="avanca"  VALUE="Definir Filtro">

<input  type="submit" name="inicio"  VALUE="Todos">
<input  type="submit" name="ativos"  VALUE="Equipamentos Ativos">

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

<tr>
<th>Família Maquina/Unidade</th>





<?


 $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {


      ?>
      <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' ><? echo ociresult($s, "CD_FABRICA");?></font></th><?

  }
  ?>
  <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' >Total</font></th>


  <?



  $totalempresa="0";
  $contador2="0";


 $s2 = OCIParse($ora_conexao, "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS where cd_famlia like '%$familiapesquisa%'");
  OCIExecute($s2, OCI_DEFAULT);
  While (OCIFetch($s2)) {
      $codigofamilia=ociresult($s2, "CD_FAMLIA") ;
      $totalfamilia="0";
      $contador="0";
      ?>
      </tr>
      <td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s2, "DS_FAMILIA");?></font></td>
      <?


        $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

                         $fabrica=ociresult($s, "CD_FABRICA") ;


                         $quantoss1 = OCIParse($ora_conexao, "select a.cd_maquina MAQUINA,a.MODELO MODELO,a.STATUS_MAQUINA STATUS,a.ANO_FABRICACAO ANO,
                         a.FABRICANTE FABRICANTE,a.NUMERO_SERIE SERIE,a.PATRIMONIO PATRIMONIO,a.LOCALIZACAO LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area and
                         d.cd_fabrica='$fabrica' and
                         a.cd_famlia='$codigofamilia' AND
                         a.STATUS_MAQUINA='I'");


                        OCIExecute($quantoss1, OCI_DEFAULT);
                        While (OCIFetch($quantoss1)) {
                        $contador2=$contador2+1;
                           $maquinateste=ociresult($quantoss1, "MAQUINA") ;
                           $modeloteste=ociresult($quantoss1, "MODELO") ;
                           $statusteste=ociresult($quantoss1, "STATUS") ;
                           $anoteste=ociresult($quantoss1, "ANO") ;
                           $fabricanteteste=ociresult($quantoss1, "FABRICANTE") ;
                           $serieteste=ociresult($quantoss1, "SERIE") ;
                           $patrimonioteste=ociresult($quantoss1, "PATRIMONIO") ;
                           $localizacaoteste=ociresult($quantoss1, "LOCALIZACAO") ;

                           //echo "MODELO=$modeloteste//MODELO TESTE:$modelopesquisa//STATUS=$statusteste//ATIVO TESTE:$ativopesquisa//familia:$codigofamilia//fabrica:$fabrica</br>";
                           if ($modelopesquisa =="Todos"){
                             $recupera1="sim";
                           }
                           else
                           {
                             if ($modelopesquisa==$modeloteste){
                             $recupera1="sim";
                             }
                             else
                             {
                             $recupera1="nao";
                             }
                           }

                           if ($ativopesquisa =="Todos"){
                             $recupera2="sim";
                           }
                           else
                           {
                             if ($ativopesquisa==$statusteste){
                             $recupera2="sim";
                             }
                             else
                             {
                             $recupera2="nao";
                             }
                           }

                           if ($anopesquisa =="Todos"){
                             $recupera3="sim";
                           }
                           else
                           {
                             if ($anopesquisa==$anoteste){
                             $recupera3="sim";
                             }
                             else
                             {
                             $recupera3="nao";
                             }
                           }


                           if ($fabricantepesquisa =="Todos"){
                             $recupera4="sim";
                           }
                           else
                           {
                             if ($fabricantepesquisa==$fabricanteteste){
                             $recupera4="sim";
                             }
                             else
                             {
                             $recupera4="nao";
                             }
                           }

                           if ($seriepesquisa =="Todos"){
                             $recupera5="sim";
                           }
                           else
                           {
                             if ($seriepesquisa==$serieteteste){
                             $recupera5="sim";
                             }
                             else
                             {
                             $recupera5="nao";
                             }
                           }

                           if ($patrimoniopesquisa =="Todos"){
                             $recupera6="sim";
                           }
                           else
                           {
                             if ($patrimoniopesquisa==$patrimonioteste){
                             $recupera6="sim";
                             }
                             else
                             {
                             $recupera6="nao";
                             }
                           }

                           if ($localizacaopesquisa =="Todos"){
                             $recupera7="sim";
                           }
                           else
                           {
                             if ($localizacaopesquisa==$localizacaoteste){
                             $recupera7="sim";
                             }
                             else
                             {
                             $recupera7="nao";
                             }
                           }


                           if ($recupera1=="sim" and $recupera2=="sim" and $recupera3=="sim" and $recupera4=="sim" and $recupera5=="sim" and $recupera6=="sim" and $recupera7=="sim"){

                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA1(CD_MAQUINA,CD_FAMILIA,CD_FABRICA,DS_MODELO,
                          DS_ANO_FABRICACAO,DS_STATUS,DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO) VALUES(
                          '$maquinateste','$codigofamilia','$fabrica','$modeloteste','$anoteste','$statusteste','$fabricanteteste',
                          '$serieteste','$patrimonioteste','$localizacaoteste')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

                           $contador=$contador+1;

                           }


                        }//final das maquinas


                        if ($contador >"0"){
                           $totalfamilia=$totalfamilia+$contador;
                           $totalempresa=$totalempresa+$contador;


                           ?><td width="230" >
                           <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=linhacoluna&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$contador";?></a></td><?
                         $contador="0";
                        }
                        else
                        {
                            ?><td bgcolor="white">-</td><?

                        }
                //$totalfamilia=$totalfamilia+$contador;
                //$totalempresa=$totalempresa+$contador;


        }//final da fabrica?>
        <td>
        <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=familia&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
        <? echo "$totalfamilia";?></a></td>
      </tr>
      <?

  } //final das familias
  ?>



<tr>






<th>Total da Unidade</th>
<?
$sacha5 = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($sacha5, OCI_DEFAULT);
        While (OCIFetch($sacha5)) {

                         $fabrica=ociresult($sacha5, "CD_FABRICA") ;


                         $quantoss19 = OCIParse($ora_conexao, "select count(*) CONTADOR  from AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica'");


                        OCIExecute($quantoss19, OCI_DEFAULT);
                        While (OCIFetch($quantoss19)) {
                           $quantidademaquina=ociresult($quantoss19, "CONTADOR") ;
                            ?>
                            <td>
                            <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade1&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                            <? echo "$quantidademaquina";?></a></td>
                            <?
                        }

       }
?>


<td>
<a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade2&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
<? echo "$totalempresa";?></a></td>


</tr>
</table>
<?
}//FIAN LDAS INTAIVAS


if ($atual=="ATIVOS"){


                          $elimina1= OCIParse($ora_conexao, "delete from  AUX_CONSULTA1");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);
?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Consultando </font><?ECHO "$msotratitulo";?></br>

                  <input type="hidden" name="banco" value="<?echo $banco;?>">
		          <input type="hidden" name="continuarmesmatela" value="sim">
		          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		          <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		          <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

		          <input  type="submit" name="avanca"  VALUE="Definir Filtro">
<input  type="submit" name="inicio"  VALUE="Todos ">
<input  type="submit" name="inativos"  VALUE="Equipamentos Inativos">

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

<tr>
<th>Família Maquina/Unidade</th>





<?


 $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
  OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {


      ?>
      <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' ><? echo ociresult($s, "CD_FABRICA");?></font></th><?

  }
  ?>
  <th><font style='font-size: 8px;color: white;text-align:left;bold: Negrito' >Total</font></th>


  <?



  $totalempresa="0";
  $contador2="0";


 $s2 = OCIParse($ora_conexao, "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS where cd_famlia like '%$familiapesquisa%'");
  OCIExecute($s2, OCI_DEFAULT);
  While (OCIFetch($s2)) {
      $codigofamilia=ociresult($s2, "CD_FAMLIA") ;
      $totalfamilia="0";
      $contador="0";
      ?>
      </tr>
      <td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s2, "DS_FAMILIA");?></font></td>
      <?


        $s = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

                         $fabrica=ociresult($s, "CD_FABRICA") ;


                         $quantoss1 = OCIParse($ora_conexao, "select a.cd_maquina MAQUINA,a.MODELO MODELO,a.STATUS_MAQUINA STATUS,a.ANO_FABRICACAO ANO,
                         a.FABRICANTE FABRICANTE,a.NUMERO_SERIE SERIE,a.PATRIMONIO PATRIMONIO,a.LOCALIZACAO LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area and
                         d.cd_fabrica='$fabrica' and
                         a.cd_famlia='$codigofamilia' AND
                         a.STATUS_MAQUINA='A'");


                        OCIExecute($quantoss1, OCI_DEFAULT);
                        While (OCIFetch($quantoss1)) {
                        $contador2=$contador2+1;
                           $maquinateste=ociresult($quantoss1, "MAQUINA") ;
                           $modeloteste=ociresult($quantoss1, "MODELO") ;
                           $statusteste=ociresult($quantoss1, "STATUS") ;
                           $anoteste=ociresult($quantoss1, "ANO") ;
                           $fabricanteteste=ociresult($quantoss1, "FABRICANTE") ;
                           $serieteste=ociresult($quantoss1, "SERIE") ;
                           $patrimonioteste=ociresult($quantoss1, "PATRIMONIO") ;
                           $localizacaoteste=ociresult($quantoss1, "LOCALIZACAO") ;

                           //echo "MODELO=$modeloteste//MODELO TESTE:$modelopesquisa//STATUS=$statusteste//ATIVO TESTE:$ativopesquisa//familia:$codigofamilia//fabrica:$fabrica</br>";
                           if ($modelopesquisa =="Todos"){
                             $recupera1="sim";
                           }
                           else
                           {
                             if ($modelopesquisa==$modeloteste){
                             $recupera1="sim";
                             }
                             else
                             {
                             $recupera1="nao";
                             }
                           }

                           if ($ativopesquisa =="Todos"){
                             $recupera2="sim";
                           }
                           else
                           {
                             if ($ativopesquisa==$statusteste){
                             $recupera2="sim";
                             }
                             else
                             {
                             $recupera2="nao";
                             }
                           }

                           if ($anopesquisa =="Todos"){
                             $recupera3="sim";
                           }
                           else
                           {
                             if ($anopesquisa==$anoteste){
                             $recupera3="sim";
                             }
                             else
                             {
                             $recupera3="nao";
                             }
                           }


                           if ($fabricantepesquisa =="Todos"){
                             $recupera4="sim";
                           }
                           else
                           {
                             if ($fabricantepesquisa==$fabricanteteste){
                             $recupera4="sim";
                             }
                             else
                             {
                             $recupera4="nao";
                             }
                           }

                           if ($seriepesquisa =="Todos"){
                             $recupera5="sim";
                           }
                           else
                           {
                             if ($seriepesquisa==$serieteteste){
                             $recupera5="sim";
                             }
                             else
                             {
                             $recupera5="nao";
                             }
                           }

                           if ($patrimoniopesquisa =="Todos"){
                             $recupera6="sim";
                           }
                           else
                           {
                             if ($patrimoniopesquisa==$patrimonioteste){
                             $recupera6="sim";
                             }
                             else
                             {
                             $recupera6="nao";
                             }
                           }

                           if ($localizacaopesquisa =="Todos"){
                             $recupera7="sim";
                           }
                           else
                           {
                             if ($localizacaopesquisa==$localizacaoteste){
                             $recupera7="sim";
                             }
                             else
                             {
                             $recupera7="nao";
                             }
                           }


                           if ($recupera1=="sim" and $recupera2=="sim" and $recupera3=="sim" and $recupera4=="sim" and $recupera5=="sim" and $recupera6=="sim" and $recupera7=="sim"){

                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_CONSULTA1(CD_MAQUINA,CD_FAMILIA,CD_FABRICA,DS_MODELO,
                          DS_ANO_FABRICACAO,DS_STATUS,DS_FABRICANTE,NR_SERIE,DS_PATRIMONIO,DS_LOCALIZACAO) VALUES(
                          '$maquinateste','$codigofamilia','$fabrica','$modeloteste','$anoteste','$statusteste','$fabricanteteste',
                          '$serieteste','$patrimonioteste','$localizacaoteste')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

                           $contador=$contador+1;

                           }


                        }//final das maquinas


                        if ($contador >"0"){
                           $totalfamilia=$totalfamilia+$contador;
                           $totalempresa=$totalempresa+$contador;


                           ?><td width="230" >
                           <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=linhacoluna&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$contador";?></a></td><?
                         $contador="0";
                        }
                        else
                        {
                            ?><td bgcolor="white">-</td><?

                        }
                //$totalfamilia=$totalfamilia+$contador;
                //$totalempresa=$totalempresa+$contador;


        }//final da fabrica?>
        <td>
        <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=familia&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
        <? echo "$totalfamilia";?></a></td>
      </tr>
      <?

  } //final das familias
  ?>



<tr>






<th>Total da Unidade</th>
<?
$sacha5 = OCIParse($ora_conexao, "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by CD_FABRICA asc");
        OCIExecute($sacha5, OCI_DEFAULT);
        While (OCIFetch($sacha5)) {

                         $fabrica=ociresult($sacha5, "CD_FABRICA") ;


                         $quantoss19 = OCIParse($ora_conexao, "select count(*) CONTADOR  from AUX_CONSULTA1 WHERE CD_FABRICA='$fabrica'");


                        OCIExecute($quantoss19, OCI_DEFAULT);
                        While (OCIFetch($quantoss19)) {
                           $quantidademaquina=ociresult($quantoss19, "CONTADOR") ;
                            ?>
                            <td>
                            <a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade1&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                            <? echo "$quantidademaquina";?></a></td>
                            <?
                        }

       }
?>


<td>
<a href="#" onClick="window.open('consultamaquina2.php?fabrica=<?echo "$fabrica";?>
                            &tipoconsulta=unidade2&codigofamilia=<?echo "$codigofamilia";?>&modelo=<?echo "$modelopesquisa";?>&navegando=sim&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
<? echo "$totalempresa";?></a></td>


</tr>
</table>
<?
}//FIAN DOS ATIVOS

?>


