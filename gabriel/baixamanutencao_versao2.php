<HEAD>

<style  type="text/css">
#envolve { width: 100%}
 #div_1 { position: relative; width: 30%; height: 100%; background-color: #FFFFFF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 70%; height: 100%; background-color: #FFFFFF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }






 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;
         background-color: white;

}

#primeiro{
position:absolute;

top:170;
left:420;
background-color:#CDC5BF;
width: 20%;
height: 20%;


}

</style>

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

<script>
function Oculta(cxa){
if (document.getElementById(cxa).style.display=='none'){
document.getElementById(cxa).style.display='block';
}else{
document.getElementById(cxa).style.display='none';
}
}
</script>

</HEAD>


<form name=Form1 action="conexao_baixaordem.php" method="POST">
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
$fabricapesquisa=$_GET['fabricapesquisa'];
$grupoordens=$_GET['grupoordens'];


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

$programa="conexao_baixaordem.php";
require("configuraoracle.php");
require("estilo2.css");

require("configuramysql.php");


//require("configuraoracle.php");
if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($grupoordens)){
$grupoordens="C";
}

if (!IsSet($modalidade)){
$modalidade="01";
$modalidademostra="HORA NORMAL";
}
ELSE
{
                 $result28MODA = "select DS_MODALIDADE FROM MODALIDADE_HORA WHERE CD_MODALIDADE='$modalidade'";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $modalidademostra=ociresult($result38MODA, "DS_MODALIDADE") ;
                 }

}

if (!IsSet($solicitantepesquisainicial)){

}
ELSE
{

 $solicitantepesquisa=$solicitantepesquisainicial;
}


if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}


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





<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Baixa de Ordens</font>

<?

if ($escolha=="Baixar final"){ ?>

<font style='font-size: 15px;color: red;text-align:left;bold: Negrito' ><?echo " Ordem Selecionada:$listaordemselecionada</br>";?> </font>
<font style='font-size: 12px;color: blue;text-align:left;bold: Negrito' >
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&acaogravar=incluirregistro&atividadegrava=<?ECHO $atividadegrava;?>">Mão Obra</a></td>
|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=ELIMINAORDENS">Eliminar Registro de Horas</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=consulta">Consultar</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=editardescricao">Descrição do Serviço</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>">Trocar Ordem</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=somenteconcluirordem">Concluir Ordem</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&acaogravar=requisicaomaterial">Requisição de Materias</a></td>

|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial">Abrir Nova Requisição</a></td>


|
<a href="#" onClick="window.open('baixamamateriais.php?escolha=Baixar final&tela=0&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial&atividadegrava=<?ECHO $atividadegrava;?>&componente=<?ECHO $componente;?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1300,height=550')">
                                         Materiais</a>

|
<a href="#" onClick="window.open('paradaordens.php?escolha=Baixar final&tela=0&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=novarequisicaomaterial&atividadegrava=<?ECHO $atividadegrava;?>&componente=<?ECHO $componente;?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=1300,height=550')">
                                         Parada Ordem</a>


|
<a href="baixamanutencao_versao2.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $listaordemselecionada;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=mostrarterceiro">Serviços Terceiros</a></td>




<?}
?>

 </font></center>




<?


                           $sgrava1= OCIParse($ora_conexao, "DELETE FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario'");
                           OCIExecute($sgrava1, OCI_DEFAULT);
                           oci_commit($ora_conexao);




$result28t = "select TIPO_SERVICO  FROM  TIPO_SERVS WHERE CD_TIPO='$tipo'";
                 $result38t = @OCIParse($ora_conexao, $result28t);
				 @OCIExecute($result38t, OCI_DEFAULT);
				 while (OCIFetchInto($result38t,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $descricaotipo=ociresult($result38t, "TIPO_SERVICO") ;
                 }



if (!IsSet($escolha)){
?>



<select name="fabricapesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $fabricapesquisa;?>">Unidade:<? echo $fabricapesquisa;?></option>
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


               Equipamento:<input type="TXT" name="codigomaquina"  value= "<?echo $codigomaquina;?>" SIZE="5">

    <select style="background-color:#8B8378;color: white;"  name="grupoordens" >
    <option value="<?echo $grupoordens;?>">Grupo:<? echo $mostraordem;?></option>
    <option value="C">Não Planejadas</option>
    <option value="P">Planejadas</option>
    <option value="T">Todas</option>
 	</select>

      <select style="background-color:#8B8378;color: white;"  name="tipo" >
      <option value="<?echo $tipo;?>">Tipo:<? echo $tipo;?></option>
    <?
				 $result2 = "SELECT CD_TIPO,TIPO_SERVICO FROM TIPO_SERVS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_TIPO"]}\">{$row["TIPO_SERVICO"]}</option>";
                 }
				 ?>
 	</select>
 	
 	
 	
 	      <select name="atividadepesquisa" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $atividadepesquisa;?>">Atividade:<? echo $atividadepesquisa;?></option>
                 <option value="">Todas</option>
                 <?
				 $result2 = "SELECT CD_ATIVIDADE,DS_ATIVIDADE FROM ATIVIDADES order by DS_ATIVIDADE asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_ATIVIDADE"]}\">{$row["CD_ATIVIDADE"]}-{$row["DS_ATIVIDADE"]}</option>";
                 }
				 ?>
				 </select>
 	

                 <?

                         $quantosfabricas199 = OCIParse($ora_conexao, "SELECT MAX(dt_inicio) DATA1,MAX(dt_final) DATA2 from
                         AUX_BAIXAORDEM WHERE CD_USUARIO='$usuario'");


                        OCIExecute($quantosfabricas199, OCI_DEFAULT);
                        While (OCIFetch($quantosfabricas199)) {
                            $datapesquisa1=ociresult($quantosfabricas199, "DATA1") ;
                            $datapesquisa2=ociresult($quantosfabricas199, "DATA2") ;
                        }
                        $datapesquisa1=$data1."/".$month."/".$year;
                        $datapesquisa2=$data2."/".$month."/".$year;

                        ?>

        Nr Ordem:<input type="TXT" name="numeroordempesquisa"  value= "<?echo $numeroordempesquisa;?>" size="10"></br>
        
        Solicitante:      <select name="solicitantepesquisainicial">

                 <option value="">Todos</option>
                 <?
				 $result2 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE WHERE CADASTRO IN (SELECT
                 DISTINCT CD_SOLICITANTE FROM EMER_COMP)  ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["CADASTRO"]}-{$row["NOME"]}</option>";
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
<hr>


<?
  

$s = OCIParse($ora_conexao, "select  NUMERO,CD_MAQUINA MAQUINA,DATA_INICIO DATA,CD_FABRICA,CD_ATIVIDADE,CD_COMPONENTE,1 TIPO,OBS,SOLICITANTE,
HORA_INICIO,MINUTO_INICIO   FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa' and
                       cd_maquina like '%$codigomaquina%' and
                       DATA_INICIO <='$diahoje'  and
                       NUMERO like '%$numeroordempesquisa%'
                       and cd_atividade like '%$atividadepequisa%'
                       order by DATA_INICIO ASC
                       ");                      
                       
                       ?>
 </br></br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

    <tr>

    <th>Nr.Ordem</th>
    <th>Codigo Maquina</th>
   	<th>Codigo Componente</th>
	<th>Codigo Atividade</th>
    <th>Data Planejada Execução</th>
    <th>Comentário</th>
    <th>Status</th>
    


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

      echo "achou componente:$componente";

      ?>
      <tr>

      <td><center><a href="baixamanutencao_versao2.php?pagina=1&escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordem;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>"><? echo ociresult($s, "NUMERO");?></a></td>



      <td><center><? echo ociresult($s, "MAQUINA");?></td>
       <td><center><? echo ociresult($s, "CD_COMPONENTE");?></td>
      <td><center><? echo ociresult($s, "CD_ATIVIDADE");?></td>
      <td><center><? echo ociresult($s, "DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
      <td>
          <a href="javascript:Oculta('primeiro');">Comentário</a>
      <center><input type="radio" name="message" onClick="alert('Solicitante:<? echo ociresult($s, "SOLICITANTE");?>--><?echo ociresult($s, "OBS");?>')")></center></td>

      <td><h1 style='font-size: 10px;color: RED;text-align:left;bold: Negrito text-decoration: none'><? echo "Pendente";?></td>


      </tr>
      <?

  }
  ?>
  </table>
  
<div  style="display: none;" id="primeiro">
Comentário
<hr>

Solicitante:<? echo ociresult($s, "SOLICITANTE");?>--><?echo ociresult($s, "OBS");?>



</div>


    <input type="hidden" name="contadorordem" value="<?echo $contadorordem;?>">
    <input type="hidden" name="atual" value="<?echo $atual;?>">
    <input type="hidden" name="datapesquisa1" value="<?echo $datapesquisa1;?>">
    <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">


        <?


}//final quando nao escolhe nada tela de entrada


if ($escolha=="1"){
?>



Unidade:      <select name="fabricapesquisa">
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


               Código Máquina:<input type="TXT" name="codigomaquina"  value= "<?echo $codigomaquina;?>" SIZE="5">
               Grupo:
    <select   name="grupoordens" >
    <option value="<?echo $grupoordens;?>"><? echo $mostraordem;?></option>
    <option value="C">Não Planejadas</option>
    <option value="P">Planejadas</option>
    <option value="T">Todas</option>
 	</select>

      Tipo:<select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="tipo" >
      <option value="<?echo $tipo;?>"><? echo $tipo;?></option>
    <?
				 $result2 = "SELECT CD_TIPO,TIPO_SERVICO FROM TIPO_SERVS ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_TIPO"]}\">{$row["TIPO_SERVICO"]}</option>";
                 }
				 ?>
 	</select></br>
 	
 	Atividade:      <select name="atividadepesquisa">
                 <option value="<?echo $atividadepesquisa;?>"><? echo $atividadepesquisa;?></option>
                 <option value="">Todas</option>
                 <?
				 $result2 = "SELECT CD_ATIVIDADE,DS_ATIVIDADE FROM ATIVIDADES order by DS_ATIVIDADE asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_ATIVIDADE"]}\">{$row["CD_ATIVIDADE"]}-{$row["DS_ATIVIDADE"]}</option>";
                 }
				 ?>
				 </select>



                 <?

                         $quantosfabricas199 = OCIParse($ora_conexao, "SELECT MAX(dt_inicio) DATA1,MAX(dt_final) DATA2 from
                         AUX_BAIXAORDEM WHERE CD_USUARIO='$usuario'");


                        OCIExecute($quantosfabricas199, OCI_DEFAULT);
                        While (OCIFetch($quantosfabricas199)) {
                            $datapesquisa1=ociresult($quantosfabricas199, "DATA1") ;
                            $datapesquisa2=ociresult($quantosfabricas199, "DATA2") ;
                        }
                        $datapesquisa1=$data1."/".$month."/".$year;
                        $datapesquisa2=$data2."/".$month."/".$year;

                        ?>

        Nr Ordem:<input type="TXT" name="numeroordempesquisa"  value= "<?echo $numeroordempesquisa;?>" size="10">
        
        
        Solicitante:      <select name="solicitantepesquisainicial">
                 <option value="<?echo $solicitantepesquisa;?>"><? echo $solicitantepesquisa;?></option>
                 <option value="">Todos</option>
                 <?
				 $result2 = "SELECT CADASTRO,NOME FROM FUNCIONARIO_SADEGE WHERE CADASTRO IN (SELECT
                 DISTINCT CD_SOLICITANTE FROM EMER_COMP)  ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["CADASTRO"]}-{$row["NOME"]}</option>";
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



  <input  type="submit"   VALUE="Buscar">
  <hr>


  </br></br></br>


<?
$diahoje=date('d-m-Y');      

                       IF ($grupoordens=="C"){

                       
                       if (strlen($solicitantepesquisa) != 0)
                       {
                       

                       $s = OCIParse($ora_conexao, "select  NUMERO,CD_MAQUINA MAQUINA,to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_FABRICA,
                       CD_ATIVIDADE,CD_COMPONENTE,1 TIPO,
                       OBS,SOLICITANTE,HORA_INICIO,MINUTO_INICIO
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa' and
                       cd_maquina like '%$codigomaquina%'
                       and
                       NUMERO like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%' and
                       cd_solicitante='$solicitantepesquisa'
                       order by DATA_INICIO ASC
                       ");
                       

                       
                       }
                       else
                       {

                       $s = OCIParse($ora_conexao, "select  NUMERO,CD_MAQUINA MAQUINA,to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_FABRICA,
                       CD_ATIVIDADE,CD_COMPONENTE,1 TIPO,
                       OBS,SOLICITANTE,HORA_INICIO,MINUTO_INICIO
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa' and
                       cd_maquina like '%$codigomaquina%'
                       and
                       NUMERO like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                       order by DATA_INICIO ASC
                       ");          
                                              
                       }

                       }



                       IF ($grupoordens=="P"){
                       

                       
                       $s = OCIParse($ora_conexao, "select  NUMERO_ORDEM NUMERO,CD_MAQUINA MAQUINA,to_char(DATA_PLANE,'dd/mm/yyyy') DATA,CD_FABRICA ,
                       CD_ATIVIDADE,CD_COMPONENTE,2 TIPO FROM ORDEM_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa' and
                       cd_maquina like '%$codigomaquina%'
                       and
                       cd_tipo like '%$tipo%' and
                       cd_maquina like '%$codigomaquina%' and
                       NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                         order by DATA_PLANE ASC
                       ");


                       }
                       
                       IF ($grupoordens=="T"){

                       $s = OCIParse($ora_conexao, "select  NUMERO,
                       CD_MAQUINA MAQUINA,
                       DATA_INICIO DATA,
                       CD_FABRICA,CD_ATIVIDADE,
                       CD_COMPONENTE,
                       1 TIPO,
                       OBS,
                       SOLICITANTE
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa'
                       and cd_maquina like '%$codigomaquina%' and
                       NUMERO like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                       union
                       select  NUMERO_ORDEM NUMERO,
                       CD_MAQUINA MAQUINA,
                       DATA_PLANE DATA,
                       CD_FABRICA ,
                       CD_ATIVIDADE,
                       CD_COMPONENTE,
                       2 TIPO,
                       OBS,
                       SOLICITANTE
                       FROM ORDEM_COMP
                       where STATUS='G'   and
                       cd_fabrica='$fabricapesquisa'  and
                       cd_tipo like '%$tipo%' and
                       cd_maquina like '%$codigomaquina%' and
                       NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                       ");
                       }
                       

                       ?>

 </br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

    <tr>

    <th>Nr.Ordem</th>
   	<th>Codigo Maquina</th>
   	<th>Codigo Componente</th>
	<th>Codigo Atividade</th>
    <th>Data Planejada Execução</th>
    <th>Comentário</th>
    <th>Status</th>



    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $quantospendentes1="0";
      $quantospendentes2="0";
      $ordem=ociresult($s, "NUMERO") ;
      $componente=ociresult($s, "CD_COMPONENTE") ;
      $tipoordem=ociresult($s, "TIPO") ;

      IF ($grupoordens=="C"){
      $horainicio77=ociresult($s, "HORA_INICIO") ;
      $minutoinicio77=ociresult($s, "MINUTO_INICIO") ;
      }
      
      $atividaderecuperada=ociresult($s, "CD_ATIVIDADE") ;
      
      $contadorordem=$contadorordem+1;




      ?>
      <tr>

      <td>
      <?
      
      $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   ORDEM_COMP where STATUS='G'   and
                      NUMERO_ORDEM='$ordem' and
                      DATA_PLANE <='$diahoje'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $quantospendentes1=ociresult($achadiacontador7, "CONTADOR") ;
                      }
                      $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   EMER_COMP where STATUS='G'   and
                      NUMERO='$ordem' and
                      DATA_INICIO <='$diahoje'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $quantospendentes2=ociresult($achadiacontador7, "CONTADOR") ;
                      }

      ?>

      <center><a href="<?echo $programa;?>?pagina=1&escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&componente=<?echo $componente;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&listaordemselecionada=<? echo ociresult($s, "NUMERO");?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>&grupoordens=<?ECHO $grupoordens;?>"><? echo ociresult($s, "NUMERO");?></a></td>


      <td><center><? echo ociresult($s, "MAQUINA");?></td>
      <td><center><? echo ociresult($s, "CD_COMPONENTE");?></td>
      <td><center><? echo ociresult($s, "CD_ATIVIDADE");?></td>
      <td><center><? echo ociresult($s, "DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
      <td><center>
      <a href="javascript:Oculta('primeiro');">Comentário</a>

      <input type="radio" name="message" onClick="alert('Solicitante:<? echo ociresult($s, "SOLICITANTE");?>--><?echo ociresult($s, "OBS");?>')")></center></td>



      <td>
      <?

      
                      $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   ORDEM_COMP where STATUS='G'   and
                      NUMERO_ORDEM='$ordem' and
                      DATA_PLANE <='$diahoje'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $quantospendentes1=ociresult($achadiacontador7, "CONTADOR") ;
                      }
                      $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
                      FROM   EMER_COMP where STATUS='G'   and
                      NUMERO='$ordem' and
                      DATA_INICIO <='$diahoje'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $quantospendentes2=ociresult($achadiacontador7, "CONTADOR") ;
                      }
                      IF (($quantospendentes1 >"0") OR ($quantospendentes2 >"0")){
                          $mostrapendente="Em Atraso";
                          $corpendente="red";
                      }
                      else
                      {
                      $mostrapendente="A ser Executada";
                      $corpendente="green";
                      }
      ?>

      <h1 style='font-size: 10px;color:<?echo $corpendente;?>;text-align:left;bold: Negrito text-decoration: none'><? echo "$mostrapendente";?></td>


      </tr>
      
       <div  style="display: none;" id="primeiro">
Comentário
<hr>

Solicitante:<? echo ociresult($s, "SOLICITANTE");?>--><?echo ociresult($s, "OBS");?>



</div>
      
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

}










if ($escolha=="Baixar final"){




//acha utima recomendacao
                      $achaultimarecomendacao1= OCIParse($ora_conexao, "SELECT  recomendacao RECO from EMER_COMP where NUMERO='$listaordemselecionada'
                      union
                      SELECT  recomendacao from ORDEM_COMP where NUMERO_ORDEM='$listaordemselecionada'
                      ");
                      OCIExecute($achaultimarecomendacao1, OCI_DEFAULT);
                      While (OCIFetch($achaultimarecomendacao1)) {
                         $recomendacao88=ociresult($achaultimarecomendacao1, "RECO") ;


                      }



                                  
?>
<hr>



<?

if (!IsSet($acaogravar) or ($acaogravar=="consulta")){


//resutado ATUAL

			  $smostrafuncordem = OCIParse($ora_conexao, "select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,
              a.CD_COMPONENTE CD_COMPONENTE,
              a.NUMERO NUMERO,a.HORA HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,c.DS_MODALIDADE MODALIDADE2
              from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO='$listaordemselecionada' AND
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade
              UNION
              select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,a.NUMERO_ORDEM NUMERO_ORDEM,
              a.HORAS HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,c.DS_MODALIDADE MODALIDADE2
              from  COMP_FUNC  a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO_ORDEM='$listaordemselecionada'  and
              a.cadastro=b.cadastro and
              a.cd_modalidade=c.cd_modalidade
              ");
 ?>


 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

    <tr>
    <h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
    <?echo "</br>Registro de Horas Trabalhadas  pelos Mantenedores";?></h1>
    <th>Cadastro</th>
    <th>Nome</th>
    <th>Modalidade</th>
   	<th>Hora Inicio</th>
	<th>Hora Fim</th>
	<th>Total de Horas</th>
    <th>Data Execução</th>





    </tr>
    <?
    OCIExecute($smostrafuncordem, OCI_DEFAULT);
    While (OCIFetch($smostrafuncordem)) {
    ?>
      <tr>

      <td><center><? echo ociresult($smostrafuncordem, "CADASTRO");?></td>
      <td><center><? echo ociresult($smostrafuncordem, "NOME");?></td>
      <td><center><? echo ociresult($smostrafuncordem, "MODALIDADE2");?></td>
      <td><center><? echo ociresult($smostrafuncordem, "HR_INI");?></td>
      <td><center><? echo ociresult($smostrafuncordem, "HR_FIM");?></td>
      <td><center><?
         $horatotal=ociresult($smostrafuncordem, "HORAMOSTRA") ;
         $horatotal= str_replace(",", ".","$horatotal" );
         
         $horacheia=floor($horatotal);
         

         
         
         $minutocheio=($horatotal-$horacheia)*60;
         $mostranovotempo=$horacheia.":".$minutocheio;

      echo $mostranovotempo;?></td>

      <td><center><? echo ociresult($smostrafuncordem, "DATABAIXA");?></td>


    </tr>
    <?
    }//fina dos funcioanrios na ordem
    ?>
    </table>

<?
}//final quando acao é primeiro acesso ou consuta


$achadiacontador7= OCIParse($ora_conexao, "SELECT  to_char(DATA_PLANE,'dd/mm/YYYY') DATA,CD_ATIVIDADE
                      FROM   ORDEM_COMP where   NUMERO_ORDEM='$listaordemselecionada' ");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $dataplanejada1=ociresult($achadiacontador7, "DATA") ;
                         $tipogravacao="Planejada";
                         $atividaderava=ociresult($achadiacontador7, "CD_ATIVIDADE") ;

                      }
                      $achadiacontador7= OCIParse($ora_conexao, "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA ,CD_ATIVIDADE
                      FROM   EMER_COMP where  NUMERO='$listaordemselecionada'");
                      OCIExecute($achadiacontador7, OCI_DEFAULT);
                      While (OCIFetch($achadiacontador7)) {
                         $dataplanejada2=ociresult($achadiacontador7, "DATA") ;
                         $atividaderava=ociresult($achadiacontador7, "CD_ATIVIDADE") ;
                         $tipogravacao="Não Planejada";
                      }

                      IF($tipogravacao=="Não Planejada"){
                      $dataplanejadamostra5= $dataplanejada2;

                      }
                      else
                      {
                      $dataplanejadamostra5= $dataplanejada1;

                      }



IF ($acaogravar=="incluirregistro"){

echo "camponente:$componente";

?>







<hr>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">
<tr>

<h1 style='font-size: 13px;color: RED;bold: Negrito text-decoration: none'>Novo Registro</h1>


<?




                      ?>
                      Nr Cadastro:<input type="TXT" name="cadastro"   size="7" >
                      Modalidade:<select name="modalidade">
                 <option value="<?echo $modalidade;?>"><? echo $modalidademostra;?></option>
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
                      Hora Fim:<input type="txt" name="hora2"  id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" value="00:00">

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
		              
		              <input type="hidden" name="componente" value="<?echo $componente;?>">






                      </br>
                      </center>
                      


</tr>
</table>

  <input type="hidden" name="acaogravar" value="GFUNC">


<input  type="submit"   VALUE="Gravar">






<hr>
</center>



 <?
 
 }//final do incluir ordem
 
 
IF ($acaogravar=="editardescricao"){
?>

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
		              <input type="hidden" name="acaogravar" value="editardescricaofinal">
		              <input type="hidden" name="edicao" value="sim">
		              
		              <?
		              //acha utima recomendacao
                      $achaultimarecomendacao1= OCIParse($ora_conexao, "SELECT  recomendacao RECO from EMER_COMP where NUMERO='$listaordemselecionada'
                      union
                      SELECT  recomendacao from ORDEM_COMP where NUMERO_ORDEM='$listaordemselecionada'
                      ");
                      OCIExecute($achaultimarecomendacao1, OCI_DEFAULT);
                      While (OCIFetch($achaultimarecomendacao1)) {
                         $recomendacao88=ociresult($achaultimarecomendacao1, "RECO") ;


                      }
                      ?>

                      Nova Descrição do Serviço</br>
                      <textarea  cols="76" rows="5" name="recomendacao" ><?echo $recomendacao88;?></textarea></br>


<input  type="submit"   VALUE="Gravar">







</center>



 <?

 }//final do editar descricao
 
 
 //teste a gravacao acima
 

                      $achacodigofunc= OCIParse($ora_conexao, "SELECT  CADASTRO,CD_CARGO  FROM  FUNCIONARIO_SADEGE WHERE
                      CADASTRO='$cadastro' ");
                      OCIExecute($achacodigofunc, OCI_DEFAULT);
                      While (OCIFetch($achacodigofunc)) {
                         $codigofuncioanriogravar=ociresult($achacodigofunc, "CADASTRO") ;
                         $cargo=ociresult($achacodigofunc, "CD_CARGO") ;

                      }

                      $achaexistefunc= OCIParse($ora_conexao, "SELECT count(*) CONTADOR FROM  FUNCIONARIO_SADEGE WHERE
                      CADASTRO='$cadastro' ");
                      OCIExecute($achaexistefunc, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc)) {
                         $existefuncionario=ociresult($achaexistefunc, "CONTADOR") ;


                      }
                      




IF ($acaogravar=="editardescricaofinal"){
   if ($tipogravacao=="Planejada"){;
     $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET recomendacao='$recomendacao'
                            WHERE NUMERO_ORDEM='$listaordemselecionada'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            


      ?><center><?echo " Editado a Descricao";

      


   }
   else
   {
   $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET recomendacao='$recomendacao'
                                  WHERE NUMERO='$listaordemselecionada'");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  


      ?><center><?echo " Editado a Descricao";

   }





}



IF ($acaogravar=="GFUNC"){




  if (strlen($_POST['recomendacao']) != 0)
  {
  echo "recomendacao nao esta vazia";
  }
  else
  {
   echo "recomendacao  esta vazia";
  }

  

       if ($existefuncionario>"0"){

                              $datapesquisa1=$data1."/".$month."/".$year;
                              $datapesquisa2=$data2."/".$month."/".$year;


                 if ($tipogravacao=="Planejada"){;

                                $minutoapoio1=substr($hora,3,2);
                                $horaacumulada1=$minutoapoio1/60;
                                $horaapoio1=substr($hora,0,2);
                                $horaacumulada1final=$horaacumulada1+$horaapoio1;
                                $minutoapoio2=substr($hora2,3,2);
                                $horaacumulada2=$minutoapoio2/60;
                                $horaapoio2=substr($hora2,0,2);
                                $horaacumulada2final=$horaacumulada2+$horaapoio2;
                                $diferencahora=$horaacumulada2final-$horaacumulada1final;
                            
                            
                                //teste de hora sobreposicao

                                $achatestehora1= OCIParse($ora_conexao, "SELECT COUNT(*)  CF1 FROM
                                COMP_FUNC CF WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro' AND
                                ((CF.HR_INI >= '$hora' AND CF.HR_INI < '$hora2' ) OR ( CF.HR_INI <='$hora'  AND   CF.HR_FIM >'$hora'))
                                ");
                                OCIExecute($achatestehora1, OCI_DEFAULT);
                                While (OCIFetch($achatestehora1)) {
                                   $contador1hora=ociresult($achatestehora1, "CF1") ;
                                }


                                $achatestehora2= OCIParse($ora_conexao, "
                                SELECT COUNT(*)  CF2        FROM COMP_FUNC CF
                                WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro'
                                AND ((CF.HR_FIM > '$hora' AND CF.HR_FIM <=  '$hora2') OR (CF.HR_INI <='$hora2' AND CF.HR_FIM >'$hora2'))
                                ");
                                OCIExecute($achatestehora2, OCI_DEFAULT);
                                While (OCIFetch($achatestehora2)) {
                                   $contador2hora=ociresult($achatestehora2, "CF2") ;

                                }
                                
                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }

                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }


                               if ($contador1hora=="0" and $contador2hora=="0" and $contador5hora=="0" and $contador6hora=="0"){

                                  //echo "INSERT INTO COMP_FUNC(CADASTRO,
                                  //DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO_ORDEM,CD_CARGO,HR_INI,HR_FIM,HORAS,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  //VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  //'$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')";

                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO COMP_FUNC(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO_ORDEM,CD_CARGO,HR_INI,HR_FIM,HORAS,CD_MODALIDADE,
                                  HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  '$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  if (strlen($_POST['recomendacao']) != 0)
                                  {
                                  $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET recomendacao='$recomendacao'
                                  WHERE NUMERO_ORDEM='$listaordemselecionada'");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);

                                  }

                                  

                                  
                                  ?><h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
                                  <?echo "Registrado Funcionário nesta Ordem";
                               }
                               else
                               {
                                  ?><h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
                                  <?echo "Existe Sobreposição de Horas  para este cadastro";
                               }

                  }

                  if ($tipogravacao=="Não Planejada"){;


                            $minutoapoio1=substr($hora,3,2);
                            $horaacumulada1=$minutoapoio1/60;
                            $horaapoio1=substr($hora,0,2);
                            $horaacumulada1final=$horaacumulada1+$horaapoio1;
                            
                            
                            $minutoapoio2=substr($hora2,3,2);
                            $horaacumulada2=$minutoapoio2/60;
                            $horaapoio2=substr($hora2,0,2);
                            $horaacumulada2final=$horaacumulada2+$horaapoio2;
                            $diferencahora=$horaacumulada2final-$horaacumulada1final;
                            
                            
                            //teste de hora sobreposicao

                                $achatestehora1= OCIParse($ora_conexao, "SELECT COUNT(*)  CF1 FROM
                                COMP_FUNC_EMER  CF WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro' AND
                                ((CF.HR_INI >= '$hora' AND CF.HR_INI < '$hora2' ) OR ( CF.HR_INI <='$hora'  AND   CF.HR_FIM >'$hora'))
                                ");
                                OCIExecute($achatestehora1, OCI_DEFAULT);
                                While (OCIFetch($achatestehora1)) {
                                   $contador3hora=ociresult($achatestehora1, "CF1") ;
                                }


                                $achatestehora2= OCIParse($ora_conexao, "
                                SELECT COUNT(*)  CF2        FROM COMP_FUNC_EMER CF
                                WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro'
                                AND ((CF.HR_FIM > '$hora' AND CF.HR_FIM <=  '$hora2') OR (CF.HR_INI <='$hora2' AND CF.HR_FIM >'$hora2'))
                                ");
                                OCIExecute($achatestehora2, OCI_DEFAULT);
                                While (OCIFetch($achatestehora2)) {
                                   $contador4hora=ociresult($achatestehora2, "CF2") ;

                                }
                                

                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }
                                
                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }
                                

                                if ($contador3hora=="0" and $contador4hora=="0" and $contador5hora=="0" and $contador6hora=="0"){
                                  
                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO COMP_FUNC_EMER(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO,CD_CARGO,HR_INI,HR_FIM,HORA,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  '$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  

                                  if (strlen($_POST['recomendacao']) != 0)
                                  {
                                  $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET recomendacao='$recomendacao'
                                  WHERE NUMERO='$listaordemselecionada'");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);

                                  }



                                  
                                  ?><h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
                                  <?echo "Registrado Funcionário nesta Ordem";
                               }
                               else
                               {
                                  ?><h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
                                  <?echo "Existe Sobreposição de Horas  para este cadastro";
                               }




                   }//final da nao planejada

      }//existe funcianrio
      else
      {//nao existe funcioanrio
      ?>
        <input type="HIDDEN" name="atividadegrava" value="<?echo $atividadegrava;?>">

      <h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
      <center><?echo "</br>Cadastro de Funcionário não existe na base de dados";?></h1><?
      }


}//final grava  so funcioanrio


IF ($acaogravar=="FEORDEAPENAS"){



  if (strlen($_POST['recomendacao']) != 0)
  {

            if ($existefuncionario>"0"){

                              $datapesquisa1=$data1."/".$month."/".$year;
                              $datapesquisa2=$data2."/".$month."/".$year;


                 if ($tipogravacao=="Planejada"){;

                                $minutoapoio1=substr($hora,3,2);
                                $horaacumulada1=$minutoapoio1/60;
                                $horaapoio1=substr($hora,0,2);
                                $horaacumulada1final=$horaacumulada1+$horaapoio1;
                                $minutoapoio2=substr($hora2,3,2);
                                $horaacumulada2=$minutoapoio2/60;
                                $horaapoio2=substr($hora2,0,2);
                                $horaacumulada2final=$horaacumulada2+$horaapoio2;
                                $diferencahora=$horaacumulada2final-$horaacumulada1final;


                                //teste de hora sobreposicao

                                $achatestehora1= OCIParse($ora_conexao, "SELECT COUNT(*)  CF1 FROM
                                COMP_FUNC CF WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro' AND
                                ((CF.HR_INI >= '$hora' AND CF.HR_INI < '$hora2' ) OR ( CF.HR_INI <='$hora'  AND   CF.HR_FIM >'$hora'))
                                ");
                                OCIExecute($achatestehora1, OCI_DEFAULT);
                                While (OCIFetch($achatestehora1)) {
                                   $contador1hora=ociresult($achatestehora1, "CF1") ;
                                }


                                $achatestehora2= OCIParse($ora_conexao, "
                                SELECT COUNT(*)  CF2        FROM COMP_FUNC CF
                                WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro'
                                AND ((CF.HR_FIM > '$hora' AND CF.HR_FIM <=  '$hora2') OR (CF.HR_INI <='$hora2' AND CF.HR_FIM >'$hora2'))
                                ");
                                OCIExecute($achatestehora2, OCI_DEFAULT);
                                While (OCIFetch($achatestehora2)) {
                                   $contador2hora=ociresult($achatestehora2, "CF2") ;

                                }

                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }

                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }


                               if ($contador1hora=="0" and $contador2hora=="0" and $contador5hora=="0" and $contador6hora=="0"){

                                  //echo "INSERT INTO COMP_FUNC(CADASTRO,
                                  //DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO_ORDEM,CD_CARGO,HR_INI,HR_FIM,HORAS,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  //VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  //'$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava'";

                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO COMP_FUNC(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO_ORDEM,CD_CARGO,HR_INI,HR_FIM,HORAS,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  '$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET STATUS='B'
                            WHERE NUMERO_ORDEM='$listaordemselecionada'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);



                            $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET recomendacao='$recomendacao'
                            WHERE NUMERO_ORDEM='$listaordemselecionada'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                                  
                                  

                                  echo "Registrado Funcionário nesta Ordem";
                               }
                               else
                               {

                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }

                  }

                  if ($tipogravacao=="Não Planejada"){;

                            $minutoapoio1=substr($hora,3,2);
                            $horaacumulada1=$minutoapoio1/60;
                            $horaapoio1=substr($hora,0,2);
                            $horaacumulada1final=$horaacumulada1+$horaapoio1;


                            $minutoapoio2=substr($hora2,3,2);
                            $horaacumulada2=$minutoapoio2/60;
                            $horaapoio2=substr($hora2,0,2);
                            $horaacumulada2final=$horaacumulada2+$horaapoio2;
                            $diferencahora=$horaacumulada2final-$horaacumulada1final;


                            //teste de hora sobreposicao

                                $achatestehora1= OCIParse($ora_conexao, "SELECT COUNT(*)  CF1 FROM
                                COMP_FUNC_EMER  CF WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro' AND
                                ((CF.HR_INI >= '$hora' AND CF.HR_INI < '$hora2' ) OR ( CF.HR_INI <='$hora'  AND   CF.HR_FIM >'$hora'))
                                ");
                                OCIExecute($achatestehora1, OCI_DEFAULT);
                                While (OCIFetch($achatestehora1)) {
                                   $contador3hora=ociresult($achatestehora1, "CF1") ;
                                }


                                $achatestehora2= OCIParse($ora_conexao, "
                                SELECT COUNT(*)  CF2        FROM COMP_FUNC_EMER CF
                                WHERE CF.DATA_BAIXA_INDIVIDUAL = '$data'
                                AND CF.CADASTRO = '$cadastro'
                                AND ((CF.HR_FIM > '$hora' AND CF.HR_FIM <=  '$hora2') OR (CF.HR_INI <='$hora2' AND CF.HR_FIM >'$hora2'))
                                ");
                                OCIExecute($achatestehora2, OCI_DEFAULT);
                                While (OCIFetch($achatestehora2)) {
                                   $contador4hora=ociresult($achatestehora2, "CF2") ;

                                }


                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }

                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }


                                if ($contador3hora=="0" and $contador4hora=="0" and $contador5hora=="0" and $contador6hora=="0"){

                                  //echo "INSERT INTO COMP_FUNC_EMER(CADASTRO,
                                  //DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO,CD_CARGO,HR_INI,HR_FIM,HORA,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  //VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  //'$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')";

                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO COMP_FUNC_EMER(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO,CD_CARGO,HR_INI,HR_FIM,HORA,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE )
                                  VALUES ('$cadastro','$data','$componente','$listaordemselecionada','$cargo','$hora','$hora2',$diferencahora,
                                  '$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava')");


                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  
                                  $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET STATUS='B',DATA_FIM='$horaacumulada2final'
                                  WHERE NUMERO='$listaordemselecionada'");


                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);

                                  $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET recomendacao='$recomendacao'
                                  WHERE NUMERO='$listaordemselecionada'");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  

                                  echo "Registrado Funcionário nesta Ordem e Fechada ordem";
                               }
                               else
                               {

                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }




                   }//final da nao planejada

      }//existe funcianrio
      else
      {//nao existe funcioanrio

      echo "</br>Cadastro de Funcionário não existe na base de dados";
      }




 }
 else
 {
 echo "</br>Necessita existir uma  descricao de Serviço";
 }

?>
 <input type="HIDDEN" name="atividadegrava" value="<?echo $atividadegrava;?>">
 <?

}



IF ($acaogravar=="ELIMINAORDENS"){

$contadoreliminar="0";

$achaselecao1 = OCIParse($ora_conexao, "select CADASTRO,NUMERO,HR_INI,HR_FIM  from  COMP_FUNC_EMER WHERE NUMERO='$listaordemselecionada'
UNION
select CADASTRO,NUMERO_ORDEM,HR_INI,HR_FIM  from  COMP_FUNC WHERE NUMERO_ORDEM='$listaordemselecionada'
");

?>
<h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
<?echo "</br>Eliminando os  Registros de Horas";?></h1>
<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="500">

<tr>

                <th>Cadastro</th>
                <th>Hora inicio</th>
                <th>Hora Final</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>


<?

                  OCIExecute($achaselecao1, OCI_DEFAULT);
                  While (OCIFetch($achaselecao1)) {
                                   $cadastro8=ociresult($achaselecao1, "CADASTRO") ;
                                   $inicio8=ociresult($achaselecao1, "HR_INI") ;
                                   $fim8=ociresult($achaselecao1, "HR_FIM") ;


               ?>

			        <tr>

					<td><?echo $cadastro8;?></td>

					<td  align="left"><?echo $inicio8;?></td>

					<td  align="left"><?echo $fim8;?></td>



					<td ><input type="checkbox" name="ordemselecao[]" value="<?echo $inicio8;?>">
                    <input type="hidden" name="cadastroselecao[]" SIZE="3" value="<?echo $cadastro8;?>">
                    <input type="hidden" name="horainicioselecao[]" SIZE="3" value="<?echo $inicio8;?>">
                    <input type="hidden" name="horafimselecao[]" SIZE="3" value="<?echo $fim8;?>">


                    </td>


			 <?
             $contadoreliminar=$contadoreliminar+1;
			 }

 ?>
 </table>
 
 <input type="hidden" name="acaogravar" size="5" value="ELIMINARFINAL" >
 
 <input type="hidden" name="escolha" size="5" value="Baixar final" >

  <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		<input type="hidden" name="contadoreliminar" value="<?echo $contadoreliminar;?>">


<input  type="submit"     VALUE="Confirma">


 <hr>







<?



}//fianl quando seleciona para excluir


IF ($acaogravar=="ELIMINARFINAL"){

$ordemselecao=$_POST['ordemselecao'];

$cadastroselecao=$_POST['cadastroselecao'];
$horainicioselecao=$_POST['horainicioselecao'];
$horafimselecao=$_POST['horafimselecao'];



 for ($passa=0;$passa <=$contadoreliminar;$passa++)
 {

 $deletafinal0=$ordemselecao[$passa];

 $deletafinal1=$cadastroselecao[$passa];
 $deletafinal2=$horainicioselecao[$passa];





 $deletafinal3=$horafimselecao[$passa];



     if ($deletafinal0 >"0"){ //selecinou
                                  //echo "selcao=$deletafinal0";
                                  //echo "</br>delete from COMP_FUNC_EMER  WHERE
                                  //CADASTRO = '$deletafinal1' and NUMERO='$listaordemselecionada'  and
                                  //HR_INI='$deletafinal0' ";

                                  
                                  $sgrava1= OCIParse($ora_conexao, "delete from COMP_FUNC_EMER  WHERE
                                  CADASTRO = '$deletafinal1' and NUMERO='$listaordemselecionada'  and
                                  HR_INI='$deletafinal0'
                                  ");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);
                                  
                                  //echo "</br>delete from COMP_FUNC  WHERE
                                  //CADASTRO = '$deletafinal1' and NUMERO_ORDEM='$listaordemselecionada'
                                  //and  HR_INI='$deletafinal2' and HR_FIM='$deletafinal3'";
                                  

                                  $sgrava1= OCIParse($ora_conexao, "delete from COMP_FUNC  WHERE
                                  CADASTRO = '$deletafinal1' and NUMERO_ORDEM='$listaordemselecionada'
                                  and  HR_INI='$deletafinal0'
                                  ");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);



     }

 }

 echo "Eliminado Registro de Hora da  Ordem:$listaordemselecionada";

}//final quando  elimina final

IF ($acaogravar=="somenteconcluirordem"){
?>
<div  style="display: block;" id="mostramensagem">
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="conexao_baixaordem.php?navegando=sim&escolha=Baixar final&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
        </br></br></br>
        <?echo "Deseja Realmente Concluir a Ordem";?>
        </br></br></br></br></br></br>
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        

        <input type="hidden" name="escolha" size="5" value="Baixar final" >

        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		<input type="hidden" name="contadoreliminar" value="<?echo $contadoreliminar;?>">

		<input type="hidden" name="tipogravacao" value="<?echo $contadoreliminar;?>">


        <a href="conexao_baixaordem.php?navegando=sim&escolha=Baixar final&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>&acaogravar=nao">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>
        
        <a href="conexao_baixaordem.php?navegando=sim&escolha=Baixar final&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>&acaogravar=somenteconcluirordem2">
        <IMG src="okmensagem.png" width="92" height="48" ></a>




        </td>

        </tr>
        </table>

</div>

<?
}



IF ($acaogravar=="somenteconcluirordem2"){



                     $achaexistefunc7758= OCIParse($ora_conexao, "SELECT count(*) CONTADOR FROM  EMER_COMP WHERE
                      NUMERO='$listaordemselecionada' and recomendacao is null  ");
                      OCIExecute($achaexistefunc7758, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc7758)) {
                         $quantosrecomc=ociresult($achaexistefunc7758, "CONTADOR") ;


                      }
                      
                      $achaexistefunc7759= OCIParse($ora_conexao, "SELECT count(*) CONTADOR FROM  ORDEM_COMP WHERE
                      NUMERO_ORDEM='$listaordemselecionada'  and recomendacao is null");
                      OCIExecute($achaexistefunc7759, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc7759)) {
                         $quantosrecomp=ociresult($achaexistefunc7759, "CONTADOR") ;


                      }
                      

                      


                      $achaexistefunc775= OCIParse($ora_conexao, "SELECT count(*) CONTADOR FROM  COMP_FUNC WHERE
                      NUMERO_ORDEM='$listaordemselecionada' ");
                      OCIExecute($achaexistefunc775, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc775)) {
                         $quantos666p=ociresult($achaexistefunc775, "CONTADOR") ;


                      }

                      $achaexistefunc7752= OCIParse($ora_conexao, "SELECT count(*) CONTADOR FROM  COMP_FUNC_EMER WHERE
                      NUMERO='$listaordemselecionada' ");
                      OCIExecute($achaexistefunc7752, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc7752)) {
                         $quantos666c=ociresult($achaexistefunc7752, "CONTADOR") ;


                      }
                      
                      $achaexistefunc7752D= OCIParse($ora_conexao, "SELECT MAX(DATA_BAIXA_INDIVIDUAL) DATA
                      FROM  COMP_FUNC_EMER WHERE
                      NUMERO='$listaordemselecionada' ");
                      OCIExecute($achaexistefunc7752D, OCI_DEFAULT);
                      While (OCIFetch($achaexistefunc7752D)) {
                         $datamaximabaixa=ociresult($achaexistefunc7752D, "DATA") ;


                      }







                                  $result2xistevei897786 = "select count(*) CONTADOR
                                  FROM  SERV_TERC_ITENS a,SERV_TERC_PEDIDO b
                                  where
                                  a.nr_pedido=b.nr_pedido and
                                  b.ID_STATUS not  in ('FINA')  AND
                                  b.NR_ORDEM_SERVICO='$listaordemselecionada'
                                  ";

                                  
                                  $result3ver897786 = @OCIParse($ora_conexao, $result2xistevei897786);
				                  @OCIExecute($result3ver897786, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver897786,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo780=ociresult($result3ver897786, "CONTADOR") ;
                                  }
 ?>

 <div  style="display: block;" id="mostramensagem">
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="conexao_baixaordem.php?navegando=sim&escolha=Baixar final&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
        </br>
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>



 <?

 if ($tipogravacao=="Não Planejada"){




                                  IF ($ultimo780=="0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS


                                   if ($quantos666c=="0")
                                   {
                                   echo "Ordem sem Funcionários";
                                   $medeacao="mesmaordem";
                                   }
                                   else
                                   {
                                    if ($quantosrecomc=="0"){
                                       $sgrava1= OCIParse($ora_conexao, "update EMER_COMP SET STATUS='B',
                                       DATA_FIM='$datamaximabaixa'
                                       WHERE NUMERO='$listaordemselecionada'");
                                       OCIExecute($sgrava1, OCI_DEFAULT);
                                       oci_commit($ora_conexao);
                                       echo "Concluida Ordem:$listaordemselecionada";
                                       $medeacao="novaordem";

                                       
                                       
                                    }
                                    else
                                    {
                                     echo "Ordem sem Recomendação Não é possível Concluir";
                                     $medeacao="mesmaordem";
                                    }
                                    
                                  }



                                  }
                                  else
                                  {
                                   echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
                                   $medeacao="mesmaordem";
                                  }
                                  
 }
 else
 {

                            IF ($ultimo780=="0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS

                             if ($quantos666p=="0")
                                   {
                                   echo "Ordem sem Funcionários";
                                   $medeacao="mesmaordem";
                                   }
                                   else
                                   {
                                    if ($quantosrecomp=="0"){
                                       $sgrava1= OCIParse($ora_conexao, "update ORDEM_COMP SET STATUS='B'
                                       WHERE NUMERO_ORDEM='$listaordemselecionada'");
                                       OCIExecute($sgrava1, OCI_DEFAULT);
                                       oci_commit($ora_conexao);
                                       echo "Concluida Ordem:$listaordemselecionada";
                                       $medeacao="novaordem";
                                    }
                                    else
                                    {
                                     echo "Ordem sem Recomendação Não é possível Concluir";
                                     $medeacao="mesmaordem";
                                    }

                                  }


                            }
                            else
                            {
                                  echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
                                  $medeacao="mesmaordem";
                            }


 }
 ?>
 </br></br></br></br></br>
 
 <input type="hidden" name="escolha" size="5" value="Baixar final" >

  <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		<input type="hidden" name="contadoreliminar" value="<?echo $contadoreliminar;?>">


        <?
        if ($medeacao=="novaordem")
        {
        ?>
        
        <a href="conexao_baixaordem.php?navegando=sim&escolha=1&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>">
        <IMG src="okmensagem.png" width="92" height="48" ></a>
        <?}
        else
        {
        ?>
        
        <a href="conexao_baixaordem.php?navegando=sim&escolha=Baixar final&banco=<?echo $banco;?>&listaordemselecionada=<?echo $listaordemselecionada;?>">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>


        <?
        }
        ?>


        </td>

        </tr>
        </table>
 
 </div>
 <?


}//final quando so conckuir ordem


IF ($acaogravar=="requisicaomaterial"){

$diahoje=date('d-m-Y');

$achaselecao1RE = OCIParse($ora_conexao, "select a.nr_sequencia SEQUENCIA,a.NR_REQUISICAO SOLICITA,a.NR_ORDEM,DT_SOLICITACAO DATA,b.NOME NOME,
a.ID_FINALIZADA_ALMOX FINALI1,a.ID_FINALIZADA_PRODUCAO FINALI2,c.DS_TIPO TIPO,a.QT_REQUISITADA QUANTIDADE
from
TIPO_ITEM c,REQUISICAO_MATERIAIS_W a,FUNCIONARIO_SADEGE b
where a.NR_ORDEM='$listaordemselecionada' and
a.CD_TIPO_ITEM=c.cd_tipo and
a.CD_SOLICITANTE=b.cadastro
");
?>

<h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
<?echo "</br>Solicitações Abertas";?></h1>
<CENTER><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="900">

<tr>

                <th>Nr. Requisição</th>
                <th>Solicitante</th>
                <th>Dta</th>
                <th>Grupo de Item</th>
                <th>Quantidade</th>

                <th>Situação Almoxarifado</th>
                <th>Situação Manutenção</th>

				<th style='font-size: 9px;text-align:left;bold: Negrito'>Selecionar</th>


</tr>


<?

                  OCIExecute($achaselecao1RE, OCI_DEFAULT);
                  While (OCIFetch($achaselecao1RE)) {
                                   $fim6=ociresult($achaselecao1RE, "SOLICITA") ;
                                   $fim7=ociresult($achaselecao1RE, "NOME") ;
                                   $fim8=ociresult($achaselecao1RE, "DATA") ;
                                   $fim9=ociresult($achaselecao1RE, "FINALI1") ;
                                   $fim10=ociresult($achaselecao1RE, "FINALI2") ;
                                   $fim11=ociresult($achaselecao1RE, "TIPO") ;
                                   $fim12=ociresult($achaselecao1RE, "QUANTIDADE") ;
                                   $sequencia12=ociresult($achaselecao1RE, "SEQUENCIA") ;

                                   IF ($fim9=="N"){$mostrafim="Requisição em Liberação pelo Almoxarifado";}
                                   else{$mostrafim="Requisição Liberada pelo Almoxarifado";}
                                   
                                   IF ($fim10=="N"){$mostrafim2="Material Aguardando Uso pela Manutenção";}
                                   else{$mostrafim2="Material Usado pela Manutenção";}


               ?>

			        <tr>

					<td><?echo $fim6;?></td>

					<td  align="left"><?echo $fim7;?></td>

					<td  align="left"><?echo $fim8;?></td>
					<td  align="left"><?echo $fim11;?></td>
					<td  align="left"><?echo $fim12;?></td>
					
					
					
					<td  align="left"><?echo $mostrafim;?></td>
					<td  align="left"><?echo $mostrafim2;?></td>



					<td ><input type="checkbox" name="ordemselecao[]" value="<?echo $sequencia12;?>" onclick="
                                                   if (this.checked)
                                                   {
                                                    botao.disabled = false;
                                                    acaogravar.value='DefinirMaterial';
                                                   }
                                                   else if (! botao.checked)
                                                   {
                                                    botao.disabled = true;
                                                    acaogravar.value='Nova Requisicao';
                                                   }">


                    </td>


			 <?
             $contadoreliminar=$contadoreliminar+1;
			 }

 ?>
 </table>
 
 <input type="hidden" name="mes"  size="5" value="<?echo $mes;?>">
			          <input type="hidden" name="ano"  size="5" value="<?echo $ano;?>">
                      <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
			          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
                       <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		              <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		              <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		              <input type="hidden" name="banco" value="<?echo $banco;?>">
		              <input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		              <input type="hidden"  id="acaogravar" name="acaogravar" size="45">
                      <input type="hidden" name="escolha" size="5" value="Baixar final" >
                      <input type="txt" name="fabricapesquisa" size="5" value="<?echo $fabricapesquisa;?>" >
                      
                      <input type="submit" name="botao" value="Definir Materiais" disabled>

 
 <?}
 
 
 IF ($acaogravar=="novarequisicaomaterial"){
?>



 </br>
                 Abrindo uma Nova Requisição</br>

                 Solicitante:<select name="solicitante">

                 <?
				 $result2 = "SELECT CADASTRO,NOME  FROM FUNCIONARIO_SADEGE";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CADASTRO"]}\">{$row["NOME"]}</option>";
                 }
				 ?>
				 </select>
				 
				      Grupo de Itens:<select name="item">

                 <?
				 $result2 = "Select CD_TIPO,DS_TIPO,CD_UNIDADE FROM TIPO_ITEM";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_TIPO"]}\">{$row["DS_TIPO"]}</option>";
                 }
				 ?>
				 </select>
				 Quantidade:<input type="txt" name="quantidade"  size="5" value="0"></br>

                      Hora :<input type="TXT" name="hora"  id="Hora" OnKeyUp="Mascara_Hora(this.value)" size="5" maxlength="5" value="00:00">

                      DATA
                      <input type="text" name="datasolicitacao"  OnKeyUp="mascaraData(this);" maxlength="10"  / VALUE="<?echo $diahoje;?>" ></br>
                      
                      Nr Requisição:<input type="txt" name="requisicao"  size="5" value="0"></br>
                      


                      <input type="hidden" name="mes"  size="5" value="<?echo $mes;?>">
			          <input type="hidden" name="ano"  size="5" value="<?echo $ano;?>">
                      <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
			          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
                       <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		              <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		              <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		              <input type="hidden" name="banco" value="<?echo $banco;?>">
		              <input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		              <input type="txt"   name="acaogravar" size="45" value="gravarrequisao" >
                      <input type="hidden" name="escolha" size="5" value="Baixar final" >




<input  type="submit"     VALUE="Confirmar">



                      </br><center>

<?
}


IF ($acaogravar=="gravarrequisao"){

                                  ECHO "GRAVANDO REQUISICAO";
                                  
                                  $result2 = "select MAX(NR_SEQUENCIA) DISTR FROM REQUISICAO_MATERIAIS_W";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $sequencia1=ociresult($result3, "DISTR") ;
                                  }
                                  IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}
                                  
                                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO REQUISICAO_MATERIAIS_W(
                                  NR_SEQUENCIA,NR_REQUISICAO,NR_ORDEM,CD_EMPRESA,DT_SOLICITACAO,CD_SOLICITANTE,CD_TIPO_ITEM,
   ID_FINALIZADA_ALMOX,ID_FINALIZADA_PRODUCAO,QT_REQUISITADA )
                                  VALUES ('$maxima2','$requisicao','$listaordemselecionada','$fabricapesquisa','$diahoje','$solicitante',
                                  '$item','N','N',$quantidade)");
                                  OCIExecute($sgrava1, OCI_DEFAULT);
                                  oci_commit($ora_conexao);

}//final grva resuisao


IF ($acaogravar=="DefinirMaterial"){

                                  ECHO "Defindo Materiais para Liberação de Estoque</br>";
                                  
                                    $s = OCIParse($ora_conexao, "SELECT a.CD_MATERIAL MATERIAL,a.DS_MATERIAL DESCRICAO,b.ds_tipo DESCRICAOTIPO
                       FROM MAT_PECAS a,TIPO_ITEM b
                 where a.CD_ITEM_CLASSIFICACAO=b.cd_tipo and
                 a.cd_fabrica='$fabricapesquisa' order by b.ds_tipo asc
                 ");





        ?>



 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">

    <tr>
    <th></center><font style='font-size: 10px;color: white;text-align:left;bold: Negrito' >Codigo</th>
	<th>Descrição</th>
 <th>Classificação de Uso</th>
 <th>Unid</th>
 <th>Quantidade Estoque</th>


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $material=ociresult($s, "MATERIAL") ;
      ?>
      <tr>
      <td><font style='font-size: 10px;color: black;text-align:left;bold: Negrito' ><? echo ociresult($s, "MATERIAL");?></td>
      <td><? echo ociresult($s, "DESCRICAO");?></td>
      <td><? echo ociresult($s, "DESCRICAOTIPO");?></td>

      </tr>
      <?

  }
  ?>
  </table>

                                  
<?
}


IF ($acaogravar=="mostrarterceiro"){


 ?>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:white;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="70%">

 <tr>


    			<th>Nr.Pedido</th>
                <th>Dta Abertura</th>

                <th>Dta Prevista</br>Início</th>
                <th>Fornecedor</th>
                <th>Serviço</th>
                <th>Dta </br>Término</th>

                <th>Status </br>Pedido</th>



   </tr>
   
   

   <?

   $s = OCIParse($ora_conexao, "select  a.NR_PEDIDO NR_PEDIDO,c.ds_servico SERVICO,d.DATA_ENTREGA DATAE,
                                  a.DATA_DIGITACAO DATA1,
                                  a.DATA_EMISSAO DATA2,
                                  a.COD_FORNECEDOR,
                                  a.CD_EMPRESA_SOLICITANTE  EMPRESA1,
                                  a.NR_SEQUENCIA,
                                  a.NR_ORDEM_SERVICO ORDEM,b.EMPRESA DESCRICAO,a.id_status STATUS
                                  FROM serv_terc_pedido a,FORNECEDOR_SADEGE b,servico_gerais_sadege c,serv_terc_itens d
                                  where a.COD_FORNECEDOR=b.COD_FORNECEDOR AND
                                  a.NR_ORDEM_SERVICO='$listaordemselecionada' and
                                  a.nr_pedido=d.nr_pedido and
                                  d.cd_servico=c.cd_servico
                                  ");



      OCIExecute($s, OCI_DEFAULT);
      While (OCIFetch($s)) {
      $pedido=ociresult($s, "NR_PEDIDO") ;
      $data1=ociresult($s, "DATA1") ;

      $data2=ociresult($s, "DATA2") ;
      $descricao=ociresult($s, "DESCRICAO") ;
      $ordem=ociresult($s, "ORDEM") ;
      $status=ociresult($s, "STATUS") ;
      $descricaoservico=ociresult($s, "SERVICO") ;
      $dataentrega=ociresult($s, "DATAE") ;



          ?>
			<tr>
					<td ><?echo $pedido;?></td>
					<td ><?echo $data1;?></td>
                    <td ><?echo $data2;?></td>
                    <td ><?echo $descricao;?></td>
                    <td ><?echo $descricaoservico;?></td>
                    <td ><?echo $dataentrega;?></td>



                    <?

                         if ($status=="ABER"){$statusmostra="Sem Cotação";$cor="white";}
                         if ($status=="COTA"){$statusmostra="Cotado";$cor="yellow";}
                         if ($status=="APRO"){$statusmostra="Aprovado";$cor="green";}
                         if ($status=="ANDA"){$statusmostra="Execução ";$cor="blue";}
                         if ($status=="FINA"){$statusmostra="Finalizado";$cor="green";}
                         if ($status=="DESA"){$statusmostra="Desativado";$cor="red";}
                     ?>



              <td BGCOLOR=<?echo $cor;?>><?echo $statusmostra;?></a></td>



          <?
          }//FINAL DE TOADAS ORDENS



 ?>

 </tr>
 </table>

<?
}//final quando mostra os servicos de terceiros

}//final baixa


?>






</form>

