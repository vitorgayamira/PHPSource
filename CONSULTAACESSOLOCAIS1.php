<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");
//----------------------------------------------------------------
//parametriza��o da tela
$programa="CONSULTAACESSOLOCAIS1.php";
$titulo="Pessoas Autorizadas para Acesso";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$ano77=date('Y');
   $mes77=date('m');
   $dia77=date('d');



$continuarmesmatela=$_POST['continuarmesmatela'];
if ($continuarmesmatela=="sim"){
$cpfpesquisa=$_POST['cpfpesquisa'];
}

  $diahoje=$dia77."/".$mes77."/".$ano77;

IF ($cpfpesquisa==NULL){
$chacontadorgeral="SELECT * from (select b.descricao Nome,b.nr_cpf CPF,b.nr_identidade RG,c.descricao Empresa_Liberada,d.ds_motivo MOTIVO,f.descricao Solicitante,to_char(a.dt_limite_acesso_inicial,'dd/mm/yyyy') INICIO,to_char(a.dt_limite_acesso_final,'dd/mm/yyyy') FINAL, rownum rnumber from SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao d,pessoa_bi b,pessoa_bi c,SOLICITACAO_MOTIVO_ACESSO e,pessoa_bi f WHERE a.CD_funcionario=b.codigo and a.CD_EMPRESA_SOLICITANTE=c.codigo and a.cd_motivo=d.cd_motivo and a.ID_LIBERADO='S' and a.dt_limite_acesso_inicial <=to_date('$diahoje','dd/mm/YYYY') and a.dt_limite_acesso_final>=to_date('$diahoje','dd/mm/YYYY') and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
e.CD_PESSOA_SOLICITANTE=f.codigo  order by a.nr_pedido asc)";

}
else
{

$chacontadorgeral="SELECT * from (select b.descricao Nome,b.nr_cpf CPF,b.nr_identidade RG,c.descricao Empresa_Liberada,d.ds_motivo MOTIVO,f.descricao Solicitante,to_char(a.dt_limite_acesso_inicial,'dd/mm/yyyy') INICIO,to_char(a.dt_limite_acesso_final,'dd/mm/yyyy') FINAL, rownum rnumber from SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao d,pessoa_bi b,pessoa_bi c,SOLICITACAO_MOTIVO_ACESSO e,pessoa_bi f WHERE a.CD_funcionario=b.codigo and a.CD_EMPRESA_SOLICITANTE=c.codigo and a.cd_motivo=d.cd_motivo and a.ID_LIBERADO='S' and a.dt_limite_acesso_inicial <=to_date('$diahoje','dd/mm/YYYY') and a.dt_limite_acesso_final>=to_date('$diahoje','dd/mm/YYYY') and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
e.CD_PESSOA_SOLICITANTE=f.codigo and b.nr_cpf like '%$cpfpesquisa%' order by a.nr_pedido asc)";
}




$chacontadorgeralinsert="select a.NR_SEQUENCIA,a.NR_PEDIDO,c.descricao Empresa_Solicitante,rownum rnumber
from SOLICITACAO_MOTIVO_ACESSO a,pessoa_bi c,pessoa_bi b,pessoa_bi d
WHERE a.CD_EMPRESA_ACESSO.b.codigo and
a.CD_EMPRESA_SOLICITANTE=c.codigo and
a.cd_motivo=d.ds_motivo AND
a.cd_pessoa_solicitante=d.codigo and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
a.nr_sequencia  in (select max(nr_sequencia) from SOLICITACAO_MOTIVO_ACESSO)";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from SOLICITACAO_MOTIVO_FUNC_ACESSO";

//$chacontadorgeralparaassociar="a.codigo ,a.descricao  from grupo_usuario_bi a where a.codigo > 0";

$nometabelaparapassar="SOLICITACAO_MOTIVO_FUNC_ACESSO";
$nomecolunaparapassar="a.nr_sequencia";
$nomecolunaparapassaracao="nr_sequencia";

$numerocolunastela="2";//usada para insert
$numerocolunasprimeiratela="8";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";



$codigoproximoregitro1 = "SELECT MAX(NR_SEQUENCIA) CODIGO from SOLICITACAO_MOTIVO_FUNC_ACESSO";
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
<form action="CONSULTAACESSOLOCAIS1.php" method="POST">
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

          <table>
          <tr>
           <td>
           Cpf:<input type="txt" name="cpfpesquisa" >
           </td>
           <td>
		   <input type="hidden" name="continuarmesmatela" value="sim">
          
          <a href="#" onclick="document.forms[0].submit();return false;">
          <IMG src="selecionar.png" width="120" height="40" ></a>
           
           <a href="portariapdf.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>buscarparametro=excluir">
           <IMG src="gerarpdf.png" width="120" height="40" ></a>
          </td>
          </tr>
          <table>


<table  border=1
 style='background:white;' width="100%">
<tr>
<?

    for($i = 0;$i < $numerocolunasprimeiratela; $i++){
    	?><th><? echo $Campos[$i];?></th>
	<?

}
?>

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


