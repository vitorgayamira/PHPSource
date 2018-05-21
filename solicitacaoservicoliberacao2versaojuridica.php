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
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
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
document.nome_formulario.action="solicitacaoservicoliberacao.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novasolicitacaoservicoliberacao.php";
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


<form action="solicitacaoservicoliberacao2versaojuridica.php" method="POST" name="nome_formulario">

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
$solicitantefornecedor=$_GET['solicitantefornecedor'];
$liberdopara=$_GET['liberdopara'];
$solicita77=$_GET['solicita77'];


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
$quemsolicitaemail=$_POST['quemsolicitaemail'];







}

//CHAMA Oádrao conexao para toadas as telas
require("carregamenumaximiza.php");
require("estilo2_sitenovo.css");
require("configuramysqlversa2.php");

require("configuraoraclenovo.php");

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

$username_https=$_SESSION["username_https"];
$password_https=$_SESSION["password_https"];
$hostname_https=$_SESSION["hostname_https"];







$acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER
          FROM PESSOA_BI A,PESSOA_BI B,USUARIO_GRUPO_BI C,USUARIO_BI D,PESSOA_BI E
          WHERE C.CD_PESSOA=A.CODIGO AND
          C.CD_USUARIO=D.CD_USUARIO AND
          D.CD_PESSOA=B.CODIGO AND
          D.nm_USUARIO='$edusuario' AND
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

//echo "</br></br>Usuário:$nome2</br>";

$sprovi= OCIParse($ora_conexao, " select NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNC_SOLICITANTE  from  SOLICITACAO_MOTIVO where
 NR_PEDIDO='$pedidoaltera'");


              OCIExecute($sprovi, OCI_DEFAULT);
              While (OCIFetch($sprovi)){



              $fornecedor66=ociresult($sprovi, "COD_FORNECEDOR") ;
              $empresa66=ociresult($sprovi, "CD_EMPRESA") ;
              $solicitante66=ociresult($sprovi, "CD_FUNC_SOLICITANTE") ;

             // echo "</br>Fornecedor:$fornecedor66//empresa:$empresa66//solicitante:$solicitante66//libera para:$liberdopara</br></br>";

             }



if ($escolha=="liberarfuncionario"){

ECHO "Para quem Libera:$liberdopara</br></br>";



         $acha166s= "SELECT id_libera_funcionario_acesso VALOR  from usuario_grupo_bi where cd_USUARIO in (
         select cd_usuario from usuario_bi where nm_usuario='$edusuario')
         and cd_empresa in (select codigo from pessoa_bi where descricao='$empresa66')
         ";




          $res66s = mysql_db_query($banco,$acha166s,$conexao);
          $valor666s=mysql_fetch_array($res66s);
          $VALORpessoa5=$valor666s["VALOR"];
          
IF ($VALORpessoa5=="S"){

?>


</br></br>

<?echo "Pedido Analisado:$pedidoaltera";?>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

<tr>
  <th>Funcionário</th>
  <th>Data1</th>
  <th>Data2</th>
  <td>Hora</br>Inicio</td>
  <td>Hora</br>Final</td>
  <th>Seleção</th>


</tr>
<?

$s= OCIParse($ora_conexao, " select a.nome NOME,a.cadastro CADASTRO,b.DT_LIMITE_ACESSO_INICIAL DATA1,
b.DT_LIMITE_ACESSO_FINAL DATA2,
b.ID_LIBERADO LIBERADO,b.HR_INICIO HORA1,b.HR_FINAL HORA2
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
          $hora1=ociresult($s, "HORA1") ;
          $hora2=ociresult($s, "HORA2") ;



   ?>
   <tr>

   <td><?echo $nomeS;?> </td>
   <td><?echo $data1;?> </td>
   <td><?echo $data2;?> </td>
   <td ><?echo $hora1;?></td>
   <td ><?echo $hora2;?></td>
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
		
		<input type="hidden" name="quemsolicitaemail" value="<?echo $solicitante66;?>">
		



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

   //grava os email de envio
   
                                  $result2xistevei8977N = "select NOME  FROM FUNCIONARIO_SADEGE
                                  where  cadastro='$quemsolicitaemail'";
                                  $result3ver8977N = @OCIParse($ora_conexao, $result2xistevei8977N);
				                  @OCIExecute($result3ver8977N, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver8977N,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $nomeemail=ociresult($result3ver8977N, "NOME") ;
                                  }
   

   
   



                   $sqlachaemailmanda="select ds_email EMAIL FROM pessoa_bi where
                   descricao='$nomeemail' ";


                   $sqlachaemailmanda2= mysql_db_query($banco,$sqlachaemailmanda,$conexao);
                   $sqlachaemailmanda3=mysql_fetch_array($sqlachaemailmanda2);

                   $destinoe=$sqlachaemailmanda3["EMAIL"];

                   echo "Nome:$nomeemail//email:$destinoe";

                   $emailorigem="'sadege@maximiza.com.br";

                   require_once('class.phpmailer.php');
                   $mail = new PHPMailer();
                   $mail->Mailer     = "smtp";
                   $mail->IsHTML(true);
                   //$mail->SMTPSecure = "tls";
                   $mail->Host       = "smtp.maximiza.com.br";
                   $mail->Port       = "587";
                   $mail->Username   = "sadege@maximiza.com.br";
                   $mail->Password   = "maximiza";
                   $mail->SMTPAuth   = "TRUE";
                   $mail->FromName   = $emailorigem;
                   $mail->AddAddress($destinoe); //email destino
                   $mail->Subject    = "Autorização de Solicitação";
                   $mail->Body       = "Autorizado pedido Nr. ".$pedidoaltera;
                   if (!$mail->Send())
                   {       echo "Erro de envio: " . $mail->ErrorInfo;}
                   else{}



                                  //final do email






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

		<input type="hidden" name="variacao3" value="<?echo $variacao3;?>">
		<input type="hidden" name="descricaocurva" value="<?echo $descricaocurva;?>">
		<input type="hidden" name="valorpeso" value="<?echo $valorpeso;?>">
		<input type="hidden" name="numerolote" value="<?echo $numerolote;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">







<?
if (!IsSet($escolha) or ($escolha=="1")   ){






if (!IsSet($empresasolicita)){


$empresasolicita="999";

}


if ($empresasolicita=="999"){


$empresasolicitamostra="Todas";

}
else
{

$acha177 = "SELECT DESCRICAO FROM PESSOA_BI WHERE CD_UNIDANEGOCIO_ERP='$empresasolicita'";

          $res77 = mysql_db_query($banco,$acha177,$conexao);
          $valor677=mysql_fetch_array($res77);

          $empresasolicitamostra=$valor677["DESCRICAO"];

}







?>
<font style='font-size: 15px;color: red;text-align:left;bold: Negrito' >Autorização de Acesso</font></br>
<font  style='font-size: 13px;color: black;text-align:center;bold: Negrito' >


Empresa Solicitante: <select name="empresasolicita" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                 <option value="<?echo $empresasolicita;?>"><?echo  $empresasolicitamostra;?></option>
                 
                 <option value="999">Todas</option>

              	 <?
                 $stmt1 = "SELECT CD_UNIDANEGOCIO_ERP,DESCRICAO FROM pessoa_bi WHERE ID_TIPO_PESSOA='2' AND codigo in
                 (SELECT cd_pessoa from usuario_grupo_bi where nm_usuario='$edusuario')";
				  $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor9=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor9["DESCRICAO"]}\">{$valor9["DESCRICAO"]}</option>";

					}
				 ?>
				 </select>
				 



    


<hr>



<table  width="55%" ID="grid" >
          <tr class="difa">


    			<td>Nr.Pedido</td>

                <td>Data</td>
                <td>Solicitante</td>

                <td>Motivo</td>
                <td>Descrição</td>


                <td>Liberar Para</br>Empresa</td>



                <td>Situação</td>




   </tr>

<? 



                                 if ($empresasolicita=="999"){
                                   $s6 = OCIParse($ora_conexao, "select  DISTINCT
                                  c.nr_pedido NR_PEDIDO, h.nome QUEMSOLICITOU,d.ds_motivo MOTIVO,b.EMPRESA DESCRICAO,
                                  c.COD_FORNECEDOR  FORNE, g.id_status STATUS,
                                  c.ds_solicitante OBSERVA,
                                  c.CD_EMPRESA EMPRESA1,
                                  g.DATA_DIGITACAO DATA1,
                                  g.DATA_EMISSAO EMISSAO
                                  FROM solicitacao_motivo c, serv_terc_itens a,
                                  serv_terc_pedido g,funcionario_sadege h,motivo_solicitacao d,FORNECEDOR_SADEGE b
                                  WHERE c.nr_pedido=g.nr_pedido  AND
                                  c.CD_FUNC_SOLICITANTE=h.cadastro AND
                                  c.cd_motivo=d.cd_motivo AND
                                  c.cd_servico=a.cd_servico and
                                  g.nr_pedido=a.nr_pedido and
                                  a.COD_FORNECEDOR=b.COD_FORNECEDOR and
                                  g.id_status  in('FUNC')
                                  ORDER BY  c.NR_PEDIDO DESC
                                  ");
                                 
                                 }
                                 else
                                 {


                                  $s6 = OCIParse($ora_conexao, "select  DISTINCT
                                  c.nr_pedido NR_PEDIDO, h.nome QUEMSOLICITOU,d.ds_motivo MOTIVO,b.EMPRESA DESCRICAO,
                                  c.COD_FORNECEDOR  FORNE, g.id_status STATUS,
                                  c.ds_solicitante OBSERVA,
                                  c.CD_EMPRESA EMPRESA1,
                                  g.DATA_DIGITACAO DATA1,
                                  g.DATA_EMISSAO EMISSAO,e.HR_INICIO HORA1,e.HR_FINAL HORA2
                                  FROM solicitacao_motivo c, serv_terc_itens a,
                                  serv_terc_pedido g,funcionario_sadege h,motivo_solicitacao d,FORNECEDOR_SADEGE b
                                  WHERE c.nr_pedido=g.nr_pedido AND
                                  c.CD_EMPRESA='$empresasolicita' AND
                                  c.CD_FUNC_SOLICITANTE=h.cadastro AND
                                  c.cd_motivo=d.cd_motivo AND
                                  c.cd_servico=a.cd_servico and
                                  g.nr_pedido=a.nr_pedido and
                                  a.COD_FORNECEDOR=b.COD_FORNECEDOR and
                                  g.id_status  in('FUNC')
                                  ORDER BY  c.NR_PEDIDO DESC
                                  ");
                                 }
                                  

                                  

      OCIExecute($s6, OCI_DEFAULT);
    While (OCIFetch($s6)) {
      $pedido=ociresult($s6, "NR_PEDIDO") ;
      $data1=ociresult($s6, "DATA1") ;
      $data1emis=ociresult($s6, "EMISSAO") ;

      $descricaofornecedor=ociresult($s6, "DESCRICAO") ;
      $codigofornecedor=ociresult($s6, "FORNE") ;

      $solicitante=ociresult($s6, "EMPRESA1") ;
      $status=ociresult($s6, "STATUS") ;
      $nomesolicitante=ociresult($s6, "QUEMSOLICITOU") ;
      $motivod=ociresult($s6, "MOTIVO") ;
      
      $solicitantefornecedor=ociresult($s6, "FORNE") ;
      $observacaosolicitante=ociresult($s6, "OBSERVA") ;


      //echo "</br>empresa  DESTINO:$solicitantefornecedor//EMPRESA solicitante:$solicitante";

      IF ($codigofornecedor=="99999"){$liberdopara="Matriz";}else{$liberdopara=$descricaofornecedor;}


          ?>
			<tr>
					<td ><?echo $pedido;?></td>

					<td ><?echo $data1emis;?></td>


                    <td ><?echo $nomesolicitante;?></td>

                    <td ><?echo $motivod;?></td>
                    <td ><?echo $observacaosolicitante;?></td>
                    
                    <td ><?echo $liberdopara;?></td>






                    <?



                         if ($status=="FUNC"){$statusmostra="Aguardando</br>Autorização";$cor="yellow";}





              if (($status=="FUNC")){?>
              <td BGCOLOR=<?echo $cor;?>><a href="solicitacaoservicoliberacao2versaojuridica.php?pagina=1&escolha=liberarfuncionario&tela=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>
&usuario=<?echo $edusuario;?>&padraoexecucao=<?echo $padraoexecucaomostra;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>
&sequenciarecebe=<?echo $sequenciamostra;?>&statusacao=todas&solicitantepesquisa=<?echo $solicitantepesquisa;?>
&pedidoaltera=<?echo $pedido;?>&solicita77=<?echo $empresasolicita;?>&solicitantefornecedor=<?echo $solicitantefornecedor;?>&liberdopara=<?echo $liberdopara;?>&localbanco=<?echo $localbanco;?>"><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >
<?echo $statusmostra;?></a></td>



             <?
             }//FINAL  SO DA ABERTAS






                       




          }//FINAL DE TOADAS ORDENS


 
 ?>


 </tr>
 </table>



<?
}//final da tela de abertura


?>




</form>
</html>


