<?php
require(".\ADODB\adodb519\adodb.inc.php");
class Conexao
{
    

    /**
     * M�todo respons�vel por conectar no banco
     */
    public function Conecta()
    {

	    
	



//EFETUA A CONEX�O
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
