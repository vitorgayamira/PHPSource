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
document.nome_formulario.action="solicitacaoservicoterceiro.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novasolicitacaoservico.php";
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

<form action="solicitacaoservicoterceiro.php" method="POST" name="nome_formulario">

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






}

require("configuraoracle.php");
require("estilo2.css");



if ($escolha=="eliminar"){
 $sgrava1= OCIParse($ora_conexao, "delete from SERV_TERC_PEDIDO where nr_pedido='$pedidoaltera'");
 OCIExecute($sgrava1, OCI_DEFAULT);
 oci_commit($ora_conexao);
 echo "Eliminado Pedido Nr.".$pedidoaltera;
}


if ($escolha=="gravandoorcamento"){


$lista=$_POST['lista'];
$lista1=$_POST['lista1'];
$lista2=$_POST['lista2'];
$lista3=$_POST['lista3'];

$result2xistevei8977 = "select count(*) CONTADOR  FROM SERVICO_GERAIS_SADEGE a,
 SERV_TERC_ITENS b
 where a.cd_servico=b.cd_servico and
 b.nr_pedido='$pedidoaltera'";
                                  $result3ver8977 = @OCIParse($ora_conexao, $result2xistevei8977);
				                  @OCIExecute($result3ver8977, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8977,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo77=ociresult($result3ver8977, "CONTADOR") ;
                                  }

                                  for ($passa7=0;$passa7 <=$ultimo77;$passa7++)
                                  {
                                   $servicogravacao7=$lista[$passa7];
                                   $orcadogravacao7=$lista1[$passa7];
                                   $datagravacao7=$lista2[$passa7];
                                   $horasgravacao7=$lista3[$passa7];

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_ITENS
                                     set QUANTIDADE='1',VL_UNITARIO='$orcadogravacao7',DATA_PREV_ENTREGA='$datagravacao7',
                                     PREVISAO_HORAS='$horasgravacao7' where nr_pedido='$pedidoaltera' and
                                     cd_servico='$servicogravacao7'");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);


                                  }


                                 //MUDA STATUS TESTE

                                 $result2xistevei89778 = "select count(*) CONTADOR
                                 FROM  SERV_TERC_ITENS  where nr_pedido='$pedidoaltera'
                                 AND VL_UNITARIO='0'
                                  ";
                                  $result3ver89778 = @OCIParse($ora_conexao, $result2xistevei89778);
				                  @OCIExecute($result3ver89778, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89778,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo778=ociresult($result3ver89778, "CONTADOR") ;
                                  }
                                  
                                  $result2xistevei897789 = "select count(*) CONTADOR
                                 FROM  SERV_TERC_ITENS  where nr_pedido='$pedidoaltera'";
                                  $result3ver897789 = @OCIParse($ora_conexao, $result2xistevei897789);
				                  @OCIExecute($result3ver897789, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver897789,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo7789=ociresult($result3ver897789, "CONTADOR") ;
                                  }

                                   IF ($ultimo778 =="0" and $ultimo7789>"0"){

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='COTA' WHERE  nr_pedido='$pedidoaltera' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                   }

echo "Gravando Orçamento Pedido:$pedidoaltera";




}//final da definicao do orcamento



if ($escolha=="aprovardesabilitarorcamento"){

echo "Começando a Aprovar ou  Desabilitar";



$sequenciatrata=$_POST['sequenciatrata'];
$listaaprova=$_POST['listaaprova'];
$listaarquiva=$_POST['listaarquiva'];


$result2xistevei8977 = "select count(*) CONTADOR  FROM
SERV_TERC_ITENS a,FORNECEDOR_SADEGE b, SERVICO_GERAIS_SADEGE c,SERV_TERC_PEDIDO d
where a.cd_servico in (select cd_servico from
SERV_TERC_ITENS where nr_pedido='$pedidoaltera') and
a.cd_servico=c.cd_servico and
a.cod_fornecedor=b.cod_fornecedor  AND
a.nr_pedido=d.nr_pedido";


                                  $result3ver8977 = @OCIParse($ora_conexao, $result2xistevei8977);
				                  @OCIExecute($result3ver8977, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8977,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo778=ociresult($result3ver8977, "CONTADOR") ;
                                  }
                                  

                                  for ($passa78=0;$passa78 <=$ultimo778;$passa78++)
                                  {

                                   $paraaprovar=$listaaprova[$passa78];
                                   $paraarquivar=$listaarquiva[$passa78];

                                     echo "</BR>aprova:$paraaprovar//arquivar:$paraarquivar</br>";
                                     
                                     if ($paraarquivar >"0"){

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='DESA' WHERE  nr_pedido='$paraarquivar' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     ECHO "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='DESA' WHERE  nr_pedido='$paraarquivar'";


                                     }
                                     
                                     if ($paraaprovar >"0"){

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='APRO' WHERE  nr_pedido='$paraaprovar' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     ECHO "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='APRO' WHERE  nr_pedido='$paraaprovar'";


                                     }
                                     
                                     
                                     

                                  }


 echo "quantos: $ultimo778";






}//final da aprovacao ou desabiliatr



if ($escolha=="executapedido"){


$lista=$_POST['lista'];
$lista1=$_POST['lista1'];
$lista2=$_POST['lista2'];
$lista3=$_POST['lista3'];

$result2xistevei8977 = "select count(*) CONTADOR  FROM SERVICO_GERAIS_SADEGE a,
 SERV_TERC_ITENS b
 where a.cd_servico=b.cd_servico and
 b.nr_pedido='$pedidoaltera'";
                                  $result3ver8977 = @OCIParse($ora_conexao, $result2xistevei8977);
				                  @OCIExecute($result3ver8977, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8977,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo77=ociresult($result3ver8977, "CONTADOR") ;
                                  }

                                  for ($passa7=0;$passa7 <=$ultimo77;$passa7++)
                                  {
                                   $servicogravacao7=$lista[$passa7];
                                   $garantiagravacao7=$lista1[$passa7];
                                   $datagravacao7=$lista2[$passa7];
                                   $terminogravacao7=$lista3[$passa7];

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_ITENS
                                     set DATA_ENTREGA='$datagravacao7',
                                     GARANTIA='$garantiagravacao7',TERMINO_GARANTIA='$terminogravacao7'
                                      where nr_pedido='$pedidoaltera' and
                                     cd_servico='$servicogravacao7'");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);


                                  }


                                 //MUDA STATUS TESTE
                                 
                                 $diahoje=date('d-m-Y');

                                 $result2xistevei89778 = "select count(*) CONTADOR
                                 FROM  SERV_TERC_ITENS  where nr_pedido='$pedidoaltera'
                                 AND DATA_ENTREGA <='$diahoje'
                                  ";
                                  $result3ver89778 = @OCIParse($ora_conexao, $result2xistevei89778);
				                  @OCIExecute($result3ver89778, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89778,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo778=ociresult($result3ver89778, "CONTADOR") ;
                                  }

                                  $result2xistevei897789 = "select count(*) CONTADOR
                                 FROM  SERV_TERC_ITENS  where nr_pedido='$pedidoaltera'";
                                  $result3ver897789 = @OCIParse($ora_conexao, $result2xistevei897789);
				                  @OCIExecute($result3ver897789, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver897789,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo7789=ociresult($result3ver897789, "CONTADOR") ;
                                  }
                                  
                                  $result2xistevei897786 = "select count(*) CONTADOR
                                 FROM  SERV_TERC_ITENS  where nr_pedido='$pedidoaltera'";
                                  $result3ver897786 = @OCIParse($ora_conexao, $result2xistevei897786);
				                  @OCIExecute($result3ver897786, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver897786,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo780=ociresult($result3ver897786, "CONTADOR") ;
                                  }



                                   IF ($ultimo778 ==$ultimo780 and $ultimo7789>"0"){

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='FINA' WHERE  nr_pedido='$pedidoaltera' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     echo "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='FINA' WHERE  nr_pedido='$pedidoaltera'";
                                     
                                     
                                   }

echo "Fechando  Pedido:$pedidoaltera";




}//final da execucuao








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




 <center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Solicitação de Serviço</font></br>


  Ano:<input  style="background-color:#8B8378;color: white;" type="txt" name="anopesquisa" value="<?echo $anopesquisa;?>" size="5" >
    Mes:<select name="mespesquisa" style="background-color:#8B8378;color: white;">
    <option value="<?echo $mespesquisa;?>"><? echo $mespesquisamostra;?></option>
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
	
	Empresa Solicitante: <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;">
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



 <input type="SUBMIT" onclick="Botao1()" value="Consultar"></input>

 <input type="button" onclick="Botao2()" value="Nova Solicitação"></input>

<?
if (!IsSet($escolha) or ($escolha=="1") or ($escolha=="gravandoorcamento") or ($escolha=="aprovar") ){
?>
</br></br>
<hr>
<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

 <tr>


    			<th>Nr.Pedido</th>
                <th>Dta Abertura</th>

                <th>Dta Inicio</th>
                <th>Solicitante</th>
                <th>Fornecedor</th>
                <th>Nr Ordem Serviço</th>

                <th>Status </br> Solicitação</th>

                <th>Eliminar</th>


   </tr>

<? 


       $s = OCIParse($ora_conexao, "select  a.NR_PEDIDO NR_PEDIDO,
                                  a.DATA_DIGITACAO DATA1,
                                  a.DATA_EMISSAO DATA2,
                                  a.COD_FORNECEDOR,
                                  a.CD_EMPRESA_SOLICITANTE  EMPRESA1,
                                  a.NR_SEQUENCIA,
                                  a.NR_ORDEM_SERVICO ORDEM,b.EMPRESA DESCRICAO,a.id_status STATUS
                                  FROM serv_terc_pedido a,FORNECEDOR_SADEGE b
                                  where a.COD_FORNECEDOR=b.COD_FORNECEDOR AND
                                  a.CD_EMPRESA_SOLICITANTE LIKE '%$solicitantepesquisa%'
                                  ");


      OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $pedido=ociresult($s, "NR_PEDIDO") ;
      $data1=ociresult($s, "DATA1") ;

      $data2=ociresult($s, "DATA2") ;
      $descricao=ociresult($s, "DESCRICAO") ;
      $ordem=ociresult($s, "ORDEM") ;
      $status=ociresult($s, "STATUS") ;
      $solicitante=ociresult($s, "EMPRESA1") ;


          ?>
			<tr>
					<td ><?echo $pedido;?></td>
					<td ><?echo $data1;?></td>
                    <td ><?echo $data2;?></td>
                    <td ><?echo $solicitante;?></td>
                    <td ><?echo $descricao;?></td>
                    <td ><?echo $ordem;?></td>


                    <?

                         if ($status=="ABER"){$statusmostra="Sem Cotação";$cor="white";}
                         if ($status=="COTA"){$statusmostra="Cotado";$cor="yellow";}
                         if ($status=="APRO"){$statusmostra="Aprovado";$cor="green";}
                         if ($status=="ANDA"){$statusmostra="Execução ";$cor="blue";}
                         if ($status=="FINA"){$statusmostra="Finalizado";$cor="green";}
                         if ($status=="DESA"){$statusmostra="Desativado";$cor="red";}
                         


              if (($status=="ABER")){?>
              <td BGCOLOR=<?echo $cor;?>><a href="solicitacaoservicoterceiro.php?pagina=1&escolha=cotar&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>"><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></a></td>

             <?
             }//FINAL  SO DA ABERTAS
             ELSE
             {

                  if (($status=="COTA")){?>
                  <td BGCOLOR=<?echo $cor;?>><a href="solicitacaoservicoterceiro.php?pagina=1&escolha=aprovar&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>"><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' ><?echo $statusmostra;?></a></td>
                   <?
                  }
                  else
                  {

                      if (($status=="APRO") or ($status=="ANDA")  ){?>
                      <td BGCOLOR=<?echo $cor;?>><a href="solicitacaoservicoterceiro.php?pagina=1&escolha=executar&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>"><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' ><?echo $statusmostra;?></a></td>
                       <?
                       }
                       
                       if ($status=="DESA"){?>
                      <td BGCOLOR=<?echo $cor;?>><font style='font-size: 12px;color: WHITE;text-align:left;bold: Negrito' ><?echo $statusmostra;?></td>
                       <?
                       }

                       if ($status=="FINA"){
                         ?><td BGCOLOR=<?echo $cor;?>><font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >
                         <?echo $statusmostra;?></td>
                       <?
                       }

                  }//FINAL aprovacao



             }









                     if (($status=="ABER") ){?>
                     <td ><a href="solicitacaoservicoterceiro.php?pagina=1&escolha=eliminar&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>">sim</a></td>

          <?
             }//FINAL  SO DA ABERTAS
             ELSE{
               ?><td ></td><?
             }


          }//FINAL DE TOADAS ORDENS


 
 ?>

                    </tr>
 </table>



<?
}//final da tela de abertura


if ($escolha=="cotar"){
 ?>
 </br></br></br></br>
 <hr>
 <?
 echo "Pedido Nr".$pedidoaltera;


 ?>
 
 <center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Definindo Orçamento</font>
</br></br>



<font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >


<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="700">

<tr>

  <th>Serviço</th>
  <th>Valor</br> Orçamento(R$)</th>
  <th>Data Prevista</br> de Entrega</th>
  <th>Previsão</br>Horas</th>
  <a href="javascript:Oculta('primeiro');">Calendário</a>
</tr>


<?
 $s= OCIParse($ora_conexao, "SELECT a.CD_SERVICO CODIGO,a.DS_SERVICO DESCRICAO,NVL(b.VL_UNITARIO,0) VALOR,
 b.DATA_PREV_ENTREGA DATA,b.PREVISAO_HORAS  HORA FROM SERVICO_GERAIS_SADEGE a,
 SERV_TERC_ITENS b
 where a.cd_servico=b.cd_servico and
 b.nr_pedido='$pedidoaltera'
 order by  DS_SERVICO asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CODIGO") ;
          $descricaoS=ociresult($s, "DESCRICAO") ;
          $valorS=ociresult($s, "VALOR") ;
          $dataS=ociresult($s, "DATA") ;
          $horaS=ociresult($s, "HORA") ;

          if ($dia >"0"){
          $dataprevista=$dia."/".$month."/".$year;
          }
          else
          {
           $dataprevista=$dataS;
          }
          

   ?>
   <tr>

   <td><input type="hidden" name="lista[]" value="<?echo $codigoS;?>" ><?echo $descricaoS;?> </td>
   <td><input type="TXT" name="lista1[]" value="<?echo $valorS;?>" size="10"></td>
   <td><input type="TXT" name="lista2[]" size="8" value="<?echo $dataprevista;?>" ></td>
   <td><input type="TXT" name="lista3[]" size="5" value="<?echo $horaS;?>"></td>

   </tr>
 <?
 }
 ?>

</table>
<input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="gravandoorcamento">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="pedidoaltera" value="<?echo $pedidoaltera;?>">


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
<input  type="submit" VALUE="Gravar">

<?

}//fin la da funcao  definindo orcamento


if ($escolha=="aprovar"){
?>
</br></br>

 <center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Aprovação de Orçamentos</font>
</br></br>



<font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">

<tr>
  <th>Status</th>
  <th>Solicitante</th>
  <th>Nr.Pedido</th>
  <th>Fornecedor</th>
  <th>Serviço</th>
  <th>Nr.Ordem</th>
  
  <th>Valor Orçado(R$)</th>
  <th>Dta prevista Entrega</th>
  <th>previsao Horas</th>

  <th>Seleção</br>Aprovação</th>
  <th>Seleção</br>Arquivamento</th>


</tr>


<?
 $s= OCIParse($ora_conexao, "select a.nr_pedido PEDIDO,a.cod_fornecedor,a.cd_servico,b.empresa EMPRESA,
 c.ds_servico SERVICO,a.VL_UNITARIO VALOR,a.DATA_PREV_ENTREGA DATA,a.PREVISAO_HORAS HORA,
 d.NR_ORDEM_SERVICO ORDEM,d.CD_EMPRESA_SOLICITANTE SOLICITA,d.id_status STATUS from
 SERV_TERC_ITENS a,FORNECEDOR_SADEGE b, SERVICO_GERAIS_SADEGE c,SERV_TERC_PEDIDO d
  where a.cd_servico in (select cd_servico from
 SERV_TERC_ITENS where nr_pedido='$pedidoaltera') and
 a.cd_servico=c.cd_servico and
 a.cod_fornecedor=b.cod_fornecedor  AND
 a.nr_pedido=d.nr_pedido order  by c.ds_servico,a.VL_UNITARIO asc");


 

              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $servico88=ociresult($s, "SERVICO") ;
          $fornS=ociresult($s, "EMPRESA") ;
          $pedidoS=ociresult($s, "PEDIDO") ;
          $valorS=ociresult($s, "VALOR") ;
          $dataS=ociresult($s, "DATA") ;
          $horaS=ociresult($s, "HORA") ;
          $status=ociresult($s, "STATUS") ;
          
          $solictaS=ociresult($s, "SOLICITA") ;
          $ordemS=ociresult($s, "ORDEM") ;
          
          if ($status=="ABER"){$statusmostra="Sem Cotação";$cor="white";}
                         if ($status=="COTA"){$statusmostra="Cotado";$cor="yellow";}
                         if ($status=="APRO"){$statusmostra="Aprovado";$cor="green";}
                         if ($status=="ANDA"){$statusmostra="Execução ";$cor="blue";}
                         if ($status=="FINA"){$statusmostra="Finalizado";$cor="green";}
                         if ($status=="DESA"){$statusmostra="Desativado";$cor="red";}



   ?>
   <tr BGCOLOR=<?echo $cor;?>>
   <td><?echo $statusmostra;?> </td>
   <td><?echo $solictaS;?> </td>
   <td><?echo $pedidoS;?> </td>
   <td><?echo $fornS;?> </td>
   <td><?echo $servico88;?> </td>
   <td><?echo $ordemS;?> </td>

   
   <td><?echo $valorS;?> </td>
   <td><?echo $dataS;?> </td>
   <td><?echo $horaS;?> </td>


   <? if ($status=="COTA"){?>
   <td>
   <input type="hidden" name="sequenciatrata[]" value="<?echo $pedidoS;?>" >
   <input type="checkbox" name="listaaprova[]" value="<?echo $pedidoS;?>">
   </td>
   <td><input type="checkbox" name="listaarquiva[]" value="<?echo $pedidoS;?>"></td>
   <?}

   if (($status=="ABER") or ($status=="APRO") or ($status=="ANDA") or ($status=="ANDA") or ($status=="DESA"))
   {?>
   <td>
   <input type="hidden" name="sequenciatrata[]" value="<?echo $pedidoS;?>" >
   </td>
   <td></td>
   <?
   }
   ?>

   </tr>
 <?
 }
 ?>

</table>

<input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="aprovardesabilitarorcamento">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="pedidoaltera" value="<?echo $pedidoaltera;?>">


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
<input  type="submit" VALUE="Avançar">



<?
}//final quasnso esta aprovando



if ($escolha=="executar"){


 ?>
 </br></br></br></br>
 <hr>
 <?
 echo "Pedido Nr".$pedidoaltera;


 ?>

 <center><font style='font-size: 24px;color: red;text-align:center;bold: Negrito' >Executando Serviço</font>
</br></br>



<font style='font-size: 15px;color: black;text-align:center;bold: Negrito' >


<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="700">

<tr>

  <th>Serviço</th>
  <th>Garantia</th>
  <th>Data </br> de Entrega</th>
  <th>Data </br>Final Garantia</th>
  <a href="javascript:Oculta('primeiro');">Calendário</a>
</tr>


<?
 $s= OCIParse($ora_conexao, "SELECT a.CD_SERVICO CODIGO,a.DS_SERVICO DESCRICAO,
 b.DATA_ENTREGA DATA,b.GARANTIA GARANTIA,b.TERMINO_GARANTIA TERMINO  FROM SERVICO_GERAIS_SADEGE a,
 SERV_TERC_ITENS b
 where a.cd_servico=b.cd_servico and
 b.nr_pedido='$pedidoaltera'
 order by  DS_SERVICO asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CODIGO") ;
          $descricaoS=ociresult($s, "DESCRICAO") ;
          $valorgarantiaS=ociresult($s, "GARANTIA") ;
          $dataS=ociresult($s, "DATA") ;
          $terminogarantiaS=ociresult($s, "TERMINO") ;

          if ($dia >"0"){
          $dataexe=$dia."/".$month."/".$year;
          }
          else
          {
           $dataexe=$dataS;
          }


   ?>
   <tr>

   <td><input type="hidden" name="lista[]" value="<?echo $codigoS;?>" ><?echo $descricaoS;?> </td>
   <td><input type="TXT" name="lista1[]" value="<?echo $valorgarantiaS;?>" size="10"></td>
   <td><input type="TXT" name="lista2[]" size="8" value="<?echo $dataexe;?>" ></td>
   <td><input type="TXT" name="lista3[]" size="5" value="<?echo $terminogarantiaS;?>"></td>

   </tr>
 <?
 }
 ?>

</table>
<input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="executapedido">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="pedidoaltera" value="<?echo $pedidoaltera;?>">


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
<input  type="submit" VALUE="Gravar">

<?

}//final uando estaa atualizando execuccao



?>

<div style="display: none;" id="primeiro">

<hr>



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

               $year="2013";


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

        <td>
        <table border="0" width="176" align="center" style="border-width:1px">
        <tr>
        <td  style="border-width:1px">
        <table width="175" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="silver">
        <tr bgcolor="#f5f5f5">
            <td colspan="7" align="left"><font size="2" face="verdana">


            <b><? echo "$month_name $year"; ?></b></font>
             </br>


             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=1&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&veiculocodigoe=<?ECHO $veiculocodigoe;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jan</a>
             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=2&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Fev</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=3&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Mar</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=4&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Abr</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=5&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Mai</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=6&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jun</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=7&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Jul</a>


             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=8&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Ago</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=9&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Set</a>

              <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=10&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Out</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=11&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Nov</a>

             <a href="solicitacaoservicoterceiro.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&sequencia=<?ECHO $simulacaopassa;?>&ano=<?ECHO $ano;?>
             &tipoconsulta=<?ECHO $tipoconsulta;?>&month=12&mudoumes=<?ECHO $mudoumes;?>&dataanterior=<?ECHO "$dataanterior";?>&mesanterior=<?ECHO $mesanterior;?>&localbanco=<?ECHO $localbanco;?>&veiculo=<?ECHO $veiculo;?>&solicitantepesquisa=<?echo $solicitantepesquisa;?>">Dez</a>
             <hr><a href="consulta1gestao_combustivel_sadege.php?navegando=sim&codigoempresa=<?ECHO $codigoempresa;?>
             &banco=<?ECHO $banco;?>&codigousuario=<?ECHO $codigousuario;?>&ano=<?ECHO "$ano";?>&month=1&mudoumes=sim&dataanterior=<?ECHO "$data1";?>&mesanterior=<?ECHO $month;?>&localbanco=<?ECHO $localbanco;?>">Pular Mês</a>

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
           if ($contador=="2"){
           ?>
          <td <?=$bg?> align="center"><font color=#0000CD><?=$d?></a></td>
          <?
           }


           $programa="solicitacaoservicoterceiro.php";
           $numeroregistropagina="1";
           $programa2="?";
           $programa3="programapai=";
           $programa9="DIRAentradasistema.php";
           $programa10="&dia=";
           $programa11="&escolha=";
           $programa12="&contador=";
           $programa13="&data1=";
           $programa14="&data2=";
           $programa15="&month=";
           $programa16="&year=";
           $programa17="&banco=";
           $programa18="&navegando=sim";
           $programa19="&codigousuario=";
           $programa20="&fabricapesquisa=";
           $programa21="&veiculo=";
           $programa22="&destino=";
           $programa23="&dataanterior=";
           $programa24="&mesanterior=";
           $programa25="&localbanco=";
           $programa26="&veiculo=";
           $programa27="&solicitantepesquisa=";
           $programa28="&fornecedor1=";
           $programa29="&pedidoaltera=";





            $programa=$programa.$programa2.$programa3.$programa.$programa10.$d.$programa11.$escolha.$programa12.$valorcontador.$programa13.$data1.$programa14.$data2.$programa15.$month.$programa16.$year.$programa17.$banco.$programa18.$programa19.$codigousuario.$programa20.$fabricapesquisa.$programa21.$veiculo.$programa22.$destino.$programa23.$dataanterior.$programa24.$mesanterior.$programa25.$localbanco.$programa26.$veiculo.$programa27.$solicitantepesquisa.$programa28.$fornecedor1.$programa29.$pedidoaltera;

           ?>
          <td <?=$bg?> align="center"><font color=#0000CD><a href="<?echo $programa;?>"><?=$d?></a></td>

          <?
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
           </table>


</div>


</form>
</html>

