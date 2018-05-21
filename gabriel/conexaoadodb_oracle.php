<?
ini_set('display_errors', '0');// NÃO HABILITAD                    
//PATH ONDE SE ENCONTRA A CLASSE ADODB


require(".\ADODB\adodb519\adodb.inc.php");

$nomeempresaconexao = preg_replace("/\s+/", "_", $nomeempresaconexao);
$nomeempresaconexao = strtr($nomeempresaconexao, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
$nomeempresaconexao = strtoupper($nomeempresaconexao);//converte maiuscula
$nomeempresaconexao = ltrim($nomeempresaconexao);//tira espaco brancoapos e antes

if (empty($nomeempresaconexao))
{
?>
<div class="novoLogin"><? ECHO "É Necessário Definir Nome da Empresa , Deseja Nova Tentativa?";
    ?>
    <a href="index.php?navegando=sim&desconecta=nao&usuariomilenio=sim&bancopassa=<? echo $banco; ?>&novologin=nao&pedealterarsenha=sim"
       style="text-decoration:none;color: black;"><IMG src="imagens/proximo.png" width="20px" height="20px"></a>
    <?
    }
    else {

        if ($nomeempresaconexao == "MAKER") {
//DADOS PARA CONEXÃO
            $bd = "oci8";
            $host = "server";
            $user = "maker";
            $pass = "maker";
            $db = "xe";
            $razaoempresa = "Empresa MAKER";
        }

        if ($nomeempresaconexao == "KYLY") {
//DADOS PARA CONEXÃO
            $bd = "oci8";
            $host = "200.180.39.210";
            $user = "sadege";
            $pass = "sadege";
            $db = "XE";
            $razaoempresa = "EMPRESA KYLY";
        }

        if ($nomeempresaconexao == "PREDIAL") {
//DADOS PARA CONEXÃO
            $bd = "oci8";
            $host = "server";
            $user = "predial";
            $pass = "predial";
            $db = "xe";
            $razaoempresa = "Empresa Predial";
        }


        if ($nomeempresaconexao == "HENNINGS") {
//DADOS PARA CONEXÃO
            $bd = "oci8";
            $host = "server";
            $user = "hennings";
            $pass = "hennings";
            $db = "xe";
            $razaoempresa = "Empresa Hennings";
        }

        if ($nomeempresaconexao == "GERONIMO") {
//DADOS PARA CONEXÃO
            $bd = "oci8";
            $host = "server";
            $user = "geronimo";
            $pass = "geronimo";
            $db = "xe";
            $razaoempresa = "Empresa Geronimo";
        }


//EFETUA A CONEXÃO
        $conn = NewADOConnection($bd);
        $conn->connect($host, $user, $pass, $db);

        $mostraerro = $conn->ErrorMsg();


        if (empty($mostraerro)) {
        } else {
            print "Erro:" . $conn->ErrorMsg();
        }

    }


    ?>
</div>


