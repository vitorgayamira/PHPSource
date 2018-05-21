<?
//session_start();
$cortopo="#828282";
$corfundo="#4682B4";


require("estilo2.css");
require("estilonavegacaofundo.css");
$cliente=$_GET['cliente'];
$baseoracle=$_GET['baseoracle'];
$localbanco=$_GET['localbanco'];


?>
<body>
<form action="sitemaximiza2.php" method="POST">
</br></br></br></br><center>
<?


if (!IsSet($cliente)){
echo "Não foi Possível Acesso verifique o caminho";

}
else
{
echo "Banco de Conexao:$cliente";
?>

<input type="hidden" name="ambiente" value="oracle">
<input type="hidden" name="continuarmesmatela" value="sim">
<input type="hidden" name="cliente" value="<?echo $cliente;?>">
<input type="hidden" name="banco" value="<?echo $baseoracle;?>">
<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">


<input  type="submit"   value="Acessar"></br></br></br>
<img width=690 height=460 BORDER=0 src="capamaximiza.jpg" >
<?}?>
</form>
</body>



   

  
  
  
  
  
   
