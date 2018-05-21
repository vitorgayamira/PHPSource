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
function Botao2()
{
document.nome_formulario.action="consultaliberacaoacesso2.php";
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
<body TOPMARGIN="0">




<form action="consultaliberacaoacesso2.php" method="POST" name="nome_formulario">

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
$cpfpesquisa=$_POST['cpfpesquisa'];

}



//CHAMA O MENU PELA CONEXAO

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
          D.CD_USUARIO in (select cd_usuario from usuario_bi where nm_usuario='$edusuario')
          AND D.CD_EMPRESA=E.CODIGO
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
          


   $ano77=date('Y');
   $mes77=date('m');
   $dia77=date('d');



  $diahoje=$dia77."/".$mes77."/".$ano77;

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

$acha177 = "SELECT MIN(CODIGO) VALOR FROM pessoa_bi WHERE ID_TIPO_PESSOA='2' AND codigo in
                 (SELECT cd_pessoa from usuario_grupo_bi where cd_usuario
                 in (select cd_usuario from usuario_bi where nm_usuario='$edusuario')
                 )";

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
 





 <font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Pessoal Autorizado </font></br>


        Empresa Solicitante: <select name="empresasolicita" style="background-color:#8B8378;color: white;" >
                 <option value="<?ECHO $DESCRICAOempresainicial;?>"><?ECHO $DESCRICAOempresainicial;?></option>
              	 <?
                 $stmt1 = "SELECT CODIGO,DESCRICAO FROM pessoa_bi WHERE ID_TIPO_PESSOA='2' AND codigo in
                 (SELECT cd_pessoa from usuario_grupo_bi where cd_usuario IN (
                 select cd_usuario from usuario_bi where nm_usuario='$edusuario'
                  ))";
				  $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor9=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor9["DESCRICAO"]}\">{$valor9["DESCRICAO"]}</option>";

					}
				 ?>
				 </select>

				 

        Cpf:<input type="txt" name="cpfpesquisa" style="background-color:#8B8378;color: white;" >

	
        <input  type="submit" VALUE="Buscar">

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
?>
<table  width="55%" ID="grid" >
          <tr class="difa">



                <td>Nome</th>
                <td>Cpf</th>
                <td>Nr</br>Identidade</td>
                <td>Empresa</td>

                <td>Motivo</td>
                <td>Data</br>Autorizada</td>
                <td>Hora</br>Inicio</td>
                <td>Hora</br>Final</td>
                <td>Pedido</th>






   </tr>

<? 

       IF ($cpfpesquisa==NULL){
       
        $s = OCIParse($ora_conexao, "select  d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,TO_CHAR(c.dt_limite_acesso_inicial, 'dd/mm/yyyy')
                                    INICIO,c.nr_pedido PEDIDO,
                                    TO_CHAR(c.dt_limite_acesso_final, 'dd/mm/yyyy') FINAL,
                                    c.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    c.HR_INICIO HORA1,c.HR_FINAL HORA2
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) AND
                                    c.cd_empresa like '%$empresasolicita%'
                                    order by h.nome asc
                                    ");
                                    

                                    


       
       }
       ELSE
       {

       $s = OCIParse($ora_conexao, "select  d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,
                                    TO_CHAR(c.dt_limite_acesso_inicial, 'dd/mm/yyyy')
                                    INICIO,c.nr_pedido PEDIDO,
                                    TO_CHAR(c.dt_limite_acesso_final, 'dd/mm/yyyy')
                                    FINAL,c.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    c.HR_INICIO HORA1,c.HR_FINAL HORA2
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cpf like '%$cpfpesquisa%' and
                                    h.cd_fornecedor=i.cod_fornecedor(+)
                                    AND
                                    c.cd_empresa='$empresasolicita'
                                    and
                                    h.cpf is not null
                                    order by h.nome asc
                                    ");



                                    
        }

        if ($nomeempresa88=="MAKER EMPRESA"){echo "select  d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,
                                    TO_CHAR(c.dt_limite_acesso_inicial, 'dd/mm/yyyy')
                                    INICIO,c.nr_pedido PEDIDO,
                                    TO_CHAR(c.dt_limite_acesso_final, 'dd/mm/yyyy')
                                    FINAL,c.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    c.HR_INICIO HORA1,c.HR_FINAL HORA2
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cpf='$cpfpesquisa' and
                                    h.cd_fornecedor=i.cod_fornecedor(+)
                                    AND
                                    c.cd_empresa like '%$empresasolicita%' and
                                    h.cpf is not null
                                    order by h.nome asc";}


      OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $nome=ociresult($s, "NOME") ;
      $cadastro=ociresult($s, "CADASTRO") ;
      $motivo=ociresult($s, "SERVICO") ;
      $cpf=ociresult($s, "CPF") ;
      $rg=ociresult($s, "RG") ;
      $rgin=ociresult($s, "INICIO") ;
      $rgfi=ociresult($s, "FINAL") ;
      $solicita8=ociresult($s, "SOLICITA") ;
      $fornecedor8=ociresult($s, "FORNECEDOR") ;
      $hora1=ociresult($s, "HORA1") ;
      $hora2=ociresult($s, "HORA2") ;
      $pedido=ociresult($s, "PEDIDO") ;

      $mostra=$rgin." Até ".$rgfi;

      $acha177achaacesso1= "SELECT count(*) VALOR FROM pessoa_bi WHERE ID_TIPO_PESSOA='2' AND descricao='$solicita8' and
      codigo in  (SELECT cd_pessoa from usuario_grupo_bi where cd_usuario
      in (select cd_usuario from usuario_bi where nm_usuario='$edusuario')
      )";

          $acha177achaacesso12= mysql_db_query($banco,$acha177achaacesso1,$conexao);
          $acha177achaacesso13=mysql_fetch_array($acha177achaacesso12);
          $quantosexistem=$acha177achaacesso13["VALOR"];
          if ($quantosexistem >"0"){
          ?>
            <tr class="difa">

					<td ><?echo $nome;?></td>
    				<td ><?echo $cpf;?></td>
					<td ><?echo $rg;?></td>
                    <td ><?echo $fornecedor8;?></td>

					<td ><?echo $motivo;?></td>
					<td ><?echo $mostra;?></td>
					<td ><?echo $hora1;?></td>
					<td ><?echo $hora2;?></td>
					<td ><?echo $pedido;?></td>
            </tr>

          <?
          }

          }//FINAL DE TOADAS ORDENS


 

}//final da tela de abertura


?>
</table>


</form>
</body>
</html>


