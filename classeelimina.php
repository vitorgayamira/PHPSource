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

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelaelimina;?>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
<?


$sqlnovo=$chacontadorgeral." and ".$nomecolunaparapassar."=".$codigoachou;


$rsRegistro8 = $conn->Execute($sqlnovo);

for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++ )
{
$obj = $rsRegistro8->FetchField($i);
$Campos[] =$obj->name;
}




?>

<table border=0
 style='background:white;' width="80%">
<?
$s = new ManipulaSql();
$s->Seleciona($sqlnovo);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {
    ?>

        <?
        for($i2 = 0;$i2 < $numerocolunastela; $i2++){
        ?>
        <tr>
        <td><?echo $Campos[$i2];?></td>
        <td>----><?echo $v[$i2];?></td>

        </tr>

        <?}
    }
 ?>
 </table>
 <?


}
?>

        <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA1";?>" >
        <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<?echo $nomecolunaparapassar;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<?echo $nomecolunaparapassaracao;?>" >
        <input type="hidden" name="nometabelaparapassar" size="5" value="<?echo $nometabelaparapassar;?>" >
        



        </br></br></br></br>
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

$programa=$_POST['programa'];

  IF ($programa=="job.php"){
  
  
  $query = "DELETE FROM job_work where nr_job in(select nr_job from job where nr_sequencia='$codigoachou')";
  $result = $conn->Execute($query);
  
  $query = "DELETE FROM job_service where nr_job in(select nr_job from job where nr_sequencia='$codigoachou')";
  $result = $conn->Execute($query);
  
  $query = "DELETE FROM job_caracteristica where nr_job in(select nr_job from job where nr_sequencia='$codigoachou')";
  $result = $conn->Execute($query);
  
  $query = "DELETE FROM ".$nometabelaparapassar." where ".$nomecolunaparapassaracao."=".$codigoachou;
  $result = $conn->Execute($query);
  
  
  
  }
  else
  {
  $query = "DELETE FROM ".$nometabelaparapassar." where ".$nomecolunaparapassaracao."=".$codigoachou;
  
  $result = $conn->Execute($query);
  }
  
  
  
  $escolha="1";
  $erromostra=$conn->ErrorMsg();
  

  
  require("logerrobi.php");

}

?>
<div>



</form>


