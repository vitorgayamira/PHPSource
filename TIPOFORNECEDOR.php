<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");
//----------------------------------------------------------------
//parametriza��o da tela
$programa="TIPOFORNECEDOR.php";
$titulo="Cadastrando Tipos de Fornecedores";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (SELECT a.cd_tipo,a.ds_tipo,rownum rnumber from  tipo_fornecedor a where a.cd_tipo > 0 )";
$chacontadorgeralupdate="SELECT a.cd_tipo ,a.ds_tipo  from tipo_fornecedor a where a.cd_tipo > 0 ";
//diferenca � que nao tem label

$chacontadorgeralinsert="SELECT cd_tipo ,ds_tipo FROM tipo_fornecedor where cd_tipo in (select max(cd_tipo) from tipo_fornecedor)";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from tipo_fornecedor";

//$chacontadorgeralparaassociar="a.codigo ,a.descricao  from grupo_usuario_bi a where a.codigo > 0";

$nometabelaparapassar="tipo_fornecedor";
$nomecolunaparapassar="a.cd_tipo";
$nomecolunaparapassaracao="cd_tipo";

$numerocolunastela="2";//usada para insert
$numerocolunasprimeiratela="2";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";




$titulojanelaupdate="Atualizando  Tipos";
$titulojanelaelimina="Eliminando  Tipos";
$titulojanelainsert="Cadastrando  Tipos";
$titulojanelapesquisa="Pesquisando Tipos";
//$titulojanelaassociacao1="Associando Grupo de Usu�rios a Fun��es do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(CD_TIPO) CODIGO from tipo_fornecedor";
$codigoproximoregitro2= $conn->Execute($codigoproximoregitro1);
while ( !$codigoproximoregitro2->EOF)
{
$codigoproximoregitro4=$codigoproximoregitro2->fields["CODIGO"];
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
</br></br></br>
<?

require("carregamenumilenionovo2.php");?>


<div id="mostrasuperiortitulo2" >
<?require("areasuperior2.php");?>

</div>



<div id="mostraconteudo33" >

<?
if (!IsSet($escolha) or ($escolha=="1"))
{
require("barraacao.php");
?>


<table  border=1
 style='background:white;' width="100%">
<tr>
<?

    for($i = 0;$i < $numerocolunasprimeiratela; $i++){
    ?><th><? echo $Campos[$i];?></th>
<?
}
?>
<th width="5%">Deletar</th>
<th width="5%">Atualizar</th>
</tr>
<?

if ($pagina_atual >"1"){$registros=$registros*$pagina_atual;}

$sql=$tabela;
$sql=$tabela." WHERE rnumber BETWEEN ".$inicio." and ".$registros;



//Instancio a classe de manipula��o
$s = new ManipulaSql();
$s->Seleciona($sql);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {
    ?>
        <tr>
        <?
        for($i2 = 0;$i2 < $numerocolunasprimeiratela; $i2++){
        ?>
        <td><?echo $v[$i2];?></td>
        <?}?>
        <td width="5%">
        <a href="<?echo $programadelete;?>?navegando=sim&escolha=elimina&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeralupdate;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
        <IMG src="lixeiranova2.png" width="25" height="20" ></a>
        </td>

        <td width="5%">
        <a href="<?echo $programaupdate;?>?navegando=sim&escolha=atualiza&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&chacontadorgeralupdate=<?echo $chacontadorgeralupdate;?>&titulojanelaupdate=<?echo $titulojanelaupdate;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>">
        <IMG src="editar2.png" width="25" height="20" ></a>
        </td>



        </tr>
    <?
    }
 ?>
 </table>
 <?

//Caso a nossa consulta n�o tenha retornado nenhum resultado, ent�o exibe o erro
} else {
    echo 'N�o foram encontrados registros em sua pesquisa.';
}
}//final da primeira tela



require ("rodapepagina.php");?>


 </div>

 <div id="footer">
 <?//require ("rodapemilenio.php");?>
 </div>
 </form>


