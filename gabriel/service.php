<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo.css");
//----------------------------------------------------------------
//parametriza��o da tela
$programa="service.php";
$titulo="Record Service";
$programadelete="classeelimina.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT a.id_service ID,a.service Service FROM service a where a.id_service >0 order by a.id_service asc
";
//aqui tem o label no select
$chacontadorgeralupdate="SELECT a.id_service ,a.service   FROM service a where a.id_service >0";
//diferenca � que nao tem label

$chacontadorgeralinsert="SELECT id_service,service FROM service where id_service in (select max(id_service) from service)";


$chacontadorgeralpagina="SELECT count(*) CONTADOR  from service";

$nometabelaparapassar="service";
$nomecolunaparapassar="a.id_service";
$nomecolunaparapassaracao="id_service";

$numerocolunastela="2";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";

//$seelctcampolista1="SELECT CD_GRUPO,DS_GRUPO from grupo_veiculo_bi";
//$seelctcampolista2="SELECT CODIGO,DESCRICAO from pessoa_bi ";




$titulojanelaupdate="Atualizando  Service";
$titulojanelaelimina="Eliminando  Service";
$titulojanelainsert="Cadastrando  Service";
$titulojanelapesquisa="Pesquisando Service";



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




<div id="mostrasuperiortitulo" >
<?require("areasuperior.php");?>
<?require("carregamenumilenionovo.php");?>
</div>



<div id="mostraconteudo33job" >

<?
if (!IsSet($escolha) or ($escolha=="1"))
{
require("barraacao.php");

?>
<table  border=1
 style='background:white;' width="100%">
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
        for($i2 = 0;$i2 < $numerocolunastela; $i2++){
        if ($i2=="0"){
		?>
        <td width="5%"><?echo $v[$i2];?></td>
        <?}
		else
		{
		?>
        <td><?echo $v[$i2];?></td>
        <?
		}
		}
		?>
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

//Caso a nossa consulta n�o tenha retornado nenhum resultado, ent�o exibe o erro
} else {
    echo 'N�o foram encontrados registros em sua pesquisa.';
}
}//final da primeira tela



//require ("rodapepagina.php");?>


 </div>

 <div id="footer">
 <?//require ("rodapemilenio.php");?>
 </div>
 </form>
 </body>