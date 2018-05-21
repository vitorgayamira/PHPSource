<?
$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$escolha=$_GET['escolha'];
$tipograva=$_GET['tipograva'];


}
if ($continuarmesmatela=="sim"){

$banco=$_POST['banco'];
$ambiente=$_POST['ambiente'];
$localbanco=$_POST['localbanco'];
$usuariopesquisa=$_POST['usuariopesquisa'];
$contadorfabrica=$_POST['contadorfabrica'];
$contadorarea=$_POST['contadorarea'];
$contadorsecao=$_POST['contadorsecao'];
$contadorcentro=$_POST['contadorcentro'];
$escolha=$_POST['escolha'];



}

ECHO "Base Oracle:$banco - Local:$localbanco - Ambiente:$ambiente</br>";
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



</script>



</head>


<form action="RECEBIMENTOMAQUINAS.php"  name="formulario" method="POST">








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
                    $contadorfabrica=$_POST['contadorfabrica'];
                    $contadorarea=$_POST['contadorarea'];
                    $contadorsecao=$_POST['contadorsecao'];
                    $contadorcentro=$_POST['contadorcentro'];
                    $tipoprivi=$_POST['tipoprivi'];




}



 $ano=date('Y');
 $programa="TRANSFERIRMAQUINA.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 
 echo "escolha:$escolha";

 ?>
<CENTER><font style='font-size: 19px;color: BLACK;text-align:left;bold: Negrito' >Transferência com Recebimento de Equipamentos </font></BR>
 <a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=20 height=20 BORDER=1 src="VOLTAR.GIF">
</a></br>
<?


if (!IsSet($escolha) or $escolha=="1"  ){


$elimina1= OCIParse($ora_conexao, "delete from  AUX_FILTRO where CD_USUARIO='$codigousuario'");
                          OCIExecute($elimina1, OCI_DEFAULT);
                          oci_commit($ora_conexao);


?>

Etapa-1 Buscar Equipamentos</br></br></br>

                 Unidade Negócio:<select name="fabricapesquisa">
                 <?
                 $result2 = "SELECT a.CD_FABRICA CODIGO,a.DS_FABRICA DESCRICAO FROM FABRICAS a,AREAS b,SECAOS c, CENTRO_TRABALHOS d
                 where a.cd_fabrica=b.cd_fabrica and b.cd_area=c.cd_area and c.cd_secao=d.cd_secao
                 and d.cd_centro in (select distinct CD_CENTRO FROM ATUACAO_USUARIO_CENTRO WHERE CD_USUARIO='$codigousuario' and id_atualizar='S')
                 ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CODIGO"]}\">{$row["DESCRICAO"]}</option>";
                 }
				 ?>
				 </select>
				 
				  Ano:<input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">
    Mes:<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="mes" >
    <option value="">Todos</option>
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
				 

        <input type="hidden" name="escolha" value="avancando1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorarea" value="<?echo $contadorarea;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $codigousuario;?>">


		<input  type="submit"     VALUE="Avançar">




<?



}  //FINAL DA SEGUNDA TELA


if ($escolha=="avancando1"){

?>



<center><div class='divscroll' style='height:390;width:650'>
    Etapa-2 Seleção de Centros para Transferencia de Equipamentos</br></br>

   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>


  <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Centro Trabalho para Recebimento</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?


                 $contadorarea="0";
                 $result2 = "select CD_CENTRO,DS_CENTRO FROM CENTRO_TRABALHOS  WHERE  CD_CENTRO IN ( SELECT CD_CENTRO FROM
                 ATUACAO_USUARIO_CENTRO WHERE CD_USUARIO='$codigousuario' and id_atualizar='S') AND CD_CENTRO IN
                 (select a.CD_CENTRO FROM CENTRO_TRABALHOS a,SECAOS b,AREAS c WHERE a.CD_SECAO=b.cd_secao and
                 b.cd_area=c.cd_area and c.cd_fabrica='$fabricapesquisa') ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorarea=$contadorarea+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_CENTRO"];?></td>
					<td ><input type="checkbox" name="listaarea[]" value="<?echo $row["CD_CENTRO"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>
        <input type="hidden" name="escolha" value="avancando2">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorarea" value="<?echo $contadorarea;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
		<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
		<input type="hidden" name="ano" value="<?echo $ano;?>">
		<input type="hidden" name="mes" value="<?echo $mes;?>">


</div>


		<input  type="submit"     VALUE="Avançar">



<?

}

if ($escolha=="avancando2"){







 for ($passa=0;$passa <=$contadorarea;$passa++)
 {
                           $criafinal=$listaarea[$passa];


                           if ($criafinal>"0"){
                           

                           
                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FILTRO(CD_CENTRO,CD_USUARIO) VALUES(
                           '$criafinal','$usuariopesquisa')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }

  ECHO "Ano:$ano - Mes:$mes ";


  $contadorcentro="0";
  $sselecao = OCIParse($ora_conexao, "SELECT CD_MAQUINA,DS_MAQUINA,PATRIMONIO,CD_CENTRO FROM MAQUINAS WHERE
  CD_CENTRO IN (SELECT CD_CENTRO FROM AUX_FILTRO WHERE CD_USUARIO='$usuariopesquisa') and
  cd_maquina  in (select cd_maquina from MOVIMENTACAO_MAQUINA_BI where status='T') and
  cd_centro in (select cd_centro from ATUACAO_USUARIO_CENTRO where ID_ATUALIZAR='S' and  CD_USUARIO='$usuariopesquisa')
  ");





?>
 <center><div class='divscroll' style='height:390;width:650'>
 <CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>
                <th>Codigo</th>
				<th>Patrimonio</th>
                <th>Descrição</th>
                <th>Dia</th>
                <th>Hora</th>
               	<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>


<?




OCIExecute($sselecao, OCI_DEFAULT);
        While (OCIFetch($sselecao)) {
          $contadorcentro=$contadorcentro+1;
          $descricao1=ociresult($sselecao, "CD_MAQUINA") ;
          $descricao2=ociresult($sselecao, "DS_MAQUINA") ;
          $descricao3=ociresult($sselecao, "PATRIMONIO") ;
          $descricao4=ociresult($sselecao, "CD_CENTRO") ;


               ?>

			        <tr>



					<td  align="left"><?echo $descricao1;?></td>
                  	<td  align="left"><?echo $descricao3;?></td>
                  	<td  align="left"><?echo $descricao2;?></td>
                  	<td><input type="TXT" name="dia[]" SIZE="3" ></td>
                  	<td><input type="TXT" name="hora[]" SIZE="3" ></td>


					<td ><input type="checkbox" name="lista[]" value="<?echo $descricao1;?>">
					<input type="hidden" name="listacentro[]" value="<?echo $descricao4;?>"></td>


			 <?

			 }

 ?>
 </table>
 </div>
 <input type="hidden" name="escolha" value="gravasaida">
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
		<input type="hidden" name="ano" value="<?echo $ano;?>">
		<input type="hidden" name="mes" value="<?echo $mes;?>">
			<input  type="submit"     VALUE="Avançar">
<?
}

if ($escolha=="gravasaida"){

echo "vai comecar a gravar//contador:$contadorcentro";



  for ($passa=0;$passa <=$contadorcentro;$passa++)
 {
                           $criafinal=$lista[$passa];
                           $listacentro2=$listacentro[$passa];
                           $dia2=$dia[$passa];
                           $datapesquisa1=$dia2."/".$mes."/".$ano;

                           if ($criafinal>"0"){
                           

                         $quantoss17 = OCIParse($ora_conexao, "select MAX(NR_SEQUENCIA) MAXIMA
                         from MOVIMENTACAO_MAQUINA_BI");
                         OCIExecute($quantoss17, OCI_DEFAULT);
                         While (OCIFetch($quantoss17)) {

                           $maxima44=ociresult($quantoss17, "MAXIMA") ;
                           IF ($maxima44>"0"){$maxima45=$maxima44+1;}ELSE{$maxima45="1";}
                        }

                           echo "update MOVIMENTACAO_MAQUINA_BI set DT_CHEGADA='$datapesquisa1',STATUS='R',
                           CD_USUARIO_RECEBIMENTO='$usuariopesquisa',CD_CENTRO_RECEBE='$listacentro2'
                           WHERE CD_MAQUINA='$criafinal'";

                           $sgrava1= OCIParse($ora_conexao, "update MOVIMENTACAO_MAQUINA_BI set DT_CHEGADA='$datapesquisa1',STATUS='R',
                           CD_USUARIO_RECEBIMENTO='$usuariopesquisa',CD_CENTRO_CHEGADA='$listacentro2'
                           WHERE CD_MAQUINA='$criafinal'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           }
  }



}//final  da saida



 ?>




</form>


