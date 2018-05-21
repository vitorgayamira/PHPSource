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
require('./src/jpgraph_pie.php');
require('./src/jpgraph_pie3d.php');



$graph = new PieGraph(600,400);
$graph->SetShadow();

$datay=array(); // array com os dado do Eixo Y
$datax=array(); // array com os dado do Eixo X
$dplot=array();





 $i=0;
 
 
 $s = OCIParse($ora_conexao, "select  distinct DS_EMPRESA,TO_CHAR(vl_participacao, '999.9')  PART
 from AUX_GRAFICO_TERCEIRO2  ");





 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra11=ociresult($s, "DS_EMPRESA") ;
  $mostra2=ociresult($s, "PART") ;
  $mostra1=$mostra11;

  //$mostra2=ROUND($mostra2p,1)


  $datay[$i] = $mostra2;
  $datax[$i] = $mostra1;


  $i++;

  }


$gbplot=new PiePlot($datay);
$gbplot->SetLegends($datax);

//$gbplot->SetGuideLines();
//$gbplot->SetGuideLinesAdjust(1.4);



$gbplot-> SetLabelType ( PIE_VALUE_ABS );
//$gbplot-> SetLabelType ( PIE_VALUE_PER );



//$gbplot->SetLabelType(PIE_VALUE_ADJPERCENTAGE);






$graph->Add($gbplot);



  // Cria o gráfico
  $graph->Stroke();



 ?>
