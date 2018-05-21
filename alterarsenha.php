<?
//session_start();
$cortopo="#828282";
$corfundo="#4682B4";


require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>


<form action="alterarsenha.php" method="POST">

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
}

$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];


$programa="alterarsenha.php";







$usu18QUANTOS = "SELECT COUNT(*) CONTADOR FROM USUARIO_GRUPO_BI WHERE ID_CRIA_USUARIO='S' AND CD_USUARIO='$codigousuario'";

$usu18QUANTOS1 = mysql_db_query($banco,$usu18QUANTOS,$conexao);
$usu18QUANTOS2=mysql_fetch_array($usu18QUANTOS1);
$contadorsenha=$usu18QUANTOS2["CONTADOR"];


?>



<center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Cadastro de Pessoas</font></center>






<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=4&localbanco=<?ECHO $localbanco;?>&ambiente=<?ECHO $ambiente;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=5&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>"><img width=50 height=60 BORDER=1 src="senha.GIF"></a>



<center>






<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">
 <tr>
  <th>Codigo</th>
  <th>Nome</th>
  <th>Unidade de Lotação</th>


  <?
  $sqlacharita5 = "SELECT a.DESCRICAO DESCRICAO, a.CODIGO CODIGO, b.descricao DESCRICAO2
FROM PESSOA_BI a, PESSOA_BI b, USUARIO_BI c
WHERE a.ID_TIPO_PESSOA = '1'
AND b.codigo = c.cd_empresa
AND a.codigo = c.cd_pessoa";
  $sqlacharita51 = mysql_db_query($banco,$sqlacharita5,$conexao);
  while ($valor71=mysql_fetch_array($sqlacharita51)){
  ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["CODIGO"];?> </td>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["DESCRICAO"];?> </td>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["DESCRICAO2"];?> </td>
   </tr>
   <?

   }

?>
</TABLE>




<?



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

$sql998 = "SELECT count(*) CONTADOR FROM USUARIO_BI where CD_USUARIO='$codigousuario' and cd_senha='$esenha1'";
//echo "$sql998";
$res8 = mysql_db_query($banco,$sql998,$conexao);
$valor88=mysql_fetch_array($res8);
$contador55=$valor88["CONTADOR"];

if ($contador55=="1"){




$grava = "update USUARIO_BI  set cd_senha='$esenha2' where cd_usuario='$codigousuario'";
// echo "$grava </br>";
 echo "Senha Alterada";
$res = mysql_db_query($banco,$grava,$conexao);


                          if ($ambiente=="oracle"){
                           require("configuraoracle.php");

                           $sgrava1= OCIParse($ora_conexao, "update USUARIO_BI set cd_senha='$esenha2'
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
?>



</form>

