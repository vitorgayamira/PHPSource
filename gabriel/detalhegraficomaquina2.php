<?


$titulografico=$_GET['titulografico'];
$codigousuario=$_GET['codigousuario'];
$banco=$_GET['banco'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];
$labelcoluna=$_GET['labelcoluna'];
$labellinha=$_GET['labellinha'];
$tipo=$_GET['tipo'];
$curvamostra=$_GET['curvamostra'];
$baseoracle=$_GET['baseoracle'];

//$baseoracle="artefama";

require("configuraoracle.php");



#Incluimos a biblioteca
require("./phplot-5.3.0/phplot.php");
require('./src/jpgraph.php');
require('./src/jpgraph_line.php');
require('./src/jpgraph_bar.php');
require('./src/jpgraph_gantt.php');


$graph = new Graph(800,400,"auto");

$graph->img->SetMargin(40,30,30,50);
$graph->SetScale("textlin");
$graph->SetMarginColor("lightblue");
$graph->SetShadow();

$graph->title->Setcolor("darkblue");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,16);

$graph->subtitle->Setcolor("darkblue");
$graph->subtitle->SetFont(FF_ARIAL,FS_BOLD,12);
$datay=array(); // array com os dado do Eixo Y
$datax=array(); // array com os dado do Eixo X
$dplot=array();





 $i=0;
 $s = OCIParse($ora_conexao, "Select hora_trab HORA, cd_maquina MAQUINA From custo_mao_aux
 Order By hora_trab DESC");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MAQUINA") ;
  $mostra2=ociresult($s, "HORA") ;
  $mostra2= str_replace(",", ".",$mostra2);
  


   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;


  $i++;

  }


$b1plot  = new BarPlot($datay);


// Create the grouped bar plot
$gbplot  = new GroupBarPlot (array($b1plot));

$graph->Add($gbplot);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Equipamentos");
//$graph->yaxis->title->Set("Por Mil Cab");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,17);


$b1plot->SetLegend("Horas");


$graph->legend->Pos(0.05,0.1,"right","center");


  // Cria o gráfico
  $graph->Stroke();



 ?>
