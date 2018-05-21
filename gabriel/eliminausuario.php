<?
ini_set('display_errors', '0');// NÃO HABILITAD

$nomeempresaconexao = $_SESSION['nomeempresaconexao'];

require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form action="eliminausuario.php" name="teste" method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <? require("areasuperior2.php");
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
    $titulojanela = "Eliminando Frota";


    ?>
    <div id="novoscadastros1" class="mostraCaixa">

        <input type="hidden" name="continuarmesmatela" size="5" value="sim">
        <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
        <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
        <input type="hidden" name="escolha" size="5" value="GRAVA1">

        <div class="tituloCaixa" style="margin-top:70px"> Deseja Realmente Eliminar?</div>
        <br/>

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

            $programa = "INCLUIRUSUARIO.php";
            $ficartela = "nao";
            $escolha = "1";


            $query = "DELETE FROM usuario_grupo_bi where cd_usuario='$codigoachou'";
            $result = $conn->Execute($query);

            $query = "DELETE FROM usuario_bi where cd_usuario='$codigoachou'";
            $result = $conn->Execute($query);


            $erromostra = $conn->ErrorMsg();


            require("logerrobi.php");

        }

        ?>
    </div>

</form>


