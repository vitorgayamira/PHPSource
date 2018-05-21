<?

if (empty($mensagem)) {//tratando erro


    if (empty($erromostra)) {//sem erro

        $diahoje = date('d');
        $meshoje = date('m');
        $anohoje = date('Y');

        $horahoje = date('H');
        $minutohoje = date('i');
        $segundohoje = date('s');

        $datapesquisahoje = $diahoje . "/" . $meshoje . "/" . $anohoje . " " . $horahoje . ":" . $minutohoje . ":" . $segundohoje;

        $usu18uss = "SELECT CD_USUARIO FROM usuario_bi where nm_usuario='$edusuario'";
        $resultuss = $conn->Execute($usu18uss);
        while (!$resultuss->EOF) {
            $codigousuarioachou = $resultuss->fields["CD_USUARIO"];
            $resultuss->MoveNext();
        }

        $query = "INSERT INTO log_erro_bi (CD_USUARIO,DT_OCORRENCIA,DS_ERRO,DS_PROGRAMA)
        VALUES('$codigousuarioachou',to_date('$datapesquisahoje','dd/mm/YYYY HH24:MI:SS'),'$query','$programa')";
        $result = $conn->Execute($query);

        ?>

        <div style="display: block;" id="janelamensagem1">
            </br></br>
            <center>
                <table width="15%" border="0" background-image="sairmensagem.png">
                    <tr>
                        <td>
                            <center><? echo "Ação com Sucesso"; ?></td>
                        <td>
                            <? echo $titulojanelainsert; ?>
                            <a href="<? echo $programa;
                            ?>?navegando=sim&escolha=1">
                                <IMG src="imagens/proximo.png" width="25px" height="25px"></a>
                        </td>
                    </tr>
                </table>
            </center>

        </div>

        <?
    } else {//eroo
        $diahoje = date('d');
        $meshoje = date('m');
        $anohoje = date('Y');

        $horahoje = date('H');
        $minutohoje = date('i');
        $segundohoje = date('s');

        $datapesquisahoje = $diahoje . "/" . $meshoje . "/" . $anohoje . " " . $horahoje . ":" . $minutohoje . ":" . $segundohoje;

        $usu18uss = "SELECT CD_USUARIO FROM usuario_bi where nm_usuario='$edusuario'";
        $resultuss = $conn->Execute($usu18uss);
        while (!$resultuss->EOF) {
            $codigousuarioachou = $resultuss->fields["CD_USUARIO"];
            $resultuss->MoveNext();
        }
        $substituido = str_replace("'", "", $erromostra);
        $query = "INSERT INTO log_erro_bi (CD_USUARIO,DT_OCORRENCIA,DS_ERRO,DS_PROGRAMA)
        VALUES('$codigousuarioachou',to_date('$datapesquisahoje','dd/mm/YYYY HH24:MI:SS'),'$substituido','$programa')";
        $result = $conn->Execute($query);
        ?>
        <div style="display: block;" id="janelamensagem1">
            <table width="100%" border="0" background-image="sairmensagem.png">
                <tr>
                    <td align=right>
                        <? echo $titulojanelainsert; ?>
                        <a href="<? echo $programa; ?>?navegando=sim&escolha=1">
                            <IMG src="sairmensagem.png" width="38" height="38"></a>
                    </td>
                </tr>
            </table>
            <? echo "Aconteçeu Erro de Utilização "; ?>
        </div>
        <?
    }
} else {//so mensagem

    ?>
    <div style="display: block;" id="janelamensagem1">
        <table width="100%" border="0" background-image="sairmensagem.png">
            <tr>
                <td align=right>
                    <? echo $titulojanelainsert; ?>
                    <a href="<? echo $programa; ?>?navegando=sim&escolha=1">
                        <IMG src="sairmensagem.png" width="38" height="38"></a>
                </td>
            </tr>
        </table>
        <center><? echo $mensagem; ?>
    </div>
    <?

}
?>