<?
ini_set('display_errors', '0');// NÃƒO HABILITAD

$imagemtopoinicial = "apresentacao6nova.jpg";

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form name="homologarcredenciaismaximiza.php" method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <?
    $continuarmesmatela = $_POST['continuarmesmatela'];

    if ($continuarmesmatela == "sim") {
        $edusuario = $_POST['edusuario'];
        $edsenha = $_POST['edsenha'];
        $novaconexao = $_POST['novaconexao'];
        $nomeempresaconexao = $_POST['nomeempresaconexao'];
    }


    if (!IsSet($novaconexao)) {
        $novaconexao = "nao";
    }

    if (!IsSet($edusuario)) {
        $edusuario = "";
    }
    if (!IsSet($edsenha)) {
        $edsenha = "";
    }
    if (!IsSet($nomeempresaconexao)) {
        $nomeempresaconexao = "MAKER";
    }


    require("conexaoadodb_oracle.php");

    $usu189NOMEco = "SELECT CODIGO FROM pessoa_bi
where descricao='$razaoempresa'  ";
    //echo "$usu189NOMEco";

    $result = $conn->Execute($usu189NOMEco);
    while (!$result->EOF) {

        $codigoempresa = $result->fields["CODIGO"];
        $result->MoveNext();
    }


    $edusuario = trim($edusuario);
    $edsenha = trim($edsenha);

    $sqlteste1 = "select count(*) CONTADOR from usuario_grupo_bi where cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario') and
cd_empresa='$codigoempresa' ";
    $result = $conn->Execute($sqlteste1);
    while (!$result->EOF) {

        $valor13teste = $result->fields["CONTADOR"];
        $result->MoveNext();
    }


    $sql2teste = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'
and
cd_empresa='$codigoempresa' ";

    $result = $conn->Execute($sql2teste);
    while (!$result->EOF) {

        $valor14teste = $result->fields["CONTADOR"];
        $result->MoveNext();
    }


    $usu189NOME = "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
    $result = $conn->Execute($usu189NOME);
    while (!$result->EOF) {

        $nomepessoa4 = $result->fields["NOME"];
        $result->MoveNext();
    }


    $sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario'  ";
    $result = $conn->Execute($sql);
    while (!$result->EOF) {

        $valor13 = $result->fields["CONTADOR"];
        $result->MoveNext();
    }


    $sql2 = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'";
    $result = $conn->Execute($sql2);
    while (!$result->EOF) {

        $valor14 = $result->fields["CONTADOR"];
        $result->MoveNext();
    }


    if ($valor13 == "1" and $valor14 == "1" and $novaconexao == "sim") {


        if ($edusuario == "vitor") {

            require("job.php");
        } else {


            require("homologarcredenciaismaximiza2.php");
        }


    } else {
        ?>

        <div style="display: block;" id="mostraintranet" class="mostraCaixa">

            <br/><br/>
            <table id="tabela_login" class="letraCaixa" border="0" align="center">
                <tr>
                    <td>USUÁRIO</td>
                    <td><input name="edusuario" id="edusuario" type="text" class="myinputstyle" value="" size="38">

                        <?
                        $sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' ";
                        $result = $conn->Execute($sql);
                        while (!$result->EOF) {

                            $valor135 = $result->fields["CONTADOR"];
                            $result->MoveNext();
                        }

                        ?>
                    </td>
                </tr>


                <tr>
                    <td>SENHA</td>
                    <td><input name="edsenha" type="password" style="width:100%" value="" size="38" maxlength="38"/>

                        <?


                        $sql2 = "select count(*) CONTADOR from usuario_bi where  cd_senha='$edsenha'";

                        $result = $conn->Execute($sql2);
                        while (!$result->EOF) {

                            $valor145 = $result->fields["CONTADOR"];
                            $result->MoveNext();
                        }

                        ?>
                    </td>

                </tr>

                <tr>
                    <td>EMPRESA</td>
                    <td><input name="nomeempresaconexao" type="text" class="myinputstyle" value="" size="38"></td>
                </tr>


            </table>

            <input id="btn_login" type="submit" VALUE="AVANÇAR" class="botaoVermelho">

            <input type="hidden" name="continuarmesmatela" value="sim">
            <input type="hidden" name="navegando" value="nao">
            <input type="hidden" name="bdinicial" value="<? echo $bdinicial; ?>">
            <input type="hidden" name="bancoinicial" value="<? echo $bancoinicial; ?>">
            <input type="hidden" name="novaconexao" value="sim">


        </div>

    <? } ?>


</form>
</body>


</html>


