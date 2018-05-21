<?
if ((!IsSet($escolha) || $escolha == "1") && $paginas > 0) {

?>
<div style="text-align: center;">
    <table border=0' width="80%" align="center" class="tabela2">
        <tr>

            <td align=right>

                <a href="<? echo $programa; ?>?navegando=sim&buscarparametro=nao&pagina_atual=<? echo $anteriorpagina; ?>&grupoordens=<? echo $grupoordens; ?>&dataparabuscar1=<? echo $dataparabuscar1; ?>&dataparabuscar2=<? echo $dataparabuscar2; ?>
&fabricapesquisa=<? echo $fabricapesquisa; ?>&solicitantepesquisainicial=<? echo $solicitantepesquisainicial; ?>
&numeroordempesquisa=<? echo $numeroordempesquisa; ?>&codigomaquina=<? echo $codigomaquina; ?>
&tipoordemstatus=<? echo $tipoordemstatus; ?>&tipoatividadepesquisa=<? echo $tipoatividadepesquisa; ?>&dispminima=<? echo $dispminima; ?>&ordenaatual=<? echo $ordenaatual; ?>&usuarios=<? echo $usuarios; ?>">


                    <img src="imagens/anterior.png" width="20px" height="20px"></a>

                <corlabel>Página: <? echo "$pagina_atual"; ?> de <? echo "$paginas"; ?></corlabel>


                <a href="<? echo $programa; ?>?navegando=sim&buscarparametro=nao&pagina_atual=<? echo $proximapagina; ?>&grupoordens=<? echo $grupoordens; ?>&dataparabuscar1=<? echo $dataparabuscar1; ?>&dataparabuscar2=<? echo $dataparabuscar2; ?>
&fabricapesquisa=<? echo $fabricapesquisa; ?>&solicitantepesquisainicial=<? echo $solicitantepesquisainicial; ?>
&numeroordempesquisa=<? echo $numeroordempesquisa; ?>&codigomaquina=<? echo $codigomaquina; ?>
&tipoordemstatus=<? echo $tipoordemstatus; ?>&tipoatividadepesquisa=<? echo $tipoatividadepesquisa; ?>&dispminima=<? echo $dispminima; ?>&ordenaatual=<? echo $ordenaatual; ?>&usuarios=<? echo $usuarios; ?>">


                    <img src="imagens/proximo.png" width="20px" height="20px"></a>
            </td>
        </tr>
    </table>
</div>
    <? } ?>

