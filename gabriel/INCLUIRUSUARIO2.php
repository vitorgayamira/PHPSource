<?
ini_set('display_errors', '0');// N�O HABILITAD 

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
<form action="INCLUIRUSUARIO2.php" name="teste" method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <? require("areasuperior2.php");
    require("carregamenumilenionovo2.php");

    $continuarmesmatela = $_POST['continuarmesmatela'];


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
        $chacontadorgeralinsert = $_POST['chacontadorgeralinsert'];
        $nometabelaparapassar = $_POST['nometabelaparapassar'];
        $tipopessoa = $_POST['tipopessoa'];
        $cep = $_POST['cep'];
        $numerocolunastela = $_POST['numerocolunastela'];
        $campolista2 = $_POST['campolista2'];
        $campolista1 = $_POST['campolista1'];
        $campolista3 = $_POST['campolista3'];

        $rua5gravacorreio = $_POST['rua5gravacorreio'];
        $codigoproximoregitro = $_POST['codigoproximoregitro'];
        $codigoachoufinalpessoa = $_POST['codigoachoufinalpessoa'];
        $novogrupo = $_POST['novogrupo'];
        $novaempresa = $_POST['novaempresa'];
        $nomeusuario = $_POST['nomeusuario'];

    } else {

        $programa = $_GET['programa'];
        $escolha = $_GET['escolha'];
        $continuarmesmatela = $_POST['continuarmesmatela'];
        $chacontadorgeralinsert = $_GET['chacontadorgeralinsert'];
        $numerocolunastela = $_GET['numerocolunastela'];
        $codigoachou = $_GET['codigoachou'];
        $nomecolunaparapassar = $_GET['nomecolunaparapassar'];
        $nometabelaparapassar = $_GET['nometabelaparapassar'];
        $nomecolunaparapassaracao = $_GET['nomecolunaparapassaracao'];
        $chacontadorgeralupdate = $_GET['chacontadorgeralupdate'];
        $titulojanelainsert = $_GET['titulojanelainsert'];

        $seelctcampolista2 = $_GET['seelctcampolista2'];
        $seelctcampolista1 = $_GET['seelctcampolista1'];
        $seelctcampolista3 = $_GET['seelctcampolista3'];

        $campolista2 = $_GET['campolista2'];
        $campolista1 = $_GET['campolista1'];
        $campolista3 = $_GET['campolista3'];

        $codigoproximoregitro = $_GET['codigoproximoregitro'];

    }


    if (!IsSet($cep)) {
    } else {
        $chamacep = "sim";
    }

    IF (($programa == "PESSOAJURIDICA.php") or ($programa == "FROTA.php") or ($programa == "LOCAISFISICO.php")) {
        $tamanhojanela = "janelagrande1";

        if ($chamacep == "sim") {
            require("buscarcep.php");
        }
    } else {
        $tamanhojanela = "novoscadastros1";

    }


    ?>
    <div id="<? echo $tamanhojanela; ?>">

        <?

        if ($escolha == "vaiatualizar") {


            if (empty($codigoachoufinalpessoa) or empty($novogrupo) or empty($novaempresa) or empty($nomeusuario)) {

                $mensagem = "Existem Campos Obrigat�rios N�o Preenchidos";
                require("logerrobi.php");


            } else {
                require("funcaogerasenha.php");
                require("chamasenhaaleatoria.php");
                $diahoje = date('d-m-Y');

                $usu18ussMAXus = "SELECT MAX(CD_USUARIO) SEQUENCIA FROM usuario_bi";
                $usu18ussMAXus2 = $conn->Execute($usu18ussMAXus);
                while (!$usu18ussMAXus2->EOF) {
                    $maxusuarioR = $usu18ussMAXus2->fields["SEQUENCIA"];


                    if ($maxusuarioR > "0") {
                        $maxima = $maxusuarioR + 1;
                    } else {
                        $maxima = "1";
                    }

                    $usu18ussMAXus2->MoveNext();
                }

                $grava = "INSERT INTO usuario_bi(CD_USUARIO,CD_SENHA,NM_USUARIO,ID_MASTER,DT_ATUALIZACAO,CD_PESSOA,CD_EMPRESA)
			   VALUES ('$maxima','$senha','$nomeusuario','N',to_date('$diahoje','dd/mm/YYYY'),'$codigoachoufinalpessoa','$novaempresa')";
                $result = $conn->Execute($grava);


                $grava = "INSERT INTO usuario_grupo_bi(cd_usuario,cd_grupo,cd_empresa)
               VALUES ('$maxima','$novogrupo','$novaempresa')";


                $result = $conn->Execute($grava);
                //require("enviaemailmilenio.php");
                $erromostra = $conn->ErrorMsg();
                $ficartela = "sim";
                require("logerrobi.php");

            }

        }//final da escolha atualizar
        ?>
        <div class="mostraCaixa">

            <br/><br/>

            <table class="letraCaixa">
                <tr>
                    <td>Nome do Usu�rio:</td>
                    <td>
                        <input type="text" name="nomeusuario" size="35">
                    </td>
                </tr>
                <tr>
                    <td>Pessoa:</td>
                    <td>
                        <select name="codigoachoufinalpessoa" value="<? echo $codigoachoufinalpessoa; ?>">
                            <option value=""></option>
                            <?

                            $stmt1 = "select codigo,descricao from pessoa_bi where id_tipo_pessoa=1 order by descricao asc";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                $result3->MoveNext();
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Grupo</td>
                    <td>
                        <select name="novogrupo">
                            <option value=""></option>
                            <?

                            $stmt1 = "SELECT codigo,descricao FROM grupo_usuario_bi order by descricao asc";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                $result3->MoveNext();
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Empresa</td>
                    <td>
                        <select name="novaempresa">
                            <option value=""></option>
                            <?

                            $stmt1 = "SELECT CODIGO,DESCRICAO FROM pessoa_bi where id_tipo_pessoa=2 order by descricao asc";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                $result3->MoveNext();
                            }
                            ?>
                        </select></td>
                </tr>

            </table>

            <input type="hidden" name="continuarmesmatela" size="5" value="sim">
            <input type="hidden" name="programa" size="5" value="<? echo $programa; ?>">
            <input type="hidden" name="codigoachou" size="5" value="<? echo $codigoachou; ?>">
            <input type="hidden" name="nomecolunaparapassaracao" size="5"
                   value="<? echo $nomecolunaparapassaracao; ?>">
            <input type="hidden" name="campolista1" size="5" value="<? echo $campolista1; ?>">
            <input type="hidden" name="campolista2" size="5" value="<? echo $campolista2; ?>">
            <input type="hidden" name="campolista3" size="5" value="<? echo $campolista3; ?>">
            <input type="hidden" name="seelctcampolista1" size="5" value="<? echo $seelctcampolista1; ?>">
            <input type="hidden" name="seelctcampolista2" size="5" value="<? echo $seelctcampolista2; ?>">
            <input type="hidden" name="seelctcampolista3" size="5" value="<? echo $seelctcampolista3; ?>">
            <input type="hidden" name="titulojanelainsert" size="5" value="<? echo $titulojanelainsert; ?>">


            <input type="hidden" name="codigoproximoregitro" size="5" value="<? echo $codigoproximoregitro; ?>">
            <input type="hidden" name="escolha" size="5" value="vaiatualizar">


            <br/>

            <div id="divBotoes">
                <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                       onclick="window.location='<? echo $programa; ?>'">
                <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                       onclick="document.forms[0].submit();return false;">
            </div>

        </div>

</form>