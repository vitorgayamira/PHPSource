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
					 $ordenaatual=$_GET['ordenaatual'];

				 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

//----------------------------------------------------------------
//parametrização da tela
$programa="FUNCAO.php";
$titulo="Cadastrando Funções";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (SELECT a.cd_funcao,a.ds_funcao,a.cd_programa,rownum rnumber from  funcao_bi a where a.cd_funcao > 0 )";
$chacontadorgeralupdate="SELECT a.cd_funcao ,a.ds_funcao,a.cd_programa  from funcao_bi a where a.cd_funcao > 0 ";
//diferenca é que nao tem label

$chacontadorgeralinsert="SELECT cd_funcao ,ds_funcao,cd_programa FROM funcao_bi where cd_funcao in (select max(cd_funcao) from funcao_bi)";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from funcao_bi";

$chacontadorgeralparaassociar="SELECT a.cd_funcao,a.ds_funcao,a.cd_programa from  funcao_bi a where a.cd_funcao > 0";

$nometabelaparapassar="funcao_bi";
$nomecolunaparapassar="a.cd_funcao";
$nomecolunaparapassaracao="cd_funcao";

$numerocolunastela="3";//usada para insert
$numerocolunasprimeiratela="3";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

$seelctcampolista1="SELECT CODIGO Grupo_Usuário ,DESCRICAO from grupo_usuario_bi";
$seelctcampolista2="SELECT CD_PASTA Pasta,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";




$titulojanelaupdate="Atualizando  Função";
$titulojanelaelimina="Eliminando  Função";
$titulojanelainsert="Cadastrando  Função";
$titulojanelapesquisa="Pesquisando Cadastro de Funções";
$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(CD_FUNCAO) CODIGO from funcao_bi";
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
<body>
<form action="modelo.php" method="POST">
<?require("areasuperior2.php");?>

<div id="mostraconteudo33" >

<?

require("carregamenumilenionovo2.php");
?><titulogeral><? echo "$titulo";?></titulogeral></br><?

if (!IsSet($escolha) or ($escolha=="1"))
{
require("barraacao.php");
?>

  <a href="privilegiofuncao.php?pagina=1&escolha=1&programa=<?echo $programa;?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelaassociacao1=<?echo $titulojanelaassociacao1;?>&nometabelaassociativa1=<?echo $nometabelaassociativa1;?>">
  <img  src="funcaogrupo2.png" align="center" width='70' height='75' align="center"></a>

<a href="classeassociadotabelas.php?pagina=1&escolha=associatabelas&programa=<?echo $programa;?>&chacontadorgeral=<?echo $chacontadorgeralparaassociar;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelaassociacao1=<?echo $titulojanelaassociacao1;?>&nometabelaassociativa1=<?echo $nometabelaassociativa1;?>">
<img  src="funcaogrupo.png" align="center" width='70' height='75' align="center"></a>


<table  border=0
 style='background:white;' width="100%" class="tabela1">
<tr>

<?

    for($i = 0;$i < $numerocolunasprimeiratela; $i++){
    ?><th><a href="FUNCAO.php?pagina=1&escolha=associatabelas&programa=<?echo $programa;?>&navegando=sim&ordenaatual=<?echo $Campos[$i];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&titulojanelaassociacao1=<?echo $titulojanelaassociacao1;?>&nometabelaassociativa1=<?echo $nometabelaassociativa1;?>&pagina_atual=<?echo $pagina_atual;?>" style="text-decoration:none;color: white;">
		<? echo $Campos[$i];?></a>
	</th>
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

if ($ordenaatual=="DS_FUNCAO"){$sql=$sql." ORDER BY DS_FUNCAO ASC";}
if ($ordenaatual=="CD_FUNCAO"){$sql=$sql." ORDER BY CD_FUNCAO ASC";}
if ($ordenaatual=="CD_PROGRAMA"){$sql=$sql." ORDER BY CD_PROGRAMA ASC";}



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

//Caso a nossa consulta não tenha retornado nenhum resultado, então exibe o erro
} else {
    echo 'Não foram encontrados registros em sua pesquisa.';
}
}//final da primeira tela



require ("rodapepagina.php");?>


 </div>

 <div id="footer">
 <?//require ("rodapemilenio.php");?>
 </div>
 </form>


