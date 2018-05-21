<?
/************************************************************************
SISTEMA .........: Trabalhando com  a classe ADODB               
BY ..............: Júlio César Martini - baphp@imasters.com.br   
SITE ............: iMasters - http://www.imasters.com.br         
CRIADO EM .......: 05/04/2005
************************************************************************/

//PATH ONDE SE ENCONTRA A CLASSE ADODB       
include("c:\\pagina\\adodb\\adodb.inc.php"); 

//EFETUA A CONEXÃO                                      
$conn = NewADOConnection("mysql");                      
$conn->connect("localhost","root", "", "imasters");     

//SQL
$sql = "
       SELECT ID, NOME, ASSUNTO
	   FROM   colunistas";

//EXECUTA O SQL
$result = $conn->Execute($sql);

//VERIFICA SE FOI EXECUTADO COM SUCESSO
if (!$result) {
	$msg = $conn->ErrorMsg();
}
else { 
   //EXIBINDO OS DADOS ?>
   <table border="1" cellpading="0" cellspacing="0" width="90%">
   <tr>
      <td width="10%">ID</td>
      <td width="30%">Colunista</td>
      <td width="50%">ASSUNTO</td>
   </tr>  
   <?
   while ( !$result->EOF) { ?>
      <tr>
         <td width="10%"><? echo $result->fields[0]; ?></td>
	     <td width="30%"><? echo $result->fields[1]; ?></td>
	     <td width="50%"><? echo $result->fields[2]; ?></td>
      </tr>  
      <?
      $result->MoveNext();
   }//FECHA WHILE ?>
   </table>
<? } //FECHA ELSE ?> 