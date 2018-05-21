<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");
//----------------------------------------------------------------
//parametrização da tela
$programa="NOVASOLICITACAOACESSO.php";
$titulo="Histôrico de Solicitações de Acesso";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (select a.NR_PEDIDO Nr_Solicitação,c.descricao Empresa_Solicitante,to_char(a.data_emissao,'dd/mm/yyyy') Dta_Abertura,
a.id_status Situação,rownum rnumber
from SERV_TERC_PEDIDO_ACESSO a,pessoa_bi c,pessoa_bi b
WHERE a.CD_EMPRESA_ACESSO=b.codigo and
a.CD_EMPRESA_SOLICITANTE=c.codigo order by a.NR_PEDIDO desc)";
//$chacontadorgeralupdate="SELECT a.cd_motivo ,a.ds_motivo  from motivo_solicitacao a where a.cd_motivo > 0 ";
//diferenca é que nao tem label


$chacontadorgeralinsert="select a.NR_SEQUENCIA,a.NR_PEDIDO,c.descricao Empresa_Solicitante,rownum rnumber
from SOLICITACAO_MOTIVO_ACESSO a,pessoa_bi c,pessoa_bi b,pessoa_bi d
WHERE a.CD_EMPRESA_ACESSO.b.codigo and
a.CD_EMPRESA_SOLICITANTE=c.codigo and
a.cd_motivo=d.ds_motivo AND
a.cd_pessoa_solicitante=d.codigo and
a.nr_sequencia  in (select max(nr_sequencia) from SOLICITACAO_MOTIVO_ACESSO)";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from SOLICITACAO_MOTIVO_ACESSO";

//$chacontadorgeralparaassociar="a.codigo ,a.descricao  from grupo_usuario_bi a where a.codigo > 0";

$nometabelaparapassar="SOLICITACAO_MOTIVO_ACESSO";
$nomecolunaparapassar="a.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";

$numerocolunastela="2";//usada para insert
$numerocolunasprimeiratela="4";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";





$titulojanelaelimina="Eliminando Solicitação";

//$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(NR_SEQUENCIA) CODIGO from SOLICITACAO_MOTIVO_ACESSO";
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
?>
<a href="NOVASOLICITACAOACESSO2.php?pagina=1&escolha=novoregistro&programa=<?echo $programa;?>&chacontadorgeralinsert=<?echo $chacontadorgeralinsert;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelainsert=<?echo $titulojanelainsert;?>&codigoproximoregitro=<?echo $codigoproximoregitro;?>">
<img width=50 height=60 BORDER=1  src="incluir.GIF">
</a>




<table  border=1
 style='background:white;' width="100%">
<tr>
<?

    for($i = 0;$i < $numerocolunasprimeiratela; $i++){
     if ($Campos[$i]=="0"){?><th width="3%"><? echo $Campos[$i];?></th>
	<?}else{
	?><th><? echo $Campos[$i];?></th>
	<?}

}
?>

</tr>
<?

if ($pagina_atual >"1"){$registros=$registros*$pagina_atual;}

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
        for($i2 = 0;$i2 < $numerocolunasprimeiratela; $i2++){
        IF ($v[$i2]=="FINA")
		{
			$mostra="Finalizada";?><td><?echo $mostra;?></td><?
		}
		else
		{
		   IF ($v[$i2]=="ABER"){
		     $mostra="Aguardando Autorização";?><td><?echo $mostra;?></td><?
		   }
		   ELSE
			{
			?>
             <td><?echo $v[$i2];?></td>
             <?
			
			}
		
		
		}
		
        }//final do for
		?>
            



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


