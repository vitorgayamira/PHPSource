<?
//session_start();
require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");
?>

<form action="<? echo $programa;?>" method="POST">

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
$subproduto=$_POST['subproduto'];
$meio=$_POST['meio'];
$mpcms=$_POST['mpcms'];
$desconto=$_POST['desconto'];
$meio=$_POST['meio'];
$subproduto=$_POST['subproduto'];
$rendi=$_POST['rendi'];
$rendi45=$_POST['rendi45'];
$valormaquina=$_POST['valormaquina'];



}

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO
IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];

//acha VARIACAO PADRAO
$usu18 = "SELECT CD_EMPRESA FROM PARAMETRO_BI";
//echo "$usu18";
$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$codigoempresa=$valor87["CD_EMPRESA"];

$ano=date('Y');
$programa="DIRAparametrizacao2.php";

$usu18QUANTOS = "SELECT COUNT(*) CONTADOR FROM USUARIO_GRUPO_BI WHERE ID_PARAMETRIZA_RENDIMENTO='S' AND CD_USUARIO='$codigousuario'";
//echo "$usu18";
$usu18QUANTOS1 = mysql_db_query($banco,$usu18QUANTOS,$conexao);
$usu18QUANTOS2=mysql_fetch_array($usu18QUANTOS1);
$contadorrendi=$usu18QUANTOS2["CONTADOR"];



 ?>
 
<font style='font-size: 19px;color: red;text-align:left;bold: Negrito' >Parametrização de Rendimento</font><hr>


<?if ($contadorrendi >"0"){

?>
<a href="<?echo $programa;?>?pagina=1&escolha=novoregistro&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1 src="atualizar.GIF" >
</a>
<?
}
?>



<a href="<?echo $programa;?>?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=1"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>






<?

if (!IsSet($escolha) or ($escolha=="1")){ 
 $titulorodape="Parametrizando Itens para Estudo de Rendimento";

///////////////////////////////////////////////inicio do rodape dinamico
 $programa="DIRAparametrizacao2.php";
 $numeroregistropagina="18";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="&titulorodape=";

 $programa=$programa9.$programa2.$programa3.$programa.$programa10.$titulorodape;

 $limiteacima=($numeroregistropagina*$pagina)-$numeroregistropagina;
 $limiteabaixo=$numeroregistropagina;
  

 $labelprograma = array('<img src=liberar.jpg width="32" height="32" border="0" alt="Definir Parametrização">');
 $numeroitensrodape="1";
 $numeroitensrodapefinal=$numeroitensrodape-1;
 for ($i='0';$i <=$numeroitensrodapefinal;$i++){ 
    $acha=$labelprograma[$i];
  
 }


 






$contador66 = "SELECT count(*) CONTADOR  
from ITEM_PRODUCAO_BI  where 
CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
";
$res = mysql_db_query($banco,$contador66,$conexao);
$valor8=mysql_fetch_array($res);
$ultimo=$valor8["CONTADOR"];





   $sql99 = "SELECT a.cd_material CODIGO1,a.ds_material DESCRICAO,a.cd_material_erp PEGA5,b.pr_rendimento_vivo  PEGA6
         FROM
         ITEM_PRODUCAO_BI a,ABSORCAO_MP_BI b
	     where
		 a.cd_material=b.cd_item  and 
         a.CD_EMPRESA='$codigoempresa' and a.CD_VARIACAO='$variacao3' and
         b.CD_EMPRESA='$codigoempresa' and b.CD_VARIACAO='$variacao3'
  ";


?>  








<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="750">

<tr>

                <th>Codigo</th>
				<th>Item</th>
				<th>Cirurgico(%)</th>
				<th>Mp CMS</th>
				<th>Itens </br>Subproduto</th>
                <th>Itens para</br>Desconto CMS</th>
				<th>Itens para</br>Estudo CMS</th>
				<th>Previsão de Kg CMS por</th>
				<th>Itens Final</br>Desconto Rend.</th>
				<th>Itens Meio Arvore</br>Desconto Rend.</th>
</tr>
 

<?



            $res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {
        	
			  
			       
		       $codigomat=$valor["CODIGO1"]; 
			   $pega6=$valor["PEGA6"];
			   $pega78=$valor["PEGA7"];
			   
				?>
			  
			        <tr>
                       
					<td> 
                    <?echo $valor["CODIGO1"];?></td>
					
					<td><?echo $valor["DESCRICAO"];?></td>
				    <td  align="RIGHT"><?echo $pega6;?></td>
					<?
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_MP_CMS='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
				    
					<?
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					?>
                    <?
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_SUBPRODUTO='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
				    
					<?
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					?>
                    <?
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_DESCONTO_CMS='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
				    
					<?
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					?>
					<?
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_MEIO_ARVORE_CMS='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
					<?
				    }
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_MEIO_ARVORE_CMS='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					
                     $contador668 = "SELECT COUNT(*) CONTADOR  
                     FROM APONTAMENTO_ITEM_BI A,ITEM_PRODUCAO_BI B  WHERE 
	                 B.CD_MATERIAL=A.CD_MATERIAL AND 
	                 B.CD_MATERIAL='$codigomat' AND
	                 A.CD_EMPRESA='$codigoempresa' and
	                 A.CD_VARIACAO='$variacao3'";
                     $res88 = mysql_db_query($banco,$contador668,$conexao);
                     $valor87=mysql_fetch_array($res88);
                     $ultimo7=$valor87["CONTADOR"];
                       IF ($ultimo7 >"0"){
                      ?>
					  <td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Apontamento";?></td>
                      <?}
					  ELSE
					  {
					  ?>
					  <td><h1 style='font-size: 9px;color: balck;text-align:center;bold: Negrito text-decoration: none'><?echo "Calculo";?></td>
                      <?	
					  } 
				    
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					
					
                    $sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_DESCONTO_RENDIMENTO='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
				    
					<?
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					

					$sql995 = "SELECT count(*) CONTADOR FROM ITEM_PRODUCAO_BI WHERE ID_GERA_DESCONTO_MEIO_RENDIMENTO='S' AND CD_MATERIAL='$codigomat' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' ";
                    //ECHO "$sql995";
					$res44 = mysql_db_query($banco,$sql995,$conexao);
                    $valor82=mysql_fetch_array($res44);
                    $contador5=$valor82["CONTADOR"];

					IF ($contador5 >"0"){
					?>
					<td><h1 style='font-size: 9px;color: black;text-align:center;bold: Negrito text-decoration: none'><?echo "Sim";?></td>
				    
					<?
					}
					else
				    {
					?>
					<td><?echo "-";?></td>
				    
					<?
					}
					?>

					</tr><?
					
					
					
			 
			 
			 }
 
 ?>
 </table>
  

 
<?}//final da primeira tela

 if ($escolha=="novoregistro"){



 if ($tela=="0"){
        $titulorodape="Parametrizando Itens";
        ?> </br>

         Definindo Parametros

 
 
 <center><table class="MsoTableGrid" border="0" bgcolor="#FFA500"width="350">
 
   
	
	<tr>
	<td>MP Final de Arvore que vai gerar  CMS</td>
	<td><select    name="mpcms" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL in (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='S' AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')
					";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>
	<tr>
	<td>Item Meio Arvore que vai gerar Subproduto Farinhas</td>
	<td><select    name="subproduto" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL IN (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='N' AND ID_SUBPRODUTO='S' AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>
	
	<tr bgcolor="#FF8C00">
	<td>MP Final de Arvore que vai Descontar do Total de MP_CMS(MP_DORSO,MP_PECOCO)</td>
	<td><select    name="desconto" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL IN (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='S'  AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>

	<tr bgcolor="#FF8C00">
	<td>Item Meio Arvore que vai Gerar  CMS (dorsos,dorso leg,pecoco,osso coxa..etc)</td>
	<td><select    name="meio" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL IN (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='N' AND ID_SUBPRODUTO='S' AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>
	
	<tr bgcolor="#FF8C00">
	<td>Item Final de Arvore que Desconto Rendimento( Os que vao para subproduto,producao de cms,o proprio cms, algumas MP  que sao compostas de coxa com peito etc)</td>
	<td><select    name="rendi" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL IN (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='S' AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>
	
	<tr bgcolor="#FF8C00">
	<td>Item Meio Arvore para que Desconto Rendimento( Os que vao para subproduto,producao de cms,o proprio cms, algumas MP  que sao compostas de coxa com peito etc)</td>
	<td><select    name="rendi45" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option></br>
					
					<?
					 $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL from ITEM_PRODUCAO_BI WHERE CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3' AND CD_MATERIAL IN (select CODIGO_FILHO FROM ESTRUTURA_DESMONTE_BI WHERE ID_FINAL_ARVORE='N' AND ID_SUBPRODUTO='S' AND
					 CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3')";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);
                     
                     while ($res9=mysql_fetch_array($res98)){
                    		 
					 
					 print "<option value=\"{$res9["CD_MATERIAL"]}\">{$res9["DS_MATERIAL"]}</option>";
					   
					 }
					 ?>
					
					
					
					 </select> </td> 
	</tr>
	
    <tr>
    <?
    $contador66 = "SELECT vl_rendimento_maquina_cms VALOR FROM PARAMETRO_BI";
$res = mysql_db_query($banco,$contador66,$conexao);
$valor8=mysql_fetch_array($res);
$valormaquina6=$valor8["VALOR"];

    ?>
    <td>Valor de Rendimento Maquina CMS(75%)</td>
    <td><input type="txt" name="valormaquina" value="<?echo $valormaquina6;?>"></td>


    </tr>
	
	

   </table>

 
 <input type="hidden" name="escolha" size="5" value="2" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
        <input  type="submit"     VALUE="GRAVAR">
 
 <?
  }
  
  


}

if ($escolha=="2"){ 

$sql = "UPDATE PARAMETRO_BI  SET vl_rendimento_maquina_cms ='$valormaquina'";

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_MP_CMS='S' WHERE CD_MATERIAL='$mpcms' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'"; 

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_GERA_SUBPRODUTO='S',id_mestre_rend_subpro='S' WHERE CD_MATERIAL='$subproduto' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'";

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_GERA_DESCONTO_CMS='S' WHERE CD_MATERIAL='$desconto' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'";

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_GERA_MEIO_ARVORE_CMS='S',ID_TIPO_CALCULO_CMS='1' WHERE CD_MATERIAL='$meio' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'";

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_GERA_DESCONTO_RENDIMENTO='S' WHERE CD_MATERIAL='$rendi' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'"; 

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

$sql = "UPDATE ITEM_PRODUCAO_BI SET ID_GERA_DESCONTO_MEIO_RENDIMENTO='S' WHERE CD_MATERIAL='$rendi45' AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'"; 

ECHO "$sql";
$res = mysql_db_query($banco,$sql,$conexao);

?><center><?echo "Final da Atualização"; 
}
?>
  
 


 </form>

  




