<?
$ano="2013";

$sgrava1 = "delete from periodo_simulacao_bi";
$sgrava12= $conn->Execute($sgrava1);

$sgrava1 = "delete from meses_bi";
$sgrava12= $conn->Execute($sgrava1);

$sgrava1 = "delete from aux_semana where cd_ano='$ano'";
$sgrava12= $conn->Execute($sgrava1);





$sequencia1="1";



    for ($mesestudo=1;$mesestudo <=12;$mesestudo++)
    { 
                    
         
		  if ($mesestudo <"10"){$mesestudo="0".$mesestudo;}        
                  
				                if ($mesestudo=="2"){$ultimodia7="28";
								 $acha = "insert into  meses_bi (CD_MES,QT_DIAS)values('$mesestudo','$ultimodia7')"; 
             	                 $sgrava12= $conn->Execute($acha);
								}
								if (($mesestudo=="1") or ($mesestudo=="3") or ($mesestudo=="5") or ($mesestudo=="7") or ($mesestudo=="8")
									or ($mesestudo=="10") or ($mesestudo=="12")){$ultimodia7="31";
								    $acha = "insert into  meses_bi (CD_MES,QT_DIAS)values('$mesestudo','$ultimodia7')"; 
             	                    $sgrava12= $conn->Execute($acha);
									
								
								}
								if (($mesestudo=="4") or ($mesestudo=="6") or ($mesestudo=="9") or ($mesestudo=="11")){$ultimodia7="30";
								
								    $acha = "insert into  meses_bi (CD_MES,QT_DIAS)values('$mesestudo','$ultimodia7')"; 
             	                    $sgrava12= $conn->Execute($acha);
								}
								
								
			  
		    for ($diaestudo=1;$diaestudo <=$ultimodia7;$diaestudo++)
		    {
                
				  if ($diaestudo <"10"){$diaestudo="0".$diaestudo;}

                  $data = $ano."-".$mesestudo."-".$diaestudo;
                  //dia de semana!
                  list ($year, $month, $day) = explode("-",$data);
                  $timedtE=mktime(0,0,0,$month,$day,$year);

                  $s = date("D",$timedtE); /* Mostra 3 primeiras letras do dia da semana em ingles */
                  $m = date("n",$timedtE); /* Mostra o Mês em números */
                  $d = date("d",$timedtE); /* Mostra dia da semana com 2 algarismos*/
                  $y = date("Y",$timedtE); /* Mostra o ano com 4 algarismos*/

                  $semana = array("Sun" => "Domingo"); /* Dias da Semana. */

                  $dia = $semana[$s];
				  
				  
                  
                                $datapegou12d27s2 = "select NVL(MAX(NR_SEQUENCIA),1) SEQUENCIA1 FROM periodo_simulacao_bi";
                                $datapegou22d27s2 = $conn->Execute($datapegou12d27s2);
                                while ( !$datapegou22d27s2->EOF) {
									
                                         $sequencia2=$datapegou22d27s2->fields["0"];
						                 
				                $datapegou22d27s2->MoveNext();
                                }
				        
                         IF ($sequencia2 >"1"){
                             $sequencia2=$sequencia2+1;
                         }
	                     
				  
				  

				        if ($dia=="Domingo")
						{
				         
						  $diagravacao=$diaestudo;
						 
                        
						     $sequencia1=$sequencia1+1;
                        
					            

						 
					

					       $acha = "insert into  periodo_simulacao_bi (NR_SEQUENCIA,
					                                              NR_SEMANA,
					                                              NR_MES,
                                                                  NR_DIA,CD_ANO,
																  CD_TURNO,ID_DOMINGO)
																  values
			                                                      ('$sequencia2','$sequencia1','$mesestudo','$diagravacao',
																  '$ano','1','S')"; 
             	            $sgrava12= $conn->Execute($acha);
			                
						}
				      
				        else
                        {
		                  
						   					   

						   $acha = "insert into  periodo_simulacao_bi (NR_SEQUENCIA,
						                                         NR_SEMANA,
					                                              NR_MES,
                                                                  NR_DIA,CD_ANO,CD_TURNO,ID_DOMINGO)
																  values
			                                                      ('$sequencia2','$sequencia1','$mesestudo','$diaestudo',
																  '$ano','1','N')"; 
             	           $sgrava12= $conn->Execute($acha);
			               
		                
		 
		                }  
  
		    }//FINAL DOS DIAS
  
    }//final dos meses





//grava as semanas por mes


$acha = "delete from 
aux_semana where cd_ano='$ano'";
$sgrava12= $conn->Execute($acha);


$datapegou12d27s2f = "SELECT DISTINCT NR_SEMANA,NR_MES FROM
periodo_simulacao_bi WHERE CD_TURNO='1' and cd_ano='$ano' ORDER BY NR_SEMANA ASC";
                                $datapegou22d27s2f = $conn->Execute($datapegou12d27s2f);
                                while ( !$datapegou22d27s2f->EOF) {
                                         $semana1=$datapegou22d27s2f->fields["0"];
										 $mes1=$datapegou22d27s2f->fields["1"];


                $datapegou12d27s2f7 = "SELECT MIN(NR_DIA) DIA FROM  
                  periodo_simulacao_bi  WHERE
	              NR_SEMANA='$semana1' AND
				  NR_MES='$mes1'";
                $datapegou22d27s2f7 = $conn->Execute($datapegou12d27s2f7);
				$diaminimo7=$datapegou22d27s2f7->fields["0"];
										 
                  
				 $datapegou12d27s2f72 = "SELECT MAX(NR_DIA) DIA FROM  
                  periodo_simulacao_bi  WHERE
	              NR_SEMANA='$semana1' AND
				  NR_MES='$mes1'";
                $datapegou22d27s2f72= $conn->Execute($datapegou12d27s2f72);
				$diamaximo7=$datapegou22d27s2f72->fields["0"];
				

                  $datapegou12d27s29 = "select NVL(MAX(NR_SEQUENCIA),1) SEQUENCIA1 FROM aux_semana";
                                $datapegou22d27s29 = $conn->Execute($datapegou12d27s29);
                                while ( !$datapegou22d27s29->EOF) {
                                         $sequencia21=$datapegou22d27s29->fields["0"];
						                 
				                $datapegou22d27s29->MoveNext();
                                }

                        
	 
                         IF ($sequencia21 >"0"){
                             $sequencia21=$sequencia21+1;
                         }
	                     


$acha = "insert into  aux_semana (nr_sequencia,
                                  NR_SEMANA,
					              NR_MES,
                                  NR_DIA_INICIAL,
                                  NR_DIA_FINAL,
								  CD_ANO)
								  values
								  ('$sequencia21','$semana1','$mes1','$diaminimo7','$diamaximo7',
																  '$ano')"; 
             	           $sgrava12= $conn->Execute($acha);
			               

$datapegou22d27s2f->MoveNext();
}



				  
				  
	
