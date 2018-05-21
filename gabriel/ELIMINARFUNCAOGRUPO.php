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
$ordenaatual = $_GET['ordenaatual'];


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

$chacontadorgeral = "SELECT * from (SELECT a.nr_sequencia, b.descricao, d.ds_funcao ,c.ds_pasta from funcao_grupo_bi a,grupo_usuario_bi b,pasta_menu_bi c,
funcao_bi d where a.cd_pasta=c.cd_pasta and
a.cd_grupo=b.codigo and a.cd_funcao=d.cd_funcao ";


//----------------------------------------------------------------
//parametrização da tela
$programa = "ELIMINARFUNCAOGRUPO.php";
$programadelete = "eliminafinalfuncaogrupo.php";
$titulo = "Eliminando Função Grupo";


$passapesquisainicial = "select a.cd_funcao ,a.ds_funcao ,a.cd_programa  from funcao_bi a where  a.cd_funcao > 0";
$chacontadorgeralpagina = "SELECT count(*) CONTADOR  from funcao_grupo_bi";


$nometabelaparapassar = "funcao_bi";
$nomecolunaparapassar = "a.cd_funcao";
$nomecolunaparapassaracao = "cd_funcao";

$numerocolunastela = "4";
$campolista1 = "999";//posicao 0,1,2,3,...
$campolista2 = "999";
$campolista3 = "999";
$campolista4 = "999";

$seelctcampolista1 = "SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
$seelctcampolista2 = "SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


$titulojanelaelimina = "Eliminando";

//------------------------------------------------------


$tabela = $chacontadorgeral . ")";
$ano = date('Y');

//DEFINA PAGINACAO


$registros = 12;
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

<form method="POST">
    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <?
    require("areasuperior2.php");
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

                for ($i2 = 1; $i2 < $numerocolunastela; $i2++) {

                    ?>
                    <th>
                        <a class="linktabela" href="ELIMINARFUNCAOGRUPO.php?novologin=nao&navegando=sim&ordenaatual=<? echo $Campos[$i2]; ?>">
                            <? echo $s->mostralabel($Campos, $i2); ?>
                    </th>


                <? } ?>
                <th width="5%">Deletar</th>
            </tr>

            <?

            $sql = $chacontadorgeral;

            if ($ordenaatual != "") {
                $sql = $sql . " ORDER BY " . $ordenaatual . " ASC)";
            } else {
                $sql = $sql . " ORDER BY  b.descricao, d.ds_funcao ,c.ds_pasta)";
            }

            if ($pagina_atual > "1") {
                $registros = $registros * $pagina_atual;
            }

            $classe = "1";

            $s->Seleciona($sql);
            if (!empty($s->content)) {

                $i = 0;

                foreach ($s->content as $v) {

                    // Controle de paginacao
                    if (!($i >= $inicio && $i < $registros)) {
                        $i++;
                        continue;
                    }

                    $i++;
                    $classe = ($classe == "1") ? "2" : "1";

                    ?>
                    <tr class="tabelaLinha<? echo $classe; ?>">
                        <?
                        for ($i2 = 1; $i2 < $numerocolunastela; $i2++) {
                            ?>
                            <td><? echo $v[$i2]; ?></td>
                            <?
                        }
                        $chacontadorgeral = "SELECT * from funcao_bi a where a.cd_funcao >'0'";

                        ?>
                        <td width="5%">
                            <a href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>">
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
        } //final da primeira tela
        require("rodapepagina.php"); ?>

    </div>

</form>
