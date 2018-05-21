<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");
?>

<form action="eliminausuario.php"  name="teste"  method="POST" >
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


if ($continuarmesmatela=="sim"){
$escolha=$_POST['escolha'];
$programa=$_POST['programa'];
$nomecolunaparapassar=$_POST['nomecolunaparapassar'];
$codigoachou=$_POST['codigoachou'];
$nomecolunaparapassaracao=$_POST['nomecolunaparapassaracao'];
$nometabelaparapassar=$_POST['nometabelaparapassar'];


}

if ($escolha=="elimina"){
$titulojanela="Eliniando Frota";




?>
<div  style="display: block;" id="novoscadastros1">


        <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
       	<input type="hidden" name="escolha" size="5" value="GRAVA1" >


        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        Eliminando Usuários
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>

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

<?

}

if ($escolha=="GRAVA1"){

$programa="INCLUIRUSUARIO.php";
$ficartela="nao";
$escolha="1";


  $query = "DELETE FROM usuario_grupo_bi where cd_usuario='$codigoachou'";
  $result = $conn->Execute($query);

  $query = "DELETE FROM usuario_bi where cd_usuario='$codigoachou'";
  $result = $conn->Execute($query);
  


  $erromostra=$conn->ErrorMsg();

  
  require("logerrobi.php");

}

?>
<div>



</form>


