<?
if (!IsSet($escolha) or $escolha=="1"  ){
?>
<center><table  border=0
 style='background:white;' width="80%" align="center" class="tabela1">
<tr>

<td align=right>

    <corlabel>Página:<? echo "$pagina_atual";?>/<? echo "$paginas";?></corlabel>


    <a href="<?echo $programa;?>?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>&grupoordens=<?echo $grupoordens;?>&dataparabuscar1=<?echo $dataparabuscar1;?>&dataparabuscar2=<?echo $dataparabuscar2;?>
&fabricapesquisa=<?echo $fabricapesquisa;?>&solicitantepesquisainicial=<?echo $solicitantepesquisainicial;?>
&numeroordempesquisa=<?echo $numeroordempesquisa;?>&codigomaquina=<?echo $codigomaquina;?>
&tipoordemstatus=<?echo $tipoordemstatus;?>&tipoatividadepesquisa=<?echo $tipoatividadepesquisa;?>&dispminima=<?echo $dispminima;?>">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="<?echo $programa;?>?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>&grupoordens=<?echo $grupoordens;?>&dataparabuscar1=<?echo $dataparabuscar1;?>&dataparabuscar2=<?echo $dataparabuscar2;?>
&fabricapesquisa=<?echo $fabricapesquisa;?>&solicitantepesquisainicial=<?echo $solicitantepesquisainicial;?>
&numeroordempesquisa=<?echo $numeroordempesquisa;?>&codigomaquina=<?echo $codigomaquina;?>
&tipoordemstatus=<?echo $tipoordemstatus;?>&tipoatividadepesquisa=<?echo $tipoatividadepesquisa;?>&dispminima=<?echo $dispminima;?>">
    <img src="setaesquerda.png" width="20" height="14" ></a>
</td>
</tr>
</table>

<?}?>

