<?session_start();?>
<html>



<head>

<script language="javascript">


function Mascara_Hora2(Hora2){
var hora01 = '';
hora01 = hora01 + Hora2;
if (hora01.length == 2){
hora01 = hora01 + ':';
document.forms[0].Hora2.value = hora01;
}
if (hora01.length == 5){
Verifica_Hora2();
}
}

function Mascara_Hora(Hora){
var hora01 = '';
hora01 = hora01 + Hora;
if (hora01.length == 2){
hora01 = hora01 + ':';
document.forms[0].Hora.value = hora01;
}
if (hora01.length == 5){
Verifica_Hora();
}
}

function Verifica_Hora(){
hrs = (document.forms[0].Hora.value.substring(0,2));
min = (document.forms[0].Hora.value.substring(3,5));

estado = "";
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
estado = "errada";
}

if (document.forms[0].Hora.value == "") {
estado = "errada";
}

if (estado == "errada") {
alert("Hora inválida!");
document.forms[0].Hora.focus();
}
}


function Verifica_Hora2(){
hrs = (document.forms[0].Hora.value.substring(0,2));
min = (document.forms[0].Hora.value.substring(3,5));

estado = "";
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
estado = "errada";
}

if (document.forms[0].Hora2.value == "") {
estado = "errada";
}

if (estado == "errada") {
alert("Hora inválida!");
document.forms[0].Hora.focus();
}
}


function Certeza1()
{

   document.teste.submit();
}




function Certeza()
{


    if (document.forms[0].projeto.value == "0")
    {

	   alert("Deve Escolher um Projeto");
	   return ;


	}
	else
	{


		  	  document.teste.submit();



     }




}



</script>

<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }




 body{
         width:100%;
	     height:100%;


}



</style>

<script LANGUAGE="JavaScript">
function Botao1()
{
document.nome_formulario.action="novasolicitacaoservicoliberacao_versa2juridica.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="solicitacaoservicoliberacao_versa2juridica.php";
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
$(document).ready(function(){
	$("#cpf").mask("999.999.999-99");
});
</script>

</head>





<form action="solicitacaoservicoliberacaoversao5.php"  name="teste"  method="POST" >


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

$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$fornecedor1=$_GET['fornecedor1'];


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
$data1=$_POST['data1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
    $turno1=$_POST['turno1'];
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

			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$criterio=$_POST['criterio'];

			$entrada=$_POST['entrada'];
			$motivo=$_POST['motivo'];
			$hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $setor=$_POST['setor'];
            $horainteirainicio=$_POST['horainteirainicio'];
            $horainteirafinal=$_POST['horainteirafinal'];
            $usuariosolicitante=$_POST['usuariosolicitante'];
            $sequenciamotivo=$_POST['sequenciamotivo'];
            $criterioparada=$_POST['criterioparada'];
            $unidadenegocio=$_POST['unidadenegocio'];
            
            $pedido1=$_POST['pedido1'];
            $pedido=$_POST['pedido'];
            $fornecedor1=$_POST['fornecedor1'];
            $mes1=$_POST['mes1'];
            $dia1=$_POST['dia1'];
            $ordem1=$_POST['ordem1'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $solicitantenovo=$_POST['solicitantenovo'];
            $recomendacao=$_POST['recomendacao'];
            $codigodestinofornecedor=$_POST['codigodestinofornecedor'];
            
            $solicitanteparaemail=$_POST['solicitanteparaemail'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}


//CHAMA Oádrao conexao para toadas as telas
$labelbanco=$_SESSION["labelbanco"];

require("carregamenumaximiza.php");
require("estilo.css");
require("configuramysqlversa2.php");

require("configuraoraclenovo.php");

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];


$username_https=$_SESSION["username_https"];
$password_https=$_SESSION["password_https"];
$hostname_https=$_SESSION["hostname_https"];








?>


<table>

<tr>
<td><img border="0" src="imagemfundotelamaximizalogo.jpg"></td>
</tr>
</table>


<center>
<table width=95%>

<tr>

<td width=100%>

<?
if (!IsSet($escolha) or ($escolha=="1")){
?>
<font style='font-size: 14px;color: black;text-align:left;bold: Negrito' >Abrindo Solicitação</font>


<?




$today = date('d/m/y H:i:s'); 

          $acha1 = "SELECT A.CODIGO CODIGOEMPRESA,A.DESCRICAO EMPRESA,B.DESCRICAO NOME,
          E.DESCRICAO NOMEEMPRESA,D.ID_MASTER MASTER,B.CODIGO CODIGOPESSOASOLICITA
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
          $solicitanteparaemail=$valor6["CODIGOPESSOASOLICITA"];



          $achaempresasolicita1= "SELECT a.NOME NOME,b.EMPRESA EMPRESA
          FROM FUNCIONARIO_SADEGE a,fornecedor_sadege b
          where a.NOME='$nome2' and
          a.cd_fornecedor=b.cod_fornecedor";
          

          
          $achaempresasolicita2= @OCIParse($ora_conexao, $achaempresasolicita1);
		  @OCIExecute($achaempresasolicita2, OCI_DEFAULT);
		  while (OCIFetchInto($achaempresasolicita2,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
		  {
                $empresasolicitante=ociresult($achaempresasolicita2, "EMPRESA") ;
                $nomesolicitante=ociresult($achaempresasolicita2, "NOME") ;

          }


                 $result2 = "select MAX(NR_PEDIDO) PEDIDO FROM SERV_TERC_PEDIDO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1P=ociresult($result3, "PEDIDO") ;
                 }
                 IF ($sequencia1P >"0"){$maxima2P=$sequencia1P+1;}ELSE{$maxima2P="1";}

   echo " Nr.Pedido:$maxima2P";



   ?>
   <table>
   <tr>
   <td>Solicitante</td>
    <td>

                 <select name="solicitantepesquisainicial">

                 
                 

                 <?


                 $result2 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE where NOME='$nomesolicitante'";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["CADASTRO"]}-{$row["NOME"]}</option>";
                 }
				 ?>
				 </select>




    <input type="hidden" name="servico1"  value="999" >
   </td>
   <td>
Empresa:

  <select    name="fornecedor1">
                     <option value="<?echo $fornecedor1;?>"><?echo $fornecedor1;?></option>

					 <?
                 $result2 = "SELECT COD_FORNECEDOR,EMPRESA FROM FORNECEDOR_SADEGE order by EMPRESA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["EMPRESA"]}</option>";
                 }
                     ?>
					 </select>
   </td>
   <td>
   <textarea  cols="40" rows="2" name="recomendacao" ><?echo "Obs:";?></textarea>
  </td>
  </tr>
  
  




 </table>
 
 <div  id="resultado5">
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">

<tr>
  <th>Codigo</th>
  <th>Motivos</th>
  <th>Seleção</th>


</tr>


<?
 $s= OCIParse($ora_conexao, "SELECT CD_MOTIVO,DS_MOTIVO FROM MOTIVO_SOLICITACAO
 order by  DS_MOTIVO asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CD_MOTIVO") ;
          $descricaoS=ociresult($s, "DS_MOTIVO") ;



   ?>
   <tr>
   <td><?echo $codigoS;?> </td>
   <td><?echo $descricaoS;?> </td>



   <td><input type="checkbox" name="lista[]" value="<?echo $codigoS;?>"></td>

   </tr>
 <?
 }
 ?>
 
 


</table>
</div>

<input type="hidden" name="data" OnKeyUp="mascara_data(this.value)" maxlength="10">
<input type="hidden" name="hora" OnKeyUp="mascara_hora(this.value)" maxlength="5">



 <input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="atualizar5">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="segundasemana" value="<?echo $segundasemana;?>">



		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="pagina" value="<?echo $pagina;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
		
		<input type="hidden" name="solicitantenovo" value="<?echo $empresasolicitante;?>">
		
		<input type="hidden" name="pedido1" value="<?echo $maxima2P;?>">
		
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		
		<input type="hidden" name="solicitanteparaemail" value="<?echo $solicitanteparaemail;?>">
		
		







 <input type="hidden" name="entrada" size="5" value="<?echo "GRAVA1";?>" ></br>

<input  type="submit" VALUE="Gravar">





<?
}
?>








<center></br>

<?
if ($escolha=="atualizar5") {

if ($solicitantepesquisainicial >"0"){



    if ($pedido1==null){
      echo "Não existe pedido</br>";
    }
    else
    {



       if ($fornecedor1>"0"){

         

                                  $diahoje=date('d-m-Y');
                                  $dataabertura=$diahoje;

                 
                 $result2 = "select MAX(NR_SEQUENCIA) REGIAO FROM SERV_TERC_PEDIDO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "REGIAO") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
                                  


                                  //grava os email de envio


                                   $sqlachaemailmanda="select ds_email EMAIL FROM pessoa_bi where
                   codigo='$solicitanteparaemail' ";
                   $sqlachaemailmanda2= mysql_db_query($banco,$sqlachaemailmanda,$conexao);
                   $sqlachaemailmanda3=mysql_fetch_array($sqlachaemailmanda2);

                   $destinoe=$sqlachaemailmanda3["EMAIL"];


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
                   $mail->Subject    = "Abertura de Solicitação";
                   $mail->Body       = "Emitido pedido Nr. ".$pedido1;
                   if (!$mail->Send())
                   {       echo "Erro de envio: " . $mail->ErrorInfo;}
                   else{}
                                  

                                  
                                  //final do email




                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO
                                  SERV_TERC_PEDIDO(
                                  NR_PEDIDO,
                                  DATA_DIGITACAO,
                                  DATA_EMISSAO,
                                  COD_FORNECEDOR,
                                  CD_EMPRESA_SOLICITANTE,
                                  NR_SEQUENCIA,
                                  ID_STATUS)
                                  VALUES ('$pedido1','$diahoje','$dataabertura','$fornecedor1','$solicitantenovo',
                                  '$maxima2','ABER')");
                                  

                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO SERV_TERC_ITENS(
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO)
                                      values('$pedido1','$fornecedor1','$solicitantenovo','$servico1' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                  

                                  
                                  
                                  
                                  $lista=$_POST['lista'];


                                  $result2xistevei89 = "select count(*) CONTADOR  FROM MOTIVO_SOLICITACAO";
                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {
                                   $acao=$lista[$passa];
                                   if ($acao >"0"){

                                     $result298 = "select MAX(NR_SEQUENCIA) REGIAO FROM SOLICITACAO_MOTIVO";
                                     $result398 = @OCIParse($ora_conexao, $result298);
				                     @OCIExecute($result398, OCI_DEFAULT);
				                     while (OCIFetchInto($result398,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                     {
                                       $sequencia198=ociresult($result398, "REGIAO") ;
                                     }
                                     IF ($sequencia198 >"0"){$maxima298=$sequencia198+1;}ELSE{$maxima298="1";}




                                     $sgrava1= OCIParse($ora_conexao, "INSERT INTO SOLICITACAO_MOTIVO(nr_sequencia,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNC_SOLICITANTE,DS_SOLICITANTE)
                                      values('$maxima298','$pedido1','$fornecedor1','$solicitantenovo','$servico1','$acao',
                                      '$solicitantepesquisainicial','$recomendacao' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);
                                     

                                     

                                   }

                                  }//final do loop
                                  
                                  
                                  
                                  
                                  ?><center><?echo "Gravado com Sucesso</br>";
                                  $escolha="pedifuncionarioliberar";


       }
       else
       {
        echo "Não existe Fornecedor Definido</br>";
       }

    }
    

}//fina de testar as entradas
else
{
 echo "Não existe Solicitante definido";

}


}//FINAL QUANDO grava


if ($escolha=="pedifuncionarioliberar") {
?>

<center>
<font style='font-size: 19px;color: black;text-align:left;bold: Negrito' >
Defina a Liberação de Funcionários para a Pedido <?echo "$pedido1"; ?>

<center><table  width="900">

<tr>
  <th>Codigo</th>
  <th>Funcionario</th>
  <th>Data Inical Liberação</th>
  <th>Data Final Liberação</th>
  <th>Hora Inicio</th>
  <th>Hora Final</th>



</tr>


<?


 $s77= OCIParse($ora_conexao, "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE where cd_fornecedor ='$fornecedor1'
 order by NOME ASC");


              OCIExecute($s77, OCI_DEFAULT);
              While (OCIFetch($s77)){



          $codigoS=ociresult($s77, "CADASTRO") ;
          $descricaoS=ociresult($s77, "NOME") ;



   ?>
   <tr>
   <td><?echo $codigoS;?> </td>
   <td><?echo $descricaoS;?> </td>



   <td><input type="txt" name="data1[]"   maxlength="10"  /><input type="hidden" name="lista[]" value="<?echo $codigoS;?>"></td>
   <td><input type="txt" name="data2[]"   maxlength="10"  /></td>
   <td><input type="txt" name="hora1[]"   size="1px" value="00" maxlength="2"  />:<input type="txt" name="minuto1[]" size="1px" value="00" maxlength="2"  /></td>
   <td><input type="txt" name="hora2[]"   size="1px" value="00" maxlength="2"  />:<input type="txt" name="minuto2[]" size="1px" value="00"  maxlength="2"  /></td>






   </tr>


 <?
 }
 ?>
 

</table>

<input  type="submit" VALUE="Finaliza">

<input type="hidden" name="pedido" value="<?echo $pedido1;?>">

		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="escolha" value="atualizar588">

<?

}

if ($escolha=="atualizar588") {
$diahoje=date('d-m-Y');
                                  $dataabertura=$dia1."-".$mes1."-".$ano;


                                  $result2 = "select COD_FORNECEDOR,CD_SERVICO,CD_MOTIVO,CD_EMPRESA
                                  FROM solicitacao_motivo where nr_pedido='$pedido'";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $empresagrava=ociresult($result3, "CD_EMPRESA") ;
                                    $fornecedorgrava=ociresult($result3, "COD_FORNECEDOR") ;
                                    $servicograva=ociresult($result3, "CD_SERVICO") ;
                                    $motivograva=ociresult($result3, "CD_MOTIVO") ;



                                  }




                                  $data1=$_POST['data1'];
                                  $data2=$_POST['data2'];
                                  $lista=$_POST['lista'];
                                  
                                  $hora1=$_POST['hora1'];
                                  $hora2=$_POST['hora2'];

                                  $minuto1=$_POST['minuto1'];
                                  $minuto2=$_POST['minuto2'];


                                  $result2achaorigemfuncioanrio1= "select count(*) CONTADOR from
                                  solicitacao_motivo where nr_pedido='$pedido' and COD_FORNECEDOR not in('99999')";
                                  $result2achaorigemfuncioanrio12= @OCIParse($ora_conexao,$result2achaorigemfuncioanrio1);
				                  @OCIExecute($result2achaorigemfuncioanrio12, OCI_DEFAULT);
				                  while (OCIFetchInto($result2achaorigemfuncioanrio12,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $contador66=ociresult($result2achaorigemfuncioanrio12, "CONTADOR") ;
                                  }








                                  $result2achaorigemfuncioanrio18= "select DISTINCT COD_FORNECEDOR CONTADOR7 from
                                  solicitacao_motivo where nr_pedido='$pedido' ";
                                  $result2achaorigemfuncioanrio128= @OCIParse($ora_conexao,$result2achaorigemfuncioanrio18);
				                  @OCIExecute($result2achaorigemfuncioanrio128, OCI_DEFAULT);
				                  while (OCIFetchInto($result2achaorigemfuncioanrio128,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $pegaforne=ociresult($result2achaorigemfuncioanrio128, "CONTADOR7") ;
                                  }





                                  IF ($contador66 =="0"){
 $result2xistevei89= "SELECT count(*) CONTADOR  FROM FUNCIONARIO_SADEGE where cd_fornecedor is null";
 $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }
 }
 ELSE
 {


 $result2xistevei89="SELECT count(*) CONTADOR  FROM FUNCIONARIO_SADEGE where cd_fornecedor='$pegaforne'";
 $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

 }





                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {


                                   $datainicial=$data1[$passa];
                                   $datafinal=$data2[$passa];
                                   $acao=$lista[$passa];
                                   
                                   $minutoinicial=$minuto1[$passa];
                                   $minutofinal=$minuto2[$passa];

                                   
                                   
                                   $horainicialgrava1=$hora1[$passa];
                                   $horainicialgrava=$horainicialgrava1.":".$minutoinicial;

                                   $horafinalgrava1=$hora2[$passa];
                                   $horafinalgrava=$horafinalgrava1.":".$minutofinal;



                                   if (($datainicial==null) or ($datafinal==null))
                                   {

                                   }
                                   ELSE
                                   {

                                     $result298 = "select MAX(NR_SEQUENCIA) REGIAO FROM SOLICITACAO_MOTIVO_FUNC";
                                     $result398 = @OCIParse($ora_conexao, $result298);
				                     @OCIExecute($result398, OCI_DEFAULT);
				                     while (OCIFetchInto($result398,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                     {
                                       $sequencia198=ociresult($result398, "REGIAO") ;
                                     }
                                     IF ($sequencia198 >"0"){$maxima298=$sequencia198+1;}ELSE{$maxima298="1";}



                                     $statusgrav5="FUNC";
                                      $sgrava1= OCIParse($ora_conexao, "INSERT INTO SOLICITACAO_MOTIVO_FUNC(nr_sequencia,
                                      NR_PEDIDO,
                                      COD_FORNECEDOR,
                                      CD_EMPRESA,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNCIONARIO,DT_LIMITE_ACESSO_INICIAL,DT_LIMITE_ACESSO_FINAL,ID_LIBERADO,HR_INICIO,HR_FINAL)
                                      values('$maxima298','$pedido','$fornecedorgrava','$empresagrava','$servicograva',
                                      '$motivograva','$acao','$datainicial','$datafinal','N','$horainicialgrava','$horafinalgrava' ) ");



                                      OCIExecute($sgrava1, OCI_DEFAULT);
                                      oci_commit($ora_conexao);




                                      $sgrava1= OCIParse($ora_conexao, "update  SERV_TERC_PEDIDO
                                     set ID_STATUS='$statusgrav5' WHERE  nr_pedido='$pedido' ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);


                                    }

                                  }//final do loop



               echo "Final do Processo</br>";



 }

?>





</td>

</tr>
</table>


</form>
</html>


