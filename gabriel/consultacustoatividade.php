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

$escolha = $_GET['escolha'];


require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa = "consultacustoatividade.php";
$titulo = "Consulta Custo Padrão por Atividade";
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

    $navegando = $_GET['navegando'];
    $continuarmesmatela = $_POST['continuarmesmatela'];

    if ($navegando == "sim") {
        $acao = $_GET['acao'];
        $codigousuario = $_GET['codigousuario'];
        $codigoempresa = $_GET['codigoempresa'];
        $escolha = $_GET['escolha'];
        $tela = $_GET['tela'];
        $mes = $_GET['mes'];
        $ano = $_GET['ano'];
        $ano = $_GET['ano'];
        $banco = $_GET['banco'];
        $pagina = $_GET['pagina'];
        $mes1 = $_GET['mes1'];
        $tipoconsulta = $_GET['tipoconsulta'];
        $modelopesquisa = $_GET['modelopesquisa'];
        $anopesquisa = $_GET['anopesquisa'];
        $fabricantepesquisa = $_GET['fabricantepesquisa'];
        $ativopesquisa = $_GET['ativopesquisa'];
        $seriepesquisa = $_GET['seriepesquisa'];
        $patrimoniopesquisa = $_GET['patrimoniopesquisa'];
        $localizacaopesquisa = $_GET['localizacaopesquisa'];
        $familiapesquisa = $_GET['familiapesquisa'];
        $baseoracle = $_GET['baseoracle'];
        $month = $_GET['month'];
        $year = $_GET['year'];
        $dia = $_GET['dia'];
        $fabricapesquisa = $_GET['fabricapesquisa'];
        $usuario = $_GET['usuario'];
        $banco = $_GET['banco'];
        $pagina = $_GET['pagina'];
        $ambiente = $_GET['ambiente'];
        $localbanco = $_GET['localbanco'];
        $listaordemselecionada = $_GET['listaordemselecionada'];
        $fabricaescolha = $_GET['fabricaescolha'];
        $componente = $_GET['componente'];
        $acaoeliminar = $_GET['acaoeliminar'];
        $acaogravar = $_GET['acaogravar'];
        $atividadegrava = $_GET['atividadegrava'];
        $fabricapesquisa = $_GET['fabricapesquisa'];
        $veiculo = $_GET['veiculo'];
        $cadastro = $_GET['cadastro'];
        $mudoumes = $_GET['mudoumes'];
        $dataanterior = $_GET['dataanterior'];
        $mesanterior = $_GET['mesanterior'];
        $contador = $_GET['contador'];
        $cadastropesquisa = $_GET['cadastropesquisa'];
        $combustivelpesquisa = $_GET['combustivelpesquisa'];
        $localbanco = $_GET['localbanco'];
        $veiculocodigoe = $_GET['veiculocodigoe'];

        $datapesquisainicial = $_GET['datapesquisainicial'];
        $datapesquisafinal = $_GET['datapesquisafinal'];

        $fabricapesquisa = $_GET['fabricapesquisa'];


    } ?>

    <div id="icones">
        <a href="consultacustoatividade.php?pagina=1&escolha=pesquisa&programa=<? echo $programa; ?>&passapesquisainicial=<? echo $passapesquisainicial; ?>&numerocolunastela=<? echo $numerocolunastela; ?>&campolista1=<? echo $campolista1; ?>&campolista2=<? echo $campolista2; ?>&seelctcampolista1=<? echo $seelctcampolista1; ?>&seelctcampolista2=<? echo $seelctcampolista2; ?>&nometabelaparapassar=<? echo $nometabelaparapassar; ?>&titulojanelapesquisa=<? echo $titulojanelapesquisa; ?>&campolista3=<? echo $campolista3; ?>&seelctcampolista3=<? echo $seelctcampolista3; ?>&campolista4=<? echo $campolista4; ?>&seelctcampolista4=<? echo $seelctcampolista4; ?>">
            <img src="imagens/novo_calculo.png"></a>

        <a href="http://186.202.46.98:8080/osi/"><img src="imagens/solicitacao.png"></a><br/>
        <br/>

        <div style="margin-top:-10px">
            <div class="texto_icone">
                NOVO <br/> CÁLCULO
            </div>
            <div class="texto_icone">
                SOLICITAÇÃO <br/> DE SERVIÇO
            </div>
        </div>
    </div>
    <?

    if ($continuarmesmatela == "sim") {
        $codigousuario = $_POST['codigousuario'];
        $acao = $_POST['acao'];
        $codigoempresa = $_POST['codigoempresa'];
        $escolha = $_POST['escolha'];
        $tela = $_POST['tela'];
        $curva = $_POST['curva'];
        $pesomedio = $_POST['pesomedio'];
        $turnopesquisa1 = $_POST['turnopesquisa1'];
        $turnopesquisa2 = $_POST['turnopesquisa2'];
        $turno = $_POST['turno'];
        $ano = $_POST['ano'];
        $ano2 = $_POST['ano2'];
        $mes = $_POST['mes'];
        $tipo = $_POST['tipo'];
        $novo = $_POST['novo'];
        $pagina = $_POST['pagina'];
        $dia1 = $_POST['dia1'];
        $dia2 = $_POST['dia2'];
        $quantidade = $_POST['quantidade'];
        $semanainicio = $_POST['semanainicio'];
        $semanafinal = $_POST['semanafinal'];
        $turno = $_POST['turno'];
        $primeirasemana = $_POST['primeirasemana'];
        $segundasemana = $_POST['segundasemana'];
        $diainicial = $_POST['diainicial'];
        $diafinal = $_POST['diafinal'];
        $sequencia3 = $_POST['sequencia3'];
        $simulacao = $_POST['simulacao'];
        $banco = $_POST['banco'];
        $datagravarinicio = $_POST['datagravarinicio'];
        $datagravarfinal = $_POST['datagravarfinal'];
        $quantaslinhas = $_POST['quantaslinhas'];
        $quantosmercado = $_POST['quantosmercado'];
        $mes1 = $_POST['mes1'];
        $mes2 = $_POST['mes2'];
        $tipoconsulta = $_POST['tipoconsulta'];
        $quantaslinhasmp = $_POST['quantaslinhasmp'];
        $quantaslinhasnutrientemp = $_POST['quantaslinhasnutrientemp'];
        $existenutriente = $_POST['existenutriente'];
        $telainiciarsimulacao = $_POST['telainiciarsimulacao'];
        $tipoconsulta2 = $_POST['tipoconsulta2'];
        $gravandofinal = $_POST['gravandofinal'];
        $existenutriente = $_POST['existenutriente'];
        $itempesquisa2 = $_POST['itempesquisa2'];
        $itempesquisa1 = $_POST['itempesquisa2'];
        $tipoconsulta1 = $_POST['tipoconsulta1'];
        $modelopesquisa = $_POST['modelopesquisa'];
        $anopesquisa = $_POST['anopesquisa'];
        $ativopesquisa = $_POST['ativopesquisa'];
        $seriepesquisa = $_POST['seriepesquisa'];
        $patrimoniopesquisa = $_POST['patrimoniopesquisa'];
        $localizacaopesquisa = $_POST['localizacaopesquisa'];
        $familiapesquisa = $_POST['familiapesquisa'];

        $selecaofabrica = $_POST['selecaofabrica'];
        $contadorlinha = $_POST['contadorlinha'];
        $contadorfamilia = $_POST['contadorfamilia'];
        $contadorfabrica = $_POST['contadorfabrica'];
        $contadorregiao = $_POST['contadorregiao'];
        $contadordistrito = $_POST['contadordistrito'];
        $listamodelo = $_POST['listamodelo'];
        $listafamilia = $_POST['listafamilia'];
        $lista = $_POST['lista'];
        $listafabricante = $_POST['listafabricante'];
        $listaano = $_POST['listaano'];
        $listaregiao = $_POST['listaregiao'];
        $listadistrito = $_POST['listadistrito'];
        $listafabrica = $_POST['listafabrica'];
        $baseoracle = $_POST['baseoracle'];
        $habilita = $_POST['habilita'];
        $usuario = $_POST['usuario'];
        $usuarioinicio = $_POST['usuarioinicio'];
        $senha = $_POST['senha'];
        $senhanova = $_POST['senhanova'];
        $contador66 = $_POST['contador66'];
        $listaordem = $_POST['listaordem'];
        $contadorordem = $_POST['contadorordem'];
        $peca = $_POST['peca'];
        $quantidadepeca = $_POST['quantidadepeca'];
        $ordematual = $_POST['ordematual'];
        $atual = $_POST['atual'];
        $datapesquisa1 = $_POST['datapesquisa1'];
        $fabricapequisa = $_POST['fabricapequisa'];
        $ordembaixa = $_POST['ordembaixa'];
        $databaixa = $_POST['databaixa'];
        $grupoordens = $_POST['grupoordens'];
        $tipo = $_POST['tipo'];
        $codigomaquina = $_POST['codigomaquina'];
        $fabricaescolha = $_POST['fabricaescolha'];
        $numeroordempesquisa = $_POST['numeroordempesquisa'];
        $modalidade = $_POST['modalidade'];
        $acaogravar = $_POST['acaogravar'];
        $listaordemselecionada = $_POST['listaordemselecionada'];
        $cadastro = $_POST['cadastro'];
        $hora = $_POST['hora'];
        $hora2 = $_POST['hora2'];
        $componente = $_POST['componente'];
        $recomendacao = $_POST['recomendacao'];
        $atividadegrava = $_POST['atividadegrava'];
        $contadoreliminar = $_POST['contadoreliminar'];
        $edicao = $_POST['edicao'];
        $atividadepequisa = $_POST['atividadepequisa'];
        $solicitantepesquisainicial = $_POST['solicitantepesquisainicial'];
        $requisicao = $_POST['requisicao'];
        $datasolicitacao = $_POST['datasolicitacao'];
        $solicitante = $_POST['solicitante'];
        $item = $_POST['item'];
        $acao = $_POST['acao'];
        $cordiv = $_POST['cordiv'];
        $krodado = $_POST['krodado'];
        $horimetro = $_POST['horimetro'];
        $veiculo = $_POST['veiculo'];
        $combustivel = $_POST['combustivel'];
        $quantidade = $_POST['quantidade'];
        $destinoestoque = $_POST['destinoestoque'];
        $data1 = $_POST['data1'];
        $data2 = $_POST['data2'];
        $novo = $_POST['novo'];
        $month = $_POST['month'];
        $contador = $_POST['contador'];
        $cadastropesquisa = $_POST['cadastropesquisa'];
        $combustivelpesquisa = $_POST['combustivelpesquisa'];
        $veiculocodigoe = $_POST['veiculocodigoe'];
        $year = $_POST['year'];

        $datapesquisainicial = $_POST['datapesquisainicial'];
        $datapesquisafinal = $_POST['datapesquisafinal'];

        $fabricapesquisa = $_POST['fabricapesquisa'];
        $vindogeracao = $_POST['vindogeracao'];


    }


    if (!IsSet($month)) {
        $month = date('m');
    }
    if (!IsSet($mes)) {
        $mes = date('m');
    }

    if (!IsSet($turno)) {
        $turno = "1";
    }
    if (!IsSet($diasemana)) {
        $diasemana = date('d');
    }
    if (!IsSet($contador)) {
        $contador = "1";
    }
    if (!IsSet($mudoumes)) {
        $mudoumes = "nao";
    }
    if (!IsSet($escolha) or ($escolha == "1"))
    {
    ?>


<?
if (empty($fabricapesquisa) or empty($datapesquisainicial) or empty($datapesquisafinal) or empty($vindogeracao)) {
    ?>

    <br/>
    <div class="titulogeral"> <? echo $titulo; ?> </div>


    <table border=0 width="80%" align="center" style="font-size:12px;">
        <tr>
            <td>
                <? $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Unidade'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro = $achaparametros662->fields["0"];
                echo "<b>UNIDADE:</b>$parametro";

                $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Dta Inicial'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro2 = $achaparametros662->fields["0"];
                $anodata1 = substr($parametro2, 0, 4);
                $mesdata1 = substr($parametro2, 5, 2);
                $diadata1 = substr($parametro2, 8, 2);
                $mostradata1 = $diadata1 . "/" . $mesdata1 . "/" . $anodata1;
                echo "<b> DATA GERAÇÃO:</b> $mostradata1";

                $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Dta Final'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro3 = $achaparametros662->fields["0"];
                $anodata1 = substr($parametro3, 0, 4);
                $mesdata1 = substr($parametro3, 5, 2);
                $diadata1 = substr($parametro3, 8, 2);
                $mostradata2 = $diadata1 . "/" . $mesdata1 . "/" . $anodata1;
                echo " Até $mostradata2";


                ?>
            </td>
            <td>
                <? $achaparametros = "select distinct ds_usuario,to_char(dt_geracao,'dd/mm/yyyy') from parametro_grafico where ds_programa='$programa'";
                $achaparametros2 = $conn->Execute($achaparametros);
                $usuariogerou = $achaparametros2->fields["0"];
                $datagerou = $achaparametros2->fields["1"];
                echo "<b>USUÁRIO GERAÇÃO:</b>$usuariogerou --> $datagerou";
                ?>


            </td>
        </tr>
    </table>

    <?
    $quantoss17mat = "select TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')
                         VALOR,TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999') VALOR2,
                         TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') VALOR3
                         from AUX_CONSULTA_CUSTO_ATIV ";
    $quantoss17mat2 = $conn->Execute($quantoss17mat);
    $custototal7 = $quantoss17mat2->fields["VALOR"];
    $custototal7MAT = $quantoss17mat2->fields["VALOR2"];
    $custototal7PECA = $quantoss17mat2->fields["VALOR3"];


} else {


    $usu18uss = "delete from AUX_CONSULTA_CUSTO_ATIV";
    $resultuss = $conn->Execute($usu18uss);

    $usu18uss = "delete from parametro_grafico where ds_programa='$programa'";
    $resultuss = $conn->Execute($usu18uss);


    //grava a auxiliar

    $sm = "select a.cd_componente CODIGOEQUIPAMENTO,
  d.cd_maquina MAQUINA,c.cd_atividade ATIVIDADE
  from
  rot_compo_mt a,ORDEM_COMP c,componente_auxiliar d
  where
  c.STATUS='G' AND
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  a.cd_componente=d.cd_compo and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  union
  select a.cd_componente CODIGOEQUIPAMENTO,
  d.cd_maquina MAQUINA,c.cd_atividade ATIVIDADE
  from
  rot_compo_pc a,ORDEM_COMP c,componente_auxiliar d
  where
  c.STATUS='G' AND
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  a.cd_componente=d.cd_compo and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente,d.cd_maquina,c.cd_atividade
  ";


    $sm2 = $conn->Execute($sm);
    while (!$sm2->EOF) {
        $codigoequipamento = $sm2->fields["CODIGOEQUIPAMENTO"];
        $codigomaquina = $sm2->fields["MAQUINA"];
        $codigoatividade = $sm2->fields["ATIVIDADE"];

        $usu18ussG = "insert into AUX_CONSULTA_CUSTO_ATIV(CD_COMPONENTE,VL_CUSTO_MATERIAL,
          VL_CUSTO_PECAS,VL_CUSTO_TOTAL,VL_PARTICIPACAO,cd_maquina,cd_atividade) VALUES(
                           '$codigoequipamento','0','0','0','0','$codigomaquina','$codigoatividade')";

        $resultussG = $conn->Execute($usu18ussG);


        $sm2->MoveNext();
    }


    //grava a auxiliar

    $sm55 = "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO,
  d.cd_maquina MAQUINA,c.cd_atividade ATIVIDADE
  from
  rot_compo_mt a,mat_pecas b,ORDEM_COMP c,componente_auxiliar d
  where a.cd_material=b.cd_material AND
  b.flag='M' and
  c.STATUS='G' AND
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  a.cd_componente=d.cd_compo and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente,d.cd_maquina,c.cd_atividade ORDER BY VALOR DESC
  ";

    $sm2556 = $conn->Execute($sm55);
    while (!$sm2556->EOF) {
        $valorcusto = $sm2556->fields["VALOR"];
        $codigoequipamento = $sm2556->fields["CODIGOEQUIPAMENTO"];
        $codigomaquina = $sm2556->fields["MAQUINA"];
        $codigoatividade = $sm2556->fields["ATIVIDADE"];


        $valorcusto = str_replace(",", ".", "$valorcusto");

        $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ATIV SET VL_CUSTO_MATERIAL=$valorcusto
           WHERE
           CD_COMPONENTE='$codigoequipamento' AND CD_ATIVIDADE='$codigoatividade'";
        $resultussG = $conn->Execute($usu18ussG);


        $sm2556->MoveNext();
    }


    $sm557 = "select sum(a.quant*b.valor) VALOR,a.cd_componente CODIGOEQUIPAMENTO,
  c.cd_atividade ATIVIDADE
  from
  rot_compo_pc a,mat_pecas b,ORDEM_COMP c
  where a.cod_peca=b.cd_material AND
  b.flag='P' and
  a.cd_componente=c.cd_componente and
  a.cd_atividade=c.cd_atividade and
  c.STATUS='G' and
  c.cd_fabrica='$fabricapesquisa' and
  c.data_plane >='$datapesquisainicial' and
  c.data_plane <='$datapesquisafinal'
  group by  a.cd_componente,c.cd_atividade ORDER BY VALOR DESC
  ";

    $sm25567 = $conn->Execute($sm557);
    while (!$sm25567->EOF) {
        $valorcustopeca = $sm25567->fields["VALOR"];
        $codigoequipamento = $sm25567->fields["CODIGOEQUIPAMENTO"];
        $codigoatividade = $sm25567->fields["ATIVIDADE"];
        $valorcustopeca = str_replace(",", ".", "$valorcustopeca");

        $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ATIV SET VL_CUSTO_PECAS=$valorcustopeca
           WHERE
          CD_COMPONENTE='$codigoequipamento' AND CD_ATIVIDADE='$codigoatividade'";
        $resultussG = $conn->Execute($usu18ussG);

        $sm25567->MoveNext();
    }


    $achazero1 = "select CD_COMPONENTE,CD_ATIVIDADE,VL_CUSTO_MATERIAL,VL_CUSTO_PECAS from
  AUX_CONSULTA_CUSTO_ATIV  ";
    $achazero12 = $conn->Execute($achazero1);
    while (!$achazero12->EOF) {

        $componente4 = $achazero12->fields["CD_COMPONENTE"];
        $atividade4 = $achazero12->fields["CD_ATIVIDADE"];
        $custo14 = $achazero12->fields["VL_CUSTO_MATERIAL"];
        $custo15 = $achazero12->fields["VL_CUSTO_PECAS"];
        $custo14 = str_replace(",", ".", "$custo14");
        $custo15 = str_replace(",", ".", "$custo15");

        $custototal16 = $custo14 + $custo15;

        $usu18ussG = "UPDATE AUX_CONSULTA_CUSTO_ATIV SET VL_CUSTO_TOTAL=$custototal16 WHERE
          CD_COMPONENTE='$componente4' AND CD_ATIVIDADE='$atividade4'";
        $resultussG = $conn->Execute($usu18ussG);

        $achazero12->MoveNext();
    }

    $quantoss17mat = "select TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')
                         VALOR,TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999') VALOR2,
                         TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') VALOR3
                         from AUX_CONSULTA_CUSTO_ATIV ";
    $quantoss17mat2 = $conn->Execute($quantoss17mat);
    $custototal7 = $quantoss17mat2->fields["VALOR"];
    $custototal7MAT = $quantoss17mat2->fields["VALOR2"];
    $custototal7PECA = $quantoss17mat2->fields["VALOR3"];


    $achazero166 = "select CD_COMPONENTE,CD_ATIVIDADE,VL_CUSTO_TOTAL from AUX_CONSULTA_CUSTO_ATIV";
    $achazero1266 = $conn->Execute($achazero166);
    while (!$achazero1266->EOF) {

        $valorcusto44 = $achazero1266->fields["VL_CUSTO_TOTAL"];
        $codigoequipamento = $achazero1266->fields["CD_COMPONENTE"];
        $codigoatividade7 = $achazero1266->fields["CD_ATIVIDADE"];


        if ($custototal7 > "0") {
            $participacao = ($valorcusto44 / $custototal7) * 100;
        } else {
            $participacao = "0";
        }

        $quantoss17maty = "UPDATE AUX_CONSULTA_CUSTO_ATIV
                           SET VL_PARTICIPACAO=$participacao
                           WHERE  CD_COMPONENTE='$codigoequipamento' AND CD_ATIVIDADE='$codigoatividade7'";
        $quantoss17mat2y = $conn->Execute($quantoss17maty);

        $achazero1266->MoveNext();
    }

    //grava parametros
    $diahoje = date('d');
    $meshoje = date('m');
    $anohoje = date('Y');

    $datapesquisahoje = $diahoje . "/" . $meshoje . "/" . $anohoje;


    if (empty($fabricapesquisa)) {
        $gravaparametrounidade = "0";
    } else {
        $gravaparametrounidade = $fabricapesquisa;
    }
    $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
    $usu18ussMAXPED23opd = $conn->Execute($usu18ussMAXPED3opd);
    $sequenciaparametro = $usu18ussMAXPED23opd->fields["0"];
    if ($sequenciaparametro > "0") {
        $sequenciaparametrograva = $sequenciaparametro + 1;
    } else {
        $sequenciaparametrograva = "1";
    }
    $usu18ussG7dgpa = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Unidade','$gravaparametrounidade','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
    $resultussG7 = $conn->Execute($usu18ussG7dgpa);


    if (empty($datapesquisainicial)) {
        $gravaparametrodata1 = "0";
    } else {
        $gravaparametrodata1 = $datapesquisainicial;
    }
    if ($sequenciaparametro > "0") {
        $sequenciaparametrograva = $sequenciaparametro + 1;
    } else {
        $sequenciaparametrograva = "1";
    }
    $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
    $usu18ussMAXPED23opd = $conn->Execute($usu18ussMAXPED3opd);
    $sequenciaparametro = $usu18ussMAXPED23opd->fields["0"];
    $usu18ussG7dgpa6 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Dta Inicial','$gravaparametrodata1','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
    $resultussG7 = $conn->Execute($usu18ussG7dgpa6);

    if (empty($datapesquisafinal)) {
        $gravaparametrodata2 = "0";
    } else {
        $gravaparametrodata2 = $datapesquisafinal;
    }
    $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
    $usu18ussMAXPED23opd = $conn->Execute($usu18ussMAXPED3opd);
    $sequenciaparametro = $usu18ussMAXPED23opd->fields["0"];
    if ($sequenciaparametro > "0") {
        $sequenciaparametrograva = $sequenciaparametro + 1;
    } else {
        $sequenciaparametrograva = "1";
    }
    $usu18ussG7dgpa7 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Dta Final','$gravaparametrodata2','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
    $resultussG7 = $conn->Execute($usu18ussG7dgpa7);


    ?>

    <div class="titulogeral"> <? echo $titulo; ?> </div>


    <table border=0
           style='background:white;' width="80%" align="center">
        <tr>
            <td>
                <? $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Unidade'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro = $achaparametros662->fields["0"];
                echo "Unidade:$parametro";

                $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Dta Inicial'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro2 = $achaparametros662->fields["0"];
                echo " Data Geração:$parametro2";

                $achaparametros66 = "select vl_parametro  from parametro_grafico where ds_programa='$programa'  and ds_parametro='Dta Final'";
                $achaparametros662 = $conn->Execute($achaparametros66);
                $parametro3 = $achaparametros662->fields["0"];
                echo " Até $parametro3";

                ?>
            </td>
            <td>
                <? $achaparametros = "select distinct ds_usuario,dt_geracao from parametro_grafico where ds_programa='$programa'";
                $achaparametros2 = $conn->Execute($achaparametros);
                $usuariogerou = $achaparametros2->fields["0"];
                $datagerou = $achaparametros2->fields["1"];
                echo "Usuário Geração:$usuariogerou/$datagerou";
                ?>


            </td>
        </tr>
    </table>
    <?

}//final quando gera o custo

?>
    <div class="divTabela1">
        <table class="tabela1">
            <tr>

                <th>Equipamento</th>
                <th>Atividade</th>

                <th>Custo Materiais (R$)</th>
                <th>Custo Peças (R$)</th>
                <th>Custo Total(R$)</th>
                <th>Participação(%)</th>

            </tr>
            <?


            $achazero166final = "SELECT * from (select CD_MAQUINA,CD_ATIVIDADE, TO_CHAR(SUM(VL_CUSTO_MATERIAL),'999990.999')
  CUSTO,TO_CHAR(SUM(VL_CUSTO_PECAS),'999990.999') CUSTO2,TO_CHAR(SUM(VL_CUSTO_TOTAL),'999990.999')  CUSTO3,
  TO_CHAR(SUM(VL_PARTICIPACAO),'999990.999')  PART,rownum Id from AUX_CONSULTA_CUSTO_ATIV GROUP BY CD_MAQUINA,CD_ATIVIDADE,rownum
  order by PART desc)";

            //DEFINA PAGINACAO

            $chacontadorgeralpagina = "SELECT count(*) CONTADOR  FROM AUX_CONSULTA_CUSTO_ATIV
					    ";

            $registros = 12;
            require("paginacao_mi.php");
            //FINAL PAGINACAO

            if ($pagina_atual > "1") {
                $registros = $registros * $pagina_atual;
            }


            $tabela = $achazero166final;
            $sql = $tabela;

            $achazero1266final = $conn->Execute($sql);
            $classe = "1";
            $i = 0;

            while (!$achazero1266final->EOF)
            {
            // Controle de paginacao
            if (!($i >= $inicio && $i < $registros)) {
                $i++;
                $achazero1266final->MoveNext();
                continue;
            }

            $i++;

            $equipamento9 = $achazero1266final->fields["CD_MAQUINA"];
            $atividade9 = $achazero1266final->fields["CD_ATIVIDADE"];
            $valorcustomat = $achazero1266final->fields["CUSTO"];
            $valorcustopeca = $achazero1266final->fields["CUSTO2"];
            $valorcustototal = $achazero1266final->fields["CUSTO3"];
            $valorpart = $achazero1266final->fields["PART"];
            $classe = ($classe == "1") ? "2" : "1";

            ?>
            <tr class="tabelaLinha<? echo $classe ?>">

                <td><? echo $equipamento9; ?></td>
                <td><? echo $atividade9; ?></td>
                <td style="text-align:right;"><?
                    $valorcustomatmostra = number_format($valorcustomat, 2, ',', '.');

                    echo $valorcustomatmostra; ?></td>
                <td style="text-align:right;"><?
                    $valorcustopecamostra = number_format($valorcustopeca, 2, ',', '.');

                    echo $valorcustopecamostra; ?></td>
                <td style="text-align:right;"><?
                    $valorcustototalmostra = number_format($valorcustototal, 2, ',', '.');

                    echo $valorcustototalmostra; ?></td>
                <td style="text-align:right;"><?
                    $valorpart = number_format($valorpart, 2, ',', '.');
                    echo $valorpart; ?></td>


                <?
                $achazero1266final->MoveNext();
                }
                ?>


            </tr>
            <tr>

                <td>Total</td>
                <td></td>

                <td style='font-size: 14px;text-align:right;'><?


                    $custototal7M5 = number_format($custototal7MAT, 2, ',', '.');
                    echo $custototal7M5; ?>
                </td>

                <td style='font-size: 14px;text-align:right;'>
                    <?
                    $custototal7P5 = number_format($custototal7PECA, 2, ',', '.');
                    echo $custototal7P5; ?>
                </td>


                <td style='font-size: 14px;text-align:right;'>
                    <?
                    $custototal7 = number_format($custototal7, 2, ',', '.');
                    echo $custototal7; ?>
                </td>
                <td></td>
            </tr>

        </table>

        <?

        require("rodapepagina.php");

        }//final quando contador=1 ou 2
        ?> </div> <?

    if ($escolha == "pesquisa") {
        ?>

        <div id="telapesquisa" class="mostraCaixa">
            <br/><br/>
            <table class="letraCaixa">

                <tr>
                    <td>
                        Unidade
                    </td>
                    <td>

                        <?

                        $datapegou1pe = "SELECT DS_FABRICA FROM   FABRICAS  WHERE CD_FABRICA='$fabricapesquisa'";
                        $datapegou2pe = $conn->Execute($datapegou1pe);
                        $fabricapesquisades = $datapegou2pe->fields["0"];


                        ?>

                        <select name="fabricapesquisa">
                            <option value="<? echo $fabricapesquisa; ?>">
                                Unidade:<? echo $fabricapesquisa; ?>
                                -<? echo $fabricapesquisades; ?></option>
                            <?
                            $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                            $result3 = $conn->Execute($stmt1);
                            while (!$result3->EOF) {
                                print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                                $result3->MoveNext();
                            }

                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        Intervalo
                    </td>
                    <td>
                        <input type="date" name="datapesquisainicial">
                        <input type="date" name="datapesquisafinal">
                    </td>
                </tr>


            </table>

            <br/>

            <div id="divBotoes">
                <input id="btn_voltar" type="button" VALUE="VOLTAR" class="botaoVermelho"
                       onclick="window.location='<? echo $programa; ?>'">
                <input id="btn_concluir" type="submit" VALUE="CONCLUIR" class="botaoVermelho"
                       onclick="document.forms[0].submit();return false;">
            </div>


            <input type="hidden" name="semanapegoumostrar" value="<? echo $semanapegoumostrar; ?>">
            <input type="hidden" name="escolha" size="5" value="1">
            <input type="hidden" name="continuarmesmatela" value="sim">
            <input type="hidden" name="contadorfabrica" value="<? echo $contadorfabrica; ?>">
            <input type="hidden" name="contador66" value="1">
            <input type="hidden" name="year" value="<? echo $year; ?>">
            <input type="hidden" name="month" value="<? echo $month; ?>">
            <input type="hidden" name="data1" value="<? echo $data1; ?>">
            <input type="hidden" name="data2" value="<? echo $data2; ?>">
            <input type="hidden" name="vindogeracao" value="sim">


        </div>


    <? }//FIAL DA PESQUISA?>

</form>
</body>
</html>



