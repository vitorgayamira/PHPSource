<?
 $achaicone1= "SELECT a.ID_ATUALIZAR from funcao_grupo_bi a,funcao_bi b,usuario_grupo_bi c, usuario_bi d
 where a.cd_empresa='$codigoempresa'  and 
 a.cd_funcao=b.cd_funcao and
 b.cd_programa='$programa' and
 a.cd_grupo=c.cd_grupo and
 c.cd_usuario=d.cd_usuario and
 d.nm_usuario='$edusuario'
 ";

 //echo "$achaicone1";
$achaicone12= $conn->Execute($achaicone1);
while ( !$achaicone12->EOF) {

$atualizasimnao=$achaicone12->fields["0"];


$achaicone12->MoveNext();
}


 if ($atualizasimnao=="S")
 {
 ?>
 <a href="classeinsert.php?pagina=1&escolha=novoregistro&programa=<?echo $programa;?>&chacontadorgeralinsert=<?echo $chacontadorgeralinsert;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&campolista3=<?echo $campolista3;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelainsert=<?echo $titulojanelainsert;?>&codigoproximoregitro=<?echo $codigoproximoregitro;?>">
<img width='70' height='75' BORDER=0  src="incluir.GIF" align="center">
</a>


 <?}?>
 
  

<a href="classepesquisa.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<?
$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];
?>

<a href="<?echo $mostraicone;?>"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>







