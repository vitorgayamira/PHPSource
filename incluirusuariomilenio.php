<? session_start();?>
<html>
<head>
<script language= 'javascript'>

function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}
</script>


</head>



<form action="incluirusuariomilenio.php"  name="teste"  method="POST" >

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$ordena=$_GET['ordena'];

if ($navegando=="sim"){
$escolha=$_GET['escolha'];
$novologin=$_GET['novologin'];
$codigoachou=$_GET['codigoachou'];
$status=$_GET['status'];
$buscarparametro=$_GET['buscarparametro'];
$buscarparametrodeletar=$_GET['buscarparametrodeletar'];
$novogrupo=$_GET['novogrupo'];
$codigoachoufinal=$_GET['codigoachoufinal'];
$pessoapassou=$_GET['pessoapassou'];

}

if ($continuarmesmatela=="sim"){

$novologin="nao";
$escolha=$_POST['escolha'];
$codigoachoufinal=$_POST['codigoachoufinal'];
$codigoachou=$_POST['codigoachou'];
$novogrupo=$_POST['novogrupo'];
}

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];




//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo2_sitenovo.css");



$today = date('d/m/y H:i:s');

require("configuramysqlversa2.php");

                      $achacodigousuario1 = "SELECT cd_usuario VALOR from usuario_bi where nm_usuario='$edusuario'";
                      $achacodigousuario2 = mysql_db_query($banco,$achacodigousuario1,$conexao);
                      $achacodigousuario3=mysql_fetch_array($achacodigousuario2);
                      $codigousuario=$achacodigousuario3["VALOR"];







if ($escolha=="vaiincluirusuario")
{

$lista=$_POST['lista'];


         $ultimo="10";//numero de registros plr pagina



         $ultimo=$ultimo-1;

 require("funcaogerasenha.php");
 
 for ($passa=0;$passa <=$ultimo;$passa++)
 {


	     $acao=$lista[$passa];
        //ho "sequencia:$acao</br>";


             if ($acao >"0"){

              require("finalizaliberacaousuario.php");
             }

}//final do loop
?><center><? ECHO "Usuário Liberado...";

              $banco="site_milenio";
              $username_https="root";
              $password_https="di2040";
              $hostname_https="Localhost";




}//FIANL Do incluir


//DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM  usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
a.cd_empresa=d.codigo and
a.cd_pessoa=e.codigo ";
             $registros = "7";
             require("paginacao_mi.php");


            //FINAL PAGINACAO

$sql99="SELECT   b.nm_usuario USUARIO,b.cd_senha SENHA,c.descricao DESCRICAOGRUPO,
 c.codigo  CODIGOGRUPO,a.cd_usuario CODIGOUSUARIO,e.descricao NOME,d.codigo CODIGOUNI,d.descricao UNIDADENEGOCIO,
 e.ds_email  EMAIL
  from
usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
a.cd_empresa=d.codigo and
a.cd_pessoa=e.codigo
 limit $inicio,$registros
 ";

?>

<div  style="display: block;" id="mostratelaabertura">
<? echo $grava;?>


<table width="99%">

          <tr>
          <td><titulo><?echo "Defindo Usuários";?></titulo></br>

          </td>
          </td>

          </tr>


</table>

<table width="99%">
<tr>

          <td>

                      Status:<select name="statuspassapesquisa" class="txtarea">
                      <option></option>
                      <option value="A">Falta Definir Ação</option>
                      <option value="F">Já Definida Ação</option>
                      </select>
          </td>


          <td align=right>
          
          Nome Pessoa:<input type="txt" name="nomebusca" size="25" >
                      <a href="#" onclick="document.forms[0].submit();return false;">
                      <IMG src="pesquisarnovocva.png" width="60" height="60" ></a></a>


          <a href="carregamenumilenio.php">
          <img src="sairtela.png" width="60" height="60"></a>

          <a href="incluirusuariomilenio.php?etapacadastro=1&navegando=sim&novologin=nao&buscarparametro=edicao&pessoapassou=<? echo $codigopessoa;?>">
        <img src="homologarpessoa.png" width="65" height="65"></a>


          </td>

</tr>
</table>


</br>
<table  width="100%" ID="grid" >
<tr class="difa">

<td>Nome</td>
<td>Usuário</td>
<td>Email</td>
<td>Senha</td>

<td>Grupo</td>
<td>Descrição</td>

<td>Unidade<br>Negócio</td>



</tr>
<?

$res = mysql_db_query($banco,$sql99,$conexao);
while ($valor=mysql_fetch_array($res)) {
  		 ?>

        <tr class="difr">
	    <td><?echo $valor["NOME"];?></td>
	    <td><?echo $valor["USUARIO"];?></td>
	    <td><?echo $valor["EMAIL"];?></td>
	    <td><?echo $valor["SENHA"];?></td>
	    <td><?echo $valor["CODIGOGRUPO"];?></td>
        <td><?echo $valor["DESCRICAOGRUPO"];?></td>
        <td><?echo $valor["UNIDADENEGOCIO"];?></td>


 </tr>
 <?}?>
 


</table>

</table>

<table width="99%">
 <tr class="dif">

 <td align=right>
    <corlabel>Página:<? echo "$pagina_atual";?>/<? echo "$paginas";?></corlabel></td>

    <td  align=right width="5%">
    <a href="incluirusuariomilenio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $proximapagina;?>">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="incluirusuariomilenio.php?navegando=sim&buscarparametro=nao&pagina_atual=<?echo $anteriorpagina;?>">
    <img src="setaesquerda.png" width="20" height="14" ></a>
    </td>
 </tr>
 </table>

</div>



<?
if ($buscarparametro=="edicao")
{

?>
<div  style="display: block;" id="mostraeditarcandidatousaurio">


             <?
             $meshoje=date('m');
             $diahoje=date('d');
             $anohoje=date('Y');




             $achapessoamostra55= "SELECT a.cd_cidade CIDADE,a.descricao NOME,b.ds_cidade CIDADE
        from pessoa_bi a,cidade b
        where
        a.codigo='$pessoapassou' and
        a.cd_cidade=b.cd_cidade";



        $achapessoamostra56= mysql_db_query($banco,$achapessoamostra55,$conexao);
        $achapessoamostra57=mysql_fetch_array($achapessoamostra56);
        $mostranome1=$achapessoamostra57["NOME"];
        $cidade61=$achapessoamostra57["CIDADE"];

             ?>

  <table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Homologando Candidatos ao Sistema";?></titulo2>


          </td>

          </tr>
          </table>


          <?
          
          //DEFINA PAGINACAO
             $chacontadorgeral="select count(*) CONTADOR FROM  grupo_usuario_bi a, banco_bi b,pessoa_bi c,candidato_pessoa_bi d,pessoa_bi e
          WHERE
          d.cd_grupo=a.codigo and
          d.cd_pessoa_fisica=c.codigo and
          d.nr_banco=b.nr_sequencia   AND
          b.cd_empresa=e.codigo and
          d.id_aberto='S'";
             $registros = "10";
             require("paginacao_mi.php");


            //FINAL PAGINACAO

          $achaprocessos="SELECT  d.nr_sequencia SEQU,d.nr_banco BANCO,d.cd_pessoa_fisica PESSOA,d.cd_grupo GRUPO,
          a.Descricao DESCGRUPO,b.DS_BANCO DESCBANCO,c.DESCRICAO DESCPESSOA,e.descricao EMPRESA
          FROM grupo_usuario_bi a, banco_bi b,pessoa_bi c,candidato_pessoa_bi d,pessoa_bi e
          WHERE
          d.cd_grupo=a.codigo and
          d.cd_pessoa_fisica=c.codigo and
          d.nr_banco=b.nr_sequencia   AND
          b.cd_empresa=e.codigo and
          d.id_aberto='S'
           limit $inicio,$registros
          ";
          ?>
          <table  width="100%" ID="grid" >
          <tr class="difa">

          <td>Banco</td>
          <td>Empresa a Associar</td>
          <td>Grupo</td>
          <td>Pessoa</td>
          <td>Selecionar</td>

          </tr>
          <?
      	  $achaprocessos2= mysql_db_query($banco,$achaprocessos,$conexao);
          while ($achaprocessos3=mysql_fetch_array($achaprocessos2))
          {
           $pessoapassa=$achaprocessos3["PESSOA"];
           $grupopassa=$achaprocessos3["GRUPO"];
           $bancopassa=$achaprocessos3["BANCO"];
           $sequenciapa=$achaprocessos3["SEQU"];


          ?>
           <tr class="difr">
	       <td><?echo $achaprocessos3["DESCBANCO"];?></td>
	       <td><?echo $achaprocessos3["EMPRESA"];?></td>
	       <td><?echo $achaprocessos3["DESCGRUPO"];?></td>
	       <td><?echo $achaprocessos3["DESCPESSOA"];?></td>
	       <td><input type="checkbox" name="lista[]" value="<?echo $sequenciapa;?>"></td>

           </tr>
          <?
          }
          ?>
          </table>



           <input type="hidden" name="escolha" value="vaiincluirusuario">
		   <input type="hidden" name="continuarmesmatela" value="sim">
           <input type="HIDDEN" name="buscarparametro" value="nada">

		   <input type="hidden" name="codigoati"  size="5" value="<?echo $codigoati;?>">


           <table width="99%">
           <tr>
           <td  align=right>
           <a href="#" onclick="document.forms[0].submit();return false;">
           <IMG src="salvarnovocva.png" width="42" height="38" ></a></a>

           <a href="incluirusuariomilenio.php?navegando=sim&buscarparametro=nao">
           <img src="sairtela.png" width="42" height="38"></a>

           <corlabel>Página:<? echo "$pagina_atual";?>/<? echo "$paginas";?></corlabel>
    <a href="incluirusuariomilenio.php?navegando=sim&buscarparametro=edicao&pagina_atual=<?echo $proximapagina;?>">
    <img src="setadireita.png" width="20" height="14" ></a>
    <a href="incluirusuariomilenio.php?navegando=sim&buscarparametro=edicao&pagina_atual=<?echo $anteriorpagina;?>">
    <img src="setaesquerda.png" width="20" height="14" ></a>



           </td>
           </tr>
           </table>




</div>


<?}//final editar
?>

</form>
</body>
</html>

  




