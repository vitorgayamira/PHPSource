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

    if ($continuarmesmatela == "sim") {
        $escolha = $_POST['escolha'];
        $programa = $_POST['programa'];
        $nomecolunaparapassar = $_POST['nomecolunaparapassar'];
        $codigoachou = $_POST['codigoachou'];
        $nomecolunaparapassaracao = $_POST['nomecolunaparapassaracao'];
        $nometabelaparapassar = $_POST['nometabelaparapassar'];
    }

    if ($escolha == "elimina"){
    $titulojanela = "Eliniando Frota";


    ?>
    <div id="novoscadastros1" class="mostraCaixa">

        <div class="tituloCaixa" style="margin-top:75px;">  Deseja Realmente Eliminar? </div>
        <br/>
        <?

        $sqlnovo = $chacontadorgeral . " and " . $nomecolunaparapassar . "=" . $codigoachou;

        $rsRegistro8 = $conn->Execute($sqlnovo);

        for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
            $obj = $rsRegistro8->FetchField($i);
            $Campos[] = $obj->name;
        }


        ?>

        <table class="letraCaixa">
            <?
            $s = new ManipulaSql();
            $s->Seleciona($sqlnovo);
            if (!empty($s->content))
            {
            foreach ($s->content as $v) {
                ?>

                <?
                for ($i2 = 0; $i2 < $numerocolunastela; $i2++) {
                    ?>
                    <tr>
                        <td><? echo $s->mostralabel($Campos , $i2); ?></td>
                        <td><input type="text" readonly disabled value="<? echo $v[$i2]; ?>"> </td>
                    </tr>

                <?
                }
            }
            ?>
        </table>
    <?
    }
    ?>

        <input type="hidden" name="escolha" size="5" value="<? echo "GRAVA1"; ?>">
        <input type="hidden" name="continuarmesmatela" size="5" value="sim">
        <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<? echo $nomecolunaparapassar; ?>">
        <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<? echo $nomecolunaparapassaracao; ?>">
        <input type="hidden" name="nometabelaparapassar" size="5" value="<? echo $nometabelaparapassar; ?>">


        <br/>

        <div id="divBotoes">
            <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                   onclick="window.location='<? echo $programa; ?>'">
            <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                   onclick="document.forms[0].submit();return false;">
        </div>

        <?

        }

        if ($escolha == "GRAVA1") {

            $programa = $_POST['programa'];


            $query = "DELETE FROM " . $nometabelaparapassar . " where " . $nomecolunaparapassaracao . "=" . $codigoachou;

            $result = $conn->Execute($query);


            $escolha = "1";
            $erromostra = $conn->ErrorMsg();


            require("logerrobi.php");

        }

        ?>
    </div>


</form>


