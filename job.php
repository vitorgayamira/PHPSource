<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");
//----------------------------------------------------------------
//parametriza��o da tela
$programa="job.php";
$titulo="Record Service";
$programadelete="classeelimina.php";


$chacontadorgeral="SELECT b.nr_sequencia  Sequencia,a.customer,b.nr_job Nr_Job FROM customer a, job b where a.id_customer=b.id_customer ";
$chacontadorgeral2="SELECT b.nr_sequencia  ID,a.customer,b.nr_job Nr_Job FROM customer a, job b where a.id_customer=b.id_customer  order by a.customer,b.nr_job asc ";
//aqui tem o label no select

$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM customer a, job b where a.id_customer=b.id_customer";

$nometabelaparapassar="job";
$nomecolunaparapassar="b.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";

$numerocolunastela="3";
$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";

//$seelctcampolista1="SELECT CD_GRUPO,DS_GRUPO from grupo_veiculo_bi";
//$seelctcampolista2="SELECT CODIGO,DESCRICAO from pessoa_bi ";





$titulojanelaelimina="Eliminando  Jobs";
$titulojanelainsert="Record  Jobs";
$titulojanelapesquisa="Pesquisando Jobs";



//------------------------------------------------------


$tabela=$chacontadorgeral2;
$ano=date('Y');

//DEFINA PAGINACAO

    $registros = "10";
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
?>
<a href="jobinsert.php?pagina=1&escolha=novoregistro&programa=<?echo $programa;?>&chacontadorgeralinsert=<?echo $chacontadorgeralinsert;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelainsert=<?echo $titulojanelainsert;?>&codigoproximoregitro=<?echo $codigoproximoregitro;?>" style="text-decoration:none;color: black;">New job</a>
</br>
<center><table  border=1  style='background:white;' width="74%">
<tr>
<?

    for($i = 0;$i < $numerocolunastela; $i++){
    ?><th align=Left><? echo $Campos[$i];?></th>
<?
}
?>
<th width="5%">Delete</th>
<th width="5%">Wiew</th>
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
        if ($i2=="1"){
		?>
        <td width="80%"><?echo $v[$i2];?></td>
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
        <a href="jobmostra.php?pagina=1&escolha=novoregistro&programa=<?echo $programa;?>&codigoachou=<?echo $v[0];?>&chacontadorgeralinsert=<?echo $chacontadorgeralinsert;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelainsert=<?echo $titulojanelainsert;?>&codigoproximoregitro=<?echo $codigoproximoregitro;?>" style="text-decoration:none;color: black;"><IMG src="editar2.png" width="25" height="20" ></a>
        </td>    



        </tr>
    <?
    }
 ?>
 </table>
 <?

//Caso a nossa consulta n�o tenha retornado nenhum resultado, ent�o exibe o erro
} 
}//final da primeira tela



//require ("rodapepagina.php");?>


 </div>

 <div id="footer">
 <?//require ("rodapemilenio.php");?>
 </div>
 </form>
 </body>