<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

                     $edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

                     $pagina_atual = $_GET['pagina_atual'];
					 
					 $escolha=$_GET['escolha'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="consultamtbf.php";
$titulo="Consultar Equipamentos";
$grafico1="detalhegraficomaximiza2.php";




?>
<head>
<script language=javascript>

cont = 0;
function CheckAll2() {
   for (var i=0;i<document.formulario.elements.length;i++) {
     var x = document.formulario.elements[i];
     if (x.name == 'lista[]') {
x.checked = document.formulario.selall.checked;
}
}
if (cont == 0){
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

<form action="consultaequipamentov9.php" method="POST" name="formulario">

<?require("areasuperior2.php");

require("carregamenumilenionovo2.php");


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
$contador=$_GET['contador'];
$data1=$_GET['data1'];
$data2=$_GET['data2'];
$year=$_GET['year'];
$month=$_GET['month'];
$dia=$_GET['dia'];
$datainicio=$_GET['datainicio'];

$yearf=$_GET['yearf'];
$monthf=$_GET['monthf'];
$diaf=$_GET['diaf'];

$mudoumes=$_GET['mudoumes'];
$dataanterior=$_GET['dataanterior'];
$mesanterior=$_GET['mesanterior'];
$sequenciarecebe=$_GET['sequenciarecebe'];
$statusacao=$_GET['statusacao'];
$padraoexecucao=$_GET['padraoexecucao'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$pedidoaltera=$_GET['pedidoaltera'];
$vercalendario=$_GET['vercalendario'];
$acessoudiacalendario=$_GET['acessoudiacalendario'];

$ficanatela=$_GET['ficanatela'];

$vertudopendente=$_GET['vertudopendente'];
$dispminima=$_GET['dispminima'];



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

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

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$data1=$_POST['data1'];
$data2=$_POST['data2'];
$novo=$_POST['novo'];
$month=$_POST['month'];
$executor=$_POST['executor'];
$ordem=$_POST['ordem'];
$banco=$_POST['banco'];
$acao=$_POST['acao'];
$sequenciarecebe=$_POST['sequenciarecebe'];
$hora=$_POST['hora'];
$hora2=$_POST['hora2'];
$meutexto=$_POST['meutexto'];
$fecharsoli=$_POST['fecharsoli'];
$velocidade1=$_POST['velocidade1'];
$velocidadepadrao=$_POST['velocidadepadrao'];
$solicitantepesquisa=$_POST['solicitantepesquisa'];
$mantenedor=$_POST['mantenedor'];

$atividade=$_POST['atividade'];


$datainicio=$_POST['datainicio'];
$datafinal=$_POST['datafinal'];
$contador=$_POST['contador'];

$ficanatela=$_POST['ficanatela'];
$versituacao=$_POST['versituacao'];
$dispminima=$_POST['dispminima'];

$areapesquisa=$_POST['areapesquisa'];
$secaopesquisa=$_POST['secaopesquisa'];
$centropesquisa=$_POST['centropesquisa'];
$maquina=$_POST['maquina'];

$etapa=$_POST['etapa'];
$contadorfabrica=$_POST['contadorfabrica'];
$contadorfamilia=$_POST['contadorfamilia'];
$contadormodelo=$_POST['contadormodelo'];
$contadorfabricante=$_POST['contadorfabricante'];
$contadorano=$_POST['contadorano'];

}

$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];
?>
 
 


<titulogeral><? echo "$titulo";?></titulogeral></br>
<a href="<?echo $mostraicone;?>"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>

<a href="consultaequipamentov9.php?pagina=1&dispminima=0&programa=<?echo $programa;?>&navegando=sim">
parametros de busca</a>
<?


if ($dispminima=="0")
{
if (!IsSet($etapa)){
	$etapa="1";
	$elimina1="delete from  AUX_FILTRO";
    $sachaequide47816 = $conn->Execute($elimina1); 

}
$etapaanterior=$etapa-1;


if ($etapaanterior=="1")
{//fabrica
	$lista1=$_POST['lista1'];
		
	for ($passa=0;$passa <=$contadorfabrica;$passa++)
    {
                           $criafinal=$lista1[$passa];
                           

                           if ($criafinal>"0"){
                           $sgrava1g= "insert into AUX_FILTRO(CD_FABRICA) VALUES(
                           '$criafinal')";
						   $sgrava1gg = $conn->Execute($sgrava1g);
                           
                           }
    }
	
}//FINAL DA FABRICA

if ($etapaanterior=="2")
{//familia
	$lista2=$_POST['lista2'];
	

	
	for ($passa2=0;$passa2 <=$contadorfamilia;$passa2++)
    {
                           $criafinalF=$lista2[$passa2];


                           if ($criafinalF>"0"){
                           $sgrava1g= "insert into AUX_FILTRO(CD_FAMILIA) VALUES(
                           '$criafinalF')";
						   $sgrava1gg = $conn->Execute($sgrava1g);
                           
                           }
    }
	
}//FINAL DA FAMILIA

if ($etapaanterior=="3")
{//modelo
	$lista3=$_POST['lista3'];
	

	
	for ($passa2=0;$passa2 <=$contadormodelo;$passa2++)
    {
                           $criafinalFm=$lista3[$passa2];


                           if ($criafinalFm>"0"){
                           $sgrava1g= "insert into AUX_FILTRO(CD_MODELO) VALUES(
                           '$criafinalFm')";
						   $sgrava1gg = $conn->Execute($sgrava1g);
                           
                           }
    }
	
}//FINAL Do modelo

if ($etapaanterior=="4")
{//fabricante
	$lista4=$_POST['lista4'];
	

	
	for ($passa2=0;$passa2 <=$contadorfabricante;$passa2++)
    {
                           $criafinalFmf=$lista4[$passa2];


                           if ($criafinalFmf>"0"){
                           $sgrava1g= "insert into AUX_FILTRO(FABRICANTE) VALUES(
                           '$criafinalFmf')";
						   $sgrava1gg = $conn->Execute($sgrava1g);
                           
                           }
    }
	
}//FINAL fabricante

if ($etapaanterior=="5")
{//ano
	$lista5=$_POST['lista5'];
	

	
	for ($passa2=0;$passa2 <=$contadorano;$passa2++)
    {
                           $criafinalFmfa=$lista5[$passa2];


                           if ($criafinalFmfa>"0"){
                           $sgrava1g= "insert into AUX_FILTRO(VL_ANO) VALUES(
                           '$criafinalFmfa')";
						   $sgrava1gg = $conn->Execute($sgrava1g);
                           
                           }
    }


	//MOSTRA O RESULTADO DA PESQUISA
 
                          $elimina19="delete from  AUX_CONSULTA1";
                          $sgrava1gg = $conn->Execute($elimina19);
	
	
	
	
	
	$dispminima="1";	
}//FINAL Do anos

if ($etapa<="5")
{	
?>
<div  style="display: block;" id="janelagrande1">
<?echo "Etapa:$etapa//etapa anteriot=$etapaanterior//contador fabrica:$contadorfamilia";?>

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelainsert;?>
        <a href="consultaequipamentov9.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
<?		
if ($etapa=="1")
{
?>

		<center>
		Gerando Nova Busca- Etapa1 Unidades
		</br>
		<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas</span>
		 <div style="height:70%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Unidade</th>
				<th>Nome</th>
               	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadorfabrica="0";
                 $result2 = "SELECT cd_fabrica,DS_FABRICA FROM   FABRICAS ORDER  by DS_FABRICA ASC";
				 $result3 = $conn->Execute($result2);
                 while ( !$result3->EOF) {
				 $contadorfabrica=$contadorfabrica+1;
                 ?>
                    <tr>

					<td><?echo $result3->fields["0"];?></td>
					<td><?echo $result3->fields["1"];?></td>
					<td ><input type="checkbox" name="lista1[]"   value="<?echo $result3->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="2">
			<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
<?}

if ($etapa=="2")
{
?>

		<center>
		Gerando Nova Busca- Etapa2 Familias
		</br>
		<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas</span>
		 <div style="height:70%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Unidade</th>
				<th>Nome</th>
               	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadorfamilia="0";
                 $result2F = "select CD_FAMLIA,DS_FAMILIA FROM FAMILIAS WHERE  CD_FAMLIA IN (SELECT a.cd_famlia FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area  and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO)) ORDER  by DS_FAMILIA ASC";
				 $result3F = $conn->Execute($result2F);
                 while ( !$result3F->EOF) {
				 $contadorfamilia=$contadorfamilia+1;
                 ?>
                    <tr>

					<td><?echo $result3F->fields["0"];?></td>
					<td><?echo $result3F->fields["1"];?></td>
					<td ><input type="checkbox" name="lista2[]"   value="<?echo $result3F->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3F->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="3">
			<input type="hidden" name="contadorfamilia" value="<?echo $contadorfamilia;?>">
<?}

if ($etapa=="3")
{
?>

		<center>
		Etapa-3 Modelos
		</br>
		<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas</span>
		 <div style="height:70%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Modelo</th>
			   	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadormodelo="0";
                 $result2Fm = "select DISTINCT  a.MODELO MODELO FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro  and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND a.MODELO IS NOT NULL
                 ORDER  by a.MODELO  ASC";
				 $result3Fm = $conn->Execute($result2Fm);
                 while ( !$result3Fm->EOF) {
				 $contadormodelo=$contadormodelo+1;
                 ?>
                    <tr>

					<td><?echo $result3Fm->fields["0"];?></td>
					<td ><input type="checkbox" name="lista3[]"   value="<?echo $result3Fm->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3Fm->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="4">
			<input type="hidden" name="contadormodelo" value="<?echo $contadormodelo;?>">
<?}

if ($etapa=="4")
{
?>

		<center>
		Etapa-4  Fabricante
		</br>
		<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas</span>
		 <div style="height:70%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Fabricante</th>
			   	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadorfabricante="0";
                 $result2Fmf = "select DISTINCT  a.FABRICANTE FABRICANTE FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro  and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND
                 a.modelo in (SELECT CD_MODELO FROM AUX_FILTRO)
                 AND a.FABRICANTE IS NOT NULL
                 ORDER  by a.FABRICANTE  ASC";
				 $result3Fmf = $conn->Execute($result2Fmf);
                 while ( !$result3Fmf->EOF) {
				 $contadorfabricante=$contadorfabricante+1;
                 ?>
                    <tr>

					<td><?echo $result3Fmf->fields["0"];?></td>
					<td ><input type="checkbox" name="lista4[]"   value="<?echo $result3Fmf->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3Fmf->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="5">
			<input type="hidden" name="contadorfabricante" value="<?echo $contadorfabricante;?>">
<?}

if ($etapa=="5")
{
?>

		<center>
		Etapa-4  Ano de Fabricação
		</br>
		<input type=checkbox name="selall" onClick="CheckAll2()">
        <span id="checar">Marcar todas</span>
		 <div style="height:70%;width:90%;overflow:scroll" > 
		  <center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
			<tr>

				<th>Ano</th>
			   	<th>Selecionar</th>
             </tr>
<?
                 
                 $contadorano="0";
                 $result2Fmfa = "select DISTINCT  a.ANO_FABRICACAO ANO FROM
                 MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                 WHERE a.CD_CENTRO=b.cd_centro  and
                 b.cd_secao=c.cd_secao and
                 c.cd_area=d.cd_area and
                 d.cd_fabrica IN (SELECT CD_FABRICA FROM AUX_FILTRO) AND
                 a.cd_famlia in (SELECT CD_FAMILIA FROM AUX_FILTRO) AND
                 a.modelo in (SELECT CD_MODELO FROM AUX_FILTRO) and
				 a.fabricante in (SELECT fabricante FROM AUX_FILTRO) 
				 AND a.ANO_FABRICACAO IS NOT NULL
                 ORDER  by a.ANO_FABRICACAO  desc";
				 $result3Fmfa = $conn->Execute($result2Fmfa);
                 while ( !$result3Fmfa->EOF) {
				 $contadorano=$contadorano+1;
                 ?>
                    <tr>

					<td><?echo $result3Fmfa->fields["0"];?></td>
					<td ><input type="checkbox" name="lista5[]"   value="<?echo $result3Fmfa->fields["0"];?>"></td>
                    </tr>
                    
               <?
               $result3Fmfa->MoveNext();
               }?>
			   
              
            </table>
			<input type="hidden" name="etapa" value="6">
			<input type="hidden" name="contadorano" value="<?echo $contadorano;?>">
			
			
			
<?}?>



 </div>
				
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="dispminima" value="0">
       		
		
        
		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
</div>
		
<?
}//fianl quando a etapa é menor que 6

}//FINAL QUANDO PASSA PARAMETROS E CALCULA AUX FILTRO?>

<?
echo "disp:$dispminima";

if (!IsSet($dispminima) or ($dispminima >"0"))
{
?>

</br></br>

<table  border=0
 style='background:white;' width="90%" align="center" class="tabela1">
<tr>
<th>Familia/Unidade</th>
<?
$suni="select distinct cd_fabrica FABRICA FROM AUX_FILTRO  where cd_fabrica is not null order by CD_FABRICA asc";
$smpegaaux2achaunidade= $conn->Execute($suni);
  while ( !$smpegaaux2achaunidade->EOF)
  {
  ?>
      <th><?echo $smpegaaux2achaunidade->fields["0"];?></th><?

  $smpegaaux2achaunidade->MoveNext();
  }
  ?>
  <th>Total</font></th>
</tr>

<?
  $s21fal = "select distinct CD_FAMILIA FROM AUX_FILTRO WHERE CD_FAMILIA IS NOT NULL  order by CD_FAMILIA  asc";
  $s21fal2= $conn->Execute($s21fal);
  while ( !$s21fal2->EOF)
  {
  $codigofamilia=$s21fal2->fields["0"]; 
      ?>
      <tr>
      <td><?echo $s21fal2->fields["0"];?></td>
      <?
	  $acha2fa= "select distinct cd_fabrica FABRICA FROM AUX_FILTRO
                         where cd_fabrica is not null order by CD_FABRICA asc";
                         $acha2fa6= $conn->Execute($acha2fa);
                         while ( !$acha2fa6->EOF)
                        {
                         $codigofabrica5=$acha2fa6->fields["0"];

                         $quantoss17="select count(*)  CONTADOR
                         from MAQUINAS a,CENTRO_TRABALHOS b,SECAOS c,AREAS d
                         WHERE a.CD_CENTRO=b.cd_centro  and
                         b.cd_secao=c.cd_secao and
                         c.cd_area=d.cd_area  and
                         d.cd_fabrica='$codigofabrica5' and
                         a.cd_famlia='$codigofamilia' and
						 a.modelo in (SELECT CD_MODELO FROM AUX_FILTRO where cd_modelo is not null) and
						 a.FABRICANTE in (SELECT FABRICANTE FROM AUX_FILTRO where FABRICANTE is not null) and
						 a.ano_fabricacao in (SELECT ANO_FABRICACAO FROM AUX_FILTRO where ano_fabricacao is not null)";
						 echo "$quantoss17</br>";
                         $acha2fa68= $conn->Execute($quantoss17);
						 $acha55=$acha2fa68->fields["0"];


                         if ($acha55 >"0"){
                         ?>
						 <td><a href="#" onClick="window.open('consultamaquina3.php?fabrica=<?echo "$codigofabrica5";?>&tipoconsulta=familia&codigofamilia=<?echo "$codigofamilia";?>&navegando=sim&modelo=<?echo "$modeloteste";?>&baseoracle=<?echo "$baseoracle";?>','tela04','toolbar=no,location=no,directories=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=900,height=550')">
                           <h1 style='font-size: 11px;color: blue;text-align:left;bold: Negrito text-decoration: none'>
                           <? echo "$acha55";?></a></td>
                         <?
                         }
                         else
                         {
                         ?>
                         <td>-</td>
	                     <?
						 }
						 $acha2fa6->MoveNext();
                         }//fian ldas fabriacas
	  ?>
	  
	  </tr>
  <?
  
  
  
  
  
  
  $s21fal2->MoveNext();
  }//final analise da familia
  ?>
 </table>

 
 <?}//final tela mostra o resultado
 ?>
</form>
</html>

