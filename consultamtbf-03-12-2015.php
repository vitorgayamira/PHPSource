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
$titulo="MTBF Tempo Médio entre Falhas(Horas)";
$grafico1="detalhegraficomaximiza2.php";




?>
<form action="consultamtbf.php" method="POST" name="nome_formulario">

<?require("areasuperior2.php");
?>
<div id="mostraconteudo33" >
<?
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



}

$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];
?>
 
 


<titulogeral><? echo "$titulo";?></titulogeral></br>
<a href="<?echo $mostraicone;?>"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a>

<a href="consultamtbf.php?pagina=1&dispminima=0&programa=<?echo $programa;?>&navegando=sim">
<img  src="novocalculo.png"  align="center" width='70' height='75' ></a>

<a href="classegraficomaximiza2.php?escolha=mostragrafico&navegando=sim&grafico1=<?echo $grafico1;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="grafico.png" align="center" width='70' height='75' ></a>

<a href="classegraficomaximiza2.php?escolha=mostragrafico2&navegando=sim&grafico1=<?echo $grafico1;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="grafico.png" align="center" width='70' height='75' ></a>
 

<?

if ($dispminima >"0")
{//gera calculo


    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=".$host.")(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

    
	$dia1=substr($data1,8,2);
	$mes1=substr($data1,5,2);
	$ano1=substr($data1,0,4);
	$dia2=substr($data2,8,2);
	$mes2=substr($data2,5,2);
	$ano2=substr($data2,0,4);
	
	
	$data1passa=$dia1."/".$mes1."/".$ano1;
	$data2passa=$dia2."/".$mes2."/".$ano2;
    
	
	
	$ora_conexao = OCILogon($user,$user,$ora_bd);

  
            $query = ("BEGIN PRC_MTBF(:P_DATA1,:P_DATA2,:P_MAQUINA,:P_CENTRO,:P_SECAO,:P_AREA,:P_FABRICA); END;");
   
             $executa= @OCIParse($ora_conexao,$query);
             OCIBindByName($executa,":P_FABRICA" , $solicitantepesquisa,30);
             OCIBindByName($executa,":P_AREA" , $areapesquisa,30);
			 OCIBindByName($executa,":P_SECAO" , $secaopesquisa,30);
             OCIBindByName($executa,":P_CENTRO" , $centropesquisa,30);
             OCIBindByName($executa,":P_MAQUINA" , $maquina,30);
             OCIBindByName($executa,":P_DATA1" , $data1passa,30);
             OCIBindByName($executa,":P_DATA2" , $data2passa,30);
             @OCIExecute($executa);
			 
			      $usu18ussG7d = "update MTBF SET MINIMO_DISP='$dispminima'";
			      $resultussG7= $conn->Execute($usu18ussG7d);
				  
				                        $usu18ussG7d = "delete from parametro_grafico where  ds_programa='$programa'";
										$resultussG7= $conn->Execute($usu18ussG7d);
				  
				                        
										
										
                                        
				  
				  //grava parametros
				  $diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje;
				  
				  if(empty($solicitantepesquisa)){$gravaparametrounidade="0";}else{$gravaparametrounidade=$solicitantepesquisa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Unidade','$gravaparametrounidade','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa);
				  
				  if(empty($areapesquisa)){$gravaparametroarea="0";}else{$gravaparametroarea=$areapesquisa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa2 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Area','$gravaparametroarea','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa2);
				  
				  if(empty($secaopesquisa)){$gravaparametrosecao="0";}else{$gravaparametrosecao=$secaopesquisa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa3 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Seção','$gravaparametrosecao','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa3);
				  
				  if(empty($centropesquisa)){$gravaparametrocentro="0";}else{$gravaparametrocentro=$centropesquisa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa4 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Centro Trabalho','$gravaparametrocentro','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa4);
				  
				  if(empty($maquina)){$gravaparametromaquina="0";}else{$gravaparametromaquina=$maquina;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa5 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Equipamento','$gravaparametromaquina','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa5);
				  
				  if(empty($data1passa)){$gravaparametrodata1="0";}else{$gravaparametrodata1=$data1passa;}
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
				  $usu18ussG7dgpa6 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Dta Inicial','$gravaparametrodata1','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa6);
				  
				  if(empty($data2passa)){$gravaparametrodata2="0";}else{$gravaparametrodata2=$data2passa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa7 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Dta Final','$gravaparametrodata2','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa7);
				  
				  

}//final dos calculos
if (!IsSet($dispminima) or ($dispminima >"0"))
{
?>

</br></br>

<table  border=0
 style='background:white;' width="90%" align="center" class="tabela1">


 <tr>


    			<th>Codigo</th>
				<th>Equipamento</th>
                <th>QTD</th>
                <th>QTD(HMP)</th>
				<th>Tempo/Início</th>
				<th>Tempo/Início(HMP)</th>
                <th>MTBF</th>
                <th>MTBF(HMP)</th>
                <th>MTTR</th>
                <th>MTTR(HMP)</th>
				<th>DISP</th>
				<th>DISP(HMP)</th>
   </tr>
   
   
<?

$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM MTBF";
 
 


$sacha="SELECT * from (SELECT CD_EQUIPAMENTO,DS_EQUIPAMENTO,VALOR_01 QTD, VALOR_02 QTD_HMP,MES_01_HORA MTBF,
MES_02_HORA MTBF_HMP,MTTR_MES_01_HORA MTTR,MTTR_MES_02_HORA MTTR_HMP, DISP_01 DISP,DISP_02 DISP_HMP,MES_03_HORA,MES_04_HORA,
rownum Id FROM MTBF order by DISP_01 ASC)
 ";
 
 $s=$sacha;

 
  $smpegaaux2= $conn->Execute($s);
  while ( !$smpegaaux2->EOF)
  {
	    //$codigocomponente=$smpegaaux2->fields["0"];
		
        ?>
			<tr>
					<td><?echo $smpegaaux2->fields["0"];?></td>
					<td><?echo $smpegaaux2->fields["1"];?></td>
					<td><?echo $smpegaaux2->fields["2"];?></td>
					<td><?echo $smpegaaux2->fields["3"];?></td>
					<td><?echo $smpegaaux2->fields["10"];?></td>
					<td><?echo $smpegaaux2->fields["11"];?></td>
					<td><?echo $smpegaaux2->fields["4"];?></td>
					<td><?echo $smpegaaux2->fields["5"];?></td>
					<td><?echo $smpegaaux2->fields["6"];?></td>
					<td><?echo $smpegaaux2->fields["7"];?></td>
					<td><?echo $smpegaaux2->fields["8"];?></td>
					<td><?echo $smpegaaux2->fields["9"];?></td>
					
                   
           <?$smpegaaux2->MoveNext();
}?>
           </tr>
		   <tr>
           <?
		    $sachamedia="select DISTINCT VALOR_03 QTD,
  VALOR_04 QTD_HMP,
	MTBF_MEDIA_MENSAL_03_HORA TMP_INI,
	MTBF_MEDIA_MENSAL_04_HORA TMP_INI_HMP,
  MTBF_MEDIA_MENSAL_01_HORA MTBF,
	MTBF_MEDIA_MENSAL_02_HORA MTBF_HMP,
	MTTR_MEDIA_MENSAL_01_HORA MTTR,
	MTTR_MEDIA_MENSAL_02_HORA MTTR_HMP,
  ROUND(DISP_MEDIA_MENSAL_01,2) DISP,
  DISP_MEDIA_MENSAL_02 DISP_HMP FROM MTBF";
			$sachamedia2= $conn->Execute($sachamedia);
            while ( !$sachamedia2->EOF)
            {
	        ?>
					<tr>
                   <th>Média</th>
				   <td></td>
				   
		           <td><?echo $sachamedia2->fields["0"];?></td>
					<?
					//$recebeaqui1=$sachamedia2->fields["1"];
					//$valorpart2=number_format($recebeaqui1, 2, ',', '.');
                    ?>
					<td><?echo $sachamedia2->fields["1"];?></td>
					
					
					<td><?echo $sachamedia2->fields["2"];?></td>
					<td><?echo $sachamedia2->fields["3"];?></td>
					<td><?echo $sachamedia2->fields["4"];?></td>
					<td><?echo $sachamedia2->fields["5"];?></td>
					<td><?echo $sachamedia2->fields["6"];?></td>
					<td><?echo $sachamedia2->fields["7"];?></td>
					<td><?echo $sachamedia2->fields["8"];?></td>
					
					
					<?
					$recebeaqui=$sachamedia2->fields["9"];
					$valorpart=number_format($recebeaqui, 2, ',', '.');
                    ?>
					<td><?echo $valorpart;?></td>
		            
		   <?
		   $sachamedia2->MoveNext();
           }?>
		   </tr>
 </table>



<?
//require ("rodapepagina.php");
}


if ($dispminima=="0")
{


?>
<hr>

		<center>
		Gerando Novo Cálculo
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

                     <select name="solicitantepesquisa" onchange="this.form.submit()" >
                     <option value="<?echo $solicitantepesquisa;?>"><? echo $solicitantepesquisa;?>-<? echo $fabricapesquisades;?></option>
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
		        Area:
		        </td>
                <td>
				
     				 <?
					 
					 $datapegou1pe = "SELECT DS_AREA FROM   areas where cd_area='$areapesquisa' ";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $areadescricao=$datapegou2pe->fields["0"];

     				 

                     ?>

                     <select name="areapesquisa" onchange="this.form.submit()"  >
                     <option value="<?echo $areapesquisa;?>"><? echo $areadescricao;?></option>
                     <?
				     $stmt1 = "SELECT CD_AREA,DS_AREA FROM areas where  cd_fabrica='$solicitantepesquisa' ";
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
		        Seção:
		        </td>
                <td>
				
     				 <?
					 
					 $datapegou1pe = "SELECT DS_SECAO FROM   secaos where cd_secao='$secaopesquisa'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $secaodescricao=$datapegou2pe->fields["0"];

     				 

                     ?>

                     <select name="secaopesquisa" onchange="this.form.submit()"  >
                     <option value="<?echo $secaopesquisa;?>"><? echo $secaodescricao;?></option>
                     <?
				     $stmt1 = "SELECT CD_SECAO,DS_SECAO FROM secaos where cd_area='$areapesquisa'";
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
		        Centro Trabalho:
		        </td>
                <td>
				
     				 <?
					 
					 $datapegou1pe = "SELECT CD_CENTRO FROM   centro_trabalhos where cd_centro='$centropesquisa'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $centrodescricao=$datapegou2pe->fields["0"];

     				 

                     ?>

                     <select name="centropesquisa" onchange="this.form.submit()" >
                     <option value="<?echo $centropesquisa;?>"><? echo $centrodescricao;?></option>
                     <?
				     $stmt1 = "SELECT CD_CENTRO,DS_CENTRO FROM centro_trabalhos where cd_secao='$secaopesquisa'";
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
				     <?
					 
					 $datapegou1pe = "SELECT DS_COMPONENTE FROM   componente_auxiliar where cd_componente='$maquina'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $componentedescricao=$datapegou2pe->fields["0"];
    				 

                     ?>

                     <select name="maquina" onchange="this.form.submit()" >
                     <option value="<?echo $maquina;?>"><? echo $componentedescricao;?></option>
                     <?
				     $stmt1 = "SELECT distinct a.cd_componente CODIGO,b.ds_compo DESCRICAO
                     FROM ordem_comp a,componente_auxiliar b,maquinas c WHERE a.cd_componente=b.cd_compo and
					 b.cd_maquina=c.cd_maquina and c.cd_centro='$centropesquisa' order by b.ds_compo asc";
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
				 <td>Disponibilidade Mínima</td>
				 <td><input type="txt" name="dispminima" value="0"></td>
				 </tr>
				 
				 <tr>
				 <td>Período:</td>
				 <td><input type="date" name="data1" > Até <input type="date" name="data2" ></td>
				 </tr>
				 
				 
				 
	</table>	
		
		
		
		<input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
       		
		
        
		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
<?}?>

</form>
</html>

