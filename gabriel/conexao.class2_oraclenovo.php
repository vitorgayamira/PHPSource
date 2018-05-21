<?php
require(".\ADODB\adodb519\adodb.inc.php");
class Conexao
{
    

    /**
     * Método responsável por conectar no banco
     */
    public function Conecta()
    {

	    
	



//EFETUA A CONEXÃO
$conn = NewADOConnection($bd);
$conn->connect($host,$user,$pass,$db);

    $mostraerro=$conn->ErrorMsg();


    if(empty($mostraerro) )
    {
    }
    else
    {
     print "Erro:".$conn->ErrorMsg();
    }


		 
		 
		 
		

    }

}
?>
