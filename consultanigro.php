<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// N�O HABILITAD 

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
                     //$imagemtopoinicial=$_SESSION["imagemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="consultanigro.php";
$titulo="Hist�rico de Manuten��o e Disponibilidade";
$graficoprev="detalhegraficonigrop.php";
$graficocorr="detalhegraficonigroc.php";
$graficodisp="detalhegraficonigrod.php";
$relatdisp="nigroRelatorioDispPDF.php";


?>
<form action="consultanigro.php" method="POST" name="nome_formulario">

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
$data2passa=$_GET['data2passa'];
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
$data2passa=$_POST['data2passa'];
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


<a href="consultanigro.php?pagina=1&dispminima=0&programa=<?echo $programa;?>&navegando=sim">
<img  src="novocalculo.png"  align="center" width='70' height='75' ></a>

<a href="graficonigro.php?escolha=mostragrafico&navegando=sim&grafico1=<?echo $graficoprev;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="graficobarrahazul.png" align="center" width='70' height='75'></a>
  
<a href="graficonigro.php?escolha=mostragrafico2&navegando=sim&grafico1=<?echo $graficocorr;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="graficobarrah.png" align="center" width='70' height='75' ></a>

<a href="graficonigro.php?escolha=mostragrafico3&navegando=sim&grafico1=<?echo $graficodisp;?>&grafico2=<?echo $grafico2;?>&programa=<?echo $programa;?>&data1=<?echo $data1;?>&data2=<?echo $data2;?>&fabrica=<?echo $solicitantepesquisa;?>&area=<?echo $areapesquisa;?>&secao=<?echo $secaopesquisa;?>&centro=<?echo $centropesquisa;?>&maquina=<?echo $maquina;?>"><IMG src="graficobarrahverde.png" align="center" width='70' height='75' ></a>
 

<?

if (!empty($data1) and !empty($data2))
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

  
            $query = ("BEGIN CARGA_NIGRO(:P_FABRICA,:P_AREA,:P_SECAO,:P_DATA1,:P_DATA2); END;");
   
             $executa= @OCIParse($ora_conexao,$query);
             OCIBindByName($executa,":P_FABRICA" , $solicitantepesquisa,30);   
			 OCIBindByName($executa,":P_AREA" , $areapesquisa,30);
			 OCIBindByName($executa,":P_SECAO" , $secaopesquisa,30);			 
             OCIBindByName($executa,":P_DATA1" , $data1passa,30);
             OCIBindByName($executa,":P_DATA2" , $data2passa,30);
             @OCIExecute($executa);
			   
				  
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
				  
				  if(empty($data1passa)){$gravaparametrodata1="0";}else{$gravaparametrodata1=$data1passa;}
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
				  $usu18ussG7dgpa6 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Data Inicial','$gravaparametrodata1','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa6);
				  
				  if(empty($data2passa)){$gravaparametrodata2="0";}else{$gravaparametrodata2=$data2passa;}
				  $usu18ussMAXPED3opd = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM parametro_grafico";
                                        $usu18ussMAXPED23opd= $conn->Execute($usu18ussMAXPED3opd);
                                        $sequenciaparametro=$usu18ussMAXPED23opd->fields["0"];
                  if ($sequenciaparametro >"0"){$sequenciaparametrograva=$sequenciaparametro+1;}else{$sequenciaparametrograva="1";}
				  $usu18ussG7dgpa7 = "insert into parametro_grafico(nr_sequencia,ds_parametro,vl_parametro,ds_usuario,dt_geracao,ds_programa) values
				  ('$sequenciaparametrograva','Data Final','$gravaparametrodata2','$edusuario',to_date('$datapesquisahoje','dd/mm/YYYY'),'$programa')";
			      $resultussG7= $conn->Execute($usu18ussG7dgpa7);
				  
				  

}//final dos calculos


if (!empty($data1) and !empty($data2))
{
?>

</br></br>

<table  border=0
 style='background:white;' width="90%" align="center" class="tabela1">


 <tr>
	<th>Codigo</th>
	<th>Equipamento</th>
	<th>Tempo de resposta(h)</th>
	<th>Paradas(h)</th>
	<th>Preventiva(h)</th>
	<th>Corretiva(h)</th>
	<th>Aguardando Solicita��o</th>
	<th>N� Preventivas</th>
	<th>N� Corretivas</th>
	<th>Disponibilidade(%)</th>
 </tr>
   
   
<?

$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM hist_nigro";
 
$sacha="SELECT CD_MAQUINA,DS_MAQUINA,ATENDIMENTO,PARADAS, PREVENTIVA,CORRETIVA,SOLICITACAO,QTD_PREV,QTD_CORR, DISP,rownum Id FROM hist_nigro order by DISP ASC";
 
 $s=$sacha;

 
  $smpegaaux2= $conn->Execute($s);
  while ( !$smpegaaux2->EOF)
  {
	    		
        ?>
			<tr>
					<td><?echo $smpegaaux2->fields["0"];?></td>
					<td><?echo $smpegaaux2->fields["1"];?></td>
					<td><?echo $smpegaaux2->fields["2"];?></td>
					<td><?echo $smpegaaux2->fields["3"];?></td>
					<td><?echo $smpegaaux2->fields["4"];?></td>
					<td><?echo $smpegaaux2->fields["5"];?></td>
					<td><?echo $smpegaaux2->fields["6"];?></td>
					<td><?echo $smpegaaux2->fields["7"];?></td>
					<td><?echo $smpegaaux2->fields["8"];?></td>
					<?
					$valor=$smpegaaux2->fields["9"];
					if($valor > 89.9){?>
						<td bgcolor="green"><?echo $smpegaaux2->fields["9"];?></td>
					<?}else{
						if($valor > 69.9){?>
							<td bgcolor="yellow"><?echo $smpegaaux2->fields["9"];?></td>
						<?}else{?>
							<td bgcolor="red"><?echo $smpegaaux2->fields["9"];?></td>
						<?}
					}
					?>
										
					               
           <?$smpegaaux2->MoveNext();
}?>
           </tr>
		   <tr>
           <?
		    $sachamedia="select round(avg(disp),2) from hist_nigro";
			$sachamedia2= $conn->Execute($sachamedia);            
	        ?>
			<tr>
                   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>						
				   <th>M�dia Geral</th>	
				    <?
					$valor=$sachamedia2->fields["0"];
					if($valor > 89.9){?>
						<td bgcolor="green"><?echo $sachamedia2->fields["0"];?></td>
					<?}else{
						if($valor > 69.9){?>
							<td bgcolor="yellow"><?echo $sachamedia2->fields["0"];?></td>
						<?}else{?>
							<td bgcolor="red"><?echo $sachamedia2->fields["0"];?></td>
						<?}
					}
					?>
		  
		   </tr>
		   
 </table>



<?
}

if (empty($data1) and empty($data2))
{
?>
<hr>

		<center>
		Gerando Novo C�lculo
		<table>		    
				<tr>
		        <td>
		        Cliente:
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
		        Se��o:
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
				 <tr>
				 <td>Per�odo:</td>
				 <td><input type="date" name="data1" > At� <input type="date" name="data2" ></td>
				 </tr>
				 
	</table>		
		
		<input type="hidden" name="semanapegoumostrar" value="<?echo $semanapegoumostrar;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
       			
        
		<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>

<?}

?>
</form>
</html>

