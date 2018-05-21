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
 $s = OCIParse($ora_conexao, "select NVL(substr(data,1,2),'--') MES,
         NVL(preventiva,0) PREVENTIVA,
         NVL(corretiva,0) CORRETIVA,
        NVL(total,0) TOTAL
 from grafics_6");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MES") ;
  $mostra2=ociresult($s, "PREVENTIVA") ;
  $mostra2= str_replace(",", ".",$mostra2);
  
  $mostra3=ociresult($s, "CORRETIVA") ;
  $mostra3= str_replace(",", ".",$mostra3);
  
  $mostra4=ociresult($s, "TOTAL") ;
  $mostra4= str_replace(",", ".",$mostra4);


   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;
  $datayz[$i] = $mostra3;
  $datayz3[$i] = $mostra4;

  $i++;

  }


$b1plot  = new BarPlot($datay);



$b2plot  = new BarPlot($datayz);


$b3plot  = new BarPlot($datayz3);



// Create the grouped bar plot
$gbplot  = new GroupBarPlot (array($b1plot ,$b2plot,$b3plot));

$graph->Add($gbplot);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Meses");
//$graph->yaxis->title->Set("Por Mil Cab");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,17);


$b1plot->SetLegend("Preventiva");
$b2plot->SetLegend("Corretiva");
$b3plot->SetLegend("Total");

$graph->legend->Pos(0.05,0.1,"right","center");


  // Cria o gráfico
  $graph->Stroke();



 ?>
