<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃƒO HABILITAD 

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
					 
					 $navegando=$_GET['navegando'];
                     $continuarmesmatela=$_POST['continuarmesmatela'];

                     if ($navegando=="sim"){
					 $escolha=$_GET['escolha'];
					 $pagina_atual = $_GET['pagina_atual'];
					 $grafico1=$_GET['grafico1'];
                     $grafico2=$_GET['grafico2'];
                     $programa=$_GET['programa'];
                     }
					 
					 if ($continuarmesmatela=="sim"){
                      $escolha=$_POST['escolha'];
					  $grafico1=$_POST['grafico1'];
					  $programa=$_POST['programa'];
					  $solicitantepesquisa=$_POST['solicitantepesquisa'];
					  
					 }
					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$tamanhojanela="janelagrandeconsumo";

?>
<form action="classegraficomaximiza1.php" method="POST" name="nome_formulario">
<?
if ($escolha=="pesquisadografico"){
?>
 
 <div  style="display: block;" id="telapesquisagrafico">       
        Defina Parâmetros para Geração de Gráficos</br>
		<table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>
		
		<table>
		    
				<tr>
		        <td>
		        Unidade:
		        </td>
                <td>
				   				 
                     <select name="solicitantepesquisa" style="background-color:#8B8378;color: white;" >
                     <?
				     $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
	
	</table>	
		<input type="hidden" name="escolha" size="5" value="mostragrafico" >
        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="grafico1" value="<?echo $grafico1;?>">
		<input type="hidden" name="programa" value="<?echo $programa;?>">
      	<a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" align="center" ></a>
		



</div>
<?}//FIAL DA PESQUISA

if ($escolha=="mostragrafico"){

$passa1= "delete from aux_grafico";
$result = $conn->Execute($passa1);
$mes=date('m');
$year=date('Y');

$acha5= "SELECT TO_CHAR(DT_AVALIACAO,'DD') DATA ,VL_INDICADOR from 
IND_PLANEJAMENTO_MANUTENCAO where cd_fabrica='$solicitantepesquisa' and TO_CHAR(DT_AVALIACAO,'MM')='$mes' and TO_CHAR(DT_AVALIACAO,'YYYY')='$year' order by DATA ASC";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {
              	  $parcial=$result7->fields["1"];
				 
				  $dia7=$result7->fields["0"];
				  $parcial= str_replace(",", ".","$parcial" );
				  
				          $sql88re = "INSERT into aux_grafico(dia,vl_coluna2)
                          values('$dia7',$parcial) ";
						
						  $result = $conn->Execute($sql88re);


              $valortotal=$valortotal+$parcial;
			 $result7->MoveNext();
  }
  

?>


<div  style="display: block;" id="<?echo $tamanhojanela;?>">


        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=left><titulopagina>% de Atrasos Versus Total Planejado</titulopagina></td>
        <td  align=right><a href="<? echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		
		<img src="<?echo $grafico1;?>">
		
        

</div>

<?}//FIAL DA mostar grafico 
?>
</form>
