<?

$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];



}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
}


require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>


<head>

<script language=javascript>



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
     if (x.name == 'listadistrito[]') {
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


<form action="DISTRITO.php"  name="formulario" method="POST">








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
			$quantaslinhas2=$_POST['quantaslinhas2'];
			$volumeano=$_POST['volumeano'];
			$quantidadedia=$_POST['quantidadedia'];
			$semanahoje=$_POST['semanahoje'];
			$tempo2=$_POST['tempo2'];
			$volume2=$_POST['volume2'];
			$destino=$_POST['destino'];
			$idade2=$_POST['idade2'];
			$semanaotimizacao=$_POST['semanaotimizacao'];
			$tempo3=$_POST['tempo3'];
                 $tempo4=$_POST['tempo4'];
                   $tempo5=$_POST['tempo5'];
                    $cabeca5=$_POST['cabeca5'];
                    $dataamostra=$_POST['dataamostra'];
                    $quantaslinhasamostra=$_POST['quantaslinhasamostra'];
                    $intervalo=$_POST['intervalo'];
                    $quantaslinhasfaixa=$_POST['quantaslinhasfaixa'];
                    $sexagem=$_POST['sexagem'];
                    $quantaslinhasvolume=$_POST['quantaslinhasvolume'];
                    $custototalsimulacao=$_POST['custototalsimulacao'];
                    $quantidadetotal5=$_POST['quantidadetotal5'];
                    $consumo5=$_POST['consumo5'];
                    $consumo6=$_POST['consumo6'];
                    $consumo7=$_POST['consumo7'];
                    $classi=$_POST['classi'];
                    $banco=$_POST['banco'];
                    $caixa=$_POST['caixa'];
                    $caixa2=$_POST['caixa2'];
                    $novogrupo=$_POST['novogrupo'];
                    $valor17=$_POST['valor17'];
                    $contadorfamilia=$_POST['contadorfamilia'];
                    $listafamilia=$_POST['listafamilia'];
                    $regiaopesquisa=$_POST['regiaopesquisa'];


}



$ano=date('Y');
 $programa="DISTRITO.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";



 $programa=$programa.$programa10.$titulorodape;

 ?>


<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Cadastro de Distritos</font><hr>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="atualizar.GIF" >
</a>



<a href="<?echo $programa;?>&pagina=1&escolha=novoregistro&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="<?echo $programa;?>&pagina=1&escolha=novoregistro&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>">
<img width=50 height=60 BORDER=1 src="eliminar.GIF">
</a>

<a href="<?echo $programa;?>&pagina=1&escolha=novoregistro&tela=2&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1  src="associar_distrito_fabrica.gif">
</a>




<hr>

<?
if (!IsSet($escolha) or $escolha=="1"  ){
?></br>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">
 <tr >
  <th>Codigo</th>
  <th>Descrição</th>
  <th>Região</th>

</tr>
<?


 $quantaslinhasamostra="0";

 $s = OCIParse($ora_conexao, "select a.CD_DISTRITO CODIGO,a.DS_DISTRITO DESCRICAO,b.ds_regiao REGIAO FROM DISTRITO a,REGIAO b
 where a.cd_regiao=b.cd_regiao
 ORDER  by a.DS_DISTRITO ASC");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

          $codigo=ociresult($s, "CODIGO") ;
          $descricao=ociresult($s, "DESCRICAO") ;
          $descricaoregiao=ociresult($s, "REGIAO") ;

   ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $codigo;?> </td>
   <td><?echo $descricao;?> </td>
   <td><?echo $descricaoregiao;?> </td>

   </tr>

   <?


}
?>
</TABLE>

<?

}

if ($escolha=="novoregistro"){



if ($tela=="0"){

?>
Criando Distrito</br>
                 Região:<select name="regiaopesquisa">
                 <option value=""></option>


 <?
				 $result2 = "SELECT CD_REGIAO,DS_REGIAO FROM REGIAO order by DS_REGIAO DESC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_REGIAO"]}\">{$row["DS_REGIAO"]}</option>";
                 }
				 ?>
				 </select>



Descrição :<input type="txt" name="novogrupo" size="35"  >




        <input type="hidden" name="escolha" size="5" value="3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">



		<input  type="submit"     VALUE="GRAVAR">




<?

}//FINAL DA ESCOLHA=0


if ($tela=="1"){

?>
Eliminando Distritos</br>
   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Distrito</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorfamilia="0";
                 $result2 = "select CD_DISTRITO,DS_DISTRITO FROM DISTRITO";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfamilia=$contadorfamilia+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_DISTRITO"];?></td>
					<td ><input type="checkbox" name="listafamilia[]" value="<?echo $row["CD_DISTRITO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>




        <input type="hidden" name="escolha" size="5" value="4" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="contadorfamilia" value="<?echo $contadorfamilia;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">




		<input  type="submit"     VALUE="Confirma">




<?

}//FINAL DA ESCOLHA=0


if ($tela=="2"){

?>
Associando Distritos a Fábricas</br>

      Distrito:<select name="distritopesquisa">
                 <option value=""></option>


 <?
				 $result2 = "SELECT CD_DISTRITO,DS_DISTRITO FROM DISTRITO order by DS_DISTRITO DESC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_DISTRITO"]}\">{$row["DS_DISTRITO"]}</option>";
                 }
				 ?>
				 </select></br>
				 <hr>
				 Seleção de Distritos</br>


   <input type=checkbox name="selall" onClick="CheckAll5()">
   <span id="checar">Marcar todas</span>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Fábricas</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorfabrica="0";
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfabrica=$contadorfabrica+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_FABRICA"];?></td>
					<td ><input type="checkbox" name="listadistrito[]" value="<?echo $row["CD_FABRICA"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>




        <input type="hidden" name="escolha" size="5" value="5" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">




		<input  type="submit"     VALUE="Confirma">




<?

}//FINAL DA ESCOLHA=0



}  //FINAL DA SEGUNDA TELA




if ($escolha=="3"){

                 $result2 = "select MAX(CD_DISTRITO) DISTR FROM
                 DISTRITO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "DISTR") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}



                 $sgrava1= OCIParse($ora_conexao, "insert into DISTRITO(CD_DISTRITO,DS_DISTRITO,CD_REGIAO)
                 VALUES('$maxima2','$novogrupo','$regiaopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);



?><center><?echo "Final da Ação ";


} //final da escolha


if ($escolha=="4"){//ELIMINANDO



  for ($passa=0;$passa <=$contadorfamilia;$passa++)
  {
  $criafinal=$listafamilia[$passa];
  if ($criafinal>"0"){

                         $quantoss17 = OCIParse($ora_conexao, "select count(*)  CONTADOR
                         from FABRICAS WHERE CD_DISTRITO='$criafinal'");
                         OCIExecute($quantoss17, OCI_DEFAULT);
                         While (OCIFetch($quantoss17)) {
                           $acha55=ociresult($quantoss17, "CONTADOR") ;
                         }

                           IF ($acha55 =="0"){
                           $sgrava1= OCIParse($ora_conexao, "DELETE FROM DISTRITO WHERE CD_DISTRITO='$criafinal'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }

  }

  }


?><center><?echo "Final da Eliminacao";


}

if ($escolha=="5"){//associando



  for ($passa=0;$passa <=$contadorfabrica;$passa++)
  {
  $criafinal=$listadistrito[$passa];
  if ($criafinal>"0"){

                           //Echo "update  FABRICAS SET CD_DISTRITO='$distritopesquisa'
                           //WHERE CD_FABRICA='$criafinal'</BR>";
                           
                           $sgrava1= OCIParse($ora_conexao, "update  FABRICAS SET CD_DISTRITO='$distritopesquisa'
                           WHERE CD_FABRICA='$criafinal'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }

  }


?><center><?echo "Final da Associacao";


}




?>


</form>


