<?
ini_set('display_errors', '0');// NÃƒO HABILITAD 

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
//$programa="consultapcmanual.php";
$titulo = "Plano Anual";


?>


<div style="display: none; height:250px;" id="telapesquisa">

    <table width="100%" border="0" background-image="sairmensagem.png">
        <tr>

            <td align=right>
                <a href="<? echo $programa; ?>?pagina=1&escolha=pesquisa&programa=<? echo $programa; ?>&navegando=sim&ordenaatual=<? echo $ordenaatual; ?>&fabricaescolha=<? echo $fabricaescolha; ?>">
                    <IMG src="ordenacodigo.png"></a>


                <a href="<? echo $programa; ?>?navegando=sim&escolha=1">
                    <IMG src="sairmensagem.png" width="38" height="38"></a>
            </td>
        </tr>
    </table>
    </br></br></br>

    <center>
        <table>

            <tr>
                <td>
                    Usuário:
                </td>
                <td>

                    <select name="usuarios" id="usuarios" style="background-color:#8B8378;color: white;"
                            onchange="this.form.submit()">


                        <option value=""> TODOS</option>

                        <?

                        $stmt1 = "select cd_usuario, nm_usuario from usuario_bi";

                        $result3 = $conn->Execute($stmt1);

                        while (!$result3->EOF) {
                            print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";

                            $result3->MoveNext();
                        }

                        ?>

                    </select>
                </td>
            </tr>


        </table>
    </center>

    <a href="<? echo $programa; ?>?navegando=sim&escolha=1&"><IMG src="okmensagemconsulta.png" width="140" height="75" align="center"></a>

</div>