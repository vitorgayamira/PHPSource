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
$maquinapassa=$_GET['maquinapassa'];

//$baseoracle="artefama";

require("configuraoracle.php");



#Incluimos a biblioteca
require("./phplot-5.3.0/phplot.php");
require('./src/jpgraph.php');
require('./src/jpgraph_line.php');
require('./src/jpgraph_bar.php');
require('./src/jpgraph_gantt.php');


$graph = new Graph(600,300,"auto");

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
 $s = OCIParse($ora_conexao, "select cd_mes MES,sum(vl_custo_total)/1000 TOTAL
                from aux_consulta_custo_ano group by cd_mes  order by cd_mes asc ");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MES") ;
  $mostra2=ociresult($s, "TOTAL") ;
  $mostra2= str_replace(",", ".",$mostra2);
  


   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;


  $i++;

  }






// Create the grouped bar plot

$gbplot=new LinePlot($datay);
$graph->Add($gbplot);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Meses");
  //$graph->yaxis->title->Set("Por Mil Reais");
$graph->yaxis->title->SetMargin(1);
//$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,10);

$gbplot->SetLegend("Por Mil Reais");


$graph->legend->Pos(0.05,0.1,"right","center");


  // Cria o gráfico
  $graph->Stroke();



 ?>
