<? 
require("configuramysql.php");
require("estilo33.css");
?>
<head>

<script language="javascript">

function Certeza2()
{
 if (!confirm ("Confirma" ))
 {
    
	return false;
 
 }
 else
 {
    document.getElementById('tipos').value = '6';
	document.getElementById('tipopagina').value = 'I';
	
	return true;
 }
}

function Certeza()
{
 if (!confirm ("Confirma" ))
 {
    
	
   document.getElementById('tipos').value = 'CANCELADO';
   return false;
 
 }
 else
 {
    
    document.getElementById('tipos').value = 'GRAVA';
	return true;
 }
}

function Certeza3()
{
 if (!confirm ("Confirma" ))
 {
    
	
   document.getElementById('tipos').value = '98';
   return false;
 
 }
 else
 {
    
    document.getElementById('tipos').value = '5';
	document.getElementById('tipopagina').value = 'I';
	
	return true;
 }
}


</script>
</head>



<form action="DIRAfuncao5.php" method="POST">
<?
$entrada=$_POST['entrada'];

if (!IsSet($tipos)){?>
<strong><h1 style='font-size: 19px;color: red;text-align:left;bold: Negrito text-decoration: none'>Manutenção</h1></BR>
                    Grupo:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">
					
					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM GRUPO_USUARIO_BI ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";
					 
					} 
					
					
					 ?>
					 </select>   
    
                   Função:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novafuncao">
					
					<?
					 
					    
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM FUNCAO_BI ";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_FUNCAO"]}\">{$valor["DS_FUNCAO"]}</option>";
					 
					} 
					 
					 ?>
					 </select>  
   Pasta:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novapasta">
					
					<?
					 
					$stmt1 = "SELECT CD_PASTA,DS_PASTA FROM  PASTA_MENU_BI";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_PASTA"]}\">{$valor["DS_PASTA"]}</option>";
					 
					} 
					
					 
					 ?>
					 </select> 

 
 
 
 <input type="hidden" name="tipos"  size="10" value="NOVOS">
 


<input  type="submit"   onclick="Certeza()" name="passa1"   style="font-size: 9px;color: BLACK;text-align:CENTER;bold: Negrito" VALUE="GRAVAR">

<?
}
ELSE
{
  if ($tipos=="NOVO"){?>

 <strong><h1 style='font-size: 19px;color: red;text-align:left;bold: Negrito text-decoration: none'>Manutenção</h1></BR>
                    Grupo:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">
					
					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM GRUPO_USUARIO_BI ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";
					 
					} 
					
					
					 ?>
					 </select>   
    
                   Função:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novafuncao">
					
					<?
					 
					    
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM FUNCAO_BI";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_FUNCAO"]}\">{$valor["DS_FUNCAO"]}</option>";
					 
					} 
					 
					 ?>
					 </select>  
   Pasta:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novapasta">
					
					<?
					 
					$stmt1 = "SELECT CD_PASTA,DS_PASTA FROM  PASTA_MENU_BI";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) { 
					 print "<option value=\"{$valor["CD_PASTA"]}\">{$valor["DS_PASTA"]}</option>";
					 
					} 
					
					 
					 ?>
					 </select> 


<input type="hidden" name="tipos" size="5" value="<?echo "GRAVA";?>" >


<input  type="submit"   onclick="Certeza()" name="passa1"   style="font-size: 9px;color: BLACK;text-align:CENTER;bold: Negrito" VALUE="GRAVAR">

<?
}

   if ($tipos=="GRAVA"){


$grava = "INSERT INTO FUNCAO_GRUPO_BI (CD_FUNCAO,CD_GRUPO,CD_PASTA,ID_SELECT,ID_ATUALIZAR) VALUES ('$novafuncao','$novogrupo','$novapasta','S','S')";
 //echo "$grava </br>";
$res = mysql_db_query($banco,$grava,$conexao);




?><center>
<input type="hidden" name="tipos" size="5" value="NOVO" >

<?ECHO "Gravado Registro</br>";
?>
<h1 style='font-size: 10px;color: green;text-align:left;bold: Negrito text-decoration: none'><a href="DIRAfuncao5.php?tipo=<?echo "NOVO";?>">Novo Registro</a>

<?
	}//final da gravacao


}//final da primeira tela

?>



</form>

