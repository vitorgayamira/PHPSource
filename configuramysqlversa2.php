<?


$conexao= mysql_connect($hostname_https, $username_https,$password_https);

if (!$conexao) {
    die('Não foi possível conectar: ' . mysql_error());
}
//echo 'Conexão bem sucedida';
