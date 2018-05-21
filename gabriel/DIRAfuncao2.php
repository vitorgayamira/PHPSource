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

<form name="formulario2">

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$funcaochegando=$_GET['funcaochegando'];


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



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$ano=$_POST['ano'];
$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];

}

 $programa="DIRAfuncao2.php";
 $numeroregistropagina="23";
 $programa10="?titulorodape=";

 //$programa=$programa9.$programa2.$programa3.$programa.$programa10.$titulorodape;
 $programa=$programa.$programa10.$titulorodape;

 $limiteacima=($numeroregistropagina*$pagina)-$numeroregistropagina;
 $limiteabaixo=$numeroregistropagina;


$contador66 = "SELECT COUNT(*) CONTADOR  
FROM FUNCAO_BI
";
$res = mysql_db_query($banco,$contador66,$conexao);
$valor8=mysql_fetch_array($res);
$ultimo=$valor8["CONTADOR"];



?>
<div id="mostratitulo">
<center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Cadastro de Telas </font>
<font style='font-size: 9px;color: white;text-align:left;bold: Negrito' >Banco:<?echo "$banco";?></font></br>

<a href="DIRAfuncao3.php?banco=<?echo $banco;?>&navegando=sim&codigoempresa=<?echo $codigoempresa;?>&codigousuario=<?echo $codigousuario;?>&pagina=1">
<img width=50 height=50 BORDER=1 src="atualizarfuncao.GIF"></a>

</font>
</br></br>
</div>
</br></br></br></br></br></br></br></br></br></br>






<?

$mostrarodape1="DIRAPAGINACAO.php";
$mostrarodape=$mostrarodape1;
//require $mostrarodape;




   $sql99 = "SELECT CD_FUNCAO CODIGO1,DS_FUNCAO DESCRICAO,
         CD_PROGRAMA PROGRAMA,ID_FUNCAO_DBA DBA
         FROM
         FUNCAO_BI
  ";




?>  


 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="830">

<tr>
<th style='font-size: 9px;text-align:left;bold: Negrito'>Codigo</th>
				<th style='font-size: 9px;text-align:left;bold: Negrito'>Função</th>
				<th style='font-size: 9px;text-align:left;bold: Negrito'>Programa</th>
                <th style='font-size: 9px;text-align:left;bold: Negrito'>Programa de DBA</th>
                

</tr>
 

<?



            $res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {
        	?>
			  
			        <tr>
                       
					<td ><?echo $valor["CODIGO1"];?></td>
					
					<td  align="left"><?echo $valor["DESCRICAO"];?></td>
				    
					<td  align="left"><?echo $valor["PROGRAMA"];?></td>
				    
                    <?
						IF ($dba=="N"){
						   $mostradba="Não";
					    }
					    else
				        {
				   		   $mostradba="Sim";
				  
				        }
						?>
					<td  align="left"><?echo $mostradba;?></td>
					
					
					
					
                    
                    
					
					</tr><?
					
					
			 
			 
			 }
 
 ?>
 </table>

 
 </form>

  




