<?
ini_set('display_errors', '0');// NÃO HABILITAD 

$edusuario = $_SESSION['edusuario'];
$edsenha = $_SESSION["edsenha"];
$db = $_SESSION["db"];
$bd = $_SESSION["bd"];
$host = $_SESSION["host"];
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];

$codigoempresa = $_SESSION["codigoempresa"];
$razaoempresa = $_SESSION["razaoempresa"];
$nomepessoa4 = $_SESSION["nomepessoa4"];
$magemtopoinicial = $_SESSION["magemtopoinicial"];
$razaoempresa = $_SESSION['razaoempresa'];
$nomeempresaconexao = $_SESSION['nomeempresaconexao'];

$pagina_atual = $_GET['pagina_atual'];


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

$chacontadorgeral = "SELECT * from (SELECT a.cd_usuario,b.nm_usuario,a.cd_grupo GRUPOUSUARIO,c.descricao DESCRICAOGRUPO,d.descricao EMPRESA,a.cd_empresa,rownum rnumber from
usuario_grupo_bi a,usuario_bi b,grupo_usuario_bi c,pessoa_bi d where a.cd_usuario=b.cd_usuario and a.cd_grupo=c.codigo  and a.cd_empresa=d.codigo order by a.cd_usuario asc )";


//----------------------------------------------------------------
//parametrização da tela
$programa = "USUARIONOGRUPO.php";
$programadelete = "eliminafinalusuariogrupo.php";
$titulo = "Usuários nos Grupos";


$chacontadorgeralpagina = "SELECT count(*) CONTADOR  from usuario_grupo_bi";


$nometabelaparapassar = "usuario_grupo_bi";

$numerocolunastela = "5";
$campolista1 = "999";//posicao 0,1,2,3,...
$campolista2 = "999";
$campolista3 = "999";
$campolista4 = "999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


$titulojanelaelimina = "Eliminando";

//------------------------------------------------------


$tabela = $chacontadorgeral;


$ano = date('Y');

//DEFINA PAGINACAO


$registros = "25";
require("paginacao_mi.php");
//FINAL PAGINACAO


$rsRegistro8 = $conn->Execute($tabela);


for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++) {
    $obj = $rsRegistro8->FetchField($i);
    $Campos[] = $obj->name;
}


?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>

<body>
<form  method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <? require("areasuperior2.php");
       require("carregamenumilenionovo2.php");
    ?>

    <div id="mostraconteudo33">

        <br/>
        <div class="titulogeral"><? echo $titulo; ?></div>

        <?

            if (!IsSet($escolha) or ($escolha == "1")) {
                ?>
                <table class="tabela1">

                <tr>
                    <?
                    $s = new ManipulaSql();

                    for ($i2 = 0; $i2 < $numerocolunastela; $i2++) {

                        $s->mostralabel($Campos, $i2);
                        $mostralabelfinal = $s->mostralabel($Campos, $i2);
                        ?>
                        <th><? echo $mostralabelfinal; ?></th>


                    <? } ?>
                    <th width="5%">Deletar</th>
                </tr>

                <?

                $sql = $passapesquisainicial;
                $sql = $tabela . " WHERE rnumber BETWEEN " . $inicio . " and " . $registros;

                $classe = "1";

                //Instancio a classe de manipulação
                $s = new ManipulaSql();
                $s->Seleciona($sql);
                if (!empty($s->content)) {

                    foreach ($s->content as $v) {

                        $classe = ($classe == "2") ? "1" : "2";

                        ?>
                        <tr class="tabelaLinha<? echo $classe; ?>">
                            <?
                            for ($i2 = 0; $i2 < $numerocolunastela; $i2++) {
                                ?>
                                <td><? echo $v[$i2]; ?></td>
                            <?
                            }
                            $chacontadorgeral = "SELECT * from funcao_bi a where a.cd_funcao >'0'";

                            ?>
                            <td width="5%">
                                <a href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>&usuario=<? echo $v[0]; ?>&grupo=<? echo $v[2]; ?>&empresa=<? echo $v[5]; ?>">
                                    <IMG src="lixeiranova2.png" width="25" height="20"></a>
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
            require("rodapepagina.php"); ?>

    </div>

</form>
