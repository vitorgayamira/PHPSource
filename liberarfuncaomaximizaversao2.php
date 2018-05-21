<? session_start();?>
<html>

<body  background="novofundo9.jpg">

<form action="liberarfuncaomaximizaversao2.php" name="teste" method="POST">
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
$novo=$_GET['novo'];
$nova=$_GET['nova'];
$nova1=$_GET['nova1'];
$nova2=$_GET['nova2'];
$dbanovo=$_GET['dbanovo'];
$pagina=$_GET['pagina'];
$novologin=$_GET['novologin'];
$buscarparametro=$_GET['buscarparametro'];
$status=$_GET['status'];


}


if ($continuarmesmatela=="sim"){
$pagina=$_POST['pagina'];
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$ano=$_POST['ano'];
$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$nova=$_POST['nova'];
$nova1=$_POST['nova1'];
$nova2=$_POST['nova2'];
$dbanovo=$_POST['dbanovo'];
$novogrupo=$_POST['novogrupo'];
$novapasta=$_POST['novapasta'];
$clienterecebe=$_POST['clienterecebe'];
$novafuncao=$_POST['novafuncao'];
$novaunidade=$_POST['novaunidade'];

$novologin="nao";
$buscarparametro=$_POST['buscarparametro'];
$status=$_POST['status'];



}


require("carregamenumaximiza.php");
require("estilotelamilenio.css");

?>
<center>
<table width="80%">
<tr>
<td><h2>Parametrização</h2></td>
</tr>

<tr>
<td>


<?

//gravacoes

echo "esclha:$escolha";

if ($escolha=="1"){

 if ($tipo=="GRAVA"){

	 $ultimo = "SELECT MAX(CD_FUNCAO) SEQUENCIA FROM funcao_bi";
     $res7 = mysql_db_query($banco,$ultimo,$conexao);
     $totallinha35=mysql_fetch_array($res7);
     $sequencia=$totallinha35["SEQUENCIA"];

     IF ($sequencia >"0"){
       $sequencia=$sequencia+1;
	 }
	 ELSE
	 {
     $sequencia="1";
	 }
     $grava = "INSERT INTO funcao_bi (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA) values ('$sequencia','$nova','$novo')";
     $res = mysql_db_query($banco,$grava,$conexao);
     $mensagemtela="</br>Inclusão com Sucesso";
     $status="cancelar";


 }

 if ($tipo=="associa"){

 $ultimo = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM funcao_grupo_bi";
     $res7 = mysql_db_query($banco,$ultimo,$conexao);
     $totallinha35=mysql_fetch_array($res7);
     $sequencia=$totallinha35["SEQUENCIA"];

     IF ($sequencia >"0"){
       $sequencia=$sequencia+1;
	 }
	 ELSE
	 {
     $sequencia="1";
	 }

 $grava = "INSERT INTO funcao_grupo_bi (NR_SEQUENCIA,CD_FUNCAO,CD_GRUPO,CD_PASTA,CD_EMPRESA) VALUES
 ('$sequencia','$novafuncao','$novogrupo','$novapasta','$clienterecebe')";
 echo "$grava </br>";
 $res = mysql_db_query($banco,$grava,$conexao);
 }



}

//final das gravoes


if ( !IsSet($status) or ($status=="novo") or ($status=="cancelar") or ($status=="elimina")){



$sql99="SELECT cd_funcao CODIGO,ds_funcao DESCRICAO from funcao_bi
";

//echo "$sql99";
?>


<div  id="resultado">
<table width="90%" border="1">

<tr>
<th>Código</th>
<th>Função</th>
</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {
            ?>
      	    <tr>
	         <td><?echo $valor["CODIGO"];?></td>
	         <td><?echo $valor["DESCRICAO"];?></td>
            </tr>
 <?}?>

</table>

<?
}

?>
</div>
<hr>
          <font style="text-decoration:none;color: red;"><?echo "$mensagemtela";?>

          <table>

          <tr>


          
           <td width="101" height="32" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="liberarfuncaomaximizaversao2.php?pagina=1&escolha=novafuncao1&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&buscarparametro=sim"  style="text-decoration:none;color: black;">
              Nova função</a>
           </div>
          </td>
          
          <td width="101" height="32" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="liberarfuncaomaximizaversao2.php?pagina=1&escolha=2&funcao1&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&buscarparametro=sim"  style="text-decoration:none;color: black;">
              Associar Grupo</a>
           </div>
          </td>
          

           </tr>
           </table>


</div>

<? if ($buscarparametro=="sim"){?>

         <div  style="display: block;" id="primeiro">

          <center>

                <?
                if ($escolha=="novafuncao1"){
                ?>
                <font style='font-size: 17px;color: white;text-align:left;bold: Negrito' ><?echo "Novo Programa";?><hr>
                </font>
                
                
                <table>
                <tr>
                <td>Descriçaõ:</td>
                <td><input type="txt" name="nova"  size="30" ></td>
                </tr>

                <tr>
                <td>Nome do Programa:</td>
                <td><input type="txt" name="novo"  size="40" ></td>
                </tr>
                </table>
                
                <input type="hidden" name="dbanovo"  size="5" VALUE="S" ></BR>

        <input type="hidden" name="tipo" value="GRAVA">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
        
        <input type="hidden" name="buscarparametro" value="nao">
        <input type="hidden" name="status" value="cancelar">

         <table>
          <tr>
         <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="#" onclick="document.teste.submit();" style="text-decoration:none;color: black;">Gravar</a>
           </div>
          </td>

          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="liberarfuncaomaximizaversao2.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>
          </tr>

         </table>
         <?
         }

         
         
         if ($escolha=="2"){
         ?>
         <font style='font-size: 17px;color: white;text-align:left;bold: Negrito' >Associando Função<hr>
         </font>
         <table>

<tr>
<td>Grupo</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">

					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM grupo_usuario_bi  ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select></td>
					 </tr>
					 <tr>
                     <td>Função</td>
                     <td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novafuncao">

					<?

                        if ($statusmaster=="N"){
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM funcao_bi where id_funcao_dba='N' order by DS_FUNCAO ASC";
					    }
					    else
					    {
                        $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM funcao_bi  order by DS_FUNCAO ASC";

                        }


					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_FUNCAO"]}\">{$valor["DS_FUNCAO"]}</option>";

					}

					 ?>
					 </select></td>
					 </tr>
					 <tr>
					 <td>Pasta</td>
                     <td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novapasta">

					<?

					$stmt1 = "SELECT CD_PASTA,DS_PASTA FROM  pasta_menu_bi";
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_PASTA"]}\">{$valor["DS_PASTA"]}</option>";

					}


					 ?>
					 </select></td>
					 </tr>
					 <tr>
                     <td>Cliente</td>
                     <td><select    name="clienterecebe" style='font-size: 10px;color: blue;text-align:right;bold: Negrito'>
					<option value=""></option>

					<?
					 $stmt1 = "SELECT CODIGO,DESCRICAO from pessoa_bi WHERE ID_TIPO_PESSOA=2 AND ID_MATRIZ='S'";
					 $res98 = mysql_db_query($banco,$stmt1,$conexao);

                     while ($res9=mysql_fetch_array($res98)){


					 print "<option value=\"{$res9["CODIGO"]}\">{$res9["DESCRICAO"]}</option>";

					 }
					 ?>



					 </select></td>
					 </tr>
					 </table>
                     <input type="hidden" name="tipo" value="associa">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
         <input type="hidden" name="buscarparametro" value="nao">
        <input type="hidden" name="status" value="cancelar">

         <table>
          <tr>
         <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;" >
              <a href="#" onclick="document.teste.submit();" style="text-decoration:none;color: black;">Gravar</a>
           </div>
          </td>

          <td width="70" height="30" align="center" bgcolor="#8B8B7A" style="border: thin outset #8B8B7A;"
           onMouseOver="this.bgColor='#CDCDB4'" onMouseOut="this.bgColor='#8B8B7A';this.style.border='thin outset #8B8B7A'"
           onMouseDown="this.style.border='thin inset #8B8B7A';"
           onMouseUp="this.style.border='thin outset #8B8B7A';">
           <div style="font-size: 12px; font-weight: bold;">
              <a href="liberarfuncaomaximizaversao2.php?navegando=sim&status=cancelar&codigoachou=<?echo $codigoachou;?>&buscarparametro=nao"
              style="text-decoration:none;color: black;">Cancelar</a>
           </div>
          </td>
          </tr>

         </table>
          <?
          }
          ?>
          

         </div>
<?}//final da div de atualziacao etcc
?>

</td>
</table>
</center>
</form>
</body>
</html>

