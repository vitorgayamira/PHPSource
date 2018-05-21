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

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

?>
<form action="<?=$PHP_SELF?>" method="POST">
<?




$programa=$_GET['programa'];
$escolha=$_GET['escolha'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$chacontadorgeral=$_GET['chacontadorgeral'];
$numerocolunastela=$_GET['numerocolunastela'];
$codigoachou=$_GET['codigoachou'];

$nomecolunaparapassar=$_GET['nomecolunaparapassar'];
$nometabelaparapassar=$_GET['nometabelaparapassar'];
$nomecolunaparapassaracao=$_GET['nomecolunaparapassaracao'];
$titulojanelaelimina=$_GET['titulojanelaelimina'];
$comanda=$_GET['comanda'];

$usuario=$_GET['usuario'];
$grupo=$_GET['grupo'];
$empresa=$_GET['empresa'];



if ($continuarmesmatela=="sim"){
$escolha=$_POST['escolha'];
$programa=$_POST['programa'];
$nomecolunaparapassar=$_POST['nomecolunaparapassar'];
$codigoachou=$_POST['codigoachou'];
$nomecolunaparapassaracao=$_POST['nomecolunaparapassaracao'];
$nometabelaparapassar=$_POST['nometabelaparapassar'];
$comanda=$_POST['comanda'];


$codigoachoulocal=$_POST['codigoachoulocal'];
$sequenciacomanda=$_POST['sequenciacomanda'];

}

if ($escolha=="elimina"){
$titulojanela="Eliniandoa";
$acoagravacao="sim";




?>
<div  style="display: block;" id="novoscadastros1">

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelaelimina;?>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>

        <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA1";?>" >
        <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<?echo $nomecolunaparapassar;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<?echo $nomecolunaparapassaracao;?>" >
        <input type="hidden" name="nometabelaparapassar" size="5" value="<?echo $nometabelaparapassar;?>" >
		
		<input type="hidden" name="usuario" size="5" value="<?echo $usuario;?>" >
		<input type="hidden" name="grupo" size="5" value="<?echo $grupo;?>" >
		<input type="hidden" name="empresa" size="5" value="<?echo $empresa;?>" >
		
		
		<input type="hidden" name="codigoachoulocal" size="5" value="<?echo $codigoachoulocal;?>" >
		
        Deseja Realmente Elimiar
		<table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>

        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>

        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" ></a>



        </td>

        </tr>
        </table>
        
<div>

<?

}

if ($escolha=="GRAVA1"){

                                 $programa=$_POST['programa'];

	  $query = "DELETE FROM usuario_grupo_bi where cd_usuario='$usuario' and cd_grupo='$grupo' and cd_empresa='$empresa'";
      $result = $conn->Execute($query);
      $erromostra=$conn->ErrorMsg();
      require("logerrobi.php");
   
}
require"rodapegravacao.php";
?>
</form>


