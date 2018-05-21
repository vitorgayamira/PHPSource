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
$programa = "exclusaoordens.php";
$titulo = "Exclusão de Horas Trabalhadas";
$programadelete = "classeelimina.php";
$programaupdate = "classeupdate.php";


//--------------------------------------


//pega data de incio

if (!IsSet($ano)) {
    $ano = date('Y');
}
if (!IsSet($dia)) {
    $dia = date('d');
}
if (!IsSet($mes)) {
    $mes = date('m');
}

if (!IsSet($dataparabuscar1)) {

    $datapegou1 = "SELECT to_char(MIN(DATA_INICIO),'yyyy-mm-dd') DATA FROM EMER_COMP WHERE STATUS <> 'B'";
    $datapegou2 = $conn->Execute($datapegou1);
    while (!$datapegou2->EOF) {
        $data1b = $datapegou2->fields["0"];
        $datapegou2->MoveNext();
    }

    $datapegou12 = "SELECT to_char(MIN(DATA_PLANE),'yyyy-mm-dd') DATA FROM ORDEM_COMP WHERE STATUS <> 'B'";
    $datapegou22 = $conn->Execute($datapegou12);
    while (!$datapegou22->EOF) {
        $data2b = $datapegou22->fields["0"];
        $datapegou22->MoveNext();
    }


    // Comparando as Datas
    if (strtotime($data1b) > strtotime($data2b)) {
        $dataparabuscar1 = $data2b;
    } else {
        $dataparabuscar1 = $data1b;
    }

    $dataparabuscar2 = $ano . "-" . $mes . "-" . $dia;
}


$datapesquisa1ano = substr($dataparabuscar1, 0, 4);
$datapesquisa1mes = substr($dataparabuscar1, 5, 2);
$datapesquisa1dia = substr($dataparabuscar1, 8, 2);
$datapesquisa1 = $datapesquisa1dia . "-" . $datapesquisa1mes . "-" . $datapesquisa1ano;


$datapesquisa2ano = substr($dataparabuscar2, 0, 4);
$datapesquisa2mes = substr($dataparabuscar2, 5, 2);
$datapesquisa2dia = substr($dataparabuscar2, 8, 2);
$datapesquisa2 = $datapesquisa2dia . "-" . $datapesquisa2mes . "-" . $datapesquisa2ano;


//=============


//controle para tratar consulta avancada
$navegando = $_GET['navegando'];
if ($navegando == "sim") {
    $instrucaoconsulta = $_GET['instrucaoconsulta'];
}
//-------------------


$chacontadorgeral = "SELECT * from (select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,
              a.CD_COMPONENTE CD_COMPONENTE,
              a.NUMERO NUMERO,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,c.DS_MODALIDADE MODALIDADE2,1 TIPO,a.nr_sequencia,rownum Id
			  from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO like '%$numeroordempesquisa%' AND
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade
              UNION
              select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,a.NUMERO_ORDEM NUMERO_ORDEM,
              a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,c.DS_MODALIDADE MODALIDADE2,2 TIPO,a.nr_sequencia,rownum Id
			  from  COMP_FUNC  a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO_ORDEM like '%$numeroordempesquisa%'  and
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade ORDER  BY DATABAIXA DESC )   ";


$crialabelinicial = "select b.NOME,a.CADASTRO,a.DATA_BAIXA_INDIVIDUAL,
              a.CD_COMPONENTE,
              a.NUMERO,a.CD_CARGO,a.HR_INI,a.HR_FIM,c.DS_MODALIDADE ,1 TIPO,a.nr_sequencia
			  from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO like '%$numeroordempesquisa%' AND
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade and rownum=1
              UNION
              select b.NOME,a.CADASTRO,a.DATA_BAIXA_INDIVIDUAL,a.CD_COMPONENTE,a.NUMERO_ORDEM,
              a.CD_CARGO,a.HR_INI,a.HR_FIM,c.DS_MODALIDADE,2 TIPO,a.nr_sequencia
			  from  COMP_FUNC  a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO_ORDEM like '%$numeroordempesquisa%'  and
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade and rownum=1";


if (!IsSet($grupoordens)) {
    $grupoordens = "C";
}

if (!IsSet($tipoordemstatus)) {
    $tipoordemstatus = "G";
}


/*
$passapesquisainicial="select b.NOME ,a.CADASTRO,a.DATA_BAIXA_INDIVIDUAL ,
a.CD_COMPONENTE,
a.NUMERO,a.CD_CARGO,a.HR_INI,a.HR_FIM,c.DS_MODALIDADE
from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
WHERE a.cadastro=b.cadastro and
a.cd_modalidade=c.cd_modalidade
";
*/

$passapesquisainicial = "select b.NOME ,a.NUMERO,a.HR_INI,a.HR_FIM
			  from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b
              WHERE a.cadastro=b.cadastro 
              ";

$chacontadorgeralpagina = "SELECT sum(CONTADOR) CONTADOR from (select count(*) CONTADOR  from   COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b
              WHERE a.NUMERO like '%$numeroordempesquisa%' AND
              a.cadastro=b.cadastro  union
					   SELECT count(*) CONTADOR  from COMP_FUNC  a,FUNCIONARIO_SADEGE b
              WHERE a.NUMERO_ORDEM like '%$numeroordempesquisa%' and
              a.cadastro=b.cadastro )";


$nomecolunaparapassar = "nr_sequencia";

$nomecolunaparapassaracao = "nr_sequencia";

$numerocolunastela = "14";//usada para insert
$numerocolunasprimeiratela = "9";
$campolista1 = "0";//posicao 0,1,2,3,...
$campolista2 = "999";
$campolista3 = "999";

$seelctcampolista1 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE";
//$seelctcampolista2="SELECT CODIGO,DESCRICAO from pessoa_bi where id_tipo_pessoa=2";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


$titulojanelaelimina = "Eliminando  ordens";
$titulojanelapesquisa = "Pesquisando ordens para Exclusão";
//$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


//------------------------------------------------------


$tabela = $chacontadorgeral;


$ano = date('Y');

//DEFINA PAGINACAO

$registros = 12;
require("paginacao_mi.php");
//FINAL PAGINACAO

$rsRegistro8 = $conn->Execute($crialabelinicial);

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

    if (!IsSet($escolha) or ($escolha == "1"))
    {


    ?>
    <div id="mostraconteudo33">

        <?
        require("barraacao.php");
        ?>

        <br/>
        <div class="titulogeral"><? echo $titulo; ?></div>

        <table  class="tabela1">
            <tr>
                <?
                $s = new ManipulaSql();

                for ($i2 = 0; $i2 < $numerocolunasprimeiratela; $i2++) {

                    $s->mostralabel($Campos, $i2);
                    $mostralabelfinal = $s->mostralabel($Campos, $i2);
                    ?>
                    <th><? echo $mostralabelfinal; ?></th>


                <? } ?>
                <th width="5%">Deletar</th>
            </tr>
            <?


            if ($pagina_atual > "1") {
                $registros = $registros * $pagina_atual;
            }

            $sql = $tabela;
            $sql = $tabela;

            $classe = "1";

            //Instancio a classe de manipulação
            $s = new ManipulaSql();
            $s->Seleciona($sql);
            if (!empty($s->content))
            {

            $i = 0;

            foreach ($s->content as $v) {

                // Controle de paginacao
                if (!($i >= $inicio && $i < $registros)) {
                    $i++;
                    continue;
                }

                $i++;

                $classe = ($classe == "2") ? "1" : "2";
                ?>
                <tr class="tabelaLinha<? echo $classe; ?>">
                    <?

                    for ($i2 = 0; $i2 < $numerocolunasprimeiratela; $i2++) {
                        $sequencia = $v[10];
                        $tipo = $v[9];


                        if ($tipo == "1") {
                            $chacontadorgeralelimina = "select * from  COMP_FUNC_EMER  where  nr_sequencia >0";
                            $nometabelaparapassar = "COMP_FUNC_EMER";
                        }
                        if ($tipo == "2") {
                            $chacontadorgeralelimina = "select *  from  COMP_FUNC where  nr_sequencia >0 ";
                            $nometabelaparapassar = "COMP_FUNC";
                        }


                        ?>
                        <td><? echo $v[$i2]; ?></td>
                    <?
                    } ?>
                    <td width="5%">
                        <a href="<? echo $programadelete; ?>?navegando=sim&escolha=elimina&codigoachou=<? echo $sequencia; ?>&chacontadorgeral=<? echo $chacontadorgeralelimina; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>">

                            <IMG src="lixeiranova2.png" width="25px" height="20px"></a>
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
