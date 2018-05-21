<?

$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>

<head>
<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var funcaochegando = what.value;
      document.location=(funcaochegando);
   }
}



</Script>






</head>

<form action="FABRICAS.php" method="POST">

 <style>
#primeira{
 border:0px solid black;

 font-weight:bold;
 font-size:18px; height:250px;
 height:690px;
 width:620px;
 margin-left:0px;
 margin-top:0px;
 float:left;


 }
 #segunda{
 border:0px solid black;
 font-weight:bold;
 font-size:18px; height:250px;
 height:690px;
 width:400px;
 margin-right:0px;
 float: right;

 }
 </style>







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
$tipolocal=$_GET['tipolocal'];


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
                    $novoveiculo=$_POST['novoveiculo'];
                    $banco=$_POST['banco'];
                    $descricaoveiculo=$_POST['descricaoveiculo'];
                    $capacidade=$_POST['capacidade'];
                    $novaempresa=$_POST['novaempresa'];
                    $descricaoplaca=$_POST['descricaoplaca'];
                    $grupo8=$_POST['grupo8'];
                    $hora4=$_POST['hora4'];
                    $hora41=$_POST['hora41'];
                    $hora5=$_POST['hora5'];
                    $hora51=$_POST['hora51'];




}

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO,DS_VARIACAO DESCRICAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO
FROM USUARIO_BI where CD_USUARIO='$codigousuario')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];
$descricaovariacao3=$valor87["DESCRICAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];

$usu18 = "SELECT DS_RACA FROM RACA_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$raca6=$valor87["DS_RACA"];


$usu185 = "SELECT b.nr_lote LOTE5,b.DS_LOTE LOTE from CURVA_BI a,LOTE_BI b
                where a.nr_lote=b.nr_lote AND
			    ID_CURVA IN (SELECT ID_CURVA FROM PARAMETRO_BI)";

$res855 = mysql_db_query($banco,$usu185,$conexao);
$valor8755=mysql_fetch_array($res855);
$numerolote=$valor8755["LOTE5"];

$achafiguramapa1 = "SELECT DS_FIGURA_UNIDADE_NEGOCIO from PARAMETRO_BI";
$achafiguramapa2 = mysql_db_query($banco,$achafiguramapa1,$conexao);
$achafiguramapa3=mysql_fetch_array($achafiguramapa2);
$figura=$achafiguramapa3["DS_FIGURA_UNIDADE_NEGOCIO"];





$ano=date('Y');
 $programa="FABRICAS.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";



 $programa=$programa.$programa10.$titulorodape;



 ?>



<center><h2>Unidades de Negócio da Empresa</h2>
<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=atualizar"><img width=50 height=60 BORDER=1 src="atualizar.GIF" >
</a>



<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="eliminar.GIF">
</a>
<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="OTIMIZAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="HABILITAR.GIF">
</a>

<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="DESABILITAR.GIF">
</a>

<?
if (!IsSet($tipolocal) or ($tipolocal=="unidades") ){

?>
<center><table border=0 width=380><tr><td>
<map name="mapa1">
<area alt="coração" shape="CIRCLE" coords="55,248,9" href="FABRICAS.php?itemestudo=18&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >

<area alt="Fábrica" shape="CIRCLE" coords="290,188,15" href="FABRICAS.php?tipolocal=fabrica&local=15&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>">
</map>
<img src="<?echo $figura;?>" width="444" height="328  border=0 usemap="#mapa1">
</table>

<?}?>

<?
if ($tipolocal=="fabrica") {

?>
<table border=0 width=380><tr><td>
<map name="mapa1">
<area alt="coração" shape="CIRCLE" coords="55,248,9" href="FABRICAS.php?itemestudo=18&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>" >

<area alt="Fábrica" shape="CIRCLE" coords="290,188,15" href="FABRICAS.php?tipolocal=fabrica&local=15&navegando=sim&banco=<?echo $banco;?>&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&mostrarcortado=<?echo $mostrarcortado;?>">
</map>
<img src="plantasetores1.jpg" width="400" height="400"  border="0" usemap="#mapa1">
</table>

<?}?>


<?
if (!IsSet($escolha) or $escolha=="1"  ){
?>

</BR>

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="40%">
<tr >
  <th><h1 style='font-size: 9px;color: white;text-align:left;bold: Negrito text-decoration: none' >Codigo</th>
  <th><h1 style='font-size: 9px;color: white;text-align:left;bold: Negrito text-decoration: none' >Unidade Negócio</th>


</tr>
<?
 $quantaslinhasamostra="0";
 
 /*$sqlacharita5 = "select a.CODIGO CODIGO, a.DESCRICAO DESCRICAO,a.ID_FILIAL FILIAL,a.ID_FABRICA_RACAO ID_FABRICA_RACAO,
 a.VL_HORA_INICIO_ABATE VL_HORA_INICIO_ABATE,a.VL_HORA_FINAL_ABATE VL_HORA_FINAL_ABATE,a.VL_ABATE_HORA VL_ABATE_HORA,
 b.VL_CABECA_ANO VALOR1,a.VL_CAPACIDADE_DIA DIA,VL_HORA_INICIO_TRASP_RAC HORATRANSP1,VL_HORA_FINAL_TRASP_RAC HORATRANSP2
   FROM PESSOA_BI a
   where a.id_tipo_pessoa='2'  AND
   a.codigo=b.cd_empresa
   and b.nr_lote_padrao='$numerolote'
";
*/

 $sqlacharita5 = "select CODIGO CODIGO, DESCRICAO DESCRICAO   FROM PESSOA_BI
   where id_tipo_pessoa='2'
   ";



 $sqlacharita51 = mysql_db_query($banco,$sqlacharita5,$conexao);

 while ($valor71=mysql_fetch_array($sqlacharita51)){
   $valor=$valor71["VALOR1"]/240;

   ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $valor71["CODIGO"];?> </td>
   <td><?echo $valor71["DESCRICAO"];?></td>



   </tr>
<?
}
?>
</TABLE>

<?

}

if ($escolha=="atualizar"){





?>
Atualizando</br>

Fabrica:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novaempresa">
					<option value="">Nenhuma</option>

					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from PESSOA_BI WHERE id_tipo_pessoa='2' AND ID_BASE='S'";
					 $res = mysql_db_query($banco,$stmt1,$conexao);
                     while ($stmt12=mysql_fetch_array($res)){
					 print "<option value=\"{$stmt12["CODIGO"]}\">{$stmt12["DESCRICAO"]}</option>";
					 }
					 ?>
					 </select></br>


  
  
  Cab. Dia:<input type="txt" name="tempo3" size="5" value="0" ></br>
  
  Hora Inicio Abate:<input type="txt" name="hora4" size="5" value="08" >-Minuto:<input type="txt" name="hora41" size="5" value="00" ></br>
  Hora Final Abate:<input type="txt" name="hora5" size="5" value="13" >-Minuto:<input type="txt" name="hora51" size="5" value="00" ></br>

  



        <input type="hidden" name="escolha" size="5" value="3" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
        <input  type="submit"     VALUE="GRAVAR">



<?



}//final dos registros









if ($escolha=="3"){

             $gravahora1=$hora4.":".$hora41;

             $gravahora2=$hora5.":".$hora51;

            $sql = "UPDATE PESSOA_BI SET VL_HORA_INICIO_ABATE='$gravahora1',VL_HORA_FINAL_ABATE='$gravahora2'  where codigo='$novaempresa' ";
            $res = mysql_db_query($banco,$sql ,$conexao);

            $achabate1 = "SELECT VL_HORA_INICIO_ABATE VALOR1,VL_HORA_FINAL_ABATE VALOR2
            FROM PESSOA_BI WHERE CODIGO='$novaempresa' ";
   	        $achabate12 = mysql_db_query($banco,$achabate1,$conexao);
            $achabate13=mysql_fetch_array($achabate12);
            $horaabate1=$achabate13["VALOR1"];
            $horaabate2=$achabate13["VALOR2"];

            $times66 = array($horaabate1);
            $times67 = array($horaabate2);



            foreach ( $times66 as $time66 ){
            list( $g66, $i66 ) = explode( ':', $time66 );

               $horaabate66 += $g66;
               $horaabate66 += $i66/60;

            }

              foreach ( $times67 as $time67 ){
            list( $g67, $i67 ) = explode( ':', $time67 );

               $horaabate67 += $g67;
               $horaabate67 += $i67/60;

            }
            $intervalo=($horaabate67-$horaabate66);

          $capacidadeano=$tempo3*240;
          if ($intervalo >"0"){$capacidadehora=$tempo3/$intervalo;}else{$capacidadehora="0";}
          

          


         $sql = "UPDATE PESSOA_BI SET VL_ABATE_HORA='$capacidadehora',VL_CAPACIDADE_DIA='$tempo3'  where codigo='$novaempresa' ";
         //ECHO "</br>$sql";
         $res = mysql_db_query($banco,$sql ,$conexao);
         
          $sql = "UPDATE PARAMETRO_ORIGINACAO_BI  SET VL_CABECA_ANO='$capacidadeano', VL_CAPACIDADE_DIA='$tempo3'
          where cd_empresa='$novaempresa' and
          nr_lote_padrao='$numerolote'";
          //ECHO "</br>$sql";
          $res = mysql_db_query($banco,$sql ,$conexao);
          ?><center><?echo "Final da Ação";

} //final da escolha




?>


</form>


