<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

$edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

                     $pagina_atual = $_GET['pagina_atual'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

$chacontadorgeral="SELECT * from (SELECT a.nr_sequencia ,d.ds_funcao ,b.descricao DESCRICAOGRUPO,c.ds_pasta,rownum rnumber from funcao_grupo_bi a,grupo_usuario_bi b,pasta_menu_bi c,
funcao_bi d where a.cd_pasta=c.cd_pasta and
a.cd_grupo=b.codigo and a.cd_funcao=d.cd_funcao order by a.cd_grupo asc )";



//----------------------------------------------------------------
//parametrização da tela
$programa="ELIMINARFUNCAOGRUPO.php";
$programadelete="eliminafinalfuncaogrupo.php";
$titulo="Eliminando Função Grupo";




$passapesquisainicial="select a.cd_funcao ,a.ds_funcao ,a.cd_programa  from funcao_bi a where  a.cd_funcao >0";
$chacontadorgeralpagina="SELECT count(*) CONTADOR  from funcao_grupo_bi";


$nometabelaparapassar="funcao_bi";
$nomecolunaparapassar="a.cd_funcao";
$nomecolunaparapassaracao="cd_funcao";

$numerocolunastela="4";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";
$campolista4="999";

$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


$titulojanelaelimina="Eliminando";

//------------------------------------------------------


$tabela=$chacontadorgeral;
$ano=date('Y');

//DEFINA PAGINACAO


    $registros = "200";
    require("paginacao_mi.php");
//FINAL PAGINACAO


$rsRegistro8 = $conn->Execute($tabela);


for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++ )
{
$obj = $rsRegistro8->FetchField($i);
$Campos[] =$obj->name;
}


?>
<form action="modelo.php" method="POST">
<?require("areasuperior2.php");?>

<div id="mostraconteudo33" >

<?

require("carregamenumilenionovo2.php");
?><center><titulogeral><? echo "$titulo";?></titulogeral></br><?

if (!IsSet($escolha) or ($escolha=="1"))
{
?>
<table  border=0
 style='background:white;' width="90%" align="center" class="tabela1">
 
<tr>
<?
$s = new ManipulaSql();
	    
        for($i2 = 0;$i2 < $numerocolunastela; $i2++)
		{
			
		$s->mostralabel($Campos,$i2);
       	$mostralabelfinal=$s->mostralabel($Campos,$i2);
		?>
        <th><? echo $mostralabelfinal;?></th>
               

        <?}?>
		<th width="5%">Deletar</th>
       	</tr>
  
<?

$sql=$passapesquisainicial;
$sql=$tabela." WHERE rnumber BETWEEN ".$inicio." and ".$registros;

//Instancio a classe de manipulação
$s = new ManipulaSql();
$s->Seleciona($sql);
if(!empty($s->content))
{
	
    foreach ($s->content as $v)
    {
		
    ?>
        <tr>
        <?
        for($i2 = 0;$i2 < $numerocolunastela; $i2++){
        ?>
        <td><?echo $v[$i2];?></td>
        <?}
		$chacontadorgeral="SELECT * from funcao_bi a where a.cd_funcao >'0'";
		
		?>
        <td width="5%">
        <a href="<?echo $programadelete;?>?navegando=sim&escolha=elimina&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
        <IMG src="lixeiranova2.png" width="25" height="20" ></a>
        </td>
        </tr>
    <?
    }
 
 ?>
 </table>
 
 <?

//Caso a nossa consulta não tenha retornado nenhum resultado, então exibe o erro
} else {
    echo 'Não foram encontrados registros em sua pesquisa.';
}
}//final da primeira tela
require ("rodapepagina.php");?>






 </div>

 <div id="footer">
 <?require ("rodapemilenio.php");?>
 </div>
 </form>
