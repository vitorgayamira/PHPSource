<?
ini_set('display_errors', '0');// NÃƒO HABILITAD 

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

$navegando = $_GET['navegando'];
$continuarmesmatela = $_POST['continuarmesmatela'];

if ($navegando == "sim") {
    $escolha = $_GET['escolha'];
    $pagina_atual = $_GET['pagina_atual'];
    $grafico1 = $_GET['grafico1'];
    $grafico2 = $_GET['grafico2'];
    $programa = $_GET['programa'];
}

if ($continuarmesmatela == "sim") {
    $escolha = $_POST['escolha'];
    $grafico1 = $_POST['grafico1'];
    $programa = $_POST['programa'];
    $solicitantepesquisa = $_POST['solicitantepesquisa'];

}

require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$tamanhojanela = "janelagrandeconsumo";

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form action="classegraficomaximiza1.php" method="POST" name="nome_formulario">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <? require("areasuperior2.php");

      require("carregamenumilenionovo2.php");
    ?>

    <?
    if ($escolha == "pesquisadografico") {
        ?>

        <div class="mostraCaixa" id="telapesquisagrafico">
            <div class="tituloCaixa">Defina Parâmetros para Geração de Gráficos</div>
            <br/><br/>
            <table class="letraCaixa">
                <tr>
                    <td>
                        Unidade
                    </td>
                    <td>

                        <select name="solicitantepesquisa">
                            <?
                            $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                                $result3->MoveNext();
                            }

                            ?>

                        </select>
                    </td>
                </tr>

            </table>

            <br/>

            <div id="divBotoes">
                <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                       onclick="window.location='<? echo $programa; ?>'">
                <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                       onclick="document.forms[0].submit();return false;">
            </div>

            <input type="hidden" name="escolha" size="5" value="mostragrafico">
            <input type="hidden" name="continuarmesmatela" value="sim">
            <input type="hidden" name="grafico1" value="<? echo $grafico1; ?>">
            <input type="hidden" name="programa" value="<? echo $programa; ?>">

        </div>
    <? }//FIAL DA PESQUISA

    if ($escolha == "mostragrafico") {

        $passa1 = "delete from aux_grafico";
        $result = $conn->Execute($passa1);
        $mes = date('m');
        $year = date('Y');

        $acha5 = "SELECT TO_CHAR(DT_AVALIACAO,'DD') DATA ,VL_INDICADOR from
IND_PLANEJAMENTO_MANUTENCAO where cd_fabrica='$solicitantepesquisa' and TO_CHAR(DT_AVALIACAO,'MM')='$mes' and TO_CHAR(DT_AVALIACAO,'YYYY')='$year' order by DATA ASC";
        $result7 = $conn->Execute($acha5);
        while (!$result7->EOF) {
            $parcial = $result7->fields["1"];

            $dia7 = $result7->fields["0"];
            $parcial = str_replace(",", ".", "$parcial");

            $sql88re = "INSERT into aux_grafico(dia,vl_coluna2)
                          values('$dia7',$parcial) ";

            $result = $conn->Execute($sql88re);


            $valortotal = $valortotal + $parcial;
            $result7->MoveNext();
        }


        ?>

        <div id="janelagrandeconsumo">

            <div class="titulogeral">% de Atrasos Versus Total Planejado</div>
            <br/>
            <img class="imgGrafico" src="<? echo $grafico1; ?>">

        </div>

        <div id="divBotoes">
            <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho" style="margin-left:50px;"
                   onclick="window.location='<? echo $programa; ?>'">
        </div>

    <? }//FIAL DA mostar grafico
    ?>
</form>
</body>
</html>