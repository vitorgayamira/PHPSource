<?
/************************************************************************
SISTEMA .........: Trabalhando com  a classe ADODB               
BY ..............: J�lio C�sar Martini - baphp@imasters.com.br   
SITE ............: iMasters - http://www.imasters.com.br         
CRIADO EM .......: 05/04/2005
************************************************************************/

//PATH ONDE SE ENCONTRA A CLASSE ADODB       
include("c:\\pagina\\adodb\\adodb.inc.php"); 

//EFETUA A CONEX�O                                      
$conn = NewADOConnection("mysql");                      
$conn->connect("localhost","root", "", "imasters");     

//SQL
$sql = "
       INSERT INTO colunistas (NOME, ASSUNTO) VALUES('BELTRANO', 'TESTE')";

//EXECUTA O SQL
$result = $conn->Execute($sql);

//VERIFICA SE FOI EXECUTADO COM SUCESSO
if (!$result) {
	$msg = $conn->ErrorMsg();
}

//VERIFICA
if($msg) {
   echo "ERRO!! Inclus�o n�o efetuada.";
}
else {
   echo "Parab�ns! Registro inclu�do.";
}
?>
