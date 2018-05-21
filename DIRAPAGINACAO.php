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
$limiteabaixo=$numeroregistropagina;
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
  <a href="<?php echo $programa;?>?pagina=<?echo $paginaminima;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>"><img src="bfirst.gif" width="13" height="13"></a>

  <?
  }
  if ($pagina >=$paginaminima and $pagina < $totalpagina){

	?>
	<a href="<?php echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaposterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>"><img src="bprev.gif" width="13" height="13"></a>

	<?
   }

   if ($pagina >$paginaminima and $pagina < $totalpagina){
	 
	?>
    
	<a href="<?echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaanterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>"><img src="bnext.gif" width="13" height="13"></a>
	<?
	
 }
    
if ($pagina == $totalpagina and $pagina>$paginaminima){
    
	?>
	<a href="<?echo $programa;?>?limiteabaixo=<?echo $limiteabaixo;?>&limiteacima=<?echo $limiteacima;?>&pagina=<?echo $paginaanterior;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>"><img src="bnext.gif" width="13" height="13"></a>

	<?
    
	
}

if ($pagina>"0"){
  
?>

	<a href="<?echo $programa;?>?limiteabaixo=0&limiteacima=<?echo $numeroregistropagina;?>&pagina=<?echo $totalpagina;?>&data1=<?echo $data1?>&turnopesquisa=<?echo $turnopesquisa;?>&grupopesquisa=<?echo $grupopesquisa;?>&valorselecao=<?echo $valorselecao;?>&escolha=<?echo "1";?>&numeroregistropagina=<?echo $numeroregistropagina;?>&projeto=<?echo $projeto;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&&ultimo=<?echo $ultimo;?>&codigousuario=<?echo $codigousuario;?>&localbanco=<?echo $localbanco;?>"><img src="blast.gif" width="13" height="13"></a>



<?
}



	 //cria o menu dinamico
	
	 
	 $testepassa=$programarodape1."teste";
     $testepassa=substr($testepassa,0,5);

    
	 if ($testepassa=="teste"){
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape1;?>?acao=novoregistro&navegando=sim','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')"><?echo $labelprograma1;?></a>
	 <?}
	 
	 
	 $testepassa=$programarodape2."teste";
     $testepassa=substr($testepassa,0,5);
	 if ($testepassa=="teste"){
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape2;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=620')"><?echo $labelprograma2;?></a>
	 <?}
	 
	 
	 
	 
	 $testepassa=$programarodape8."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape8;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1000,height=540')"><?echo $labelprograma8;?></a>
	 <?}

     $testepassa=$programarodape9."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape9;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1300,height=550')"><?echo $labelprograma9;?></a>
	 <?}
     
	 
	 
	 $testepassa=$programarodape11."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape11;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><?echo $labelprograma11;?></a>
	 <?}
     
	 
	 
	  $testepassa=$programarodape14."teste";
     $testepassa=substr($testepassa,0,5);
	 
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 	 <a href="<?echo $programa;?>&pagina=1&escolha=novoregistro"><?echo $labelprograma14;?></a>
	 
	 
	 <?}?>
	
    
	
	
	 <?

	 for ($i='0';$i <=$numeroitensrodapefinal;$i++){ 
   
       $acha=$labelprograma[$i];
	  
	   ?>
		 <td>
		 <a href="<?echo $programa;?>&pagina=1&escolha=novoregistro&tela=<?echo $i;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><?echo $acha;?></a>
	     </td>
		<?
	 }

	 ?>
	 
	 
	 <?
	 
	 $testepassa=$programarodape15."teste";
     $testepassa=substr($testepassa,0,5);
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td>
	 <a href="#" onClick="window.open('<?echo $programarodape15;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1200,height=550')"><img src=imprimi.jpg border="0" width="27" height="27" alt="Imprimir"></a>
	 </td>
	 <?}
	 
     //5
	 $testepassa=$programarodape5."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape5;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1200,height=550')"><?echo $labelprograma5;?></a></td>
	 <?}?>
     
	 <?
	 
	 //3
	 $testepassa=$programarodape3."teste";
     $testepassa=substr($testepassa,0,5);
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {
		//$programarodape3=$programarodape3."&navegando=sim&banco=".$banco;
		 ?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape3;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=900,height=590')"><img src=novoregistro.jpg width="32" height="32" border="0" alt="Incluir Novo Registro"></a></td>
	 <?}
	 
	 //6
     
     $testepassa=$programarodape6."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape6;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1300,height=550')"><img src=imprimir.jpg width="32" height="32" border="0" alt="Imprimir Documento"></a></td>
	 <?}
     


	 //7
	 $testepassa=$programarodape7."teste";
     $testepassa=substr($testepassa,0,5);
	 
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 	 <td><a href="<?echo $programa;?>&pagina=1&escolha=mudandomes&mes=<?echo $mes;?>&ano=<?echo $ano;?>&banco=<?echo $banco;?>&navegando=sim&codigousuario=<?echo $codigousuario;?>"><img src=parametrobusca.jpg width="32" height="32" border="0" alt="Consultar Passando Parametros"></a></td>
	 
	 
	 <?}?>
     <?
     
	 //4
	 $testepassa=$programarodape4."teste";
    $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape4;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1100,height=550')"><?echo $labelprograma4;?></a></td>
	 <?}
    //10
	 $testepassa=$programarodape10."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <a href="#" onClick="window.open('<?echo $programarodape10;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=novoregistro.jpg width="32" height="32" border="0" alt="Novo Registro"></a>
	 <?}
	 
	 //12
	 $testepassa=$programarodape12."teste";
     $testepassa=substr($testepassa,0,5);
	 
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 	 <td><a href="<?echo $programa;?>&pagina=1&escolha=liberagerente"><img src=gerente.jpg width="32" height="32" border="0" alt="Definir Usuário Gerente"></a></td>
	 
	 
	 <?}
	 
	 //13
	 $testepassa=$programarodape13."teste";
     $testepassa=substr($testepassa,0,5);
	 
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 	 <td><a href="<?echo $programa;?>&pagina=1&escolha=liberaaponta"><img src=liberar.jpg width="32" height="32" border="0" alt="Liberar Apontamento"></a></td>
	 
	 
	 <?}

	 
	 //16
	 
     $testepassa=$programarodape16."teste";
     $testepassa=substr($testepassa,0,5);
     
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape16;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1100,height=550')"><img src=novoregistro.jpg width="32" height="32" border="0" alt="Incluir Novo Fornecedor"></a></td>
	 <?}
     
	 
	 //17
     $testepassa=$programarodape17."teste";
     $testepassa=substr($testepassa,0,5);
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape17;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1100,height=550')"><img src=editar.jpg width="40" height="32" border="0" alt="Incluir Novo Fornecedor"></a></td>
	 <?}

     //18
     $testepassa=$programarodape18."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape18;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=900,height=550')"><img src=delete.jpg width="32" height="32" border="0" alt="Deletar "></a></td>
	 <?}

     //19
     $testepassa=$programarodape19."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape19;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1100,height=550')"><img src=calendario.jpg width="32" height="32" border="0" alt="Ver Cronograma "></a></td>
	 <?}

     //21
     $testepassa=$programarodape21."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape21;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1100,height=550')"><img src=editar.jpg width="32" height="32" border="0" alt="Editar OS"></a></td>
	 <?}

     

     //23
	 $testepassa=$programarodape23."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape23;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=copia.jpg width="32" height="32" border="0" alt="Copiar"></a></td>
	 <?}
     //24
	 $testepassa=$programarodape24."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape24;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=finalizar.jpg width="32" height="32" border="0" alt="Finalizar uma Ordem Base"></a></td>
	 <?}

     //25
	 $testepassa=$programarodape25."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape25;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=detalhar.jpg width="32" height="32" border="0" alt="Detalhar ordens do Projeto"></a></td>
	 <?}
    
     //26
	 $testepassa=$programarodape26."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape26;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=novoregistro.jpg width="32" height="32" border="0" alt="Cadastrar Novo Projeto"></a></td>
	 <?}

     //27
	 $testepassa=$programarodape27."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {
	  $programarodape27=$programarodape27."?codigousuario=".$codigousuario."&codigoempresa=".$codigoempresa."&navegando=sim&banco=".$banco;
		 
		 ?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape27;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=arvore.jpg width="32" height="32" border="0" alt="Visualizar Arvore de Desmonte nivel a nivel"></a></td>
	 <?}

     //28
	 $testepassa=$programarodape28."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape28;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><img src=desenho.jpg width="32" height="32" border="0" alt="Visualizar Arvore em forma de desenho "></a></td>
	 <?}
     
	 
	 
	 //29
	 $testepassa=$programarodape29."teste";
     $testepassa=substr($testepassa,0,5);
	 
	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 	 <td><a href="<?echo $programa;?>&pagina=<?echo $pagina;?>&escolha=relacaosimulacao&mes=<?echo $mes;?>"><img src=gerente.jpg width="32" height="32" border="0" alt="Definir Usuário Gerente"></a></td>
	 
	 
	 <?}
	 
	 
	 //30
	 $testepassa=$programarodape30."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape30;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=890,height=520')"><?echo $labelprograma30;?></a></td>
	 <?}

	 //31
	 $testepassa=$programarodape31."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape31;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=720')"><?echo $labelprograma31;?></a></td>
	 <?}
	 
	 
	 //32
	 $testepassa=$programarodape32."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape32;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=720')"><?echo $labelprograma32;?></a></td>
	 <?}

	 //33
	 $testepassa=$programarodape33."teste";
     $testepassa=substr($testepassa,0,5);

	 if ($testepassa=="teste"){
	 
	 }
	 else
	 {?>
	 <td><a href="#" onClick="window.open('<?echo $programarodape33;?>','tela01','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=720')"><?echo $labelprograma33;?></a></td>
	 <?}
	 ?>
	 </font>
	 
	 

	 
