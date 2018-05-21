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
?>

<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    <style type="text/css">
        #envolve {
            width: 1200px;
        }

        #div_1 {
            position: relative;
            width: 650px;
            height: 1200px;
            background-color: #CAE1FF;
            float: left;
            text-align: center;
            color: #E8E8E8;
        }

        #clear {
            clear: both;
        }

    </style>

    <?
    function somar_data($data, $dias, $meses, $ano)
    {
        $data = explode("/", $data);
        $resData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
        return $resData;
    }

    ?>

</head>

<meta http-equiv="refresh"
      content="30;URL=painelcorretivashopping.php?banco=<? echo $banco; ?>&codigousuario=<? echo $codigousuario; ?>&localbanco=<? echo $localbanco; ?>">

<form>

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <?
    if (!IsSet($mes)) {
        $mes = date('m');
    }

    if (!IsSet($ano)) {
        $ano = date('Y');
    }

    $codigoproximoregitro1 = "select MIN(CD_FABRICA) FROM  FABRICAS";
    $codigoproximoregitro2 = $conn->Execute($codigoproximoregitro1);
    $fabricapesquisa = $codigoproximoregitro2->fields["0"];

    require("areasuperior2.php");
    require("carregamenumilenionovo2.php");
    ?>

    <div class="titulogeral">Monitoramento Manutenção Unidade:<? echo $fabricapesquisa; ?></div>

    <div class="tituloCaixa">
        <img width=20 height=20 BORDER=0 src="legendamaximiza5.jpg">Maq.Parada
        <img width=20 height=20 BORDER=0 src="legendamaximiza2.jpg">Maq.Não Parada
        <img width=20 height=20 BORDER=0 src="legendamaximiza3.jpg">Em Andamento
        <img width=20 height=20 BORDER=0 src="legendamaximiza6.jpg">Fora do Limite de Atendimento
    </div>

    <hr>

    <?
    $passa1 = "1";
    $totalporlinha = "10";

    $codigoproximoregitro1 = "SELECT  count(*) CONTADOR
                      FROM   AUX_PAINEL_CORRETIVA_W a,EMER_COMP b
                      where a.NRORDEM=b.numero  and fabrica='$fabricapesquisa' and andamento  not in ('FINALIZADO')";


    $codigoproximoregitro2 = $conn->Execute($codigoproximoregitro1);
    while (!$codigoproximoregitro2->EOF) {
        $totalordens = $codigoproximoregitro2->fields["0"];
        $codigoproximoregitro2->MoveNext();
    }

    ?>

    <h1 style='font-size: 12px;color: black;text-align:center;bold: Negrito text-decoration: none'>Equipe Manutenção</h1>

    <table class="bordasimples tabela1">

            <tr>
                <?

                $achaordens1 = "SELECT  NRORDEM ,ANDAMENTO ,
                      MAQ_PARADA PARA,STATUS_ANDAMENTO_TIPO OBSERVACAO ,to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_COMPONENTE ,
                      NOME,MOTIVO,DESCRICAOCOMPONENTE
                      FROM   AUX_PAINEL_CORRETIVA_W WHERE NRORDEM in (select NUMERO FROM EMER_COMP ) and fabrica='$fabricapesquisa'
                      and andamento  not in ('FINALIZADO')  ORDER BY NRORDEM ASC";
                $achaordens2 = $conn->Execute($achaordens1);
                while (!$achaordens2->EOF)
                {

                $ordemmostra = $achaordens2->fields["NRORDEM"];
                $paradamostra = $achaordens2->fields["PARA"];
                $componentemostra = $achaordens2->fields["CD_COMPONENTE"];
                $andamento = $achaordens2->fields["ANDAMENTO"];
                $dataabertura = $achaordens2->fields["DATA"];
                $observacao = $achaordens2->fields["OBSERVACAO"];
                $nome66 = $achaordens2->fields["NOME"];
                $descricaomotivo = $achaordens2->fields["MOTIVO"];
                $descricacomponente = $achaordens2->fields["DESCRICAOCOMPONENTE"];


                if (($andamento == "NAO") OR ($andamento == "PARADO")) {
                    if ($paradamostra == "S") {
                        $cor = "red";
                    }
                    if ($paradamostra == "N") {
                        $cor = "yellow";
                    }
                    $dataaberturamostra = "";
                } else {
                    if ($paradamostra == "S") {
                        $cor = "#87CEEB";
                        //AZUL";

                    }
                    if ($paradamostra == "N") {
                        $cor = "yellow";

                    }

                    $dataaberturamostra = $dataabertura;
                }

                $achaordens3 = "SELECT  to_char(DATA_INICIO,'dd/mm') DATA,HORA_INICIO,MINUTO_INICIO,
                        cd_mao GRUPO FROM
                        EMER_COMP WHERE NUMERO='$ordemmostra'";
                $achaordens4 = $conn->Execute($achaordens3);
                while (!$achaordens4->EOF) {

                    $dataabertura = $achaordens4->fields["DATA"];
                    $horaabertura = $achaordens4->fields["HORA_INICIO"];
                    $minutoabertura = $achaordens4->fields["MINUTO_INICIO"];
                    $grupo = $achaordens4->fields["GRUPO"];
                    $aberturamostra = $dataabertura . "->" . $horaabertura . ":" . $minutoabertura;
                    $achaordens4->MoveNext();
                }
                ?>

                <td bgcolor="<? echo $cor; ?>" width="100" height="140" valign="top">

                    <h1 style='font-size: 15px;color: black;text-align:left;bold: Negrito text-decoration: none'>
                        <? echo "$ordemmostra<br/>"; ?>
                        <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
                            <? echo "$descricacomponente<br/>"; ?>
                            <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><? echo "$aberturamostra<br/>"; ?>
                                <h1 style='font-size: 12px;color: black;text-align:left;bold: Negrito text-decoration: none'>
                                    <? echo "$descricaomotivo<br/>"; ?><? echo "$nome66<br/>"; ?>
                                    <h1 style='font-size: 11px;color: black;text-align:left;bold: Negrito text-decoration: none'><? echo "$dataaberturamostra"; ?>
                </td>
                <?
                IF ($passa1 == $totalporlinha){
                $passa1 = "0"; ?></tr>
            <tr><?
                }
                IF ($passa1 == $totalordens){
                ?></tr><?
            }

            $passa1 = $passa1 + 1;

            $achaordens2->MoveNext();
            }//FINALDA ORDEM
            ?>


        </table>

</form>


