<head>
<script language="javascript">
function Certeza()
{
 if (!confirm ("Você Tem Certeza" ))
 {
    	return false;

 }
 else
 {

	return true;
    document.teste.submit();

 }
}




function Mascara_Hora2(Hora2){
var hora01 = '';
hora01 = hora01 + Hora2;
if (hora01.length == 2){
hora01 = hora01 + ':';
document.forms[0].hora.value = hora01;
}
if (hora01.length == 5){
Verifica_Hora2();
}
}







function Verifica_Hora2(){
hrs = (document.forms[0].hora.value.substring(0,2));
min = (document.forms[0].hora.value.substring(3,5));
}

function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }
        return formataCampo(cnpj, '00.000.000/0000-00', event);

}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }
        return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }
        return formataCampo(tel, '(00) 0000-0000', event);
}


//adiciona mascara codigo barra
function Mascaracodigobarra(barra){
        if(mascaraInteiro(barra)==false){
                event.returnValue = false;
        }
        return formataCampo(barra, '000-0000-00000-0', event);
}


//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('Numero de Telefone Invalido!');
}




//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" );
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
         if(digitoGerado!=digitoDigitado){ alert('Cpf Invalido!')
        document.teste.reset();}


}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" );
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);
                dig2 += cnpj.charAt(i)*valida[i];
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito){ alert('CNPJ Invalido!')
        document.teste.botao.disabled = true;}else{document.teste.botao.disabled = false;}






}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
        var boleanoMascara;

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" );

        var posicaoCampo = 0;
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;;

        if (Digitato != 8) { // backspace
                for(i=0; i<= TamanhoMascara; i++) {
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/"))
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
                        if (boleanoMascara) {
                                NovoValorCampo += Mascara.charAt(i);
                                  TamanhoMascara++;
                        }else {
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                                posicaoCampo++;
                          }
                  }
                campo.value = NovoValorCampo;
                  return true;
        }else {
                return true;
        }
}
</script>
</head>
<?
//session_start();
$cortopo="#828282";
$corfundo="#4682B4";




?>


<form name="teste"  action="PESSOA.php" method="POST">

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$funcaochegando=$_GET['funcaochegando'];


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
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$banco=$_POST['banco'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$ano=$_POST['ano'];
$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$entrada=$_POST['entrada'];
$nome5=$_POST['nome5'];
$usuario5=$_POST['usuario5'];
$senha5=$_POST['senha5'];
$emaildescicao=$_POST['emaildescicao'];
$usuariosim=$_POST['usuariosim'];
$esenha1=$_POST['esenha1'];
$esenha2=$_POST['esenha2'];
$gruporecebe=$_POST['gruporecebe'];
$ambiente=$_POST['ambiente'];
$localbanco=$_POST['localbanco'];
$clienterecebe=$_POST['clienterecebe'];
$cpf=$_POST['cpf'];
$cidade=$_POST['cidade'];
}

require("configuramysql.php");
require("estilo2.css");




?>

<style  type="text/css">

 body{
         width:100%;
	     height:100%;
         background: url(<?echo $mimagemfundo;?>) no-repeat;

}
?>
</style>

<?

$usu18 = "SELECT CD_EMPRESA FROM parametro_bi";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


$programa="PESSOA.php";

if (!IsSet($ambiente)){ $ambiente="mysql";}









$usu18QUANTOS = "SELECT COUNT(*) CONTADOR FROM usuario_grupo_bi WHERE ID_CRIA_USUARIO='S' AND CD_USUARIO='$codigousuario'";

$usu18QUANTOS1 = mysql_db_query($banco,$usu18QUANTOS,$conexao);
$usu18QUANTOS2=mysql_fetch_array($usu18QUANTOS1);
$contadorsenha=$usu18QUANTOS2["CONTADOR"];


?>



<center><font style='font-size: 29px;color: red;text-align:left;bold: Negrito' >Cadastro de Pessoas</font></br>




<a href="<?echo $programa;?>?pagina=1&escolha=1&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?echo $ambiente;?>"><img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&ambiente=<?echo $ambiente;?>"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=4&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>&ambiente=<?echo $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=5&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&ambiente=<?echo $ambiente;?>"><img width=50 height=60 BORDER=1 src="senha.GIF"></a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=mudaremail&ambiente=<?echo $ambiente;?>"><img width=50 height=60 BORDER=1 src="email.jpg">
</a>

<hr>


<font style='font-size: 13px;color: black;text-align:left;bold: Negrito' >
<center>
<?

if (!IsSet($escolha) or $escolha=="1"  ){?>


 <table>
 
 <tr>
 <td>Nome Completo</td>
 <td><input type="txt" name="nome5"  size="60"></td>
 </tr>
 
 <tr>
 <td>
 Cpf
 </td>
 <td><input type="txt" name="cpf"  size="15" onKeyPress="MascaraCPF(teste.cpf);"maxlength="14" value="000.000.000-00">

  <input  type="button"     VALUE="Validar" onClick="ValidarCPF(teste.cpf);">

 </td>
 </tr>

 <tr>
 <td>
 Cidade
 </td>
 <td>
  <select   name="cidade">

					<?
					$stmt1 = "SELECT CD_CIDADE,DS_CIDADE  FROM cidade_bi  ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_CIDADE"]}\">{$valor["DS_CIDADE"]}</option>";

					}


					 ?>
					 </select>

   </td>
 </tr>



 <tr>
 <td>
 Usuário
 </td>
 <td><input type="txt" name="usuario5"  size="30">
 </td>
 </tr>
 
 <tr>
 <td>
  Senha</td>
 <td><input type="txt" name="senha5"  size="20">
 </td>

 </tr>

 <tr>
 <td>
  Email</td>
 <td><input type="txt" name="emaildescicao"  size="60">
 </td>
 </tr>

 <tr>
 <td>
 Usuário
 </td>
 <td>
 <select name="usuariosim">
     			 <option value="N"><?echo "Não";?></option>
				 <option value="S"><?echo "Sim";?></option>

                 </select>
 </td>
 </tr>


 
 <tr>
 <td>Grupos e Unidades de Negócio</td>
 <td>


   <table>

   <tr>
       <th>Codigo</th>
       <th>Grupos</th>
       <th>Seleção</th>
       
   </tr>

   <?
    $sqlacharita58="select CODIGO,DESCRICAO FROM grupo_usuario_bi";
    $sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
    while ($valor4=mysql_fetch_array($sqlacharita518)){
          $descrica88=$valor4["DESCRICAO"];
          $codigo8=$valor4["CODIGO"];


   ?>
   <tr>
       <td><?echo $codigo8;?></td>
       <td><?echo $descrica88;?></td>
       <td><input type="checkbox" name="lista[]" value="<?echo $codigo8;?>"></td>



   </tr>
   <?}?>
   </table>


   <table>

   <tr>
       <th>Codigo</th>
       <th>Unidade Negócio</th>
       <th>Seleção</th>
   </tr>

   <?
    $sqlacharita58="select CODIGO,DESCRICAO FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S') )";
    $sqlacharita518= mysql_db_query($banco,$sqlacharita58,$conexao);
    while ($valor4=mysql_fetch_array($sqlacharita518)){
          $descrica88=$valor4["DESCRICAO"];
          $codigo87=$valor4["CODIGO"];


   ?>
   <tr>
       <td><?echo $codigo87;?></td>
       <td><?echo $descrica88;?></td>
       <td><input type="checkbox" name="lista2[]" value="<?echo $codigo87;?>"></td>



   </tr>
   <?}?>
   </table>


 </td>
 </tr>
 

 </table>

 
 <input type="hidden" name="escolha" size="5" value="3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">


                 <input  type="submit"     VALUE="GRAVAR">


<?
}

if ($escolha=="3"){

$lista=$_POST['lista'];
$lista2=$_POST['lista2'];

$acao=$lista[$passa];




$sql99 = "SELECT MAX(CODIGO)+1 MAXIMA FROM pessoa_bi";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);


$MAXIMA=$valor8["MAXIMA"];


$grava = "INSERT INTO pessoa_bi (CODIGO,DESCRICAO,NM_BAIRRO,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_BASE,DS_EMAIL,nr_cpf,cd_cidade) values
 ('$MAXIMA','$nome5','Centro','1','N','N','N','$emaildescicao','$cpf','$cidade')";

$res = mysql_db_query($banco,$grava,$conexao);





if ($usuariosim=="S"){
$sql99 = "SELECT MAX(CODIGO) MAXIMA FROM pessoa_bi";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);
$MAXIMA2=$valor8["MAXIMA"];
$sql99 = "SELECT MAX(CD_USUARIO)+1 MAXIMA FROM usuario_bi";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);
$MAXIMA3=$valor8["MAXIMA"];
$today = date('d/m/y H:i:s');
$grava = "INSERT INTO usuario_bi (CD_USUARIO,CD_SENHA,NM_USUARIO,ID_MASTER,DT_ATUALIZACAO,CD_PESSOA,CD_EMPRESA,CD_VARIACAO,CD_PROC_ALTERN_DESMONTE)
VALUES ('$MAXIMA3','$senha5','$usuario5','N','$today','$MAXIMA2','$codigoempresa','1','1')";
 //echo "$grava </br>";
$res = mysql_db_query($banco,$grava,$conexao);


//grava grupo se unidade

$QUANTOSGRUPOS= "SELECT COUNT(*) CONTADOR FROM grupo_usuario_bi";
$QUANTOSGRUPOS2 = mysql_db_query($banco,$QUANTOSGRUPOS,$conexao);
$QUANTOSGRUPOS3=mysql_fetch_array($QUANTOSGRUPOS2);
$quantidadedegrupos=$QUANTOSGRUPOS3["CONTADOR"];


$QUANTOSUNID= "SELECT COUNT(*) CONTADOR FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S'))";
$QUANTOSUNID2 = mysql_db_query($banco,$QUANTOSUNID,$conexao);
$QUANTOSUNID3=mysql_fetch_array($QUANTOSUNID2);
$quantidadedeunidades=$QUANTOSUNID3["CONTADOR"];

for ($passa99=0;$passa99 <=$quantidadedegrupos;$passa99++)
{


	     $gruposelecioando=$lista[$passa99];

         if ($gruposelecioando >"0"){

           for ($passa998=0;$passa998 <=$quantidadedeunidades;$passa998++)
           {
              $unidadeselecioando=$lista2[$passa998];
              if ($unidadeselecioando >"0"){

               $grava = "INSERT INTO usuario_grupo_bi(CD_USUARIO,CD_GRUPO,CD_PESSOA)
               VALUES ('$MAXIMA3','$gruposelecioando','$unidadeselecioando')";
               //echo "$grava </br>";
               $res = mysql_db_query($banco,$grava,$conexao);

              }

           }//final das unidades
           $passa998="0";
         }//quando marcou grupo

}//final dos grupos

}









?><center>
<input type="hidden" name="tipos" size="5" value="NOVO" >

<?ECHO "Gravado Registro</br>";



}//final da ESCOLHA 3

if ($escolha=="4"){
?>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">
 <tr>
  <th>Codigo</th>
  <th>Nome</th>
  <th>Unidade de Atuação</th>
  <th>Email</th>


  <?
  $sqlacharita5 = "SELECT a.DESCRICAO DESCRICAO, a.CODIGO CODIGO, b.descricao DESCRICAO2 ,a.ds_email EMAIL
FROM pessoa_bi a, usuario_bi c, usuario_grupo_bi d, pessoa_bi b
WHERE a.ID_TIPO_PESSOA =  '1'
AND a.codigo = c.cd_pessoa
AND c.cd_usuario = d.cd_usuario
AND d.cd_pessoa = b.codigo";
  $sqlacharita51 = mysql_db_query($banco,$sqlacharita5,$conexao);
  while ($valor71=mysql_fetch_array($sqlacharita51)){
  $emailacha=$valor71["EMAIL"];
  
  ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["CODIGO"];?> </td>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["DESCRICAO"];?> </td>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["DESCRICAO2"];?> </td>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $emailacha;?> </td>
   </tr>
   <?

   }

?>
</TABLE>




<?
}


if ($escolha=="5"){//senha
echo "</br>Alterando Senha para:Usuário Logado:$codigousuario</br>";
?>

	Senha Atual:<input class="input-text" type="password" name="esenha1" size="10">
	Senha Nova:<input class="input-text" type="password" name="esenha2" size="10"></br>
	
	    <input type="hidden" name="escolha" size="5" value="6" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
        <input  type="submit"     VALUE="Trocar">

	
<?
}//finalambiente nuvem

if ($escolha=="6"){//senha

$sql998 = "SELECT count(*) CONTADOR FROM usuario_bi where CD_USUARIO='$codigousuario' and cd_senha='$esenha1'";
//echo "$sql998";
$res8 = mysql_db_query($banco,$sql998,$conexao);
$valor88=mysql_fetch_array($res8);
$contador55=$valor88["CONTADOR"];

if ($contador55=="1"){




$grava = "update usuario_bi  set cd_senha='$esenha2' where cd_usuario='$codigousuario'";
// echo "$grava </br>";
 echo "Senha Alterada";
$res = mysql_db_query($banco,$grava,$conexao);


                          if ($ambiente=="oracle"){
                           require("configuraoracle.php");

                           $sgrava1= OCIParse($ora_conexao, "update usuario_bi set cd_senha='$esenha2'
                           where cd_usuario='$codigousuario'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           ($ora_conexao);

                          }

}
else
{
echo "Senha Inválida";
}

}

if ( $escolha=="mudaremail")
{



$sql99 ="SELECT  DESCRICAO , CODIGO ,ds_email EMAIL
FROM pessoa_bi
WHERE ID_TIPO_PESSOA =  '1'";



//echo "$sql99";


?>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
<th>Nome</th>
<th>Email</th>

</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

	    <tr>
	    <td><?echo $valor["DESCRICAO"];?></td>
	    <td><input type="txt" name="passaemail[]" size="35px" value="<?echo $valor["EMAIL"];?>">
        <input type="hidden" name="lista[]" value="<?echo $valor["CODIGO"];?>"></td>

 </tr>
 <?}?>

</table>



<input type="hidden" name="escolha" size="5" value="CONFIRMAEMAIL" >

<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="valorcalculo" value="<?echo $valorcalculo;?>">


<input type="submit"    value="Confirma">


<?
}

if ($escolha=="CONFIRMAEMAIL")
{
$lista=$_POST['lista'];
$passaemail=$_POST['passaemail'];




         $achacontador = "SELECT count(*) CONTADOR
         FROM
         pessoa_bi a, usuario_bi c, usuario_grupo_bi d, pessoa_bi b
         WHERE a.ID_TIPO_PESSOA =  '1'
         AND a.codigo = c.cd_pessoa
         AND c.cd_usuario = d.cd_usuario
         AND d.cd_pessoa = b.codigo ";
         $res8 = mysql_db_query($banco,$achacontador,$conexao);
         $valor87=mysql_fetch_array($res8);
         $ultimo=$valor87["CONTADOR"];



         $ultimo=$ultimo-1;


 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$lista[$passa];
	     $emailacao=$passaemail[$passa];


             if ($acao >"0"){
			 $sql = "UPDATE pessoa_bi set ds_email='$emailacao'   WHERE codigo='$acao'";
             //ECHO "$sql</BR>";

			 $res = mysql_db_query($banco,$sql,$conexao);
             }

}//final do loop
?><center><? ECHO "Alterado Emails";
}//FIANL DA TELA




?>



</form>

