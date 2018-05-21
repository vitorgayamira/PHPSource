<?
$achaicone1 = "SELECT a.ID_ATUALIZAR from funcao_grupo_bi a,funcao_bi b,usuario_grupo_bi c, usuario_bi d
 where a.cd_empresa='$codigoempresa'  and 
 a.cd_funcao=b.cd_funcao and
 b.cd_programa='$programa' and
 a.cd_grupo=c.cd_grupo and
 c.cd_usuario=d.cd_usuario and
 d.nm_usuario='$edusuario'
 ";

//echo "$achaicone1";
$achaicone12 = $conn->Execute($achaicone1);
while (!$achaicone12->EOF) {

    $atualizasimnao = $achaicone12->fields["0"];


    $achaicone12->MoveNext();
}

?>
<div id="icones">
    <?

    if ($atualizasimnao == "S") {
        ?>

        <a href="classeinsert.php?pagina=1&escolha=novoregistro&programa=<? echo $programa; ?>&chacontadorgeralinsert=<? echo $chacontadorgeralinsert; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&campolista3=<? echo $campolista3; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&seelctcampolista3=<? echo $seelctcampolista3; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelainsert=<? echo $titulojanelainsert; ?>&codigoproximoregitro=<? echo $codigoproximoregitro; ?>">
            <img src="imagens/incluir.png">
        </a>


    <? }

    if ( in_array($programa,array('exclusaoordens.php'))) { ?>
        <a href="classepesquisa.php?pagina=1&escolha=pesquisa&programa=<? echo $programa; ?>&passapesquisainicial=<? echo $passapesquisainicial; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelapesquisa=<? echo $titulojanelapesquisa; ?>&campolista3=<? echo $campolista3; ?>&seelctcampolista3=<? echo $seelctcampolista3; ?>&campolista4=<? echo $campolista4; ?>&seelctcampolista4=<? echo $seelctcampolista4; ?>">
            <img src="imagens/consulta.png"></a>
    <? }
    $achaparametro1 = "SELECT DS_URL_SOLICITACAO from parametros";
    $achaparametro12 = $conn->Execute($achaparametro1);
    $mostraicone = $achaparametro12->fields["0"];
    ?>

    <a href="<? echo $mostraicone; ?>"><img src="imagens/solicitacao.png"></a>

    <? if ($programa == 'FUNCAO.php') { ?>
        <a href="privilegiofuncao.php?pagina=1&escolha=1&programa=<? echo $programa; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelaassociacao1=<? echo $titulojanelaassociacao1; ?>&nometabelaassociativa1=<? echo $nometabelaassociativa1; ?>">
            <img src="imagens/privilegio.png"></a>

        <a href="classeassociadotabelas.php?pagina=1&escolha=associatabelas&programa=<? echo $programa; ?>&chacontadorgeral=<? echo $chacontadorgeralparaassociar; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelaassociacao1=<? echo $titulojanelaassociacao1; ?>&nometabelaassociativa1=<? echo $nometabelaassociativa1; ?>">
            <img src="imagens/funcao_grupo.png"></a>
    <? } ?>

    <br/><br/>

    <div style="margin-top:-10px">
        <? if ($atualizasimnao == "S") { ?>
            <div class="texto_icone">
                INCLUIR
            </div>
        <? }
        if ( in_array($programa,array('exclusaoordens.php'))) { ?>
            <div class="texto_icone">
                CONSULTA
            </div>
        <? } ?>
        <div class="texto_icone">
            SOLICITAÇÃO <br/> DE SERVIÇO
        </div>
        <? if ($programa == 'FUNCAO.php') { ?>
            <div class="texto_icone">
                PRIVILEGIO <br/> FUNCAO <br/>GRUPO
            </div>
            <div class="texto_icone">
                NOVA <br/> FUNCAO  <br/> GRUPO
            </div>
        <? } ?>
    </div>

</div>







