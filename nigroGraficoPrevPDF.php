<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃO HABILITAD 

$edusuario=$_SESSION['edusuario'];
					 $edsenha=$_SESSION["edsenha"];
                     $db=$_SESSION["db"];
                     $bd=$_SESSION["bd"];
                     $host=$_SESSION["host"];
                     $user=$_SESSION["user"];
                     $pass=$_SESSION["pass"];
					 
					 $codigoempresa=$_SESSION["codigoempresa"];
                     $razaoempresa=$_SESSION["razaoempresa"];
					 $nomepessoa4=$_SESSION["nomepessoa4"];
                     $magemtopoinicial=$_SESSION["magemtopoinicial"];
					 $razaoempresa=$_SESSION['razaoempresa'];
					 $nomeempresaconexao=$_SESSION['nomeempresaconexao'];

                     $pagina_atual = $_GET['pagina_atual'];
					 
					 $escolha=$_GET['escolha'];

					 
require("conexaoadodb_oracle.php");
$ordem=$_GET['ordem'];



$html="<html>";
?>


<div  style="display: block;" id="mostraexclusao">
<?



if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($turno)){
$turno="1";
}

if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($mesescolha)){$mesescolha=date('m');}

$usuario=$_GET['usuario'];

$ano77=date('Y');
   $mes77=date('m');
   $dia77=date('d');



  $diahoje=$dia77."/".$mes77."/".$ano77;


 $caminho3="./arquivos/";



$dataagora = date('Y-m-d H:i:s');


$html.="
<head>
<style>
img {
    width: 80%;
    height: 90%;
}
</style>
</head>
<body>
<table border=0 width=100% >
<tr>
    			<td><IMG src=logonigro.jpg width=20 height=30></td>
				<td><font style='font-size: 20px;color: black;text-align:left;bold: Negrito' >Quantidade de Manuten&ccedil;&atilde;o <br> PREVENTIVA x Equipamento</font></td>
				<td align=right><font style='font-size: 12px;color: black;' >$diahoje</font></td>

</tr>
<hr>
</table>


<table border=0 width=100%>
<tr>    			
	<td align=center><IMG src=GraficoPreventiva.png></td>
</tr>
</table>

";
	
	
$html.="</body>";

//}//final das paginas

$html.="</html>";
                 
                 if ($maximaarquivo >"0"){$sequenciagravaarquivo=$maximaarquivo+1;}else{$sequenciagravaarquivo="1";}
                 
                 $nomeDoArquivo="GRAFICO_PREV.pdf";
                 
                 $today = date('Y-m-d H:i:s');
                 
                 $passa1="./arquivos/".$nomeDoArquivo;
                 unlink($passa1);
                 
$tipoFolha = "L"; // P = Retrato | L = Paisagem
require("./pdf/dompdf/dompdf_config.inc.php");
require("chamapdf.php");

if (geraPDF($nomeDoArquivo, $html, $tipoFolha))
{

?>


<table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Impress&atilde;o de PDF";?></titulo2></td>

          </tr>
          </table>

          <hr>


               <center>
               <?echo "Arquivo Gerado";?></center>


           <table width="99%">
           <tr>
           <td  align=right>
           <a href="./arquivos/GRAFICO_PREV.pdf">
           <IMG src="imprimirnovomax.png" width="42" height="38" ></a>

           <a href="consultanigro.php">
          <img src="sairtela.png" width="42" height="38"></a>
           
           </td>
           </tr>
</table>


<?}?>
</div>





