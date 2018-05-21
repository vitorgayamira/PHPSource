<?
/************************************************************************
SISTEMA .........: Trabalhando com  a classe ADODB               
BY ..............: Júlio César Martini - baphp@imasters.com.br   
SITE ............: iMasters - http://www.imasters.com.br         
CRIADO EM .......: 05/04/2005
************************************************************************/

//PATH ONDE SE ENCONTRA A CLASSE ADODB       
include("c:\\pagina\\adodb\\adodb.inc.php"); 

//DADOS PARA CONEXÃO 
$bd   = "mysql";     
$host = "127.0.0.1"; 
$user = "root";      
$pass = "";          
$db   = "imasters";  

//EFETUA A CONEXÃO                   
$db = NewADOConnection($bd);         
$db->connect($host,$user,$pass,$db); 
?> 