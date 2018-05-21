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
					 
					 
					 
                     $continuarmesmatela=$_POST['continuarmesmatela'];
					 
					 if ($continuarmesmatela=="sim"){
					 $familia=$_POST['familia'];
					 $centro=$_POST['centro'];
					 $centrocusto=$_POST['centrocusto'];
					 $maquina=$_POST['maquina'];
					 $codigo=$_POST['codigo'];
					 $descricao=$_POST['descricao'];
					 $tipoequipamento=$_POST['tipoequipamento'];
					 $escolha=$_POST['escolha'];
					 $tag=$_POST['tag'];
					 $patrimonio=$_POST['patrimonio'];
					 $modelo=$_POST['modelo'];
					 $ativo=$_POST['ativo'];
					 $escolhaatualizar=$_POST['escolhaatualizar'];
					 $tipoequipamentoescolha=$_POST['tipoequipamentoescolha'];
					 $campogravapaiposicao3=$_POST['campogravapaiposicao3'];
					 $escolha=$_POST['escolha'];
					 
					 $codigonovo=$_POST['codigonovo'];
					 $descricaonova=$_POST['descricaonova'];
					 
					 }
					 else
                     {
					 $escolha=$_GET['escolha'];
					 }

					 
					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
$programa="cadastroequipamento.php";
$titulo="Cadastrando Equipamentos";



?>


<head>



<style>

.botao {
background-image:url("okmensagem2.png") ;
cursor:pointer;
 height:49px;
 width:107px;
 background-repeat:no-repeat;
 font-family: Verdana, Arial, Helvetica, sans-serif; 
font-size: 12px; 
font-weight: bold;
border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	
border-radius: 15px;
	
}

</style>

<script language=javascript>


function atribuivalor() {
   
     document.getElementById("escolha").value = "grava";//Atribuindo.
    document.Form1.submit();
}


</script>




</head>

<form name=Form1  method="POST">
<?require("areasuperior2.php");
require("carregamenumilenionovo2.php");

?>
<center><titulogeral><? echo "$titulo";?></titulogeral></br></center>
<a href="cadastroequipamento.php?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>">
<img  src="consulta.png"  align="center" width='70' height='75' ></a>
<?
$achaparametro1= "SELECT DS_URL_SOLICITACAO from parametros";
$achaparametro12= $conn->Execute($achaparametro1);
$mostraicone=$achaparametro12->fields["0"];
?>
<a href="<?echo $mostraicone;?>"><IMG src="iconesolicitacao.png" align="center" width="70" height="75" ></a></br>
<hr>
<?


if ($escolha=="pesquisa"){?>Consultando por : Equipamento:<input type="txt" name="codigonovo" size="8"> Descrição:<input type="txt" name="descricaonova" size="28">
                     Tipo:<select name="tipoequipamentoescolha" style="background-color:#8B8378;color: white;"  >
									 
					 <option value="MA">Máquinas</option>
					 <option value="X">Componente</option>
					  </select>


<input type="hidden" name="continuarmesmatela" size="5" value="sim" >
<input type="hidden"  name="escolhaatualizar" size="5" value="sim" >

<a href="#" onclick="document.forms[0].submit();return false;">
        <center><IMG src="okmensagem.png" width="62" height="45" align="center" ></center></a>
		
<hr>
<?}
if ($escolhaatualizar=="sim")
{
	$codigonovo= strtoupper($codigonovo);
	$descricaonova= strtoupper($descricaonova);
  if ($tipoequipamentoescolha=="MA")
  {	
  $sacha99="SELECT ds_maquina,CD_FAMLIA,CENTRO,CD_CENTRO,PATRIMONIO,tag,modelo,status_maquina, cd_maquina FROM MAQUINAS where CD_MAQUINA  like '%$codigonovo%' 
  AND ds_maquina like '%$descricaonova%' ";
 
  $sacha991= $conn->Execute($sacha99);
  $descricanova=$sacha991->fields["0"];
  $familianova=$sacha991->fields["1"];
  $centrocustonovo=$sacha991->fields["2"];
  $centrotrabalhonovo=$sacha991->fields["3"];
  $patrimonionovo=$sacha991->fields["4"];
  $tagnovo=$sacha991->fields["5"];
  $modelonovo=$sacha991->fields["6"];
  $ativonovo=$sacha991->fields["7"];
  $codigonovo=$sacha991->fields["8"];
  
  
  
  ?>
  <center>
                <table>
		    	<tr>
		        <td>Equipamento</td><td>Descrição</td>
                </tr>
				<tr>
		        <td><input type="txt" name="codigo" value="<?echo $codigonovo;?>" disabled></td><td><input type="txt" name="descricao" size="45" value="<?echo $descricanova;?>"></td>
                </tr> 
				<tr>
		        <td>Tag</td><td>Patrimônio</td><td>Modelo</td>
                </tr>
				<tr>
		        <td><input type="txt" name="tag" value="<?echo $tagnovo;?>"></td><td><input type="txt" name="patrimonio" value="<?echo $patrimonionovo;?>"></td><td><input type="txt" name="modelo" value="<?echo $modelonovo;?>"></td>
                </tr>
						
                
					 <?
					 if(empty($ativonovo)){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativonovo=="A"){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativonovo=="I"){$mostramarcado1=""; $mostramarcado2="checked";};
					 ?>
					 
				     </td><td><input type="radio" name="ativo" value="A" <?echo $mostramarcado1;?>> Ativo<input type="radio" name="ativo" value="I" <?echo $mostramarcado2;?>>Inativo</td>
                

                <tr>
		        <td>Familia</td><td>Centro de Trabalho</td><td>Centro de Custo</td>
                </tr>
				<tr>
		        <td><select name="familia"  >
                     <option value="<?echo $familianova;?>"><? echo $familianova;?></option>
                     <?
				     $stmt1 = "SELECT cd_famlia,ds_familia FROM familias ORDER BY cd_famlia ASC";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td>
				 
				 <td><select name="centro"  >
                     <option value="<?echo $centrotrabalhonovo;?>"><? echo $centrotrabalhonovo;?></option>
                     <?
				     $stmt1 = "SELECT cd_centro,ds_centro FROM centro_trabalhos ORDER BY cd_centro ASC ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td><td><select name="centrocusto"  >
                     <option value="<?echo $centrocustonovo;?>"><? echo $centrocustonovo;?></option>
                     <?
				     $stmt1 = "SELECT codigo,centro FROM centro_custos";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td>
                </tr>
                
				 
				</table> 
<?
}
				
if ($tipoequipamentoescolha=="X")
  {	
  $sacha99="SELECT ds_compo,tag,patrimonio,modelo,cd_maquina,cd_unid_maq,status_componente from componente_auxiliar where cd_compo  like '%$codigonovo%' 
  AND ds_compo like '%$descricaonova%'";
 
  
 
  
  $sacha991= $conn->Execute($sacha99);
  $descricanova=$sacha991->fields["0"];
  $tagnovo=$sacha991->fields["1"];
  $patrimonionovo=$sacha991->fields["2"];
  $modelonovo=$sacha991->fields["3"];
  $maquinanova=$sacha991->fields["4"];
  $unidmaquinanova=$sacha991->fields["5"];
  $ativonovo=$sacha991->fields["6"];
 
  
  ?>
  <center>
                <table>
		    	<tr>
		        <td>Equipamento</td><td>Descrição</td>
                </tr>
				<tr>
		        <td><input type="txt" name="codigo" value="<?echo $codigonovo;?>" disabled></td><td><input type="txt" name="descricao" size="45" value="<?echo $descricanova;?>"></td>
                </tr> 
				<tr>
		        <td>Tag</td><td>Patrimônio</td><td>Modelo</td>
                </tr>
				<tr>
		        <td><input type="txt" name="tag" value="<?echo $tagnovo;?>"></td><td><input type="txt" name="patrimonio" value="<?echo $patrimonionovo;?>"></td><td><input type="txt" name="modelo" value="<?echo $modelonovo;?>"></td>
                </tr>
						
                
					 <?
					 if(empty($ativonovo)){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativonovo=="A"){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativonovo=="I"){$mostramarcado1=""; $mostramarcado2="checked";};
					 ?>
					 
				     </td><td><input type="radio" name="ativo" value="A" <?echo $mostramarcado1;?>> Ativo<input type="radio" name="ativo" value="I" <?echo $mostramarcado2;?>>Inativo</td>
                </tr>
                <tr>
				
		        <td>Máquina:<select name="maquina" >
                     <option value="<?echo $maquinanova;?>"><? echo $maquinanova;?></option>
                     <?
				     $stmt1 = "SELECT cd_maquina,ds_maquina FROM maquinas ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td>
                
                
				 
				</table> 				
<?
}
?>
				
<input type="hidden" name="continuarmesmatela" size="5" value="sim" >
<input type="hidden"  name="escolhaatualizar" size="5" value="sim" >
<input type="hidden"  name="escolha" size="5" value="atualizar" >
<input type="hidden"  name="tipoequipamentoescolha" size="5" value="<? echo $tipoequipamentoescolha;?>" >
<input type="hidden"  name="codigonovo" size="5" value="<? echo $codigonovo;?>" >

<a href="#" onclick="document.forms[0].submit();return false;">
        <center><IMG src="okmensagem.png" width="62" height="45" align="center" ></center></a>
  
<?  
if ($escolha=="atualizar")
{
  
  if ($tipoequipamentoescolha=="MA")
  {
	  
	$descricao= strtoupper($descricao);
	  
  $usu18ussG = "update  maquinas set ds_maquina='$descricao',tag='$tag',patrimonio='$patrimonio',modelo='$modelo',status_maquina='$ativo',cd_centro='$centro',
  cd_famlia='$familia',centro='$centrocusto' where CD_MAQUINA = '$codigonovo'";
  
  }
  if ($tipoequipamentoescolha=="X")
  {
  $usu18ussG = "update  componente_auxiliar set ds_compo='$descricao',tag='$tag',patrimonio='$patrimonio',modelo='$modelo',status_componente='$ativo',
  cd_maquina='$maquina',flag='C' where cd_compo = '$codigonovo'";
  
  }

  
							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");

}



}
else
{
?>

                <center>
                <table>
		    	<tr>
		        <td>Equipamento</td><td>Descrição</td>
                </tr>
				<tr>
		        <td><input type="txt" name="codigo" value="<?echo $codigo;?>"></td><td><input type="txt" name="descricao" size="45" value="<?echo $descricao;?>"></td>
                </tr> 
				<tr>
		        <td>Tag</td><td>Patrimônio</td><td>Modelo</td>
                </tr>
				<tr>
		        <td><input type="txt" name="tag" value="<?echo $tag;?>"></td><td><input type="txt" name="patrimonio" value="<?echo $patrimonio;?>"></td><td><input type="txt" name="modelo" value="<?echo $modelo;?>"></td>
                </tr>
						
                <tr>
		        <td>Tipo Equipamento</td><td>Status</td>
                </tr>
				<tr>
		        <td><select name="tipoequipamento" style="background-color:#8B8378;color: white;"  >
					  <option value="<?echo $tipoequipamento;?>"><? echo $tipoequipamento;?></option>
                     <option value="M">Motores</option>
					 <option value="B">Bombas</option>
					 <option value="R">Redutores</option>
					 <option value="A">Agitadores</option>
					 <option value="X">Auxiliares</option>
					 <option value="E">Elétricos</option>
					 <option value="T">Transmissão</option>
					 <option value="TRANSF">Transformadores</option>
					 <option value="Q">Quadro de Força</option>
					 <option value="C">Capacitores</option>
					 <option value="L">Mancal</option>
					 <option value="MA">Máquina</option>
					 <option value="UNIDMAQUINA">Unid Máquina</option>
					 <?
					 if(empty($ativo)){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativo=="A"){$mostramarcado1="checked"; $mostramarcado2="";};
					 if ($ativo=="I"){$mostramarcado1=""; $mostramarcado2="checked";};
					 ?>
					 
				     </select></td><td><input type="radio" name="ativo" value="A" <?echo $mostramarcado1;?>> Ativo<input type="radio" name="ativo" value="I" <?echo $mostramarcado2;?>>Inativo</td>
                </tr>

                <tr>
		        <td>Familia</td><td>Centro de Trabalho</td><td>Centro de Custo</td>
                </tr>
				<tr>
		        <td><select name="familia" onchange="this.form.submit()" >
                     <option value="<?echo $familia;?>"><? echo $familia;?></option>
                     <?
				     $stmt1 = "SELECT cd_famlia,ds_familia FROM familias ORDER BY cd_famlia ASC";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td>
				 
				 <td><select name="centro" onchange="this.form.submit()" >
                     <option value="<?echo $centro;?>"><? echo $centro;?></option>
                     <?
				     $stmt1 = "SELECT cd_centro,ds_centro FROM centro_trabalhos ORDER BY cd_centro ASC ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td><td><select name="centrocusto" onchange="this.form.submit()" >
                     <option value="<?echo $centrocusto;?>"><? echo $centrocusto;?></option>
                     <?
				     $stmt1 = "SELECT codigo,centro FROM centro_custos";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td>
                </tr>
                <tr>
		        <td>Maquina</td><td>Unid. Máquina</td>
                </tr>
				<tr>
				
		        <td><select name="maquina" onchange="this.form.submit()" >
                     <option value="<?echo $maquina;?>"><? echo $maquina;?></option>
                     <?
				     $stmt1 = "SELECT cd_maquina,ds_maquina FROM maquinas where cd_centro like '%$centro%' and cd_famlia like '%$familia%'";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select></td><td>
				 
				 <select name="unidademaquina" onchange="this.form.submit()" >
                     <option value="<?echo $unidademaquina;?>"><? echo $unidademaquina;?></option>
                     <?
				     $stmt1 = "select CD_UNID_MAQ,DS_UNID_MAQ FROM UNID_MAQ where CD_MAQUINA ='$maquina' ";
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
				<input type="hidden" name="continuarmesmatela" size="5" value="sim" >
                <input type="hidden" id="escolha" name="escolha" size="5" value="" >
	
	       <center><input type="button" class="botao"  onclick="atribuivalor();" style="background-color:white;color: white;font-size:19px"  value="Gravar">


<?
if ($escolha=="grava")
{



if(empty($codigo)   or empty($descricao))
{
      ?><center><?$mensagem="Existem Campos Obrigatórios Não Preenchidos</br>";
      require("logerrobi.php");
	 
}
else
{
	
	
	
	if($tipoequipamento=="M")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into motor(cd_motor,ds_motor,tag,patrimonio,modelo_motor,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					        
							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
	                       
	}
	if($tipoequipamento=="B")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into bomba(cd_bomba,ds_bombas,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					         
							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
	                       
	}
	if($tipoequipamento=="R")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into redutor(cd_redutor,ds_redutor,tag,patrimonio,modelo_redutor,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					        						 
							 
							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
	                       
	}
	if($tipoequipamento=="A")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into componente_auxiliar(cd_compo,ds_compo,tag,patrimonio,modelo,status_componente,cd_maquina,flag) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina','A')";
					        
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="X")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						     $codigo= strtoupper($codigo);
							 $descricao= strtoupper($descricao);
							 
							 $usu18ussG = "insert into componente_auxiliar(cd_compo,ds_compo,tag,patrimonio,modelo,status_componente,cd_maquina,flag) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina','C')";
					        
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="E")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into eletrico_comp(cd_compoelet,ds_compoelet,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					        
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="T")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into transmissao(cd_transmissao,ds_transmissao,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					         							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="Q")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into quadro_forca(cd_quadro,ds_quadro,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					        							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	
	if($tipoequipamento=="A")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into componente_auxiliar(cd_compo,ds_compo,tag,patrimonio,modelo,status_componente,cd_maquina,flag) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina','A')";
					        
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	
	if($tipoequipamento=="TRANSF")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into transformadores(cd_transformador,ds_transformador,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					       
							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="C")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into capacitores(cd_capacitor,ds_capacitor,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					        
							

							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="L")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="";}
							 
						
							 
							 $usu18ussG = "insert into  mancal(cd_mancal,ds_mancal,tag,patrimonio,modelo,status_componente,cd_maquina) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina')";
					         						

							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="UNIDMAQUINA")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centrocusto)){$centrocusto="";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="sem";}
							 if(empty($familia)){$familia="sem";}
							 if(empty($centrocusto)){$centrocusto="sem";}
							 
							 
						
						     if ($maquina=="sem" or $familia=="sem" or $centrocusto=="sem"){$mensagem="Você deve Definir uma Máquina/Familia/Centro de custo ";}else{
							 $usu18ussG = "insert into  unid_maq(cd_unid_maq,ds_unid_maq,tag,patrimonio,modelo,status_componente,cd_maquina,cd_familia,cd_centro_custo) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','ATIVO','$maquina','$familia','$centrocusto')";
							 
					         }
							 

							 
							 $resultussG = $conn->Execute($usu18ussG);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	if($tipoequipamento=="MA")
    {
	 
	                         if(empty($tag)){$tag="";}
							 if(empty($patrimonio)){$patrimonio="";}
							 if(empty($modelo)){$modelo="";}
							 if(empty($centro)){$centro="sem";}
							 if(empty($descricao)){$descricao="";}
							 if(empty($maquina)){$maquina="sem";}
							 if(empty($familia)){$familia="sem";}
							 if(empty($centrocusto)){$centrocusto="";}
							 
							 $codigo= strtoupper($codigo);
							 $descricao= strtoupper($descricao);
						
						     if ($familia=="sem" or $centro=="sem"){$mensagem="Você deve Definir uma Familia/Centro ";}else{
							 $usu18ussGm = "insert into maquinas(cd_maquina,ds_maquina,tag,patrimonio,modelo,status_maquina,cd_centro,cd_famlia,centro) VALUES(
                            '$codigo','$descricao','$tag','$patrimonio','$modelo','$ativo','$centro','$familia','$centrocusto')";
							 
					         }
							 

							 
							 $resultussGm2 = $conn->Execute($usu18ussGm);
							 $erromostra=$conn->ErrorMsg();
							 $escolha="1";
							 						 
                             require("logerrobi.php");
							 
							 
	                       
	}
	
    

}
}//nao existe escolha



}//final de isnercao

?>		

 </form>
