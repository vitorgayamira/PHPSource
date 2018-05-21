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
$programa="CONSULTApcmanualV3.php";
$titulo="Plano Anual";


//require("GRAVAR_DIAS_SEMANA.php"); //apena ativar quando um ano novo

  function dia_seguinte($data){
  $temp = explode("/", $data);
  return date("d/m/Y", mktime(0, 0, 0, $temp[1],
     $temp[0] + 1, $temp[2]));
}

?>

<form action="CONSULTApcmanualV3.php"  name="nome_formulario" id="nome_formulario" method="POST" >
<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");?>

<a href="CONSULTApcmanualV3.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>


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
$localbanco=$_GET['localbanco'];
$pagina=$_GET['pagina'];
$grupoordens=$_GET['grupoordens'];
$fabricaescolha=$_GET['fabricaescolha'];
$escolhemes=$_GET['escolhemes'];
$equipamentoescolha=$_GET['equipamentoescolha'];
$atividadegrava=$_GET['atividadegrava'];
$ultimodia=$_GET['ultimodia'];
$primeirodia=$_GET['primeirodia'];
$semanapegou=$_GET['semanapegou'];
$semanapegoumostrar=$_GET['semanapegoumostrar'];
$compo1=$_GET['compo1'];
$componente=$_GET['componente'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$datalargada=$_GET['datalargada'];
$tipoconsulta=$_GET['tipoconsulta'];
$familiaescolha=$_GET['familiaescolha'];
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
$fabricapesquisa=$_POST['fabricapesquisa'];
$equipamentoescolha=$_POST['equipamentoescolha'];
$semanapegou=$_POST['semanapegou'];
$mudoumesano=$_POST['mudoumesano'];
$semanapegoumostrar=$_POST['semanapegoumostrar'];
$datalargada=$_POST['datalargada'];
$tipoconsulta=$_POST['tipoconsulta'];
$familiaescolha=$_POST['familiaescolha'];

}
$programa="CONSULTApcmanualV3.php";


//echo "Ano antes:$ano</br>";


if (!IsSet($mes)){
$mes=date('m');
}
ELSE
{
   IF ($escolhemes=="anterior"){
     $mes=$mes-1;
   }

   IF ($escolhemes=="posterior"){
     $mes=$mes+1;
   }



}




if (!IsSet($grupoordens)){
$grupoordens="P";
}

if($grupoordens=="T"){$mostraordem="Todas";}
if($grupoordens=="P"){$mostraordem="Planejadas";}
if($grupoordens=="C"){$mostraordem="Não Planejadas";}

if (!IsSet($anoescolha)){$anoescolha=date('Y');}
if (!IsSet($ano)){$ano=date('Y');}
if (!IsSet($mes)){$mes=date('m');}
if (!IsSet($year)){$year=date('Y');}
if (!IsSet($month)){$month=date('m');}else{$month=$mes;}


$anodehoje=date('Y');


//echo "Ano depois:$ano";

if (!IsSet($escolha)){
   $escolha="1";

}
?>
<titulogeral><? echo "$titulo";?> - <?echo $ano;?> Grupo de Ordens: <? echo "$mostraordem";?></titulogeral>
<?

$delecaousauio1= "DELETE FROM   aux_usuario_unidade WHERE cd_usuario='$edusuario'";
$delecaousauio12= $conn->Execute($delecaousauio1);

$usu18ussG7dgpa7 = "INSERT INTO  aux_usuario_unidade(cd_usuario,cd_unidade)
		            SELECT '$edusuario',cd_fabrica
		              FROM usuario_fabrica
		             WHERE cd_usuario IN (SELECT cd_usuario
		   			                        FROM usuario_bi
		 			                       WHERE nm_usuario='$edusuario')
			           AND (cd_fabrica = '$fabricaescolha' OR '$fabricaescolha' IS NULL)";

$resultussG77= $conn->Execute($usu18ussG7dgpa7);

				 $achadianovo1dd= "SELECT qt_dias from meses_bi where cd_mes='$mes'";
				 $datapegou2 = $conn->Execute($achadianovo1dd);
                 $numerodias=$datapegou2->fields["0"];




IF ($escolha=="1")
{
?>

<center>


<table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">
<tr>
 <th>Unidade</th>
 <th>Equipamento</th>
 <th></th>
 <th>Atividade</th>
 <th>Metodo</th>
 <th>Int</th>


<?


for ($passa1mi=1;$passa1mi <=12;$passa1mi++)
{
      IF ($passa1mi=="1"){$mostrames="Jan";}
      IF ($passa1mi=="2"){$mostrames="Fev";}
      IF ($passa1mi=="3"){$mostrames="Mar";}
      IF ($passa1mi=="4"){$mostrames="Abr";}
      IF ($passa1mi=="5"){$mostrames="Mai";}
      IF ($passa1mi=="6"){$mostrames="Jun";}
      IF ($passa1mi=="7"){$mostrames="Jul";}
      IF ($passa1mi=="8"){$mostrames="Ago";}
      IF ($passa1mi=="9"){$mostrames="Set";}
      IF ($passa1mi=="10"){$mostrames="Out";}
      IF ($passa1mi=="11"){$mostrames="Nov";}
      IF ($passa1mi=="12"){$mostrames="Dez";}

 ?>
       <th width="5%"><?echo $mostrames;?></th>

<?
}
$datalargada2="01/01/".$ano;
$datachegada2="31/12/".$ano;

?>
</tr>
<tr>
<?


// Limpando tabela temporaria

$deletetmpplanoanual = "TRUNCATE TABLE tmp_plano_anual";
$deletetmpplanoanualexec = $conn->Execute($deletetmpplanoanual);

// SQL abaixo trara todas as ordens corretivas e/ou preventivas. O campo tipo_manutencao sera usado como filtro
// do valor da variavel grupoordens. insercao de linhas em tabela temporaria

$insplaanual=  "INSERT INTO tmp_plano_anual
                SELECT *
				  FROM (
					SELECT  oc.cd_componente
						   ,oc.cd_atividade
						   ,ca.ds_compo
					   	   ,fa.ds_fabrica
						   ,rc.cd_intervalo2 intervalo2
						   ,rc.intervalo     intervalo
						   ,rc.cd_metodo     metodo
						   ,'P'              tipo_manutencao
						   ,oc.data_plane
						   ,oc.data_termino
                           ,oc.status
					FROM  rot_compo            rc
						  ,ordem_comp          oc
						  ,componente_auxiliar ca
						  ,maquinas            ma
						  ,centro_trabalhos    ct
						  ,secaos              se
						  ,areas               ar
						  ,fabricas            fa
					WHERE rc.cd_componente        = oc.cd_componente
					  AND rc.cd_atividade         = oc.cd_atividade
					  AND oc.cd_componente        = ca.cd_compo
					  AND ca.cd_maquina           = ma.cd_maquina
					  AND ma.cd_centro            = ct.cd_centro
					  AND (ma.cd_famlia            = '$familiaescolha'     OR '$familiaescolha'     IS NULL)
					  AND (oc.cd_componente        = '$equipamentoescolha' OR '$equipamentoescolha' IS NULL)
					  AND ct.cd_secao             = se.cd_secao
					  AND se.cd_area              = ar.cd_area
					  AND ar.cd_fabrica           = fa.cd_fabrica
					  AND ((TRUNC(oc.data_plane) >=to_date('$datalargada2','dd/mm/YYYY')) OR (TRUNC(OC.DATA_TERMINO) >=to_date('$datalargada2','dd/mm/YYYY')))
					  AND ((TRUNC(oc.data_plane) <=to_date('$datachegada2','dd/mm/YYYY')) OR (TRUNC(OC.DATA_TERMINO) <=to_date('$datachegada2','dd/mm/YYYY')))
					  AND fa.cd_fabrica IN (SELECT cd_unidade FROM aux_usuario_unidade WHERE cd_usuario='$edusuario')
					UNION
					SELECT DISTINCT ec.cd_componente
							,ec.cd_atividade
							,ca.ds_compo
							,fa.ds_fabrica
							,'D'
							,'1'
							,'-'
							,'C' tipo_manutencao
							,ec.data_inicio
							,ec.data_fim
                            ,ec.status
					FROM emer_comp            ec
						 ,componente_auxiliar ca
						 ,maquinas            ma
						 ,centro_trabalhos    ct
						 ,secaos              se
						 ,areas               ar
						 ,fabricas            fa
					WHERE ec.cd_componente         = ca.cd_compo
					  AND ca.cd_maquina            = ma.cd_maquina
					  AND ma.cd_centro             = ct.cd_centro
					  AND ct.cd_secao              = se.cd_secao
					  AND se.cd_area               = ar.cd_area
					  AND ar.cd_fabrica            = fa.cd_fabrica
					  AND (ma.cd_famlia            = '$familiaescolha'     OR '$familiaescolha'     IS NULL)
					  AND (ec.cd_componente        = '$equipamentoescolha' OR '$equipamentoescolha' IS NULL)
					  AND ((TRUNC(ec.data_inicio) >=TO_DATE('$datalargada2','dd/mm/YYYY')) OR (TRUNC(ec.data_fim)      >=TO_DATE('$datalargada2','dd/mm/YYYY')))
					  AND ((TRUNC(ec.data_inicio) <=TO_DATE('$datachegada2','dd/mm/YYYY')) OR (TRUNC(ec.data_fim)      <=TO_DATE('$datachegada2','dd/mm/YYYY')))
					  AND fa.cd_fabrica           IN (SELECT cd_unidade FROM aux_usuario_unidade WHERE cd_usuario='$edusuario')
					ORDER BY ds_fabrica,
						 cd_componente,
						 cd_atividade
				  )
				 WHERE ( tipo_manutencao = '$grupoordens' OR '$grupoordens' = 'T' )";

// execucao insert tabela temporaria
$insplaanualexec = $conn->Execute($insplaanual);

// select na tmp_plano_anual com as ordens ja filtradas de acordo com o periodo
// preventiva ou corretiva ou as duas ja estarao sendo tratadas

$insplaanual=  "SELECT DISTINCT cd_componente
                      ,ds_compo
                      ,ds_fabrica
                      ,cd_atividade
                      ,intervalo
                      ,intervalo2
                      ,metodo
                 FROM tmp_plano_anual
             ORDER BY ds_fabrica";


$mostragriddescricao = $conn->Execute($insplaanual);
while ( !$mostragriddescricao->EOF)
{
                         $compo1=$mostragriddescricao->fields["CD_COMPONENTE"];
						 $compo2=$mostragriddescricao->fields["DS_COMPO"];
						 $descricaounidade=$mostragriddescricao->fields["DS_FABRICA"];
						 $ativi1=$mostragriddescricao->fields["CD_ATIVIDADE"];
						 $intervalo=$mostragriddescricao->fields["INTERVALO"] ;
                         $dism=$mostragriddescricao->fields["INTERVALO2"] ;
                         $metodo=$mostragriddescricao->fields["METODO"] ;

?>


<td><?echo $descricaounidade;?></td>
<td><?echo $compo1;?></h1></td>
<td><?echo $compo2;?></td>
<td><a href="consultapcmanualv3.php?pagina=1&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&codigousuario=<?echo $codigousuario;?>&listaordemselecionada=<? echo $ordembaixa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&escolha=verservico&atividadegrava=<?ECHO $ativi1;?>&fabricapesquisa=<?ECHO $fabricapesquisa;?>&compo1=<?ECHO $compo1;?>&fabricaescolha=<?ECHO $fabricaescolha;?>">
<?echo "$ativi1";?></a></td>
<td><? echo $metodo;?></td>
<td><? echo $intervalo;?> <? echo $dism;?></td>

<?
for ($passa1m=1;$passa1m <=12;$passa1m++)
{
	?>
	<td>
	<?

	 // Montagem do cabecalho dos meses

      IF ($passa1m=="1"){$mostrames="Jan";}
      IF ($passa1m=="2"){$mostrames="Fev";}
      IF ($passa1m=="3"){$mostrames="Mar";}
      IF ($passa1m=="4"){$mostrames="Abr";}
      IF ($passa1m=="5"){$mostrames="Mai";}
      IF ($passa1m=="6"){$mostrames="Jun";}
      IF ($passa1m=="7"){$mostrames="Jul";}
      IF ($passa1m=="8"){$mostrames="Ago";}
      IF ($passa1m=="9"){$mostrames="Set";}
      IF ($passa1m=="10"){$mostrames="Out";}
      IF ($passa1m=="11"){$mostrames="Nov";}
      IF ($passa1m=="12"){$mostrames="Dez";}

      $datalargada=$ano."-".$passa1m."-01";

       if ($passa1m<"10"){$passa1m="0".$passa1m;}


       $retornadias= "SELECT (CASE WHEN data_termino IS NULL        THEN TO_CHAR(data_plane,'DD') ELSE TO_CHAR(data_termino,'DD') END) dia
                           ,(CASE WHEN data_termino IS NOT NULL    THEN 'blue'
                                  WHEN data_plane < TRUNC(SYSDATE) THEN 'red'
                                  ELSE 'green'
                              END) cor
                       FROM tmp_plano_anual
                      WHERE cd_componente = '$compo1'
                        AND cd_atividade  = '$ativi1'
                        AND ( data_plane   BETWEEN TO_DATE( '01/$passa1m/$ano','dd/mm/yyyy' ) AND LAST_DAY(TO_DATE('01/$passa1m/$ano','dd/mm/yyyy')) OR
                              data_termino BETWEEN TO_DATE( '01/$passa1m/$ano','dd/mm/yyyy' ) AND LAST_DAY(TO_DATE('01/$passa1m/$ano','dd/mm/yyyy'))
                            ) order by dia";


       $retornadiasexec = $conn->Execute($retornadias);

        while ( !$retornadiasexec->EOF)
        {
										 $dia1=$retornadiasexec->fields["DIA"];
										 $cor=$retornadiasexec->fields["COR"];

	      ?>

			<FONT style='font-size: 10px;color:<? echo "$cor";?>;text-align:left;bold: Negrito text-decoration: none'><?echo "$dia1";?></FONT>
          <?
       $retornadiasexec->MoveNext();
       }
?>
</td>
<?
}//finalddo for de meses

?>

</tr>

<?
$mostragriddescricao->MoveNext();
 }

?>
</table>

<?

}//final quando nao escolhe nada tela de entrada





if ($escolha=="verservico"){
?>
<div  style="display: block;" id="telamostraatividade">
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1&datalargada=<?echo $datalargada;?>">
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
b.cd_atividade='$atividadegrava' and
b.cd_atividade=d.cd_atividade and
b.cd_componente=d.cd_componente and
d.cd_componente='$compo1' and
d.cd_servico=e.cd_servico
                       ";


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

						 $intervalo7=$mostraservic2->fields["INTERVALO"];
						 $unidadeintervalo7=$mostraservic2->fields["UNIDADEINTERVALO"];
						 $servico7=$mostraservic2->fields["SERVICO2"];
                         $codigoservico=$mostraservic2->fields["SERVICO"];

      if ($unidadeintervalo7=="D"){$mostrauni="Dias";}
      if ($unidadeintervalo7=="H"){$mostrauni="Horas";}
      $intervalomostra=$intervalo7."-".$mostrauni;
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
        <input type="hidden" name="fabricapesquisa" value="<?echo $fabricapesquisa;?>">
		<input type="hidden" name="grupoordens" value="P">

        <input type="hidden" name="semanapegou" value="<?echo $semanapegou;?>">
        <input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">

        <input type="hidden" name="datalargada" value="<?echo $datalargada;?>">




</div>
<?
}//final ve servico
?>

</div>


<?

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







