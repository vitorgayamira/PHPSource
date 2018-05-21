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
//----------------------------------------------------------------
//parametrização da tela
$programa="PASTA.php";
$titulo="Cadastrando Pastas de Acesso";
$programadelete="classeelimina.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (SELECT a.cd_pasta Pasta,a.ds_pasta Descricao ,rownum rnumber from  pasta_menu_bi a where a.cd_pasta > 0 )";
$chacontadorgeralupdate="SELECT a.cd_funcao ,a.ds_funcao,a.cd_programa  from funcao_bi a where a.cd_funcao > 0 ";

//aqui tem o label no select
$chacontadorgeralupdate="SELECT a.cd_pasta ,a.ds_pasta  from pasta_menu_bi a where a.cd_pasta >'0' ";
//diferenca é que nao tem label

$chacontadorgeralinsert="SELECT cd_pasta ,ds_pasta FROM pasta_menu_bi where cd_pasta=1";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from pasta_menu_bi";


$nometabelaparapassar="pasta_menu_bi";
$nomecolunaparapassar="a.cd_pasta";
$nomecolunaparapassaracao="cd_pasta";

$numerocolunastela="2";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";
$campolista4="999";

//$seelctcampolista1="SELECT CD_GRUPO,DS_GRUPO from grupo_veiculo_bi";
//$seelctcampolista2="SELECT CODIGO,DESCRICAO from pessoa_bi ";




$titulojanelaupdate="Atualizando  Pasta";
$titulojanelaelimina="Eliminando  Pasta";
$titulojanelainsert="Cadastrando  Pasta";
$titulojanelapesquisa="Pesquisando Cadastro de Pastas";

$codigoproximoregitro1 = "SELECT MAX(cd_pasta) CODIGO from pasta_menu_bi";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$codigoproximoregitro4=$codigoproximoregitro2->fields["0"];
 IF ($codigoproximoregitro4>"0"){$codigoproximoregitro=$codigoproximoregitro4+1;}ELSE{$codigoproximoregitro="1";}

$codigoproximoregitro2->MoveNext();
}


//------------------------------------------------------


$tabela=$chacontadorgeral;
$ano=date('Y');

//DEFINA PAGINACAO

    $registros = "17";
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
require("carregamenumilenionovo2.php");?>

<titulogeral><? echo "$titulo";?></titulogeral></br>
<?
if (!IsSet($escolha) or ($escolha=="1"))
{
require("barraacao.php");

?>
<table  border=0
 style='background:white;' width="100%" class="tabela1">
 
<tr>
<?

    for($i = 0;$i < $numerocolunastela; $i++){
    ?><th><? echo $Campos[$i];?></th>
<?
}
?>
<th width="5%">Deletar</th>
<th width="5%">Atualizar</th>
</tr>
<?

$sql=$tabela;
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
        <?}?>
        <td width="5%">
        <a href="<?echo $programadelete;?>?navegando=sim&escolha=elimina&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
        <IMG src="lixeiranova2.png" width="25" height="20" ></a>
        </td>
        
        <td width="5%">
        <a href="<?echo $programaupdate;?>?navegando=sim&escolha=atualiza&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&chacontadorgeralupdate=<?echo $chacontadorgeralupdate;?>&titulojanelaupdate=<?echo $titulojanelaupdate;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>">
        <IMG src="editar2.png" width="25" height="20" ></a>
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
