<?

//teste de integracao




$result28MODA = "select ID_EXISTE_INTEGRACAO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $integraerp=ociresult($result38MODA, "ID_EXISTE_INTEGRACAO_ERP") ;
                 }
                 $result28MODA = "select ID_BANCO_ERP FROM PARAMETRO_ESTOQUE_SADEGE";
                 $result38MODA = @OCIParse($ora_conexao, $result28MODA);
				 @OCIExecute($result38MODA, OCI_DEFAULT);
				 while (OCIFetchInto($result38MODA,&$row8MODA, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $nomedobanco=ociresult($result38MODA, "ID_BANCO_ERP") ;
                 }


echo "Existe Integracao com Erp=$integraerp - Padrão do Banco de Conexão:$nomedobanco</br>";

if ($integraerp=="S" AND $nomedobanco=="SQLSERVER"){

//phpinfo();

     $servidor ="189.11.124.122:1433";
     $porta = "1521";
     $bancoDeDados ="satkfriella";
     $usuario="dbsadege";
     $senha="12345";


     $conexao = mssql_connect($servidor,$usuario,$senha);
     if(!$conexao) {
         die("Não foi possível se conectar ao banco de dados.");
     }

     mssql_select_db($bancoDeDados, $conexao);

     $sql = "SELECT CD_MATERIAL , DS_MATERIAL FROM view_mat_sadege";
     $resultado = mssql_query($sql, $conexao) or die ("Não foi possível executar a consulta");
     while ($linha = mssql_fetch_array($resultado)) {
     $codigomat= $linha["CD_MATERIAL"];
     $descmat= $linha["DS_MATERIAL"];

       ECHO "</BR>CODIGO:$codigomat //DESCRICAO:$descmat";


     }



}

if ($integraerp=="S" AND $nomedobanco=="ORACLE"){



     $usuario2 = "sadege";
     $senha2 = "sadege";

     $ora_bd2 = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=sadege.kyly.com.br)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

     $ora_conexaobusca = OCILogon($usuario2,$senha2,$ora_bd2);

                 $result28 = "select CD_MATERIAL,DS_MATERIAL,CD_UNIDADE,VALOR,SALDO_ESTOQUE,ESTOQUE_MINIMO FROM  MAT_PECAS";
                 $result38 = @OCIParse($ora_conexaobusca, $result28);
				 @OCIExecute($result38, OCI_DEFAULT);
				 while (OCIFetchInto($result38,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $codigomat=ociresult($result38, "CD_MATERIAL") ;
                  $descmat=ociresult($result38, "DS_MATERIAL") ;
                  $unidmat=ociresult($result38, "CD_UNIDADE") ;
                  $saldo=ociresult($result38, "SALDO_ESTOQUE") ;



                  $valor22=ociresult($result38, "VALOR") ;
                  
                  if ($valor22 >"0"){$valor=$valor22;}else{$valor="0";}
                  $estoqueminimo=ociresult($result38, "ESTOQUE_MINIMO") ;

                  $descmat= str_replace('"', "Poleg", $descmat);
                  $descmat= str_replace("'", "Poleg", $descmat);



                 $jaexistebase= "select count(*) CONTADOR from MAT_PECAS where CD_MATERIAL='$codigomat'";
                 $jaexistebase2= @OCIParse($ora_conexao,$jaexistebase);
				 @OCIExecute($jaexistebase2, OCI_DEFAULT);
				 while (OCIFetchInto($jaexistebase2,&$row8MODAe, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $existebase77=ociresult($jaexistebase2, "CONTADOR") ;
                 }


                      IF ($existebase77=="0"){


                                  $result233= "select to_char(SYSDATE,'yyyy/mm/dd hh24:mi:ss') DATA FROM DUAL";
                                  $result333= @OCIParse($ora_conexao, $result233);
				                  @OCIExecute($result333, OCI_DEFAULT);
				                  while (OCIFetchInto($result333,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $diahojeA=ociresult($result333, "DATA") ;
                                  }




                           $sgrava18= OCIParse($ora_conexao, "insert into MAT_PECAS(CD_MATERIAL,DS_MATERIAL,CD_UNIDADE,VALOR,SALDO_ESTOQUE)
                           VALUES('$codigomat','$descmat','$unidmat','$valor','$saldo')");
                           OCIExecute($sgrava18, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           
                                  $result2 = "select MAX(NR_SEQUENCIA) DISTR FROM MOVIMENTO_ESTOQUE_W";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $sequencia1=ociresult($result3, "DISTR") ;
                                  }



                                  IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}

                            echo "</br>insert into MOVIMENTO_ESTOQUE_W (NR_SEQUENCIA,CD_EMPRESA,CD_LOCAL_ESTOQUE,CD_ITEM,
                           DT_MOVIMENTO,QT_RETIRADA,QT_ENTRADA,VL_SALDO)
                           VALUES('$maxima2','NVT','NVT','$codigomat',to_date('$diahojeA','yyyy/mm/dd hh24:mi:ss'),'0','$valor','$valor')";
                           

                           $sgrava18= OCIParse($ora_conexao, "insert into MOVIMENTO_ESTOQUE_W (NR_SEQUENCIA,CD_EMPRESA,CD_LOCAL_ESTOQUE,CD_ITEM,
                           DT_MOVIMENTO,QT_RETIRADA,QT_ENTRADA,VL_SALDO)VALUES('$maxima2','NVT','NVT','$codigomat',to_date('$diahojeA','yyyy/mm/dd hh24:mi:ss'),'0','$valor','$valor')");
                           OCIExecute($sgrava18, OCI_DEFAULT);
                           oci_commit($ora_conexao);
                           

                           
                           
                           
                       }


                 }

 IF ($existebase77=="0"){ECHO "Novos Materiais foram Integrados</br>";}


  // trata entrada via recebimento estoque
     $usuario2 = "maker";
     $senha2 = "maker";

     $ora_bd3 = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

     $ora_conexaobuscarecebimento= OCILogon($usuario2,$senha2,$ora_bd3);


                 $result288= "select CD_MATERIAL,DT_ENTRADA,VL_ENTRADA FROM  VIEW_RECEBIMENTO_MATERIAS";
                 $result388= @OCIParse($ora_conexaobuscarecebimento, $result288);
				 @OCIExecute($result388, OCI_DEFAULT);
				 while (OCIFetchInto($result388,&$row8, OCI_ASSOC+OCI_RETURN_NULLS))
				 {
                  $codigomatr=ociresult($result388, "CD_MATERIAL") ;
                  $datar=ociresult($result388, "DT_ENTRADA") ;
                  $valorr=ociresult($result388, "VL_ENTRADA") ;


                   $jaexistebaseR= "select count(*) CONTADOR from MOVIMENTO_ESTOQUE_W where DT_MOVIMENTO='$datar' and
                   CD_ITEM='$codigomatr' and CD_EMPRESA='NVT' and CD_LOCAL_ESTOQUE='NVT'";
                   $jaexistebase2R= @OCIParse($ora_conexao,$jaexistebaseR);
				   @OCIExecute($jaexistebase2R, OCI_DEFAULT);
				   while (OCIFetchInto($jaexistebase2R,&$row8MODAe, OCI_ASSOC+OCI_RETURN_NULLS))
				   {
                     $existebase77R=ociresult($jaexistebase2R, "CONTADOR") ;
                   }
                   
                     IF ($existebase77R=="0"){


                                  $result2 = "select MAX(NR_SEQUENCIA) DISTR FROM MOVIMENTO_ESTOQUE_W";
                                  $result3 = @OCIParse($ora_conexao, $result2);
				                  @OCIExecute($result3, OCI_DEFAULT);
				                  while (OCIFetchInto($result3,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                    $sequencia1=ociresult($result3, "DISTR") ;
                                  }
                                  IF ($sequencia1 >"0"){$maxima2=$sequencia1+1;}ELSE{$maxima2="1";}


                           $sgrava18= OCIParse($ora_conexao, "insert into MOVIMENTO_ESTOQUE_W (NR_SEQUENCIA,CD_EMPRESA,CD_LOCAL_ESTOQUE,CD_ITEM,
                           DT_MOVIMENTO,QT_RETIRADA,QT_ENTRADA,VL_SALDO)VALUES('$maxima2','NVT','NVT','$codigomatr','$datar','0','$valorr','0')");
                           OCIExecute($sgrava18, OCI_DEFAULT);
                           oci_commit($ora_conexao);

                                  //atualiza  saldo novo
                                  $result2m= "select MAX(DT_MOVIMENTO) DATA FROM MOVIMENTO_ESTOQUE_W where dt_movimento <'$datar' and
                                  CD_ITEM='$codigomat' and cd_empresa='NVT' AND CD_LOCAL_ESTOQUE='NVT'";
                                  $result3m= @OCIParse($ora_conexao, $result2m);
				                  @OCIExecute($result3m, OCI_DEFAULT);
				                  while (OCIFetchInto($result3m,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                  {
                                       $datapegarsaldo=ociresult($result3m, "DATA") ;

                                       $pegaultimosaldo1= "select VL_SALDO FROM MOVIMENTO_ESTOQUE_W where dt_movimento='$datapegarsaldo' and
                                       CD_ITEM='$codigomat' and cd_empresa='NVT' AND CD_LOCAL_ESTOQUE='NVT'";
                                       $pegaultimosaldo12= @OCIParse($ora_conexao,$pegaultimosaldo1);
				                       @OCIExecute($pegaultimosaldo12, OCI_DEFAULT);
				                       while (OCIFetchInto($pegaultimosaldo12,&$row, OCI_ASSOC+OCI_RETURN_NULLS))
				                       {
                                        $valorultimosaldo=ociresult($pegaultimosaldo12, "VL_SALDO") ;

                                        $novosaldo=$valorultimosaldo+$valorr;

                                       }
                                       $sgrava18= OCIParse($ora_conexao, "update  MOVIMENTO_ESTOQUE_W set VL_SALDO='$novosaldo' where
                                       CD_EMPRESA='NVT' and CD_LOCAL_ESTOQUE='NVT' and CD_ITEM='$codigomat' and
                                       DT_MOVIMENTO='$datar'");
                                       OCIExecute($sgrava18, OCI_DEFAULT);
                                       oci_commit($ora_conexao);


                                  }
                                  //FINA ARALIZA SALDO


                       }
                   



                  }//FINAL TRATAR RECEBIMENTO DE ATERIAIS




 echo " Final da Integração";


}




?>
