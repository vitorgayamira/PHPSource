<HEAD>
<STYLE type=text/css>#envolve { width: 1100px;}
#div_1 { position: relative; width: 300px; height: 900px; background-color: #333399; float: left; text-align: center; color: #FFF;  }
#div_2 { position: relative; width: 800px; height: 900px; background-color: WHITE; float: left; text-align: center; color: #FFF;}
#clear { clear:both; }
</STYLE>

<Script Language="JavaScript">
function pegavalores(){


    document.getElementById('cadastrodestino').value = document.getElementById('cadastroorigem').value;
    document.getElementById('bancodestino').value = document.getElementById('bancoorigem').value;
  document.Form1.submit();
}

function mascaraData(campoData){
              var data = campoData.value;
                            if (data.length == 2){
                                              data = data + '/';
                                              document.forms[0].data.value = data;      return true;
                                               }
                                               if (data.length == 5){
                                               data = data + '/';
                                               document.forms[0].data.value = data;
                                               return true;
                                                }         }



function Mascara_Hora2(Hora2)
{
         var hora01 = '';
         hora01 = hora01 + Hora2;
         if (hora01.length == 2){
              hora01 = hora01 + ':';
              document.forms[0].Hora2.value = hora01;
          }
          if (hora01.length == 5){
             Verifica_Hora2();
          }
}

function Mascara_Hora(Hora)
{
         var hora01 = '';
         hora01 = hora01 + Hora;
         if (hora01.length == 2){
           hora01 = hora01 + ':';
           document.forms[0].Hora.value = hora01;
         }
         if (hora01.length == 5){
            Verifica_Hora();
         }
}

function Verifica_Hora()
{
        hrs = (document.forms[0].Hora.value.substring(0,2));
        min = (document.forms[0].Hora.value.substring(3,5));
        estado = "";
       if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
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


function Verifica_Hora2()
{
           hrs = (document.forms[0].Hora2.value.substring(0,2));
           min = (document.forms[0].Hora2.value.substring(3,5));
           hrsinicio = (document.forms[0].Hora.value.substring(0,2));

           estado = "";
           if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
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
           else
           {
           document.getElementById('Gravacaofuncionario').disabled = false;
           document.getElementById('fecharordem').disabled = false;
           }



}

function gravaordemfunc(){

    document.getElementById('campo_acaomarcado').value = 'GFUNC';
    submit()

}

function gravafuncordem(){

    document.getElementById('campo_acaomarcado').value = 'FEORDE';
    submit();

}

function gravafuncordem2(){

    document.getElementById('campo_acaomarcado').value = 'FEORDEAPENAS';
    submit();

}

function eliminafuncordem2(){

    document.getElementById('campo_acaomarcado').value = 'ELIMINAORDENS';
    submit();

}




</script>

</HEAD>


<form name=Form1 action="movimentacaoestoque_versao1.php" method="POST">
<?


$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$modelopesquisa=$_GET['modelopesquisa'];
$anopesquisa=$_GET['anopesquisa'];
$fabricantepesquisa=$_GET['fabricantepesquisa'];
$ativopesquisa=$_GET['ativopesquisa'];
$seriepesquisa=$_GET['seriepesquisa'];
$patrimoniopesquisa=$_GET['patrimoniopesquisa'];
$localizacaopesquisa=$_GET['localizacaopesquisa'];
$familiapesquisa=$_GET['familiapesquisa'];
$baseoracle=$_GET['baseoracle'];
$month=$_GET['month'];
$year=$_GET['year'];
$dia=$_GET['dia'];
$fabricapesquisa=$_GET['fabricapesquisa'];
$usuario=$_GET['usuario'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$fabricaescolha=$_GET['fabricaescolha'];
$componente=$_GET['componente'];
$acaoeliminar=$_GET['acaoeliminar'];
$acaogravar=$_GET['acaogravar'];
$atividadegrava=$_GET['atividadegrava'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa1=$_POST['turnopesquisa1'];
$turnopesquisa2=$_POST['turnopesquisa2'];
$turno=$_POST['turno'];
$ano=$_POST['ano'];
$ano2=$_POST['ano2'];
$mes=$_POST['mes'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];
        $banco=$_POST['banco'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$quantaslinhasnutrientemp=$_POST['quantaslinhasnutrientemp'];
			$existenutriente=$_POST['existenutriente'];
			$telainiciarsimulacao=$_POST['telainiciarsimulacao'];
			$tipoconsulta2=$_POST['tipoconsulta2'];
            $gravandofinal=$_POST['gravandofinal'];
            $existenutriente=$_POST['existenutriente'];
            $itempesquisa2=$_POST['itempesquisa2'];
            $itempesquisa1=$_POST['itempesquisa2'];
            $tipoconsulta1=$_POST['tipoconsulta1'];
            $modelopesquisa=$_POST['modelopesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $ativopesquisa=$_POST['ativopesquisa'];
            $seriepesquisa=$_POST['seriepesquisa'];
            $patrimoniopesquisa=$_POST['patrimoniopesquisa'];
            $localizacaopesquisa=$_POST['localizacaopesquisa'];
            $familiapesquisa=$_POST['familiapesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $selecaofabrica=$_POST['selecaofabrica'];
            $contadorlinha=$_POST['contadorlinha'];
            $contadorfamilia=$_POST['contadorfamilia'];
            $contadorfabrica=$_POST['contadorfabrica'];
            $contadorregiao=$_POST['contadorregiao'];
            $contadordistrito=$_POST['contadordistrito'];


            $listamodelo=$_POST['listamodelo'];
            $listafamilia=$_POST['listafamilia'];
            $lista=$_POST['lista'];
            $listafabricante=$_POST['listafabricante'];
            $listaano=$_POST['listaano'];
            $listaregiao=$_POST['listaregiao'];
            $listadistrito=$_POST['listadistrito'];
            $listafabrica=$_POST['listafabrica'];
            $baseoracle=$_POST['baseoracle'];
            $habilita=$_POST['habilita'];

            $usuario=$_POST['usuario'];
            $usuarioinicio=$_POST['usuarioinicio'];
            $senha=$_POST['senha'];
            $senhanova=$_POST['senhanova'];

            $contador66=$_POST['contador66'];
            $listaordem=$_POST['listaordem'];
            $contadorordem=$_POST['contadorordem'];
            $peca=$_POST['peca'];
            $quantidadepeca=$_POST['quantidadepeca'];
            $ordematual=$_POST['ordematual'];
            $atual=$_POST['atual'];
            $datapesquisa1=$_POST['datapesquisa1'];
            $fabricapequisa=$_POST['fabricapequisa'];
            $ordembaixa=$_POST['ordembaixa'];
            $databaixa=$_POST['databaixa'];
            $grupoordens=$_POST['grupoordens'];
            $tipo=$_POST['tipo'];
            $codigomaquina=$_POST['codigomaquina'];
            $fabricaescolha=$_POST['fabricaescolha'];
            $numeroordempesquisa=$_POST['numeroordempesquisa'];
            $modalidade=$_POST['modalidade'];
            $acaogravar=$_POST['acaogravar'];
            $listaordemselecionada=$_POST['listaordemselecionada'];
            $cadastro=$_POST['cadastro'];
            $hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $componente=$_POST['componente'];
            $recomendacao=$_POST['recomendacao'];
            $atividadegrava=$_POST['atividadegrava'];
            $contadoreliminar=$_POST['contadoreliminar'];
            $edicao=$_POST['edicao'];
            $atividadepequisa=$_POST['atividadepequisa'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $requisicao=$_POST['requisicao'];
            $datasolicitacao=$_POST['datasolicitacao'];
            $solicitante=$_POST['solicitante'];
            $item=$_POST['item'];
            $quantidade=$_POST['quantidade'];


}


$programa="movimentacaoestoque_versao1.php";
require("estilo2.css");
require("configuraoracle.php");

$result28MODA = "select ID_EXISTE_INTEGRACAO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $integraerp=ociresult($result38MODA, "ID_EXISTE_INTEGRACAO_ERP") ;
                 }
                 $result28MODA = "select ID_BANCO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $nomedobanco=ociresult($result38MODA, "ID_BANCO_ERP") ;
                 }

echo "Existe Integracao com Erp=$integraerp - Padrão do Banco de Conexão:$nomedobanco</br>";

//=========  conexao com cliente para tarzer o estoque
if ($integraerp=="S" AND $nomedobanco=="SQLSERVER"){


     $servidor = "sql.locadados.com.br";
     $porta = 1433;
     $bancoDeDados = "hsegura_tutorial";
     $usuario = "hsegura_gerente";
     $senha = "123456";

     $conexao = mssql_connect("$servidor:$porta", $porta, $usuario, $senha);
     if(!$conexao) {
         die("Não foi possível se conectar ao banco de dados.");
     }
     mssql_select_db($bancoDeDados, $conexao);

     $sql = "SELECT NOME_COMPLETO, DATA_ANIVERSARIO, COR_FAVORITA FROM INFO_AMIGOS ORDER BY DATA_ANIVERSARIO ASC";
     $resultado = mssql_query($sql, $conexao) or die ("Não foi possível executar a consulta");
     while ($linha = mssql_fetch_array($resultado)) {
     $nome_completo = $linha["NOME_COMPLETO"];


     }
     $mostraselecaolocal="nao";
     $insereregistro="nao";


}
//======================================================================================================


require("configuramysql.php");




if (!IsSet($ano)){
$ano=date('Y');
}




if (!IsSet($fabricapesquisa)){
//acha uniddae de lotacao

    $achaunidade = "SELECT DESCRICAO from PESSOA_BI WHERE
    CODIGO IN (SELECT CD_EMPRESA FROM USUARIO_BI  WHERE CD_USUARIO='$codigousuario')";
    $achaunidade2 = mysql_db_query($banco,$achaunidade,$conexao);
    $achaunidade3=mysql_fetch_array($achaunidade2);
    $unidadelotacao1=$achaunidade3["DESCRICAO"];


    $result28 = "select CD_FABRICA FROM  FABRICAS WHERE DS_FABRICA='$unidadelotacao1'";
                 $result38 = @OCIParse($ora_conexao, $result28);
				 @OCIExecute($result38, OCI_DEFAULT);
				 while (OCIFetchInto($result38,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $fabricapesquisa=ociresult($result38, "CD_FABRICA") ;
                 }
}


                 $diahoje=date('d-m-Y');

?>


<input type="hidden" name="atividadegrava" value="<?echo $atividadegrava;?>">
<input type="hidden" name="componente" value="<?echo $componente;?>">





<font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Movimentação de Estoque</font>


<? if ($insereregistro=="sim"){?>

<font style='font-size: 15px;color: blue;text-align:left;bold: Negrito' >
<a href="movimentacaoestoque_versao1.php?escolha=movimentarestoque&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&acaogravar=incluirregistro&atividadegrava=<?ECHO $atividadegrava;?>">Novo Registro </a></td>
|
</font></center>
<?}?>


<center>
<?




if (!IsSet($escolha)){

if ($mostraselecaolocal=="sim"){?>

<font style='font-size: 15px;color: blue;text-align:left;bold: Negrito' >Parametros de Busca<hr></font>


Unidade de Negócio:      <select name="fabricapesquisa">
                 <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>
				 
				 Local de Estoque:      <select name="estoquepesquisa">
                 <option value="<?echo $fabricapesquisa;?>"><? echo $fabricapesquisa;?></option>
                 <?
				 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>


        <input type="hidden" name="escolha" value="1">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">


		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">

		<input type="hidden" name="usuario" value="<?echo $usuario;?>">
		<input type="hidden" name="senhanova" value="<?echo $senhanova;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		
		




  <input  type="submit"   VALUE="Buscar"></br>
<?







$s = OCIParse($ora_conexao, " SELECT NR_SEQUENCIA,CD_LOCAL_ESTOQUE,CD_ITEM,DT_MOVIMENTO,QT_RETIRADA,QT_ENTRADA,
VL_SALDO FROM MOVIMENTO_ESTOQUE_W
                       where
                       CD_EMPRESA='$fabricapesquisa'
                       order by DT_MOVIMENTO DESC
                       ");
                       ?>
                       
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

    <tr>

    <th>Dta</th>
    <th>Local</th>
   	<th>Item</th>
	<th>Descricao</th>
    <th>Unidade</th>
    <th>Qt_entrada</th>
    <th>Qt_saida</th>
    <th>Saldo</th>
    


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $ordem=ociresult($s, "NUMERO") ;
      $tipoordem=ociresult($s, "TIPO") ;
      $componente=ociresult($s, "CD_COMPONENTE") ;
       $horainicio77=ociresult($s, "HORA_INICIO") ;
      $minutoinicio77=ociresult($s, "MINUTO_INICIO") ;
      $atividaderecuperada=ociresult($s, "CD_ATIVIDADE") ;

      $contadorordem=$contadorordem+1;



      ?>
      <tr>

      <td><center><a href="<?echo $programa;?>?pagina=1&escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo ociresult($s, "NUMERO");?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>"><? echo ociresult($s, "NUMERO");?></a></td>



      <td><center><? echo ociresult($s, "MAQUINA");?></td>
       <td><center><? echo ociresult($s, "CD_COMPONENTE");?></td>
      <td><center><? echo ociresult($s, "CD_ATIVIDADE");?></td>
      <td><center><? echo ociresult($s, "DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
      <td><center><input type="radio" name="message" onClick="alert('Solicitante:<? echo ociresult($s, "SOLICITANTE");?>--><?echo ociresult($s, "OBS");?>')")></center></td>

      <td><h1 style='font-size: 10px;color: RED;text-align:left;bold: Negrito text-decoration: none'><? echo "Pendente";?></td>


      </tr>
      <?

  }
  ?>
  </table>

    <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">
    <input type="hidden" name="atual" value="<?echo $atual;?>">
    <input type="hidden" name="datapesquisa1" value="<?echo $datapesquisa1;?>">
    <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">


        <?






}//final quando seleciona locais
else
{


$s = OCIParse($ora_conexao, " select CD_MATERIAL,DS_MATERIAL,CD_UNIDADE,VALOR,SALDO_ESTOQUE,ESTOQUE_MINIMO FROM
MAT_PECAS");
                       ?>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

    <tr>

   	<th>Item</th>
	<th>Descricao</th>
	<th>Unidade</th>
    <th>Valor</th>
    <th style='font-size: 11px;color: white;text-align:RIGHT;bold: Negrito text-decoration: none'>Saldo</th>
    <th>Estoque Mínimo</th>




    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $codigomaterial=ociresult($s, "CD_MATERIAL") ;
      $descricaomaterial=ociresult($s, "DS_MATERIAL") ;
      $valoritem=ociresult($s, "VALOR") ;
      $saldoritem=ociresult($s, "SALDO_ESTOQUE") ;
      $saldoritem=number_format($saldoritem, 0, ',', '.');
      
      $minimoitem=ociresult($s, "ESTOQUE_MINIMO") ;



      ?>
      <tr>




      <td><center><? echo $codigomaterial;?></td>
      <td><center><? echo $descricaomaterial;?></td>
      <td><center>-</td>
      
      <td><center><? echo $valoritem;?></td>
      <td style='font-size: 11px;color: red;text-align:RIGHT;bold: Negrito text-decoration: none'><? echo $saldoritem;?></td>
      <td><center><? echo $minimoitem;?></td>


      </tr>
      <?

  }
  ?>
  </table>

<?

} //fial quans somostra estoque




 }//final quando nao escolhe nada tela de entrada



if ($escolha=="movimentarestoque"){
?>




<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">
<tr>

<h1 style='font-size: 13px;color: RED;bold: Negrito text-decoration: none'>Novo Registro</h1>


<?




                      ?>

                      Local de Movimentação:<select name="modalidade">

                 <?
				 $result2 = "SELECT distinct CD_MODALIDADE,DS_MODALIDADE FROM MODALIDADE_HORA";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_MODALIDADE"]}\">{$row["DS_MODALIDADE"]}</option>";
                 }
				 ?>
				 </select>
				 
				  Item:<select name="modalidade">

                 <?
				 $result2 = "SELECT distinct CD_MODALIDADE,DS_MODALIDADE FROM MODALIDADE_HORA";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_MODALIDADE"]}\">{$row["DS_MODALIDADE"]}</option>";
                 }
				 ?>
				 </select>



                      Hora Inicio:<input type="TXT" name="hora"  id="Hora" OnKeyUp="Mascara_Hora(this.value)" size="5" maxlength="5" value="00:00">

                      DATA
                      <input type="text" name="data"  OnKeyUp="mascaraData(this);" maxlength="10"  / VALUE="<?echo $dataplanejadamostra5;?>" >

                      <input type="hidden" name="mes"  size="5" value="<?echo $mes;?>">
			          <input type="hidden" name="ano"  size="5" value="<?echo $ano;?>">
                      <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
			          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
			          <input type="hidden" name="escolha" value="<?echo $escolha;?>">
			          <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		              <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		              <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		              <input type="hidden" name="banco" value="<?echo $banco;?>">
		              <input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">






</tr>
</table>

  Ação:<select name="acaogravar">
                 <option value="entradaestoque">Retirada</option>
                 <option value="saidaestoque">Entrada</option>
  </select>
<input  type="submit"   VALUE="Gravar">






<hr>
</center>



 <?
 

 



IF ($acaogravar=="entradaestoque"){

                                  ECHO "GRAVANDO ";
                                  
                                  $result2 = "select MAX(NR_SEQUENCIA) DISTR FROM REQUISICAO_MATERIAIS_W";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $sequencia1=ociresult($result3, "DISTR") ;
                                  }
                                  IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
                                  
                                  echo "INSERT INTO REQUISICAO_MATERIAIS_W(
                                  NR_SEQUENCIA,NR_REQUISICAO,NR_ORDEM,CD_EMPRESA,DT_SOLICITACAO,CD_SOLICITANTE,CD_TIPO_ITEM,
   ID_FINALIZADA_ALMOX,ID_FINALIZADA_PRODUCAO,QT_REQUISITADA )
                                  VALUES ('$maxima2','$requisicao','$listaordemselecionada','$fabricapesquisa','$datasolicitacao','$solicitante',
                                  '$item','N','N',$quantidade)";

                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO REQUISICAO_MATERIAIS_W(
                                  NR_SEQUENCIA,NR_REQUISICAO,NR_ORDEM,CD_EMPRESA,DT_SOLICITACAO,CD_SOLICITANTE,CD_TIPO_ITEM,
   ID_FINALIZADA_ALMOX,ID_FINALIZADA_PRODUCAO,QT_REQUISITADA )
                                  VALUES ('$maxima2','$requisicao','$listaordemselecionada','$fabricapesquisa','$diahoje','$solicitante',
                                  '$item','N','N',$quantidade)");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  //oci_commit($ora_conexao);

}//final grva resuisao

}//final incluir movimentacao
?>






</form>

