<head>
   <!--  <link rel="stylesheet" type="text/css" href="estilo.css"/> -->
    <style>

        body, table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #000000;
        }

        .menu {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 15px;
            font-weight: normal;
            color: blue;
            background-color: white;
            border-right: 1px solid #000000;
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            padding: 5px;
            cursor: hand;

        }

        .menu-sel {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 17px;
            font-weight: bold;
            color: blue;
            background-color: #CCCCCC;
            border-right: 1px solid #000000;
            border-top: 1px solid #000000;
            padding: 10px;
            cursor: hand;
        }

        .tb-conteudo {
            border-right: 1px solid #000000;
            border-bottom: 1px solid #000000;
        }

        .conteudo {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 17px;
            font-weight: normal;
            color: #000033;
            background-color: #CCCCCC;
            padding: 5px;
            width: 99%;
            height: 760px;
        }


    </style>

    <style>


    </style>

    <script language="JavaScript">

        function stAba(menu, conteudo) {
            this.menu = menu;
            this.conteudo = conteudo;
        }

        var arAbas = [];
        arAbas[0] = new stAba('td_cadastro', 'div_cadastro');
        arAbas[1] = new stAba('td_consulta1', 'div_consulta1');
        arAbas[2] = new stAba('td_consulta2', 'div_consulta2');
        arAbas[3] = new stAba('td_consulta3', 'div_consulta3');
        arAbas[4] = new stAba('td_consulta4', 'div_consulta4');
        arAbas[5] = new stAba('td_consulta5', 'div_consulta5');


        function AlternarAbas(menu, conteudo) {
            for (var i = 0; i < arAbas.length; i++) {
                m = document.getElementById(arAbas[i].menu);
                m.className = 'menu';
                c = document.getElementById(arAbas[i].conteudo);
                c.style.display = 'none';
            }
            m = document.getElementById(menu);
            m.className = 'menu-sel';
            c = document.getElementById(conteudo);
            c.style.display = '';
        }

    </script>

    <Script Language="JavaScript">

        function mascaraData(campoData) {
            var data = campoData.value;
            if (data.length == 2) {
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
            if (data.length == 5) {
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
        }


        function mascaraData2(campoData) {
            var data = campoData.value;
            if (data.length == 2) {
                data = data + '/';
                document.forms[0].datamaterial.value = data;
                return true;
            }
            if (data.length == 5) {
                data = data + '/';
                document.forms[0].datamaterial.value = data;
                return true;
            }
        }


        function Mascara_Hora2(Hora2) {
            var hora01 = '';
            hora01 = hora01 + Hora2;
            if (hora01.length == 2) {
                hora01 = hora01 + ':';
                document.forms[0].Hora2.value = hora01;
            }
            if (hora01.length == 5) {
                Verifica_Hora2();
            }
        }

        function Mascara_Hora(Hora) {
            var hora01 = '';
            hora01 = hora01 + Hora;
            if (hora01.length == 2) {
                hora01 = hora01 + ':';
                document.forms[0].Hora.value = hora01;
            }
            if (hora01.length == 5) {
                Verifica_Hora();
            }
        }

        function Verifica_Hora() {
            hrs = (document.forms[0].Hora.value.substring(0, 2));
            min = (document.forms[0].Hora.value.substring(3, 5));
            estado = "";
            if ((hrs < 0 ) || (hrs > 23) || ( min < 0) || ( min > 59)) {
                estado = "errada";
            }

            if (document.forms[0].Hora.value == "") {
                estado = "errada";
            }

            if (estado == "errada") {
                alert("Hora inválida!");
                document.forms[0].Hora.focus();
            }
        }


        function Verifica_Hora2() {
            hrs = (document.forms[0].Hora2.value.substring(0, 2));
            min = (document.forms[0].Hora2.value.substring(3, 5));
            hrsinicio = (document.forms[0].Hora.value.substring(0, 2));

            estado = "";
            if ((hrs < 0 ) || (hrs > 23) || ( min < 0) || ( min > 59)) {
                estado = "errada";
            }

            if (document.forms[0].Hora2.value == "") {
                estado = "errada";
            }

            if (hrsinicio >= hrs) {
                estado = "errada";
            }

            if (estado == "errada") {
                document.getElementById('Gravacaofuncionario').disabled = true;
                alert("Hora inválida!");
                document.forms[0].Hora2.focus();

            }
            else {
                document.getElementById('Gravacaofuncionario').disabled = false;
                document.getElementById('fecharordem').disabled = false;
            }


        }


    </script>


</head>

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
//----------------------------------------------------------------


$navegando = $_GET['navegando'];
$continuarmesmatela = $_POST['continuarmesmatela'];


if ($navegando == "sim") {
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
    $grupoordens = $_GET['grupoordens'];
    $numeroordempesquisa = $_GET['numeroordempesquisa'];


}
if ($continuarmesmatela == "sim") {
    $codigousuario = $_POST['codigousuario'];
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
    $fabricapesquisa = $_POST['fabricapesquisa'];
    $ativopesquisa = $_POST['ativopesquisa'];
    $seriepesquisa = $_POST['seriepesquisa'];
    $patrimoniopesquisa = $_POST['patrimoniopesquisa'];
    $localizacaopesquisa = $_POST['localizacaopesquisa'];
    $familiapesquisa = $_POST['familiapesquisa'];
    $fabricapesquisa = $_POST['fabricapesquisa'];
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
    $quantidade = $_POST['quantidade'];
    $numeroordempesquisa = $_POST['numeroordempesquisa'];
    $recomendacao1 = $_POST['recomendacao1'];
    $recomendacao88 = $_POST['recomendacao88'];
    $data = $_POST['data'];
    $datamaterial = $_POST['datamaterial'];
    $materialpesquisa = $_POST['materialpesquisa'];
    $quantidade2 = $_POST['quantidade2'];
    $defeitomat = $_POST['defeitomat'];
    $motivomat = $_POST['motivomat'];
    $localizacao = $_POST['localizacao'];


}

//gravacao dos registros de mao de obra e materiais
require("gravafuncionario_ordem.php");

//concluir a ordem atual

IF ($acaogravar == "finalizarordem"){

$datapegou12d30 = "SELECT  to_char(DATA_PLANE,'dd/mm/YYYY') DATA,CD_ATIVIDADE
                                FROM   ORDEM_COMP where   NUMERO_ORDEM='$numeroordempesquisa'";
$datapegou22d30 = $conn->Execute($datapegou12d30);
while (!$datapegou22d30->EOF) {
    $tipogravacao = "Planejada";

    $datapegou22d30->MoveNext();
}
$datapegou12d31 = "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA ,CD_ATIVIDADE
                                FROM   EMER_COMP where  NUMERO='$numeroordempesquisa'";
$datapegou22d31 = $conn->Execute($datapegou12d31);
while (!$datapegou22d31->EOF) {
    $tipogravacao = "Não Planejada";

    $datapegou22d31->MoveNext();
}

$datapegou12d32 = "SELECT count(*) CONTADOR FROM  EMER_COMP WHERE
                                NUMERO='$numeroordempesquisa' and recomendacao is null  ";
$datapegou22d32 = $conn->Execute($datapegou12d32);
while (!$datapegou22d32->EOF) {
    $quantosrecomc = $datapegou22d32->fields["0"];

    $datapegou22d32->MoveNext();
}
$datapegou12d33 = "SELECT count(*) CONTADOR FROM  ORDEM_COMP WHERE
                                NUMERO_ORDEM='$numeroordempesquisa'  and recomendacao is null ";
$datapegou22d33 = $conn->Execute($datapegou12d33);
while (!$datapegou22d33->EOF) {
    $quantosrecomp = $datapegou22d33->fields["0"];

    $datapegou22d33->MoveNext();
}
$datapegou12d34 = "SELECT count(*) CONTADOR FROM  COMP_FUNC WHERE
                                NUMERO_ORDEM='$numeroordempesquisa'  ";
$datapegou22d34 = $conn->Execute($datapegou12d34);
while (!$datapegou22d34->EOF) {
    $quantos666p = $datapegou22d34->fields["0"];

    $datapegou22d34->MoveNext();
}
$datapegou12d35 = "SELECT count(*) CONTADOR FROM  COMP_FUNC_EMER WHERE
                                NUMERO='$numeroordempesquisa' ";
$datapegou22d35 = $conn->Execute($datapegou12d35);
while (!$datapegou22d35->EOF) {
    $quantos666c = $datapegou22d35->fields["0"];

    $datapegou22d35->MoveNext();
}

$datapegou12d36 = "SELECT MAX(DATA_BAIXA_INDIVIDUAL) DATA
                                FROM  COMP_FUNC_EMER WHERE
                                NUMERO='$numeroordempesquisa'  ";
$datapegou22d36 = $conn->Execute($datapegou12d36);
while (!$datapegou22d36->EOF) {
    $datamaximabaixa = $datapegou22d36->fields["0"];

    $datapegou22d36->MoveNext();
}

$datapegou12d37 = "select count(*) CONTADOR
                                  FROM  SERV_TERC_ITENS a,SERV_TERC_PEDIDO b
                                  where
                                  a.nr_pedido=b.nr_pedido and
                                  b.ID_STATUS not  in ('FINA')  AND
                                  b.NR_ORDEM_SERVICO='$numeroordempesquisa'";
$datapegou22d37 = $conn->Execute($datapegou12d37);
while (!$datapegou22d37->EOF) {
    $ultimo780 = $datapegou22d37->fields["0"];

    $datapegou22d37->MoveNext();
}


if ($tipogravacao == "Não Planejada")
{


IF ($ultimo780 == "0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS


if ($quantos666c == "0")
{
    echo "Ordem sem Funcionários";
    $medeacao = "mesmaordem";
}
else
{
if ($quantosrecomc == "0"){

$sgrava1 = "update EMER_COMP SET STATUS='B',
                                       DATA_FIM='$datamaximabaixa'
                                       WHERE NUMERO='$numeroordempesquisa'";
$sgrava12 = $conn->Execute($sgrava1);

?>
<div style="text-align: center;"><? echo "Concluida Ordem Final:$numeroordempesquisa";
    $medeacao = "novaordem";
    $acha1div = "td_cadastro";
    $acha2div = "div_cadastro";


    }
    else {
        echo "Ordem sem Recomendação Não é possível Concluir";
        $medeacao = "mesmaordem";
    }

    }


    }
    else {
        echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
        $medeacao = "mesmaordem";
    }

    }
    else
    {


    IF ($ultimo780 == "0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS

    if ($quantos666p == "0")
    {
        echo "Ordem sem Funcionários";
        $medeacao = "mesmaordem";
    }
    else
    {

    $datapegou12d38 = "SELECT MAX(DATA_BAIXA_INDIVIDUAL) DATA
                                        FROM  COMP_FUNC WHERE
                                        NUMERO_ORDEM='$numeroordempesquisa' ";
    $datapegou22d38 = $conn->Execute($datapegou12d38);
    while (!$datapegou22d38->EOF) {
        $datamaximabaixa = $datapegou22d38->fields["0"];
        $datapegou22d38->MoveNext();
    }
    $datapegou12d39 = "SELECT MIN(DATA_BAIXA_INDIVIDUAL) DATA
                                        FROM  COMP_FUNC WHERE
                                        NUMERO_ORDEM='$numeroordempesquisa' ";
    $datapegou22d39 = $conn->Execute($datapegou12d39);
    while (!$datapegou22d39->EOF) {
        $dataminimabaixa = $datapegou22d39->fields["0"];
        $datapegou22d39->MoveNext();
    }


    if ($quantosrecomp == "0"){

    $sgrava1 = "update ORDEM_COMP SET DATA_TERMINO='$datamaximabaixa',DATA_INICIO='$dataminimabaixa'
                                       WHERE NUMERO_ORDEM='$numeroordempesquisa'";
    $sgrava12 = $conn->Execute($sgrava1);

    $sgrava1 = "update ORDEM_COMP SET STATUS='B'
                                       WHERE NUMERO_ORDEM='$numeroordempesquisa'";
    $sgrava12 = $conn->Execute($sgrava1);

    ?>
    <div style="text-align: center;"><? echo "Concluida Ordem:$numeroordempesquisa";
        require("consultaordensv6.php");
        }
        else {
            echo "Ordem sem Recomendação Não é possível Concluir";
            $medeacao = "mesmaordem";
        }

        }


        }
        else {
            echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
            $medeacao = "mesmaordem";
        }


        }


        }//final quando so conckuir ordem


        ?>


        <form action="baixamanutencao_versao5.php" name=Form1 method="POST" onLoad="AlternarAbas('<? echo $acha1div; ?>','<? echo $acha2div; ?>')"onLoad="AlternarAbas('<? echo $acha1div; ?>','<? echo $acha2div; ?>')">

            <div style="text-align: center;"><font style='font-size: 32px;color: black;text-align:left;bold: Negrito'>Baixa de Ordens</font>
                <font
                    style='font-size: 15px;color: red;text-align:left;bold: Negrito'><? echo " Ordem Selecionada:$numeroordempesquisa<br/>"; ?>
                    <a href="baixamanutencao_versao5.php?escolha=Baixar final&tela=0&mes=<? echo $mes; ?>&ano=<? echo $ano; ?>&turnopesquisa=<? echo $turnopesquisa; ?>&curva=<? echo $curva; ?>&ano=<? echo $ano; ?>&componente=<? echo $componente; ?>&codigousuario=<? echo $codigousuario; ?>&codigoempresa=<? echo $codigoempresa; ?>&navegando=sim&banco=<? echo $banco; ?>&ambiente=<? ECHO $ambiente; ?>&baseoracle=<? ECHO $baseoracle; ?>&localbanco=<? ECHO $localbanco; ?>&atividadegrava=<? ECHO $atividadegrava; ?>&acaogravar=pediconfirmaordem&numeroordempesquisa=<? echo $numeroordempesquisa; ?>">Concluir
                        Ordem</a>

                    <a href="consultaordensv6.php?escolha=1&navegando=sim&numeroordempesquisa=<? ECHO $numeroordempesquisa; ?>&grupoordens=T">Retornar</a></font>

                <br/><br/>

                <table width="80%" height="80%" cellspacing="0" cellpadding="0"
                       border="0" style="border-left: 1px solid #000000;">
                    <tr>
                        <td height="5" class="menu" id="td_cadastro"
                            onClick="AlternarAbas('td_cadastro','div_cadastro')">
                            Mão de Obra
                        </td>
                        <td height="5" class="menu" id="td_consulta1"
                            onClick="AlternarAbas('td_consulta1','div_consulta1')">
                            Material
                        </td>
                        <td height="5" class="menu" id="td_consulta2"
                            onClick="AlternarAbas('td_consulta2','div_consulta2')">
                            Serviço Terceiro
                        </td>
                        <td height="5" class="menu" id="td_consulta3"
                            onClick="AlternarAbas('td_consulta3','div_consulta3')">
                            Check List
                        </td>
                        <td height="5" class="menu" id="td_consulta4"
                            onClick="AlternarAbas('td_consulta4','div_consulta4')">
                            Defeito
                        </td>
                        <td height="5" class="menu" id="td_consulta5"
                            onClick="AlternarAbas('td_consulta5','div_consulta5')">
                            Máquina Parada
                        </td>


                    </tr>

                    <tr>
                        <td height="20" class="tb-conteudo" colspan="6">
                            <div id="div_cadastro" class="conteudo" style="display: none">
                                <?


                                $datapegou12d45 = "SELECT * from (select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,
              a.NUMERO NUMERO,a.HORA HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,
			  c.DS_MODALIDADE MODALIDADE2
              from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO='$numeroordempesquisa' AND a.cadastro=b.cadastro and a.cd_modalidade=c.cd_modalidade
              UNION
              select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,
			  a.NUMERO_ORDEM NUMERO_ORDEM,a.HORAS HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,
			  c.DS_MODALIDADE MODALIDADE2 from  COMP_FUNC  a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
			  WHERE a.NUMERO_ORDEM='$numeroordempesquisa' and a.cadastro=b.cadastro and 
			  a.cd_modalidade=c.cd_modalidade)";

                                $somahora = "0";
                                ?>


                                <div style="text-align: center;">
                                    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                                           style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

                                        <tr>
                                            <th>Cadastro</th>
                                            <th>Nome</th>
                                            <th>Modalidade</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fim</th>
                                            <th>Total de Horas</th>
                                            <th>Data Execução</th>


                                        </tr>
                                        <?


                                        $datapegou22d45 = $conn->Execute($datapegou12d45);
                                        while (!$datapegou22d45->EOF) {

                                            ?>
                                            <tr>

                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("CADASTRO"); ?></td>
                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("NOME"); ?></td>
                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("MODALIDADE2"); ?></td>
                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("HR_INI"); ?></td>
                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("HR_FIM"); ?></td>
                                                <td>
                                                    <div style="text-align: center;"><?
                                                    $horatotal = $datapegou22d45->fields("HORAMOSTRA");
                                                    $horatotal = str_replace(",", ".", "$horatotal");

                                                    $horacheia = floor($horatotal);

                                                    $somahora = $somahora + $horatotal;


                                                    $minutocheio = ($horatotal - $horacheia) * 60;
                                                    $minutocheio = number_format($minutocheio, 0, ',', '.');

                                                    $mostranovotempo = $horacheia . ":" . $minutocheio;

                                                    echo $mostranovotempo; ?></td>

                                                <td>
                                                    <div style="text-align: center;"><? echo $datapegou22d45->fields("DATABAIXA"); ?></td>


                                            </tr>
                                            <?
                                            $datapegou22d45->MoveNext();
                                        }
                                        ?>
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><? $somahoracheia = floor($somahora);


                                                $minutocheiosoma = ($somahora - $somahoracheia) * 60;
                                                $minutocheiosoma = number_format($minutocheiosoma, 0, ',', '.');

                                                $mostranovovalor = $somahoracheia . ":" . $minutocheiosoma;


                                                ?>
                                                <div style="text-align: center;"><? echo $mostranovovalor; ?></td>
                                            <td></td>
                                        </tr>

                                    </table>
                                </div>
                                <hr>

                                Novo Registro<br>


                                Nr Cadastro:<input type="TXT" name="cadastro" size="7">
                                Modalidade:<select name="modalidade">
                                    <option value="<? echo $modalidade; ?>"><? echo $modalidademostra; ?></option>
                                    <?
                                    $stmt1 = "SELECT distinct CD_MODALIDADE,DS_MODALIDADE FROM MODALIDADE_HORA ";
                                    $result3 = $conn->Execute($stmt1);
                                    while (!$result3->EOF) {
                                        print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                                        $result3->MoveNext();
                                    }

                                    ?>
                                </select>


                                Hora Inicio:<input type="TXT" name="hora" id="Hora" OnKeyUp="Mascara_Hora(this.value)"
                                                   size="5" maxlength="5" value="00:00">
                                Hora Fim:<input type="txt" name="hora2" id="Hora2" OnKeyUp="Mascara_Hora2(this.value)"
                                                size="5" maxlength="5" value="00:00">

                                Data:
                                <input type="text" name="data" OnKeyUp="mascaraData(this);" maxlength="10" /
                                VALUE="<? echo $dataplanejadamostra5; ?>" >

                                <?
                                //acha utima recomendacao
                                $datapegou12d47 = "SELECT  recomendacao RECO from EMER_COMP where NUMERO='$numeroordempesquisa'
                                   union
                                   SELECT  recomendacao from ORDEM_COMP where NUMERO_ORDEM='$numeroordempesquisa'";
                                $datapegou22d47 = $conn->Execute($datapegou12d47);
                                while (!$datapegou22d47->EOF) {
                                    $recomendacao88 = $datapegou22d47->fields["0"];

                                    $datapegou22d47->MoveNext();
                                }


                                ?>
                                <br/>
                                Historico de Serviços<br/>
                                <textarea cols="76" rows="5" name="recomendacao"
                                          disabled><? echo $recomendacao88; ?></textarea><br/>

                                Nova Descrição do Serviço<br/>
                                <textarea cols="76" rows="5" name="recomendacao1"></textarea><br/>
                                <input type="hidden" name="recomendacao88" size="5" value="<? echo $recomendacao88; ?>">

                                <input type="hidden" name="mes" size="5" value="<? echo $mes; ?>">
                                <input type="hidden" name="ano" size="5" value="<? echo $ano; ?>">
                                <input type="hidden" name="continuarmesmatela" size="5" value="sim">
                                <input type="hidden" name="codigousuario" value="<? echo $codigousuario; ?>">
                                <input type="hidden" name="escolha" value="<? echo $escolha; ?>">
                                <input type="hidden" name="baseoracle" value="<? echo $baseoracle; ?>">
                                <input type="hidden" name="localbanco" value="<? echo $localbanco; ?>">
                                <input type="hidden" name="ambiente" value="<? echo $ambiente; ?>">
                                <input type="hidden" name="banco" value="<? echo $banco; ?>">
                                <input type="hidden" name="numeroordempesquisa"
                                       value="<? echo $numeroordempesquisa; ?>">

                                <input type="hidden" name="componente" value="<? echo $componente; ?>">


                                <br/>
            </div>
            <input type="submit" VALUE="Gravar">

            <input type="hidden" name="acaogravar" value="GFUNC">


            <div id="div_consulta1" class="conteudo" style="display: none">


                <div style="text-align: center;">
                    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                           style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

                        <tr>

                            <th>Codigo</th>
                            <th>Materiais</th>
                            <th>Unid</th>
                            <th>Quant</th>
                            <th>Data</th>
                            <th>Defeito</th>
                            <th>Motivo</th>

                        </tr>

                        <?
                        $datapegou12d4588 = "SELECT a.CD_MATERIAL CODIGOMAT,b.ds_material DESCRICAOMAT,b.cd_unidade UNIDADE,
         to_char(a.data_baixa_individual,'DD/MM/YYYY') DATA,a.quant  VALOR,a.numero OS,d.DS_DEFEITO DEFEITO,e.DS_MOTIVO MOTIVO
         FROM comp_mat_emer a,mat_pecas b,DEFEITOS d,MOTIVO e,DEFEITO_MATERIAL c
         where a.cd_material=b.cd_material and
         a.numero=c.numero and
         b.cd_material=c.CD_MATERIAL and
         a.data_baixa_individual=c.data_baixa_individual and
         c.cd_defeito=d.cd_defeito and
         c.cd_motivo=e.cd_motivo order by  a.CD_MATERIAL,a.data_baixa_individual desc";

                        $datapegou22d456 = $conn->Execute($datapegou12d4588);
                        while (!$datapegou22d456->EOF) {
                        ?>
                        <tr>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["0"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["1"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["2"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["4"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["3"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["6"]; ?></td>
                            <td>
                                <div style="text-align: center;"><? echo $datapegou22d456->fields["7"]; ?></td>


                            <?
                            $datapegou22d456->MoveNext();
                            }
                            ?>
                    </table>

                    <hr>
                </div>
                Novo Registro
                <table>
                    <tr>
                        <td>Material</td>
                        <td>
                            <select name="materialpesquisa">
                                <option value=""></option>
                                <?
                                $stmt1 = "SELECT CD_MATERIAL,DS_MATERIAL FROM mat_pecas ORDER BY CD_MATERIAL ASC ";
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
                        <td>Quantidade:</td>
                        <td>
                            <input type="TXT" SIZE="1" name="quantidade2" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Data:</td>
                        <td>
                            <input type="text" name="datamaterial" OnKeyUp="mascaraData2(this);" maxlength="10" SIZE="8"
                            / VALUE="<? echo $dataplanejadamostra5; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Defeito:</td>
                        <td>
                            <select name="defeitomat">
                                <option value=""></option>
                                <?
                                $stmt1d = "SELECT CD_DEFEITO ,DS_DEFEITO FROM defeitos order by ds_defeito asc";
                                $result3d = $conn->Execute($stmt1d);
                                while (!$result3d->EOF) {
                                    print "<option value=\"{$result3d->fields["0"]}\">{$result3d->fields["1"]}</option>";


                                    $result3d->MoveNext();
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Motivo:</td>
                        <td>
                            <select name="motivomat">
                                <option value=""></option>
                                <?
                                $stmt1dm = "SELECT CD_MOTIVO,DS_MOTIVO FROM MOTIVO order by ds_motivo asc";
                                $result3dm = $conn->Execute($stmt1dm);
                                while (!$result3dm->EOF) {
                                    print "<option value=\"{$result3dm->fields["0"]}\">{$result3dm->fields["1"]}</option>";
                                    $result3dm->MoveNext();
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Localizacao:</td>
                        <td>
                            <input type="TXT" name="localizacao" value="" size="80">
                        </td>
                    </tr>
                </table>

                <input type="hidden" name="continuarmesmatela" size="5" value="sim">
                <input type="submit" VALUE="Gravar">


            </div>


            <div id="div_consulta2" class="conteudo" style="display: none">

                teste
            </div>


            <div id="div_consulta3" class="conteudo" style="display: none">
                teste

            </div>
            <div id="div_consulta4" class="conteudo" style="display: none">
                teste

            </div>
            <div id="div_consulta5" class="conteudo" style="display: none">
                teste

            </div>


            <?
            IF ($acaogravar == "pediconfirmaordem") {
                ?>
                <div style="display: block;" id="mostramensagem1">
                    <table width="100%" border="0" background-image="sairmensagem.png">
                        <tr>
                            <td align=right>
                                <a href="baixamanutencao_versao5.php?navegando=sim&escolha=maodeobra&banco=<? echo $banco; ?>&numeroordempesquisa=<? echo $numeroordempesquisa; ?>">
                                    <IMG src="sairmensagem.png" width="38" height="38"></a>
                            </td>
                        </tr>
                    </table>
                    <br/><br/><br/>
                    <? echo "Deseja Realmente Concluir a Ordem"; ?>
                    <br/><br/><br/><br/><br/><br/>
                    <table width="100%" border="0" background-image="sairmensagem.png">
                        <tr>
                            <td align=right>


                                <input type="hidden" name="escolha" size="5" value="Baixar final">

                                <input type="hidden" name="continuarmesmatela" value="sim">
                                <input type="hidden" name="codigousuario" value="<? echo $codigousuario; ?>">
                                <input type="hidden" name="codigoempresa" value="<? echo $codigoempresa; ?>">
                                <input type="hidden" name="continuarmesmatela" value="sim">
                                <input type="hidden" name="banco" value="<? echo $banco; ?>">
                                <input type="hidden" name="listaordemselecionada"
                                       value="<? echo $listaordemselecionada; ?>">
                                <input type="hidden" name="contadoreliminar" value="<? echo $contadoreliminar; ?>">

                                <input type="hidden" name="tipogravacao" value="<? echo $contadoreliminar; ?>">


                                <a href="baixamanutencao_versao5.php?navegando=sim&escolha=maodeobra&banco=<? echo $banco; ?>&numeroordempesquisa=<? echo $numeroordempesquisa; ?>&acaogravar=nao">
                                    <IMG src="cancelarmensagem.png" width="92" height="48"></a>

                                <a href="baixamanutencao_versao5.php?navegando=sim&banco=<? echo $banco; ?>&numeroordempesquisa=<? echo $numeroordempesquisa; ?>&acaogravar=finalizarordem">
                                    <IMG src="okmensagem.png" width="92" height="48"></a>


                            </td>

                        </tr>
                    </table>

                </div>
                <?
            }
            ?>
        </form>

