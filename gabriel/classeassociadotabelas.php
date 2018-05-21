<?

$edusuario = $_SESSION['edusuario'];
$codigoempresa = $_SESSION["codigoempresa"];
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
    $chacontadorgeralupdate = $_GET['chacontadorgeralupdate'];
    $titulojanelaassociacao1 = $_GET['titulojanelaassociacao1'];
    $seelctcampolista2 = $_GET['seelctcampolista2'];
    $seelctcampolista1 = $_GET['seelctcampolista1'];
    $campolista2 = $_GET['campolista2'];
    $campolista1 = $_GET['campolista1'];
    $nometabelaassociativa1 = $_GET['nometabelaassociativa1'];
    $ordenaatual = $_GET['ordenaatual'];
    $numerocolunastela = $_GET['numerocolunastela'];


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
        $nometabelaassociativa1 = $_POST['nometabelaassociativa1'];


    }

    IF ($programa == "FUNCAO.php") {
        $tamanhojanela = "janelagrande2";


    } else {
        $tamanhojanela = "novoscadastros1";

    }

    if ($escolha == "associatabelas") {

        $sqlnovo = $seelctcampolista1;
        $rsRegistro8 = $conn->Execute($sqlnovo);

        for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
            $obj = $rsRegistro8->FetchField($i);
            $Campos2[] = $obj->name;
        }


        $sqlnovo = $seelctcampolista2;


        $rsRegistro8 = $conn->Execute($sqlnovo);

        for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
            $obj = $rsRegistro8->FetchField($i);
            $Campos3[] = $obj->name;
        }


        ?>

        <div class="titulogeral"><? echo $titulojanelaassociacao1; ?> </div>
        <br/>
        <div class="camposAssociacao">
            <table>

                <tr>
                    <th>Grupo Usuário:</th>

                    <td><select name="campogravapaiposicao1">
                            <option value="">Todos</option>
                            <?
                            $stmt1 = "SELECT CODIGO Grupo_Usuário ,DESCRICAO from grupo_usuario_bi";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}-{$result3->fields["2"]}</option>";


                                $result3->MoveNext();
                            }
                            ?>
                        </select></td>
                </tr>

                <tr>
                    <th>Pasta:</th>

                    <td><select name="campogravapaiposicao2">
                            <option value="">Todos</option>
                            <?
                            $stmt1 = "SELECT CD_PASTA Pasta,DS_PASTA from pasta_menu_bi";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}-{$result3->fields["2"]}</option>";


                                $result3->MoveNext();
                            }
                            ?>
                        </select></td>
                </tr>


            </table>

        </div>
        <br/><br/>

        <div style="overflow-y: scroll; height: 50%;">
            <table class="tabela1">
                <tr>
                    <?

                    $rsRegistro8AT = $conn->Execute($chacontadorgeral);


                    for ($iAT = 0; $iAT < $rsRegistro8AT->FieldCount(); $iAT++) {

                        $obj = $rsRegistro8AT->FetchField($iAT);
                        $CamposAT[] = $obj->name;
                    }

                    //Instancio a classe de manipulação
                    $s = new ManipulaSql();

                    for ($iAT2 = 0; $iAT2 < $rsRegistro8AT->FieldCount(); $iAT2++) {
                        ?>
                        <th><a class="linkTabela"
                               href="classeassociadotabelas.php?pagina=1&escolha=associatabelas&programa=<? echo $programa; ?>&navegando=sim&ordenaatual=<? echo $CamposAT[$iAT2]; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&titulojanelaassociacao1=<? echo $titulojanelaassociacao1; ?>&nometabelaassociativa1=<? echo $nometabelaassociativa1; ?>"">
                            <? echo $s->mostralabel($CamposAT, $iAT2); ?></a></th>
                        <?
                    }
                    ?>
                    <th>Seleciona</th>
                </tr>
                <?

                if ($ordenaatual != "") {
                    $chacontadorgeral .= " ORDER BY a." . $ordenaatual;
                } else {
                    $chacontadorgeral .= " ORDER BY a.ds_funcao";
                }

                $classe = "1";

                $s->Seleciona($chacontadorgeral);

                if (!empty($s->content)) {
                    foreach ($s->content as $v) {
                        $classe = ($classe == "1") ? "2" : "1";
                        ?>
                        <tr class="tabelaLinha<? echo $classe; ?>">
                            <?
                            for ($i2 = 0; $i2 < $numerocolunastela; $i2++) {
                                ?>
                                <td><? echo $v[$i2]; ?></td>
                                <?
                            }
                            ?>
                            <td><input type="checkbox" name="campogravapaiposicao3[]" value="<? echo $v[0]; ?>">
                            </td>


                        </tr>
                        <?
                    }
                }
                ?>
            </table>

        </div>

        <br/>
        <div id="divBotoes">
            <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                   onclick="window.location='<? echo $programa; ?>'">
            <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                   onclick="document.forms[0].submit();return false;">
        </div>

        <input type="hidden" name="escolha" size="5" value="<? echo "GRAVA1"; ?>">
        <input type="hidden" name="continuarmesmatela" size="5" value="sim">
        <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<? echo $nomecolunaparapassar; ?>">
        <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<? echo $nomecolunaparapassaracao; ?>">
        <input type="hidden" name="nometabelaparapassar" size="5" value="<? echo $nometabelaparapassar; ?>">

        <input type="hidden" name="numerocolunastela" size="5" value="<? echo $numerocolunastela; ?>">
        <input type="hidden" name="chacontadorgeral" size="5" value="<? echo $chacontadorgeral; ?>">
        <input type="hidden" name="chacontadorgeralupdate" size="5" value="<? echo $chacontadorgeralupdate; ?>">
        <input type="hidden" name="chacontadorgeralinsert" size="5" value="<? echo $chacontadorgeralinsert; ?>">
        <input type="hidden" name="nometabelaassociativa1" size="5" value="<? echo $nometabelaassociativa1; ?>">

        <?
    }

    if ($escolha == "GRAVA1") {


        $campogravapaiposicao2 = $_POST['campogravapaiposicao2'];
        $campogravapaiposicao1 = $_POST['campogravapaiposicao1'];
        $campogravapaiposicao3 = $_POST['campogravapaiposicao3'];


        $campogravapaiposicao1grava = $campogravapaiposicao1[0];
        $campogravapaiposicao2grava = $campogravapaiposicao2[0];


        $sub66S = "SELECT count(*) CONTADOR  from funcao_bi";
        $result5nome586S = $conn->Execute($sub66S);
        while (!$result5nome586S->EOF) {

            $totalr = $result5nome586S->fields["0"];
            $result5nome586S->MoveNext();
        }


        for ($i87 = 0; $i87 < $totalr; $i87++) {
            $campogravafinal = $campogravapaiposicao3[$i87];


            if ($campogravafinal > "0") {

                if ($nometabelaassociativa1 == "funcao_grupo_bi") {

                    $usu18ussm = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM funcao_grupo_bi";
                    $resultussm = $conn->Execute($usu18ussm);
                    while (!$resultussm->EOF) {
                        $sequencia = $resultussm->fields["SEQUENCIA"];
                        IF ($sequencia > "0") {
                            $sequencia = $sequencia + 1;
                        } ELSE {
                            $sequencia = "1";
                        }

                        $resultussm->MoveNext();
                    }

                    $camposgravainsert = "insert into funcao_grupo_bi (nr_sequencia,cd_empresa,cd_grupo,cd_funcao,cd_pasta,id_select,id_atualizar)
		values('$sequencia','$codigoempresa','$campogravapaiposicao1','$campogravafinal','$campogravapaiposicao2','S','S')";


                    $result = $conn->Execute($camposgravainsert);
                    $escolha = "1";
                    $erromostra = $conn->ErrorMsg();
                }//quano tabela é funcao grupo

            }


        }

        require("logerrobi.php");


    }

    ?>
    </table>


</form>


