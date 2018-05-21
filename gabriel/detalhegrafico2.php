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


$graph = new Graph(900,400,"auto");

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

 $s = OCIParse($ora_conexao, "SELECT to_char(DIA,'dd') DIA,to_char(META, '99.99') VALOR,to_char(ACUMULADO, '99.99') ACUMU FROM GPD_AUX ");


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "DIA") ;
  $mostra2=ociresult($s, "VALOR") ;
  $mostra3=ociresult($s, "ACUMU") ;

   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;  //dados Eixo X
  $datam[$i] = $mostra3;  //dados Eixo X
  $i++;

  }


 //$media=array(85);
 





$bplot=new LinePlot($datay);
$bplot2=new LinePlot($datam);



$graph->Add($bplot);
$graph->Add($bplot2);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Dias");
$graph->yaxis->title->Set("Valor GPD");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,11);
  // Cria o gráfico
  $graph->Stroke();


 ?>
