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
$tipo = $_GET['tipo'];
$statuspega = $_GET['statuspega'];
$sequenciapega = $_GET['sequenciapega'];
$ordenaatual = $_GET['ordenaatual'];


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');

//----------------------------------------------------------------
//parametrização da tela
$programa = "privilegiofuncao.php";
$titulo = "Função por Grupo de Usuário";
$programadelete = "classeelimina.php";
$programaupdate = "classeupdate.php";


if ($tipo == "DESATIVAFUNCAO") {
    IF ($statuspega == "N") {
        $grava = "update funcao_grupo_bi set id_atualizar='S' WHERE nr_sequencia='$sequenciapega'";
        //echo "$grava";
        $result = $conn->Execute($grava);

    }
    IF ($statuspega == "S") {
        $grava = "update funcao_grupo_bi set id_atualizar='N' WHERE nr_sequencia='$sequenciapega'";
        //echo "$grava";
        $result = $conn->Execute($grava);

    }
    $escolha = "1";
}


$chacontadorgeral = "SELECT * from (SELECT  a.ds_funcao Funcao, b.descricao Grupo_Usuário,c.id_atualizar ,c.nr_sequencia,rownum rnumber
FROM funcao_bi a, grupo_usuario_bi b, funcao_grupo_bi c
WHERE a.cd_funcao > 0
AND a.cd_funcao = c.cd_funcao
AND c.cd_grupo = b.codigo ";
//aqui tem o label no select
$chacontadorgeralupdate = "SELECT a.cd_funcao ,a.ds_funcao,a.cd_programa from funcao_bi a where a.cd_funcao >0 ";
//diferenca é que nao tem label


$chacontadorgeralpagina = "SELECT count(*) CONTADOR  from funcao_bi a, grupo_usuario_bi b, funcao_grupo_bi c
WHERE a.cd_funcao > 0
AND a.cd_funcao = c.cd_funcao
AND c.cd_grupo = b.codigo";


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


$titulojanelaupdate = "Atualizando  Função";
$titulojanelaelimina = "Eliminando  Função";
$titulojanelainsert = "Cadastrando  Função";
$titulojanelapesquisa = "Pesquisando Cadastro de Funções";
$titulojanelaassociacao1 = "Associando Grupo de Usuários a Funções do Sistema";

$nometabelaassociativa1 = "funcao_grupo_bi";

$codigoproximoregitro1 = "SELECT MAX(cd_funcao) CODIGO from funcao_bi";
$codigoproximoregitro2 = $conn->Execute($codigoproximoregitro1);
while (!$codigoproximoregitro2->EOF) {
    $codigoproximoregitro4 = $codigoproximoregitro2->fields["CODIGO"];
    IF ($codigoproximoregitro4 > "0") {
        $codigoproximoregitro = $codigoproximoregitro4 + 1;
    } ELSE {
        $codigoproximoregitro = "1";
    }

    $codigoproximoregitro2->MoveNext();
}


//------------------------------------------------------


$tabela = $chacontadorgeral . ")";
$ano = date('Y');

//DEFINA PAGINACAO


$registros = 12;
require("paginacao_mi.php");
//FINAL PAGINACAO


$rsRegistro8 = $conn->Execute($tabela);

for ($i = 0; $i < 3; $i++) {
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

    <? require("areasuperior2.php");
    require("carregamenumilenionovo2.php");
    ?>

    <div id="mostraconteudo33">

        <?
        if (!IsSet($escolha) or ($escolha == "1")) {
            require("barraacao.php");

            ?>
            <br/>
            <div class="titulogeral"><? echo $titulo; ?></div>

            <table class="tabela1">
            <tr>
                <?

                //Instancio a classe de manipulação
                $s = new ManipulaSql();

                for ($i = 0; $i < 3; $i++) {
                    ?>
                    <th><a class="linkTabela" href="privilegiofuncao.php?pagina=1&escolha=1&programa=<? echo $programa; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelaassociacao1=<? echo $titulojanelaassociacao1; ?>&nometabelaassociativa1=<? echo $nometabelaassociativa1; ?>&ordenaatual=<? echo $Campos[$i]; ?>">
                            <? echo $s->mostralabel($Campos, $i); ?> </a>
                    </th>
                    <?
                }

                ?>
                <th width="5%">DELETAR</th>

            </tr>
            <?

            $sql = $chacontadorgeral;

            if ($ordenaatual != "") {
                $sql = $sql . " ORDER BY " . $ordenaatual . " ASC ) ";
            } else {
                $sql = $sql . " ORDER BY b.descricao, a.ds_funcao )";
            }

            $classe = "2";

            $s->Seleciona($sql);
            if (!empty($s->content)) {

                $i = 0;

                foreach ($s->content as $v) {

                    // Controle de paginacao
                    if (!($i >= $inicio && $i < $fim)) {
                        $i++;
                        continue;
                    }

                    $i++;
                    $classe = ($classe == "2" ) ? "1" : "2";

                    ?>
                    <tr class="tabelaLinha<? echo $classe; ?>">
                        <?
                        for ($i2 = 0; $i2 < 3; $i2++) {
                            $sequenciapega = $v[3];
                            if ($i2 == "2") {
                                $statuspega = $v[$i2];
                                ?>
                                <td>
                                    <a href="privilegiofuncao.php?escolha=associatabelas&sequenciapega=<? echo $sequenciapega; ?>&statuspega=<? echo $statuspega; ?>&tipo=DESATIVAFUNCAO&navegando=sim&"><? echo $v[$i2]; ?>
                                </td>
                                <?
                            }
                            if (($i2 == "0") or ($i2 == "1") or ($i2 == "4")) {
                                ?>
                                <td><? echo $v[$i2]; ?></td>
                                <?
                            }
                        }
                        ?>
                        <td width="5%">
                            <a href="#"> <!--href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>"> -->
                                <img src="lixeiranova2.png" width="25" height="20"></a>
                        </td>


                    </tr>
                    <?
                }
                require("rodapepagina.php");
                ?>
                </table>
                <?

                //Caso a nossa consulta não tenha retornado nenhum resultado, então exibe o erro
            } else {
                echo 'Não foram encontrados registros em sua pesquisa.';
            }
        }//final da primeira tela
        ?>


    </div>

</form>
