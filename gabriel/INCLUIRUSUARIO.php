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
$programa = "INCLUIRUSUARIO.php";
$titulo = "Cadastrando Novo Usuários";
$programadelete = "classeelimina.php";
$programaupdate = "classeupdate.php";

$chacontadorgeral = "SELECT * from (SELECT  a.cd_usuario,a.nm_usuario,b.descricao PESSOA,c.descricao EMPRESA,
b.ds_email,a.cd_senha,rownum rnumber from usuario_bi a , pessoa_bi b ,pessoa_bi c 
where a.cd_usuario > 0 and
a.cd_pessoa=b.codigo and 
a.cd_empresa=c.codigo )";

$chacontadorgeralupdate = "SELECT a.cd_usuario,a.nm_usuario,b.descricao,c.descricao,b.ds_email,a.cd_senha,e.descricao  from usuario_bi a , pessoa_bi b ,pessoa_bi c,usuario_grupo_bi d,grupo_usuario_bi e
where a.cd_usuario > 0 and a.cd_pessoa=b.codigo and a.cd_empresa=c.codigo and a.cd_empresa=d.cd_empresa and a.cd_usuario=d.cd_usuario and d.cd_grupo=e.codigo ";
//diferenca é que nao tem label

//$chacontadorgeralinsert="SELECT cd_usuario,nm_usuario from usuario_bi where cd_usuario in (select max(cd_usuario) from usuario_bi)";

$chacontadorgeralpagina = "SELECT count(*) CONTADOR  from usuario_bi";

//$chacontadorgeralparaassociar="a.codigo ,a.descricao  from grupo_usuario_bi a where a.codigo > 0";

$nometabelaparapassar = "usuario_bi";
$nomecolunaparapassar = "a.cd_usuario";
$nomecolunaparapassaracao = "cd_usuario";

$numerocolunastela = "2";//usada para insert
$numerocolunasprimeiratela = "6";

$campolista1 = "999";//posicao 0,1,2,3,...
$campolista2 = "999";
$campolista3 = "999";

//$seelctcampolista1="SELECT CODIGO,DESCRICAO from grupo_usuario_bi";
//$seelctcampolista2="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";
//$seelctcampolista3="SELECT CD_PASTA,DS_PASTA from pasta_menu_bi ";


//$titulojanelaupdate="Atualizando  Grupo";
$titulojanelaelimina = "Eliminando  Usuário";
$titulojanelainsert = "Cadastrando  Usuário";
$titulojanelapesquisa = "Pesquisando Usuários";
//$titulojanelaassociacao1="Associando Grupo de Usuários a Funções do Sistema";

//$nometabelaassociativa1="funcao_grupo_bi";


$codigoproximoregitro1 = "SELECT MAX(CD_USUARIO) CODIGO from usuario_bi";
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

$registros = "17";
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

    <? require("areasuperior2.php");
       require("carregamenumilenionovo2.php");
    ?>

    <div id="mostraconteudo33">

        <div id="icones">
            <a href="INCLUIRUSUARIO2.php?pagina=1&escolha=associatabelas&programa=<? echo $programa; ?>&chacontadorgeral=<? echo $chacontadorgeral; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelaassociacao1=<? echo $titulojanelaassociacao1; ?>&nometabelaassociativa1=<? echo $nometabelaassociativa1; ?>&titulojanelainsert=<? echo $titulojanelainsert; ?>"><img
                <img src="imagens/usuario.png"></a>

            <br/><br/>

            <div style="margin-top:-10px">
                <div class="texto_icone">
                    NOVO <br/> USUÁRIO
                </div>
            </div>
        </div>

        <br/>
        <div class="titulogeral"><? echo $titulo; ?></div>

        <?
        if (!IsSet($escolha) or ($escolha == "1")) {

            //Instancio a classe de manipulação
            $s = new ManipulaSql();

            ?>
            <table class="tabela1">
            <tr>
                <?

                for ($i = 0; $i < $numerocolunasprimeiratela; $i++) {
                    ?>
                    <th><? echo $s->mostralabel($Campos, $i); ?></th>
                    <?
                }
                ?>
                <th width="5%">Deletar</th>
            </tr>
            <?

            if ($pagina_atual > "1") {
                $registros = $registros * $pagina_atual;
            }

            $sql = $tabela;
            $sql = $tabela . " WHERE rnumber BETWEEN " . $inicio . " and " . $registros;

            $classe = "2";

            $s->Seleciona($sql);
            if (!empty($s->content)) {
                foreach ($s->content as $v) {

                    $classe = ($classe == "2") ? "1" : "2";

                    ?>
                    <tr class="tabelaLinha<? echo $classe; ?>">
                        <?
                        for ($i2 = 0; $i2 < $numerocolunasprimeiratela; $i2++) {
                            ?>
                            <td><? echo $v[$i2]; ?></td>
                        <?
                        } ?>
                        <td width="5%">
                            <a href="eliminausuario.php?navegando=sim&escolha=elimina&codigoachou=<? echo $v[0]; ?>&chacontadorgeral=<? echo $chacontadorgeralupdate; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&programa=<? echo $programa; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&nomecolunaparapassar=<? echo $nomecolunaparapassar; ?>&nomecolunaparapassaracao=<? echo $nomecolunaparapassaracao; ?>&titulojanelaelimina=<? echo $titulojanelaelimina; ?>">
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

  




