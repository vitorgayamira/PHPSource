<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo.css");
//----------------------------------------------------------------
//parametrização da tela
$programa="NOVAAUTORIZACAOACESSO.php";
$titulo="Autorizando Solicitações de Acesso";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (select a.NR_PEDIDO ,c.descricao SOLICITANTE ,to_char(a.data_emissao,'dd/mm/yyyy') DATA,rownum rnumber
from  SERV_TERC_PEDIDO_ACESSO a,pessoa_bi c,pessoa_bi b
WHERE a.CD_EMPRESA_ACESSO=b.codigo and
a.CD_EMPRESA_SOLICITANTE=c.codigo AND a.id_status='ABER' AND a.nr_pedido in (select nr_pedido from SOLICITACAO_MOTIVO_FUNC_ACESSO where id_liberado='N')
order by a.NR_PEDIDO desc
)";
//$chacontadorgeralupdate="SELECT a.cd_motivo ,a.ds_motivo  from motivo_solicitacao a where a.cd_motivo > 0 ";
//diferenca é que nao tem label







$chacontadorgeralpagina="SELECT count(*) CONTADOR  from SERV_TERC_PEDIDO_ACESSO a,pessoa_bi c,pessoa_bi b
WHERE a.CD_EMPRESA_ACESSO=b.codigo and
a.CD_EMPRESA_SOLICITANTE=c.codigo AND a.id_status='ABER' AND a.nr_pedido in (select nr_pedido from SOLICITACAO_MOTIVO_FUNC_ACESSO where id_liberado='N')";

//$chacontadorgeralparaassociar="a.codigo ,a.descricao  from grupo_usuario_bi a where a.codigo > 0";

$nometabelaparapassar="SOLICITACAO_MOTIVO_ACESSO";
$nomecolunaparapassar="a.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";

$numerocolunastela="2";//usada para insert
$numerocolunasprimeiratela="3";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";




$titulojanelaupdate="Atualizando  Motivos de Acesso";
$titulojanelaelimina="Eliminando  Motivos";
$titulojanelainsert="Cadastrando  Motivos de Acesso";
$titulojanelapesquisa="Pesquisando Motivos";
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





<table  border=1
 style='background:white;' width="100%">
<tr>
<?



    for($i = 0;$i < $numerocolunasprimeiratela; $i++){

      if ($Campos[$i]=="NR_PEDIDO"){$Campos[$i]="Nr. Pedido";}
	  if ($Campos[$i]=="SOLICITANTE"){$Campos[$i]="Empresa Solicitante";}
	  if ($Campos[$i]=="DATA"){$Campos[$i]="Dta Abertura";}


     if (($Campos[$i]=="0") or ($Campos[$i]=="2") ){?><th width="3%"><? echo $Campos[$i];?></th>
	<?}else{
	?><th><? echo $Campos[$i];?></th>
	<?}

}
?>
<th width="5%">Autorizar</th>
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
        ?>
        <td><?echo $v[$i2];?></td>
        <?}?>
        <td width="5%">
        <a href="SOLICITACAOACESSO3.php?navegando=sim&escolha=elimina&codigoachou=<?echo $v[0];?>&chacontadorgeral=<?echo $chacontadorgeralupdate;?>&numerocolunastela=<?echo $numerocolunastela;?>&programa=<?echo $programa;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&nomecolunaparapassar=<?echo $nomecolunaparapassar;?>&nomecolunaparapassaracao=<?echo $nomecolunaparapassaracao;?>&titulojanelaelimina=<?echo $titulojanelaelimina;?>">
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


