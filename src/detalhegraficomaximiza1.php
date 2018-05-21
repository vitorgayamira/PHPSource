<? 
ini_set('display_errors', '1');// NÃO HABILITAD 

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

$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];

$ano=$_GET['ano'];
$mes=$_GET['mes'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$variacaoescolha=$_GET['variacaoescolha'];
$caminho3=$_GET['caminho3'];
$itemestudo=$_GET['itemestudo'];
$turnopesquisa=$_GET['turnopesquisa'];
$titulo=$_GET['titulo'];

$caminho3="./SRC/";
$passa1grafico=$caminho3."phplot.php";
$passa2grafico=$caminho3."jpgraph.php";
$passa3grafico=$caminho3."jpgraph_line.php";
$passa4grafico=$caminho3."jpgraph_bar.php";
$passa5grafico=$caminho3."jpgraph_gantt.php";


//$hostname_https="localhost";
//$username_https="root";
//$password_https="tonera";
//$banco="salaobeleza";
$nomeempresaconexao="PREDIAL";



require("conexaoadodb_oracle.php");
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



 $graph = new Graph(690,300,"auto");
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



$datax[$i]=$diapega;
$datay[$i]=$smpegaaux2g->fields["1"];





$bplot=new LinePlot($datay);
$graph->Add($bplot);





$i++;
$smpegaaux2g->MoveNext();
}


$graph->xaxis->SetTickLabels($datax);

$bplot->SetLegend("Receita em R$/Dia");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.3,0.1,"center","bottom");


$graph->xaxis->title->Set("Dia");
//$graph->yaxis->title->Set("Numero de Refeicoes");
$graph->Stroke();




 ?>

