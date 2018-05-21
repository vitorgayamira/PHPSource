<?
$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$baseoracle=$_GET['baseoracle'];
$localbanco=$_GET['localbanco'];
$ambiente=$_GET['ambiente'];
}
if ($continuarmesmatela=="sim"){
$localbanco=$_POST['localbanco'];
$banco=$_POST['banco'];
$ambiente=$_POST['ambiente'];
}

require("configuramysql.php");


require("configuraoracle.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>


<head>

<script language=javascript>



cont = 0;
function CheckAll4() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'listafamilia[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
var elem = document.getElementById("checar");
elem.innerHTML = "Desmarcar todos";
cont = 1;
} else {
var elem = document.getElementById("checar");
elem.innerHTML = "Marcar todos";
cont = 0;
}

}



</script>



</head>


<form action="LISTAEMPRESAS.php"  name="formulario" method="POST">








<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

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


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhas2=$_POST['quantaslinhas2'];
			$volumeano=$_POST['volumeano'];
			$quantidadedia=$_POST['quantidadedia'];
			$semanahoje=$_POST['semanahoje'];
			$tempo2=$_POST['tempo2'];
			$volume2=$_POST['volume2'];
			$destino=$_POST['destino'];
			$idade2=$_POST['idade2'];
			$semanaotimizacao=$_POST['semanaotimizacao'];
			$tempo3=$_POST['tempo3'];
                 $tempo4=$_POST['tempo4'];
                   $tempo5=$_POST['tempo5'];
                    $cabeca5=$_POST['cabeca5'];
                    $dataamostra=$_POST['dataamostra'];
                    $quantaslinhasamostra=$_POST['quantaslinhasamostra'];
                    $intervalo=$_POST['intervalo'];
                    $quantaslinhasfaixa=$_POST['quantaslinhasfaixa'];
                    $sexagem=$_POST['sexagem'];
                    $quantaslinhasvolume=$_POST['quantaslinhasvolume'];
                    $custototalsimulacao=$_POST['custototalsimulacao'];
                    $quantidadetotal5=$_POST['quantidadetotal5'];
                    $consumo5=$_POST['consumo5'];
                    $consumo6=$_POST['consumo6'];
                    $consumo7=$_POST['consumo7'];
                    $classi=$_POST['classi'];
                    $banco=$_POST['banco'];
                    $caixa=$_POST['caixa'];
                    $caixa2=$_POST['caixa2'];
                    $novogrupo=$_POST['novogrupo'];
                    $valor17=$_POST['valor17'];
                    $contadorfamilia=$_POST['contadorfamilia'];
                    $listafamilia=$_POST['listafamilia'];



}



$ano=date('Y');
 $programa="LISTAEMPRESAS.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 
 $achafiguramapa1 = "SELECT DS_FIGURA_UNIDADE_NEGOCIO from PARAMETRO_BI";
$achafiguramapa2 = mysql_db_query($banco,$achafiguramapa1,$conexao);
$achafiguramapa3=mysql_fetch_array($achafiguramapa2);
$figura=$achafiguramapa3["DS_FIGURA_UNIDADE_NEGOCIO"];

 //ajusta para mostrar por pagina
    $programa="LISTAEMPRESAS.php";
    $numeroregistropagina="20";

    $acha8 = OCIParse($ora_conexao, "SELECT COUNT(*) CONTADOR
    FROM  FABRICAS");
    OCIExecute($acha8, OCI_DEFAULT);
    While (OCIFetch($acha8)) {
      $ultimo=ociresult($acha8, "CONTADOR") ;
    }

    require("PAGINACAO.php");
//final do tratamento de paginas



 ?>


<center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Listagem de Unidades de Negócio</font></br>
<hr>








<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?echo $localbanco;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>






<?
if (!IsSet($escolha) or $escolha=="1"  ){
?>

<center><table border=0 width=380><tr><td>
<map name="mapa1">
<area alt="coração" shape="CIRCLE" coords="55,248,9" href="FABRICAS.php?itemestudo=18&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >

<area alt="Fábrica" shape="CIRCLE" coords="290,188,15" href="FABRICAS.php?tipolocal=fabrica&local=15&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>">
</map>
<img src="<?echo $figura;?>" width="444" height="328  border=0 usemap="#mapa1">
</table>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">
 <tr >
  <th>Codigo</th>
  <th>Descrição</th>
  <th>Matriz</th>
  <th>Filial</th>


</tr>
<?

  $s = OCIParse($ora_conexao, "select *
  from ( select /*+ FIRST_ROWS(20) */
  topn.*, ROWNUM rnum
      from ( SELECT  CODIGO,DESCRICAO,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO FROM PESSOA_BI where id_tipo_PESSOA='2' order BY ROWID )
      topn
      where ROWNUM <= $limiteabaixo)
      where rnum  >= $limiteacima");
      OCIExecute($s, OCI_DEFAULT);
      While (OCIFetch($s)) {



          $codigo=ociresult($s, "CODIGO") ;
          $descricao=ociresult($s, "DESCRICAO") ;
          $matriz=ociresult($s, "ID_MATRIZ") ;
          $filial=ociresult($s, "ID_FILIAL") ;
          $terceiro=ociresult($s, "ID_FORNECEDOR_SERVICO") ;

          /*
          //QUANDO QUISER RECUPERAR DA BASE PARA JOGAR EM POUTRA
          $result2 = "select MAX(CODIGO) DISTR FROM
                 PESSOA_BI";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "DISTR") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}

                 ECHO "insert into PESSOA_BI(CODIGO,DESCRICAO,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO)
                 VALUES('$maxima2','$descricao','2','N','N','S')</BR>";
                 $sgrava1= OCIParse($ora_conexao, "insert into PESSOA_BI(CODIGO,DESCRICAO,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO)
                 VALUES('$maxima2','$descricao','2','N','N','S')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);
               */

   ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $codigo;?> </td>
   <td><?echo $descricao;?> </td>
   <td><?echo $matriz;?> </td>
   <td><?echo $filial;?> </td>


   </tr>

   <?


}
?>
</TABLE>

<?

}

if ($escolha=="novoregistro"){



if ($tela=="0"){

?>
Criando Regiões</br>

Descrição :<input type="txt" name="novogrupo" size="35"  >




        <input type="hidden" name="escolha" size="5" value="3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">



		<input  type="submit"     VALUE="GRAVAR">




<?

}//FINAL DA ESCOLHA=0


if ($tela=="1"){

?>
Ação:Eliminando</br>
   <input type=checkbox name="selall" onClick="CheckAll4()">
   <span id="checar">Marcar todos</span>

<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

				<th>Descrição</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>

				 <?
				 $contadorfamilia="0";
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $contadorfamilia=$contadorfamilia+1;
                 ?>
                    <tr>

					<td><?echo $row["DS_FABRICA"];?></td>
					<td ><input type="checkbox" name="listafamilia[]" value="<?echo $row["CD_FABRICA"];?>"></td>
                    </tr>
                 <?

                 }
				 ?>



	</table>




        <input type="hidden" name="escolha" size="5" value="4" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="contadorfamilia" value="<?echo $contadorfamilia;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">



		<input  type="submit"     VALUE="Confirma">




<?

}//FINAL DA ESCOLHA=0





}  //FINAL DA SEGUNDA TELA




if ($escolha=="3"){

                 $result2 = "select MAX(CD_REGIAO) REGIAO FROM
                 REGIAO";
                 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $sequencia1=ociresult($result3, "REGIAO") ;
                 }
                 IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}



                 $sgrava1= OCIParse($ora_conexao, "insert into REGIAO(CD_REGIAO,DS_REGIAO) VALUES('$maxima2','$novogrupo')");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);



?><center><?echo "Final da Ação ";


} //final da escolha


if ($escolha=="4"){//ELIMINANDO



  for ($passa=0;$passa <=$contadorfamilia;$passa++)
  {

  $criafinal=$listafamilia[$passa];
  if ($criafinal>"0"){



                           $sgrava1= OCIParse($ora_conexao, "DELETE FROM FABRICAS WHERE CD_FABRICA='$criafinal'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);


  }

  }


?><center><?echo "Final da Eliminacao";


}





?>


</form>


