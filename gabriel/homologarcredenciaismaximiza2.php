<head>
    <style type="text/css">
        .nav, .nav ul {
            list-style: none;
            float: left;
        }

        .nav li {
            font-size: 14px;
            position: relative;
            margin-bottom: -1px;
        }

        .nav li:hover a {
            background-color: #CDCDC1;
        }

        .nav li:hover li a {
            background-color: #CDCDC1;
        }

        .nav li:hover li a:hover {
            background-color: white;
        }

        .nav li a {
            display: block;
            padding: 10px 0 10px 15px;
            height: 20px;
            width: 285px;
            border-bottom: 1px solid #cccccc;
            color: black;
            text-decoration: none;
        }

        .nav li a:hover {
            background: #CDCDC1;
        }

        .nav li ul {
            position: absolute;
            left: -99999px;
            z-index: 3;
        }

        .nav li:hover ul {
            padding: 0;
            top: 0;
            left: 285px;
        }
    </style>


</head>
<body>

<?
$navegando = $_GET['navegando'];
$continuarmesmatela = $_POST['continuarmesmatela'];
$solucaoinicial = $_GET['solucaoinicial'];


if ($navegando == "sim") {

    $razaoempresa = $_GET['razaoempresa'];


}

if ($continuarmesmatela == "sim") {


    $razaoempresa = $_POST['razaoempresa'];

}


//$razaoempresa="Empresa MAKER";


//CHAMA O MENU PELA CONEXAO


$edusuario = preg_replace("/\s+/", "_", $edusuario);
$edusuario = strtr($edusuario, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
//$edusuario=strtoupper($edusuario);//converte maiuscula
$edusuario = ltrim($edusuario);//tira espaco brancoapos e antes


$edsenha = preg_replace("/\s+/", "_", $edsenha);
$edsenha = strtr($edsenha, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
//$edsenha=strtoupper($edsenha);//converte maiuscula
$edsenha = ltrim($edsenha);//tira espaco brancoapos e antes


require("conexaoadodb_oracle.php");



$usu189NOMEco = "SELECT CODIGO FROM pessoa_bi
where descricao='$razaoempresa'  ";


$result = $conn->Execute($usu189NOMEco);
while (!$result->EOF) {

    $codigoempresa = $result->fields["CODIGO"];
    $result->MoveNext();
}


$sqlteste1 = "select count(*) CONTADOR from usuario_grupo_bi where cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario') and
cd_empresa=$codigoempresa ";


$result = $conn->Execute($sqlteste1);

$erromostra = $conn->ErrorMsg();

while (!$result->EOF) {

    $valor13teste = $result->fields["CONTADOR"];
    $result->MoveNext();
}


$sql2teste = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'
and
cd_empresa='$codigoempresa' ";

$result = $conn->Execute($sql2teste);
while (!$result->EOF) {

    $valor14teste = $result->fields["CONTADOR"];
    $result->MoveNext();
}


$usu189NOME = "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
$result = $conn->Execute($usu189NOME);
while (!$result->EOF) {

    $nomepessoa4 = $result->fields["NOME"];
    $result->MoveNext();
}


if ($valor13teste > "0" and $valor14teste > "0") {//testa se usuario é habilitado
    require("areasuperior2.php");
    require("carregamenumilenionovo2.php");
    ?>
    <input type="hidden" name="continuarmesmatela" value="sim">


    <?


    $_SESSION['edusuario'] = $edusuario;
    $_SESSION["edsenha"] = $edsenha;
    $_SESSION["db"] = $db;
    $_SESSION["bd"] = $bd;
    $_SESSION["host"] = $host;
    $_SESSION["user"] = $user;
    $_SESSION["pass"] = $pass;

    $_SESSION["codigoempresa"] = $codigoempresa;
    $_SESSION["razaoempresa"] = $razaoempresa;
    $_SESSION["nomepessoa4"] = $nomepessoa4;
    $_SESSION["magemtopoinicial"] = $magemtopoinicial;
    $_SESSION['razaoempresa'] = $razaoempresa;
    $_SESSION['nomeempresaconexao'] = $nomeempresaconexao;


} else {
    echo "USUÁRIO NAO HABILTADO PARA ACESSSAR ESTA EMPRESA";
}
?>


</body>




