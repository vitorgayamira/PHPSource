<?session_start();
require("conexaoadodb_oracle.php");


require_once('manipulasql.class_oraclenovo.php');


require("estilo2_sitenovo_maximiza.css");
//----------------------------------------------------------------
//parametriza��o da tela
$programa="V4_PESSOAJURIDICA.php";
$titulo="Cadastrando Pessoa jur�dica";
$programadelete="classeelimina.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (SELECT CODIGO,DESCRICAO Raz�o_Social,NR_INSCRICAO,NR_CNPJ,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,	
DS_EMAIL,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO,rownum rnumber from pessoa_bi a where a.id_tipo_pessoa='2')";
$chacontadorgeralinsert="SELECT CODIGO,DESCRICAO,NR_INSCRICAO,NR_CNPJ,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,	
DS_EMAIL,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO,ID_CONDOMINO,CD_CIDADE,CD_TIPO_FORNECEDOR FROM pessoa_bi where codigo in (select max(codigo) from pessoa_bi)";

$chacontadorgeralupdate="SELECT CODIGO,DESCRICAO,NR_INSCRICAO,NR_CNPJ,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,DS_EMAIL,ID_TIPO_PESSOA,ID_MATRIZ,ID_FILIAL,ID_FORNECEDOR_SERVICO,ID_CONDOMINO,CD_CIDADE,CD_TIPO_FORNECEDOR from  pessoa_bi a where a.codigo >0";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from pessoa_bi";


$nometabelaparapassar="pessoa_bi";
$nomecolunaparapassar="a.codigo";
$nomecolunaparapassaracao="codigo";

$numerocolunastela="16";//usada para insert
$numerocolunasprimeiratela="2";
$campolista1="14";//posicao 0,1,2,3,...
$campolista2="15";
$campolista3="999";

$seelctcampolista1="SELECT CD_CIDADE,DS_CIDADE from cidade";
$seelctcampolista2="SELECT CD_TIPO,DS_TIPO from TIPO_FORNECEDOR";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";




$titulojanelaupdate="Atualizando  Pessoa Jur�dica";
$titulojanelaelimina="Eliminando  Pessoa Jur�dica";
$titulojanelainsert="Cadastrando  Pessoa Jur�dica";
$titulojanelapesquisa="Pesquisando Cadastro de Pessoa Jur�dica";
//$titulojanelaassociacao1="Associando Grupo de Usu�rios a Fun��es do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(CODIGO) CODIGO from pessoa_bi";
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
        <a href="<?echo $programadelete;?>?navegando=sim&escolha=elimina&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
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
