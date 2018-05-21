<?session_start();?>
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
         background-color: white;

}

#primeiro{
position:absolute;

top:170;
left:20;
background-color:#CDC5BF;
width: 30%;
height: 60%;


}





</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="solicitacaoservicoliberacao_versa2juridica.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novasolicitacaoservicoliberacao_versa2juridica.php";
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


<form action="solicitacaoservicoliberacao_versa2juridica.php" method="POST" name="nome_formulario">

<?



//echo "Usuario conexao:$usuario";




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
$secaosolicitante=$_GET['secaosolicitante'];
$localbanco=$_GET['localbanco'];



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
$tipoexecutor=$_POST['tipoexecutor'];
$codigoerp=$_POST['codigoerp'];
$empresasolicita=$_POST['empresasolicita'];
$localbanco=$_POST['localbanco'];
$tiposolicita=$_POST['tiposolicita'];






}

require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");






$acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM PESSOA_BI A,PESSOA_BI B,USUARIO_GRUPO_BI C,USUARIO_BI D,PESSOA_BI E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.CD_USUARIO='$usuario' AND
		  D.CD_EMPRESA=E.CODIGO
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);
          $nome2=$valor6["NOME"];


		  $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];

?>
<center><table>

<tr>
<td width=40%>
<?

echo "$nomeempresa88";
?>
</td>

<td width=55%></td>
<td width=5%><img border="0" src="imagemfundotelamaximizalogo.jpg"></td>
</tr>
</table>



<table width=95%>

<tr>

<td width=100%>

<?

if ($escolha=="eliminar"){
 $sgrava1= OCIParse($ora_conexao, "delete from SERV_TERC_PEDIDO where nr_pedido='$pedidoaltera'");
 OCIExecute($sgrava1, OCI_DEFAULT);
 oci_commit($ora_conexao);
 echo "Eliminado Pedido Nr.".$pedidoaltera;
}



if ($escolha=="liberarfuncionario"){


$acha166s= "SELECT id_libera_funcionario_acesso VALOR  from usuario_grupo_bi where CD_USUARIO='$usuario'
and cd_pessoa in (select codigo from pessoa_bi where CD_UNIDANEGOCIO_ERP='$secaosolicitante')
";


          $res66s = mysql_db_query($banco,$acha166s,$conexao);
          $valor666s=mysql_fetch_array($res66s);
          $VALORpessoa5=$valor666s["VALOR"];
          
IF ($VALORpessoa5=="S"){

?>


</br></br>
<hr>
<center>
<?echo "Pedido Analisado:$pedidoaltera";?>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Funcionário</th>
  <th>Data1</th>
  <th>Data2</th>
  <th>Seleção</th>


</tr>
<?

$s= OCIParse($ora_conexao, " select a.nome NOME,a.cadastro CADASTRO,b.DT_LIMITE_ACESSO_INICIAL DATA1,
b.DT_LIMITE_ACESSO_FINAL DATA2,
b.ID_LIBERADO LIBERADO
 from  FUNCIONARIO_SADEGE a,SOLICITACAO_MOTIVO_FUNC b where
 a.cadastro=b.cd_funcionario and
 b.nr_pedido='$pedidoaltera'");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $cadastroS=ociresult($s, "CADASTRO") ;
          $nomeS=ociresult($s, "NOME") ;
          $data1=ociresult($s, "DATA1") ;
          $data2=ociresult($s, "DATA2") ;
          $liberado2=ociresult($s, "LIBERADO") ;



   ?>
   <tr>

   <td><?echo $nomeS;?> </td>
   <td><?echo $data1;?> </td>
   <td><?echo $data2;?> </td>
   <?
   if ($liberado2=="N"){
   ?>
   <td><input type="checkbox" name="listafuncgrava[]" value="<?echo $cadastroS;?>"></td>
   <?}
   ELSE
   {
   ?>
   <td>Já Liberado</td>
   <?
   }
   ?>


   </tr>
 <?
 }
 ?>

</table>
        <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
        <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">

		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">

		<input type="hidden" name="secaoliberacao" value="<?echo $secaoliberacao;?>">
		<input type="hidden" name="pedidoaltera" value="<?echo $pedidoaltera;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="acao" value="liberafuncionariofinal">


<input  type="submit" VALUE="Liberar">





<?
}
ELSE
{
 ECHO "Usuário sem Privilégio para Liberar";
 ?>

 <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
        <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">

		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">

		<input type="hidden" name="secaoliberacao" value="<?echo $secaoliberacao;?>">
		<input type="hidden" name="pedidoaltera" value="<?echo $pedidoaltera;?>">
		<input type="hidden" name="acao" value="liberafuncionariofinal">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input  type="submit" VALUE="Retornar">
 <?
}





}

if ($escolha=="1"){
{



$listafuncgrava=$_POST['listafuncgrava'];


$result2xistevei8977 = "select count(*) CONTADOR  FROM FUNCIONARIO_SADEGE a,SOLICITACAO_MOTIVO_FUNC b
where  a.cadastro=b.cd_funcionario and
 b.nr_pedido='$pedidoaltera' and
 b.id_liberado='N'";
                                  $result3ver8977 = @OCIParse($ora_conexao, $result2xistevei8977);
				                  @OCIExecute($result3ver8977, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8977,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo77=ociresult($result3ver8977, "CONTADOR") ;
                                  }

                                  for ($passa7=0;$passa7 <=$ultimo77;$passa7++)
                                  {
                                   $cadastro7=$listafuncgrava[$passa7];


                                     $result2xistevei89778 = "select count(*) CONTADOR
                                     FROM  SOLICITACAO_MOTIVO_FUNC  where cd_funcionario='$cadastro7'
                                     AND nr_pedido='$pedidoaltera' and ((dt_limite_acesso_inicial=null) or
                                     (dt_limite_acesso_final=null))
                                     ";
                                     $result3ver89778 = @OCIParse($ora_conexao, $result2xistevei89778);
				                     @OCIExecute($result3ver89778, OCI_DEFAULT);
				                     while (OCIFetchInto($result3ver89778,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                     {
                                        $ultimo7789=ociresult($result3ver89778, "CONTADOR") ;
                                     }




                                     if ($ultimo7789 =="0"){
                                     $sgrava1= OCIParse($ora_conexao, "update  SOLICITACAO_MOTIVO_FUNC SET ID_LIBERADO='S'
                                     where cd_funcionario='$cadastro7'
                                     AND nr_pedido='$pedidoaltera'
                                     ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     }

                                  }


                                 //MUDA STATUS  da solicitacao

                                 $result2xistevei89778 = "select count(*) CONTADOR
                                 FROM  SOLICITACAO_MOTIVO_FUNC  where id_liberado='N'
                                 AND nr_pedido='$pedidoaltera'
                                  ";
                                  $result3ver89778 = @OCIParse($ora_conexao, $result2xistevei89778);
				                  @OCIExecute($result3ver89778, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89778,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo7786=ociresult($result3ver89778, "CONTADOR") ;
                                  }
                                  


                                   IF ($ultimo7786 =="0" ){

                                     $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='APRO' WHERE  nr_pedido='$pedidoaltera' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                   }

echo "Liberado Funcionários para o Pedido:$pedidoaltera";

}//final da gravacao final
}





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



  if (!IsSet($empresasolicita)){
   $descricaoempresasolicitante="Defina Solicitante";
  }
  else
  {
  
          $acha177 = "SELECT DESCRICAO FROM PESSOA_BI WHERE CODIGO='$empresasolicita'";

          $res77 = mysql_db_query($banco,$acha177,$conexao);
          $valor677=mysql_fetch_array($res77);

          $descricaoempresasolicitante=$valor677["DESCRICAO"];

  }

 
 
 ?>
 








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
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">







<?
if (!IsSet($escolha) or ($escolha=="1")   ){






if (!IsSet($empresasolicita)){

$acha177 = "SELECT MIN(CODIGO) VALOR FROM pessoa_bi WHERE ID_TIPO_PESSOA='2' AND codigo in
                 (SELECT cd_pessoa from usuario_grupo_bi where cd_usuario='$usuario')";

          $res77 = mysql_db_query($banco,$acha177,$conexao);
          $valor677=mysql_fetch_array($res77);
          $empresainicial=$valor677["VALOR"];

          $acha177D = "SELECT DESCRICAO,CD_UNIDANEGOCIO_ERP FROM pessoa_bi WHERE CODIGO='$empresainicial'";
          $res77D = mysql_db_query($banco,$acha177D,$conexao);
          $valor677D=mysql_fetch_array($res77D);
          $DESCRICAOempresainicial=$valor677D["DESCRICAO"];
          $codigosecao7=$valor677D["CD_UNIDANEGOCIO_ERP"];


}
ELSE
{
    $empresainicial=$empresasolicita;

    $acha177D = "SELECT DESCRICAO,CD_UNIDANEGOCIO_ERP FROM pessoa_bi WHERE CODIGO='$empresainicial'";
          $res77D = mysql_db_query($banco,$acha177D,$conexao);
          $valor677D=mysql_fetch_array($res77D);
          $DESCRICAOempresainicial=$valor677D["DESCRICAO"];
          $codigosecao7=$valor677D["CD_UNIDANEGOCIO_ERP"];
}






?>
<center><font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Solicitacao de Entrada</font></br>
<font  style='font-size: 13px;color: black;text-align:center;bold: Negrito' >






<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="98%">

 <tr>


    			<th>Nr.Pedido</th>

                <th>Data</th>
                <th>Solicitante</th>
                <th>Empresa</th>
                <th>Motivo</th>
                <th>Descrição</th>


                <th>Liberar Para</br>Empresa</th>



                <th>Situação</th>




   </tr>

<? 


       $s = OCIParse($ora_conexao, "select  DISTINCT a.NR_PEDIDO NR_PEDIDO,g.DATA_DIGITACAO DATA1,g.DATA_EMISSAO EMISSAO,
                                  c.COD_FORNECEDOR  FORNE,d.ds_motivo MOTIVO,
                                  a.CD_EMPRESA  EMPRESA1,h.nome QUEMSOLICITOU,c.cd_empresa SOLICITOUEMPRESA,
                                  b.EMPRESA DESCRICAO,g.id_status STATUS,c.ds_solicitante OBSERVA
                                  FROM serv_terc_itens a,FORNECEDOR_SADEGE b,solicitacao_motivo c,motivo_solicitacao d,
                                  serv_terc_pedido g,funcionario_sadege h
                                  where a.COD_FORNECEDOR=b.COD_FORNECEDOR  and
                                  a.nr_pedido=c.nr_pedido and
                                  a.cod_fornecedor=c.cod_fornecedor and
                                  a.cd_empresa=c.cd_empresa and
                                  a.cd_servico=c.cd_servico and
                                  c.CD_FUNC_SOLICITANTE=h.cadastro  and
                                  a.nr_pedido=g.nr_pedido and
                                  g.id_status not in('APRO','FUNC') AND
                                  c.cd_motivo=d.cd_motivo
                                  ");


      OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $pedido=ociresult($s, "NR_PEDIDO") ;
      $data1=ociresult($s, "DATA1") ;
      $data1emis=ociresult($s, "EMISSAO") ;

      $descricaofornecedor=ociresult($s, "DESCRICAO") ;
      $codigofornecedor=ociresult($s, "FORNE") ;

      $solicitante=ociresult($s, "EMPRESA1") ;
      $status=ociresult($s, "STATUS") ;
      $nomesolicitante=ociresult($s, "QUEMSOLICITOU") ;
      $motivod=ociresult($s, "MOTIVO") ;
      
      $empresasolicitante=ociresult($s, "SOLICITOUEMPRESA") ;
      $observacaosolicitante=ociresult($s, "OBSERVA") ;


      IF ($codigofornecedor=="99999"){$liberdopara="Matriz";}else{$liberdopara=$descricaofornecedor;}


          ?>
			<tr>
					<td ><?echo $pedido;?></td>

					<td ><?echo $data1emis;?></td>
                    <td ><?echo $nomesolicitante;?></td>
                    <td ><?echo $empresasolicitante;?></td>
                    <td ><?echo $motivod;?></td>
                    <td ><?echo $observacaosolicitante;?></td>
                    
                    <td ><?echo $liberdopara;?></td>






                    <?

                         if ($status=="ABER"){$statusmostra="Aguardando</br>Definir Funcionários";$cor="red";}

                         if ($status=="FUNC"){$statusmostra="Aguardando</br>Liberar Funcionários";$cor="yellow";}
                         if ($status=="FUNP"){$statusmostra="Existem Funcionários </br>Sem Data de liberação";$cor="yellow";}
                         if ($status=="APRO"){$statusmostra="Liberado</br> Funcionários";$cor="green";}

               if (($status=="ABER")){
                  ?>
              <td BGCOLOR=<?echo $cor;?>><a href="liberarservicomaximizaversa2.php?pagina=1&escolha=1&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>&localbanco=<?echo $localbanco;?>
&pedido=<?echo $pedido;?>&destinoentrada=<?echo $liberdopara;?>"><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></a></td>

             <?

               }


              if (($status=="FUNC")){?>
              <td BGCOLOR=<?echo $cor;?>><a href="solicitacaoservicoliberacao.php?pagina=1&escolha=liberarfuncionario&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&usuario=<?echo $usuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>&secaosolicitante=<?echo $secaosolicitante;?>"><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></a></td>

             <?
             }//FINAL  SO DA ABERTAS

               if (($status=="FUNP")){
               ?>
              <td BGCOLOR=<?echo $cor;?>><a href="liberarservicomaximiza2.php?pagina=1&escolha=1&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>&secaosolicitante=<?echo $secaosolicitante;?>"><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></a></td>
               <?
               }





                       




          }//FINAL DE TOADAS ORDENS


 
 ?>


 </tr>
 </table>



<?
}//final da tela de abertura


?>

</td>

</tr>
</table>


</form>
</html>


