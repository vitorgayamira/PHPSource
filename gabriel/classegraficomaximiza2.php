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

    $data1 = $_GET['data1'];
    $data2 = $_GET['data2'];
    $fabrica = $_GET['fabrica'];
    $area = $_GET['area'];
    $secao = $_GET['secao'];
    $centro = $_GET['centro'];
    $maquina = $_GET['maquina'];


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
    <?

    require("areasuperior2.php");
    require("carregamenumilenionovo2.php");

    if ($escolha == "pesquisadografico") {
        ?>

        <div style="display: block;" id="telapesquisagrafico">
            Defina Parâmetros para Geração de Gráficos<br/>

            <br/><br/><br/>

            <table>

                <tr>
                    <td>
                        Unidade
                    </td>
                    <td>

                        <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;">
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
            <input type="hidden" name="escolha" size="5" value="mostragrafico">
            <input type="hidden" name="continuarmesmatela" value="sim">
            <input type="hidden" name="grafico1" value="<? echo $grafico1; ?>">
            <input type="hidden" name="programa" value="<? echo $programa; ?>">
            <a href="#" onclick="document.forms[0].submit();return false;">
                <IMG src="okmensagem.png" width="62" height="45" align="center"></a>


        </div>
    <? }//FIAL DA PESQUISA

    if ($escolha == "mostragrafico") {

        $passa1 = "delete from aux_grafico";
        $result = $conn->Execute($passa1);
        $mes = date('m');
        $year = date('Y');
        $contadorpega = "0";
        $acha5 = "SELECT cd_equipamento,DISP_01,NVL(MINIMO_DISP,85),DS_EQUIPAMENTO FROM MTBF ORDER BY DISP_01  asc";
        $result7 = $conn->Execute($acha5);
        while (!$result7->EOF) {

            $diponibilidade1 = $result7->fields["1"];
            $maquina1 = $result7->fields["0"];
            $maquina2 = $result7->fields["3"];


            $diponibilidade1 = str_replace(",", ".", "$diponibilidade1");
            if ($contadorpega < "20") {


                $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$diponibilidade1,'$maquina2') ";

                $result = $conn->Execute($sql88re);
            }
            $contadorpega += 1;

            $result7->MoveNext();
        }


        ?>


        <div id="janelagrandeconsumo">

            <?
            $acha5logo = "SELECT ds_logomarca from pessoa_bi where id_matriz='S'";
            $acha5logo2 = $conn->Execute($acha5logo);
            $logomarcamostra = $acha5logo2->fields["0"];
            $diahoje = date('d');
            $meshoje = date('m');
            $anohoje = date('Y');

            $datapesquisahoje = $diahoje . "/" . $meshoje . "/" . $anohoje;


            ?>
            <div class="titulogeral">Disponibilidade de Equipamentos(%) <? //echo $datapesquisahoje; ?></div>


            <br/>
            <?
            $acha5para77 = "SELECT distinct ds_usuario,TO_CHAR((dt_geracao),'DD/MM/YYYY')   from parametro_grafico where ds_programa='$programa'";
            $result7para77 = $conn->Execute($acha5para77);

            $nomeusuarioacha = $result7para77->fields["0"];
            $dataacha = $result7para77->fields["1"];


            $acha5para = "SELECT ds_parametro,vl_parametro,ds_usuario  from parametro_grafico where ds_programa='$programa' and vl_parametro not in ('0')
order by nr_sequencia asc";
            $result7para = $conn->Execute($acha5para);
            while (!$result7para->EOF) {
                $nomeparametro = $result7para->fields["0"];
                $valorparametro = $result7para->fields["1"];
                $result7para->MoveNext();
            }

            $recuminimo18 = "SELECT  distinct MINIMO_DISP  FROM MTBF";
            $recuminimo28 = $conn->Execute($recuminimo18);
            $minimolegenda = $recuminimo28->fields["0"];

            ?>
            <table class="cabecalhoTabela">
                <tr>
                    <td>Usuário Geração: <? echo $nomeusuarioacha ?> - Data Geração: <? echo $dataacha; ?></td>
                    <td> <? echo $nomeparametro . ":" . $valorparametro ?> </td>
                </tr>
                <tr>
                    <td>
                        <img src="legendaazul.png">Disponibilidade <img src="legendavermelho.png">Disponibilidade
                        Mínima-><? echo $minimolegenda; ?>(%)
                    </td>
                </tr>

            </table>

            <?
            ?>
            <br/>

            <img src="<? echo $grafico1; ?>" style="height:45%; width:80%; margin-left:10%;">


            <table class="tabela1">
                <tr>
                    <th>Codigo</th>
                    <th>Equipamento</th>
                </tr>
                <?


                $sacha = "select a.vl_coluna3,a.vl_coluna4 FROM aux_grafico a order by a.vl_coluna2 asc ";


                $smpegaaux2 = $conn->Execute($sacha);
                $classe = "1";

                while (!$smpegaaux2->EOF)
                {
                $classe = ($classe == "1") ? "2" : "1";

                ?>
                <tr class="tabelaLinha<? echo $classe; ?>">
                    <td><? echo $smpegaaux2->fields["0"]; ?></td>
                    <td><? echo $smpegaaux2->fields["1"]; ?></td>

                    <? $smpegaaux2->MoveNext();
                    } ?>
                </tr>
            </table>
        </div>

    <? }//FIAL DA mostar grafico
    ?>
</form>
