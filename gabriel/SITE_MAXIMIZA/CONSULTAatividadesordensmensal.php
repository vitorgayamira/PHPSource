<html>
<head>
<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var funcaochegando = what.value;
      document.location=(funcaochegando);
   }
}
</Script>


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
function Botao1()
{
document.nome_formulario.action="solicitacaoservicoterceiro.php";
document.forms.nome_formulario.submit();
}
</script>
<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="novasolicitacaoservico.php";
document.forms.nome_formulario.submit();
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

<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="CONSULTAatividadesordensmensal.php";
document.forms.nome_formulario.submit();
}
</script>



</head>



<form action="CONSULTAatividadesordensmensal.php"  name="nome_formulario" id="nome_formulario" method="POST" >




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

}






if (!IsSet($ano)){
$ano=date('Y');
}





//ECHO "Base Oracle:$banco - Local:$localbanco - Ambiente:$ambiente</br>";
require("configuraoracle.php");
require("estilo2.css");
//require("estilonavegacaofundo.css");



 $programa="CONSULTAatividadesordensmensal.php";
 $numeroregistropagina="1";
 $programa2="?";
 $programa3="programapai=";
 $programa9="DIRAentradasistema.php";
 $programa10="?titulorodape=";
 $programa11="&mes1=";
 $programa12="&tipoconsulta=";
 $numeroregistropagina="12";
 $ultimo="144";


 if (!IsSet($fabricaescolha)){
   $sachafabrica = OCIParse($ora_conexao, "SELECT MIN(CD_FABRICA) FABRICA FROM  FABRICAS");
   OCIExecute($sachafabrica, OCI_DEFAULT);
   While (OCIFetch($sachafabrica)) {

          $fabricaescolha=ociresult($sachafabrica, "FABRICA") ;

   }
}

if (!IsSet($grupoordens)){
$grupoordens="P";
}

if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}





?>

<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Plano Anual</font></BR></BR>


<select name="fabricaescolha" style="background-color:#8B8378;color: white;">
                 <option value="<?echo $fabricaescolha;?>">Unidade:<? echo $fabricaescolha;?></option>

                 <?
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by cd_fabrica asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}</option>";
                 }
				 ?>
				 </select>

    <select style="background-color:#8B8378;color: white;"  name="ano" >
    <option value="<?echo $ano;?>">Ano:<? echo $ano;?></option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>

     </select>
 	
 	




   <select name="equipamentoescolha" style="background-color:#8B8378;color: white;" >
                 <option value="<?echo $equipamentoescolha;?>">Equipamento:<? echo $equipamentoescolha;?></option>
                 <option value="0">Equipamento:Todos</option>
                 <?
                 $result2 = "SELECT DISTINCT OC.CD_COMPONENTE VALOR ,MA.DS_MAQUINA MAQUINA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE VALOR,MA.DS_MAQUINA MAQUINA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["VALOR"]}\">{$row["VALOR"]}-{$row["MAQUINA"]}</option>";
                 }
				 ?>
				 </select>
				 
				 <select name="familiaescolha" style="background-color:#8B8378;color: white;" >
                 <option value="<?echo $familiaescolha;?>">Familia:<? echo $familiaescolha;?></option>
                 <option value="">Todas</option>
                 <?
                 $result2 = "SELECT DISTINCT F.CD_FAMLIA VALOR ,F.DS_FAMILIA DESCRICAO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'
       UNION
       SELECT DISTINCT F.CD_FAMLIA VALOR ,F.DS_FAMILIA DESCRICAO
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["VALOR"]}\">{$row["DESCRICAO"]}</option>";
                 }
				 ?>
				 </select>
 	
 	
 	<select style="background-color:#8B8378;color: white;"  name="grupoordens" >
    <option value="<?echo $grupoordens;?>">Grupo:<? echo $mostraordem;?></option>
    <option value="C">Grupo:Não Planejadas</option>
    <option value="P">Grupo:Planejadas</option>
    <option value="T">Grupo:Todas</option>
 	</select>




        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorcentro" value="<?echo $contadorcentro;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
		<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
        <input type="hidden" name="escolha" value="1">

  <input  type="submit"   VALUE="Consultar">
  
  <hr>

<?



$ultimomes="12";
$contadoritem=$ultimodia;
$contadoriteminicial="1";




if (!IsSet($escolha) or ($escolha=="1")){ 


?>


<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">
<tr>
 <th><font style='font-size: 9px;color: white;text-align:left;bold: Negrito' >Equipamentos</font></th>
 <th>Descrição</th>
 <th>Atividade</th>
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
       <th><?echo $dia;?></br><?echo $mostrames;?></th>
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


       $achaunidadedemaquina= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR  FROM  UNID_MAQ where
       cd_maquina LIKE '%$equipamentoescolha%' and CD_FABRICA='$fabricaescolha' ");
       OCIExecute($achaunidadedemaquina, OCI_DEFAULT);
        While (OCIFetch($achaunidadedemaquina)) {

         $existeunidadedemaquina=ociresult($achaunidadedemaquina, "CONTADOR") ;
        }

}
else
{
  $existeunidadedemaquina="0";
}





if ($existeunidadedemaquina >"0"){


IF ($grupoordens=="T"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,
RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha' AND
       (
       (OC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (OC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' ,'1',MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
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
       (EC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (EC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");
}


IF ($grupoordens=="C"){
$s = OCIParse($ora_conexao, "SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' INTERVALO2,'1' INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
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
       (EC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (EC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");





}

IF ($grupoordens=="P"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,
OC.CD_ATIVIDADE,RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO2 INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha' AND
       (
       (OC.CD_COMPONENTE in ( select cd_unid_maq from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       ) or
       (OC.CD_COMPONENTE in ( select cd_maquina from UNID_MAQ where CD_FABRICA='$fabricaescolha'  and
       cd_maquina LIKE '%$equipamentoescolha%')
       )
       )
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ");




}






}//finalquando passou a maquina na pesquisa
else
{

       
IF ($grupoordens=="T"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,OC.CD_ATIVIDADE,
RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha' AND
       OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       UNION
       SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' ,'1',MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
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
       EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");
}

IF ($grupoordens=="C"){
$s = OCIParse($ora_conexao, "SELECT DISTINCT EC.CD_COMPONENTE ,EC.CD_ATIVIDADE,'D' INTERVALO2,'1' INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
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
       EC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ORDER BY CD_COMPONENTE,CD_ATIVIDADE");
       

       
       
       
}

IF ($grupoordens=="P"){

$s = OCIParse($ora_conexao, "SELECT DISTINCT OC.CD_COMPONENTE ,
OC.CD_ATIVIDADE,RC.CD_INTERVALO2 INTERVALO2,RC.INTERVALO2 INTERVALO,
MA.DS_MAQUINA MAQUINA,CA.DS_COMPO DESCRICAOCOMPO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha' AND
       OC.CD_COMPONENTE LIKE '%$equipamentoescolha%'
       AND F.CD_FAMLIA  LIKE '%$familiaescolha%'
       ");




}


}//final quando nao existe unidae de maquina

OCIExecute($s, OCI_DEFAULT);
While (OCIFetch($s)) {

          $compo1=ociresult($s, "CD_COMPONENTE") ;
          $ativi1=ociresult($s, "CD_ATIVIDADE") ;
          $interv=ociresult($s, "CD_ATIVIDADE") ;
          $intervalo=ociresult($s, "INTERVALO") ;
          $dism=ociresult($s, "INTERVALO2") ;
          $descricaomaquina=ociresult($s, "MAQUINA") ;
          $descricaocomponente=ociresult($s, "DESCRICAOCOMPO") ;
          

?>
<tr>


<td><? echo $compo1;?></td>
<td><? echo $descricaocomponente;?></td>



<td><a href="CONSULTAatividadesordensmensal.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>"><font style='font-size: 9px;color: <? echo "$cor";?>;text-align:left;bold: Negrito' >
             <?echo "$ativi1";?></a></td>

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


    
      $achaexistecontador= OCIParse($ora_conexao, "SELECT  to_char(OC.DATA_PLANE,'dd')  CONTADOR1,to_char(OC.DATA_PLANE,'dd') DATACHEIA,
      TO_CHAR(OC.DATA_PLANE,'hh:mm') DATACHEIAHORA,
      OC.NUMERO_ORDEM ORDEM,
       to_char(OC.DATA_INICIO,'dd') DIABAIXA
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) >= '$datapesquisa1'
       AND TRUNC(OC.DATA_PLANE) <= '$datapesquisa2'
       AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       OC.CD_COMPONENTE='$compo1' AND
       OC.CD_ATIVIDADE='$ativi1' AND
       FA.CD_FABRICA='$fabricaescolha'
       UNION
       SELECT  TO_CHAR(EC.DATA_INICIO,'dd')  CONTADOR1, TO_CHAR(EC.DATA_PROGRAMADA,'dd') DATACHEIA,
       TO_CHAR(EC.DATA_PROGRAMADA,'hh:mm') DATACHEIAHORA,
       EC.NUMERO ORDEM,
       to_char(EC.DATA_INICIO,'dd') DIABAIXA
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) >= '$datapesquisa1'
       AND TRUNC(EC.DATA_INICIO) <= '$datapesquisa2'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'");

        OCIExecute($achaexistecontador, OCI_DEFAULT);
        While (OCIFetch($achaexistecontador)) {

         $quantos1=ociresult($achaexistecontador, "CONTADOR1") ;
         $dataprogramada=ociresult($achaexistecontador, "DATACHEIA") ;
         $dataprogramadahora=ociresult($achaexistecontador, "DATACHEIAHORA") ;

         $ordem55=ociresult($achaexistecontador, "ORDEM") ;

         $diaquestao=$quantos1."/".$passa1555."/".$ano;

         $diasbaixa=ociresult($achaexistecontador, "DIABAIXA") ;


        if ($diasbaixa >"0"){
        $mostracor="Blue";//fechada ordem
        }
        else
        {
        $diahoje=date('d/m/Y');
        
        $achadiacontador7= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
        FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
        CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
        WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
        AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
        AND TRUNC(OC.DATA_PLANE) = '$diaquestao'
        and TRUNC(OC.DATA_PLANE) >='$diahoje'
        AND OC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
        AND MA.CD_FAMLIA = F.CD_FAMLIA
        AND MA.CD_CENTRO = CT.CD_CENTRO
        AND CT.CD_SECAO = SE.CD_SECAO
        AND SE.CD_AREA = AR.CD_AREA
        AND AR.CD_FABRICA = FA.CD_FABRICA AND
        OC.CD_COMPONENTE='$compo1' AND
        OC.CD_ATIVIDADE='$ativi1' AND
        FA.CD_FABRICA='$fabricaescolha'
         ");
         



        
        OCIExecute($achadiacontador7, OCI_DEFAULT);
        While (OCIFetch($achadiacontador7)) {

         $quantosplanejada=ociresult($achadiacontador7, "CONTADOR") ;
        }
        
        $achadiacontador8= OCIParse($ora_conexao, "SELECT  count(*) CONTADOR
        FROM  EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE TRUNC(EC.DATA_INICIO) = '$diaquestao'
       and TRUNC(EC.DATA_INICIO) >='$diahoje'
       AND EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA='$fabricaescolha'
              AND
       EC.CD_COMPONENTE='$compo1' AND
       EC.CD_ATIVIDADE='$ativi1'
         ");



        OCIExecute($achadiacontador8, OCI_DEFAULT);
        While (OCIFetch($achadiacontador8)) {

         $quantosnaoplanejada=ociresult($achadiacontador8, "CONTADOR") ;
        }



        //aberto
           if (($quantosplanejada >"0") or ($quantosnaoplanejada >"0")){
                $mostracor="green";
           }
           else
           {
           $mostracor="red";
           }




        }//FINAL QUANSOD ETSTA  EM ABERTTO
         
         ?>
         <h1 style='font-size: 8px;color:<? echo "$mostracor";?>;text-align:left;bold: Negrito text-decoration: none'>
                <?echo "$dataprogramada";?></h1>
        <?
        }
        ?></td><?




}//final do for

?>

</tr>

<?

}//FINAL  dos componnete se ativiadade
?>
</table>
<?
}//FINAL DA PRIMEIRA TELA


if ($escolha=="mudandomes"){ 


?>
<h1 style='font-size: 15px;color: black;bold: Negrito text-decoration: none' >
Etapa-1 Definindo Novos Parametros de Busca</br></br></br></h1>

 <select name="fabricaescolha">
                 <option value="<?echo $fabricaescolha;?>">Unidade:<? echo $fabricaescolha;?></option>

                 <?
                 $result2 = "select CD_FABRICA,DS_FABRICA FROM FABRICAS order by cd_fabrica asc";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
					print "<option value=\"{$row["CD_FABRICA"]}\">{$row["CD_FABRICA"]}-{$row["DS_FABRICA"]}</option>";
                 }
				 ?>
				 </select>


    <input style='font-size: 10px;color: blue;text-align:right;bold: Negrito'type="txt" name="ano"  size="5" value="<?echo $ano;?>">

   <select style='font-size: 10px;color: blue;text-align:right;bold: Negrito'  name="grupoordens" >
    <option value="C">Grupo de Ordens:Não Planejadas</option>
    <option value="P">Grupo de Ordens:Planejadas</option>
    <option value="T">Grupo de Ordens:Todas</option>
 	</select>

        </br>


        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">

		<input type="hidden" name="contadorcentro" value="<?echo $contadorcentro;?>">
		<input type="hidden" name="ativopesquisa" value="<?echo $ativopesquisa;?>">
		<input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="usuariopesquisa" value="<?echo $usuariopesquisa;?>">
		<input type="hidden" name="tipoprivi" value="<?echo $tipoprivi;?>">
        <input type="hidden" name="escolha" value="1">
  
  <input  type="submit"   VALUE="Consultar">
<?
}//TERMINA QUANDO ESCOLHE MES E TURNO 

if ($escolha=="verservico"){



echo "Atividade:$atividadegrava";


$s = OCIParse($ora_conexao, "select  distinct a.ds_atividade ATIVIDADE,e.ds_servico SERVICO,
b.cd_intervalo UNIDADEINTERVALO,b.intervalo INTERVALO
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
c.cd_componente='$compo1' and
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_servico=e.cd_servico
                       ");



                       ?>
 </br></br></br>
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="40%">

    <tr>


    <th>Serviço</th>
    <th>Intervalo</th>





    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      ;

      $servico7=ociresult($s, "SERVICO") ;
      $intervalo7=ociresult($s, "INTERVALO") ;
      $unidadeintervalo7=ociresult($s, "UNIDADEINTERVALO") ;

      if ($unidadeintervalo7=="D"){$mostrauni="Dias";}
      if ($unidadeintervalo7=="H"){$mostrauni="Horas";}


      $intervalomostra=$intervalo7."-".$mostrauni;


      ?>
      <tr>


       <td><? echo $servico7;?></td>
       <td><? echo $intervalomostra;?></td>




      </tr>
      <?

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




<input type="button" onclick="Botao2()" value="Retornar"></input>
<?
}
?>


</form>


  




