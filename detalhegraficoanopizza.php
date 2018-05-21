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
require('./src/jpgraph_pie.php');




$graph = new PieGraph(900,400);
$graph->SetShadow();

$datay=array(); // array com os dado do Eixo Y
$datax=array(); // array com os dado do Eixo X
$dplot=array();





 $i=0;
 $s = OCIParse($ora_conexao, " select  CD_MAQUINA,TO_CHAR(VL_PARTICIPACAO,'999990.99') PART
 from AUX_CONSULTA_CUSTO_ANO_PART
  ORDER BY VL_PARTICIPACAO DESC");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "CD_MAQUINA") ;
  $mostra2=ociresult($s, "PART") ;
  $mostra2= str_replace(",", ".",$mostra2);
  


   //Retornando os dados e armazenado nos arrays.
  //$datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;
  $datax[$i] = $mostra1;


  $i++;

  }


$gbplot=new PiePlot($datay);
$gbplot->SetLegends($datax);

$gbplot->SetGuideLines();
$gbplot->SetGuideLinesAdjust(1.4);

$graph->Add($gbplot);



  // Cria o gráfico
  $graph->Stroke();



 ?>
