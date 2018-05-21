<font style='font-size: 12px;color: white;text-align:left;bold: Negrito' >
<?

if (!IsSet($pagina)){
$pagina="1";
}

if ($numeroregistropagina >"0"){
}
else
{
$numeroregistropagina="12";

}

$totalpagina=$ultimo/$numeroregistropagina;
$totalpagina=ceil($totalpagina);
$limiteacima=($numeroregistropagina*$pagina)-$numeroregistropagina;
$limiteabaixo=$numeroregistropagina*$pagina;
$paginaanterior=$pagina-1;
$paginaposterior=$pagina+1;
?>

<?
$paginaminima="1";



if ($pagina>"0"){
echo "Página:$pagina/$totalpagina ";
}

  
  if ($pagina>"0"){
  ?>
  <a href="<?php echo $programa;?>?pagina=<?echo $paginaminima;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>&ambiente=<?echo $ambiente;?>"><img src="bfirst.gif" width="13" height="13"></a>

  <?
  }
  if ($pagina >=$paginaminima and $pagina < $totalpagina){

	?>
	<a href="<?php echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaposterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>&ambiente=<?echo $ambiente;?>"><img src="bprev.gif" width="13" height="13"></a>

	<?
   }

   if ($pagina >$paginaminima and $pagina < $totalpagina){
	 
	?>
    
	<a href="<?echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaanterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>&ambiente=<?echo $ambiente;?>"><img src="bnext.gif" width="13" height="13"></a>
	<?
	
 }
    
if ($pagina == $totalpagina and $pagina>$paginaminima){
    
	?>
	<a href="<?echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaanterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>&ambiente=<?echo $ambiente;?>"><img src="bnext.gif" width="13" height="13"></a>

	<?
    
	
}

if ($pagina>"0"){
  
?>

	<a href="<?echo $programa;?>?limiteabaixo=0&limiteacima=<?echo $numeroregistropagina;?>&pagina=<?echo $totalpagina;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>&ambiente=<?echo $ambiente;?>"><img src="blast.gif" width="13" height="13"></a>



<?
}
?>

	 
	 

	 
