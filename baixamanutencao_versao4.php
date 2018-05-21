<head>

<Script Language="JavaScript">

function mascaraData(campoData){
              var data = campoData.value;
                            if (data.length == 2){
                                              data = data + '/';
                                              document.forms[0].data.value = data;      return true;
                                               }
                                               if (data.length == 5){
                                               data = data + '/';
                                               document.forms[0].data.value = data;
                                               return true;
                                                }         }



function Mascara_Hora2(Hora2)
{
         var hora01 = '';
         hora01 = hora01 + Hora2;
         if (hora01.length == 2){
              hora01 = hora01 + ':';
              document.forms[0].Hora2.value = hora01;
          }
          if (hora01.length == 5){
             Verifica_Hora2();
          }
}

function Mascara_Hora(Hora)
{
         var hora01 = '';
         hora01 = hora01 + Hora;
         if (hora01.length == 2){
           hora01 = hora01 + ':';
           document.forms[0].Hora.value = hora01;
         }
         if (hora01.length == 5){
            Verifica_Hora();
         }
}

function Verifica_Hora()
{
        hrs = (document.forms[0].Hora.value.substring(0,2));
        min = (document.forms[0].Hora.value.substring(3,5));
        estado = "";
       if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
            estado = "errada";
       }

       if (document.forms[0].Hora.value == "") {
          estado = "errada";
       }

        if (estado == "errada") {
            alert("Hora inválida!");
            document.forms[0].Hora.focus();
        }
}


function Verifica_Hora2()
{
           hrs = (document.forms[0].Hora2.value.substring(0,2));
           min = (document.forms[0].Hora2.value.substring(3,5));
           hrsinicio = (document.forms[0].Hora.value.substring(0,2));

           estado = "";
           if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){
              estado = "errada";
           }

           if (document.forms[0].Hora2.value == "") {
              estado = "errada";
           }
           
           if (hrsinicio >= hrs) {
              estado = "errada";
           }

           if (estado == "errada") {
                  document.getElementById('Gravacaofuncionario').disabled = true;
                  alert("Hora inválida!");
                  document.forms[0].Hora2.focus();

           }
           else
           {
           document.getElementById('Gravacaofuncionario').disabled = false;
           document.getElementById('fecharordem').disabled = false;
           }



}



</script>



</head>

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
require_once('manipulasql.class_oraclenovo.php');
//----------------------------------------------------------------
?>



<form action="baixamanutencao_versao4.php"  name=Form1  method="POST">
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
$modelopesquisa=$_GET['modelopesquisa'];
$anopesquisa=$_GET['anopesquisa'];
$fabricantepesquisa=$_GET['fabricantepesquisa'];
$ativopesquisa=$_GET['ativopesquisa'];
$seriepesquisa=$_GET['seriepesquisa'];
$patrimoniopesquisa=$_GET['patrimoniopesquisa'];
$localizacaopesquisa=$_GET['localizacaopesquisa'];
$familiapesquisa=$_GET['familiapesquisa'];
$baseoracle=$_GET['baseoracle'];
$month=$_GET['month'];
$year=$_GET['year'];
$dia=$_GET['dia'];
$fabricapesquisa=$_GET['fabricapesquisa'];
$usuario=$_GET['usuario'];
$banco=$_GET['banco'];
$pagina=$_GET['pagina'];
$ambiente=$_GET['ambiente'];
$localbanco=$_GET['localbanco'];
$listaordemselecionada=$_GET['listaordemselecionada'];
$fabricaescolha=$_GET['fabricaescolha'];
$componente=$_GET['componente'];
$acaoeliminar=$_GET['acaoeliminar'];
$acaogravar=$_GET['acaogravar'];
$atividadegrava=$_GET['atividadegrava'];
$fabricapesquisa=$_GET['fabricapesquisa'];
$grupoordens=$_GET['grupoordens'];
$numeroordempesquisa=$_GET['numeroordempesquisa'];



}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa1=$_POST['turnopesquisa1'];
$turnopesquisa2=$_POST['turnopesquisa2'];
$turno=$_POST['turno'];
$ano=$_POST['ano'];
$ano2=$_POST['ano2'];
$mes=$_POST['mes'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];
        $banco=$_POST['banco'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhasmp=$_POST['quantaslinhasmp'];
			$quantaslinhasnutrientemp=$_POST['quantaslinhasnutrientemp'];
			$existenutriente=$_POST['existenutriente'];
			$telainiciarsimulacao=$_POST['telainiciarsimulacao'];
			$tipoconsulta2=$_POST['tipoconsulta2'];
            $gravandofinal=$_POST['gravandofinal'];
            $existenutriente=$_POST['existenutriente'];
            $itempesquisa2=$_POST['itempesquisa2'];
            $itempesquisa1=$_POST['itempesquisa2'];
            $tipoconsulta1=$_POST['tipoconsulta1'];
            $modelopesquisa=$_POST['modelopesquisa'];
            $anopesquisa=$_POST['anopesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $ativopesquisa=$_POST['ativopesquisa'];
            $seriepesquisa=$_POST['seriepesquisa'];
            $patrimoniopesquisa=$_POST['patrimoniopesquisa'];
            $localizacaopesquisa=$_POST['localizacaopesquisa'];
            $familiapesquisa=$_POST['familiapesquisa'];
            $fabricapesquisa=$_POST['fabricapesquisa'];
            $selecaofabrica=$_POST['selecaofabrica'];
            $contadorlinha=$_POST['contadorlinha'];
            $contadorfamilia=$_POST['contadorfamilia'];
            $contadorfabrica=$_POST['contadorfabrica'];
            $contadorregiao=$_POST['contadorregiao'];
            $contadordistrito=$_POST['contadordistrito'];


            $listamodelo=$_POST['listamodelo'];
            $listafamilia=$_POST['listafamilia'];
            $lista=$_POST['lista'];
            $listafabricante=$_POST['listafabricante'];
            $listaano=$_POST['listaano'];
            $listaregiao=$_POST['listaregiao'];
            $listadistrito=$_POST['listadistrito'];
            $listafabrica=$_POST['listafabrica'];
            $baseoracle=$_POST['baseoracle'];
            $habilita=$_POST['habilita'];

            $usuario=$_POST['usuario'];
            $usuarioinicio=$_POST['usuarioinicio'];
            $senha=$_POST['senha'];
            $senhanova=$_POST['senhanova'];

            $contador66=$_POST['contador66'];
            $listaordem=$_POST['listaordem'];
            $contadorordem=$_POST['contadorordem'];
            $peca=$_POST['peca'];
            $quantidadepeca=$_POST['quantidadepeca'];
            $ordematual=$_POST['ordematual'];
            $atual=$_POST['atual'];
            $datapesquisa1=$_POST['datapesquisa1'];
            $fabricapequisa=$_POST['fabricapequisa'];
            $ordembaixa=$_POST['ordembaixa'];
            $databaixa=$_POST['databaixa'];
            $grupoordens=$_POST['grupoordens'];
            $tipo=$_POST['tipo'];
            $codigomaquina=$_POST['codigomaquina'];
            $fabricaescolha=$_POST['fabricaescolha'];
            $numeroordempesquisa=$_POST['numeroordempesquisa'];
            $modalidade=$_POST['modalidade'];
            $acaogravar=$_POST['acaogravar'];
            $listaordemselecionada=$_POST['listaordemselecionada'];
            $cadastro=$_POST['cadastro'];
            $hora=$_POST['hora'];
            $hora2=$_POST['hora2'];
            $componente=$_POST['componente'];
            $recomendacao=$_POST['recomendacao'];
            $atividadegrava=$_POST['atividadegrava'];
            $contadoreliminar=$_POST['contadoreliminar'];
            $edicao=$_POST['edicao'];
            $atividadepequisa=$_POST['atividadepequisa'];
            $solicitantepesquisainicial=$_POST['solicitantepesquisainicial'];
            $requisicao=$_POST['requisicao'];
            $datasolicitacao=$_POST['datasolicitacao'];
            $solicitante=$_POST['solicitante'];
            $item=$_POST['item'];
            $quantidade=$_POST['quantidade'];
			$numeroordempesquisa=$_POST['numeroordempesquisa'];
			$recomendacao1=$_POST['recomendacao1'];
			$recomendacao88=$_POST['recomendacao88'];
			$data=$_POST['data'];
			


}


$programa="conexao_baixaordem.php";

if (!IsSet($ano)){
$ano=date('Y');
}
?>


<input type="hidden" name="atividadegrava" value="<?echo $atividadegrava;?>">
<input type="hidden" name="componente" value="<?echo $componente;?>">





<center><font style='font-size: 32px;color: black;text-align:left;bold: Negrito' >Baixa de Ordens</font>

<font style='font-size: 15px;color: red;text-align:left;bold: Negrito' ><?echo " Ordem Selecionada:$numeroordempesquisa</br>";?> </font>


<hr>

<?
                 $datapegou12d = "DELETE FROM AUX_BAIXAORDEM WHERE CD_USUARIO='$codigousuario'";
                 $datapegou22d = $conn->Execute($datapegou12d);
                 

                         

$diahoje=date('d-m-Y'); 




//gravacao
IF ($acaogravar=="GFUNC"){
	
	              $datapegou12d2 = "SELECT  CADASTRO,CD_CARGO  FROM  FUNCIONARIO_SADEGE WHERE
                  CADASTRO='$cadastro' ";
                 $datapegou22d2 = $conn->Execute($datapegou12d2);
                 while ( !$datapegou22d2->EOF) {
                         $codigofuncioanriogravar=$datapegou22d2->fields["0"];
						 $cargo=$datapegou22d2->fields["1"];
                 $datapegou22d2->MoveNext();
                 }
					
				 $datapegou12d23 = "SELECT count(*) CONTADOR FROM  FUNCIONARIO_SADEGE WHERE CADASTRO='$cadastro' ";				 
                 $datapegou22d23 = $conn->Execute($datapegou12d23);
                 while ( !$datapegou22d23->EOF) {
                         $existefuncionario=$datapegou22d23->fields["0"];
						 
                 $datapegou22d23->MoveNext();
                 }
				 $datapegou12d24 = "SELECT  to_char(DATA_PLANE,'dd/mm/YYYY') DATA,CD_ATIVIDADE
                      FROM   ORDEM_COMP where   NUMERO_ORDEM='$numeroordempesquisa'";
                 $datapegou22d24 = $conn->Execute($datapegou12d24);
                 while ( !$datapegou22d24->EOF) {
                         $dataplanejada1=$datapegou22d24->fields["0"];
						 $tipogravacao="Planejada";
						 $atividaderava=$datapegou22d24->fields["1"];
						 
                 $datapegou22d24->MoveNext();
                 }
					
                 $datapegou12d25 = "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA ,CD_ATIVIDADE
                      FROM   EMER_COMP where  NUMERO='$numeroordempesquisa'";
                 $datapegou22d25 = $conn->Execute($datapegou12d25);
                 while ( !$datapegou22d25->EOF) {
                         $dataplanejada2=$datapegou22d25->fields["0"];
						 $tipogravacao="Não Planejada";
						 $atividaderava=$datapegou22d25->fields["1"];
						 
                 $datapegou22d25->MoveNext();
                 }
                     
				 
				 
					  
                      

                      IF($tipogravacao=="Não Planejada"){
                      $dataplanejadamostra5= $dataplanejada2;

                      }
                      else
                      {
                      $dataplanejadamostra5= $dataplanejada1;

                      }
  

  

       if ($existefuncionario>"0"){
		   
		  
		   

                             // $datapesquisa1=$data1."/".$month."/".$year;
                              //$datapesquisa2=$data2."/".$month."/".$year;
                        //echo "data1:$datapesquisa1//dat2:$datapesquisa2";
						
						

                 if ($tipogravacao=="Planejada"){;

				 
				 
                                $minutoapoio1=substr($hora,3,2);
                                $horaacumulada1=$minutoapoio1/60;
                                $horaapoio1=substr($hora,0,2);
                                $horaacumulada1final=$horaacumulada1+$horaapoio1;
                                $minutoapoio2=substr($hora2,3,2);
                                $horaacumulada2=$minutoapoio2/60;
                                $horaapoio2=substr($hora2,0,2);
                                $horaacumulada2final=$horaacumulada2+$horaapoio2;
                                $diferencahora=$horaacumulada2final-$horaacumulada1final;
                            
                            
                                //teste de hora sobreposicao
								
								
                                
                                
								$datapegou12d26 = "SELECT COUNT(*)  CF1 FROM
                                COMP_FUNC CF WHERE CF.DATA_BAIXA_INDIVIDUAL =to_date('$data','dd/mm/YYYY')
                                AND CF.CADASTRO = '$cadastro' AND
                                ((CF.HR_INI >= '$hora' AND CF.HR_INI < '$hora2' ) OR ( CF.HR_INI <='$hora'  AND   CF.HR_FIM >'$hora'))";
                                $datapegou22d26 = $conn->Execute($datapegou12d26);
                                while ( !$datapegou22d26->EOF) {
                                         $contador1hora=$datapegou22d26->fields["0"];
						                 
				                $datapegou22d26->MoveNext();
                                }
								$datapegou12d27 = "SELECT COUNT(*)  CF2        FROM COMP_FUNC CF
                                WHERE CF.DATA_BAIXA_INDIVIDUAL = to_date('$data','dd/mm/YYYY')
                                AND CF.CADASTRO = '$cadastro'
                                AND ((CF.HR_FIM > '$hora' AND CF.HR_FIM <=  '$hora2') OR (CF.HR_INI <='$hora2' AND CF.HR_FIM >'$hora2'))";
                                $datapegou22d27 = $conn->Execute($datapegou12d27);
                                while ( !$datapegou22d27->EOF) {
                                         $contador2hora=$datapegou22d27->fields["0"];
						                 
				                $datapegou22d27->MoveNext();
                                }
								
								                                
                                
                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }

                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }
                                
								
								

                               if ($contador1hora=="0" and $contador2hora=="0" and $contador5hora=="0" and $contador6hora=="0"){

                               
                                  $sgrava1 = "INSERT INTO COMP_FUNC(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO_ORDEM,CD_CARGO,HR_INI,HR_FIM,HORAS,CD_MODALIDADE,
                                  HORA_INICIO,HORA_FIM,CD_ATIVIDADE,OBS_FUNC )
                                  VALUES ('$cadastro',to_date('$data','dd/mm/YYYY'),'$componente','$numeroordempesquisa','$cargo','$hora','$hora2',$diferencahora,
                                  '$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava','$recomendacao1')";
								  
								  
                                  $sgrava12= $conn->Execute($sgrava1);
								  
								  
								  
                                  
                                  
                                  if (strlen($_POST['recomendacao1']) != 0)
                                  {
									  $recomendacaograva=$recomendacao88."-".$recomendacao1;
                                  
								     $sgrava1 = "update ORDEM_COMP SET recomendacao='$recomendacaograva'
                                  WHERE NUMERO_ORDEM='$numeroordempesquisa'";
                                  $sgrava12= $conn->Execute($sgrava1);
								  
								  
								  

                                  }

                                  echo "Registrado Funcionário nesta Ordem";
                               }
                               else
                               {
                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }

                  }

                  if ($tipogravacao=="Não Planejada"){;


                            $minutoapoio1=substr($hora,3,2);
                            $horaacumulada1=$minutoapoio1/60;
                            $horaapoio1=substr($hora,0,2);
                            $horaacumulada1final=$horaacumulada1+$horaapoio1;
                            
                            
                            $minutoapoio2=substr($hora2,3,2);
                            $horaacumulada2=$minutoapoio2/60;
                            $horaapoio2=substr($hora2,0,2);
                            $horaacumulada2final=$horaacumulada2+$horaapoio2;
                            $diferencahora=$horaacumulada2final-$horaacumulada1final;
                            
                            
                            //teste de hora sobreposicao
							
							
							
							    $pegou99= "SELECT COUNT(*) FROM
                                COMP_FUNC_EMER   WHERE DATA_BAIXA_INDIVIDUAL=to_date('$data','dd/mm/YYYY')
                                AND CADASTRO ='$cadastro' AND ((HR_INI >= '$hora' AND HR_INI < '$hora2' ) OR ( HR_INI <='$hora'  AND HR_FIM >'$hora'))";
                               	
								
								
								$pegou100= $conn->Execute($pegou99);
                                while ( !$pegou100->EOF) {
									  
                                         $contador3hora=$pegou100->fields["0"];
						                 
				                $pegou100->MoveNext();
                                }
								
							    	
								
								$pegou77= "SELECT COUNT(*) FROM COMP_FUNC_EMER WHERE DATA_BAIXA_INDIVIDUAL=to_date('$data','dd/mm/YYYY')
								AND CADASTRO='$cadastro' AND  ((HR_FIM >'$hora' AND HR_FIM <='$hora2') OR (HR_INI <='$hora2' AND HR_FIM >'$hora2'))";
							    								
								$pegou78=$conn->Execute($pegou77);
                                while (!$pegou78->EOF) {
									echo "</br>entra1";
                                         $contador4hora=$pegou78->fields["0"];
						             echo "</br>entra2";    
				                $pegou78->MoveNext();
                                }

                               


                                
                                

                                if ($horaacumulada1final >$horaacumulada2final and $horaacumulada2final>"0"){
                                  $contador5hora="1";
                                }
                                else
                                {
                                 $contador5hora="0";
                                }
                                
                                if ($horaacumulada1final =="0" and $horaacumulada2final>"0"){
                                  $contador6hora="1";
                                }
                                else
                                {
                                 $contador6hora="0";
                                }
								
                                
								

                                if ($contador3hora=="0" and $contador4hora=="0" and $contador5hora=="0" and $contador6hora=="0"){
                                  
                                  $sgrava1 = "INSERT INTO COMP_FUNC_EMER(CADASTRO,
                                  DATA_BAIXA_INDIVIDUAL,CD_COMPONENTE,NUMERO,CD_CARGO,HR_INI,HR_FIM,HORA,CD_MODALIDADE,HORA_INICIO,HORA_FIM,CD_ATIVIDADE,OBS_FUNC)
                                  VALUES ('$cadastro',to_date('$data','dd/mm/YYYY'),'$componente','$numeroordempesquisa','$cargo','$hora','$hora2',$diferencahora,'$modalidade',$horaacumulada1final,$horaacumulada2final,'$atividadegrava','$recomendacao1')";
                                  $sgrava12= $conn->Execute($sgrava1);
								  
								  	  
								  
								 
                                  

                                  if (strlen($_POST['recomendacao1']) != 0)
                                  {
									$recomendacaograva=$recomendacao88."-".$recomendacao1;
									
                                    $sgrava1 = "update EMER_COMP SET recomendacao='$recomendacaograva'
                                  WHERE NUMERO='$numeroordempesquisa'";
                                  $sgrava12= $conn->Execute($sgrava1);
								  
								  
								 							  

                                  }



                                  
                                  echo "Registrado Funcionário nesta Ordem";
                               }
                               else
                               {
                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }




                   }//final da nao planejada

      }//existe funcianrio
      else
      {//nao existe funcioanrio
      ?>
        <input type="HIDDEN" name="atividadegrava" value="<?echo $atividadegrava;?>">

      <?echo "</br>Cadastro de Funcionário não existe na base de dados";
      }


}//final grava  so funcioanrio

IF ($acaogravar=="pediconfirmaordem"){
?>
<div  style="display: block;" id="mostramensagem1">
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <a href="baixamanutencao_versao4.php?navegando=sim&escolha=maodeobra&banco=<?echo $banco;?>&numeroordempesquisa=<?echo $numeroordempesquisa;?>">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
        </br></br></br>
        <?echo "Deseja Realmente Concluir a Ordem";?>
        </br></br></br></br></br></br>
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        

        <input type="hidden" name="escolha" size="5" value="Baixar final" >

        <input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		<input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		<input type="hidden" name="continuarmesmatela" value="sim">
		<input type="hidden" name="banco" value="<?echo $banco;?>">
		<input type="hidden" name="listaordemselecionada" value="<?echo $listaordemselecionada;?>">
		<input type="hidden" name="contadoreliminar" value="<?echo $contadoreliminar;?>">

		<input type="hidden" name="tipogravacao" value="<?echo $contadoreliminar;?>">


        <a href="baixamanutencao_versao4.php?navegando=sim&escolha=maodeobra&banco=<?echo $banco;?>&numeroordempesquisa=<?echo $numeroordempesquisa;?>&acaogravar=nao">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>
        
        <a href="baixamanutencao_versao4.php?navegando=sim&banco=<?echo $banco;?>&numeroordempesquisa=<?echo $numeroordempesquisa;?>&acaogravar=finalizarordem">
        <IMG src="okmensagem.png" width="92" height="48" ></a>




        </td>

        </tr>
        </table>

</div>


<?
}//primeira etapa da conclusao

IF ($acaogravar=="finalizarordem"){
	
	                            $datapegou12d30 = "SELECT  to_char(DATA_PLANE,'dd/mm/YYYY') DATA,CD_ATIVIDADE
                                FROM   ORDEM_COMP where   NUMERO_ORDEM='$numeroordempesquisa'";
                                $datapegou22d30 = $conn->Execute($datapegou12d30);
                                while ( !$datapegou22d30->EOF) {
                                         $tipogravacao="Planejada";
						                 
				                $datapegou22d30->MoveNext();
                                }
								$datapegou12d31 = "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA ,CD_ATIVIDADE
                                FROM   EMER_COMP where  NUMERO='$numeroordempesquisa'";
                                $datapegou22d31 = $conn->Execute($datapegou12d31);
                                while ( !$datapegou22d31->EOF) {
                                         $tipogravacao="Não Planejada";
						                 
				                $datapegou22d31->MoveNext();
                                }
	
	                            $datapegou12d32 = "SELECT count(*) CONTADOR FROM  EMER_COMP WHERE
                                NUMERO='$numeroordempesquisa' and recomendacao is null  ";
                                $datapegou22d32 = $conn->Execute($datapegou12d32);
                                while ( !$datapegou22d32->EOF) {
                                         $quantosrecomc=$datapegou22d32->fields["0"];
						                 
				                $datapegou22d32->MoveNext();
                                }
								$datapegou12d33 = "SELECT count(*) CONTADOR FROM  ORDEM_COMP WHERE
                                NUMERO_ORDEM='$numeroordempesquisa'  and recomendacao is null ";
                                $datapegou22d33 = $conn->Execute($datapegou12d33);
                                while ( !$datapegou22d33->EOF) {
                                         $quantosrecomp=$datapegou22d33->fields["0"];
						                 
				                $datapegou22d33->MoveNext();
                                }
								$datapegou12d34 = "SELECT count(*) CONTADOR FROM  COMP_FUNC WHERE
                                NUMERO_ORDEM='$numeroordempesquisa'  ";
                                $datapegou22d34 = $conn->Execute($datapegou12d34);
                                while ( !$datapegou22d34->EOF) {
                                         $quantos666p=$datapegou22d34->fields["0"];
						                 
				                $datapegou22d34->MoveNext();
                                }
								$datapegou12d35 = "SELECT count(*) CONTADOR FROM  COMP_FUNC_EMER WHERE
                                NUMERO='$numeroordempesquisa' ";
                                $datapegou22d35 = $conn->Execute($datapegou12d35);
                                while ( !$datapegou22d35->EOF) {
                                         $quantos666c=$datapegou22d35->fields["0"];
						                 
				                $datapegou22d35->MoveNext();
                                }
	                  
					            $datapegou12d36 = "SELECT MAX(DATA_BAIXA_INDIVIDUAL) DATA
                                FROM  COMP_FUNC_EMER WHERE
                                NUMERO='$numeroordempesquisa'  ";
                                $datapegou22d36 = $conn->Execute($datapegou12d36);
                                while ( !$datapegou22d36->EOF) {
                                         $datamaximabaixa=$datapegou22d36->fields["0"];
						                 
				                $datapegou22d36->MoveNext();
                                } 
                     					  
                                $datapegou12d37 = "select count(*) CONTADOR
                                  FROM  SERV_TERC_ITENS a,SERV_TERC_PEDIDO b
                                  where
                                  a.nr_pedido=b.nr_pedido and
                                  b.ID_STATUS not  in ('FINA')  AND
                                  b.NR_ORDEM_SERVICO='$numeroordempesquisa'";
                                $datapegou22d37 = $conn->Execute($datapegou12d37);
                                while ( !$datapegou22d37->EOF) {
                                         $ultimo780=$datapegou22d37->fields["0"];
						                 
				                $datapegou22d37->MoveNext();
                                } 


                                  
 

 if ($tipogravacao=="Não Planejada")
 {
 


                                  IF ($ultimo780=="0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS

                                    
                                   if ($quantos666c=="0")
                                   {
                                   echo "Ordem sem Funcionários";
                                   $medeacao="mesmaordem";
                                   }
                                   else
                                   {
                                    if ($quantosrecomc=="0"){
									 
									   $sgrava1 = "update EMER_COMP SET STATUS='B',
                                       DATA_FIM='$datamaximabaixa'
                                       WHERE NUMERO='$numeroordempesquisa'";
                                       $sgrava12= $conn->Execute($sgrava1);
									                                      
                                       echo "Concluida Ordem:$numeroordempesquisa";
                                       $medeacao="novaordem";

                                       
                                       
                                    }
                                    else
                                    {
                                     echo "Ordem sem Recomendação Não é possível Concluir";
                                     $medeacao="mesmaordem";
                                    }
                                    
                                  }



                                  }
                                  else
                                  {
                                   echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
                                   $medeacao="mesmaordem";
                                  }
                                  
 }
 else
 {
	
	 

                            IF ($ultimo780=="0"){//TODOS OS SERVICOS ESTAO COMO FINALIZADOS

                             if ($quantos666p=="0")
                                   {
                                   echo "Ordem sem Funcionários";
                                   $medeacao="mesmaordem";
                                   }
                                   else
                                   {
									   
									    $datapegou12d38 = "SELECT MAX(DATA_BAIXA_INDIVIDUAL) DATA
                                        FROM  COMP_FUNC WHERE
                                        NUMERO_ORDEM='$numeroordempesquisa' ";
                                        $datapegou22d38 = $conn->Execute($datapegou12d38);
                                        while ( !$datapegou22d38->EOF) {
                                         $datamaximabaixa=$datapegou22d38->fields["0"];
						                 $datapegou22d38->MoveNext();
                                        } 
										$datapegou12d39 = "SELECT MIN(DATA_BAIXA_INDIVIDUAL) DATA
                                        FROM  COMP_FUNC WHERE
                                        NUMERO_ORDEM='$numeroordempesquisa' ";
                                        $datapegou22d39 = $conn->Execute($datapegou12d39);
                                        while ( !$datapegou22d39->EOF) {
                                         $dataminimabaixa=$datapegou22d39->fields["0"];
						                 $datapegou22d39->MoveNext();
                                        } 
										
										
										
										
										
                                    if ($quantosrecomp=="0"){
										
										$sgrava1 = "update ORDEM_COMP SET DATA_TERMINO='$datamaximabaixa',DATA_INICIO='$dataminimabaixa'
                                       WHERE NUMERO_ORDEM='$numeroordempesquisa'";
                                       $sgrava12= $conn->Execute($sgrava1);
									   
									   $sgrava1 = "update ORDEM_COMP SET STATUS='B'
                                       WHERE NUMERO_ORDEM='$numeroordempesquisa'";
                                       $sgrava12= $conn->Execute($sgrava1);
									  								   
                                       echo "Concluida Ordem:$numeroordempesquisa";
                                       $medeacao="novaordem";
                                    }
                                    else
                                    {
                                     echo "Ordem sem Recomendação Não é possível Concluir";
                                     $medeacao="mesmaordem";
                                    }

                                  }


                            }
                            else
                            {
                                  echo "Existe Serviço Terceiro Não Finalizado para a  Ordem:$listaordemselecionada";
                                  $medeacao="mesmaordem";
                            }


 }
 

}//final quando so conckuir ordem


//============     



  $datapegou12d40 = "select  NUMERO,
                       CD_MAQUINA MAQUINA,
                       DATA_INICIO DATA,
                       CD_FABRICA,CD_ATIVIDADE,
                       CD_COMPONENTE,
                       1 TIPO,
                       OBS,
                       SOLICITANTE
                       FROM EMER_COMP
                       where STATUS='G'   and
                       NUMERO like '%$numeroordempesquisa%' 
                       union
                       select  NUMERO_ORDEM NUMERO,
                       CD_MAQUINA MAQUINA,
                       DATA_PLANE DATA,
                       CD_FABRICA ,
                       CD_ATIVIDADE,
                       CD_COMPONENTE,
                       2 TIPO,
                       OBS,
                       SOLICITANTE
                       FROM ORDEM_COMP
                       where STATUS='G'    and
                       NUMERO_ORDEM like '%$numeroordempesquisa%'  ";
        
	  
	  $datapegou22d40 = $conn->Execute($datapegou12d40);
      while ( !$datapegou22d40->EOF) {                    
       
                       
	  $quantospendentes1="0";
      $quantospendentes2="0";
      $ordem=$datapegou22d40->fields("NUMERO") ;
      $componente=$datapegou22d40->fields("CD_COMPONENTE") ;
      $tipoordem=$datapegou22d40->fields("TIPO") ;

	  
	  
	  
	  
      IF ($grupoordens=="C"){
      $horainicio77=$datapegou22d40->fields("HORA_INICIO") ;
      $minutoinicio77=$datapegou22d40->fields("MINUTO_INICIO") ;
      }
      
      $atividaderecuperada=$datapegou22d40->fields("CD_ATIVIDADE") ;
      
      $contadorordem=$contadorordem+1;
	        
                                  
      
	  
	  ?>
      </br>
     

      Máquina:<? echo $datapegou22d40->fields("MAQUINA");?>
      Componente:<? echo $datapegou22d40->fields("CD_COMPONENTE");?>
      Atividade:<? echo $datapegou22d40->fields("CD_ATIVIDADE");?></br>
      Solicitação:<? echo $datapegou22d40->fields("SOLICITANTE");?>--><?echo $datapegou22d40->fields("OBS");
                      


	
	$datapegou22d40->MoveNext();
	}
	
	
	?>
  


    
    <input type="hidden" name="atual" value="<?echo $atual;?>">
    <input type="hidden" name="datapesquisa1" value="<?echo $datapesquisa1;?>">
    <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		<input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		<input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		<input type="hidden" name="banco" value="<?echo $banco;?>">

<?
if ($medeacao=="novaordem"){
	?>
	<a href="consultaordensv5.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&numeroordempesquisa=<?ECHO $numeroordempesquisa;?>&grupoordens=T">Retornar</a></td>
<?
}
else
{
?>	



 <a href="baixamanutencao_versao4.php?escolha=maodeobra&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&numeroordempesquisa=<? echo $numeroordempesquisa;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&acaogravar=incluirregistro&atividadegrava=<?ECHO $atividadegrava;?>">Mão Obra</a></td>
|
<a href="baixamanutencao_versao4.php?escolha=Baixar final&tela=0&mes=<?echo $mes;?>&ano=<?echo $ano;?>&turnopesquisa=<?echo $turnopesquisa;?>&curva=<?echo $curva;?>&ano=<?echo $ano;?>&componente=<?echo $componente;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&navegando=sim&banco=<?echo $banco;?>&ambiente=<?ECHO $ambiente;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&atividadegrava=<?ECHO $atividadegrava;?>&acaogravar=pediconfirmaordem&numeroordempesquisa=<? echo $numeroordempesquisa;?>">Concluir Ordem</a></td>
|
<a href="consultaordensv5.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&baseoracle=<?ECHO $baseoracle;?>&localbanco=<?ECHO $localbanco;?>&numeroordempesquisa=<?ECHO $numeroordempesquisa;?>&grupoordens=T">Retornar</a></td>

 
 
 <?



if ($escolha=="maodeobra"){


$datapegou12d45="SELECT * from (select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,
              a.NUMERO NUMERO,a.HORA HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,
			  c.DS_MODALIDADE MODALIDADE2
              from  COMP_FUNC_EMER a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
              WHERE a.NUMERO='$numeroordempesquisa' AND a.cadastro=b.cadastro and a.cd_modalidade=c.cd_modalidade
              UNION
              select b.NOME NOME,a.CADASTRO CADASTRO,a.DATA_BAIXA_INDIVIDUAL DATABAIXA,a.CD_COMPONENTE CD_COMPONENTE,
			  a.NUMERO_ORDEM NUMERO_ORDEM,a.HORAS HORAMOSTRA ,a.CD_CARGO CD_CARGO,a.HR_INI HR_INI,a.HR_FIM HR_FIM,
			  c.DS_MODALIDADE MODALIDADE2 from  COMP_FUNC  a,FUNCIONARIO_SADEGE b,MODALIDADE_HORA c
			  WHERE a.NUMERO_ORDEM='$numeroordempesquisa' and a.cadastro=b.cadastro and 
			  a.cd_modalidade=c.cd_modalidade)";
                 

	 
			  
$somahora="0";			  
 ?>


 <center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="60%">

    <tr>
    <h1 style='font-size: 19px;color: RED;bold: Negrito text-decoration: none'>
    <?echo "</br>Registro de Horas Trabalhadas  pelos Mantenedores";?></h1>
    <th>Cadastro</th>
    <th>Nome</th>
    <th>Modalidade</th>
   	<th>Hora Inicio</th>
	<th>Hora Fim</th>
	<th>Total de Horas</th>
    <th>Data Execução</th>





    </tr>
    <?
	
	 
    $datapegou22d45 = $conn->Execute($datapegou12d45);
    while ( !$datapegou22d45->EOF) {  
	
    ?>
      <tr>

      <td><center><? echo $datapegou22d45->fields("CADASTRO");?></td>
      <td><center><? echo $datapegou22d45->fields("NOME");?></td>
      <td><center><? echo $datapegou22d45->fields("MODALIDADE2");?></td>
      <td><center><? echo $datapegou22d45->fields("HR_INI");?></td>
      <td><center><? echo $datapegou22d45->fields("HR_FIM");?></td>
      <td><center><?
         $horatotal=$datapegou22d45->fields("HORAMOSTRA") ;
         $horatotal= str_replace(",", ".","$horatotal" );
         
         $horacheia=floor($horatotal);
         
         $somahora=$somahora+$horatotal;
         
         
         $minutocheio=($horatotal-$horacheia)*60;
		 $minutocheio=number_format($minutocheio, 0, ',', '.');
		 
         $mostranovotempo=$horacheia.":".$minutocheio;

      echo $mostranovotempo;?></td>

      <td><center><? echo $datapegou22d45->fields("DATABAIXA");?></td>


    </tr>
    <?
    $datapegou22d45->MoveNext();
	}
    ?>
    <tr>
	<td>Total</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><?$somahoracheia=floor($somahora);
         
         
         
         
         $minutocheiosoma=($somahora-$somahoracheia)*60;
		 $minutocheiosoma=number_format($minutocheiosoma, 0, ',', '.');
		 
         $mostranovovalor=$somahoracheia.":".$minutocheiosoma;
	
	
	?><center><?echo $mostranovovalor;?></td>
	<td></td>
	</tr>
	
	
	</table>
	<hr>
	
	<h1 style='font-size: 13px;color: RED;bold: Negrito text-decoration: none'>Novo Registro</h1>


<?




                      ?>
                      Nr Cadastro:<input type="TXT" name="cadastro"   size="7" >
                      Modalidade:<select name="modalidade">
                 <option value="<?echo $modalidade;?>"><? echo $modalidademostra;?></option>
                 <?
				 $stmt1 = "SELECT distinct CD_MODALIDADE,DS_MODALIDADE FROM MODALIDADE_HORA ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
				 			 
				 ?>
				 </select>


                      Hora Inicio:<input type="TXT" name="hora"  id="Hora" OnKeyUp="Mascara_Hora(this.value)" size="5" maxlength="5" value="00:00">
                      Hora Fim:<input type="txt" name="hora2"  id="Hora2" OnKeyUp="Mascara_Hora2(this.value)" size="5" maxlength="5" value="00:00">

                      Data:
                      <input type="text" name="data"  OnKeyUp="mascaraData(this);" maxlength="10"  / VALUE="<?echo $dataplanejadamostra5;?>" >
					  
					  <?
					  //acha utima recomendacao
					               $datapegou12d47 = "SELECT  recomendacao RECO from EMER_COMP where NUMERO='$numeroordempesquisa'
                                   union
                                   SELECT  recomendacao from ORDEM_COMP where NUMERO_ORDEM='$numeroordempesquisa'";
                                   $datapegou22d47 = $conn->Execute($datapegou12d47);
                                   while ( !$datapegou22d47->EOF) {
                                         $recomendacao88=$datapegou22d47->fields["0"];
						                 
				                  $datapegou22d47->MoveNext();
                                  } 
					  
                      
                      ?>
					  </br>
					  Historico de Serviços</br>
                      <textarea  cols="76" rows="5" name="recomendacao" disabled><?echo $recomendacao88;?></textarea></br>

                      Nova Descrição do Serviço</br>
                      <textarea  cols="76" rows="5" name="recomendacao1" ></textarea></br>
					  <input type="hidden" name="recomendacao88"  size="5" value="<?echo $recomendacao88;?>">

                      <input type="hidden" name="mes"  size="5" value="<?echo $mes;?>">
			          <input type="hidden" name="ano"  size="5" value="<?echo $ano;?>">
                      <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
			          <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
			          <input type="hidden" name="escolha" value="<?echo $escolha;?>">
			          <input type="hidden" name="baseoracle" value="<?echo $baseoracle;?>">
		              <input type="hidden" name="localbanco" value="<?echo $localbanco;?>">
		              <input type="hidden" name="ambiente" value="<?echo $ambiente;?>">
		              <input type="hidden" name="banco" value="<?echo $banco;?>">
		              <input type="hidden" name="numeroordempesquisa" value="<?echo $numeroordempesquisa;?>">
		              
		              <input type="hidden" name="componente" value="<?echo $componente;?>">






                      </br>
                      </center>
                      


</tr>
</table>

  <input type="hidden" name="acaogravar" value="GFUNC">
  <input  type="submit"   VALUE="Gravar">
	
	
	

<?
}//final quando é maodeobra

}//quando nao é nova ordem vinda da conclusao

?>

</form>

