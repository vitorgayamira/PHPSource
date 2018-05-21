<?




//if ($navegando=="sim"){
//$banco=$_GET['banco'];
//}
//ELSE
//{
//$banco=$_POST['banco'];

//}



ob_implicit_flush(true);
ob_end_flush();


if (!$conexao = mysql_connect('server', 'root', 'di2040')) {


    echo 'Não foi possível conectar ao mysql';
    exit;
}

//if (!mysql_select_db($banco, $conexao)) {
    //echo 'Não foi possível selecionar o banco de dados';
   // exit;
//}

       //$conexao =mysql_connect("localhost", "root", $mypasswd);
	   //$conexao =mysql_connect("localhost", "root","avai");

?>
