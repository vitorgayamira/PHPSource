<?


$conexao= mysql_connect($hostname_https, $username_https,$password_https);

if (!$conexao) {
    die('N�o foi poss�vel conectar: ' . mysql_error());
}
//echo 'Conex�o bem sucedida';
