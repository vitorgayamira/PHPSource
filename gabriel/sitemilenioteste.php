<?php
//require("estiloapresentacao.css");
$cliente=$_GET['cliente'];
$baseoracle=$_GET['baseoracle'];


?>
<form action="milenio3.php" method="POST">
</br></br></br></br><center>
<?


if (!IsSet($cliente)){
echo "Não foi Possível Acesso verifique o caminho";

}
else
{


IF ($cliente=="frinal"){

require("estiloapresentacao.css");
?>

</br>Projeto:<select name="banco" size=1 >
<option value="frinal">Análise de Rendimento Frinal Alimentos</option>
</select>
<input type="hidden" name="ambiente" value="mysql">

<?}
IF ($cliente=="maximiza"){


require("estiloapresentacaomaximiza.css");
?>

</br>
Projeto:<select name="banco" size=1 >
<option value="maximiza">Maximiza Na Web</option>
</select>
<input type="hidden" name="ambiente" value="oracle">
<?

}


IF ($cliente=="milenio")
{
require("estiloapresentacao.css");
?>


</br>
Projeto:<select name="banco" size=1 >
<option value="fabrica_racao">Logística de Ração</option>
<option value="producao">Otimização Vendas - Aves</option>
<option value="producao">Otimização Processo de Apanha - Aves</option>
<option value="suino">Otimização  Vendas-Suinos</option>
<option value="leite">Otimização Vendas Laticínios</option>
<option value="montagem">Otimização Indústria Montagem</option>
<option value="GTFFOODS_CANCAO">Otimização do Processo de Apanha de Frangos</option>
<option value="importacao_teste">Comercio Exterior Importação</option>
<option value="frinal">Base teste Frinal Alimentos</option>
<option value="racaoagroveneto">Base Agroveneto Teste</option>
</select>
<input type="hidden" name="ambiente" value="mysql">
<?} ?>





	   <input type="hidden" name="continuarmesmatela" value="sim">
       <input type="hidden" name="cliente" value="<?echo $cliente;?>">
       <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">

       <input  type="submit"   value="Acessar">
<?}?>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?



IF ($cliente=="maximiza"){
?>
<center>Parceria MilenioConsult | Se desejar  visualizar nosso projeto
  <a href="#" onClick="window.open('Folder Otimizacao MilenioConsult.pdf','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=250')">Click aqui</a>
  ou <a href="http://186.202.46.98/sitemilenioteste.php?cliente=maximiza">Retornar</a>
<?
}
?>

</form>



   

  
  
  
  
  
   
