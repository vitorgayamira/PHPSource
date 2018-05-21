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



</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="consultaepifuncionario.php";
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

<form action="consultaepifuncionario.php" method="POST" name="nome_formulario">

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
$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$sequenciarecebe=$_GET['sequenciarecebe'];
$statusacao=$_GET['statusacao'];
$padraoexecucao=$_GET['padraoexecucao'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$pedidoaltera=$_GET['pedidoaltera'];


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


}

require("configuraoracle.php");
require("estilo2.css");





if (!IsSet($anopesquisa)){
   $anopesquisa=date('Y');
  }

  if (!IsSet($mespesquisa)){
   $mespesquisa=date('m');

  }

  if (!IsSet($diapesquisa)){
   $diapesquisa=date('d');
  }

  if (!IsSet($turno)){
   $turno="1";
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
  
     $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS WHERE CD_FABRICA='$solicitantepesquisa'";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $solicitantepesquisa=ociresult($result3, "CD_FABRICA") ;
                  $descricaosolicitante=ociresult($result3, "DS_FABRICA") ;
                 }

  }

  if (!IsSet($mantenedor)){
  
      $mantenedor="Todos";
      $descricaomantenedor="Todos";
      
  }
  else
  {

                 $result2mante = "select NOME FROM funcionario_sadege where cadastro='$mantenedor'";
                 $result3mante = @OCIParse($ora_conexao, $result2mante);
				 @OCIExecute($result3mante, OCI_DEFAULT);
				 while (OCIFetchInto($result3mante,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {

                  $descricaomantenedor=ociresult($result3mante, "NOME") ;
                 }

  }
 
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
		<input type="hidden" name="numerolote" value="<?echo $numerolote;?>">




 <center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Consulta EPI por Funcionário</font></br>


	
	             Empresa: <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $solicitantepesquisa;?>"><? echo $descricaosolicitante;?></option>

                 <option value="">Todas</option>
				 <?
                 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS order by DS_FABRICA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>
				 
				 Mantenedor: <select name="mantenedor" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $mantenedor;?>"><? echo $descricaomantenedor;?></option>

                 <option value="Todos">Todos</option>
				 <?
                 $result2 = "SELECT CADASTRO,NOME FROM funcionario_sadege WHERE CADASTRO IN (SELECT CD_FUNCIONARIO
                 FROM controle_epi WHERE CD_FABRICA='$solicitantepesquisa') order by nome  asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["NOME"]}</option>";
                 }
				 ?>
				 </select>
				 
				 
				 



 <input type="SUBMIT" onclick="Botao1()" value="Consultar"></input>


<?
if (!IsSet($escolha) or ($escolha=="1")  ){



?>
</br></br>
<hr>
<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

 <?
 if ($mantenedor=="Todos"){?>

 <tr>

                <th>Mantenedor</th>
    			<th>Código EPI</th>
                <th>Item</th>
                <th>Fornecedor</th>
                <th>Quantidade</br>Disponível</th>
                <th>Unid</th>
                <th>CA</th>
                <th>Vencimento</th>
                <th>Tolerancia</BR> Uso(Dias)</th>
                <th>Status CA</th>
                <th>Padrão</br>Dias</th>
                <th>Uso</br>Dias</th>
                <th>Obrigatório</br>Devolução</th>
                <th>Obrigatório</br>Uso</th>



   </tr>
<?}
else
{

?>

 <tr>


    			<th>Código EPI</th>
                <th>Item</th>
                <th>Fornecedor</th>
                <th>Quantidade</br>Disponível</th>
                <th>Unid</th>
                <th>CA</th>
                <th>Vencimento</th>
                <th>Tolerancia</BR> Uso(Dias)</th>
                <th>Status CA</th>
                <th>Padrão</br>Dias</th>
                <th>Uso</br>Dias</th>
                <th>Obrigatório</br>Devolução</th>
                <th>Obrigatório</br>Uso</th>



   </tr>
<?

}




 if ($mantenedor=="Todos"){
 

 
 $s = OCIParse($ora_conexao, "select  a.cd_epi EPI,a.nr_certificado CERTI,SYSDATE-g.dt_epi DIASDIFERENCA,
 a.id_status STATUS,a.QT_DISPONIVEL QUANTI,TO_CHAR(a.DT_VENCIMENTO,'dd/mm/yyyy') DATA,a.VL_TOLERANCIA_USO TOLERANCIA,
 TO_CHAR(a.DT_LIBERACAO_USO,'dd/mm/yyyy') DATA3,g.cd_dia DIA,g.cd_mes MES,g.cd_ano ANO,
 a.cd_item ITEM,b.ds_material MATERIAL,d.empresa FORNECEDOR,e.ds_unidade UNIDADE,a.ID_STATUS_USO STATUSUSO,
 a.VL_TEMPO_USO_DIA DIAMAXIMO,a.ID_OBRIGATORIO_DEVOLUCAO STATUSDEVOLUCAO,a.ID_OBRIGATORIO_USO STATUSUSO,f.NOME NOME
 FROM epi a,mat_pecas b,mat_pecas_fabrica c,fornecedor_sadege d,unidades e,funcionario_sadege f,controle_epi g
 WHERE a.cd_item=b.cd_material and
 b.cd_material=c.cd_material and
 c.cd_fabrica='$solicitantepesquisa' and
 a.cd_fornecedor=d.cod_fornecedor AND
 a.cd_unidade_item=e.cd_unidade and
 a.cd_epi=g.cd_epi and
 g.cd_funcionario=f.cadastro and
 g.cd_fabrica='$solicitantepesquisa'
 ORDER BY a.DT_VENCIMENTO ASC
 ");

 OCIExecute($s, OCI_DEFAULT);
 While (OCIFetch($s)) {
      $codigo=ociresult($s, "EPI") ;
      $certificado=ociresult($s, "CERTI") ;
      $status2=ociresult($s, "STATUS") ;
      $quantidade2=ociresult($s, "QUANTI") ;
      $data2=ociresult($s, "DATA") ;
      $tolerancia2=ociresult($s, "TOLERANCIA") ;
      $material2=ociresult($s, "MATERIAL") ;
      $data3=ociresult($s, "DATA3") ;
      $fornecedor=ociresult($s, "FORNECEDOR") ;
      $unidade=ociresult($s, "UNIDADE") ;
      $diasmaximo=ociresult($s, "DIAMAXIMO") ;
      $statusdevolucao=ociresult($s, "STATUSDEVOLUCAO") ;
      $statususo=ociresult($s, "STATUSUSO") ;
      $nomemantenedor=ociresult($s, "NOME") ;
      
      $diapega=ociresult($s, "DIA") ;
      $mespega=ociresult($s, "MES") ;
      $anopega=ociresult($s, "ANO") ;
      
      $diasdiferenca=ociresult($s, "DIASDIFERENCA") ;
      



      $datapegafinal=$diapega."/".$mespega."/".$anopega;
      


          ?>
			<tr>
					<td ><?echo $nomemantenedor;?></td>
                    <td ><?echo $codigo;?></td>

					<td ><?echo $material2;?></td>
					<td ><?echo $fornecedor;?></td>
					<td ><?echo $quantidade2;?></td>
					<td ><?echo $unidade;?></td>
                    <td ><?echo $certificado;?></td>
					<td ><?echo $data2;?></td>
					<td ><?echo $tolerancia2;?></td>



                    <?

                         if ($status2=="VA"){

                            $result2soli = "select COUNT(*) CONTADOR FROM epi a,mat_pecas b,mat_pecas_fabrica c,
                            fornecedor_sadege d,unidades e
                            WHERE a.cd_item=b.cd_material and
                            b.cd_material=c.cd_material and
                            c.cd_fabrica='$solicitantepesquisa' and
                            a.cd_fornecedor=d.cod_fornecedor AND
                            a.cd_unidade_item=e.cd_unidade AND
                            a.DT_VENCIMENTO <=sysdate and
                            a.cd_epi='$codigo'" ;
                            $result3soli = @OCIParse($ora_conexao, $result2soli);
				            @OCIExecute($result3soli, OCI_DEFAULT);
				            while (OCIFetchInto($result3soli,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				            {
                              $contadoramarelo=ociresult($result3soli, "CONTADOR") ;

                            }
                            if ($contadoramarelo >"0"){
                              $statusmostra="Atualizar";$cor="yellow";
                            }
                            else
                            {
                               $statusmostra="Válido";$cor="green";
                            }

                         }
                         if ($status2=="VE"){$statusmostra="Vencido";$cor="red";}
                         if ($status2=="TR"){$statusmostra="Trocar";$cor="blue";}



             ?>
              <td BGCOLOR=<?echo $cor;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></td>
<td ><?echo $diasmaximo;?></td>
<td ><?

$diasdiferenca=ceil($diasdiferenca);


echo $diasdiferenca;?></td>

<?

if ($statusdevolucao=="S"){$statusdevolucaomostra="Sim";$coruso="white";}else{$statusdevolucaomostra="Não";$coruso="white";}

?>
              <td BGCOLOR=<?echo $coruso;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statusdevolucaomostra;?></td>

<?
 if ($statususo=="S"){$statususomostra="Sim";$coruso2="white";}else{$statususomostra="Não";$coruso2="white";}

?>
              <td BGCOLOR=<?echo $coruso2;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statususomostra;?></td>


<?



}//FINAL DE TOADAS ORDENS


 }//final quando é todos funcioanrios
 else
 {

 $s = OCIParse($ora_conexao, "select  a.cd_epi EPI,a.nr_certificado CERTI,
 a.id_status STATUS,a.QT_DISPONIVEL QUANTI,TO_CHAR(a.DT_VENCIMENTO,'dd/mm/yyyy') DATA,a.VL_TOLERANCIA_USO TOLERANCIA,
 TO_CHAR(a.DT_LIBERACAO_USO,'dd/mm/yyyy') DATA3,
 a.cd_item ITEM,b.ds_material MATERIAL,d.empresa FORNECEDOR,e.ds_unidade UNIDADE,a.ID_STATUS_USO STATUSUSO,
 a.VL_TEMPO_USO_DIA DIAMAXIMO,a.ID_OBRIGATORIO_DEVOLUCAO STATUSDEVOLUCAO,a.ID_OBRIGATORIO_USO STATUSUSO
 FROM epi a,mat_pecas b,mat_pecas_fabrica c,fornecedor_sadege d,unidades e
 WHERE a.cd_item=b.cd_material and
 b.cd_material=c.cd_material and
 c.cd_fabrica='$solicitantepesquisa' and
 a.cd_fornecedor=d.cod_fornecedor AND
 a.cd_unidade_item=e.cd_unidade and
 a.cd_epi in (select cd_epi from controle_epi where cd_fabrica='$solicitantepesquisa' and
 CD_FUNCIONARIO='$mantenedor')
  ORDER BY a.DT_VENCIMENTO ASC
 ");
 

 
 OCIExecute($s, OCI_DEFAULT);
 While (OCIFetch($s)) {
      $codigo=ociresult($s, "EPI") ;
      $certificado=ociresult($s, "CERTI") ;
      $status2=ociresult($s, "STATUS") ;
      $quantidade2=ociresult($s, "QUANTI") ;
      $data2=ociresult($s, "DATA") ;
      $tolerancia2=ociresult($s, "TOLERANCIA") ;
      $material2=ociresult($s, "MATERIAL") ;
      $data3=ociresult($s, "DATA3") ;
      $fornecedor=ociresult($s, "FORNECEDOR") ;
      $unidade=ociresult($s, "UNIDADE") ;
      $diasmaximo=ociresult($s, "DIAMAXIMO") ;
      $statusdevolucao=ociresult($s, "STATUSDEVOLUCAO") ;
      $statususo=ociresult($s, "STATUSUSO") ;
      

      


          ?>
			<tr>
					<td ><?echo $codigo;?></td>

					<td ><?echo $material2;?></td>
					<td ><?echo $fornecedor;?></td>
					<td ><?echo $quantidade2;?></td>
					<td ><?echo $unidade;?></td>
                    <td ><?echo $certificado;?></td>
					<td ><?echo $data2;?></td>
					<td ><?echo $tolerancia2;?></td>



                    <?

                         if ($status2=="VA"){

                            $result2soli = "select COUNT(*) CONTADOR FROM epi a,mat_pecas b,mat_pecas_fabrica c,
                            fornecedor_sadege d,unidades e
                            WHERE a.cd_item=b.cd_material and
                            b.cd_material=c.cd_material and
                            c.cd_fabrica='$solicitantepesquisa' and
                            a.cd_fornecedor=d.cod_fornecedor AND
                            a.cd_unidade_item=e.cd_unidade AND
                            a.DT_VENCIMENTO <=sysdate and
                            a.cd_epi='$codigo'" ;
                            $result3soli = @OCIParse($ora_conexao, $result2soli);
				            @OCIExecute($result3soli, OCI_DEFAULT);
				            while (OCIFetchInto($result3soli,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				            {
                              $contadoramarelo=ociresult($result3soli, "CONTADOR") ;

                            }
                            if ($contadoramarelo >"0"){
                              $statusmostra="Atualizar";$cor="yellow";
                            }
                            else
                            {
                               $statusmostra="Válido";$cor="green";
                            }

                         }
                         if ($status2=="VE"){$statusmostra="Vencido";$cor="red";}
                         if ($status2=="TR"){$statusmostra="Trocar";$cor="blue";}



             ?>
              <td BGCOLOR=<?echo $cor;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></td>
<td ><?echo $diasmaximo;?></td>
<td >-</td>

<?

if ($statusdevolucao=="S"){$statusdevolucaomostra="Sim";$coruso="white";}else{$statusdevolucaomostra="Não";$coruso="white";}

?>
              <td BGCOLOR=<?echo $coruso;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statusdevolucaomostra;?></td>

<?
 if ($statususo=="S"){$statususomostra="Sim";$coruso2="white";}else{$statususomostra="Não";$coruso2="white";}

?>
              <td BGCOLOR=<?echo $coruso2;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statususomostra;?></td>


<?



}//FINAL DE TOADAS ORDENS


}//escolheu um mantenedor
 
 ?>

                    </tr>
 </table>



<?
}//final da tela de abertura

?>

</form>
</html>

