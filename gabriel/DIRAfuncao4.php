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



<form action="DIRAfuncao4.php" method="POST">
<?
$entrada=$_POST['entrada'];

if (!IsSet($entrada)){

$sql99 = "SELECT CD_FUNCAO CODIGO1,DS_FUNCAO DESCRICAO,
         CD_PROGRAMA PROGRAMA,ID_FUNCAO_DBA DBA
         FROM
         FUNCAO_BI ";

?>

</br></br>
 <h1 style='font-size: 18px;color: green;text-align:left;bold: Negrito text-decoration: none'>Eliminando Registros</BR>
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="750">

<tr>
                <th >Codigo</th>
				<th >Função</th>
				<th>Excluir</th>
				

</tr>
 

<?





			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {
        	?>
			  
			        <tr>
                       
					<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $valor["DESCRICAO"];?></td>
				    
					<td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><?echo $valor["PROGRAMA"];?></td>
					<td ><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none'><input type="checkbox" name="LISTA[]" value="<?echo $valor["CODIGO1"];?>"></td>
  
					
					
					
					
                    
                    
					
					</tr><?
					
					
			 
			 
			 }
 
 ?>
 </table>
 
 <input type="hidden" name="entrada" size="5" value="<?echo "GRAVA";?>" >
  
  </br>
  <center><input type="submit"  onclick="Certeza2()" value="CONFIRMA" ></td>
  
 

  
 <?


}
else
{

$LISTA=$_POST['LISTA'];


         
         
         $achacontador = "SELECT COUNT(*) CONTADOR
         FROM
         FUNCAO_BI "; 
         
         $res = mysql_db_query($banco,$achacontador,$conexao);

         $valor6=mysql_fetch_array($res);
         $ultimo=$valor6["CONTADOR"];
		 
         
        
         
  
  
 for ($passa=0;$passa <=$ultimo;$passa++)
 {

 
 
 $gravafinal=$LISTA[$passa];
  ECHO "MOSTRA=$gravafinal</BR>";  

 if ($gravafinal >="0"){
 

 

   $sql = "DELETE FROM FUNCAO_GRUPO_BI WHERE CD_FUNCAO='$gravafinal'"; 
   //echo "$sql </br>";
 $res = mysql_db_query($banco,$sql,$conexao);
 
 $sql = "DELETE FROM FUNCAO_BI WHERE CD_FUNCAO='$gravafinal'"; 
 //echo "$sql </br>";
$res = mysql_db_query($banco,$sql,$conexao);






               
              
	
 }//final quando selecionou produto  		 			 
}//final do loop
echo "Final da Associação";
}
?>



</form>

