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
 $s = OCIParse($ora_conexao, "Select SUBSTR(MES_ANO,1,3)||SUBSTR(MES_ANO,6,2) MES, MAQ, MATERIAL, PECAS, MAO_OBRA,
SERV_TERC,MAQ_PARADA,TOTAL
From Relat_01
Order By MES_ANO");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MES") ;
  $mostra4=ociresult($s, "PECAS") ;
  $mostra4= str_replace(",", ".",$mostra4);

  $mostra1=substr($mostra1,0,2);
  
  $mostra3=ociresult($s, "MATERIAL") ;
  $mostra3= str_replace(",", ".",$mostra3);
  
  $mostra5=ociresult($s, "MAO_OBRA") ;
  $mostra5= str_replace(",", ".",$mostra5);
  
  $mostra6=ociresult($s, "SERV_TERC") ;
  $mostra6= str_replace(",", ".",$mostra6);
  
  $mostra7=ociresult($s, "MAQ_PARADA") ;
  $mostra7= str_replace(",", ".",$mostra7);
  

   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra4;
  $datayz[$i] = $mostra3;
  $datayz1[$i] = $mostra5;
  $datayz2[$i] = $mostra6;
  $datayz3[$i] = $mostra7;


  $i++;

  }


$b1plot  = new BarPlot($datay);
$b3plot  = new BarPlot($datayz);
$b4plot  = new BarPlot($datayz1);
$b5plot  = new BarPlot($datayz2);
$b6plot  = new BarPlot($datayz3);



// Create the grouped bar plot

$gbplot  = new GroupBarPlot (array($b1plot ,$b3plot,$b4plot,$b5plot,$b6plot));



$graph->Add($gbplot);


  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Meses");
//$graph->yaxis->title->Set("Por Mil Cab");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,17);


$b1plot->SetLegend("Pecas");
$b3plot->SetLegend("Materiais");
$b4plot->SetLegend("Mao Obra");
$b5plot->SetLegend("Servicos Terceiros");
$b6plot->SetLegend("Custo de Parada");


$graph->legend->Pos(0.05,0.1,"right","center");


  // Cria o gráfico
  $graph->Stroke();



 ?>
