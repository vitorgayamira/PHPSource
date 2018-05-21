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

 $graph = new Graph(1200,500,"auto");
  $graph->img->SetMargin(120,30,30,90);  
  //$graph->SetMarginColor("white");
  $graph->SetShadow();
  $graph->title->SetColor("green");  
  $graph->SetScale('textlin');
  $graph->Set90AndMargin(300,50,50,30);
  $graph->SetScale('textlin'); //escala automatica
  
$i=0;
$recuperag= "SELECT  VL_COLUNA3||'-'||VL_COLUNA4,VL_COLUNA2  FROM aux_grafico order BY VL_COLUNA2 ASC";
$smpegaaux2g= $conn->Execute($recuperag);
while ( !$smpegaaux2g->EOF)
{
$maquina5=$smpegaaux2g->fields["0"];
$valor=$smpegaaux2g->fields["1"];
$valor= str_replace(",", ".","$valor" );
$datax[$i]=$maquina5;
$datay[$i]=$valor;
if($valor > 89.9){
  $datacor[$i]='green';
}else{
  if($valor > 69.9){
    $datacor[$i]='yellow';
  }else{
	  $datacor[$i]='red';
  }
}
$i++;
$smpegaaux2g->MoveNext();
}

$bplot=new BarPlot($datay);

$graph->Add($bplot);
$bplot->SetFillColor($datacor); 
$bplot->SetShadow('white'); 
//$bplot->SetWeight(2);

$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelMargin(200);
$graph->xaxis->SetLabelAlign('left','bottom');

//$bplot->SetLegend("%Atendimento/Total Planejado");

// Adjust the legend position
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.0,0.0,"center","top");
$bplot->value->Show();
$bplot->value->SetColor("black");
@unlink("GraficoDisponibilidade.png");
$graph->Stroke('GraficoDisponibilidade.png');
$graph->Stroke();




 ?>

