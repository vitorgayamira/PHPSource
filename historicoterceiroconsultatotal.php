<!--tipo do documento renderizado pelo navegado-->
<!DOCTYPE HTML>
<!--tipo da linguagem do documento-->
<html lang="pt-br">
<head>

<script type="text/javascript">
var c=document.getElementById("UgCanvas");
var ctx=c.getContext("2d");
ctx.fillStyle="#7F7F00";
ctx.fillRect(0,0,150,100);
</script>

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



</style>

<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="somenteconsultabaixa.php";
document.forms.nome_formulario.submit();
}
</script>



</HEAD>

<form action="historicoterceiroconsultatotal.php"  name="nome_formulario" id="nome_formulario" method="POST" >


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
$bday1=$_GET['bday1'];
$bday2=$_GET['bday2'];

$datainicialmostra=$_GET['datainicialmostra'];
$datafinalmostra=$_GET['datafinalmostra'];


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
            $bday1=$_POST['bday1'];
            $bday2=$_POST['bday2'];
            $areabusca=$_POST['areabusca'];
            $centrobusca=$_POST['centrobusca'];
            $componentebusca=$_POST['componentebusca'];
            $familiabusca=$_POST['familiabusca'];
            $maquinabusca=$_POST['maquinabusca'];
            $fornecedorbusca=$_POST['fornecedorbusca'];
            $tipobusca=$_POST['tipobusca'];
            $grupoordens=$_POST['grupoordens'];




}




require("configuraoracle.php");
require("estilo2_sitenovo.css");
require("estilo2.css");

require("configuramysql.php");

$sgrava1= OCIParse($ora_conexao, "delete from AUX_GRAFICO_TERCEIRO2");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);


//require("configuraoracle.php");
if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($dia)){
$dia=date('d');
}








if (!IsSet($bday2)){
$datafinalmostra=$ano."-".$mes."-".$dia;

}
else
{

 $datafinalmostra=$bday2;
}



if (!IsSet($bday1)){
$datainicial = strtotime("-30 days");
$dia1inicial=date('d', $datainicial);
$mesinicial=date('m', $datainicial);
$anoinicial=date('Y', $datainicial);
$datainicialmostra=$anoinicial."-".$mesinicial."-".$dia1inicial;
}
else
{
  $datainicialmostra=$bday1;
}


                 $result28F = "select EMPRESA FROM  FORNECEDOR_SADEGE WHERE COD_FORNECEDOR='$fornecedorbusca'";
                 $result38F = @OCIParse($ora_conexao, $result28F);
				 @OCIExecute($result38F, OCI_DEFAULT);
				 while (OCIFetchInto($result38F,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $fornecedormostra6=ociresult($result38F, "EMPRESA") ;
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




<center><font style='font-size: 29px;color: red;text-align:left;bold: Negrito' >Serviços Terceiros Custo Total</font></center></br>

<div  style="display: block;" id="mostraconteudogeral">



<?
if(empty($fabricapesquisa)){ }else{echo "Unidade:$fabricapesquisa|";}
if(empty($grupoordens) or ($grupoordens=="T") ){ }else{
              if ($grupoordens=="P"){
                $grupomostra="Planejadas";
              }
              if ($grupoordens=="C"){
               $grupomostra="Não Planejadas";
              }


             echo "Grupo:$grupomostra|";
             }

if(empty($areabusca)){ }else{echo "Área:$areabusca|";}
if(empty($centrobusca)){ }else{echo "Centro:$centrobusca|";}
if(empty($familiabusca)){ }else{echo "Família:$familiabusca|";}
if(empty($maquinabusca)){ }else{echo "Máquina:$maquinabusca|";}
if(empty($componentebusca)){ }else{echo "Componente:$componentebusca|";}
if(empty($fornecedorbusca)){ }else{echo "Fornecedor:$fornecedormostra6|";}
if(empty($tipobusca)){ }else{echo "Tipo:$tipobusca";}


?>
</br>

Data Inicial:<input type="date" name="bday1" value="<?echo $datainicialmostra;?>" onchange="this.form.submit();" id="q" required> ate
<input type="date" name="bday2" value="<?echo $datafinalmostra;?>" onchange="this.form.submit();" id="q" required>


<a href="historicoterceiroconsultatotal.php?navegando=sim&escolha=3&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&banco=<?echo $banco;?>&datainicialmostra=<?echo $datainicialmostra;?>&datafinalmostra=<?echo $datafinalmostra;?>&bday1=<?echo $datainicialmostra;?>&bday2=<?echo $datafinalmostra;?>">
<IMG src="pesquisarnovocva.png" width="42" height="38" ></a>



<a href="historicoterceiroconsultatotal.php?navegando=sim&escolha=4&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&banco=<?echo $banco;?>&datainicialmostra=<?echo $datainicialmostra;?>&datafinalmostra=<?echo $datafinalmostra;?>&bday1=<?echo $datainicialmostra;?>&bday2=<?echo $datafinalmostra;?>">
<IMG src="graficonovo.png" width="42" height="38" ></a>



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
		
		



<?
/*
echo "Fabrica:$fabricapesquisa-";
echo "Area:$areabusca-";
echo "Centro:$centrobusca-";
echo "Familia:$familiabusca-";
echo "Maquina:$maquinabusca-";
echo "componente:$componentebusca-";
echo "Fornecedor:$fornecedorbusca-";
echo "Tipo:$tipobusca</br>";
*/



                        $datapesquisa1ano=substr($datainicialmostra,0,4);
                        $datapesquisa1mes=substr($datainicialmostra,5,2);
                        $datapesquisa1dia=substr($datainicialmostra,8,2);
                        $datapesquisa1=$datapesquisa1dia."/".$datapesquisa1mes."/".$datapesquisa1ano;
                        
                        
                        $datapesquisa2ano=substr($datafinalmostra,0,4);
                        $datapesquisa2mes=substr($datafinalmostra,5,2);
                        $datapesquisa2dia=substr($datafinalmostra,8,2);
                        $datapesquisa2=$datapesquisa2dia."/".$datapesquisa2mes."/".$datapesquisa2ano;

if (!IsSet($grupoordens)){
$grupoordens="T";
$grupomostra="Todas";
}
                        

   IF ($grupoordens=="T"){
   
                       $s = OCIParse($ora_conexao, "
                       SELECT  distinct FS.EMPRESA RAZAO,
                       STI.VL_UNITARIO VALOR,STI.QUANTIDADE QUANT
      FROM SERV_TERC_BAIXA STB, SERV_TERC_ITENS STI, SERV_TERC_PEDIDO STP, ORDEM_COMP OC,
           FABRICAS FA, AREAS AR, SECAOS SE, CENTRO_TRABALHOS CT, COMPONENTE_AUXILIAR CA,
           MAQUINAS MA, FORNECEDOR_SADEGE FS, COMP_FUNC CF
     WHERE STB.NR_ORDEM = OC.NUMERO_ORDEM
       AND STI.NR_ORDEM = STB.NR_ORDEM
       AND STB.NR_PEDIDO = STI.NR_PEDIDO
       AND STI.NR_PEDIDO = STP.NR_PEDIDO
       AND OC.NUMERO_ORDEM = CF.NUMERO_ORDEM
       AND TRUNC(CF.DATA_BAIXA_INDIVIDUAL) >= '$datapesquisa1'
       AND TRUNC(CF.DATA_BAIXA_INDIVIDUAL) <= '$datapesquisa2'
       AND OC.CD_TIPO LIKE '%$tipobusca%'
       AND STP.COD_FORNECEDOR = FS.COD_FORNECEDOR
       AND STP.CGC = FS.CGC
       AND FS.COD_FORNECEDOR LIKE '%$fornecedorbusca%'
       AND OC.NUMERO_ORDEM LIKE '%$ordem%'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_COMPO LIKE '%$componentebusca%'
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_MAQUINA LIKE '%$maquinabusca%'
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_AREA LIKE  '%$areabusca%'
       AND AR.CD_FABRICA = FA.CD_FABRICA
       AND FA.CD_FABRICA LIKE '%$fabricapesquisa%'
       union
       SELECT  distinct FS.EMPRESA RAZAO,STI.VL_UNITARIO VALOR,STI.QUANTIDADE QUANT
      FROM SERV_TERC_ITENS STI, SERV_TERC_PEDIDO STP, EMER_COMP EC, FABRICAS FA,
           AREAS AR, SECAOS SE, CENTRO_TRABALHOS CT, COMPONENTE_AUXILIAR CA,
           MAQUINAS MA, FORNECEDOR_SADEGE FS, COMP_FUNC_EMER CFE
     WHERE STI.NR_ORDEM = EC.NUMERO
       AND EC.NUMERO = CFE.NUMERO
       AND TRUNC(CFE.DATA_BAIXA_INDIVIDUAL) >='$datapesquisa1'
       AND TRUNC(CFE.DATA_BAIXA_INDIVIDUAL) <='$datapesquisa2'
       AND EC.CD_TIPO LIKE '%$tipobusca%'
       AND STI.NR_PEDIDO = STP.NR_PEDIDO
       AND STP.COD_FORNECEDOR = FS.COD_FORNECEDOR
       AND STP.CGC = FS.CGC
       AND FS.COD_FORNECEDOR  LIKE '%$fornecedorbusca%'
       AND EC.NUMERO LIKE  '%$ordem%'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_COMPO LIKE '%$componentebusca%'
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_MAQUINA LIKE '%$maquinabusca%'
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_AREA LIKE  '%$areabusca%'
       AND AR.CD_FABRICA = FA.CD_FABRICA
       AND FA.CD_FABRICA LIKE '%$fabricapesquisa%'
       ");
       



       }
       
 IF ($grupoordens=="C"){
 
                       $s = OCIParse($ora_conexao, "SELECT distinct FS.EMPRESA RAZAO,
                        STI.VL_UNITARIO VALOR,STI.QUANTIDADE QUANT
      FROM SERV_TERC_ITENS STI, SERV_TERC_PEDIDO STP, EMER_COMP EC, FABRICAS FA,
           AREAS AR, SECAOS SE, CENTRO_TRABALHOS CT, COMPONENTE_AUXILIAR CA,
           MAQUINAS MA, FORNECEDOR_SADEGE FS, COMP_FUNC_EMER CFE
     WHERE STI.NR_ORDEM = EC.NUMERO
       AND EC.NUMERO = CFE.NUMERO
       AND TRUNC(CFE.DATA_BAIXA_INDIVIDUAL) >='$datapesquisa1'
       AND TRUNC(CFE.DATA_BAIXA_INDIVIDUAL) <='$datapesquisa2'
       AND EC.CD_TIPO LIKE '%$tipobusca%'
       AND STI.NR_PEDIDO = STP.NR_PEDIDO
       AND STP.COD_FORNECEDOR = FS.COD_FORNECEDOR
       AND STP.CGC = FS.CGC
       AND FS.COD_FORNECEDOR  LIKE '%$fornecedorbusca%'
       AND EC.NUMERO LIKE  '%$ordem%'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_COMPO LIKE '%$componentebusca%'
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_MAQUINA LIKE '%$maquinabusca%'
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_AREA LIKE  '%$areabusca%'
       AND AR.CD_FABRICA = FA.CD_FABRICA
       AND FA.CD_FABRICA LIKE '%$fabricapesquisa%'
                                      ");



 }
 
 IF ($grupoordens=="P"){
 
 $s = OCIParse($ora_conexao, "
                       SELECT distinct FS.EMPRESA RAZAO,
                       STI.VL_UNITARIO VALOR,STI.QUANTIDADE QUANT
      FROM SERV_TERC_BAIXA STB, SERV_TERC_ITENS STI, SERV_TERC_PEDIDO STP, ORDEM_COMP OC,
           FABRICAS FA, AREAS AR, SECAOS SE, CENTRO_TRABALHOS CT, COMPONENTE_AUXILIAR CA,
           MAQUINAS MA, FORNECEDOR_SADEGE FS, COMP_FUNC CF
     WHERE STB.NR_ORDEM = OC.NUMERO_ORDEM
       AND STI.NR_ORDEM = STB.NR_ORDEM
       AND STB.NR_PEDIDO = STI.NR_PEDIDO
       AND STI.NR_PEDIDO = STP.NR_PEDIDO
       AND OC.NUMERO_ORDEM = CF.NUMERO_ORDEM
       AND TRUNC(CF.DATA_BAIXA_INDIVIDUAL) >= '$datapesquisa1'
       AND TRUNC(CF.DATA_BAIXA_INDIVIDUAL) <= '$datapesquisa2'
       AND OC.CD_TIPO LIKE '%$tipobusca%'
       AND STP.COD_FORNECEDOR = FS.COD_FORNECEDOR
       AND STP.CGC = FS.CGC
       AND FS.COD_FORNECEDOR LIKE '%$fornecedorbusca%'
       AND OC.NUMERO_ORDEM LIKE '%$ordem%'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_COMPO LIKE '%$componentebusca%'
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_MAQUINA LIKE '%$maquinabusca%'
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_AREA LIKE  '%$areabusca%'
       AND AR.CD_FABRICA = FA.CD_FABRICA
       AND FA.CD_FABRICA LIKE '%$fabricapesquisa%'
       ");
 


 }


    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
    

    $quant2=ociresult($s, "QUANT");
    $valor2=ociresult($s, "VALOR");
    $total=$quant2*$valor2;

    $razao3=ociresult($s, "RAZAO");

       

                                  $sgrava166= OCIParse($ora_conexao, "INSERT INTO AUX_GRAFICO_TERCEIRO2(DS_EMPRESA,VL_CUSTO )
                                  VALUES ('$razao3',$total)");
                                  OCIExecute($sgrava166, OCI_DEFAULT);
                                  oci_commit($ora_conexao);


      }


  

                                $achapart5= OCIParse($ora_conexao, "SELECT SUM(VL_CUSTO) VALOR  FROM AUX_GRAFICO_TERCEIRO2");
                                OCIExecute($achapart5, OCI_DEFAULT);
                                While (OCIFetch($achapart5)) {
                                   $totalcusto7=ociresult($achapart5, "VALOR") ;


                                }

                                $achapart6= OCIParse($ora_conexao, "SELECT DS_EMPRESA,SUM(VL_CUSTO) VALOR
                                FROM AUX_GRAFICO_TERCEIRO2 GROUP BY DS_EMPRESA");
                                OCIExecute($achapart6, OCI_DEFAULT);
                                While (OCIFetch($achapart6))
                                {
                                  $custoindi=ociresult($achapart6, "VALOR") ;
                                  $empresaindi=ociresult($achapart6, "DS_EMPRESA") ;


                                  
                                  $achoupart66=($custoindi/$totalcusto7)*100;
                                  
                                  $achoupart66g=round($achoupart66, 1);


                                  $sgrava166= OCIParse($ora_conexao, "update AUX_GRAFICO_TERCEIRO2
                                  set vl_participacao=$achoupart66g
                                  where  ds_empresa='$empresaindi'
                                  ");

                                  OCIExecute($sgrava166, OCI_DEFAULT);
                                  oci_commit($ora_conexao);


                                }



  //MOSTRA GRID
  ?>
  <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="50%">
<tr>


    <th>Empresa Terceira</th>
    <th align=right>Total(R$)</th>
    <th align=right>(%)</th>

    </tr>
    <?
  $somaparcialcusto="0";
  
  $achapart6GRID= OCIParse($ora_conexao, "SELECT DS_EMPRESA,SUM(VL_CUSTO) VALOR
                                FROM AUX_GRAFICO_TERCEIRO2 GROUP BY DS_EMPRESA");
                                OCIExecute($achapart6GRID, OCI_DEFAULT);
    While (OCIFetch($achapart6GRID)) {

       $total=ociresult($achapart6GRID, "VALOR");
       $empresapega=ociresult($achapart6GRID, "DS_EMPRESA");

      ?>
      <tr class="difr">
       <td><? echo ociresult($achapart6GRID, "DS_EMPRESA");?></td>
       <td align=right><? $valormostraTOTA77=number_format($total, 2, ',', '.');


       echo $valormostraTOTA77;?> </td>
       <?
          $achapart11= OCIParse($ora_conexao, "SELECT distinct ROUND(vl_participacao,1) VALOR FROM
          AUX_GRAFICO_TERCEIRO2 WHERE DS_EMPRESA='$empresapega'");
          OCIExecute($achapart11, OCI_DEFAULT);
          While (OCIFetch($achapart11)) {
             $partcipacaomostra441=ociresult($achapart11, "VALOR");


             ?>
             <td  align=right><?echo $partcipacaomostra441;?></td>
          <?
          }


       $somaparcialcusto=$somaparcialcusto+$total;
      }
      ?>
      </tr>
      
      <tr>
       <td><h1 style='font-size: 12px;color:black;text-align:left;bold: Negrito text-decoration: none'>Total</td>
       <td  align=right><h1 style='font-size: 12px;color:black;'><?
               $valormostra=number_format($somaparcialcusto, 2, ',', '.');
               echo $valormostra;?> </td>
        
        <td></td>
      </tr>
      

  </table>



</div>

 <?
if ($escolha=="3" ){


?>



<div  style="display: block;" id="mostraterceiros">

          <table width="99%" >

          <tr>
          <td><titulo>Busca Avançada</titulo></td>

          <td align=right>



           <a href="historicoterceiroconsultatotal.php?navegando=sim&escolha=1&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&banco=<?echo $banco;?>&bday1=<?echo $datainicialmostra;?>&bday2=<?echo $datafinalmostra;?>">
           <img src="sairtela.png" width="22" height="22"></a>

          </td>


          </tr>


          </table>



          </br></br>

          <table width="100%">

          <tr>
          <td>Unidade:</td>
          <td><select name="fabricapesquisa">
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

          </td>
          </tr>

          <tr>
          <td>Area:</td>
          <td>

                 <select   name="areabusca" value="<?echo $areabusca;?>" >
                 <option value="<?echo $areabusca;?>"><?echo $areabusca;?></option>
                 <?
				 $result2 = "SELECT CD_AREA, DS_AREA From Areas
                 WHERE cd_fabrica LIKE '%$fabricapesquisa%' ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_AREA"]}\">{$row["DS_AREA"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Centro Trabalho:</td>
          <td>

                 <select   name="centrobusca" value="<?echo $centrobusca;?>" >
                 <option value="<?echo $centrobusca;?>"><?echo $centrobusca;?></option>
                 <?
				 $result2 = "Select CD_CENTRO, DS_CENTRO
                 From CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                 Where CT.CD_SECAO = SE.CD_SECAO
                 AND SE.CD_AREA = AR.CD_AREA
                 AND AR.cd_AREA like '%$areabusca%'
                 AND AR.CD_FABRICA = FA.CD_FABRICA
                 AND FA.cd_fabrica LIKE '%$fabricapesquisa%'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_CENTRO"]}\">{$row["DS_CENTRO"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Familia:</td>
          <td>

                 <select   name="familiabusca" value="<?echo $familiabusca;?>" >
                 <option value="<?echo $familiabusca;?>"><?echo $familiabusca;?></option>
                 <?
				 $result2 = "Select CD_FAMLIA,DS_FAMILIA  From familias";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FAMLIA"]}\">{$row["DS_FAMILIA"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Máquina:</td>
          <td>

                 <select   name="maquinabusca" value="<?echo $maquinabusca;?>" >
                 <option value="<?echo $maquinabusca;?>"><?echo $maquinabusca;?></option>
                 <?
				 $result2 = "SELECT DISTINCT ca.cd_compo COMPO, ca.ds_compo DESCRICAO
                 FROM componente_auxiliar ca, maquinas ma, centro_trabalhos ct,
                 secaos se, areas ar, fabricas fa
                 WHERE ca.flag = 'Q'
                 AND ca.cd_maquina = ma.cd_maquina
                 AND ma.cd_centro = ct.cd_centro
                 AND ct.cd_secao = se.cd_secao
                 AND se.cd_area = ar.cd_area
                 AND ar.cd_area LIKE '%$areabusca%'
                 AND ar.cd_fabrica = fa.cd_fabrica
                 AND fa.cd_fabrica LIKE '%$fabricapesquisa%'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COMPO"]}\">{$row["DESCRICAO"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Componente:</td>
          <td>

                 <select   name="componentebusca" value="<?echo $componentebusca;?>" >
                 <option value="<?echo $componentebusca;?>"><?echo $componentebusca;?></option>
                 <?
				 $result2 = "SELECT DISTINCT ca.cd_compo COMPO, ca.ds_compo DESCRICAO
                 FROM componente_auxiliar ca, maquinas ma, centro_trabalhos ct,
                 secaos se, areas ar, fabricas fa
                 WHERE ca.flag <> 'Q'
                 AND ca.cd_maquina = ma.cd_maquina
                 AND ma.cd_centro = ct.cd_centro
                 AND ct.cd_secao = se.cd_secao
                 AND se.cd_area = ar.cd_area
                 AND ar.cd_area LIKE '%$areabusca%'
                 AND ar.cd_fabrica = fa.cd_fabrica
                 AND fa.cd_fabrica LIKE '%$fabricapesquisa%'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COMPO"]}\">{$row["DESCRICAO"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Fornecedor:</td>
          <td>

                 <select   name="fornecedorbusca" value="<?echo $fornecedorbusca;?>" >
                 <option value="<?echo $fornecedorbusca;?>"><?echo $fornecedorbusca;?></option>
                 <?
				 $result2 = "SELECT COD_FORNECEDOR, EMPRESA, CGC FROM FORNECEDOR_SADEGE";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["COD_FORNECEDOR"]}\">{$row["EMPRESA"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Tipo de Manutenção:</td>
          <td>

                 <select   name="tipobusca" value="<?echo $tipobusca;?>" >
                 <option value="<?echo $tipobusca;?>"><?echo $tipobusca;?></option>
                 <?
				 $result2 = "SELECT CD_TIPO, TIPO_SERVICO FROM TIPO_SERVS";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_TIPO"]}\">{$row["TIPO_SERVICO"]}</option>";
                 }
				 ?>
                 </select>

          </td>
          </tr>
          
          <tr>
          <td>Grupo de Ordens:</td>
          <td>
          
          <select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="grupoordens" >
          <option value="T">Todas</option>
          <option value="C">Não Planejadas</option>
          <option value="P">Planejadas</option>

 	      </select>
          </td>
          </tr>

          



          </table>
          



          <input type="hidden" name="status" value="nao">
          <input type="hidden" name="escolha" value="1">
		  <input type="hidden" name="continuarmesmatela" value="sim">
     	  <input type="hidden" name="banco" value="<?echo $banco;?>">
     	  <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
     	  
     	  <a href="#" onclick="document.forms[0].submit();return false;">
           <IMG src="resultado.png" width="92" height="38" ></a></a>
     	  



</div>

<?

}


if ($escolha=="4" ){
?>
 <div  style="display: block;" id="mostraterceirosgrafico">
 
 <table width="99%" >

          <tr>
          <td><titulo>Custo Total Terceiros(%)</titulo></td>

          <td align=right>


           <a href="historicoterceiroconsultatotal.php?navegando=sim&escolha=1&statusnovapessoa=nao&acaoparametro=selecionar&iniciotela=sim&banco=<?echo $banco;?>&bday1=<?echo $datainicialmostra;?>&bday2=<?echo $datafinalmostra;?>">
           <img src="sairtela.png" width="22" height="22"></a>

          </td>


          </tr>


          </table>
 
 
 <?require("historicoterceirograftotal.php");?>
 </div>

<?
}

?>




</form>
</html>

