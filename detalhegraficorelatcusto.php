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
$localbanco=$_GET['localbanco'];



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
 $s = OCIParse($ora_conexao, "select mes_ano MES,
        NVL(total,0) TOTAL
 from relat_01
order by substr(mes_ano,4,4)||substr(mes_ano,1,2)");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MES") ;
  $mostra4=ociresult($s, "TOTAL") ;
  $mostra4= str_replace(",", ".",$mostra4);

  $mostra1=substr($mostra1,0,2);

   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra4;


  $i++;

  }


$b1plot  = new BarPlot($datay);



// Create the grouped bar plot
$gbplot  = new GroupBarPlot (array($b1plot));

$graph->Add($gbplot);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Meses");
//$graph->yaxis->title->Set("Por Mil Cab");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,17);


$graph->legend->Pos(0.05,0.1,"right","center");


  // Cria o gráfico
  $graph->Stroke();



 ?>
