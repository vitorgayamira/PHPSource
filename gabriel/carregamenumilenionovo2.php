<?
$usu189NOME = "SELECT b.descricao NOME FROM usuario_bi a,pessoa_bi  b
where a.nm_usuario='$edusuario' and
a.cd_pessoa=b.codigo   ";
$result5nome5 = $conn->Execute($usu189NOME);
while (!$result5nome5->EOF) {
    $nomepessoa4 = $result5nome5->fields["NOME"];

    $result5nome5->MoveNext();
}


?>

<div id='cssmenu'>
    <ul>


        <?

        $sql = "SELECT DISTINCT a.DS_PASTA PASTA,a.CD_PASTA CODIGOPASTA,b.cd_grupo  CODIGOGRUPO
FROM pasta_menu_bi a,funcao_grupo_bi b, grupo_usuario_bi c,usuario_grupo_bi d,usuario_bi e
WHERE a.CD_PASTA=b.CD_PASTA AND b.CD_GRUPO=c.CODIGO AND c.codigo=d.CD_GRUPO AND
d.cd_usuario=e.cd_usuario and
e.nm_usuario='$edusuario' ";

        $result5nome57 = $conn->Execute($sql);
        while (!$result5nome57->EOF) {


        $pasta2 = $result5nome57->fields["CODIGOPASTA"];
        $grupo2 = $result5nome57->fields["CODIGOGRUPO"];
        $descricaopasta = $result5nome57->fields["PASTA"];
        ?>
        <li class='has-sub '><a href='#'><? echo $descricaopasta; ?> | </a>
            <ul>

                <?
                $sub = "SELECT  a.DS_FUNCAO FUNCAO,a.CD_PROGRAMA PROGRAMA,b.CD_PASTA PASTA
            FROM funcao_bi a,funcao_grupo_bi b WHERE
            a.CD_FUNCAO=b.CD_FUNCAO
            AND b.CD_PASTA='$pasta2' AND
            b.CD_GRUPO='$grupo2' order by b.nr_sequencia asc";

                $result5nome58 = $conn->Execute($sub);
                while (!$result5nome58->EOF) {

                    $subdescricao = $result5nome58->fields["FUNCAO"];

                    $programa1 = $result5nome58->fields["PROGRAMA"];
                    ?>
                    <li><a href='<? echo "$programa1"; ?>?novologin=nao&navegando=sim'
                           style="text-decoration:none;font-size: 12px;color: black;text-align:left;bold: Negrito"><b><? echo "$subdescricao"; ?></b></a>
                    </li>

                    <? $result5nome58->MoveNext();
                } ?>

            </ul>

            <? $result5nome57->MoveNext();
            } ?>
    </ul>

</div>
 
