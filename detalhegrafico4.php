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


$graph = new Graph(500,300,"auto");

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
 $s = OCIParse($ora_conexao, "SELECT cd_equipamento MAQUINA,DISP_01 DISPONIBILIDADE,NVL(MINIMO_DISP,85) MINIMO FROM MTBF
 WHERE DISP_01 IS NOT NULL ORDER BY DISP_01 ASC ");
 


 
 
 OCIExecute($s, OCI_DEFAULT);
  While (OCIFetch($s)) {
  $mostra1=ociresult($s, "MAQUINA") ;
  $mostra2=ociresult($s, "DISPONIBILIDADE") ;
  $mostra3=ociresult($s, "MINIMO") ;

   //Retornando os dados e armazenado nos arrays.
  $datax[$i] = $mostra1;  //dados Eixo X

  $datay[$i] = $mostra2;  //dados Eixo X
  $datam[$i] = $mostra3;  //dados Eixo X
  $i++;

  }


 //$media=array(85);
 





$bplot=new BarPlot($datay);
$bplot2=new LinePlot($datam);




$graph->Add($bplot);
$graph->Add($bplot2);











  // Dados do --> Eixo X
  $graph->xaxis->SetTickLabels($datax);
  //$graph->xaxis->SetLabelAngle(50);
  $graph->xaxis->title->Set("Maquinas");
//$graph->yaxis->title->Set("Por Mil Cab");
$graph->yaxis->title->SetMargin(1);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,17);







  // Cria o gráfico
  $graph->Stroke();




/*

//exemplo capturado

 // Informar os valores. Devem estar ordenados em ordem decrescente

$ydata=array(5700,4500,2000,1200,600,500);

// Define as dimensoes do grafico

$margem_esq = 50;
$margem_dir = 50;
$margem_top = 50;
$margem_bai = 50;
$largura = 500;
$altura = 300;

// Determina a largura da barra

$largura_barra = (int) (($largura - $margem_dir - $margem_esq) / sizeof($ydata));

// Determina a soma dos valores informados

$totalVal = 0;
for ($i=0; $i < sizeof($ydata); $i++) {
$totalVal = $totalVal + $ydata[$i];
}

// Determina o percentual acumulado

$totalAcu = 0;
for ($i=0; $i < sizeof($ydata); $i++) {
$totalAcu = $totalAcu + ($ydata[$i] * 100 / $totalVal);

$ydata2[$i] = $totalAcu;
}

// Define a area do grafico

$graph = new Graph($largura, $altura,'auto');
$graph->SetScale("textlin", 0, $totalVal);
$graph->Sety2Scale("lin", 0, 100);
$graph->img->SetMargin($margem_esq, $margem_dir , $margem_top, $margem_bai);

$graph->title->Setcolor("darkblue");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,16);

$graph->subtitle->Setcolor("darkblue");
$graph->subtitle->SetFont(FF_ARIAL,FS_BOLD,12);

// Define o gráfico de barras

$barplot = new barplot($ydata);
$barplot->SetWidth($largura_barra);
$barplot->SetFillgradient('blue','darkblue',GRAD_VER);
$barplot->SetValuePos('center');
$barplot->value->Show();
$graph->Add($barplot);

// Define o gráfico de linhas

$lineplot = new LinePlot($ydata2);
$lineplot->SetBarCenter();
$lineplot->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$lineplot->mark->SetColor('blue');
$lineplot->mark->SetFillColor('blue');
$lineplot->SetFillFromYMin(0);
$graph-> Addy2($lineplot);
$lineplot->SetWeight(5);
$lineplot->SetColor("red");
$lineplot->SetStyle("solid");

// Formata os valores

$barplot->value->SetFormat('%d');
$barplot->value->Show();
$barplot->value->SetColor('white');

$lineplot->value->SetFormat('%.2f%%');
$lineplot->value->Show();
$lineplot->value->SetColor('blue');

// Exibe o grafico

$graph->Stroke();
*/




 ?>
