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
        <img src="logo_maximiza.png" id="logo_maximiza"> </img>
    </div>

    <? require("areasuperior2.php");
    require("carregamenumilenionovo2.php");
    ?>

    <div id="telapesquisa">
        <?

        $programa = $_GET['programa'];
        $escolha = $_GET['escolha'];
        $continuarmesmatela = $_POST['continuarmesmatela'];
        $passapesquisainicial = $_GET['passapesquisainicial'];
        $numerocolunastela = $_GET['numerocolunastela'];
        $codigoachou = $_GET['codigoachou'];
        $nomecolunaparapassar = $_GET['nomecolunaparapassar'];
        $nometabelaparapassar = $_GET['nometabelaparapassar'];
        $nomecolunaparapassaracao = $_GET['nomecolunaparapassaracao'];
        $chacontadorgeralupdate = $_GET['chacontadorgeralupdate'];
        $titulojanelapesquisa = $_GET['titulojanelapesquisa'];

        $seelctcampolista2 = $_GET['seelctcampolista2'];
        $seelctcampolista1 = $_GET['seelctcampolista1'];
        $campolista2 = $_GET['campolista2'];
        $campolista1 = $_GET['campolista1'];


        if ($continuarmesmatela == "sim") {
            $escolha = $_POST['escolha'];
            $programa = $_POST['programa'];
            $nomecolunaparapassar = $_POST['nomecolunaparapassar'];
            $codigoachou = $_POST['codigoachou'];
            $nomecolunaparapassaracao = $_POST['nomecolunaparapassaracao'];
            $nometabelaparapassar = $_POST['nometabelaparapassar'];
            $numerocolunastela = $_POST['numerocolunastela'];
            $chacontadorgeral = $_POST['chacontadorgeral'];
            $chacontadorgeralupdate = $_POST['chacontadorgeralupdate'];
            $passapesquisa = $_POST['passapesquisa'];
            $passapesquisainicial = $_POST['passapesquisainicial'];

            $nometabelaparapassar = $_POST['nometabelaparapassar'];
            $titulojanelapesquisa = $_POST['titulojanelapesquisa'];


        }


        if ($escolha == "pesquisa"){

        $passapesquisa = $passapesquisainicial . " and rownum=1";

        $rsRegistro8 = $conn->Execute($passapesquisa);
        $numerocolunastela = $rsRegistro8->FieldCount();


        for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {


            $obj = $rsRegistro8->FetchField($i);
            $Campos[] = $obj->name;
        }


        ?>
        <br/><br/>

        <div class="mostraCaixa">

            <br/>

            <div class="tituloCaixa"> Parametros de Consulta</div>
            <br/>

            <table class="letraCaixa">
                <?
                $s = new ManipulaSql();
                $s->Seleciona($passapesquisa);
                if (!empty($s->content))
                {


                foreach ($s->content as $v) {


                    for ($i2 = 0; $i2 < $numerocolunastela; $i2++) {


                        $s->mostralabel($Campos, $i2);
                        $mostralabelfinal = $s->mostralabel($Campos, $i2);
                        ?>
                        <tr>
                            <td width="15%"><? echo $mostralabelfinal; ?></td>
                            <?
                            if (($i2 == $campolista1) or ($i2 == $campolista2)) {

                                if ($i2 == $campolista1) {
                                    ?>
                                    <td width="65%"><select name="campograva[]">
                                            <option value="">Todos</option>
                                            <?
                                            $stmt1 = $seelctcampolista1;
                                            $result3 = $conn->Execute($stmt1);
                                            while (!$result3->EOF) {
                                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                                $result3->MoveNext();
                                            }
                                            ?>
                                        </select></td>
                                    <?
                                }
                                if ($i2 == $campolista2) {
                                    ?>
                                    <td width="65%"><select name="campograva[]">
                                            <option value="">Todos</option>
                                            <?
                                            $stmt1 = $seelctcampolista2;
                                            $result3 = $conn->Execute($stmt1);
                                            while (!$result3->EOF) {
                                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                                $result3->MoveNext();
                                            }
                                            ?>
                                        </select></td>
                                    <?
                                }

                            } else {

                                ?>
                                <td width="65%"><input type="text" name="campograva[]" value=""></td>
                                <?
                            }
                            ?>
                        </tr>

                        <?
                    }
                }
                ?>
            </table>
            <?


            }
            ?>

            <input type="hidden" name="escolha" size="5" value="<? echo "BUSCA1"; ?>">
            <input type="hidden" name="continuarmesmatela" size="5" value="sim">
            <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
            <input type="hidden" name="nomecolunaparapassar" size="5" value="<? echo $nomecolunaparapassar; ?>">
            <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
            <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<? echo $nomecolunaparapassaracao; ?>">
            <input type="hidden" name="nometabelaparapassar" size="5" value="<? echo $nometabelaparapassar; ?>">

            <input type="hidden" name="numerocolunastela" size="5" value="<? echo $numerocolunastela; ?>">
            <input type="hidden" name="chacontadorgeral" size="5" value="<? echo $chacontadorgeral; ?>">
            <input type="hidden" name="chacontadorgeralupdate" size="5" value="<? echo $chacontadorgeralupdate; ?>">
            <input type="hidden" name="passapesquisainicial" size="5" value="<? echo $passapesquisainicial; ?>">
            <input type="hidden" name="passapesquisa" size="5" value="<? echo $passapesquisa; ?>">
            <input type="hidden" name="titulojanelapesquisa" size="5" value="<? echo $titulojanelapesquisa; ?>">


            <br/>

            <div id="divBotoes">
                <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                       onclick="window.location='<? echo $programa; ?>'">
                <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                       onclick="document.forms[0].submit();return false;">
            </div>

            <?

            }

            if ($escolha == "BUSCA1") {


                $campograva = $_POST['campograva'];


                $sqlnovo = $passapesquisainicial;


                $rsRegistro8 = $conn->Execute($sqlnovo);

                for ($i8 = 0; $i8 < $rsRegistro8->FieldCount(); $i8++) {
                    $obj = $rsRegistro8->FetchField($i8);
                    $Campospega4[] = $obj->name;


                }

                $campowhere = "((";

                for ($i9 = 0; $i9 < $rsRegistro8->FieldCount(); $i9++) {
                    $camposinsertrecebe = $Campospega4[$i9];

                    $campogravainsertrecebe = $campograva[$i9];
                    $total = $rsRegistro8->FieldCount();


                    if ($i9 < $rsRegistro8->FieldCount()) {

                        if ($i9 == $rsRegistro8->FieldCount() - 1) {
                            $campowhere = $campowhere . $camposinsertrecebe . " like'%" . $campogravainsertrecebe . "%' ) or (" . $camposinsertrecebe . " is null))";
                        } else {

                            $campowhere = $campowhere . $camposinsertrecebe . " like'%" . $campogravainsertrecebe . "%' )or(" . $camposinsertrecebe . " is null)) and ((";


                        }
                    }


                }

                $query = $sqlnovo . " and " . $campowhere;


                $result = $conn->Execute($query);
                $escolha = "1";
                $erromostra = $conn->ErrorMsg();


                $rsRegistro8 = $conn->Execute($query);

                for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
                    $obj = $rsRegistro8->FetchField($i);
                    $Campos[] = $obj->name;
                }

                ?>

                <div class="divTabela1">

                    <div class="titulogeral"><? echo $titulojanelapesquisa; ?></div>

                    <table class="tabela1">
                    <tr>
                        <?
                        $s = new ManipulaSql();

                        for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
                            ?>
                            <th><? echo $s->mostralabel($Campos, $i); ?></th>
                            <?
                        }
                        ?>
                        <th width="5%">Deletar</th>

                    </tr>
                    <?

                    $classe = "2";

                    $s->Seleciona($query);
                    if (!empty($s->content)) {
                        foreach ($s->content as $v) {
                            $classe = ($classe == "2") ? "1" : "2";
                            ?>
                            <tr class="tabelaLinha<? echo $classe; ?>">
                                <?
                                for ($i2 = 0; $i2 < $rsRegistro8->FieldCount(); $i2++) {
                                    ?>
                                    <td><? echo $v[$i2]; ?></td>
                                    <?
                                } ?>

                                <td width="5%">
                                    <a href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorgeralelimina; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>">
                                        <IMG src="lixeiranova2.png" width="25" height="20"></a>
                                </td>


                            </tr>
                            <?
                        }
                        ?>
                        </table>

                    </div>


                    <?
                }

            }//final da busca


            ?>


        </div>


</form>


