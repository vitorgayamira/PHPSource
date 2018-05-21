<form name="form" method="POST" action="slidefotomaquina.php" >
<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($continuarmesmatela=="sim"){
$inicioslide=$_POST['inicioslide'];
$banco=$_POST['banco'];
$pagina=$_POST['pagina'];
}

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$codigomaquina=$_GET['codigomaquina'];
$banco=$_GET['banco'];
$slide=$_GET['slide'];
$totalpagina=$_GET['totalpagina'];
$regiao=$_GET['regiao'];
$fabrica=$_GET['fabrica'];
$maximo=$_GET['maximo'];
$minimo=$_GET['minimo'];


}
require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");


?>
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Slide de Imagens</font><hr>



<?






if (!IsSet($slide)){

                       $elimina1= OCIParse($ora_conexao, "delete from  AUX_FOTO WHERE CD_USUARIO='$codigousuario'");
                       OCIExecute($elimina1, OCI_DEFAULT);
                       oci_commit($ora_conexao);




                       
                       $quantoss197 = OCIParse($ora_conexao, "select FOTO,TIPO   from FOTOS WHERE CD_MAQUINA='$codigomaquina'");
                       OCIExecute($quantoss197, OCI_DEFAULT);
                       While (OCIFetch($quantoss197)) {
                           $foto=ociresult($quantoss197, "FOTO") ;
                           $extensao=ociresult($quantoss197, "TIPO") ;

                           $caminho=$foto.".".$extensao;

                           $quantoss1966 = OCIParse($ora_conexao, "select MAX(NR_SEQUENCIA) VALOR FROM AUX_FOTO");
                           OCIExecute($quantoss1966, OCI_DEFAULT);
                           While (OCIFetch($quantoss1966)) {
                             $sequencia1=ociresult($quantoss1966, "VALOR") ;
                             if ($sequencia1 >"0"){$sequenciagrava=$sequencia1+1;}else{$sequenciagrava="1";}
                           }



                           $sgrava1= OCIParse($ora_conexao, "insert into AUX_FOTO(NR_SEQUENCIA,DS_FOTO,CD_USUARIO) VALUES(
                          '$sequenciagrava','$caminho','$codigousuario')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


                       }
                       
                       $quantoss19667 = OCIParse($ora_conexao, "select count(*) VALOR FROM AUX_FOTO where cd_usuario='$codigousuario'");
                           OCIExecute($quantoss19667, OCI_DEFAULT);
                           While (OCIFetch($quantoss19667)) {
                             $totalpagina=ociresult($quantoss19667, "VALOR") ;

                            }

                            $quantoss196678 = OCIParse($ora_conexao, "select MAX(nr_sequencia) VALOR FROM AUX_FOTO where cd_usuario='$codigousuario'");
                           OCIExecute($quantoss196678, OCI_DEFAULT);
                           While (OCIFetch($quantoss196678)) {
                             $maximo=ociresult($quantoss196678, "VALOR") ;

                            }

                            $quantoss1966789 = OCIParse($ora_conexao, "select MIN(nr_sequencia) VALOR FROM AUX_FOTO where cd_usuario='$codigousuario'");
                           OCIExecute($quantoss1966789, OCI_DEFAULT);
                           While (OCIFetch($quantoss1966789)) {
                             $minimo=ociresult($quantoss1966789, "VALOR") ;

                            }


 
     //echo "Maquina:$codigomaquina-->Local das Fotos:$local-->Caminho de Leitura:$caminho</br>";

    if (!IsSet($pagina)){
      $pagina=$minimo;
      $paginaanterior=$minimo;
      $paginaposterior=$minimo+1;
    }
    
                           $quantoss19667897 = OCIParse($ora_conexao, "select DS_FOTO FROM AUX_FOTO where cd_usuario='$codigousuario' AND
                           NR_SEQUENCIA='$pagina'");
                           OCIExecute($quantoss19667897, OCI_DEFAULT);
                           While (OCIFetch($quantoss19667897)) {
                             $fotomostra=ociresult($quantoss19667897, "DS_FOTO") ;

                            }
                            
// echo "slide:$slide//Foto:$fotomostra//pagina:$pagina//maxima:$maximo//minimo:$minimo//fabrica:$fabrica</br>";
$numerodefotos=($maximo-$minimo)+1;
echo "usuario:$codigousuario</br>";
echo "Total de Fotos:$numerodefotos</br>";
$programa="slidefotomaquina.php";

    $mostra6=$mostra6."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=$minimo&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica;
	$mostra6=$mostra6."><img src=inicio.gif width=25 height=25 border=0>";
	$mostra6=$mostra6."</a>";
	echo "$mostra6";
	




if ($pagina >="1" and $pagina < $maximo){

 $mostra4=$mostra4."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$minimo."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra4=$mostra4."><img src=proxima.gif width=25 height=25 border=0>";
	$mostra4=$mostra4."</a>";
	echo "$mostra4";
}


if ($pagina >$minimo and $pagina < $maximo){
	 $mostra2=$mostra2."<a href=".$programa."?produtopassa=".$produtopassa."&banco=".$banco."&mostrartela=".$mostrartela."&tipos=".$tipos."&limiteabaixo=".$limiteabaixo."&limiteacima=".$limiteacima."&pagina=".$paginaanterior."&vempaginacao=sim"."&inicioslide=".$inicioslide."&ano=".$ano."&data1=".$data1."&turnopesquisa=".$turnopesquisa."&grupopesquisa=".$grupopesquisa."&familiapesquisa=".$familiapesquisa."&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;

	 $mostra2=$mostra2."><img src=anterior.gif width=25 height=25 border=0>";

	 $mostra2=$mostra2."</a>";

   echo "$mostra2";
 }

if ($pagina == $maximo and $pagina>$minimo){



	$mostra3=$mostra2."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$minimo."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra3=$mostra3."><img src=anterior.gif width=25 height=25 border=0>";
    $mostra3=$mostra3."</a>";
    echo "$mostra3";
}

$mostra5=$mostra5."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=$maximo&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
$mostra5=$mostra5."><img src=final.gif width=25 height=25 border=0>";
$mostra5=$mostra5."</a>";
echo "$mostra5";?>



<center><img src="<?echo $fotomostra;?>" width="560" height="620"></br>

	


                            
<?
}
else
{


$numerodefotos=($maximo-$minimo)+1;
echo "Total de Fotos:$numerodefotos</br>";


$paginaanterior=$pagina-1;
$paginaposterior=$pagina+1;



 $mostra6=$mostra6."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$minimo."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra6=$mostra6."><img src=inicio.gif width=25 height=25 border=0>";
	$mostra6=$mostra6."</a>";
	echo "$mostra6";





if ($pagina >=$minimo and $pagina < $maximo){

 $mostra4=$mostra4."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$paginaposterior."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra4=$mostra4."><img src=proxima.gif width=25 height=25 border=0>";
	$mostra4=$mostra4."</a>";
	echo "$mostra4";
}


if ($pagina >$minimo and $pagina <= $maximo){
	 $mostra2=$mostra2."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$paginaanterior."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;

	 $mostra2=$mostra2."><img src=anterior.gif width=25 height=25 border=0>";

	 $mostra2=$mostra2."</a>";

   echo "$mostra2";
 }

if ($pagina == $minimo and $pagina>$minimo){



	$mostra3=$mostra2."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$paginaanterior."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra3=$mostra3."><img src=bnext.gif>";
    $mostra3=$mostra3."</a>";
    echo "$mostra3";
}

$mostra5=$mostra5."<a href=".$programa."?banco=".$banco."&codigousuario=".$codigousuario."&pagina=".$maximo."&totalpagina=".$totalpagina."&navegando=sim&slide=sim&tipoconsulta=".$tipoconsulta."&regiao=".$regiao."&fabrica=".$fabrica."&maximo=".$maximo."&minimo=".$minimo;
	$mostra5=$mostra5."><img src=final.gif width=25 height=25 border=0>";
	$mostra5=$mostra5."</a>";
	echo "$mostra5";


                            
                             $quantoss19667897 = OCIParse($ora_conexao, "select DS_FOTO FROM AUX_FOTO where cd_usuario='$codigousuario'
                             AND NR_SEQUENCIA='$pagina'");
                           OCIExecute($quantoss19667897, OCI_DEFAULT);
                           While (OCIFetch($quantoss19667897)) {
                             $fotomostra=ociresult($quantoss19667897, "DS_FOTO") ;

                            }



   



   
?>
</br>
<center><img src="<?echo $fotomostra;?>" width="560" height="620"></br>
<?}?>

</form> 

  




