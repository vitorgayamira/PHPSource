<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");


?>

<head>
<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data1 = campoData.value;
              if (data1.length == 2){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
      return true;              
              }
              if (data1.length == 5){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
                  return true;
              }
         }

     function mascaraData2(campoData){
              var data2 = campoData.value;
              if (data2.length == 2){
                  data2 = data2 + '/';
                  document.forms[0].data2.value = data2;
      return true;              
              }
              if (data2.length == 5){
                  data2 = data2 + '/';
                  document.forms[0].data2.value = data2;
                  return true;
              }
         }


function Mascara_Hora1(Hora1){ 
var hora01 = ''; 
hora01 = hora01 + Hora1; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora1.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora1(); 
} 
} 
           
function Verifica_Hora1(){ 
hrs = (document.forms[0].Hora1.value.substring(0,2)); 
min = (document.forms[0].Hora1.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora1.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inv�lida!"); 
document.forms[0].Hora1.focus(); 
} 
} 


function Mascara_Hora2(Hora2){ 
var hora02 = ''; 
hora02 = hora02 + Hora2; 
if (hora02.length == 2){ 
hora02 = hora02 + ':'; 
document.forms[0].Hora2.value = hora02; 
} 
if (hora02.length == 5){ 
Verifica_Hora2(); 
} 
} 
           
function Verifica_Hora2(){ 
hrs = (document.forms[0].Hora2.value.substring(0,2)); 
min = (document.forms[0].Hora2.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora2.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inv�lida!"); 
document.forms[0].Hora2.focus(); 
} 
}

</script>


</head>



<form action="<?=$PHP_SELF?>" method="POST">

<?

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
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


}
if ($continuarmesmatela=="sim"){
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
            
            $pedidonovo=$_POST['pedidonovo'];
            $fornecedor1=$_POST['fornecedor1'];
            $mes1=$_POST['mes1'];
            $dia1=$_POST['dia1'];
            $ordem1=$_POST['ordem1'];
            $pessoasolicita=$_POST['pessoasolicita'];
            $solicitantenovo=$_POST['solicitantenovo'];
            $recomendacao=$_POST['recomendacao'];
			$programa=$_POST['programa'];
			$empresasolicita=$_POST['empresasolicita'];
			$empresaliberada=$_POST['empresaliberada'];





}


if (!IsSet($ano)){
$ano=date('Y');

}

if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($pedidonovo)){
                                 $usu18ussMAXPED = "SELECT MAX(NR_PEDIDO) SEQUENCIA FROM SERV_TERC_PEDIDO_ACESSO";
                                  $usu18ussMAXPED2= $conn->Execute($usu18ussMAXPED);
                                  while ( !$usu18ussMAXPED2->EOF) {
                                     $pedidonovoR=$usu18ussMAXPED2->fields["SEQUENCIA"];
                                       if ($pedidonovoR >"0"){$pedidonovo=$pedidonovoR+1;}else{$pedidonovo="1";}

                                  $usu18ussMAXPED2->MoveNext();
                                  }
}


?>

<div  style="display: block;" id="janelagrande1acesso">


        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        Usu�rio:<?echo $edusuario;?>-<?echo $nomepessoa4;?> - Abrindo Solicita��o Nr.<?echo $pedidonovo;?> para  Acesso � <? echo "$razaoempresa";?>
        <a href="NOVASOLICITACAOACESSO.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td> 
        </tr>
        </table>

		

<?




$today = date('d/m/y H:i:s');

                                  $achadesc1= "SELECT DESCRICAO FROM pessoa_bi where codigo='$empresaliberada'";
                                 								  
								  $achadesc2= $conn->Execute($achadesc1);
                                  while ( !$achadesc2->EOF) {
                                     $descricaoempresaliberada=$achadesc2->fields["0"];
                                      

                                  $achadesc2->MoveNext();

								  }

								  $achadesc18= "SELECT DESCRICAO FROM pessoa_bi where codigo='$empresasolicita'";
                                 								  
								  $achadesc28= $conn->Execute($achadesc18);
                                  while ( !$achadesc28->EOF) {
                                     $descricaoempresasolicita=$achadesc28->fields["0"];
                                      

                                  $achadesc28->MoveNext();

								  }



?>
<center>       
<table>
<tr>
<td>Empresa Solicitante</td>
<td>
          <select   name="empresasolicita" >
		             <option value="<?echo $empresasolicita;?>"><?echo $descricaoempresasolicita;?></option>
					 <?
					 $stmt1 = "select codigo,descricao from pessoa_bi where id_tipo_pessoa='2'";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select>
 </td>
 </tr>
 <tr>
<td>Pessoa Solicitante</td>
<td>
          <select   name="pessoasolicita">

					 <?
					 $stmt1 = "select codigo,descricao from pessoa_bi where id_tipo_pessoa='1'";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select>
 </td>
 </tr>

 <tr>
<td>Empresa a ser Liberada</td>
<td>
          <select   name="empresaliberada" onchange="this.form.submit()">
		             <option value="<?echo $empresaliberada;?>"><?echo $descricaoempresaliberada;?></option>
					 <?
					 $stmt1 = "select codigo,descricao from pessoa_bi where id_tipo_pessoa='2'";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select>
 </td>
 </tr>

 




<table>

                 
   
    
    <tr>
  <td>Obs</td>
  <td>
     <textarea  cols="70" rows="5" name="recomendacao" ></textarea>
  </td>
  </tr>

  
  
   
   <input type="hidden" name="servico1"  value="999" >





 </table>
 
 
 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Codigo</th>
  <th>Motivos</th>
  <th>Sele��o</th>


</tr>


<?
  $sql2teste = "SELECT CD_MOTIVO,DS_MOTIVO FROM MOTIVO_SOLICITACAO order by  DS_MOTIVO asc ";
  $resultTER = $conn->Execute($sql2teste);
  while ( !$resultTER->EOF) {

       $codigoS=$resultTER->fields["0"];
       $descricaoS=$resultTER->fields["1"];
       ?>
       <tr>
       <td><?echo $codigoS;?> </td>
       <td><?echo $descricaoS;?> </td>
	   <td><input type="checkbox" name="lista1[]" value="<?echo $codigoS;?>"></td>
       <tr>
	   <?



$resultTER->MoveNext();
}





?>


			



   
 
 


</table>

</br></br>

<center>Dta inicial:<input type="text" name="datainicial"  id="data1" OnKeyUp="mascaraData(this);" maxlength="10" / size="6" >
Hora:<input name="horainicial" type="text" id="Hora1" OnKeyUp="Mascara_Hora1(this.value)" size="5" maxlength="5" size="3">
       Dta final:<input type="text" name="datafinal" id="data2" OnKeyUp="mascaraData2(this);" maxlength="10" / size="6" >
	   Hora :<input name="horafinal" type="text" id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" size="3">


 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="600">

<tr>
  <th>Pessoas a Serem  Liberadas</th>
  <th>Sele��o</th>


</tr>


<?
  $sql2teste88 = "SELECT CODIGO,DESCRICAO FROM pessoa_bi where id_tipo_pessoa='1' and cd_empresa_associada='$empresaliberada'  and  codigo not in (select 
  cd_funcionario from SOLICITACAO_MOTIVO_FUNC_ACESSO where nr_pedido='$pedidonovo') order by  descricao asc ";
  
  $resultTER88 = $conn->Execute($sql2teste88);
  while ( !$resultTER88->EOF) {

       $codigoS=$resultTER88->fields["0"];
       $descricaoS=$resultTER88->fields["1"];
       ?>
       <tr>
       <td><?echo $descricaoS;?> </td>
	   <td><input type="checkbox" name="lista2[]" value="<?echo $codigoS;?>"></td>
       <tr>
	   <?



$resultTER88->MoveNext();
}
?>
 


</table>







		



<?

                                  $usu18ussMAXPED36pri = "SELECT count(*) CONTADOR  FROM usuario_grupo_bi where id_libera_definir_funcionario='S' AND  cd_empresa='$empresasolicita' and cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario')";
                                 								  
								  $usu18ussMAXPED23pri= $conn->Execute($usu18ussMAXPED36pri);
                                  while ( !$usu18ussMAXPED23pri->EOF) {
                                     $liberaaqui=$usu18ussMAXPED23pri->fields["CONTADOR"];
                                      

                                  $usu18ussMAXPED23pri->MoveNext();

								  }






                                  $diahoje=date('d-m-Y');
                                  $dataabertura=$diahoje;
								  $lista1=$_POST['lista1'];
								  $lista2=$_POST['lista2'];


                                  
   
  
  
   
       if($pedidonovo>"0" and $pessoasolicita>"0" and $empresasolicita>"0"  and $lista1>"0" and  $lista2>"0"  )
       {
                 if ($liberaaqui >"0")
                 {        
		   
                                  $query = "INSERT INTO SERV_TERC_PEDIDO_ACESSO (NR_PEDIDO,
                                  DATA_DIGITACAO,
                                  DATA_EMISSAO,
                                  CD_EMPRESA_ACESSO,
                                  CD_EMPRESA_SOLICITANTE,
                                  ID_STATUS)
                                  VALUES($pedidonovo,to_date('$diahoje','dd/mm/YYYY'),to_date('$dataabertura','dd/mm/YYYY'),'$codigoempresa','$empresasolicita','ABER')";
                                 
                                  $result = $conn->Execute($query);

								   $usu18ussMAXPED36 = "SELECT count(*) CONTADOR  FROM  MOTIVO_SOLICITACAO";
                                  $usu18ussMAXPED23= $conn->Execute($usu18ussMAXPED36);
                                  while ( !$usu18ussMAXPED23->EOF) {
                                     $quantosmotivos=$usu18ussMAXPED23->fields["CONTADOR"];
                                      

                                  $usu18ussMAXPED23->MoveNext();
                                  }
								  
								  
                                  for ($passa=0;$passa <=$quantosmotivos;$passa++)
                                  {
                                   $acao1=$lista1[$passa];
                                   if ($acao1 >"0")
								   {
									    $usu18ussMAXPED3 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM  SOLICITACAO_MOTIVO_ACESSO";
                                        $usu18ussMAXPED23= $conn->Execute($usu18ussMAXPED3);
                                        while ( !$usu18ussMAXPED23->EOF) {
                                               $sequenciamaxima39=$usu18ussMAXPED23->fields["SEQUENCIA"];
                                        if ($sequenciamaxima39 >"0"){$sequencia889=$sequenciamaxima39+1;}else{$sequencia889="1";}
                                        $usu18ussMAXPED23->MoveNext();}
										$query = "INSERT INTO SOLICITACAO_MOTIVO_ACESSO(nr_sequencia,
                                      NR_PEDIDO,
                                      CD_EMPRESA_ACESSO,
                                      CD_EMPRESA_SOLICITANTE,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_PESSOA_SOLICITANTE,DS_SOLICITANTE)
                                      values('$sequencia889',$pedidonovo,'$codigoempresa','$empresasolicita','$servico1','$acao1',
                                      '$pessoasolicita','$recomendacao' )";
                                      
                                       $result = $conn->Execute($query);
                                     
								   
								  

								  $usu18ussMAXPED367 = "SELECT count(*) CONTADOR  FROM  MOTIVO_SOLICITACAO";
                                  $usu18ussMAXPED237= $conn->Execute($usu18ussMAXPED367);
                                  while ( !$usu18ussMAXPED237->EOF) {
                                     $quantaspessoas=$usu18ussMAXPED237->fields["CONTADOR"];
                                      

                                  $usu18ussMAXPED237->MoveNext();
                                  }

								  for ($passa2=0;$passa2 <=$quantaspessoas;$passa2++)
                                  {
                                   $acao2=$lista2[$passa2];
                                   if ($acao2 >"0")
								   {
									    $usu18ussMAXPED3 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM  SOLICITACAO_MOTIVO_FUNC_ACESSO";
                                        $usu18ussMAXPED23= $conn->Execute($usu18ussMAXPED3);
                                        while ( !$usu18ussMAXPED23->EOF) {
                                               $sequenciamaxima399=$usu18ussMAXPED23->fields["SEQUENCIA"];
                                        if ($sequenciamaxima399 >"0"){$sequencia8899=$sequenciamaxima399+1;}else{$sequencia8899="1";}
                                        $usu18ussMAXPED23->MoveNext();}
										$query = "INSERT INTO SOLICITACAO_MOTIVO_FUNC_ACESSO(nr_sequencia,
                                      NR_PEDIDO,
                                      CD_EMPRESA_ACESSO,
                                      CD_EMPRESA_SOLICITANTE,
                                      CD_SERVICO,
                                      CD_MOTIVO,
                                      CD_FUNCIONARIO,ID_LIBERADO,DT_LIMITE_ACESSO_INICIAL,HR_INICIO,DT_LIMITE_ACESSO_FINAL,HR_FINAL)
                                      values('$sequencia8899',$pedidonovo,'$codigoempresa','$empresasolicita','$servico1','$acao1',
                                      '$acao2','N',to_date('$datainicial','dd/mm/YYYY'),'$horainicial',										  to_date('$datafinal','dd/mm/YYYY'),'$horafinal')";
                                       
                                       $result = $conn->Execute($query);
                                     
								   
								   }//marcou os funcioanrios
								  }//todos analisados

								   }//marcou os motivos
								  }//todos motivos analisados
								  
								  
								 
             
			 
			 
			 $erromostra=$conn->ErrorMsg();
             
			
			 if(empty($erromostra)  )
             {
             ?>
             <script type="text/javascript">
             var mensagem = "A��o com Sucesso!";
               alert(mensagem);
                document.getElementById('novoscadastros1').style.display = 'none';

                 </script>
               <?
               }
               else
			   {
               ?>
                 <script type="text/javascript">
                 var mensagem = "<?php echo $erromostra;?>";
                  alert(mensagem);
                  document.getElementById('novoscadastros1').style.display = 'none';

                  </script>
                 <?
			   }
             
			 
		 }
		 else
		 {
		    echo "Este Usu�rio n�o Possue Privil�gio para Definir</br> Funcion�rios de Acesso da Empresa Solicitante..veja tela de Parametriza��o";
		 }
	    
		
		}//existem entrada de dados
  



?>


<input type="hidden" name="data" OnKeyUp="mascara_data(this.value)" maxlength="10">
<input type="hidden" name="hora" OnKeyUp="mascara_hora(this.value)" maxlength="5">



 <input type="hidden" name="ano"  value="<?echo $ano;?>" >
  <input type="hidden" name="curva" size="5" value="<?echo $curva;?>" >
  <input type="hidden" name="simulacao" size="5" value="<?echo $sequencia3;?>" >


  <input type="hidden" name="escolha" value="atualizar5">
   <input type="hidden" name="pesomedio" value="<?echo $pesomedio;?>">
   <input type="hidden" name="datagravarinicio" value="<?echo $datagravarinicio;?>">
  <input type="hidden" name="datagravarfinal" value="<?echo $datagravarfinal;?>">

  <input type="hidden" name="quantaslinhasamostra" value="<?echo $quantaslinhasamostra;?>">
  <input type="hidden" name="quantaslinhas2" value="<?echo $quantaslinhas2;?>">
  <input type="hidden" name="quantosmercado" value="<?echo $quantosmercado;?>">
  <input type="hidden" name="primeirasemana" value="<?echo $primeirasemana;?>">
  <input type="hidden" name="segundasemana" value="<?echo $segundasemana;?>">

  <input type="hidden" name="programa" value="<?echo $programa;?>">


      
		<input type="hidden" name="continuarmesmatela" value="sim">
		
		<input type="hidden" name="solicitantepesquisa" value="<?echo $solicitantepesquisa;?>">
		
		<input type="hidden" name="solicitantenovo" value="<?echo $codigofabricasolicitante;?>">
		
		<input type="hidden" name="pedidonovo" value="<?echo $pedidonovo;?>">

		
		<table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>

        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>

        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" ></a>

		


        </td>

        </tr>
        </table>
</div>



</form>



