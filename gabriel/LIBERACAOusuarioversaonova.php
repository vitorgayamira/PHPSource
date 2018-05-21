<? session_start();?>
<form action="LIBERACAOusuarioversaonova.php" method="POST">
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
}

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo.css");

//ajusta para mostrar por pagina
$programa="LIBERACAOusuarioversaonova.php";




//acha VARIACAO PADRAO
$usu18 = "SELECT ID_MASTER MASTER FROM usuario_bi WHERE  CD_USUARIO='$codigousuario'";

$res8 = mysql_db_query($banco,$usu18,$conexao);
$valor87=mysql_fetch_array($res8);
$statusmaster=$valor87["MASTER"];





  


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


$grava = "INSERT INTO funcao_bi (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA,ID_FUNCAO_DBA) values ('$sequencia','$nova','$novo','$dbanovo')";

$res = mysql_db_query($banco,$grava,$conexao);
echo "Gravado com Sucesso";


 }
 
 if ($tipo=="elimina"){
 
	
	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {
			
   $sql = "DELETE FROM funcao_grupo_bi WHERE CD_FUNCAO='$passa'";

   $res = mysql_db_query($banco,$sql,$conexao);
 
   $sql = "DELETE FROM funcao_bi WHERE CD_FUNCAO='$passa'";

   $res = mysql_db_query($banco,$sql,$conexao);
    }
 }
 
 if ($tipo=="eliminapessoa"){


	for ($passa=$nova1;$passa <=$nova2;$passa++)
    {



   $sql = "DELETE FROM usuario_grupo_bi WHERE CD_USUARIO IN (SELECT CD_USUARIO FROM usuario_bi WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM usuario_projeto_biWHERE CD_USUARIO IN (SELECT CD_USUARIO FROM usuario_bi WHERE CD_PESSOA='$passa')";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM usuario_bi WHERE CD_PESSOA='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);
   
   $sql = "DELETE FROM pessoa_bi WHERE CODIGO='$passa'";
   //echo "$sql </br>";
   $res = mysql_db_query($banco,$sql,$conexao);


    }
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
	 
 $grava = "INSERT INTO funcao_grupo_bi (NR_SEQUENCIA,CD_FUNCAO,CD_GRUPO,CD_PASTA,ID_SELECT,ID_ATUALIZAR,CD_EMPRESA) VALUES
 ('$sequencia','$novafuncao','$novogrupo','$novapasta','S','S','$clienterecebe')";
 //echo "$grava </br>";
 $res = mysql_db_query($banco,$grava,$conexao);
 }
 
 
 if ($tipo=="mudausuario"){


     
     $grava = "INSERT INTO usuario_grupo_bi(CD_USUARIO,CD_GRUPO,CD_PESSOA)
               VALUES ('$novousuario','$novogrupo','$novaunidade')";

               $res = mysql_db_query($banco,$grava,$conexao);

    $linhas = mysql_affected_rows();


if ($linhas>"0"){
   echo "Gravou Registro";
}else    {
   echo "Falha No Registro";
}
    
    
 }



if ($tipo=="eliminausuariogrupo"){




                              $grava = "delete from usuario_grupo_bi where cd_usuario='$novousuario' and cd_grupo='$novogrupo' and
                              cd_pessoa='$novaunidade'";
                              $res = mysql_db_query($banco,$grava,$conexao);
                              $linhas = mysql_affected_rows();


if ($linhas>"0"){
   echo "Eliminado Registro";
}else    {
   echo "Falha No Registro";
}


 }

}//final da ESCOLHA=1

?>




<table width="99%" >

          <tr>
          <td><titulo><?echo "Gestão de Acesso";?></titulo></td>
          </td>


          </tr>


</table>


<a href="LIBERACAOusuarioversaonova.php?escolha=2&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1  src="nova_acao.GIF">
</a>

<a href="LIBERACAOusuarioversaonova.php?codigousuario=<?echo $codigousuario;?>&codigoempresa=<?ECHO $codigoempresa;?>
&navegando=sim&banco=<?ECHO $banco;?>&escolha=todos&ano=<?echo $ano;?>
&codigousuario=<?echo $codigousuario;?>&mes=<?echo $mes;?>&proejto=<?echo $projeto;?>"><img width=50 height=60 BORDER=1 src="CONSULTANDO.GIF"></a>

<a href="LIBERACAOusuarioversaonova.php?pagina=1&escolha=ELIMINAASSOCIACAO&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="eliminar_acao.GIF" ></a>


<a href="LIBERACAOusuarioversaonova.php?pagina=1&escolha=novafuncao1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="novatela.GIF" ></a>

<a href="LIBERACAOusuarioversaonova.php?pagina=1&escolha=novapasta1&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="novapasta.GIF" ></a>

<a href="LIBERACAOusuarioversaonova.php?escolha=mudarusuariogrupo&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1  src="usuariogrupo.GIF"
alt="Alterando Usuário de Grupo">
</a>

<a href="LIBERACAOusuarioversaonova.php?escolha=eliminarusuariogrupo&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1  src="listausuario3.GIF"
alt="Eliminar Usuário de Grupo">
</a>

<a href="LIBERACAOusuarioversaonova.php?escolha=listausuario7&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>"><img width=50 height=60 BORDER=1  src="listausuario2.GIF"
alt="Listagem dos  Usuários nos  Grupos">
</a>

<a href="LIBERACAOusuarioversaonova.php?pagina=1&escolha=novogrupo&mes=<?echo $mes;?>&ano=<?echo $ano;?>
&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>
&codigousuario=<?echo $codigousuario;?>
&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>">
<img width=50 height=60  BORDER=1 src="novogrupo.GIF" alt="Definir um novo grupo de Usuários"></a>




<?
if ($escolha=="novafuncao1"){
?>
</br>
Nova Função:<input type="txt" name="nova"  size="30" >
 Nome da Programa:<input type="txt" name="novo"  size="40" >
 Programa de DBA:<input type="txt" name="dbanovo"  size="5" VALUE="S" ></BR>

        <input type="hidden" name="tipo" value="GRAVA">
        <input type="hidden" name="escolha" value="novafuncao2">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">


         </br></br>
         <input  type="submit"  VALUE="Gravar">
<?
}
if ($escolha=="novafuncao2"){
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


$grava = "INSERT INTO funcao_bi (CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA,ID_FUNCAO_DBA) values ('$sequencia','$nova','$novo','$dbanovo')";
$res = mysql_db_query($banco,$grava,$conexao);
}



if ($escolha=="novapasta1"){
?>
        </br>
        Nova Pasta:<input type="txt" name="nova1">

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
$ultimo = "SELECT MAX(CD_PASTA) SEQUENCIA FROM pasta_menu_bi";
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


$grava = "INSERT INTO pasta_menu_bi (CD_PASTA,DS_PASTA) values ('$sequencia','$nova1')";

//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



}


if ($escolha=="novogrupo"){
?>
        </br>
        Grupo:<input type="txt" name="nova1">

        <input type="hidden" name="tipo" value="elimina">
        <input type="hidden" name="escolha" value="novogrupo2">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">


         <input  type="submit"  VALUE="GRAVAR">

<?
}
if ($escolha=="novogrupo2"){
$ultimo = "SELECT MAX(CODIGO) SEQUENCIA FROM grupo_usuario_bi";
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


$grava = "INSERT INTO grupo_usuario_bi (CODIGO,DESCRICAO) values ('$sequencia','$nova1')";

//echo "$grava";
$res = mysql_db_query($banco,$grava,$conexao);



}

if (!IsSet($escolha) or ($escolha=="todos") or ($escolha=="1")){

if ($statusmaster=="N"){
 $sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
funcao_grupo_bi a, funcao_bi b, grupo_usuario_bi c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo and
a.cd_grupo not in (1)
ORDER BY c.descricao ASC
";

}
else
{
 $sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2 from
funcao_grupo_bi a, funcao_bi b, grupo_usuario_bi c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo
ORDER BY c.descricao ASC
";

}

//echo "$sql99";

$titulorodape="Selecionando as Amostras para Cálculo do Valor Cirúrgico";
?>




<table  width="55%" ID="grid" >
<tr class="difa">
          
<td>Função</td>
<td>Grupo</td>


</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

      <tr class="difa">
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
					    $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA FROM funcao_bi where id_funcao_dba='N' order by DS_FUNCAO ASC";
					    }
					    else
					    {
                        $stmt1 = "SELECT CD_FUNCAO,DS_FUNCAO,CD_PROGRAMA FROM funcao_bi  order by DS_FUNCAO ASC";

                        }
					    
					    
					   $res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_FUNCAO"]}\">{$valor["DS_FUNCAO"]}-{$valor["CD_PROGRAMA"]}</option>";

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
$sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2,d.ds_pasta PASTA,
b.cd_programa PROGRAMA from
funcao_grupo_bi a, funcao_bi b, grupo_usuario_bi c,pasta_menu_bi  d
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo  AND
a.cd_grupo NOT IN (1) AND
b.id_funcao_dba='N' AND
a.cd_pasta=d.cd_pasta
ORDER BY b.ds_funcao ASC";
}
ELSE
{
$sql99 ="SELECT a.nr_sequencia SEQUENCIA,b.ds_funcao DESCRICAO1,c.descricao DESCRICAO2,d.ds_pasta PASTA,
b.cd_programa PROGRAMA from
funcao_grupo_bi a, funcao_bi b, grupo_usuario_bi c,pasta_menu_bi  d
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo and
a.cd_pasta=d.cd_pasta
ORDER BY b.ds_funcao ASC";
}


//echo "$sql99";

$titulorodape="Selecionando as Amostras para Cálculo do Valor Cirúrgico";
?>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="800">

<tr>
<th>Função</th>
<th>Programa</th>
<th>Grupo</th>
<th>Pasta</th>
<th>Selecionar</th>

</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

	    <tr>
	    <td><?echo $valor["DESCRICAO1"];?></td>
	    <td><?echo $valor["PROGRAMA"];?></td>
	    <td><?echo $valor["DESCRICAO2"];?></td>
	    <td><?echo $valor["PASTA"];?></td>
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
         funcao_grupo_bi a, funcao_bi b, grupo_usuario_bi c
where a.cd_funcao=b.cd_funcao and
a.cd_grupo=c.codigo ";
         $res8 = mysql_db_query($banco,$achacontador,$conexao);
         $valor87=mysql_fetch_array($res8);
         $ultimo=$valor87["CONTADOR"];



         $ultimo=$ultimo-1;


 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$lista[$passa];
        //ho "sequencia:$acao</br>";


             if ($acao >"0"){
			 $sql = "delete from   funcao_grupo_bi   WHERE NR_SEQUENCIA='$acao'";
             //ECHO "$sql</BR>";

			 $res = mysql_db_query($banco,$sql,$conexao);
             }

}//final do loop
?><center><? ECHO "Ação Eliminada";
}//FIANL DA TELA


if ($escolha=="mudarusuariogrupo"){

?></BR>
<hr>
Associando Usuário a um novo Grupo</br>
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
                      <td>Usuario</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novousuario">

					<?
					$stmt1 = "SELECT CD_USUARIO,NM_USUARIO FROM usuario_bi ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_USUARIO"]}\">{$valor["NM_USUARIO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>
					 
					  <tr>
                      <td>Unidade de Acesso</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novaunidade">

					<?
					$stmt1 = "select CODIGO,DESCRICAO FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S')) ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>


        </table>
        <input type="hidden" name="tipo" value="mudausuario">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
        <input  type="submit"  VALUE="GRAVAR">

<?
}



if ($escolha=="eliminarusuariogrupo"){

?></BR>
<hr>
Eliminando Usuário a um novo Grupo</br>
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
                      <td>Usuario</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novousuario">

					<?
					$stmt1 = "SELECT CD_USUARIO,NM_USUARIO FROM usuario_bi ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CD_USUARIO"]}\">{$valor["NM_USUARIO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>

					  <tr>
                      <td>Unidade de Acesso</td>
<td><select   style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="novaunidade">

					<?
					$stmt1 = "select CODIGO,DESCRICAO FROM pessoa_bi where
    id_tipo_pessoa='2' and ((id_matriz='S') OR (ID_FILIAL='S')) ";
					$res = mysql_db_query($banco,$stmt1,$conexao);

                    while ($valor=mysql_fetch_array($res)) {
					 print "<option value=\"{$valor["CODIGO"]}\">{$valor["DESCRICAO"]}</option>";

					}


					 ?>
					 </select></td>

					 </tr>


        </table>
        <input type="hidden" name="tipo" value="eliminausuariogrupo">
        <input type="hidden" name="escolha" value="1">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
        <input  type="submit"  VALUE="GRAVAR">

<?
}



if ($escolha=="listausuario7"){

 $sql99 ="SELECT d.nm_usuario NOME, c.descricao DESCRICAO,b.descricao UNIDADE,b.CD_UNIDANEGOCIO_ERP ERP
FROM usuario_grupo_bi a, grupo_usuario_bi c, usuario_bi d,pessoa_bi b
WHERE a.cd_grupo = c.CODIGO
AND a.cd_usuario = d.cd_usuario and
a.cd_pessoa=b.codigo

";

?>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext ' width="50%">

<tr>
<th>Usuário</th>
<th>Grupo</th>
<th>Unidade</br>Negócio</th>
<th>Codigo</br>Seção Erp</th>


</tr>


<?

			$res = mysql_db_query($banco,$sql99,$conexao);

            while ($valor=mysql_fetch_array($res)) {

		    ?>

	    <tr>
	    <td><?echo $valor["NOME"];?></td>
	    <td><?echo $valor["DESCRICAO"];?></td>
	    <td><?echo $valor["UNIDADE"];?></td>
	    <td><?echo $valor["ERP"];?></td>


 </tr>
 <?}?>

</table>

<?
}


?>


</form>
</body>

