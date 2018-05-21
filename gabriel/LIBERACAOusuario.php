<?
//session_start();
$cortopo="#828282";
$corfundo="#4682B4";

require("configuramysql.php");
require("estilo2.css");
require("estilonavegacaofundo.css");

$tipo=$_GET['tipo'];
$titulopai="Manutenção de Funções";
?>




<body>



<form action="LIBERACAOusuario.php" method="POST">
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
$novo=$_GET['novo'];
$nova=$_GET['nova'];
$nova1=$_GET['nova1'];
$nova2=$_GET['nova2'];
$dbanovo=$_GET['dbanovo'];
$pagina=$_GET['pagina'];


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
$banco=$_POST['banco'];
$novogrupo=$_POST['novogrupo'];
$novapasta=$_POST['novapasta'];
$clienterecebe=$_POST['clienterecebe'];
$novafuncao=$_POST['novafuncao'];
}


//ajusta para mostrar por pagina
$programa="LIBERACAOusuario.php";

    $numeroregistropagina="20";
    $contador66 = "SELECT COUNT(*) CONTADOR
    FROM FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
    where a.cd_funcao=b.cd_funcao and
    a.cd_grupo=c.codigo
    ";
    $res = mysql_db_query($banco,$contador66,$conexao);
    $valor8=mysql_fetch_array($res);
    $ultimo=$valor8["CONTADOR"];
    require("DIRAPAGINACAO.php");
//final do tratamento de paginas



?>

<center><font style='font-size: 19px;color: white;text-align:left;bold: Negrito' >Liberando Acesso</font>


</br>

<?





//acha VARIACAO PADRAO
$usu18 = "SELECT CD_VARIACAO VARIACAO FROM VARIACAO_ANIMAL_BI WHERE CD_VARIACAO IN (SELECT CD_VARIACAO FROM USUARIO_BI where CD_USUARIO='$codigousuario')";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$variacao3=$valor87["VARIACAO"];


//acha VARIACAO PADRAO
$usu18 = "SELECT ID_MASTER MASTER FROM USUARIO_BI WHERE  CD_USUARIO='$codigousuario'";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$statusmaster=$valor87["MASTER"];

if (!IsSet($pagina)){
   $pagina="1";
}



  


if ($escolha=="1"){




 if ($tipo=="GRAVA"){
                
	 $ultimo = "SELECT MAX(CD_FUNCAO) SEQUENCIA FROM FUNCAO_BI";
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


$grava = "INSERT INTO FUNCAO_BI (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA,ID_FUNCAO_DBA) values ('$sequencia','$nova','$novo','$dbanovo')";
 
//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



 }
 
 if ($tipo=="elimina"){
 
	
	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {
			
   $sql = "DELETE FROM FUNCAO_GRUPO_BI WHERE CD_FUNCAO='$passa'"; 
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
 
   $sql = "DELETE FROM FUNCAO_BI WHERE CD_FUNCAO='$passa'"; 
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
    }
 }
 
 if ($tipo=="eliminapessoa"){


	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {



   $sql = "DELETE FROM USUARIO_GRUPO_BI WHERE CD_USUARIO IN (SELECT CD_USUARIO FROM USUARIO_BI WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM USUARIO_PROJETO_BI WHERE CD_USUARIO IN (SELECT CD_USUARIO FROM USUARIO_BI WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM USUARIO_BI WHERE CD_PESSOA='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM PESSOA_BI WHERE CODIGO='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);


    }
 }

 if ($tipo=="associa"){
 
 $ultimo = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM FUNCAO_GRUPO_BI";
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
	 
 $grava = "INSERT INTO FUNCAO_GRUPO_BI (NR_SEQUENCIA,CD_FUNCAO,CD_GRUPO,CD_PASTA,ID_SELECT,ID_ATUALIZAR,CD_EMPRESA) VALUES
 ('$sequencia','$novafuncao','$novogrupo','$novapasta','S','S','$clienterecebe')";
 //echo "$grava </br>";
 $res = mysql_db_query($banco,$grava,$conexao);
 }
?>  




 
  


<? 
}//final da ESCOLHA=1

?>

<a href="LIBERACAOusuario.php?escolha=2&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1  src="nova_acao.GIF">
</a>

<a href="LIBERACAOusuario.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=todos&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&mes=<?echo $mes;?>&proejto=<?echo $projeto;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="LIBERACAOusuario.php?pagina=1&escolha=ELIMINAASSOCIACAO&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="eliminar_acao.GIF" >


<a href="LIBERACAOusuario.php?pagina=1&escolha=novafuncao1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="novatela.GIF" >

<a href="LIBERACAOusuario.php?pagina=1&escolha=novapasta1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="novapasta.GIF" >




<?
if ($escolha=="novafuncao1"){
?>

Nova Função:<input type="txt" name="nova"  size="30" >
 Nome da Programa:<input type="txt" name="novo"  size="40" >
 Programa de DBA:<input type="txt" name="dbanovo"  size="5" VALUE="S" ></BR>

        <input type="hidden" name="tipo" value="GRAVA">
        <input type="hidden" name="escolha" value="novafuncao2">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">

         </br></br>
         <input  type="submit"  VALUE="Gravar">
<?
}
if ($escolha=="novafuncao2"){
$ultimo = "SELECT MAX(CD_FUNCAO) SEQUENCIA FROM FUNCAO_BI";
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


$grava = "INSERT INTO FUNCAO_BI (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA,ID_FUNCAO_DBA) values ('$sequencia','$nova','$novo','$dbanovo')";

//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);
}



if ($escolha=="novapasta1"){
?>
        Pasta:<input type="txt" name="nova1"  size="45" >

        <input type="hidden" name="tipo" value="elimina">
        <input type="hidden" name="escolha" value="novapasta2">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">


         <input  type="submit"  VALUE="GRAVAR">

<?
}
if ($escolha=="novapasta2"){
$ultimo = "SELECT MAX(CD_PASTA) SEQUENCIA FROM PASTA_MENU_BI";
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


$grava = "INSERT INTO PASTA_MENU_BI (CD_PASTA,DS_PASTA) values ('$sequencia','$nova1')";

//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



}

if (!IsSet($escolha) or ($escolha=="todos") or ($escolha=="1")){

if ($statusmaster=="N"){
 $sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo and
a.cd_grupo not in (1)
ORDER BY c.descricao ASC
LIMIT $limiteacima,$limiteabaixo
";

}
else
{
 $sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo
ORDER BY c.descricao ASC
LIMIT $limiteacima,$limiteabaixo
";

}

//echo "$sql99";

$titulorodape="Selecionando as Amostras para Cálculo do Valor Cirúrgico";
?>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext ' width="60%">

<tr>
<th>Função</th>
<th>Grupo</th>


</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

	    <tr>
	    <td><?echo $valor["DESCRICAO1"];?></td>
	    <td><?echo $valor["DESCRICAO2"];?></td>


 </tr>
 <?}?>

</table>

<?
}

if ($escolha=="2"){

?></BR>
<hr>
Associando Grupo a uma Função</br>
<table>

<tr>
<td>Grupo</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novogrupo">

					<?
					$stmt1 = "SELECT CODIGO,DESCRICAO FROM GRUPO_USUARIO_BI where codigo not in (1) ";
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
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM FUNCAO_BI where id_funcao_dba='N' order by DS_FUNCAO ASC";
					    }
					    else
					    {
                        $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO FROM FUNCAO_BI  order by DS_FUNCAO ASC";

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

					$stmt1 = "SELECT CD_PASTA,DS_PASTA FROM  PASTA_MENU_BI";
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
					 $stmt1 = "SELECT CODIGO,DESCRICAO from PESSOA_BI WHERE ID_TIPO_PESSOA=2";
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
        <input type="hidden" name="banco" value="<?echo $banco;?>">


         <input  type="submit"  VALUE="GRAVAR">

<?
}

if ($escolha=="ELIMINAASSOCIACAO"){


/*
$acha="1";
$sql998 ="SELECT a.CD_GRUPO GRUPO,A.CD_FUNCAO FUNCAO ,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo  and a.nr_sequencia='0'
ORDER BY c.descricao ASC";

$res8 = mysql_db_query($banco,$sql998,$conexao);

            while ($valor8=mysql_fetch_array($res8)) {
              $grupo=$valor8["GRUPO"];
              $funcao=$valor8["FUNCAO"];

              $sql = "update FUNCAO_GRUPO_BI set nr_sequencia='$acha' WHERE CD_GRUPO='$grupo' AND CD_FUNCAO='$funcao'" ;
   echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);

            $acha=$acha+1;
            }
            
EXIT;
*/
if ($statusmaster=="N"){
$sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo  AND
a.cd_grupo NOT IN (1) AND
b.id_funcao_dba='N'
ORDER BY c.descricao ASC";
}
ELSE
{
$sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo
ORDER BY c.descricao ASC";
}


//echo "$sql99";

$titulorodape="Selecionando as Amostras para Cálculo do Valor Cirúrgico";
?>



<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#FFA500;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
<th>Função</th>
<th>Grupo</th>
<th>Selecionar</th>

</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

	    <tr>
	    <td><?echo $valor["DESCRICAO1"];?></td>
	    <td><?echo $valor["DESCRICAO2"];?></td>
        <td><input type="checkbox" name="lista[]" value="<?echo $valor["SEQUENCIA"];?>"></td>

 </tr>
 <?}?>

</table>



<input type="hidden" name="escolha" size="5" value="CONFIRMAELIMINA" >

<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="valorcalculo" value="<?echo $valorcalculo;?>">


<input type="submit"    value="Confirma">


<?
}


if ($escolha=="CONFIRMAELIMINA")
{
$lista=$_POST['lista'];




         $achacontador = "SELECT count(*) CONTADOR
         FROM
         FUNCAO_GRUPO_BI a, FUNCAO_BI b, GRUPO_USUARIO_BI c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo  AND
a.cd_grupo NOT IN (1)";
         $res8 = mysql_db_query($banco,$achacontador,$conexao);
         $valor87=mysql_fetch_array($res8);
         $ultimo=$valor87["CONTADOR"];



         $ultimo=$ultimo-1;


 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$lista[$passa];



             if ($acao >"0"){
			 $sql = "delete from   FUNCAO_GRUPO_BI   WHERE NR_SEQUENCIA='$acao'";
            // ECHO "$sql</BR>";

			 $res = mysql_db_query($banco,$sql,$conexao);
             }

}//final do loop
?><center><? ECHO "Ação Eliminada";
}//FIANL DA TELA





?>
</form>
</body>

