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
$ordem=$_GET['ordem'];



$html="<html>";
?>


<div  style="display: block;" id="mostraexclusao">
<?



if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($turno)){
$turno="1";
}

if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($mesescolha)){$mesescolha=date('m');}

$usuario=$_GET['usuario'];

$ano77=date('Y');
   $mes77=date('m');
   $dia77=date('d');



  $diahoje=$dia77."/".$mes77."/".$ano77;


 $caminho3="./arquivos/";



$dataagora = date('Y-m-d H:i:s');



 $usu18ussMAXPED36qunatosabertos1 = "select count(*) CONTADOR  from SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao d,pessoa_bi b,pessoa_bi c,SOLICITACAO_MOTIVO_ACESSO e,pessoa_bi f WHERE a.CD_funcionario=b.codigo and a.CD_EMPRESA_SOLICITANTE=c.codigo and a.cd_motivo=d.cd_motivo and a.ID_LIBERADO='S' and a.dt_limite_acesso_inicial <=to_date('$diahoje','dd/mm/YYYY') and a.dt_limite_acesso_final>=to_date('$diahoje','dd/mm/YYYY') and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
e.CD_PESSOA_SOLICITANTE=f.codigo ";

                                    // $usu18ussMAXPED36qunatosabertos2= $conn->Execute($usu18ussMAXPED36qunatosabertos1);
                                     //while ( !$usu18ussMAXPED36qunatosabertos2->EOF) {
                                     //$totalpagina55=$usu18ussMAXPED36qunatosabertos2->fields["CONTADOR"];

                                      $registros = "18";
                                      $paginasloop= ceil($totalpagina55 / $registros);

                                     //$usu18ussMAXPED36qunatosabertos2->MoveNext();
                                     //}

        

//for ($pagina_atual = 1; $pagina_atual <= $paginasloop; $pagina_atual++)
//{



$inicio = (($registros * $pagina_atual - $registros))+1;
             $fim =(($inicio-1)+$registros) ;
			 
			 $charelatorio1="SELECT OC.NUMERO_ORDEM, OC.DATA_INICIO,NULL DATA_PREVISTA,NULL HORA,OC.SOLICITANTE,
OC.CD_MANTENEDOR,FS.NOME DS_MANTENEDOR,
OC.CD_ATIVIDADE,A.DS_ATIVIDADE,OC.CD_COMPONENTE,CA.DS_COMPO,OC.STATUS,'PLANEJADA' TIPO,
NVL(TO_CHAR(OC.DATA_TERMINO,'DD/MM/YYYY'),'NÃO BAIXADA')DATA_TERMINO,OC.MAQ_PARADA MAQ_PARADA ,
OC.PODE_PARAR_MAQ INTERVENCAO,NULL URGENTE,OC.OBS,OC.RECOMENDACAO,
OC.CD_FABRICA,F.DS_FABRICA,OC.CD_AREA,AR.DS_AREA,OC.CD_MAO,MO.DS_MAO_OBRA,OC.CD_CENTRO_TRABALHO,CT.DS_CENTRO,
OC.CD_SECAO,S.DS_SECAO,OC.CD_MAQUINA,M.DS_MAQUINA,oc.obs_ordem_ant,oc.cust_mao custo_mao, null analise_ocorrencia, NULL DATA_PROGRAMADA
FROM ORDEM_COMP OC,COMPONENTE_AUXILIAR CA,ATIVIDADES A,FUNCIONARIO_SADEGE FS,
FABRICAS F,AREAS AR,MAO_OBRAS MO,CENTRO_TRABALHOS CT,SECAOS S,MAQUINAS M
WHERE CA.CD_COMPO = OC.CD_COMPONENTE
AND A.CD_ATIVIDADE = OC.CD_ATIVIDADE
AND FS.CADASTRO(+) = OC.CD_MANTENEDOR
AND F.CD_FABRICA = OC.CD_FABRICA
AND AR.CD_AREA = OC.CD_AREA
AND MO.CD_MAO_OBRA(+) = OC.CD_MAO
AND OC.CD_CENTRO_TRABALHO = CT.CD_CENTRO
AND S.CD_SECAO = OC.CD_SECAO
AND M.CD_MAQUINA = OC.CD_MAQUINA
AND OC.NUMERO_ORDEM = '$ordem'
UNION
SELECT EC.NUMERO,EC.DATA_INICIO,EC.DATA_PREVISTA,EC.HORA_INICIO||':'||EC.MINUTO_INICIO HORA,EC.SOLICITANTE,
EC.CD_MANTENEDOR,FS.NOME DS_MANTENEDOR,
EC.CD_ATIVIDADE,A.DS_ATIVIDADE,EC.CD_COMPONENTE,CA.DS_COMPO,EC.STATUS,'NÃO PLANEJADA' TIPO,
NVL(TO_CHAR(EC.DATA_FIM,'DD/MM/YYYY'),'NÃO BAIXADA')DATA_TERMINO,EC.MAQ_PARADA MAQ_PARADA,
EC.PODE_PARAR_MAQ INTERVENCAO,EC.PODE_ESPERAR URGENTE,EC.OBS,EC.RECOMENDACAO,
EC.CD_FABRICA,F.DS_FABRICA,EC.CD_AREA,AR.DS_AREA,EC.CD_MAO,MO.DS_MAO_OBRA,EC.CD_CENTRO_TRABALHO,CT.DS_CENTRO,
EC.CD_SECAO,S.DS_SECAO,EC.CD_MAQUINA,M.DS_MAQUINA,null obs_ordem_ant,ec.custo_mao, ec.analise_ocorrencia,EC.DATA_PROGRAMADA
FROM EMER_COMP EC,COMPONENTE_AUXILIAR CA,ATIVIDADES A,FUNCIONARIO_SADEGE FS,
FABRICAS F,AREAS AR,MAO_OBRAS MO,CENTRO_TRABALHOS CT,SECAOS S,MAQUINAS M
WHERE CA.CD_COMPO = EC.CD_COMPONENTE
AND A.CD_ATIVIDADE = EC.CD_ATIVIDADE
AND FS.CADASTRO(+) = EC.CD_MANTENEDOR
AND F.CD_FABRICA = EC.CD_FABRICA
AND AR.CD_AREA = EC.CD_AREA
AND MO.CD_MAO_OBRA(+) = EC.CD_MAO
AND EC.CD_CENTRO_TRABALHO = CT.CD_CENTRO
AND S.CD_SECAO = EC.CD_SECAO
AND M.CD_MAQUINA = EC.CD_MAQUINA
AND EC.NUMERO = '$ordem'";
	 
			 
			

$charelatorio2 = $conn->Execute($charelatorio1);
     while ( !$charelatorio2->EOF) {


      $datainicio=$charelatorio2->fields("DATA_INICIO") ;
	  $hora=$charelatorio2->fields("HORA") ;
	  $dataabertura=$datainicio." ".$hora;
	  $codigocliente=$charelatorio2->fields("CD_FABRICA") ;
	  $descricaocliente=$charelatorio2->fields("DS_FABRICA") ;
	  $cliente=$codigocliente." ".$descricaocliente;
	  
	  $codigomaquina=$charelatorio2->fields("CD_MAQUINA") ;
	  $descricaomaquina=$charelatorio2->fields("DS_MAQUINA") ;
	  $maquina=$codigomaquina." ".$descricaomaquina;
	  
	  $codigomantenedor=$charelatorio2->fields("CD_MANTENEDOR") ;
	  $descricaomantenedor=$charelatorio2->fields("DS_MANTENEDOR") ;
	  $mantenedor=$codigomantenedor." ".$descricaomantenedor;
	  
	  $solicitante=$charelatorio2->fields("SOLICITANTE") ;
	  $solicitacao=$charelatorio2->fields("OBS") ;
	  $descricaoservico=$charelatorio2->fields("RECOMENDACAO") ;
	  
	  
	 $charelatorio2->MoveNext();
     }


$html.="<body>
<table border=0 width=95% >
<tr>
    			<td><IMG src=osi_logo.jpg width=20 height=30></td>
				<td><font style='font-size: 19px;color: black;text-align:left;bold: Negrito' >ORDEM DE SERVICO</font></td>
				<td align=right><font style='font-size: 9px;color: black;' >$diahoje</font></td>

</tr>
<hr>
</table>


<table border=0 width=95%>
<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Ordem:$ordem</font></td>
				<td align=right><font style='font-size: 9px;color: black;' >Data Abertura:$dataabertura</font></td>

</tr>
<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Cliente:$cliente</font></td>
				

</tr>
</table>

<hr>
<table border=0 width=95% >

<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Maquina:$maquina</font></td>
				<td align=right><font style='font-size: 9px;color: black;' >Manutentor:$mantenedor</font></td>

</tr>
<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Solicitante:$solicitante</font></td>
				

</tr>
</table>

<hr>

<table border=0 width=95% >
<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Solicitação:$solicitacao</font></td>
</tr>
<tr>			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Descrição do Serviço:$descricaoservico</font></td>
</tr>

</table>

<table border=0 width=95% >
<tr>
    			
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>Limpeza do Local<IMG src=apoioquadrado1.jpg width=37 height=30></td>
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>Notificação de Uso/Higienização<IMG src=apoioquadrado1.jpg width=37 height=30 align=top></td>
				<td><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>Conciliação de Peças e Ferramentas<IMG src=apoioquadrado1.jpg width=37 height=30 align=top></td>
</tr>
</table>

<font style='font-size: 11px;color: black;text-align:left;bold: Negrito' ><br />MANUTENTOR</FONT><br />
<table border=1 width=95% >
<tr>
    	
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Cadastro</font></td>
				<td width=30%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Nome</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Data</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Início</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Fim</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Total</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Valor Unit.</font></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >RS Custo</font></td>
</tr>
";


$charelatorio12="select cfe.numero, fs.cadastro,fs.nome,
to_char(cfe.data_baixa_individual,'dd/mm/yyyy') data_baixa_individual,cfe.hr_ini,cfe.hr_fim,cfe.hr_total,
cfe.vl_unit_mao,cfe.hora,cfe.custo_mao
from comp_func_emer cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND CFE.NUMERO = '$ordem'
union
select cfe.numero_ordem,cfe.cadastro,fs.nome,to_char(cfe.data_baixa_individual,'dd/mm/yyyy') data_baixa_individual,
cfe.hr_ini,cfe.hr_fim,cfe.hr_total,cfe.vl_unit_mao,cfe.horas hora,cfe.custo_mao
from comp_func cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND cfe.numero_ordem = '$ordem'
order by data_baixa_individual,hr_ini,hr_fim,nome";
$charelatorio22 = $conn->Execute($charelatorio12);
     while ( !$charelatorio22->EOF) {
      $cadastro=$charelatorio22->fields("CADASTRO") ;
      $nome=$charelatorio22->fields("NOME") ; 
      $datab=$charelatorio22->fields("DATA_BAIXA_INDIVIDUAL") ; 
	  $hora1=$charelatorio22->fields("HR_INI") ; 
	  $hora2=$charelatorio22->fields("HR_FIM") ;
      $hora3=$charelatorio22->fields("HR_TOTAL") ;
 	  $valor3=$charelatorio22->fields("VL_UNIT_MAO") ;
 	  $valor4=$charelatorio22->fields("CUSTO_MAO") ;
 	  
	  $totalhora=$totalhora+$hora3;
	  $totalcusto=$totalcusto+$valor4;
      
      
	  $html.="<tr>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$cadastro</font></td>
	  <td width=30%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$nome</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$datab</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$hora1</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$hora2</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$hora3</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$valor3</font></td>
	  <td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >$valor4</font></td>
	  </tr>";
	
	$charelatorio22->MoveNext();
     }
	$html.="</table>";

$charelatorio13="select NVL(SUM(cfe.custo_mao),0) TOTAL from comp_func_emer cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND CFE.NUMERO = '$ordem'
UNION
select NVL(SUM(cfe.custo_mao),0) TOTAL
from comp_func cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND cfe.numero_ordem = '$ordem'
";	
$charelatorio23 = $conn->Execute($charelatorio13);
     while ( !$charelatorio23->EOF) {
         $totalcusto67=$charelatorio23->fields("TOTAL") ;
  
	$charelatorio23->MoveNext();
     } 
	
	
	$charelatorio15="select sum(total) TOTAL from(
select nvl(SUM(cfe.hora_fim-cfe.hora_inicio),0) TOTAL 
from comp_func_emer cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND CFE.NUMERO = '$ordem' AND cfe.hora_inicio IS NOT  NULL
UNION 
select nvl(SUM(cfe.hora_fim-cfe.hora_inicio),0) TOTAL 
from comp_func cfe,funcionario_sadege fs
where fs.cadastro = cfe.cadastro
AND cfe.numero_ordem = '$ordem' 
AND cfe.hora_inicio IS NOT  NULL)";	
$charelatorio25 = $conn->Execute($charelatorio15);
     while ( !$charelatorio25->EOF) {
      $hora7=$charelatorio25->fields("TOTAL") ;
	  
	$charelatorio25->MoveNext();
     }  
	//echo "mostra:$hora7";
	
	IF ($hora7 <"1"){$hora="0";}ELSE{$hora=ceil($hora7);}
	$hora7 = str_replace(",",".", $hora7);
	
	$minuto=($hora7-$hora)*60;
	$minuto=ceil($minuto);
	$mostrahora=$hora.":".$minuto;
	
	
   
	
	
	
	
	
	$html.="<table border=0 width=95% >
	<tr>
	<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Totais</td>
	<td width=30%></td>
	<td width=10%></td>
	<td width=10%></td>
	<td width=10%></td>
	<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>$mostrahora</td>
	<td width=10%></td>
	<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>$totalcusto67</td>
	
	</tr>
	</table>
	";
 
 $html.="<br /><br /><br /><br /><table border=0 width=95% >
<tr>
    			
				<td width=30%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'><hr><br />Técnico</td>
				<td width=30%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'><hr><br />Cliente</td>
				<td width=25%></td>
				<td width=10%><font style='font-size: 9px;color: black;text-align:left;bold: Negrito'>Data:</td><td width=5%>/</td><td width=5%>/</td>
</tr>
</table>";
 


$html.="</body>";

//}//final das paginas

$html.="</html>";






                                     //$gerapdf1 = "SELECT MAX(NR_SEQUENCIA) MAXIMA FROM listagem_pdf_bi ";
                                     //$gerapdf2= $conn->Execute($gerapdf1);
                                     //while ( !$gerapdf2->EOF) {
                                     //$maximaarquivo=$gerapdf2->fields["MAXIMA"];

                                     //$gerapdf2->MoveNext();
                                     //}



                 
                 
                 if ($maximaarquivo >"0"){$sequenciagravaarquivo=$maximaarquivo+1;}else{$sequenciagravaarquivo="1";}
                 
                 $nomeDoArquivo="RE_ORDEM_OSI.pdf";
                 

                 
                 $today = date('Y-m-d H:i:s');


                 //$grava66 = "delete from  listagem_pdf_bi where DS_DESCRICAO='Portaria'";
                 //$result6 = $conn->Execute($grava66);
                 
                 $passa1="./arquivos/".$nomeDoArquivo;
                 unlink($passa1);
                 


                 //$grava7 = "INSERT INTO listagem_pdf_bi (NR_SEQUENCIA,DS_ARQUIVO,DT_GERACAO,DS_DESCRICAO)
                 //values ('$sequenciagravaarquivo','$nomeDoArquivo','$today','Portaria')";
                 //$result7= $conn->Execute($grava7);



//$nomeDoArquivo = "rendimentodetalhadodire1.pdf";
$tipoFolha = "P"; // P = Retrato | L = Paisagem
require("./pdf/dompdf/dompdf_config.inc.php");
require("chamapdf.php");

if (geraPDF($nomeDoArquivo, $html, $tipoFolha))
{

?>


<table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Impressão de PDF";?></titulo2></td>

          </tr>
          </table>

          <hr>


               <center>
               <?echo "Arquivo Gerado";?></center>


           <table width="99%">
           <tr>
           <td  align=right>
           <a href="./arquivos/RE_ORDEM_OSI.pdf">
           <IMG src="imprimirnovomax.png" width="42" height="38" ></a>

           <a href="consultaordensv5.php">
          <img src="sairtela.png" width="42" height="38"></a>
           
           </td>
           </tr>
           </table>


<?}?>
</div>





