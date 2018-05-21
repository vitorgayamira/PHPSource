<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

                     $edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];
                     $pagina_atual = $_GET['pagina_atual'];
					 $escolha=$_GET['escolha'];


					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="mudasenhamaximiza.php";
$titulo="Acesso de Usuário Por Unidade";
$programadelete="classeeliminanaojob.php";


if (!IsSet($escolha)){require("logtela.php");}	

$chacontadorgeral="SELECT  a.nr_sequencia  from USUARIO_FABRICA a where a.nr_sequencia > 0 ";
$nometabelaparapassar="USUARIO_FABRICA";

$nomecolunaparapassar="a.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";



$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim")
{
$contadorfabrica=$_GET['contadorfabrica'];
}

if ($continuarmesmatela=="sim")
{
	$contadorfabrica=$_POST['contadorfabrica'];
	$etapa=$_POST['etapa'];
}



?>


<form action="mudasenhamaximiza.php" method="POST" name="formulario">

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];



if ($navegando=="sim"){
$dispminima=$_GET['dispminima'];

}
if ($continuarmesmatela=="sim"){

$dispminima=$_POST['dispminima'];
$esenha1=$_POST['esenha1'];
$esenha2=$_POST['esenha2'];

}



if ($dispminima=="1")
{
	
	$sql998se= "SELECT count(*) CONTADOR FROM usuario_bi where NM_USUARIO='$edusuario' and cd_senha='$esenha1'";
          $mostragrid177se = $conn->Execute($sql998se);
       $contador55=$mostragrid177se->fields["CONTADOR"];


if ($contador55=="1"){




$gravasen = "update usuario_bi  set cd_senha='$esenha2' where nm_usuario='$edusuario'";
$resultussG77sen= $conn->Execute($gravasen);
    $programa="homologarcredenciaismaximiza.php";
    $erromostra=$conn->ErrorMsg();
    require("logerrobi.php");


}
else
{
	$programa="homologarcredenciaismaximiza.php";
$mensagem="Senha Inválida";
require("logerrobi.php");
}
				
							 


}//FINAL DA GRAVACAO


if ($dispminima=="0")
{


?>

<div  style="display: block;" id="janelasenha">
Alterando Senha
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelainsert;?>
        <a href="homologarcredenciaismaximiza.php"  style="text-decoration:none;color: black;">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>

         Senha Atual:<input class="input-text" type="password" name="esenha1" size="10">
	     Senha Nova:<input class="input-text" type="password" name="esenha2" size="10"></br>
		 
		 <input type="hidden" name="dispminima" size="5" value="1" >
		 <input type="hidden" name="continuarmesmatela" value="sim">
              

		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
</div>
		
<?}?>

</form>
</html>

