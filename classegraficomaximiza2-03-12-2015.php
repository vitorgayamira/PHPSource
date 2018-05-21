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
                     
					 $data1=$_GET['data1'];
					 $data2=$_GET['data2'];
					 $fabrica=$_GET['fabrica'];
					 $area=$_GET['area'];
					 $secao=$_GET['secao'];
					 $centro=$_GET['centro'];
					 $maquina=$_GET['maquina'];
					 
					 
					 
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
$contadorpega="0";
$acha5= "SELECT cd_equipamento,DISP_01,NVL(MINIMO_DISP,85),DS_EQUIPAMENTO FROM MTBF ORDER BY DISP_01  asc";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {
              	  				 
				  $diponibilidade1=$result7->fields["1"];
				  $maquina1=$result7->fields["0"];
				  $maquina2=$result7->fields["3"];
				  
				  
				  $diponibilidade1= str_replace(",", ".","$diponibilidade1" );
				          if ($contadorpega<"20")
						  {
							  
						  							  
				          $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$diponibilidade1,'$maquina2') ";
						   
						  $result = $conn->Execute($sql88re);
                          } 
                          $contadorpega=$contadorpega+1;
              
			 $result7->MoveNext();
  }
 

?>


<div  style="display: block;" id="janelagrafico">

<?
$acha5logo= "SELECT ds_logomarca from pessoa_bi where id_matriz='S'";
$acha5logo2= $conn->Execute($acha5logo);
$logomarcamostra=$acha5logo2->fields["0"];
$diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje;


?>
        <table  width="100%"  border="0">
        <tr>
        <td  align=left><IMG src="<?echo $logomarcamostra;?>"></td>
		<td><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Disponibilidade de Equipamentos(%)</font></td>
        <td  align=right><?echo $datapesquisahoje;?><a href="<? echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>


</br>
<?
$acha5para77= "SELECT distinct ds_usuario,TO_CHAR((dt_geracao),'DD/MM/YYYY')   from parametro_grafico where ds_programa='$programa'";
$result7para77 = $conn->Execute($acha5para77);

$nomeusuarioacha=$result7para77->fields["0"];
$dataacha=$result7para77->fields["1"];
echo "Usuário Geração:$nomeusuarioacha - Dta Geração:$dataacha</br>";

$acha5para= "SELECT ds_parametro,vl_parametro,ds_usuario  from parametro_grafico where ds_programa='$programa' and vl_parametro not in ('0') 
order by nr_sequencia asc";
$result7para = $conn->Execute($acha5para);
while ( !$result7para->EOF) 
{
$nomeparametro=$result7para->fields["0"];
$valorparametro=$result7para->fields["1"];
echo "$nomeparametro:$valorparametro ";
$result7para->MoveNext();
}

$recuminimo18= "SELECT  distinct MINIMO_DISP  FROM MTBF";
$recuminimo28= $conn->Execute($recuminimo18);	
$minimolegenda=$recuminimo28->fields["0"];


?>
<hr>
</br>
<img src="legendaazul.png">Disponibilidade  <img src="legendavermelho.png">Disponibilidade Mínima-><?echo $minimolegenda;?>(%)
</br>


		
		<img src="<?echo $grafico1;?>">

<center><table  border=0
 style='background:white;' width="50%" align="center" class="tabela1">
 <tr>
                <th>Codigo</th>
				<th>Equipamento</th>
 </tr>
<?


$sacha="select a.vl_coluna3,a.vl_coluna4 FROM aux_grafico a order by a.vl_coluna2 asc ";


$smpegaaux2= $conn->Execute($sacha);
  while ( !$smpegaaux2->EOF)
  {
	    //$codigocomponente=$smpegaaux2->fields["0"];
		
        ?>
			<tr>
					<td><?echo $smpegaaux2->fields["0"];?></td>
					<td><?echo $smpegaaux2->fields["1"];?></td>
			                  
           <?$smpegaaux2->MoveNext();
}?>
           </tr>
 </table>		
        

</div>

<?}//FIAL DA mostar grafico 


if ($escolha=="mostragrafico2"){

$passa1= "delete from aux_grafico";
$result = $conn->Execute($passa1);
$mes=date('m');
$year=date('Y');
$contadorpega="0";
$acha5= "SELECT cd_equipamento,DISP_02 DISP_HMP,NVL(MINIMO_DISP,85),DS_EQUIPAMENTO FROM MTBF ORDER BY DISP_01  asc";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {
              	  				 
				  $diponibilidade1=$result7->fields["1"];
				  $maquina1=$result7->fields["0"];
				  $maquina2=$result7->fields["3"];
				  
				  
				  $diponibilidade1= str_replace(",", ".","$diponibilidade1" );
				          if ($contadorpega<"20")
						  {
							  
						  							  
				          $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$diponibilidade1,'$maquina2') ";
						   
						  $result = $conn->Execute($sql88re);
                          } 
                          $contadorpega=$contadorpega+1;
              
			 $result7->MoveNext();
  }
 

?>


<div  style="display: block;" id="janelagrafico">

<?
$acha5logo= "SELECT ds_logomarca from pessoa_bi where id_matriz='S'";
$acha5logo2= $conn->Execute($acha5logo);
$logomarcamostra=$acha5logo2->fields["0"];
$diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje;


?>
        <table  width="100%"  border="0">
        <tr>
        <td  align=left><IMG src="<?echo $logomarcamostra;?>"></td>
		<td><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Disponibilidade HMP(%)</font></td>
        <td  align=right><?echo $datapesquisahoje;?><a href="<? echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>


</br>
<?
$acha5para77= "SELECT distinct ds_usuario,TO_CHAR((dt_geracao),'DD/MM/YYYY')   from parametro_grafico where ds_programa='$programa'";
$result7para77 = $conn->Execute($acha5para77);

$nomeusuarioacha=$result7para77->fields["0"];
$dataacha=$result7para77->fields["1"];
echo "Usuário Geração:$nomeusuarioacha - Dta Geração:$dataacha</br>";

$acha5para= "SELECT ds_parametro,vl_parametro,ds_usuario  from parametro_grafico where ds_programa='$programa' and vl_parametro not in ('0') 
order by nr_sequencia asc";
$result7para = $conn->Execute($acha5para);
while ( !$result7para->EOF) 
{
$nomeparametro=$result7para->fields["0"];
$valorparametro=$result7para->fields["1"];
echo "$nomeparametro:$valorparametro ";
$result7para->MoveNext();
}

$recuminimo18= "SELECT  distinct MINIMO_DISP  FROM MTBF";
$recuminimo28= $conn->Execute($recuminimo18);	
$minimolegenda=$recuminimo28->fields["0"];


?>
<hr>
</br>
<img src="legendaazul.png">Disponibilidade  <img src="legendavermelho.png">Disponibilidade Mínima-><?echo $minimolegenda;?>(%)
</br>


		
		<img src="<?echo $grafico1;?>">

<center><table  border=0
 style='background:white;' width="50%" align="center" class="tabela1">
 <tr>
                <th>Codigo</th>
				<th>Equipamento</th>
 </tr>
<?


$sacha="select a.vl_coluna3,a.vl_coluna4 FROM aux_grafico a order by a.vl_coluna2 asc ";


$smpegaaux2= $conn->Execute($sacha);
  while ( !$smpegaaux2->EOF)
  {
	    //$codigocomponente=$smpegaaux2->fields["0"];
		
        ?>
			<tr>
					<td><?echo $smpegaaux2->fields["0"];?></td>
					<td><?echo $smpegaaux2->fields["1"];?></td>
			                  
           <?$smpegaaux2->MoveNext();
}?>
           </tr>
 </table>		
        

</div>

<?}//FIAL DA mostar grafico 
?>


</form>
