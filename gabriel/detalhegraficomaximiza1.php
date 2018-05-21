<? 
ini_set('display_errors', '0');// NÃO HABILITAD 
require(".\ADODB\adodb519\adodb.inc.php");

function trataTxt($var) {

	$var = strtolower($var);

	$var = ereg_replace("[áàâãª]","a",$var);
	$var = ereg_replace("[éèê]","e",$var);
	$var = ereg_replace("[óòôõº]","o",$var);
	$var = ereg_replace("[úùû]","u",$var);
	$var = str_replace("ç","c",$var);
	$var = str_replace("~","",$var);

	return $var;
}
                     $nomeempresaconexao=$_SESSION['nomeempresaconexao'];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];



$caminho3="./SRC/";
$passa1grafico=$caminho3."phplot.php";
$passa2grafico=$caminho3."jpgraph.php";
$passa3grafico=$caminho3."jpgraph_line.php";
$passa4grafico=$caminho3."jpgraph_bar.php";
$passa5grafico=$caminho3."jpgraph_gantt.php";


$conn = NewADOConnection($bd);
$conn->connect($host,$user,$pass,$db);

require_once('manipulasql.class_oraclenovo.php');




$caminho3="./SRC/";
$passa1grafico=$caminho3."phplot.php";
$passa2grafico=$caminho3."jpgraph.php";
$passa3grafico=$caminho3."jpgraph_line.php";
$passa4grafico=$caminho3."jpgraph_bar.php";
$passa5grafico=$caminho3."jpgraph_gantt.php";
$passa6grafico=$caminho3."jpgraph_pie.php";
$passa7grafico=$caminho3."jpgraph_pie3d.php";






require($passa1grafico);
require($passa2grafico);
require($passa3grafico);
require($passa4grafico);
require($passa5grafico);
require($passa6grafico);
require($passa7grafico);



 $graph = new Graph(890,500,"auto");
  $graph->img->SetMargin(120,30,30,90);
  $graph->SetScale("textlin");
  $graph->SetMarginColor("lightblue");
  $graph->SetShadow();
  $graph->title->SetColor("darkred");
$i=0;
$recuperag= "SELECT  DIA,SUM(VL_COLUNA2)VALOR  FROM aux_grafico GROUP BY DIA ORDER BY DIA ASC";
$smpegaaux2g= $conn->Execute($recuperag);
while ( !$smpegaaux2g->EOF)
{
$diapega=$smpegaaux2g->fields["0"];
$valor=$smpegaaux2g->fields["1"];
$valor= str_replace(",", ".","$valor" );


$datax[$i]=$diapega;
$datay[$i]=$valor;





$bplot=new LinePlot($datay);
$graph->Add($bplot);





$i++;
$smpegaaux2g->MoveNext();
}


$graph->xaxis->SetTickLabels($datax);

//$bplot->SetLegend("%Atendimento/Total Planejado");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.3,0.1,"center","bottom");


$graph->xaxis->title->Set("Dia");
//$graph->yaxis->title->Set("Numero de Refeicoes");
$graph->Stroke();




 ?>

