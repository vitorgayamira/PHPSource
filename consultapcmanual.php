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
$programa="consultapcmanual.php";
$titulo="Plano Anual";

?>


<form action="consultapcmanual.php"  name="nome_formulario" id="nome_formulario" method="POST" >
<?require("areasuperior2.php");
require("carregamenumilenionovo2.php");?>

<a href="consultapcmanual.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>
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
$grupoordens=$_GET['grupoordens'];
$fabricaescolha=$_GET['fabricaescolha'];
$equipamentoescolha=$_GET['equipamentoescolha'];
$escolheano=$_GET['escolheano'];
$familiaescolha=$_GET['familiaescolha'];
$atividadegrava=$_GET['atividadegrava'];
$compo1=$_GET['compo1'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$ordenaatual=$_GET['ordenaatual'];
$atividadeescolha=$_GET['atividadeescolha'];
$componenteescolha=$_GET['componenteescolha'];

}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$turnopesquisa=$_POST['turnopesquisa'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$tipodemanda1=$_POST['tipodemanda1'];
	$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
	$mercado55=$_POST['mercado55'];
	$tipodemanda1=$_POST['tipodemanda1'];
	$fabricaescolha=$_POST['fabricaescolha'];
	$grupoordens=$_POST['grupoordens'];
    $equipamentoescolha=$_POST['equipamentoescolha'];
    $familiaescolha=$_POST['familiaescolha'];
	
	$atividadeescolha=$_POST['atividadeescolha'];
	$componenteescolha=$_POST['componenteescolha'];
	
}



if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($grupoordens)){
$grupoordens="P";
}

if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}

$ultimomes="12";
$contadoritem=$ultimodia;
$contadoriteminicial="1";

if (!IsSet($escolha))
{

$escolha="pesquisa";
}

if (!IsSet($fabricaescolha))
{

$fabricaescolha="99999";
}





//if (!IsSet($escolha) or ($escolha=="1")){ 

IF ($escolha=="1")
{

?>


<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<titulogeral><? echo "$titulo";?>- Ano:<? echo "$ano";?> Grupo de Ordens: <? echo "$mostraordem";?></titulogeral>
       
	
<div style="height:99%;overflow:scroll" >  
<table  border=0
 style='background:white;' width="96%" align="center" class="tabela1">
 
<tr>
 <th>Equipamentos</th>
 <th></th>
 <th>Unidade</th>
 <th>Atividade</th>
 <th>Metodo</th>
 <th>Int</th>
 
 

 <?
 for ($passa1=$contadoriteminicial;$passa1 <=$ultimomes;$passa1++){
 
      IF ($passa1=="1"){$mostrames="Jan";}
      IF ($passa1=="2"){$mostrames="Fev";}
      IF ($passa1=="3"){$mostrames="Mar";}
      IF ($passa1=="4"){$mostrames="Abr";}
      IF ($passa1=="5"){$mostrames="Mai";}
      IF ($passa1=="6"){$mostrames="Jun";}
      IF ($passa1=="7"){$mostrames="Jul";}
      IF ($passa1=="8"){$mostrames="Ago";}
      IF ($passa1=="9"){$mostrames="Set";}
      IF ($passa1=="10"){$mostrames="Out";}
      IF ($passa1=="11"){$mostrames="Nov";}
      IF ($passa1=="12"){$mostrames="Dez";}
 
 	  ?>
       <th width="5%"><?echo $dia;?></br><?echo $mostrames;?></th>
<?

}//final dos dias
?>
</tr>

<?


$compoanterior="XXX";

if (!IsSet($grupoordens)){
$grupoordens="T";
}

if (strlen($equipamentoescolha) != 0)
{

       $achadiacontador788="SELECT  count(*) CONTADOR  FROM  UNID_MAQ where  cd_maquina LIKE '%$equipamentoescolha%' 
	   and CD_FABRICA like '%$fabricaescolha%'";
       $mostragrid177 = $conn->Execute($achadiacontador788);
       $existeunidadedemaquina=$mostragrid177->fields["CONTADOR"];
}
else
{
  $existeunidadedemaquina="0";
}





if ($existeunidadedemaquina >"0"){


IF ($grupoordens=="T"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,
RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,RC.CD_METODO METODO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
	   and OC.CD_ATIVIDADE like '%$atividadeescolha%'
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       (
       (OC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where  CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (OC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where  CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' ,'1',MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,'-',FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
      CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
      WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha' AND
       (
       (EC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where  CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (EC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where  CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";
}



IF ($grupoordens=="C"){
$achasemana1="SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' INTERVALO2,'1' INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,'-' METODO,FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       (
       (EC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (EC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";





}

IF ($grupoordens=="P"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,
OC.CD_ATIVIDADE,RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO2 INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,RC.CD_METODO METODO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
	   and OC.CD_ATIVIDADE like '%$atividadeescolha%'
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       (
       (OC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (OC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ";

  


}






}//finalquando passou a maquina na pesquisa
else
{


       
IF ($grupoordens=="T"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,
RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,RC.CD_METODO METODO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
	   and OC.CD_ATIVIDADE like '%$atividadeescolha%'
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' ,'1',MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,
       '-',FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
      CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
      WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')  AND
       EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";
}




IF ($grupoordens=="C"){
$achasemana1="SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' INTERVALO2,'1' INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,'-' METODO,FA.CD_FABRICA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE";
   
}

IF ($grupoordens=="P"){

$achasemana1="SELECT DISTINCT OC.CD_COMPONENTE ,
OC.CD_ATIVIDADE,RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO2 INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO,RC.CD_METODO METODO,FA.CD_FABRICA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
	   and OC.CD_ATIVIDADE like '%$atividadeescolha%'
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario') AND
       OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ";




}

//echo "$achasemana1";

}//final quando nao existe unidae de maquina




$mostragrid1 = $conn->Execute($achasemana1);
while ( !$mostragrid1->EOF)
{
                         $compo1=$mostragrid1->fields["CD_COMPONENTE"];
						 $ativi1=$mostragrid1->fields["CD_ATIVIDADE"];
						 $interv=$mostragrid1->fields["CD_ATIVIDADE"];
						 $fabrica1=$mostragrid1->fields["CD_FABRICA"];
						 $intervalo=$mostragrid1->fields["INTERVALO"] ;
                         $dism=$mostragrid1->fields["INTERVALO2"] ;
                         $descricaomaquina=$mostragrid1->fields["MAQUINA"] ;
                         $descricaocomponente=$mostragrid1->fields["DESCRICAOCOMPO"] ;
                         $metodo=$mostragrid1->fields["METODO"] ;
						 
?>
<tr>


<td><? echo $compo1;?></td>
<td><? echo $descricaocomponente;?></td>
<td><? echo $fabrica1;?></td>



<td><a href="consultapcmanual.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>&fabricaescolha=<?ECHO $fabricaescolha;?>">
             <?echo "$ativi1";?></a></td>
             
             <td><? echo $metodo;?></td>

<td><? echo $intervalo;?> <? echo $dism;?></td>
<?






$contadoriteminicial="1";




$contadoritem="12";


$quantosnaoplanejada="0";
$quantosplanejada="0";


for ($passa6=$contadoriteminicial;$passa6 <=$contadoritem;$passa6++){ 


        IF ($passa6 <"10"){$passa1555="0".$passa6;}else{$passa1555=$passa6;}
        

        $ultimo_dia = date("t", mktime(0,0,0,$passa1555,'01',$ano));
       // echo "dias:$ultimo_dia</br>";

        $datapesquisa1="01/".$passa1555."/".$ano;
        $datapesquisa2=$ultimo_dia."/".$passa1555."/".$ano;
        ?>

       <td>
       <?


    
      $achaexistecontador="SELECT  DISTINCT to_char(OC.DATA_PLANE,'dd')  CONTADOR1,to_char(OC.DATA_PLANE,'dd') DATACHEIA,
      TO_CHAR(OC.DATA_PLANE,'hh:mm') DATACHEIAHORA,
      OC.NUMERO_ORDEM ORDEM,OC.STATUS STATUS,1 TIPO	  FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
	   and OC.CD_ATIVIDADE like '%$atividadeescolha%'
        AND TRUNC(OC.DATA_PLANE) >=to_date('$datapesquisa1','dd/mm/YYYY')
       AND TRUNC(OC.DATA_PLANE) <=to_date('$datapesquisa2','dd/mm/YYYY')
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
       UNION
       SELECT  DISTINCT TO_CHAR(EC.DATA_INICIO,'dd')  CONTADOR1, TO_CHAR(EC.DATA_PROGRAMADA,'dd') DATACHEIA,
       TO_CHAR(EC.DATA_PROGRAMADA,'hh:mm') DATACHEIAHORA,
       EC.NUMERO ORDEM,
       EC.STATUS STATUS,2 TIPO  FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >=to_date('$datapesquisa1','dd/mm/YYYY')
       AND TRUNC(EC.DATA_INICIO) <=to_date('$datapesquisa2','dd/mm/YYYY')
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'";
	   
	   
	   
	   $mostragrid177 = $conn->Execute($achaexistecontador);
       while ( !$mostragrid177->EOF)
       {
                         $quantos1=$mostragrid177->fields["CONTADOR1"];
		                 $dataprogramada=$mostragrid177->fields["DATACHEIA"] ;
                         $dataprogramadahora=$mostragrid177->fields["DATACHEIAHORA"] ;
                         $ordem55=$mostragrid177->fields["ORDEM"] ;
		                 $diaquestao=$quantos1."/".$passa1555."/".$ano;
                         $statusbaixa=$mostragrid177->fields["STATUS"] ;
						 $tipoordem=$mostragrid177->fields["TIPO"] ;
						


                          if ($statusbaixa =="B")
						  {
                             $mostracor="Blue";//fechada ordem
                          }
                          else
                          {
                              $diahoje=date('d/m/Y');
        
                              IF ($tipoordem=="1"){
							  $achadiacontador788="SELECT  count(*) CONTADOR
                              FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
                              CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                              WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
                              AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
							  and OC.CD_ATIVIDADE like '%$atividadeescolha%'
                              AND TRUNC(OC.DATA_PLANE) =to_date('$diaquestao','dd/mm/YYYY') 
                              and TRUNC(OC.DATA_PLANE) >=to_date('$diahoje','dd/mm/YYYY')
                              AND OC.CD_COMPONENTE = CA.CD_COMPO
                              AND CA.CD_MAQUINA = MA.CD_MAQUINA
                              AND MA.CD_FAMLIA = F.CD_FAMLIA
                              AND MA.CD_CENTRO = CT.CD_CENTRO
                              AND CT.CD_SECAO = SE.CD_SECAO
                              AND SE.CD_AREA = AR.CD_AREA
                              AND AR.CD_FABRICA = FA.CD_FABRICA AND
                              OC.CD_COMPONENTE='$compo1' AND
                              OC.CD_ATIVIDADE='$ativi1' AND
                              FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
							                     ";
												 
							  
                              $mostragrid1779 = $conn->Execute($achadiacontador788);
                              $quantosplanejada=$mostragrid1779->fields["CONTADOR"];
							   
							  
							  }
							  IF ($tipoordem=="2"){
        
                             $achadiacontador8887="SELECT  count(*) CONTADOR
                             FROM  EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
                             CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                             WHERE TRUNC(EC.DATA_INICIO) =to_date('$diaquestao','dd/mm/YYYY') 
                             and TRUNC(EC.DATA_INICIO) >=to_date('$diahoje','dd/mm/YYYY')
                             AND EC.CD_COMPONENTE = CA.CD_COMPO
                             AND CA.CD_MAQUINA = MA.CD_MAQUINA
                             AND MA.CD_FAMLIA = F.CD_FAMLIA
                             AND MA.CD_CENTRO = CT.CD_CENTRO
                             AND CT.CD_SECAO = SE.CD_SECAO
                             AND SE.CD_AREA = AR.CD_AREA
                             AND AR.CD_FABRICA = FA.CD_FABRICA AND
                             FA.CD_FABRICA in (select cd_unidade from AUX_USUARIO_UNIDADE where cd_usuario='$edusuario')
                             AND
                             EC.CD_COMPONENTE='$compo1' AND
                             EC.CD_ATIVIDADE='$ativi1'";
							
                             $mostragrid177887 = $conn->Execute($achadiacontador8887);
                             $quantosnaoplanejada=$mostragrid177887->fields["CONTADOR"];
							  }

           if (($quantosplanejada >"0") or ($quantosnaoplanejada >"0")){
                $mostracor="green";
           }
           else
           {
           $mostracor="red";
           }


		 }	//final das ordens em aberto			 
        ?>
         <FONT style='font-size: 10px;color:<? echo "$mostracor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$dataprogramada";?></FONT>
        <?
        $mostragrid177->MoveNext();
        }
		
        ?></td><?

}//final do for

?>

</tr>

<?

$mostragrid1->MoveNext();
}
?>
</table>
</div>
<?
}//FINAL DA PRIMEIRA TELA




if ($escolha=="verservico"){
?>
<div  style="display: block;" id="telamostraatividade">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1&semanapegou=<?echo $semanapegou;?>&fabricaescolha=<?echo $fabricaescolha;?>">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>

<?

$mostraservicdd="select  ds_atividade from atividades where cd_atividade='$atividadegrava'";
$mostraservic2mostradescr5= $conn->Execute($mostraservicdd);
$descricaoatividade=$mostraservic2mostradescr5->fields["0"];

$pegaintervalo="select distinct b.cd_intervalo,b.intervalo INTERVALO 
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_servico=e.cd_servico";
$pegaintervalo2= $conn->Execute($pegaintervalo);
$mostrauni=$pegaintervalo2->fields["0"];
$intervalo75=$pegaintervalo2->fields["INTERVALO"];

      if ($mostrauni=="D"){$mostrauni="Dias";}
      if ($mostrauni=="H"){$mostrauni="Horas";}
      $intervalomostra=$intervalo75."-".$mostrauni;


?>
Ordem Serviço:<a href="baixamanutencao_versao5.php?escolha=maodeobra&numeroordempesquisa=<? echo $listaordemselecionada;?>&navegando=sim&fabricapesquisa=<?ECHO $fabricapesquisa;?>" style="text-decoration:none"><? echo $listaordemselecionada;?></a>

<?      

echo "Atividade:$atividadegrava-$descricaoatividade-Intervalo:$intervalomostra";

$mostraservic="select  distinct a.ds_atividade ATIVIDADE,e.ds_servico SERVICO2,
b.cd_intervalo UNIDADEINTERVALO,b.intervalo INTERVALO,d.cd_servico SERVICO
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_servico=e.cd_servico";

//echo "</br>$mostraservic";
?>
 </br></br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="100%">

    <tr>

    <th>Codigo</th>
    <th>Serviço</th>
   





    </tr>
    <?
    $mostraservic2 = $conn->Execute($mostraservic);
    while ( !$mostraservic2->EOF)
	{
					     $servico7=$mostraservic2->fields["SERVICO2"];
						 $intervalo7=$mostraservic2->fields["INTERVALO"];
						 $unidadeintervalo7=$mostraservic2->fields["UNIDADEINTERVALO"];
						 $codigoservico=$mostraservic2->fields["SERVICO"];

      

     
      ?>
      <tr>
	   <td><? echo $codigoservico;?></td>
       <td><? echo $servico7;?></td>
       
       </tr>
      <?
    $mostraservic2->MoveNext();
	}

  
  ?>
  </table>



<input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">

		<input type="hidden" name="grupoordens" value="P">
        <input type="hidden" name="fabricaescolha" value="<?echo $fabricaescolha;?>">




<?
}



//pesquisas

if ($escolha=="pesquisa"){
	 
					 if (!IsSet($ordenaatual))
					 {
						 $pegavariavel[1]="cd_compo";
						 $pegavariavel[2]="cd_fabrica";
						 $ordenaatual="codigo";
						 $mensagemordena="Listas Ordenadas por Código ";
					 }
					 else
					 {
						if ($ordenaatual=="descricao")
						{
							$pegavariavel[1]="cd_compo";
							$pegavariavel[2]="cd_fabrica";
							$mensagemordena="Listas Ordenadas por Código ";
							$ordenaatual="codigo";
						}
						else
                        {
							$pegavariavel[1]="ds_compo";
							$pegavariavel[2]="ds_fabrica";
							$mensagemordena="Listas Ordenadas por Descrição";
							$ordenaatual="descricao";
							
						} 						
					 
					 }
require("classepesquisanova.php");
					 

}//FIAL DA PESQUISA?>


</form>


  




