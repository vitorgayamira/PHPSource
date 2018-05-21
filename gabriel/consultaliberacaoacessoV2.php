<?session_start();?>
<!DOCTYPE HTML>
<!--tipo da linguagem do documento-->
<html lang="pt-br">
<head>

<style  type="text/css">
#primeiro{
position:absolute;

top:170;
left:20;
background-color:#CDC5BF;
width: 30%;
height: 60%;

}

body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
         background-color: white;

}




</style>


</head>


<form action="consultaliberacaoacessoV2.php" name="nome_formulario" id="nome_formulario" method="POST" >

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
$bday1=$_GET['bday1'];
$bday2=$_GET['bday2'];


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

$bday1=$_POST['bday1'];
$bday2=$_POST['bday2'];






}

 //CHAMA Oádrao conexao para toadas as telas

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];
$labelbanco=$_SESSION["labelbanco"];


                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];



require("carregamenumaximiza.php");
require("estilo.css");
require("configuramysqlversa2.php");

require("configuraoraclenovo.php");










$acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER,
          A.cd_unidanegocio_erp CODIGO55
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
          $codigo3=$valor6["CODIGO55"];


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



  //require("configuraoracle.php");
if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($dia)){
$dia=date('d');
}

if (!IsSet($grupoordens)){
$grupoordens="T";
$grupomostra="Todas";
}

if ($grupoordens=="P"){

$grupomostra="Planejadas";
}
if ($grupoordens=="C"){

$grupomostra="Não Planejadas";
}



if (!IsSet($fabricapesquisa)){
$fabricamostra="Todas";
}
else
{
$fabricamostra=$fabricapesquisa;

}







if (!IsSet($bday2)){
$datafinalmostra=$ano."-".$mes."-".$dia;

}
else
{

 $datafinalmostra=$bday2;
}



if (!IsSet($bday1)){
$datainicial = strtotime("-30 days");
$dia1inicial=date('d', $datainicial);
$mesinicial=date('m', $datainicial);
$anoinicial=date('Y', $datainicial);
$datainicialmostra=$anoinicial."-".$mesinicial."-".$dia1inicial;
}
else
{
  $datainicialmostra=$bday1;
}


 
 ?>
 





 <font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Histórico de Acesso</font></br>




				 


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


		

		

		
		


<table width="70%">
<tr class="dif">

<td>


Data Inicial:<input type="date" name="bday1" value="<?echo $datainicialmostra;?>" onchange="this.form.submit();" id="q" required> ate
<input type="date" name="bday2" value="<?echo $datafinalmostra;?>" onchange="this.form.submit();" id="q" required>


</td>
<td>



</td>
</tr>
</table>





 <font  style='font-size: 13px;color: black;text-align:center;bold: Negrito' >



<?


if (!IsSet($escolha) or ($escolha=="1")   ){
?>
<table  width="55%" ID="grid" >
          <tr class="difa">


    			<td>Nome</td>
    			<td>Cpf</td>
                <td>RG</td>
                <td>Empresa</td>
                <td>Motivo</td>
                <td>Obs</td>
                <td>Solicitante</td>
                
                <td>Empresa</td>
                <td>Data</td>
                <td>Hora</br>Inicio</td>
                <td>Hora</br>Final</td>
                <td>Pedido</td>






   </tr>

<? 

$datapesquisa1ano=substr($datainicialmostra,0,4);
                        $datapesquisa1mes=substr($datainicialmostra,5,2);
                        $datapesquisa1dia=substr($datainicialmostra,8,2);
                        $datapesquisa1=$datapesquisa1dia."/".$datapesquisa1mes."/".$datapesquisa1ano;


                        $datapesquisa2ano=substr($datafinalmostra,0,4);
                        $datapesquisa2mes=substr($datafinalmostra,5,2);
                        $datapesquisa2dia=substr($datafinalmostra,8,2);
                        $datapesquisa2=$datapesquisa2dia."/".$datapesquisa2mes."/".$datapesquisa2ano;

       
        $s = OCIParse($ora_conexao, "select  c.nr_pedido PEDIDO,d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,c.dt_limite_acesso_inicial INICIO,
                                    c.dt_limite_acesso_final FINAL,j.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    i.cod_fornecedor CODIGO55,c.HR_INICIO HORA1,c.HR_FINAL HORA2,
                                    l.nome NOMESOLICITANTE,j.ds_solicitante OBS
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i,
                                    solicitacao_motivo j,
                                    funcionario_sadege l
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_inicial >='$datapesquisa1' and
                                    c.dt_limite_acesso_inicial <='$datapesquisa2' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro
                                    order by h.nome asc
                                    ");

                            /*
                            echo "select  c.nr_pedido PEDIDO,d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,c.dt_limite_acesso_inicial INICIO,
                                    c.dt_limite_acesso_final FINAL,j.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    i.cod_fornecedor CODIGO55,c.HR_INICIO HORA1,c.HR_FINAL HORA2,
                                    l.nome NOMESOLICITANTE
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i,
                                    solicitacao_motivo j,
                                    funcionario_sadege l
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_inicial >='$datapesquisa1' and
                                    c.dt_limite_acesso_final <='$datapesquisa2' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro
                                    order by h.nome asc";
                                   */



      OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $nome=ociresult($s, "NOME") ;
      $cadastro=ociresult($s, "CADASTRO") ;
      $motivo=ociresult($s, "SERVICO") ;
      $cpf=ociresult($s, "CPF") ;
      $rg=ociresult($s, "RG") ;
      $rgin=ociresult($s, "INICIO") ;
      $rgfi=ociresult($s, "FINAL") ;
      $rgfi=ociresult($s, "FINAL") ;
      $empresasolicita=ociresult($s, "SOLICITA") ;
      $fornecedor8=ociresult($s, "FORNECEDOR") ;
      $fornecedor55=ociresult($s, "CODIGO55") ;
      $hora1=ociresult($s, "HORA1") ;
      $hora2=ociresult($s, "HORA2") ;
      $pedido2=ociresult($s, "PEDIDO") ;
      
      $nomesolicitante=ociresult($s, "NOMESOLICITANTE") ;
      
      $obsmostra1=ociresult($s, "OBS") ;

      $obsmostra=substr($obsmostra1,0,10);
      


      $mostra=$rgin." Até ".$rgfi;





          ?>
          <tr class="difa">

					<td ><?echo $nome;?></td>
                    <td ><?echo $cpf;?></td>
                    <td ><?echo $rg;?></td>
                    <td ><?echo $fornecedor8;?></td>

                    <td ><?echo $motivo;?></td>
                    <td ><?echo $obsmostra;?></td>

                    <td ><?echo $nomesolicitante;?></td>

                    <td ><?echo $empresasolicita;?></td>

					<td ><?echo $mostra;?></td>
					<td ><?echo $hora1;?></td>
					<td ><?echo $hora2;?></td>
					<td ><?echo $pedido2;?></td>

             </tr>
          <?


          $contadoracesso="0";
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


 <?
if ($escolha=="3" ){


?>



<div  style="display: block;" id="mostraterceiros">

          <table width="99%" >

          <tr>
          <td><titulo>Busca Avançada</titulo></td>

          <td align=right>
           <a href="consultaliberacaoacessoV2.php?navegando=sim&escolha=1&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&banco=<?echo $banco;?>&bday1=<?echo $datainicialmostra;?>&bday2=<?echo $datafinalmostra;?>">
           <img src="sairtela.png" width="22" height="22"></a>

          </td>


          </tr>


          </table>



          </br></br>

          <table width="100%">

          <tr>
          <td>Em construcao....</td>
          <td><select name="fabricapesquisa" style="background-color:#8B8378;color: white;" onchange="this.form.submit();">
                 <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>

          </td>
          </tr>







          </table>


          <input type="hidden" name="status" value="nao">
          <input type="hidden" name="escolha" value="3">
		  <input type="hidden" name="continuarmesmatela" value="sim">
     	  <input type="hidden" name="banco" value="<?echo $banco;?>">
     	  <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">


</div>

<?

}

?>




</form>
</html>


