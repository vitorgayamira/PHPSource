<?

require("configuraoracle.php");

$sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_unitario='0' ,vl_total='0'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);

                            $sgrava1= OCIParse($ora_conexao, "update mat_pecas set valor='0' where valor is null");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);





$sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET cd_centro_custo='MNG'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);
                            
 echo "Final do Ajuste de Destino</br>";
                            
$smcusto= OCIParse($ora_conexao, "select a.seq SEQUENCIA,a.CD_COMBUSTIVEL COMBU,a.QTDE_ABASTECIDA QUANT,b.VALOR VALOR
                                   FROM CONSUMO_COMBUSTIVEL a,mat_pecas b
                                  where a.cd_combustivel=b.cd_material and
                                  a.vl_unitario='0'");
                OCIExecute($smcusto, OCI_DEFAULT);
                While (OCIFetch($smcusto)) {

          $quantidade=ociresult($smcusto,"QUANT") ;
          $valor6=ociresult($smcusto, "VALOR") ;

          $quantidade= str_replace(",", ".","$quantidade" );
          $valor6= str_replace(",", ".","$valor6" );


          $gravacusto=$quantidade*$valor6;
          
          $sequencia6=ociresult($smcusto, "SEQUENCIA") ;



          $sgrava18= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_unitario=$valor6,vl_total=$gravacusto
          where  seq='$sequencia6'");
                            OCIExecute($sgrava18, OCI_DEFAULT);
                            oci_commit($ora_conexao);

       }//final quando custo
       



       $smcusto= OCIParse($ora_conexao, "select a.seq SEQUENCIA,a.CD_COMBUSTIVEL COMBU,a.QTDE_ABASTECIDA QUANT,b.VALOR VALOR
                                   FROM CONSUMO_COMBUSTIVEL a,mat_pecas b
                                  where a.cd_combustivel=b.cd_material and
                                  a.vl_unitario is null");
                OCIExecute($smcusto, OCI_DEFAULT);
                While (OCIFetch($smcusto)) {

          $quantidade=ociresult($smcusto, "QUANT") ;
          $valor6=ociresult($smcusto, "VALOR") ;
          $gravacusto=$quantidade*$valor6;

          $sequencia6=ociresult($smcusto, "SEQUENCIA") ;

          $sgrava189= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_unitario='$valor6',vl_total='$gravacusto' where  seq='$sequencia6'");
                            OCIExecute($sgrava189, OCI_DEFAULT);
                            oci_commit($ora_conexao);

       }//final quando custo
       
       echo "Final do Ajuste de Custo</br>";
       
       
                            $sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_ultima_leitura_km='0',vl_ultima_leitura_hora='0'");
                            OCIExecute($sgrava1, OCI_DEFAULT);
                            oci_commit($ora_conexao);

                       //grava ultimo km
                       $veiculoacha= OCIParse($ora_conexao, "select distinct CD_VEICULO from consumo_combustivel");
                       OCIExecute($veiculoacha, OCI_DEFAULT);
                       While (OCIFetch($veiculoacha))
                       {

                            $veiculo7=ociresult($veiculoacha,"CD_VEICULO") ;

                            $sequenciakm="1";
                            $veiculo= OCIParse($ora_conexao, "select KM from consumo_combustivel  where CD_VEICULO='$veiculo7'
                            order by KM asc ");
                            OCIExecute($veiculo, OCI_DEFAULT);
                            While (OCIFetch($veiculo)) {


                               $km7=ociresult($veiculo,"KM") ;


                               if ($sequenciakm=="1"){

                                 $sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_ultima_leitura_km='$km7' where
                                 cd_veiculo='$veiculo7' and KM='$km7'");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);
                                 $kmanterior=$km7;


                               }
                               else
                               {
                                 $sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_ultima_leitura_km='$kmanterior' where
                                 cd_veiculo='$veiculo7' and KM='$km7'");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);
                                 $kmanterior=$km7;

                               }
                              $sequenciakm=$sequenciakm+1;
                            }
                         }
                           
               echo "Final do Ajuste do Ultimo km</br>";
               
                           //grava ultimo hora
                       $veiculoacha2= OCIParse($ora_conexao, "select distinct CD_VEICULO from consumo_combustivel");
                       OCIExecute($veiculoacha2, OCI_DEFAULT);
                       While (OCIFetch($veiculoacha2))
                       {

                            $veiculo7=ociresult($veiculoacha2,"CD_VEICULO") ;

                            $sequenciahora="1";
                            $veiculo3= OCIParse($ora_conexao, "select HORIMETRO from consumo_combustivel  where CD_VEICULO='$veiculo7'
                            order by HORIMETRO asc ");
                            OCIExecute($veiculo3, OCI_DEFAULT);
                            While (OCIFetch($veiculo3)) {


                               $hora7=ociresult($veiculo3,"HORIMETRO") ;


                               if ($sequenciahora=="1"){

                                 $sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_ultima_leitura_hora='$hora7' where
                                 cd_veiculo='$veiculo7' and HORIMETRO='$hora7'");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);
                                 $horaanterior=$hora7;


                               }
                               else
                               {
                                 $sgrava1= OCIParse($ora_conexao, "update CONSUMO_COMBUSTIVEL SET vl_ultima_leitura_hora='$horaanterior' where
                                 cd_veiculo='$veiculo7' and HORIMETRO='$hora7'");
                                 OCIExecute($sgrava1, OCI_DEFAULT);
                                 oci_commit($ora_conexao);
                                 $horaanterior=$hora7;

                               }
                              $sequenciahora=$sequenciahora+1;
                           }
                       }

                    echo "Final do Ajuste de Ultimo Hora</br>";


?>



</body>

</form>
</html>


