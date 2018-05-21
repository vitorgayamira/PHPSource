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
<form action="graficonigrobase.php" method="POST" name="nome_formulario">
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
$acha5= "SELECT CD_MAQUINA,QTD_PREV,DS_MAQUINA FROM HIST_NIGRO ORDER BY QTD_PREV";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {
              	  				 
				  $prev=$result7->fields["1"];
				  $maquina1=$result7->fields["0"];
				  $maquina2=$result7->fields["2"];				  
				  
				          //if ($contadorpega<"20"){						  
						  							  
				          $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$prev,'$maquina2') ";
						   
						  $result = $conn->Execute($sql88re);
                         // } 
                          $contadorpega=$contadorpega+1;
              
			 $result7->MoveNext();
  }
 

?>


<div  style="display: block;">

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
        <td  align=left><IMG src="<?echo $logomarcamostra;?>"></td></br></br>
		<td><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Quant. Manutenção PREVENTIVA x Equipamento</font></td>
        <td  align=right><a href="<? echo $programa;?>?navegando=sim&escolha=1">
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
echo "Usuário Geração:$nomeusuarioacha - Data Geração:$dataacha</br>";

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

?>
<a href="nigroGraficoPrevPDF.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>&ordem=<?echo $ordem?>"><IMG src="imprimirnovo.png" align="center" width='30' height='35'></a>
<hr>
</br>
<img src="legendaazul.png">Quantidade de Ordens
</br>
		
		<img src="<?echo $grafico1;?>">    

</div>

<?}//FINAL DA mostar grafico 


if ($escolha=="mostragrafico2"){

$passa1= "delete from aux_grafico";
$result = $conn->Execute($passa1);
$mes=date('m');
$year=date('Y');
$contadorpega="0";
$acha5= "SELECT CD_MAQUINA,QTD_CORR,DS_MAQUINA FROM HIST_NIGRO ORDER BY QTD_CORR";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {              	  				 
				  $corr=$result7->fields["1"];
				  $maquina1=$result7->fields["0"];
				  $maquina2=$result7->fields["2"];
				  				  
				          //if ($contadorpega<"20"){
						  						  
						  							  
				          $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$corr,'$maquina2') ";
						   
						  $result = $conn->Execute($sql88re);
                          //} 
                          $contadorpega=$contadorpega+1;
              
			 $result7->MoveNext();
  }
 

?>


<div  style="display: block;"">

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
        <td  align=left><IMG src="<?echo $logomarcamostra;?>"></td></br></br>
		<td><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >Quant. Manutenção CORRETIVA x Equipamento</font></td>
        <td  align=right><a href="<? echo $programa;?>?navegando=sim&escolha=1">
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
echo "Usuário Geração:$nomeusuarioacha - Data Geração:$dataacha</br>";


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

?>
<a href="nigroGraficoCorrPDF.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>&ordem=<?echo $ordem?>"><IMG src="imprimirnovo.png" align="center" width='30' height='35'></a>
<hr>
</br>
<img src="legendavermelho.png">Quantidade de Ordens
</br>		
		<img src="<?echo $grafico1;?>">
</div>

<?}//FIAL DA mostar grafico 
if ($escolha=="mostragrafico3"){

$passa1= "delete from aux_grafico";
$result = $conn->Execute($passa1);
$mes=date('m');
$year=date('Y');
$contadorpega="0";
$acha5= "SELECT CD_MAQUINA,DISP,DS_MAQUINA FROM HIST_NIGRO ORDER BY DISP";
$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {              	  				 
				  $disp=$result7->fields["1"];				  
				  $maquina1=$result7->fields["0"];
				  $maquina2=$result7->fields["2"];
				  $disp= str_replace(",", ".","$disp" );
				          //if ($contadorpega<"20"){
						  							  
				          $sql88re = "INSERT into aux_grafico(vl_coluna3,vl_coluna2,vl_coluna4)
                          values('$maquina1',$disp,'$maquina2') ";
						   
						  $result = $conn->Execute($sql88re);
                          //} 
                          $contadorpega=$contadorpega+1;
              
			 $result7->MoveNext();
  }
 

?>


<div  style="display: block;" >

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
		</br>
		</br>
		<td><font style='font-size: 22px;color: black;text-align:left;bold: Negrito' >% Disponibilidade x Equipamento</font></td>
        <td  align=right><a href="<? echo $programa;?>?navegando=sim&escolha=1">
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
echo "Usuário Geração:$nomeusuarioacha - Data Geração:$dataacha</br>";

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

?>
<a href="nigroGraficoDispPDF.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>&ordem=<?echo $ordem?>"><IMG src="imprimirnovo.png" align="center" width='30' height='35'></a>
<hr>
</br>
<img src="legendaverde.png">Bom<img src="legendaamarela.png">Regular<img src="legendavermelho.png">Ruim
</br>		
		<img src="<?echo $grafico1;?>">
</div>

<?}//FINAL DA mostar grafico 
?>

</form>
