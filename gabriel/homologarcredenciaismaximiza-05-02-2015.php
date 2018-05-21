<? session_start(); ?>

<HEAD>

</HEAD>

<form name="homologarcredenciaismaximiza.php" method="POST">


    <?

    $navegando = $_GET['navegando'];
    $continuarmesmatela = isset($_POST['continuarmesmatela']) ? $_POST['continuarmesmatela'] : '';
    //$continuarmesmatela=$_POST['continuarmesmatela'];
    $novavalidacao = isset($_POST['novavalidacao']) ? $_POST['novavalidacao'] : '';
    //$novavalidacao=$_POST['novavalidacao'];


    if ($navegando == "sim") {
        $novologin = $_GET['novologin'];
        $desconecta = isset($_GET['desconecta']) ? $_GET['desconecta'] : '';
        //$desconecta=$_GET['desconecta'];
        $usuariomilenio = $_GET['usuariomilenio'];
        $usuariosite = isset($_GET['usuariosite']) ? $_GET['usuariosite'] : '';
        //$usuariosite=$_GET['usuariosite'];

    }
    if ($novavalidacao == "sim") {
        $edusuario = isset($_POST['edusuario']) ? $_POST['edusuario'] : '';
//$edusuario=$_POST['edusuario'];
        $edsenha = $_POST['edsenha'];
//$banco=$_POST['banco'];
        $edusuario = isset($_POST['banco']) ? $_POST['banco'] : '';
        $usuariomilenio = $_POST['usuariomilenio'];
//$usuariosite=$_POST['usuariosite'];
        $usuariosite = isset($_POST['usuariosite']) ? $_POST['usuariosite'] : '';

    }


    if ($desconecta == "sim") {
        $novavalidacao = "nao";
        session_unset();

    }


    if (!IsSet($bancopassa)) {
        $banco = "maker";
        $labelbanco = "maker";
        if (!IsSet($username_https)) {
            $username_https = "root";
        }
        if (!IsSet($password_https)) {
            $password_https = "di2040";
        }
        if (!IsSet($hostname_https)) {
            $hostname_https = "localhost";
        }


    } else {
        $banco = "maker";
        $username_https = "root";
        $password_https = "di2040";
        $hostname_https = "localhost";
        require("configuramysqlversa2.php");
        $achacredenciais1 = "select id_roda_nuvem RODA ,ds_host_https HOSTHTTP,ds_user_https USERHTTP
                     ,ds_senha_https SENHAHTTP,ds_host_banco HOSTBANCO,
                     ds_porta_banco PORTABANCO,ds_service_name_banco_dados SERVICEBANCO,
                     ds_usuario_banco_dados USUARIOBANCO,
                     ds_senha_banco_dados SENHABANCO,ds_banco_web WEBBANCO,ds_banco NOME66
                     from banco_bi where DS_USUARIO_BANCO_DADOS='$bancopassa' ";


        $achacredenciais2 = mysql_db_query($banco, $achacredenciais1, $conexao);
        $achacredenciais3 = mysql_fetch_array($achacredenciais2);
        $banco = $achacredenciais3["WEBBANCO"];

        $username_https = $achacredenciais3["USERHTTP"];
        $password_https = $achacredenciais3["SENHAHTTP"];
        $hostname_https = $achacredenciais3["HOSTHTTP"];
        $labelbanco = $achacredenciais3["NOME66"];


    }


    require("configuramysqlversa2.php");
    require("estilo.css");

    if (empty($edusuario) and empty($edsenha)) {

    } else {
        $sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario'  ";


        $res = mysql_db_query($banco, $sql, $conexao);
        $valor7 = mysql_fetch_array($res);
        $valor13 = $valor7["CONTADOR"];


        $sql2 = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' and cd_senha='$edsenha'";
        $res2 = mysql_db_query($banco, $sql2, $conexao);
        $valor72 = mysql_fetch_array($res2);
        $valor14 = $valor72["CONTADOR"];


    }


    if ($valor13 == "1" and $valor14 == "1") {


        $novologin = "nao";
        session_register("edusuario");
        session_register("edsenha");
        session_register("banco");
        session_register("labelbanco");
        $edusuario = $_SESSION["edusuario"];
        $edsenha = $_SESSION["edsenha"];
        $banco = $_SESSION["banco"];
        $labelbanco = $_SESSION["labelbanco"];

        session_register("username_https");
        session_register("password_https");
        session_register("hostname_https");

        $username_https = $_SESSION["username_https"];
        $password_https = $_SESSION["password_https"];
        $hostname_https = $_SESSION["hostname_https"];


    } else {


        $novologin = "sim";


    }


    if ($novologin == "sim"){


    //require("logacesso_cva.php");

    require("topomaximiza.php");

    require("configuramysqlversa2.php");

    ?>
    <body>
    <input type="hidden" name="novavalidacao" value="sim">
    <input type="hidden" name="continuarmesmatela" value="sim">
    <input type="hidden" name="navegando" value="nao">


    <div style="display: block;" id="mostraintranet">

        </br></br></br>
        <table border="0" align="right">
            <tr>
                <td>Login</td>
                <td><input name="edusuario" type="text" class="myinputstyle" value="<? echo $edusuario; ?>" size="38">

                    <?


                    $sql = "select count(*) CONTADOR from usuario_bi where nm_usuario='$edusuario' ";

                    $res = mysql_db_query($banco, $sql, $conexao);
                    $valor7 = mysql_fetch_array($res);
                    $valor135 = $valor7["CONTADOR"];


                    if ($valor135 == "1") {
                        ?>
                        <img src="iconepositivo_mi.jpg">
                        <?
                    } ELSE {
                        if (empty($edusuario)) {
                        } else {
                            ?>
                            <img class="myinputstyle" src="iconenegativo_mi.jpg" width="18" height="18">
                            <?
                        }
                    }
                    ?>
                </td>
            </tr>


            <tr>
                <td>Senha</td>
                <td><input name="edsenha" type="password" class="myinputstyle" value="<? echo $edsenha; ?>" size="38"
                           maxlength="38"/>

                    <?


                    $sql2 = "select count(*) CONTADOR from usuario_bi where  cd_senha='$edsenha'";
                    $res2 = mysql_db_query($banco, $sql2, $conexao);
                    $valor72 = mysql_fetch_array($res2);
                    $valor14 = $valor72["CONTADOR"];


                    if ($valor14 == "1") {
                        ?>
                        <img src="iconepositivo_mi.jpg">
                        <?
                    } ELSE {
                        if (empty($edsenha)) {
                        } else {
                            ?>

                            <img class="myinputstyle" src="iconenegativo_mi.jpg" width="18" height="18">
                            <?
                        }
                    }
                    ?>
                </td>
            </tr>

            <? IF ($usuariomilenio == "sim") {
                $banco = "maker";


                ?>
                <tr>
                    <td>Banco:</td>
                    <td>
                        <select name="bancopassa">
                            <option value=""></option>
                            <?

                            $stmt1 = "SELECT DS_USUARIO_BANCO_DADOS,DS_BANCO FROM banco_bi  where
                      nr_sequencia in (select cd_banco from usuario_banco_bi where
                      cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$usuariosite')) ";
                            $res = mysql_db_query($banco, $stmt1, $conexao);
                            while ($valor8 = mysql_fetch_array($res)) {
                                print "<option value=\"{$valor8["DS_USUARIO_BANCO_DADOS"]}\">{$valor8["DS_BANCO"]}</option>";
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <input name="usuariomilenio" type="hidden" value="sim">
            <?
            } else {
                ?>
                <input name="bancopassa" type="hidden" value="maker">
                <input name="usuariomilenio" type="hidden" value="nao">

                <?
            }
            ?>


            <tr>

                <td></td>
                <td><input type="submit" VALUE="Acessar">

                    <a href="index.php?navegando=sim&desconecta=sim&usuariomilenio=nao" class="style1"><input
                            type="button" value="Cancelar"></a></td>
            </tr>


        </table>

    </div>

    <?


    }
    else
    {


    $edusuario = preg_replace("/\s+/", "_", $edusuario);
    $edusuario = strtr($edusuario, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
    $edusuario = strtoupper($edusuario);//converte maiuscula
    $edusuario = ltrim($edusuario);//tira espaco brancoapos e antes


    $edsenha = preg_replace("/\s+/", "_", $edsenha);
    $edsenha = strtr($edsenha, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
    $edsenha = strtoupper($edsenha);//converte maiuscula
    $edsenha = ltrim($edsenha);//tira espaco brancoapos e antes


    echo "Usuario: $edusuario Senha: $edsenha";
    $sql = "select count(*) CONTADOR from usuario_bi  where cd_usuario='$edusuario' ";
    $res = mysql_db_query($banco, $sql, $conexao);
    $valor7 = mysql_fetch_array($res);
    $valor13 = $valor7["CONTADOR"];


    $sql2 = "select count(*) CONTADOR from usuario_bi where cd_senha='$edsenha' ";
    $res2 = mysql_db_query($banco, $sql2, $conexao);
    $valor72 = mysql_fetch_array($res2);
    $valor14 = $valor72["CONTADOR"];


    $todayh = date('Y-m-d H:i:s');

    $grava = "INSERT INTO LOG_BI (nm_usuario,DT_GERACAO)
                 values ('$edusuario','$todayh')";
    //echo "$grava</BR>";
    $res = mysql_db_query($banco, $grava, $conexao);


    ?>





    <?
    require("configuramysqlversa2.php");

    $usu189NOME = "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
    $res89NOME = mysql_db_query($banco, $usu189NOME, $conexao);
    $valor879NOME = mysql_fetch_array($res89NOME);
    $nomepessoa4 = $valor879NOME["NOME"];

    ?>

    <body background="neves.png">
    </br></br></br></br>
    <table border="0" width="800px">
        <tr>


            <td width="85%">
                <div id='cssmenu'>


                    <ul>


                        <?
                        $sql = "SELECT DISTINCT a.DS_PASTA PASTA,a.CD_PASTA CODIGOPASTA,b.cd_grupo  CODIGOGRUPO
FROM pasta_menu_bi a,funcao_grupo_bi b, grupo_usuario_bi c,usuario_grupo_bi d,usuario_bi e
WHERE a.CD_PASTA=b.CD_PASTA AND b.CD_GRUPO=c.CODIGO AND c.codigo=d.CD_GRUPO AND
d.cd_usuario=e.cd_usuario and
e.nm_usuario='$edusuario' ";


                        $res = mysql_db_query($banco, $sql, $conexao);

                        while ($valor = mysql_fetch_array($res)) {
                            $pasta2 = $valor["CODIGOPASTA"];
                            $grupo2 = $valor["CODIGOGRUPO"];
                            $descricaopasta = $valor["PASTA"];
                            ?>
                            <li><a href=""><font style='font-size: 12px;color: black;text-align:left;bold: Negrito'>
                                        <? echo $descricaopasta; ?></font></a>


                                <ul>
                                    <?

                                    $sub = "SELECT DISTINCT a.DS_FUNCAO FUNCAO,a.CD_PROGRAMA PROGRAMA,b.CD_PASTA PASTA
            FROM funcao_bi a,funcao_grupo_bi b WHERE
            a.CD_FUNCAO=b.CD_FUNCAO
            AND b.CD_PASTA='$pasta2' AND
            b.CD_GRUPO='$grupo2'
            ";
                                    //echo "$sub";

                                    $res691 = mysql_db_query($banco, $sub, $conexao);

                                    while ($valor2 = mysql_fetch_array($res691)) {

                                        $subdescricao = $valor2["FUNCAO"];

                                        $programa1 = $valor2["PROGRAMA"];

                                        ?>


                                        <li><a href='<? echo "$programa1"; ?>?novologin=nao&navegando=sim'>
                                                <font style='font-size: 12px;color: black;face=arial;'>
                                                <? echo "$subdescricao"; ?></a></li>
                                        <?
                                    }//final das funcoes
                                    ?>

                                </ul>

                            </li>
                            <?
                        }//finaldas pastas

                        ?>


                    </ul>

                </div>
            </td>

            <td width="15%"></td>
        </tr>

        <tr>


            <td width="85%" align=right>
                <b><? echo "Logado:$nomepessoa4"; ?></b>
                <? echo " - "; ?>
                <a href="index.php?navegando=sim&desconecta=sim&usuariomilenio=sim&usuariosite=<? echo $edusuario; ?>"
                   style="text-decoration:none;color: black;"><b>Sair</b></a>
                <? echo " - ";

                $achaprivilegiomudarbanco = "SELECT count(*) VALOR from usuario_bi  where id_muda_ambiente_banco='S' and
    nm_usuario='$edusuario'";


                $achaprivilegiomudarbanco2 = mysql_db_query($banco, $achaprivilegiomudarbanco, $conexao);
                $achaprivilegiomudarbanco3 = mysql_fetch_array($achaprivilegiomudarbanco2);
                $existeprivilegio2 = $achaprivilegiomudarbanco3["VALOR"];


                ?>


                <a href="index.php"
                   style="text-decoration:none;color: black;"><b>Home</b></a>
                <? echo "  "; ?>
                <b>-<?
                    if ($existeprivilegio2 > "0") {
                        ?>
                        <a href="index.php?navegando=sim&desconecta=sim&usuariomilenio=sim&usuariosite=<? echo $edusuario; ?>"
                           style="text-decoration:none;color: black;"><? echo $labelbanco; ?></a>
                        <?
                    } else {


                        echo "$labelbanco";
                    }

                    $achaprivilegiomaster = "SELECT count(*) VALOR from usuario_bi  where id_master='S' and
    nm_usuario='$edusuario'";

                    $achaprivilegiomaster2 = mysql_db_query($banco, $achaprivilegiomaster, $conexao);
                    $achaprivilegiomaster3 = mysql_fetch_array($achaprivilegiomaster2);
                    $existeprivilegio3 = $achaprivilegiomaster3["VALOR"];


                    ?>

            </td>

            <td width="15%"></td>

        </tr>
    </table>

    <? } ?>

    <input type="hidden" name="continuarmesmatela" value="sim">


    </body>

</form>
</html>


