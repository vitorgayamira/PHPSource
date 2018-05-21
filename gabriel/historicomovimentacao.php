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


<form action="historicomovimentacao.php"  name="formulario" method="POST">








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
                    $centrodestinofinal=$_POST['centrodestinofinal'];
                    $documento=$_POST['documento'];
                    $mes=$_POST['mes'];
                    $ano=$_POST['ano'];
                    $centrodestinofinal=$_POST['centrodestinofinal'];
                    $dataprevista=$_POST['dataprevista'];
                    $documento=$_POST['documento'];
                    $maquinasolicitada=$_POST['maquinasolicitada'];

}



$ano=date('Y');
 $programa="historicomovimentacao.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 

 ?>


<CENTER><font style='font-size: 19px;color: BLACK;text-align:left;bold: Negrito' >Historico de Movimentação</font></BR>







<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>


<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>&navegando=sim&banco=<?ECHO $banco;?>&escolha=2&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>




<?
if (!IsSet($escolha) or $escolha=="1"  ){
?></br>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">
 <tr >
  <th>Nr Movimentação</th>
  <th>Patrimonio Maquina</th>
  <th>Dta Solicitada</th>
  <th>Nr Documento</th>
  <th>Solicitante</th>



  <th>Dia Saida</th>
  <th>Maquina</th>
  <th>Centro Retirada</th>
  <th>Usuário Liberação</th>
  <th>Dia Recebimento</th>
  <th>Centro de Recebimento</th>
  <th>Usuário Recebimento</th>
  <th>Status</th>

</tr>
<?


 $quantaslinhasamostra="0";

  $s = OCIParse($ora_conexao, "select a.nr_sequencia SEQUENCIA,b.ds_centro CENTROLIBERA,c.nm_usuario USUARIOLIBERA,
  d.ds_centro CENTRORECEBE,e.nm_usuario USUARIORECEBE,a.DT_SAIDA SAIDA,a.STATUS STATUS,a.DT_CHEGADA CHEGADA,
  f.patrimonio PATRI,f.cd_maquina MAQUINA,a.NR_DOCUMENTO DOCUMENTO,a.cd_solicitante ,a.DT_PREVISTA_CHEGADA DATA,g.DESCRICAO SOLI
  FROM
  MOVIMENTACAO_MAQUINA_BI a,CENTRO_TRABALHOS b,USUARIO_BI c,CENTRO_TRABALHOS d,USUARIO_BI e,MAQUINAS f,PESSOA_BI g
  WHERE a.cd_centro_saida=b.cd_centro(+) and
  a.cd_centro_chegada=d.cd_centro(+) and
  a.cd_usuario_liberacao=c.cd_usuario(+) and
  a.cd_usuario_recebimento=e.cd_usuario(+) AND
  a.cd_maquina=f.cd_maquina  AND
  a.CD_SOLICITANTE=g.codigo
  ORDER  by a.DT_SAIDA ASC");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

          $descricao1=ociresult($s, "SEQUENCIA") ;
          $descricao2=ociresult($s, "PATRI") ;
          $descricao3=ociresult($s, "STATUS") ;
          $descricao4=ociresult($s, "SAIDA") ;
          $descricao5=ociresult($s, "MAQUINA") ;
          $descricao6=ociresult($s, "USUARIOLIBERA") ;
          $descricao7=ociresult($s, "CENTROLIBERA") ;
          $descricao8=ociresult($s, "USUARIORECEBE") ;
          $descricao9=ociresult($s, "CHEGADA") ;
          $descricao10=ociresult($s, "CENTRORECEBE") ;
          $data10=ociresult($s, "DATA") ;
          $soli10=ociresult($s, "SOLI") ;
          $docum10=ociresult($s, "DOCUMENTO") ;


          IF ($descricao3=="T"){$mostra="Transito";$cormostra="red";}
          IF ($descricao3=="A"){$mostra="Solicitação em Aberto";$cormostra="Yellow";}
          IF ($descricao3=="R"){$mostra="Solicitação Recebida";$cormostra="green";}




   ?>
   <tr>
   <h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >

   <td><?echo $descricao1;?> </td>
   <td><?echo $descricao2;?> </td>
   <td><?echo $data10;?> </td>
   <td><?echo $docum10;?> </td>
   <td><?echo $soli10;?> </td>


   <td><?echo $descricao4;?> </td>
   <td><?echo $descricao5;?> </td>
   <td><?echo $descricao7;?> </td>
   <td><?echo $descricao6;?> </td>
   <td><?echo $descricao9;?> </td>
   <td><?echo $descricao10;?> </td>
   <td><?echo $descricao8;?></td>
   <td bgcolor="<?echo $cormostra;?>"><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' ><?echo $mostra;?> </td>

   </tr>

   <?


}
?>
</TABLE>

<?

}

if ($escolha=="2" ){
?></br>
<h1 style='font-size: 15px;color: black;bold: Negrito text-decoration: none' >
Etapa-1 Definindo uma Solictação de Transferência</br></br></br></h1>
Unidade de Negócio Para Recebimento:<select name="centrodestinofinal">
                 <?
                 $result2 = "select CD_CENTRO,DS_CENTRO FROM CENTRO_TRABALHOS  WHERE  CD_CENTRO IN ( SELECT CD_CENTRO FROM
                 ATUACAO_USUARIO_CENTRO WHERE CD_USUARIO='$codigousuario' and id_atualizar='S')
                 ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_CENTRO"]}\">{$row["DS_CENTRO"]}</option>";
                 }
				 ?>
				 </select></br>
				 
				 Dia Prevista Recebimento:<input type="txt" name="dataprevista" SIZE="3"> </br>


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
	</br>

    Ano:<input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">
    </br>
                 Nr Documento:<input type="txt" name="documento" >
	</br>
                 Pessoa Solicitante:<select name="pessoasolicitante">
                 <?
                 $result2 = "select CODIGO,DESCRICAO FROM PESSOA_BI  WHERE  ID_TIPO_PESSOA='1'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CODIGO"]}\">{$row["DESCRICAO"]}</option>";
                 }
				 ?>
				 </select>
				 
       </br>

				 Máquina Solicitada:<select name="maquinasolicitada">
                 <?
                 $result2 = "
				 SELECT a.CD_MAQUINA CODIGO,a.DS_MAQUINA DESCRICAO,a.PATRIMONIO PATI,a.CD_CENTRO CENTRO FROM MAQUINAS a WHERE
    a.cd_maquina not in (select cd_maquina from MOVIMENTACAO_MAQUINA_BI where status='T') and
    a.cd_maquina NOT in (select cd_maquina from MOVIMENTACAO_MAQUINA_BI where status='A') and
    a.cd_centro in (select cd_centro from ATUACAO_USUARIO_CENTRO where ID_ATUALIZAR='S' and  CD_USUARIO='$codigousuario') ORDER
    BY a.PATRIMONIO ASC";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CODIGO"]}\">Patrimonio:{$row["PATI"]}-{$row["DESCRICAO"]}-Centro:{$row["CENTRO"]}</option>";
                 }
				 ?>
				 </select>
				 
				 
        </br>

                 <input type="hidden" name="escolha" value="gravaordem">
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

			<input  type="submit"     VALUE="Avançar">

<?
}
if ($escolha=="gravaordem" ){

       $datapesquisa1=$dataprevista."/".$mes."/".$ano;
       
                         $quantoss17 = OCIParse($ora_conexao, "select MAX(NR_SEQUENCIA) MAXIMA
                         from MOVIMENTACAO_MAQUINA_BI");
                         OCIExecute($quantoss17, OCI_DEFAULT);
                         While (OCIFetch($quantoss17)) {

                           $maxima44=ociresult($quantoss17, "MAXIMA") ;
                           IF ($maxima44>"0"){$maxima45=$maxima44+1;}ELSE{$maxima45="1";}
                        }

                            ECHO "insert into MOVIMENTACAO_MAQUINA_BI(NR_SEQUENCIA,STATUS,DT_PREVISTA_RECEBIMENTO,
                           CD_SOLICITANTE,CD_CENTRO_CHEGADA,NR_DOCUMENTO,cd_maquina)
                           VALUES(
                           '$maxima45','A','$datapesquisa1','$pessoasolicitante','$centrodestinofinal','$documento','$maquinasolicitada')";

                           $sgrava1= OCIParse($ora_conexao, "insert into MOVIMENTACAO_MAQUINA_BI(NR_SEQUENCIA,STATUS,DT_PREVISTA_CHEGADA,
                           CD_SOLICITANTE,CD_CENTRO_CHEGADA,NR_DOCUMENTO,cd_maquina)
                           VALUES(
                           '$maxima45','A','$datapesquisa1','$pessoasolicitante','$centrodestinofinal','$documento','$maquinasolicitada')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);

}

?>


</form>


