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



</style>

<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="somenteconsultabaixa.php";
document.forms.nome_formulario.submit();
}
</script>



</HEAD>

<form action="somenteconsultabaixa.php"  name="nome_formulario" id="nome_formulario" method="POST" >


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





<center><font style='font-size: 29px;color: red;text-align:left;bold: Negrito' >Consulta Ordens</font></center></br>


<?


if (!IsSet($escolha) or ($escolha=="1")){


$result28t = "select TIPO_SERVICO  FROM  TIPO_SERVS WHERE CD_TIPO='$tipo'";
                 $result38t = @OCIParse($ora_conexao, $result28t);
				 @OCIExecute($result38t, OCI_DEFAULT);
				 while (OCIFetchInto($result38t,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $descricaotipo=ociresult($result38t, "TIPO_SERVICO") ;
                 }




?>


<select name="fabricapesquisa" style="background-color:#8B8378;color: white;">
                 <option value="">Todas</option>
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
				 Nr Ordem:<input type="TXT" name="numeroordempesquisa"  value= "<?echo $numeroordempesquisa;?>" size="10">



               Equipamento:<input type="TXT" name="codigomaquina"  value= "<?echo $codigomaquina;?>" SIZE="5">

    <select style="background-color:#8B8378;color: white;"  name="grupoordens" onchange="this.form.submit();">
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

 	<?
 	if ($grupoordens=="P"){
 	?>
 	      <select name="atividadepesquisa" style="background-color:#8B8378;color: white;"  >
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
      }

                 

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

IF ($grupoordens=="C"){


                       if (strlen($solicitantepesquisa) != 0)
                       {


                       $s = OCIParse($ora_conexao, "select  NUMERO,CD_MAQUINA MAQUINA,
                       to_char(DATA_INICIO,'dd/mm/yyyy') DATA,CD_FABRICA,
                       CD_ATIVIDADE,CD_COMPONENTE,1 TIPO,
                       OBS,SOLICITANTE,HORA_INICIO,MINUTO_INICIO,
                       NVL(STATUS_ANDAMENTO,'SEMANDAMENTO') ANDAMENTO,OBS,
                       SOLICITANTE
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica like'%$fabricapesquisa%' and
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
                       OBS,SOLICITANTE,HORA_INICIO,MINUTO_INICIO,
                       NVL(STATUS_ANDAMENTO,'SEMANDAMENTO') ANDAMENTO,OBS,
                       SOLICITANTE
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica like'%$fabricapesquisa%'
                       and
                       cd_maquina like '%$codigomaquina%'
                       and
                       NUMERO like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                       order by DATA_INICIO ASC
                       ");





                       }




                       }



                       IF ($grupoordens=="P"){



                       $s = OCIParse($ora_conexao, "select  NUMERO_ORDEM NUMERO,nvl(CD_MAQUINA,'1') MAQUINA,
                       to_char(DATA_PLANE,'dd/mm/yyyy') DATA,CD_FABRICA ,
                       CD_ATIVIDADE,CD_COMPONENTE,2 TIPO,
                       nvl(STATUS_ANDAMENTO_TIPO,'SEMANDAMENTO') ANDAMENTO,OBS,
                       SOLICITANTE
                       FROM ORDEM_COMP
                       where STATUS='G'   and
                       cd_fabrica like'%$fabricapesquisa%'
                       and
                       cd_maquina like '%$codigomaquina%'
                       and
                       cd_tipo like '%$tipo%'  and
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
                       SOLICITANTE,
                       STATUS_ANDAMENTO_TIPO ANDAMENTO
                       FROM EMER_COMP
                       where STATUS='G'   and
                       cd_fabrica like'%$fabricapesquisa%'
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
                       SOLICITANTE,
                       STATUS_ANDAMENTO_TIPO ANDAMENTO
                       FROM ORDEM_COMP
                       where STATUS='G'   and
                       cd_fabrica like'%$fabricapesquisa%'
                       and
                       cd_tipo like '%$tipo%' and
                       cd_maquina like '%$codigomaquina%' and
                       NUMERO_ORDEM like '%$numeroordempesquisa%' and
                       CD_ATIVIDADE like '%$atividadepesquisa%'
                       ");
                       }
  



                       ?>

 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="80%">

    <tr>

    <th>Nr.Ordem</th>
    <th>Equipamento</th>
   	<th>Componente</th>

    <?
    IF ($grupoordens=="P"){
    ?>
    <th>Atividade</th>
    <th>Programado</th>
    <th>Status</th>

    <?
    }
    else
    {
    ?>
    <th>Abertura</th>
    <th>Detalhe</th>
    <th>Status</th>
    <?}?>


    </tr>
    <?
    OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $ordem=ociresult($s, "NUMERO") ;
      $tipoordem=ociresult($s, "TIPO") ;
      $componente=ociresult($s, "CD_COMPONENTE") ;
      $atividaderecuperada=ociresult($s, "CD_ATIVIDADE") ;
      $andamento=ociresult($s, "ANDAMENTO") ;



      $solimostra=ociresult($s, "SOLICITANTE") ;
      $observacaomostra=ociresult($s, "OBS") ;


      
             if ($andamento =="EMANDAMENTO"){
                    $andamentog="Andamento";
             }
             if ($andamento =="PARADO"){
                 $andamentog="Parada";
             }
             if ($andamento =="SEMANDAMENTO"){
                    $andamentog="Aguardando";
             }
             
             if ($andamento =="PENDENTE"){
                    $andamentog="Pendente";
             }
             if ($andamento =="FINALIZADO"){
                    $andamentog="Finalizada";
             }



      IF ($grupoordens=="C"){
      $horainicio77=ociresult($s, "HORA_INICIO") ;
      $minutoinicio77=ociresult($s, "MINUTO_INICIO") ;
      }
      
      
      $contadorordem=$contadorordem+1;



      ?>
      <tr>
      <?
      IF ($grupoordens=="P"){
      ?>
      
      <td><center><a href="somenteconsultabaixa2.php?escolha=verservico&ordemselecionada=<? echo ociresult($s, "NUMERO");?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividaderecuperada;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>"><? echo ociresult($s, "NUMERO");?></a></td>
      <?}
      else
      {
      ?>

      <td><center><? echo ociresult($s, "NUMERO");?></a></td>
      <?
      }
      ?>



      <td><center><? echo ociresult($s, "MAQUINA");?></td>
       <td><center><? echo ociresult($s, "CD_COMPONENTE");?></td>

      <?
      IF ($grupoordens=="P")
      {
      ?>

      <td><center><? echo ociresult($s, "CD_ATIVIDADE");?></td>
      <td><center><? echo ociresult($s, "DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
      <td><h1 style='font-size: 10px;color: RED;text-align:left;bold: Negrito text-decoration: none'><? echo $andamentog;?></td>

      <?
      }
      else
      {
      
      $mostra55=$solimostra." ".$observacaomostra;
      ?>
      <td><center><? echo ociresult($s, "DATA");?> <? echo $horainicio77;?>:<? echo $minutoinicio77;?></td>
      <td><?echo $mostra55;?></td>
      <td><h1 style='font-size: 10px;color: RED;text-align:left;bold: Negrito text-decoration: none'><? echo $andamentog;?></td>
      <?


      }
      ?>
      </tr>
      <?

  }
  ?>
  </table>

<?}

if ($escolha=="verservico"){



echo "Ordem:$ordemselecionada - Atividade:$atividadegrava";


$s = OCIParse($ora_conexao, "select  a.ds_atividade ATIVIDADE,e.ds_servico SERVICO,
b.cd_intervalo UNIDADEINTERVALO,b.intervalo INTERVALO
FROM atividades a,rot_compo b,ORDEM_COMP c,
rot_compo_servicos d,servicos e
where a.cd_atividade=b.cd_atividade and
b.cd_atividade=c.cd_atividade and
b.cd_componente=c.cd_componente and
c.NUMERO_ORDEM='$ordemselecionada' and
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
		<input type="hidden" name="fabricapesquisa" value="<?echo $fabricapesquisa;?>">
		<input type="hidden" name="grupoordens" value="P">
		

		

		
<input type="button" onclick="Botao2()" value="Retornar"></input>
<?
}
?>


</form>

