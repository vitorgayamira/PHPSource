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


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form action="<?= $PHP_SELF ?>" method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <?
    require("areasuperior2.php");
    require("carregamenumilenionovo2.php");

    $programa = $_GET['programa'];
    $escolha = $_GET['escolha'];
    $continuarmesmatela = $_POST['continuarmesmatela'];
    $chacontadorgeral = $_GET['chacontadorgeral'];
    $numerocolunastela = $_GET['numerocolunastela'];
    $codigoachou = $_GET['codigoachou'];

    $nomecolunaparapassar = $_GET['nomecolunaparapassar'];
    $nometabelaparapassar = $_GET['nometabelaparapassar'];
    $nomecolunaparapassaracao = $_GET['nomecolunaparapassaracao'];
    $titulojanelaelimina = $_GET['titulojanelaelimina'];
    $comanda = $_GET['comanda'];

    $usuario = $_GET['usuario'];
    $grupo = $_GET['grupo'];
    $empresa = $_GET['empresa'];


    if ($continuarmesmatela == "sim") {
        $escolha = $_POST['escolha'];
        $programa = $_POST['programa'];
        $nomecolunaparapassar = $_POST['nomecolunaparapassar'];
        $codigoachou = $_POST['codigoachou'];
        $nomecolunaparapassaracao = $_POST['nomecolunaparapassaracao'];
        $nometabelaparapassar = $_POST['nometabelaparapassar'];
        $comanda = $_POST['comanda'];


        $codigoachoulocal = $_POST['codigoachoulocal'];
        $sequenciacomanda = $_POST['sequenciacomanda'];

    }

    if ($escolha == "elimina"){
    $titulojanela = "Eliniandoa";
    $acoagravacao = "sim";


    ?>
    <div id="novoscadastros1" class="mostraCaixa">

        <input type="hidden" name="escolha" size="5" value="<? echo "GRAVA1"; ?>">
        <input type="hidden" name="continuarmesmatela" size="5" value="sim">
        <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<? echo $nomecolunaparapassar; ?>">
        <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<? echo $nomecolunaparapassaracao; ?>">
        <input type="hidden" name="nometabelaparapassar" size="5" value="<? echo $nometabelaparapassar; ?>">
        <input type="hidden" name="usuario" size="5" value="<? echo $usuario; ?>">
        <input type="hidden" name="grupo" size="5" value="<? echo $grupo; ?>">
        <input type="hidden" name="empresa" size="5" value="<? echo $empresa; ?>">
        <input type="hidden" name="codigoachoulocal" size="5" value="<? echo $codigoachoulocal; ?>">

        <br/>
        <div class="tituloCaixa" style="margin-top:75px;">Deseja Realmente Eliminar?</div>
        <br/>

        <div id="divBotoes">
            <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                   onclick="window.location='<? echo $programa; ?>'">
            <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                   onclick="document.forms[0].submit();return false;">
        </div>

    </div>

            <?

            }

            if ($escolha == "GRAVA1") {

                $programa = $_POST['programa'];

                $query = "DELETE FROM usuario_grupo_bi where cd_usuario='$usuario' and cd_grupo='$grupo' and cd_empresa='$empresa'";
                $result = $conn->Execute($query);
                $erromostra = $conn->ErrorMsg();
                require("logerrobi.php");

            }
            ?>
</form>


