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



 $graph = new Graph(800,500,"auto");
  $graph->img->SetMargin(120,30,30,90);
  $graph->SetMarginColor("lightblue");
  $graph->SetShadow();
  $graph->title->SetColor("blue");
  $graph->SetMargin(40,20,20,200);
  
  //$graph->SetScale('textlin',60,100); quando mostra um minimo e maximo
  $graph->SetScale('textlin'); //escala autoamica
  //$graph->yscale->ticks->Set(1,1);
  
$i=0;
$recuperag= "SELECT  VL_COLUNA4,VL_COLUNA2  FROM aux_grafico order BY VL_COLUNA2 ASC";
$smpegaaux2g= $conn->Execute($recuperag);
while ( !$smpegaaux2g->EOF)
{
$maquina5=$smpegaaux2g->fields["0"];
$valor=$smpegaaux2g->fields["1"];
$valor= str_replace(",", ".","$valor" );


$datax[$i]=$maquina5;
$datay[$i]=$valor;
$i++;
$smpegaaux2g->MoveNext();
}

for ($il = 0; $il < $i; $il++ )
{
$recuminimo1= "SELECT  distinct MINIMO_DISP  FROM MTBF";
$recuminimo2= $conn->Execute($recuminimo1);	
$minimo[$il]=$recuminimo2->fields["0"];
}	


$l1plot=new LinePlot($minimo);
$l1plot->SetBarCenter();

$bplot=new BarPlot($datay);

$graph->Add($bplot);
$graph->Add($l1plot);



$l1plot->SetColor('red');
$l1plot->SetWeight(13);//ESPESSURA DA LINHA

$bplot->SetFillColor('blue'); 
$bplot->SetShadow('white'); 


$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(-90);

//$bplot->SetLegend("%Atendimento/Total Planejado");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.3,0.1,"center","bottom");


//$graph->xaxis->title->Set("Equipamento");
//$graph->yaxis->title->Set("Numero de Refeicoes");
$graph->Stroke();




 ?>

