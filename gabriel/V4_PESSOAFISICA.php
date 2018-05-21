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
//----------------------------------------------------------------
//parametrização da tela
$programa = "V4_PESSOAFISICA.php";
$titulo = "Cadastrando Pessoa Fisica";
$programadelete = "classeelimina.php";
$programaupdate = "classeupdate.php";


//--------------------------------------
//controle para tratar consulta avancada
$navegando = $_GET['navegando'];
if ($navegando == "sim") {
    $instrucaoconsulta = $_GET['instrucaoconsulta'];
}
//-------------------


if (!IsSet($instrucaoconsulta)) {

    $chacontadorgeral = "SELECT * from (SELECT CODIGO ID,DESCRICAO Nome ,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,DS_EMAIL,ID_TIPO_PESSOA,NR_IDENTIDADE,DT_NASCIMENTO,NR_CPF,CD_CIDADE,rownum rnumber from pessoa_bi a where a.id_tipo_pessoa='1')";
} else {

    $chacontadorgeral = "SELECT * from (" . $instrucaoconsulta . ")";
}


//$chacontadorgeral="SELECT * from (SELECT CODIGO ID,DESCRICAO Nome ,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,DS_EMAIL,ID_TIPO_PESSOA,NR_IDENTIDADE,DT_NASCIMENTO,NR_CPF,CD_CIDADE,rownum rnumber from pessoa_bi a where a.id_tipo_pessoa='1')";
$chacontadorgeralinsert = "SELECT CODIGO,DESCRICAO,NM_LOGRADOURO,DS_COMPLEMENTO,NR_CEP,NM_BAIRRO,DS_EMAIL,ID_TIPO_PESSOA,NR_IDENTIDADE,DT_NASCIMENTO,NR_CPF,CD_CIDADE,ID_CONDOMINO,CD_EMPRESA_ASSOCIADA FROM pessoa_bi where codigo in (select max(codigo) from pessoa_bi)";

$chacontadorgeralupdate = "SELECT a.CODIGO,a.DESCRICAO,a.NM_LOGRADOURO,a.DS_COMPLEMENTO,a.NR_CEP,a.NM_BAIRRO,a.DS_EMAIL,a.ID_TIPO_PESSOA,a.NR_IDENTIDADE,a.DT_NASCIMENTO,a.NR_CPF,a.CD_CIDADE,
a.ID_CONDOMINO,a.CD_EMPRESA_ASSOCIADA  from pessoa_bi a where a.codigo >0";

$passapesquisainicial = "SELECT a.DESCRICAO ,a.DS_EMAIL,a.NR_IDENTIDADE,a.DT_NASCIMENTO,a.NR_CPF,a.NM_LOGRADOURO,a.DS_COMPLEMENTO,
a.NR_CEP,a.NM_BAIRRO,a.CD_CIDADE,rownum rnumber from pessoa_bi a where a.id_tipo_pessoa=1";

$chacontadorelimina = "SELECT CODIGO,DESCRICAO FROM pessoa_bi a where a.codigo >0 ";


$chacontadorgeralpagina = "SELECT count(*) CONTADOR  from pessoa_bi where id_tipo_pessoa='1'";


$nometabelaparapassar = "pessoa_bi";
$nomecolunaparapassar = "a.codigo";
$nomecolunaparapassaracao = "codigo";

$numerocolunastela = "14";//usada para insert
$numerocolunasprimeiratela = "2";
$campolista1 = "11";//posicao 0,1,2,3,...
$campolista2 = "13";
$campolista3 = "999";

$seelctcampolista1 = "SELECT CD_CIDADE,DS_CIDADE from cidade";
$seelctcampolista2 = "SELECT CODIGO,DESCRICAO from pessoa_bi where id_tipo_pessoa=2";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


$titulojanelaupdate = "Atualizando  Pessoa Fisica";
$titulojanelaelimina = "Eliminando  Pessoa Fisica";
$titulojanelainsert = "Cadastrando  Pessoa Fisica";
$titulojanelapesquisa = "Pesquisando Cadastro de Pessoa Fisica";
//$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(CODIGO) CODIGO from pessoa_bi";
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


$tabela = $chacontadorgeral;
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
<form  method="POST">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza"> </img>
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

                for ($i = 0; $i < $numerocolunasprimeiratela; $i++) {
                    ?>
                    <th><? echo $Campos[$i]; ?></th>
                    <?
                }
                ?>
                <th width="5%">Deletar</th>
                <th width="5%">Atualizar</th>
            </tr>
            <?

            if ($pagina_atual > "1") {
                $registros = $registros * $pagina_atual;
            }

            $sql = $tabela;
            $sql = $tabela . " WHERE rnumber BETWEEN " . $inicio . " and " . $registros;

            $classe = "1";

            //Instancio a classe de manipulação
            $s = new ManipulaSql();
            $s->Seleciona($sql);
            if (!empty($s->content)) {
                foreach ($s->content as $v) {
                    $classe = ($classe == "1") ? "2" : "1";
                    ?>
                    <tr class="tabelaLinha<? echo $classe; ?>">
                        <?
                        for ($i2 = 0; $i2 < $numerocolunasprimeiratela; $i2++) {
                            ?>
                            <td><? echo $v[$i2]; ?></td>
                        <?
                        } ?>
                        <td width="5%">
                            <a href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorelimina; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>">
                             <img src="lixeiranova2.png" width="25" height="20"></a>
                        </td>

                        <td width="5%">
                            <a href="<? echo $programaupdate; ?>?navegando=sim&escolha=atualiza&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&chacontadorgeralupdate=<? echo $chacontadorgeralupdate; ?>&titulojanelaupdate=<? echo $titulojanelaupdate; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&campolista3=<? echo $campolista3; ?>&seelctcampolista3=<? echo $seelctcampolista3; ?>">
                                <IMG src="editar2.png" width="25" height="20"></a>
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
