<?//grava funcionario
	
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
				 
				 $datapegou12d23m= "SELECT count(*) CONTADOR FROM  mat_pecas where CD_MATERIAL='$materialpesquisa'";
                 	 
                 $datapegou22d23m = $conn->Execute($datapegou12d23m);
                 while ( !$datapegou22d23m->EOF) {
                         $existematerial=$datapegou22d23m->fields["0"];
						 
                 $datapegou22d23m->MoveNext();
                 }
				 
				 
				 $datapegou12d24 = "SELECT  to_char(DATA_PLANE,'dd/mm/YYYY') DATA,CD_ATIVIDADE,cd_componente
                      FROM   ORDEM_COMP where   NUMERO_ORDEM='$numeroordempesquisa'";
                 $datapegou22d24 = $conn->Execute($datapegou12d24);
                 while ( !$datapegou22d24->EOF) {
                         $dataplanejada1=$datapegou22d24->fields["0"];
						 $tipogravacao="Planejada";
						 $atividaderava=$datapegou22d24->fields["1"];
						 $componentegrava=$datapegou22d24->fields["2"];
						 
                 $datapegou22d24->MoveNext();
                 }
					
                 $datapegou12d25 = "SELECT  to_char(DATA_INICIO,'dd/mm/YYYY') DATA ,CD_ATIVIDADE,cd_componente
                      FROM   EMER_COMP where  NUMERO='$numeroordempesquisa'";
                 $datapegou22d25 = $conn->Execute($datapegou12d25);
                 while ( !$datapegou22d25->EOF) {
                         $dataplanejada2=$datapegou22d25->fields["0"];
						 $tipogravacao="Não Planejada";
						 $atividaderava=$datapegou22d25->fields["1"];
						 $componentegrava=$datapegou22d25->fields["2"];
						 
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
		   
		      //echo "passa1//tipo:$tipogravacao";
			  //exit;
		   

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

                                  echo"<script type='text/javascript'>";
	                              echo "alert('Registrado Funcionário Ordem');";
	                              echo "</script>";
	                              $status = true;  
                               }
                               else
                               {
                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }

                  }

                  if ($tipogravacao=="Não Planejada"){
                      

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
									
                                         $contador4hora=$pegou78->fields["0"];
						               
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


                                  echo"<script type='text/javascript'>";
	                              echo "alert('Registrado Funcionário Ordem');";
	                              echo "</script>";
	                              $status = true;  
                                  
                                  
                               }
                               else
                               {
                                  echo "Existe Sobreposição de Horas  para este cadastro";
                               }




                   }//final da nao planejada
				   $acha1div="td_cadastro";
	               $acha2div="div_cadastro";

      }//existe funcianrio
      
	  if($existematerial>"0")
      {
		  
                   
				   $acha1div="td_consulta1";
	               $acha2div="div_consulta1";
		//echo "quantidade:$quantidade2//data:$datamaterial//material:$materialpesquisa//ordem:$numeroordempesquisa//localizacao:$localizacao
		//componente:$componentegrava//atividade:$atividaderava//defeito:$defeitomat//motivo:$motivomat//tipo:$tipogravacao";
		
		
		if ($quantidade2 >"0"){
              
			   $data2=substr($datamaterial,0,2);
			   $mes=substr($datamaterial,3,2);
			   $ano=substr($datamaterial,6,4);
               
			   $datapesquisa1=$data2."/".$mes."/".$ano;

                                  if ($tipogravacao=="Não Planejada")
								  {
									  
									  
									  
									  $sgrava1m= "insert into COMP_MAT_EMER(cd_atividade,
                                  cd_componente,
                                  numero,
                                  cd_material,
                                  quant,
                                  localizacao,data_baixa_individual) values
                                  ('$atividaderava','$componentegrava',$numeroordempesquisa,'$materialpesquisa',
                                  $quantidade2,'$localizacao',to_date('$datapesquisa1','dd/mm/YYYY'))";
                                  $sgrava12m= $conn->Execute($sgrava1m);
                                  
                                  
                                  


                                  if ($defeitomat >"0" and $motivomat>"0"){
									  $sgrava1m= "insert into DEFEITO_MATERIAL(cd_atividade,
                                  cd_componente,
                                  numero,
                                  cd_defeito,
                                  cd_motivo,
                                  CD_MATERIAL,
                                  data_baixa_individual
                                  ) values
                                  ('$atividaderava','$componentegrava','$numeroordempesquisa','$defeitomat','$motivomat',
                                  '$materialpesquisa',to_date('$datapesquisa1','dd/mm/YYYY'))";
                                  $sgrava12m= $conn->Execute($sgrava1m);
                                  			  
								  
                                  }
                                  else
                                  {
                                  echo "Defeito e Motivo não Associado ao Material";
                                  }


                                  }//ordem nao planejada
                                  ?><center><?echo "Material:$material28 Gravado com Sucesso..";
                    
     }
     else
     {
     ?><center><?echo "Necessita Definir Quantidade";
     }
				   
				   
	               $acha1div="td_consulta1";
	               $acha2div="div_consulta1";
	  
	  
	  }//final quando existe material
	  
	  
      ?>
      <input type="HIDDEN" name="atividadegrava" value="<?echo $atividadegrava;?>">
	  <?
	   
	 
	  
	  if($existematerial =="0" and $existefuncionario=="0")
      {
	    $acha1div="td_cadastro";
	    $acha2div="div_cadastro";
	  }
	  
?>


