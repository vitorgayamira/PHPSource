<?
ini_set('display_errors', '0');// N�O HABILITAD 

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
$programa = "consultaequipamentov10.php";
$titulo = "Consultar Equipamentos";


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    <script language=javascript>

        var cont = 0;
        function CheckAll2() {
            for (var i = 0; i < document.formulario.elements.length; i++) {
                var x = document.formulario.elements[i];
                if (x.name == 'lista[]') {
                    x.checked = document.formulario.selall.checked;
                }
            }
            if (cont == 0) {
                var elem = document.getElementById("checar");
                elem.innerHTML = "Desmarcar todos";
                cont = 1;
            } else {
                var elem = document.getElementById("checar");
                elem.innerHTML = "Marcar todos";
                cont = 0;
            }

        }

    </script>
</head>
<body>
<form action="consultaequipamentov9.php" method="POST" name="formulario">

    <div id="cabecalho">
        <img src="logo_maximiza.png" id="logo_maximiza">
    </div>

    <? require("areasuperior2.php");
    require("carregamenumilenionovo2.php");
    ?>

    <div id="icones">
        <a href="http://186.202.46.98:8080/osi/"><IMG src="imagens/solicitacao.png" align="center"></a>

        <br/><br/>

        <div style="margin-top:-10px">
            <div class="texto_icone">
                SOLICITA&Ccedil;&Atilde;O <br/> DE SERVI&Ccedil;O
            </div>
        </div>
    </div>
    <br/>
    <?

    $navegando = $_GET['navegando'];
    $continuarmesmatela = $_POST['continuarmesmatela'];


    if ($navegando == "sim") {

        $escolha = $_GET['escolha'];
        $dispminima = $_GET['dispminima'];
        $situacaoordem = $_GET['situacaoordem'];
        $fabrica = $_GET['fabrica'];
        $codigofamilia = $_GET['codigofamilia'];
        $mostradetalhe = $_GET['mostradetalhe'];

    }

    if ($continuarmesmatela == "sim") {
        $escolha = $_POST['escolha'];
        $dispminima = $_POST['dispminima'];
        $situacaoordem = $_POST['situacaoordem'];

    }

    $achaparametro1 = "SELECT DS_URL_SOLICITACAO from parametros";
    $achaparametro12 = $conn->Execute($achaparametro1);
    $mostraicone = $achaparametro12->fields["0"];
    ?>

    <div class="titulogeral"><? echo $titulo; ?></div>
    <?


if (!IsSet($dispminima))
{

        $elimina1 = "delete from  AUX_FILTRO";
        $sachaequide47816 = $conn->Execute($elimina1);
	$sgrava1g= "insert into AUX_FILTRO(ID_SITUACAO) VALUES(
                           '')";

        $sgrava1gg = $conn->Execute($sgrava1g);

    }



if ($mostradetalhe=="sim")
{
        $achasituacao1 = "select ID_SITUACAO from  AUX_FILTRO";
        $achasituacao12 = $conn->Execute($achasituacao1);
        $achasituacaoatual = $achasituacao12->fields["0"];

        $achasemana199 = "select a.cd_maquina,a.modelo,a.ANO_FABRICACAO,a.NUMERO_SERIE,a.PATRIMONIO,a.LOCALIZACAO
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$fabrica' and
						 a.cd_famlia='$codigofamilia' AND a.STATUS_MAQUINA like '%$achasituacaoatual%'";

        ?>
        <div style="display: block;" id="teladetalhemaquina">
            <table>
                <tr>
                    <td align=right>
                        <? echo $titulojanelainsert; ?>
                        <a href="consultaequipamentov10.php?navegando=sim&escolha=1&dispminima=3">
                            <IMG src="sairmensagem.png" width="38" height="38"></a>
                    </td>
                </tr>
            </table>

            <table class="tabela1">
                <tr>
                    <td>Detalhe dos Equipamentos da Unidade:<?echo $fabrica;?>- Fam�lia:<?echo $codigofamilia;?></td>
                </tr>
            </table>

            <table border=0 style='background:white;' width="80%" align="center" class="tabela1">
                <tr>
                    <th>Maquina</th>
                    <th>Modelo</th>
                    <th>Ano Fabrica��o</th>
                    <th>Fabricante</th>
                    <th>Nr de Serie</th>
                    <th>Patrim�nio</th>

                </tr>
                <?
                $mostragrid1 = $conn->Execute($achasemana199);
while ( !$mostragrid1->EOF)
{
                    $compo1 = $mostragrid1->fields["0"];


                    ?>
                    <tr>
                        <td><? echo $mostragrid1->fields["0"]; ?></td>
                        <td><? echo $mostragrid1->fields["1"]; ?></td>
                        <td><? echo $mostragrid1->fields["2"]; ?></td>
                        <td><? echo $mostragrid1->fields["3"]; ?></td>
                        <td><? echo $mostragrid1->fields["4"]; ?></td>
                        <td><? echo $mostragrid1->fields["5"]; ?></td>

                    </tr>
                    <?
                    $mostragrid1->MoveNext();
                }
                ?>
            </table>
        </div>

        <?
    }//final quando mostra detalhe

if ($dispminima =="2")
{

        $elimina1 = "delete from  AUX_FILTRO";
        $sachaequide47816 = $conn->Execute($elimina1);
        $sgrava1g = "insert into AUX_FILTRO(ID_SITUACAO) VALUES(
                           '$situacaoordem')";

        $sgrava1gg = $conn->Execute($sgrava1g);

    }



if ($dispminima=="0")
{

        ?>
        <div style="display: block;" id="telapesquisa">


            <table width="100%" border="0" background-image="sairmensagem.png">
                <tr>
                    <td align=right>
                        <? echo $titulojanelainsert; ?>
                        <a href="consultaequipamentov10.php?navegando=sim&escolha=1&dispminima=3">
                            <IMG src="sairmensagem.png" width="38" height="38"></a>
                    </td>
                </tr>
            </table>

            Situa��o da Ordem:<select name="situacaoordem" onchange="this.form.submit()">
                <option value="<? echo $situacaoordem; ?>"><? echo $situacaoordem; ?></option>
                <option value="">Todas</option>
                <option value="A">Ativa</option>
                <option value="I">Inativa</option>
                <option value="D">Devolvida</option>
                <option value="E">Emprestada</option>
                <option value="M">Manuten��o</option>
            </select>

            <input type="hidden" name="etapa" value="6">
            <input type="hidden" name="contadorano" value="<? echo $contadorano; ?>">


            <br/>
            <input type="hidden" name="continuarmesmatela" value="sim">
            <input type="hidden" name="dispminima" value="0">

		<a href="<?echo $programa;?>?navegando=sim&escolha=1&situacaoordem=<?echo $situacaoordem;?>&dispminima=2"><IMG src="okmensagemconsulta.png" width="140" height="75" align="center" ></a>	 	




        </div>

        <?
    }//FINAL QUANDO PASSA PARAMETROS E CALCULA AUX FILTRO




if (!IsSet($dispminima) or ($dispminima =="3"))
{

        $achasituacao1 = "select ID_SITUACAO from  AUX_FILTRO";
        $achasituacao12 = $conn->Execute($achasituacao1);
        $achasituacaoatual = $achasituacao12->fields["0"];

        ?>


        <div id="telaresultadomaquina">

            <table class="MsoTableGrid" border="1">
            <tr>
                        <th>Unid</th>
                        <?
                        $suni = "select distinct cd_fabrica FABRICA FROM fabricas  order by CD_FABRICA asc";
                        $smpegaaux2achaunidade = $conn->Execute($suni);
  while ( !$smpegaaux2achaunidade->EOF)
  {
                            ?>
                            <th><? echo $smpegaaux2achaunidade->fields["0"]; ?></th><?

                            $smpegaaux2achaunidade->MoveNext();
                        }
                        ?>
                        <th>Total</th>
                    </tr>

                    <?
                    $s21fal = "select distinct CD_FAMLIA FROM familias ";
                    $s21fal2 = $conn->Execute($s21fal);
  while ( !$s21fal2->EOF)
  {
                        $codigofamilia = $s21fal2->fields["0"];
                        ?>
                        <tr>
                            <td><? echo $s21fal2->fields["0"]; ?></td>
                            <?
                            $acha2fa = "select distinct cd_fabrica FABRICA FROM fabricas order by CD_FABRICA asc";
                            $acha2fa6 = $conn->Execute($acha2fa);
                         while ( !$acha2fa6->EOF)
                        {
                                $codigofabrica5 = $acha2fa6->fields["0"];

						 if ($dispminima >"0")
                         {
                                    $quantoss17 = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
						 a.cd_famlia='$codigofamilia' and
						 a.STATUS_MAQUINA like '%$achasituacaoatual%'
						 ";
						 }
						 else
						 {
                                    $quantoss17 = "select count(*)  CONTADOR
                             from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                             WHERE a.CD_CENTRO=b.cd_centro  and
                             b.cd_secao=c.cd_secao and
                             c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
						 a.cd_famlia='$codigofamilia' 
						 ";
                                }

                                $acha2fa68 = $conn->Execute($quantoss17);
                                $acha55 = $acha2fa68->fields["0"];


                                if ($acha55 > "0") {
                                    ?>
						 <td><a href="#"><? echo "$acha55";?></a> <!-- consultaequipamentov10.php?fabrica=<?echo "$codigofabrica5";?>&codigofamilia=<?echo "$codigofamilia";?>&navegando=sim&mostradetalhe=sim&dispminima=1 -->
                                    </td>
                                    <?
                         }
                         else
                         {
                                    ?>
                                    <td></td>
                                    <?
                                }
                                $acha2fa6->MoveNext();
                            }//fian ldas fabriacas


	  
	  
                            ?>


  
                            <td>

                                <?
						 if ($dispminima >"0")
                         {
                                    $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
						 a.cd_famlia='$codigofamilia' 
						 and
						 a.STATUS_MAQUINA like '%$achasituacaoatual%'
						 ";
						 }
						 else
						 {
                                    $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
						 a.cd_famlia='$codigofamilia'
						 ";
                                }
                                //echo "$quantoss17t</br>";
                                $acha2fa68t = $conn->Execute($quantoss17t);
                                $acha557 = $acha2fa68t->fields["0"];
                                echo "$acha557";
                                ?>
                            </td>
                        </tr>
                        <?

                        $s21fal2->MoveNext();
                    }//final analise
                    ?>
                    <tr>
                        <td>Total</td>

                        <?
                        $acha2fa4 = "select distinct cd_fabrica FABRICA FROM fabricas order by CD_FABRICA asc";
                        $acha2fa64 = $conn->Execute($acha2fa4);
                         while ( !$acha2fa64->EOF)
                        {
                            $codigofabrica54 = $acha2fa64->fields["0"];
                            ?>
                            <td>
                                <?
                         if ($dispminima >"0")
                         {
                                    $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area 
						 and d.cd_fabrica='$codigofabrica54'
						 and
						 a.STATUS_MAQUINA like '%$achasituacaoatual%'
						 ";
						 }
						 else
						 {
                                    $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  
						 and
                         d.cd_fabrica='$codigofabrica54'
						 ";
                                }

                                $acha2fa68t = $conn->Execute($quantoss17t);
                                $acha557 = $acha2fa68t->fields["0"];

                                echo "$acha557";
                                ?>
                            </td>
                            <?
                            $acha2fa64->MoveNext();
                        }//final analise
                        ?>
                        <td>
                            <?
						 if ($dispminima >"0")
                         {
                                $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  
						 and
						 a.STATUS_MAQUINA like '%$achasituacaoatual%'
						 ";
						 }
						 else
						 {
                                $quantoss17t = "select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  
						 ";
                            }
                            //echo "$quantoss17t</br>";
                            $acha2fa68t = $conn->Execute($quantoss17t);
                            $acha557 = $acha2fa68t->fields["0"];

                            echo "$acha557";
                            ?>

                        </td>

                    </tr>


                </table>
        </div>

    <? }//final tela mostra o resultado
    ?>
</form>


