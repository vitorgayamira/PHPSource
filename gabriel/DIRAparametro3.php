<?
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");

//require_once("estilo2.css");

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
$titulo=$_GET['titulo'];



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
$banco=$_POST['banco'];
$nova=$_POST['nova'];
$itemmestre2=$_POST['itemmestre'];


}


//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];




///////////////////////////////////////////////inicio do rodape dinamico
 $programa="DIRAparametro3.php";
 $numeroregistropagina="23";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";



?>



<form action="DIRAparametro3.php" method="POST">

<center><h2><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Definindo Itens Mestres para Estudo de Rendimento</font></h2>


 

<a href="<?echo $programa;?>?pagina=1&escolha=novoregistro&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&titulo=Associando Produto a Familia de MP"><img width=50 height=60 BORDER=1 src="atualizar.GIF" >
</a>




<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="VOLTAR.GIF">
</a>



<?
if (!IsSet($escolha)){

 ?>  
 </br>

 Opção:<select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="nova">
					<option value="">Nenhum</option>
					<option value="A">Ativar</option>
					<option value="D">Desativar</option>
					</select>  


 <tr>
 <td width="50%">
  Item:
 </td>
 <td width="50%">
 		 <select name="itemmestre">
				 <option value=""></option>
				 <? 
				 
				 $result2 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI where cd_material not in (SELECT a.cd_material
         FROM
         FAMILIA_MATERIA_PRIMA_BI b, ITEM_PRODUCAO_FAMILIA_BI a,ITEM_PRODUCAO_BI c
	     where
	     a.cd_familia=b.cd_familia and
	     a.cd_material=c.cd_material) AND CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
         order by DS_MATERIAL ASC";
				 $res = mysql_db_query($banco,$result2,$conexao);
                 while ($valor=mysql_fetch_array($res)){

				 
					print "<option value=\"{$valor["CD_MATERIAL"]}\">{$valor["DS_MATERIAL"]}</option>"; 
				 
				 }
				 ?> 
				 </select></br>
 </td>
 </tr>
   </table>		 

 
  <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA";?>" >

<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">


<input  type="submit"     VALUE="GRAVAR">
 
 

  
 <?


}
else
{



IF ($nova=="A"){
$grava = "update  ITEM_PRODUCAO_BI  set id_mestre_rendimento='S' where cd_material=' $itemmestre2' AND CD_EMPRESA='$codigoempresa'
and CD_VARIACAO='$variacao3'";
//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



  $sqlachaitem8 = "SELECT a.cd_material CODIGO1
         FROM
         FAMILIA_MATERIA_PRIMA_BI b, ITEM_PRODUCAO_FAMILIA_BI a,ITEM_PRODUCAO_BI c
	     where
	     a.cd_familia=b.cd_familia and
	     a.cd_material=c.cd_material AND
         a.CD_EMPRESA='$codigoempresa' and a.CD_VARIACAO='$variacao3'
   ";
   $sqlachaitem81 = mysql_db_query($banco,$sqlachaitem8,$conexao);
                                        while ($sqlachaitem82=mysql_fetch_array($sqlachaitem81)){
                                            $itemgrava6=$sqlachaitem82["CODIGO1"];
                                            
                                            $achacontador1="select COUNT(*) CONTADOR FROM AGRUPA_RENDIMENTO_BI WHERE CD_ITEM='$itemgrava6' AND
                                            CD_ITEM_MESTRE='$itemmestre2' and CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'";
                                            $achacontador2= mysql_db_query($banco,$achacontador1,$conexao);
                                            $achacontador3=mysql_fetch_array($achacontador2);
                                            $contador77=$achacontador3["CONTADOR"];
                                            
                                            if ($contador77=="0"){
                                            
                                            $sequencia1  = "select MAX(NR_SEQUENCIA) SEQUENCIA from AGRUPA_RENDIMENTO_BI ";
                                            $res7 = mysql_db_query($banco,$sequencia1 ,$conexao);
                                            $totallinha35=mysql_fetch_array($res7);
                                            $sequencia=$totallinha35["SEQUENCIA"];
                                            IF ($sequencia >"0"){
                                               $sequencia=$sequencia+1;
	                                        }
	                                        ELSE
	                                        {
	                                         $sequencia="1";

	                                        }
                                            $grava = "insert into AGRUPA_RENDIMENTO_BI (NR_SEQUENCIA,CD_ITEM,CD_ITEM_MESTRE,VL_PARTICIPACAO,cd_empresa,cd_variacao) VALUES
                                            ('$sequencia' ,'$itemgrava6','$itemmestre2','0','$codigoempresa','$variacao3')
                                            ";
                                            echo "$grava";
                                            $res = mysql_db_query($banco,$grava,$conexao);
                                            }

                                         }

}
ELSE
{
$grava = "update ITEM_PRODUCAO_BI  set id_mestre_rendimento='N' where cd_material=' $itemmestre2' and
CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
";
//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);   

}
?>
<CENTER><? echo "FINAL DA ATUALIZAÇÃO";   

}
?>

</form>

