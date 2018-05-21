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
$programa="PARAMETRIZAUSUARIO.php";
$titulo="Parametrizando Usuários por Empresas";
$programadelete="classeeliminanaojob.php";
$programaupdate="classeupdate.php";

$chacontadorgeral="SELECT * from (SELECT  a.cd_usuario,a.id_libera_funcionario_acesso LIBERA1,a.id_libera_definir_funcionario LIBERA2, b.nm_usuario NOME,b.cd_senha SENHA,c.descricao DESCRICAOGRUPO, e.descricao UNIDADE,d.descricao NOMEPESSOA,
 rownum rnumber
 from
usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
b.cd_pessoa=d.codigo and
a.cd_empresa=e.codigo order by b.nm_usuario asc )";

$chacontadorgeralupdate="SELECT  a.id_libera_funcionario_acesso ,a.id_libera_definir_funcionario from usuario_grupo_bi a  where a.cd_usuario>0";
//diferenca é que nao tem label

$chacontadorgeralinsert="SELECT id_libera_funcionario_acesso ,ID_LIBERA_DEFINIR_FUNCIONARIO FROM usuario_grupo_bi where rownum=1";

$chacontadorgeralpagina="SELECT count(*) CONTADOR  from usuario_grupo_bi a, usuario_bi b, grupo_usuario_bi c,pessoa_bi d,pessoa_bi e
where a.cd_usuario=b.cd_usuario and
a.cd_grupo=c.codigo and
b.cd_pessoa=d.codigo and
a.cd_empresa=e.codigo";

$chacontadorgeralparaassociar="SELECT a.cd_funcao,a.ds_funcao,a.cd_programa from  funcao_bi a where a.cd_funcao > 0";

$nometabelaparapassar="usuario_grupo_bi";
$nomecolunaparapassar="a.cd_usuario";
$nomecolunaparapassaracao="cd_usuario";

$numerocolunastela="2";//usada para insert
$numerocolunasprimeiratela="7";

$campolista1="999";//posicao 0,1,2,3,...
$campolista2="999";
$campolista3="999";

$seelctcampolista1="SELECT cd_usuario,nm_usuario from usuario_bi";
$seelctcampolista2="SELECT codigo,descricao from grupo_usuario_bi ";
$seelctcampolista3="SELECT CODIGO,DESCRICAO from pessoa_bi where  id_tipo_pessoa=2";




$titulojanelaupdate="Nova Parametrização";
$titulojanelaelimina="Eliminando  Função";
$titulojanelainsert="Nova Parametrização";
$titulojanelapesquisa="Pesquisando Cadastro de Funções";
$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

$nometabelaassociativa1="funcao_grupo_bi";




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
require("carregamenumilenionovo2.php");
if (!IsSet($escolha) or ($escolha=="1"))
{

?>

<table  border=0
 style='background:white;' width="100%" class="tabela1">
<tr>
<?

    for($i = 0;$i < $numerocolunasprimeiratela; $i++){
    
	IF ($Campos[$i]=="LIBERA1"){$mostralabel="Usuário Libera</br>Acesso";}
	else
		{
             IF ($Campos[$i]=="LIBERA2")
			 {
              $mostralabel="Usuário Define </br>Funcionários de Acesso";
			 }
		     else
			{
				$mostralabel=$Campos[$i];
		    }
		}
	
	?><th><? echo $mostralabel;?></th>
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


