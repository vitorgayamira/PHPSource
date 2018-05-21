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
					 $atividadegrava=$_GET['atividadegrava'];
					 $compo1=$_GET['compo1'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="situacaoplanejamentov2.php";
$titulo="Status de Planejamento";
$grafico1="detalhegraficomaximiza1.php";

?>
<form action="situacaoplanejamentov2.php" method="POST" name="nome_formulario">

<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
require("carregamenumilenionovo2.php");?>

<a href="situacaoplanejamentov2.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&passapesquisainicial=<?echo $passapesquisainicial;?>&numerocolunastela=<?echo $numerocolunastela;?>&campolista1=<?echo $campolista1;?>&campolista2=<?echo $campolista2;?>&seelctcampolista1=<?echo $seelctcampolista1;?>&seelctcampolista2=<?echo $seelctcampolista2;?>&nometabelaparapassar=<?echo $nometabelaparapassar;?>&titulojanelapesquisa=<?echo $titulojanelapesquisa;?>&campolista3=<?echo $campolista3;?>&seelctcampolista3=<?echo $seelctcampolista3;?>&campolista4=<?echo $campolista4;?>&seelctcampolista4=<?echo $seelctcampolista4;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>

<a href="classegraficomaximiza1.php?escolha=pesquisadografico&navegando=sim&grafico1=<?echo $grafico1;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&titulo=<?echo $titulo;?>&dataparabuscar1=<?echo $dataparabuscar1;?>&dataparabuscar2=<?echo $dataparabuscar2;?>&programacriadadosgrafico=<?echo $programacriadadosgrafico;?>"><IMG src="grafico.png" align="center" width='70' height='75' ></a>


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
$maquina=$_POST['maquina'];
$atividade=$_POST['atividade'];


$datainicio=$_POST['datainicio'];
$datafinal=$_POST['datafinal'];
$contador=$_POST['contador'];

$ficanatela=$_POST['ficanatela'];
$versituacao=$_POST['versituacao'];

}



  if (!IsSet($year)){
   $year=date('Y');
  }

  if (!IsSet($month)){
   $month=date('m');

  }

  if (!IsSet($dia)){
   $dia="01";
  }

  if (!IsSet($contador)){
   $contador="0";
  }
  
  

  if (!IsSet($versituacao)){
   $versituacao="";
  }
  


                   $mesfinal=$month;
 
                   $usu18uss = "SELECT TO_CHAR(MIN(OC.DATA_PLANE),'DD/MM/YYYY') DATA
                   FROM ATIVIDADES A,ROT_COMPO RC,ORDEM_COMP OC,COMPONENTE_AUXILIAR CA, MAQUINAS MA
                   WHERE A.CD_ATIVIDADE = RC.CD_ATIVIDADE
                   AND RC.ATIVIDADE_ATIVA = 'S'
                   AND RC.CD_COMPONENTE = OC.CD_COMPONENTE
                   AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
                   AND OC.CD_COMPONENTE = CA.CD_COMPO
                   AND CA.CD_MAQUINA = MA.CD_MAQUINA
                   AND OC.STATUS <> 'B' ";
				   			   
                       $resultuss = $conn->Execute($usu18uss);
                       $datainicio=$resultuss->fields["0"];
 
                   

                   
                   if ($mesfinal <"10"){$mesfinal=substr($mesfinal,1,1);}

                   $contador66mese= "SELECT qt_dias DIAS from meses_bi where cd_mes='$mesfinal'";
                   $resultuss88 = $conn->Execute($contador66mese);
                   $datafinalmes=$resultuss88->fields["0"];
				 
                   $datafinal=$datafinalmes."/".$month."/".$year;
                   
                 
 
 ?>
 
 

<a href="http://186.202.46.98:8080/osi/"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<titulogeral><? echo "$titulo";?></titulogeral>

 


<?




if (!IsSet($escolha) or ($escolha=="1")  ){


    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=".$host.")(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

    
   $ora_conexao = OCILogon($user,$user,$ora_bd);


   $query = ("BEGIN sit_plan(:P_FABRICA,:P_AREA,:P_CENTRO,:P_FAMILIA,:P_MAQUINA,:P_COMPO,:P_TIPO,:P_DATA1,:P_DATA2); END;");
             $executa= @OCIParse($ora_conexao,$query);
             OCIBindByName($executa,":P_FABRICA" , $fabrica,30);
             OCIBindByName($executa,":P_AREA" , $area,30);
             OCIBindByName($executa,":P_CENTRO" , $centro,30);
             OCIBindByName($executa,":P_FAMILIA" , $familia,30);
             OCIBindByName($executa,":P_MAQUINA" , $maquina,30);
             OCIBindByName($executa,":P_COMPO" , $componente,30);
             OCIBindByName($executa,":P_TIPO" , $tipo,30);
             OCIBindByName($executa,":P_DATA1" , $datainicio,30);
             OCIBindByName($executa,":P_DATA2" , $datafinal,30);
             @OCIExecute($executa);
			 
			
			 
			 $sachafabrica="SELECT distinct cd_fabrica from  fabricas ";
             $sachafabrica2= $conn->Execute($sachafabrica);
             while ( !$sachafabrica2->EOF)
             {
	              $codigofabria66=$sachafabrica2->fields["0"];
				  
				  $chavencido1="SELECT count(*) CONTADOR  FROM SITUACAO_PLANEJ a ,ordem_comp b
                  where a.numero_ordem=b.numero_ordem  and b.cd_fabrica='$codigofabria66'  and
                  a.SITUACAO='VENCIDO'";
                  $chavencido12= $conn->Execute($chavencido1);
                  $quantosvencidos=$chavencido12->fields["0"];
				  
				  
				  
				  $chavencido13="SELECT count(*) CONTADOR  FROM SITUACAO_PLANEJ a ,ordem_comp b
                  where a.numero_ordem=b.numero_ordem  and b.cd_fabrica='$codigofabria66' ";
                  
				  $chavencido123= $conn->Execute($chavencido13);
                  $quantostotal=$chavencido123->fields["0"];
				 
				  if ($quantosvencidos >"0" and $quantostotal >"0")
				  {
					  $particiapcao88=($quantosvencidos/$quantostotal)*100;
			      }
				  else
				  {
					 $particiapcao88="0"; 
				  }
				  
				  //deleta
				  $diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje;
				  $usu18ussG7d = "delete from  IND_PLANEJAMENTO_MANUTENCAO where CD_FABRICA='$codigofabria66' and DT_AVALIACAO=to_date('$datapesquisahoje','dd/mm/YYYY')";
			      //echo "$usu18ussG7d";
			      $resultussG7= $conn->Execute($usu18ussG7d);
				  
				  
			 		 	   
			 $usu18ussG7 = "insert into IND_PLANEJAMENTO_MANUTENCAO(CD_FABRICA,DT_AVALIACAO,VL_INDICADOR) values ('$codigofabria66',to_date(to_char(sysdate,'dd/mm/yyyy'),'dd/mm/yyyy'),$particiapcao88)";
			 $resultussG7= $conn->Execute($usu18ussG7);
			 $sachafabrica2->MoveNext();
             }

?>

</br></br>

<table  border=0
 style='background:white;' width="100%" align="center" class="tabela1">


 <tr>


    			<th>Unidade</th>
				<th>Equipamento</th>
                <th>Atividade</th>
                <th>Descrição</th>
                <th>Intervalo</th>
                <th>Unid.</th>
                <th>Acumulado</th>
                <th>Diferença</th>
                <th>Nr ordem</th>
				<th>Data Planejada</th>
                <th>Situação</th>




   </tr>
<?

$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM SITUACAO_PLANEJ a ,ordem_comp b
 where a.numero_ordem=b.numero_ordem and a.CD_ATIVIDADE like '%$atividade%' and
 b.cd_fabrica like '%$solicitantepesquisa%'  and
 a.SITUACAO like '%$versituacao%'";
 
  
 
 //DEFINA PAGINACAO

    $registros = "23";
    require("paginacao_mi.php");
//FINAL PAGINACAO

if ($pagina_atual >"1"){$registros=$registros*$pagina_atual;}


$sacha="SELECT * from (select a.CD_COMPONENTE COMPO,a.CD_ATIVIDADE ATIVIDADE1,a.DS_ATIVIDADE ATIVIDADE2,
 a.INTERVALO INTERVALO,a.CD_INTERVALO CD_INTERVALO,a.ACUMULADO ACUMULADO ,a.DIFERENCA DIFERENCA ,a.SITUACAO SITUACAO,
 a.NUMERO_ORDEM NUMERO_ORDEM,b.cd_fabrica FABRICA, to_char(b.data_plane,'dd/mm/yyyy') data_plane,rownum Id
 FROM SITUACAO_PLANEJ a ,ordem_comp b
 where a.numero_ordem=b.numero_ordem and a.CD_ATIVIDADE like '%$atividade%' and
 b.cd_fabrica like '%$solicitantepesquisa%' and
 a.SITUACAO like '%$versituacao%'
 order by FABRICA,DIFERENCA desc)
 ";
 
 $s=$sacha." WHERE Id BETWEEN ".$inicio." and ".$registros;

 
 
  $smpegaaux2= $conn->Execute($s);
  while ( !$smpegaaux2->EOF)
  {
	    $codigocomponente=$smpegaaux2->fields["COMPO"];
		$codigoatividade=$smpegaaux2->fields["ATIVIDADE1"];
		$descricaoatividade=$smpegaaux2->fields["ATIVIDADE2"];
		$intevalo=$smpegaaux2->fields["INTERVALO"];
		$unidintevalo=$smpegaaux2->fields["CD_INTERVALO"];
		$acumulado=$smpegaaux2->fields["ACUMULADO"];
		$diferenca=$smpegaaux2->fields["DIFERENCA"];
		$situacao=$smpegaaux2->fields["SITUACAO"];
		$numeroordem=$smpegaaux2->fields["NUMERO_ORDEM"];
		$dataplane=$smpegaaux2->fields["DATA_PLANE"];
		$codigofabrica=$smpegaaux2->fields["FABRICA"];
        ?>
			<tr>
					<td ><?echo $codigofabrica;?></td>
					<td ><?echo $codigocomponente;?></td>
                    <td><a href="situacaoplanejamentov2.php?listaordemselecionada=<? echo $ordembaixa;?>&navegando=sim&escolha=verservico&atividadegrava=<?ECHO $codigoatividade;?>&compo1=<?ECHO $codigocomponente;?>"><?echo $codigoatividade;?></a>
					</td>

					<td ><?echo $descricaoatividade;?></td>
					<td ><?echo $intevalo;?></td>
					<td ><?echo $unidintevalo;?></td>
					<td ><?echo $acumulado;?></td>
					<td ><?echo $diferenca;?></td>
                    <td ><?echo $numeroordem;?></td>
					<td ><?echo $dataplane;?></td>
                    <?
                    if ($situacao=="VENCIDO"){$cor="red"; $corletra="white";}
                    if ($situacao=="EM AVISO"){$cor="YELLOW"; $corletra="black";}
                    if ($situacao=="BOM"){$cor="GREEN"; $corletra="white";}
                    ?>




                    <td BGCOLOR=<?echo $cor;?> ><font color=<?echo $corletra;?>><?echo $situacao;?></font></td>




           <?$smpegaaux2->MoveNext();
}?>
           </tr>
 </table>



<?
require ("rodapepagina.php");
}//final da tela de abertura


if ($escolha=="pesquisa"){
?>
 
 <div  style="display: block;" id="telapesquisa">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>
		
		<table>
		    
				<tr>
		        <td>
		        Unidade:
		        </td>
                <td>
				
     				 <?
					 
					 $datapegou1pe = "SELECT DS_FABRICA FROM   FABRICAS  WHERE CD_FABRICA='$solicitantepesquisa'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $fabricapesquisades=$datapegou2pe->fields["0"];

     				 

                     ?>

                     <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;" >
                     <option value="<?echo $solicitantepesquisa;?>">Unidade:<? echo $solicitantepesquisa;?>-<? echo $fabricapesquisades;?></option>
                     <?
				     $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 
				 <tr>
		        <td>
		        Equipamento:
		        </td>
                <td>
				

                     <select name="maquina" style="background-color:#8B8378;color: white;" >
                     <option value="<?echo $maquina;?>">Equipamento:<? echo $maquina;?></option>
                     <option value="">Todos</option>
                     <?
				     $stmt1 = "SELECT distinct a.cd_componente CODIGO,b.ds_compo DESCRICAO
                     FROM ordem_comp a,componente_auxiliar b WHERE a.cd_componente=b.cd_compo  order by b.ds_compo asc";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 
				 <tr>
		        <td>
		        Atividade:
		        </td>
                <td>
				

                     <select name="atividade" style="background-color:#8B8378;color: white;" >
                     <option value="<?echo $atividade;?>">Atividade:<? echo $atividade;?></option>
                 <option value="">Todas</option>
                     <?
				     $stmt1 = "SELECT distinct a.cd_atividade CODIGO,b.ds_atividade DESCRICAO
                 FROM ordem_comp a,atividades b WHERE a.cd_atividade=b.cd_atividade order by b.ds_atividade asc";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 
				 
				 
				 <tr>
				 <td>
		         Ver Todas as Situações
		         </td>
                 <td>
				 
				 <select    name="versituacao" >
                  	  <option value="">Todas</option>
                      <option value="VENCIDO">Somente as Pendências</option>
					  <option value="EM AVISO">Em Aviso</option>
					  <option value="BOM">Com Folga</option>
                 </select>
				 </td>
				 </tr>
				
				 
				 
				 
				 
		 
		 
	</table>	
		
		
		
		<input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">
		<input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
       	<input type="hidden" name="contadorfabrica" value="<?echo $contadorfabrica;?>">
		<input type="hidden" name="contador66" value="1">
		<input type="hidden" name="year" value="<?echo $year;?>">
		<input type="hidden" name="month" value="<?echo $month;?>">
		<input type="hidden" name="data1" value="<?echo $data1;?>">
		<input type="hidden" name="data2" value="<?echo $data2;?>">
        
		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
		



</div>
<?}//FIAL DA PESQUISA

if ($escolha=="verservico"){
?>
<div  style="display: block;" id="telamostraatividade">       
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="situacaoplanejamentov2.php?navegando=sim&escolha=1&semanapegou=<?echo $semanapegou;?>">
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
		




</div>
<?
}//final ve servico
?>

</form>
</html>

