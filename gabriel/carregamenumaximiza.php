<? session_start(); ?>
<html>
<?


require("configuramysqlversa2.php");


$usu189NOME = "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";

$res89NOME = mysql_db_query($banco, $usu189NOME, $conexao);
$valor879NOME = mysql_fetch_array($res89NOME);
$nomepessoa4 = $valor879NOME["NOME"];

?>

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
            <b><?
                $acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

                $res = mysql_db_query($banco, $acha1, $conexao);
                $valor6 = mysql_fetch_array($res);

                $nomeempresa88 = $valor6["NOMEEMPRESA"];

                echo "Empresa:$nomeempresa88 - ";
                echo "Logado:$nomepessoa4"; ?></b>
            <? echo " - "; ?>
            <a href="index.php?navegando=sim&desconecta=sim"
               style="text-decoration:none;color: black;"><b>Sair</b></a>

            <? echo " - "; ?>


            <a href="index.php"
               style="text-decoration:none;color: black;"><b>Home</b></a>
            <? echo "  "; ?>
            <b>-<?
                $achaprivilegiomudarbanco = "SELECT count(*) VALOR from usuario_bi  where id_muda_ambiente_banco='S' and
    nm_usuario='$edusuario'";

                $achaprivilegiomudarbanco2 = mysql_db_query($banco, $achaprivilegiomudarbanco, $conexao);
                $achaprivilegiomudarbanco3 = mysql_fetch_array($achaprivilegiomudarbanco2);
                $existeprivilegio2 = $achaprivilegiomudarbanco3["VALOR"];

                if ($existeprivilegio2 > "0") {
                    ?>
                    <a href="index.php?navegando=sim&desconecta=sim&usuariomilenio=sim"
                       style="text-decoration:none;color: black;"><? echo $labelbanco; ?></a>
                    <?
                } else {

                    echo $labelbanco;
                }
                ?>
            </b>


        </td>

        <td width="15%"></td>

    </tr>
</table>


</html>
