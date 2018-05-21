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
					 $escolha=$_GET['escolha'];


					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="cidadesadege.php";
$titulo="Relação de Cidades";
$programadelete="classeelimina.php";
$programaupdate="classeupdate.php";


if (!IsSet($escolha)){require("logtela.php");}	


$chacontadorgeral="SELECT * from (SELECT a.cd_cidade ID,a.ds_cidade DESCRICAO,a.cd_estado UF,rownum rnumber FROM cidade a where a.cd_cidade  is not null)";
//aqui tem o label no select
$chacontadorgeralupdate="select a.cd_cidade ,a.ds_cidade ,a.cd_estado  FROM cidade a where a.cd_cidade>'0'";
//diferenca é que nao tem label

$chacontadorgeralinsert="SELECT CD_CIDADE,DS_CIDADE,CD_ESTADO FROM cidade where cd_cidade in (select max(cd_cidade) from cidade)";


$chacontadorgeralpagina="SELECT count(*) CONTADOR  from cidade";

$nometabelaparapassar="cidade ";
$nomecolunaparapassar="a.cd_cidade";
$nomecolunaparapassaracao="cd_cidade";

$numerocolunastela="3";
$numerocolunasprimeiratela="3";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="2";
$campolista3="999";//posicao 0,1,2,3,...
$campolista4="999";//posicao 0,1,2,3,...





//$seelctcampolista1="SELECT CD_GRUPO,DS_GRUPO from grupo_veiculo_bi";
$seelctcampolista2="SELECT cd_estado ,ds_estado from estado order by ds_estado asc";
///$seelctcampolista3="SELECT CODIGO,DESCRICAO from pessoa_bi WHERE ID_TIPO_PESSOA='1' ";




$titulojanelaupdate="Atualizando  Cidade";
$titulojanelaelimina="Eliminando  Cidade";
$titulojanelainsert="Cadastrando  Cidade";
$titulojanelapesquisa="Pesquisando Cidade";


//------------------------------------------------------


$tabela=$chacontadorgeral;
$ano=date('Y');

//DEFINA PAGINACAO

    $registros = "23";
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
<?require("areasuperior2.php");
require("carregamenumilenionovo2.php");

$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];
?>
 
 


<titulogeral><? echo "$titulo";?></titulogeral></br>

<?
if (!IsSet($escolha) or ($escolha=="1"))
{
require("barraacao.php");

?>
<center><table  border=0
 style='background:white;' width="80%" class="tabela1">
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

$sql=$tabela;
$sql=$tabela." WHERE rnumber BETWEEN ".$inicio." and ".$registros;




//Instancio a classe de manipulação
$s = new ManipulaSql();
$s->Seleciona($sql);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {
	$chacontadorgeral="SELECT a.cd_cidade ,a.ds_cidade,a.cd_estado  FROM cidade a where a.cd_cidade  is not null";	
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
