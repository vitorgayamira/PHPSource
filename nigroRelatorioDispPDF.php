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

                     //$pagina_atual = $_GET['pagina_atual'];
					 
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

   
$html.="

<body>
<table border=0 width=100% >
<tr>
    			<td><IMG src=logonigro.jpg width=20 height=30></td>
				<td><font style='font-size: 20px;color: black;text-align:left;bold: Negrito' >Historico de Manuten&ccedil;&atilde;o e Disponibilidade</font></td>
				<td align=right><font style='font-size: 9px;color: black;' >$diahoje</font></td>

</tr>
<hr>
</table>

<table  border=0
 style='background:white;' width=100% align=center class=tabela1>


 <tr>
	<th>Codigo</th>
	<th>Equipamento</th>
	<th>Tempo de resposta(h)</th>
	<th>Paradas(h)</th>
	<th>Preventiva(h)</th>
	<th>Corretiva(h)</th>
	<th>Aguardando Solicita&ccedil;&atilde;o</th>
	<th>N&deg; Preventivas</th>
	<th>N&deg; Corretivas</th>
	<th>Disponibilidade(%)</th>
 </tr>
 ";  
   


$chacontadorgeralpagina="SELECT count(*) CONTADOR  FROM hist_nigro";
 
$sacha="SELECT CD_MAQUINA,DS_MAQUINA,ATENDIMENTO,PARADAS, PREVENTIVA,CORRETIVA,SOLICITACAO,QTD_PREV,QTD_CORR, DISP,rownum Id FROM hist_nigro order by DISP ASC";
 
 $s=$sacha;

 
  $smpegaaux2= $conn->Execute($s);
  while ( !$smpegaaux2->EOF)
  {
	   		
        
			$html.="
			<tr>
					<td>".$smpegaaux2->fields["0"]."</td>
					<td>".$smpegaaux2->fields["1"]."</td>
					<td>".$smpegaaux2->fields["2"]."</td>
					<td>".$smpegaaux2->fields["3"]."</td>
					<td>".$smpegaaux2->fields["4"]."</td>
					<td>".$smpegaaux2->fields["5"]."</td>
					<td>".$smpegaaux2->fields["6"]."</td>
					<td>".$smpegaaux2->fields["7"]."</td>
					<td>".$smpegaaux2->fields["8"]."</td>";
					
					$valor=$smpegaaux2->fields["9"];
					if($valor > 89.9){
						$html.="<td bgcolor=green>".$smpegaaux2->fields["9"]."</td>";
					}else{
						if($valor > 69.9){
							$html.="<td bgcolor=yellow>".$smpegaaux2->fields["9"]."</td>";
						}else{
							$html.="<td bgcolor=red>".$smpegaaux2->fields["9"]."</td>";
						}
					}
					
										
					               
           $smpegaaux2->MoveNext();
}
           $html.="</tr>";
           
		    $sachamedia="select round(avg(disp),2) from hist_nigro";
			$sachamedia2= $conn->Execute($sachamedia);            
	        
			$html.="<tr>
                   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>
				   <td></td>						
				   <th>M&eacute;dia Geral</th>";
				    
					$valor=$sachamedia2->fields["0"];
					if($valor > 89.9){
						$html.="<td bgcolor=green>".$sachamedia2->fields["0"]."</td>";
					}else{
						if($valor > 69.9){
							$html.="<td bgcolor=yellow>".$sachamedia2->fields["0"]."</td>";
						}else
							$html.="<td bgcolor=red>".$sachamedia2->fields["0"]."</td>";
					}
										
		  
		   $html.="</tr></table>";


	
$html.="</body>";

//}//final das paginas

$html.="</html>";
                 
                 //if ($maximaarquivo >"0"){$sequenciagravaarquivo=$maximaarquivo+1;}else{$sequenciagravaarquivo="1";}
                 
                 $nomeDoArquivo="RELATORIO_DISP.pdf";
                 
                 $today = date('Y-m-d H:i:s');
                 
                 $passa1="./arquivos/".$nomeDoArquivo;
                 unlink($passa1);
                 
$tipoFolha = "L"; // P = Retrato | L = Paisagem
require("./pdf/dompdf/dompdf_config.inc.php");
require("chamapdf.php");

if (geraPDF($nomeDoArquivo, $html, $tipoFolha))
{

?>


<table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Impress&atilde;o de PDF";?></titulo2></td>

          </tr>
          </table>

          <hr>


               <center>
               <?echo "Arquivo Gerado";?></center>


           <table width="99%">
           <tr>
           <td  align=right>
           <a href="./arquivos/RELATORIO_DISP.pdf">
           <IMG src="imprimirnovomax.png" width="42" height="38" ></a>

           <a href="consultanigro.php">
          <img src="sairtela.png" width="42" height="38"></a>
           
           </td>
           </tr>
</table>


<?}?>
</div>





