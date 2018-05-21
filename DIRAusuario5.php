<?
//session_start();
require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>

<form action="DIRAusuario5.php" method="POST">
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
}

$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


if (!IsSet($tipo)){?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Cadastro de Pessoas e Usuários</font><hr>
                    
					
 <table>
 
 <tr>
 <td> Nome Completo</td>
 <td><input type="txt" name="nome5"  size="60"></td>
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
 <td><input type="txt" name="senha5"  size="10">
 </td>
 
 <td>
  Empresa</td>
  <td>
 <select    name="clienterecebe" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option>
					
					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from PESSOA_BI WHERE ID_TIPO_PESSOA=2 and id_matriz='S'";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select>           
 
 </td>
 
 </tr>
 </table>

 
 
 <input type="hidden" name="tipo"  size="10" value="NOVOS">
 
 <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		 <input type="hidden" name="banco" value="<?echo $banco;?>">

<input  type="submit"    VALUE="GRAVAR">

<?
}
ELSE
{



$sql99 = "SELECT MAX(CODIGO)+1 MAXIMA FROM PESSOA_BI";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);


$MAXIMA=$valor8["MAXIMA"];


$grava = "INSERT INTO PESSOA_BI (CODIGO,DESCRICAO,NM_BAIRRO,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_BASE) values ('$MAXIMA','$nome5','Centro','1','N','N','N')";
 
//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);

$sql99 = "SELECT MAX(CODIGO) MAXIMA FROM PESSOA_BI";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);


$MAXIMA2=$valor8["MAXIMA"];

$sql99 = "SELECT MAX(CD_USUARIO)+1 MAXIMA FROM USUARIO_BI";
$res = mysql_db_query($banco,$sql99,$conexao);
$valor8=mysql_fetch_array($res);


$MAXIMA3=$valor8["MAXIMA"];

$today = date('d/m/y H:i:s'); 

$grava = "INSERT INTO USUARIO_BI (CD_USUARIO,CD_SENHA,NM_USUARIO,ID_MASTER,DT_ATUALIZACAO,CD_PESSOA,CD_EMPRESA)
VALUES ('$MAXIMA3','$senha5','$usuario5','N','$today','$MAXIMA2','$codigoempresa')";
// echo "$grava </br>";
$res = mysql_db_query($banco,$grava,$conexao);




?><center>
<input type="hidden" name="tipos" size="5" value="NOVO" >

<?ECHO "Gravado Registro</br>";



}//final da primeira tela

?>



</form>

