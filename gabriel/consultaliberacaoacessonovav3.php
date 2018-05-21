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
function Botao2()
{
document.nome_formulario.action="consultaliberacaoacesso.php";
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


<script type="text/javascript">
function valida_numero() {
   var num = document.getElementById('numero').value;
   var num2 = document.getElementById('numero2').value;

   if ( isNaN( num ) ) { // isNaN = is not a number
      alert('Cpf Não é um número!');
      return false; // bloqueia submissão/envio ao php
   }

   if ( isNaN( num2 ) ) { // isNaN = is not a number
      alert('RG Não é um número!');
      return false; // bloqueia submissão/envio ao php
   }

   return true; // prossegue o envio
}
</script>

</head>


<form action="consultaliberacaoacessonovav3.php" method="POST" name="nome_formulario" onsubmit="return valida_numero();">

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
$rgpesquisa=$_POST['rgpesquisa'];
$empresaautorizada=$_POST['empresaautorizada'];






}

//CHAMA Oádrao conexao para toadas as telas
require("carregamenumaximiza.php");
require("estilo.css");

require("estilo2.css");

require("configuramysqlversa2.php");

require("configuraoraclenovo.php");

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

$username_https=$_SESSION["username_https"];
$password_https=$_SESSION["password_https"];
$hostname_https=$_SESSION["hostname_https"];





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





 
 ?>
 





 <font style='font-size: 24px;color: red;text-align:left;bold: Negrito' >Portaria:Autorizados</font></br>




				 


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


		

		

		
		




          <table>
          <tr>
           <td>
           Cpf:<input type="txt" name="cpfpesquisa" id="numero" >
           
           RG:<input type="txt" name="rgpesquisa" id="numero2"  >
           
           Empresa Autorizada: <select name="empresaautorizada" >

                 <option value="%">Todas</option>

                 <?
                 $result2 = "SELECT COD_FORNECEDOR,EMPRESA FROM FORNECEDOR_SADEGE
                 WHERE COD_FORNECEDOR IN (SELECT  cd_fornecedor FROM funcionario_sadege)
                 order by EMPRESA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["EMPRESA"]}</option>";
                 }
                 ?>
                     
				 </select>
				 


           

          
          <input  type="submit" VALUE="Buscar">
          </td>
          <td>
           
           <a href="portariapdf.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>buscarparametro=excluir">
           <IMG src="gerarpdf.png" width="120" height="30" ></a>
          </td>
          </tr>
          <table>





 <font  style='font-size: 13px;color: black;text-align:center;bold: Negrito' >



<?


if (!IsSet($escolha) or ($escolha=="1")   ){
?>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext ' width="80%">
 
          <tr>

    			<th>Nome</td>
    			<th>Cpf</th>
                <th>RG</th>
                <th>Empresa</th>
                <th>Motivo</th>
                <th>Obs</th>
                <th>Solicitante</th>
                <th>Empresa</th>
                <th>Data</th>
                <th>Hora</br>Inicio</th>
                <th>Hora</br>Final</th>
                <th>Pedido</th>

		  </tr>

<? 


IF (($cpfpesquisa >"0") or ($rgpesquisa >"0")){
           IF ($cpfpesquisa >"0" and $rgpesquisa==null){
           $caso="pesquisacpf";
           }
           IF ($cpfpesquisa >"0" and $rgpesquisa>"0"){
           $caso="pesquisaambos";
           }
           IF ($cpfpesquisa ==null and $rgpesquisa >"0"){
           $caso="pesquisarg";
           }


      }
      else
      {
      $caso="sempesquisa";


      }


echo "Empresa:".$empresaautorizada;
echo "Caso:".$caso;
       if ($caso=="sempesquisa"){
       
       
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
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro and
									nvl(i.cod_fornecedor,'%') like '%$empresaautorizada%'
                                    order by h.nome asc
                                    ");


       
       }
       if ($caso=="pesquisacpf")
       {

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
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cpf like '%$cpfpesquisa%' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) AND
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro and
                                    i.cod_fornecedor like '%$empresaautorizada%'
                                    order by h.nome asc
                                    ");

                                    

                                    
        }
        
        if ($caso=="pesquisarg"){
        
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
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.rg like '%$rgpesquisa%' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) AND
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro
                                    and i.cod_fornecedor like '%$empresaautorizada%'
                                    order by h.nome asc
                                    ");



        }
        
        if ($caso=="pesquisaambos"){
        
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
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.rg like '%$rgpesquisa%' and
                                    h.cpf like '%$cpfpesquisa%' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) AND
                                    c.nr_pedido=j.nr_pedido AND
                                    j.cd_func_solicitante=l.cadastro and
                                    i.cod_fornecedor like '%$empresaautorizada%'
                                    order by h.nome asc
                                    ");


        }



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
          <tr>

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

          
          }//FINAL DE TODAS ORDENS


 
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


