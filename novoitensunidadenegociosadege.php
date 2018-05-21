<?session_start();?>
<html>

<body>

<head>


<style  type="text/css">
#envolve { width: 1310px;}
 #div_1 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; border:1;float: left; text-align: center; color: #E8E8E8;  }
 #div_2 { position: relative; width: 650px; height: 1200px; background-color: #CAE1FF; float: right; text-align: center; color: #E8E8E8;}
 #clear { clear:both; }




 body{
         width:100%;
	     height:100%;
         background: url(imagemfundotelamaximiza.jpg) no-repeat;

}



</style>


<script LANGUAGE="JavaScript">
function Botao2()
{
document.nome_formulario.action="itensunidadenegociosadege.php";
document.forms.nome_formulario.submit();
}
</script>




</head>


<?
require("configuraoracle.php");
require("estilo2.css");
?>



<form action="novoitensunidadenegociosadege.php"  name="nome_formulario" id="nome_formulario" method="POST" >


<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];
$solicitantepesquisa=$_GET['solicitantepesquisa'];
$fornecedor1=$_GET['fornecedor1'];
$localbanco=$_GET['localbanco'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$data1=$_POST['data1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
    $turno1=$_POST['turno1'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];

			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$criterio=$_POST['criterio'];
			$banco=$_POST['banco'];
			$entrada=$_POST['entrada'];
			$motivo=$_POST['motivo'];
			$hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $setor=$_POST['setor'];
            $horainteirainicio=$_POST['horainteirainicio'];
            $horainteirafinal=$_POST['horainteirafinal'];
            $usuariosolicitante=$_POST['usuariosolicitante'];
            $sequenciamotivo=$_POST['sequenciamotivo'];
            $criterioparada=$_POST['criterioparada'];
            $unidadenegocio=$_POST['unidadenegocio'];
            
            $pedido1=$_POST['pedido1'];
            $fornecedor1=$_POST['fornecedor1'];
            $mes1=$_POST['mes1'];
            $dia1=$_POST['dia1'];
            $ordem1=$_POST['ordem1'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $solicitantenovo=$_POST['solicitantenovo'];
            $recomendacao=$_POST['recomendacao'];
            $fabrica1=$_POST['fabrica1'];
            $banco=$_POST['banco'];
            $descricaoitem=$_POST['descricaoitem'];
            $localbanco=$_POST['localbanco'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}


require("configuramysql.php");

?>
<center><font style='font-size: 34px;color: black;text-align:left;bold: Negrito' >Associando Itens  Fábrica</font></br></center>





<?
   


$today = date('d/m/y H:i:s'); 

if (!IsSet($escolha) or ($escolha=="1")){
?>
<center>


  Fábrica:<select    name="fabrica1">

					 <?
                 $result2 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS order by DS_FABRICA asc ";
				 $result3 = @OCIParse($ora_conexao, $result2);
				 @OCIExecute($result3, OCI_DEFAULT);
				 while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  print "<option value=\"{$row["CD_FABRICA"]}\">{$row["DS_FABRICA"]}</option>";
                 }
                     ?>
					 </select>
					 
					 
    Descrição Item:<input type="txt" name="descricaoitem" >
   
   <input type="button" onclick="Botao2()" value="Retornar">   <input  type="submit" VALUE="Avançar">




        <input type="hidden" name="escolha" value="atualizar4">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
        <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">





<?
}


if ($escolha=="atualizar4") {
?>

<input type="button" onclick="Botao2()" value="Retornar"></input>

<input  type="submit" VALUE="Avançar">

<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
  <th>Itens</th>
  <th>Seleção</th>


</tr>


<?
 echo "Fabrica:$fabrica1</br><hr>";
 
 $descricaoitem=strtoupper($descricaoitem);
 


 $s= OCIParse($ora_conexao, "select CD_MATERIAL ,DS_MATERIAL
 FROM MAT_PECAS  where cd_material not in (select cd_material from MAT_PECAS_FABRICA WHERE CD_FABRICA='$fabrica1') and
 ds_material like '%$descricaoitem%'
               order by DS_MATERIAL asc
              ");


              OCIExecute($s, OCI_DEFAULT);
              While (OCIFetch($s)){



          $codigoS=ociresult($s, "CD_MATERIAL") ;
          $descricaoS=ociresult($s, "DS_MATERIAL") ;



   ?>
   <tr>
   <td><?echo $codigoS;?> </td>
   <td><?echo $descricaoS;?> </td>



   <td><input type="checkbox" name="lista[]" value="<?echo $codigoS;?>"></td>

   </tr>
 <?
 }
 ?>




</table>



        <input type="hidden" name="escolha" value="atualizar5">
        <input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="fabrica1" value="<?echo $fabrica1;?>">
        <input type="hidden" name="entrada" size="5" value="<?echo "GRAVA1";?>" >
        <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
        </br>



<?

}//FINAL DO ATUALIZAR 4

if ($escolha=="atualizar5") {




                                  
                                  $lista=$_POST['lista'];


                                  $result2xistevei89 = "select count(*) CONTADOR
                                  FROM MAT_PECAS
                                  where cd_material not in (select cd_material from MAT_PECAS_FABRICA
                                  WHERE CD_FABRICA='$fabrica1')";
                                  $result3ver89 = @OCIParse($ora_conexao, $result2xistevei89);
				                  @OCIExecute($result3ver89, OCI_DEFAULT);
				                  while (OCIFetchInto($result3ver89,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $ultimo=ociresult($result3ver89, "CONTADOR") ;
                                  }

                                  for ($passa=0;$passa <=$ultimo;$passa++)
                                  {
                                   $acao=$lista[$passa];
                                   if ($acao >"0"){





                                     $sgrava1= OCIParse($ora_conexao, "INSERT INTO MAT_PECAS_FABRICA(CD_MATERIAL,
                                      CD_FABRICA)
                                      values('$acao','$fabrica1' )
                                      ");
                                     OCIExecute($sgrava1, OCI_DEFAULT);
                                     oci_commit($ora_conexao);

                                   }

                                  }//final do loop
                                  
                                  
                                  
                                  
                                  echo "Gravado com Sucesso";



    




?>
        <input type="hidden" name="escolha" size="5" value="1" >
        <input type="hidden" name="continuarmesmatela" value="sim">
        <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
  		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
		<input type="button" onclick="Botao2()" value="Retornar"></input>
		


        

<?
}//FINAL QUANDO grava



?>





</form>


</body>
</html>


