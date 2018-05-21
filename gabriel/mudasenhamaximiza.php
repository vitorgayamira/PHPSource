<?
ini_set('display_errors', '0');// NÃO HABILITAD 

$edusuario = $_SESSION['edusuario'];
$edsenha = $_SESSION["edsenha"];
$db = $_SESSION["db"];
$bd = $_SESSION["bd"];
$host = $_SESSION["host"];
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];

$codigoempresa = $_SESSION["codigoempresa"];
$razaoempresa = $_SESSION["razaoempresa"];
$nomepessoa4 = $_SESSION["nomepessoa4"];
$magemtopoinicial = $_SESSION["magemtopoinicial"];
$razaoempresa = $_SESSION['razaoempresa'];
$nomeempresaconexao = $_SESSION['nomeempresaconexao'];
$pagina_atual = $_GET['pagina_atual'];
$escolha = $_GET['escolha'];


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa = "mudasenhamaximiza.php";
$titulo = "Acesso de Usuário Por Unidade";
$programadelete = "classeeliminanaojob.php";


if (!IsSet($escolha)) {
    require("logtela.php");
}

$chacontadorgeral = "SELECT  a.nr_sequencia  from USUARIO_FABRICA a where a.nr_sequencia > 0 ";
$nometabelaparapassar = "USUARIO_FABRICA";

$nomecolunaparapassar = "a.nr_sequencia";
$nomecolunaparapassaracao = "nr_sequencia";


$navegando = $_GET['navegando'];
$continuarmesmatela = $_POST['continuarmesmatela'];

if ($navegando == "sim") {
    $contadorfabrica = $_GET['contadorfabrica'];
}

if ($continuarmesmatela == "sim") {
    $contadorfabrica = $_POST['contadorfabrica'];
    $etapa = $_POST['etapa'];
}


?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form action="mudasenhamaximiza.php" method="POST" name="formulario">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <?

    $navegando = $_GET['navegando'];
    $continuarmesmatela = $_POST['continuarmesmatela'];


    if ($navegando == "sim") {
        $dispminima = $_GET['dispminima'];

    }
    if ($continuarmesmatela == "sim") {

        $dispminima = $_POST['dispminima'];
        $esenha1 = $_POST['esenha1'];
        $esenha2 = $_POST['esenha2'];

    }


    if ($dispminima == "1") {

        $sql998se = "SELECT count(*) CONTADOR FROM usuario_bi where NM_USUARIO='$edusuario' and cd_senha='$esenha1'";
        $mostragrid177se = $conn->Execute($sql998se);
        $contador55 = $mostragrid177se->fields["CONTADOR"];


        if ($contador55 == "1") {


            $gravasen = "update usuario_bi  set cd_senha='$esenha2' where nm_usuario='$edusuario'";
            $resultussG77sen = $conn->Execute($gravasen);
            $programa = "index.php";
            $erromostra = $conn->ErrorMsg();
            require("logerrobi.php");


        } else {
            $programa = "index.php";
            $mensagem = "Senha Inválida";
            require("logerrobi.php");
        }


    }//FINAL DA GRAVACAO

    if ($dispminima == "0") {
        ?>

        <div style="display: block;" id="janelasenha" class="mostraCaixa">

            <br/><br/>
            <table id="tabela_login" class="letraCaixa">

                <input type="hidden" name="dispminima" size="5" value="1">
                <input type="hidden" name="continuarmesmatela" value="sim">

                <tr>
                    <td style="width:50%;">SENHA ATUAL</td>
                    <td><input name="esenha1" type="password" class="myinputstyle" value="" size="10">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;">SENHA NOVA</td>
                    <td><input name="esenha2" type="password" class="myinputstyle" value="" size="10" "/>
                    </td>
                </tr>
            </table>

            <br/>

            <div id="divBotoes">
                <input id="btn_voltar" type="button" onclick="window.location='index.php'" value="VOLTAR"
                       class="botaoVermelho">
                <input id="btn_senha" type="submit" onclick="document.forms[0].submit();return false;" value="AVANÇAR"
                       class="botaoVermelho">
            </div>

        </div>

    <? } ?>

</form>
</html>

