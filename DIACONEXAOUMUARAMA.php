<?

$mes=$_GET['mes'];
$ano=$_GET['ano'];
$data1=$_GET['data1'];
$codigoempresaerp=$_GET['codigoempresaerp'];
$codigoempresa=$_GET['codigoempresa'];



$diaatual=$_GET['diaatual'];
$diaintervalocominativos=$_GET['diaintervalocominativos'];
$data_inicial=$_GET['data_inicial'];





                  

require("configuraoracle_averama.php");
$banco="averama";


$conexao = mysql_connect('mysql20.redehost.com.br:41890', 'tonera5','rogerio2013') ;





                  $usuvivo1 = "SELECT CD_MATERIAL FROM item_producao_bi WHERE CD_EMPRESA='$codigoempresa'
                  and CD_VARIACAO='$variacao3' and
                  id_animal_vivo='S'";
                  //echo "$usu18";
                  $usuvivo2 = mysql_db_query($banco,$usuvivo1,$conexao);
                  $usuvivo3=mysql_fetch_array($usuvivo2);
                  $animalvivo=$usuvivo3["CD_MATERIAL"];

                  $achaultimadata2 = "SELECT MAX(dt_final) DATA FROM apontamento_producao_erp_bi WHERE
               cd_turno='1' AND cd_empresa='$codigoempresa'";
               $achaultimadata3 = mysql_db_query($banco,$achaultimadata2,$conexao);
               $achaultimadata4=mysql_fetch_array($achaultimadata3);
               $ultimadataapontada=$achaultimadata4["DATA"];




               $achaultimadata23= "SELECT SUBSTR(DT_FINAL,6,2) MES,SUBSTR(DT_FINAL,1,4) ANO,SUBSTR(DT_FINAL,9,2) DIA
               FROM apontamento_producao_erp_bi WHERE
               cd_turno='1' AND cd_empresa='$codigoempresa' AND DT_FINAL='$ultimadataapontada'";
               $achaultimadata33 = mysql_db_query($banco,$achaultimadata23,$conexao);
               $achaultimadata43=mysql_fetch_array($achaultimadata33);
               $mesestudo=$achaultimadata43["MES"];
               $anoestudo=$achaultimadata43["ANO"];
               $diaestudo=$achaultimadata43["DIA"];

 $data_inicial=$diaestudo."/".$mesestudo."/".$anoestudo;



 $hoje = date('Y-m-d');

 $anoestudo2=date('Y');
 $mesestudo2=date('m');
 $diaestudo2=date('d');

 $data_final=$diaestudo2."/".$mesestudo2."/".$anoestudo2;
 list($dia_inicial, $mes_inicial, $ano_inicial) = explode("/",$data_inicial);
 list($dia_final, $mes_final, $ano_final) = explode("/", $data_final);
 $data_inicial2 = mktime(0,0,0,$mes_inicial,$dia_inicial,$ano_inicial);
 $data_final2 = mktime(0,0,0,$mes_final,$dia_final,$ano_final);

 $dias = ($data_final2 - $data_inicial2)/86400;



 $diaintervalocominativos=$dias-1;
 
 $usuvivo1 = "SELECT CD_MATERIAL FROM item_producao_bi WHERE CD_EMPRESA='$codigoempresa'
                              and CD_VARIACAO='1' and
                              id_animal_vivo='S'";
                              //echo "$usu18";
                              $usuvivo2 = mysql_db_query($banco,$usuvivo1,$conexao);
                              $usuvivo3=mysql_fetch_array($usuvivo2);
                              $animalvivo=$usuvivo3["CD_MATERIAL"];


                              $usu189 = "SELECT CD_EMPRESA_ERP FROM pessoa_bi WHERE CODIGO='$codigoempresa'  ";
                              //echo "$usu18";
                              $res89 = mysql_db_query($banco,$usu189,$conexao);
                              $valor879=mysql_fetch_array($res89);
                              $codigoempresaerp=$valor879["CD_EMPRESA_ERP"];

 echo "Quantos Dias Analisar:$diaintervalocominativos Amimal vivo:$animalvivo- codigo empresa:$codigoempresaerp</br>";


$diaintervalocominativos="10";

for ($passadia=1;$passadia <=$diaintervalocominativos;$passadia++)
{
                        list($dia7, $mes7, $ano7) = explode('/', $data_inicial);
                        $datanova = mktime(0, 0, 0, $mes7, $dia7 + 1, $ano7);
                        //echo strftime('%d/%m/%Y', $datanova);
                        $data_inicial=strftime('%d/%m/%Y', $datanova);

                        $modelo="Definir Data de Apontamento no ERP";
                        $data1=strftime('%d', $datanova);
                        $mes=strftime('%m', $datanova);
                        $ano=strftime('%Y', $datanova);
                        $datainativateste=$ano."-".$mes."-".$data1;

                        $achaquantosdiasinativos28= "SELECT count(*) DIAS from dias_inativos WHERE
                        cd_turno='1' AND cd_empresa='$codigoempresa' AND DT_INATIVA ='$datainativateste' and
                        CD_VARIACAO='1'";
                        $achaquantosdiasinativos38 = mysql_db_query($banco,$achaquantosdiasinativos28,$conexao);
                        $achaquantosdiasinativos48=mysql_fetch_array($achaquantosdiasinativos38);
                        $achacontador7=$achaquantosdiasinativos48["DIAS"];

                        //echo "$achaquantosdiasinativos28-->dia:$achacontador7//variacao:$variacao3</br>";


//echo "manutencao1";


if ($achacontador7=="0"){


$dataestudo=$data1."/".$mes."/".$ano;
$dataestudo88=$ano."-".$mes."-".$data1;

echo "dia:$dataestudo88</br>";


                                   $sql = "delete from aux_erp_averama_aponta ";
                                   $res = mysql_db_query($banco,$sql,$conexao);

                                   $sql = "delete from aux_erp_averama_aponta_vivo ";
                                   $res = mysql_db_query($banco,$sql,$conexao);

                                   $sql = "delete from apontamento_producao_erp_bi where CD_EMPRESA='$codigoempresa' AND
                                   dt_inicio='$dataestudo88' and cd_turno='1'";
                                   $res = mysql_db_query($banco,$sql,$conexao);
                                   
                                   $sql = "delete from apontamento_producao_bi where CD_EMPRESA='$codigoempresa' AND
                                   dt_inicio='$dataestudo88' and cd_turno='1'";
                                   $res = mysql_db_query($banco,$sql,$conexao);
                                   
                                   $sql = "delete from apontamento_abate_corte_bi where CD_EMPRESA='$codigoempresa' AND
                                   dt_inicio='$dataestudo88' and cd_turno='1'";
                                   $res = mysql_db_query($banco,$sql,$conexao);



    //produto final

   $s = OCIParse($ora_conexao, "SELECT to_char(DT_PRODUCAO,'yyyy/mm/dd') DATA, CD_ITEM, QT_PRODUCAO from
   VIEW_MILENIO_APONTAPRODUCAO where cd_empresa='$codigoempresaerp' and dt_producao='$dataestudo'  order by CD_ITEM asc
   ");
   OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {

          $data1=ociresult($s, "DATA") ;
          $codigoprodutoerp=ociresult($s, "CD_ITEM") ;
          $quantidade=ociresult($s, "QT_PRODUCAO") ;

          $quantidade= str_replace(",",".", $quantidade);


               $achacontador67 = "SELECT CD_PRODUTO,DS_PRODUTO FROM produto_bi  where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp' and cd_produto in (
               select MIN(CD_PRODUTO) FROM produto_bi  where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp')
                 ";
               $res67 = mysql_db_query($banco,$achacontador67,$conexao);
               $valor867=mysql_fetch_array($res67);
               $codigoproduto=$valor867["CD_PRODUTO"];
               $descricaoproduto=$valor867["DS_PRODUTO"];






                 $grava = "INSERT INTO aux_erp_averama_aponta (DT_APONTAMENTO,CD_PRODUTO,QT_APONTAMENTO,CD_EMPRESA,CD_VARIACAO)
                 values ('$data1','$codigoproduto','$quantidade','$codigoempresaerp','0')";
                 $res = mysql_db_query($banco,$grava,$conexao);





          // }//final da variacao



                $achacontador66 = "SELECT count(*) CONTADOR   FROM produto_bi where CD_EMPRESA='$codigoempresa'
               and   cd_produto='$codigoproduto'  ";
               $res66 = mysql_db_query($banco,$achacontador66  ,$conexao);
               $valor866=mysql_fetch_array($res66);
               $existesim=$valor866["CONTADOR"];

               if ($existesim >"0"){





                $grava1 = "insert into  apontamento_producao_erp_bi
                (cd_produto,
                dt_inicio,
                dt_final,
			    vl_kg_apontado,
			    cd_turno,cd_empresa)
                values
                ('$codigoprodutoerp',
                '$data1',
                '$data1',
				$quantidade,
				'1','$codigoempresa')";
                //ECHO "$grava1</BR>";

                $res7 = mysql_db_query($banco,$grava1,$conexao);



           $grava1 = "insert into  apontamento_producao_bi
                (cd_produto,
                dt_inicio,
                dt_final,
			    vl_kg_apontado,
			    cd_turno,cd_empresa,cd_variacao)
                values
                ('$codigoproduto',
                '$data1',
                '$data1',
				$quantidade,
				'1','$codigoempresa','0'
			    )";
       //ECHO "$grava1</BR>";



                $res7 = mysql_db_query($banco,$grava1,$conexao);


                }



    }//final da linha apontamento





//para somar os inteiros broiller
$totalcabecainteirab="0";


$achavagravou = "SELECT DISTINCT A.CD_PRODUTO CODIGO1, A.DS_PRODUTO DESCRICAO, A.CD_PRODUTO_ERP ERP,
 A.ID_INTEIRO INTEIRO,B.DT_APONTAMENTO DATA,B.QT_APONTAMENTO PRODUCAO,
 A.vl_peso_grama_Minimo MINIMO,A.VL_PESO_GRAMA_MAXIMA MAXIMO,A.ID_INTEIRO INTEIRO
 FROM produto_bi A,aux_erp_averama_aponta B,variacao_animal_bi C
WHERE
A.CD_EMPRESA='$codigoempresa'  AND
A.CD_PRODUTO=B.CD_PRODUTO AND
B.cd_empresa='$codigoempresaerp' AND
A.CD_VARIACAO='1'
ORDER BY A.CD_PRODUTO asc";

          $achavagravou2= mysql_db_query($banco,$achavagravou,$conexao);
          while ($achavagravou1=mysql_fetch_array($achavagravou2)){
               $produto8=$achavagravou1["ERP"];
               $produto9=$achavagravou1["DESCRICAO"];
               $produto10=$achavagravou1["CODIGO1"];
               $minimo10=$achavagravou1["MINIMO"];
               $maximo10=$achavagravou1["MAXIMO"];

               $media=(($maximo10+$minimo10)/2)/1000;

               $achagrade1 = "SELECT CD_TIPO_QUALIDADE from produto_bi WHERE CD_PRODUTO='$produto10'";
               $achagrade2 = mysql_db_query($banco,$achagrade1,$conexao);
               $achagrade3=mysql_fetch_array($achagrade2);
               $mostragrade=$achagrade3["CD_TIPO_QUALIDADE"];
               $produzuidia=$achavagravou1["PRODUCAO"];
               $statusinteiro=$achavagravou1["INTEIRO"];


                       $producaokg=$achavagravou1["PRODUCAO"];
                       //echo "media:$media</br>Cabeça:";
                       if ($media >"0"){
                       $cabeca=$producaokg/$media;
                       }
                       else
                       {
                       $cabeca="0";
                       }




                    if ($statusinteiro=="I"){
                    $totalcabecainteirab=$totalcabecainteirab+$cabeca;
                    }




         }



//para somar o griller A,B
$totalcabecaag="0";



$achavagravou = "SELECT DISTINCT A.CD_PRODUTO CODIGO1, A.DS_PRODUTO DESCRICAO, A.CD_PRODUTO_ERP ERP,
 A.ID_INTEIRO INTEIRO,B.DT_APONTAMENTO DATA,B.QT_APONTAMENTO PRODUCAO,
 A.vl_peso_grama_Minimo MINIMO,A.VL_PESO_GRAMA_MAXIMA MAXIMO,A.ID_INTEIRO INTEIRO
 FROM produto_bi A,aux_erp_averama_aponta B,variacao_animal_bi C
WHERE
A.CD_EMPRESA='$codigoempresa'  AND
A.CD_PRODUTO=B.CD_PRODUTO AND
B.cd_empresa='$codigoempresaerp'  and
A.CD_VARIACAO='2'
ORDER BY A.CD_PRODUTO asc";

          $achavagravou2= mysql_db_query($banco,$achavagravou,$conexao);
          while ($achavagravou1=mysql_fetch_array($achavagravou2)){
               $produto8=$achavagravou1["ERP"];
               $produto9=$achavagravou1["DESCRICAO"];
               $produto10=$achavagravou1["CODIGO1"];
               $minimo10=$achavagravou1["MINIMO"];
               $maximo10=$achavagravou1["MAXIMO"];
               $produzuidia=$achavagravou1["PRODUCAO"];
               $media=(($maximo10+$minimo10)/2)/1000;






               $achagrade1 = "SELECT CD_TIPO_QUALIDADE from produto_bi WHERE CD_PRODUTO='$produto10'";
               $achagrade2 = mysql_db_query($banco,$achagrade1,$conexao);
               $achagrade3=mysql_fetch_array($achagrade2);
               $mostragrade=$achagrade3["CD_TIPO_QUALIDADE"];


                       $producaokg=$achavagravou1["PRODUCAO"];
                       //echo "media:$media</br>Cabeça:";
                       if ($media >"0"){
                       $cabeca=$producaokg/$media;
                       }
                       else
                       {
                       $cabeca="0";
                       }



                    $totalcabecaag=$totalcabecaag+$cabeca;




         }





         $soma5 = OCIParse($ora_conexao, "SELECT sum(QT_PRODUCAO)  TOTAL  from
         VIEW_MILENIO_APONTAPRODUCAO where cd_empresa='$codigoempresaerp' and dt_producao='$dataestudo'");
         OCIExecute($soma5, OCI_DEFAULT);
         While (OCIFetch($soma5)) {
                    $volumesoma=ociresult($soma5, "TOTAL") ;
         }

                    if ($volumesoma >"0"){
                    $totalquantidade= str_replace(",",".", $volumesoma);
					$totalquantidade=number_format($totalquantidade, 2, '.', '.');
                    }



   //Recepecao de aves


   $s = OCIParse($ora_conexao, "SELECT to_char(DT_ABATE,'yyyy/mm/dd') DATA, QT_RECEBIDA, PS_RECEBIDO PESO,DS_TIPOAVE TIPO5,Cd_equipe EQUIPE from
   VIEW_MILENIO_ENTRADAVIVA where cd_empresa='$codigoempresaerp' and  DT_ABATE='$dataestudo' and DS_TIPOAVE='GRILLER'
   ");
   OCIExecute($s, OCI_DEFAULT);
   While (OCIFetch($s)) {

          $data1=ociresult($s, "DATA") ;
          $quantidadebruta=ociresult($s, "QT_RECEBIDA") ;
          $pesorecebido=ociresult($s, "PESO") ;
          $tipoaves=ociresult($s, "TIPO5") ;
          $equipeapanha=ociresult($s, "EQUIPE") ;
  ECHO "</BR>dia:$data1//EQUIPE:$equipeapanha --> CABECAS:$quantidadebruta";
  //EQUIPE=7 AVERAMA 6-->CAOANEMA

  IF ($equipeapanha=="7"){

          $pesomediorecebido=$pesorecebido/$quantidadebruta;
          IF ($tipoaves=="BROILER"){$variacaoquestao="1";}
          IF ($tipoaves=="GRILLER"){$variacaoquestao="2";}



               $achacontador67 = "SELECT CD_PRODUTO,DS_PRODUTO FROM produto_bi  where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp' and cd_variacao='$variacaoquestao' ";
               $res67 = mysql_db_query($banco,$achacontador67,$conexao);
               $valor867=mysql_fetch_array($res67);
               $codigoproduto=$valor867["CD_PRODUTO"];
               $descricaoproduto=$valor867["DS_PRODUTO"];


               $achacontador66 = "SELECT count(*) CONTADOR   FROM produto_bi where CD_EMPRESA='$codigoempresa'
               and CD_VARIACAO='$variacaoquestao' and  cd_produto='$codigoproduto'  ";
               //echo "$achacontador66</br>";


               $res66 = mysql_db_query($banco,$achacontador66  ,$conexao);
               $valor866=mysql_fetch_array($res66);
               $existesim=$valor866["CONTADOR"];


               $acha2111="select MAX(nr_sequencia) SEQUENCIA2 from
          condenacao_bi";
          $res22 = mysql_db_query($banco,$acha2111,$conexao);
          $valor82=mysql_fetch_array($res22);
          $novasequencia=$valor82["SEQUENCIA2"];

	      IF ($novasequencia >"0"){
           $novasequencia=$novasequencia+1;
	      }
	      ELSE
	      {
          $novasequencia="1";
	      }

                 $achacontadorcondena = "SELECT count(*) CONTADOR   FROM condenacao_bi
                 where CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacaoquestao'
                  and  dt_inicio='$data1' and cd_turno='1' ";
               //echo "$achacontador66</br>";


               $achacontadorcondena2= mysql_db_query($banco,$achacontadorcondena,$conexao);
               $achacontadorcondena3=mysql_fetch_array($achacontadorcondena2);
               $existesimcondenacao=$achacontadorcondena3["CONTADOR"];

               if ($existesimcondenacao=="0"){
                 $grava1 = "insert into  condenacao_bi
                (DT_INICIO,
                 DT_FINAL,
                 CD_TURNO,
                 VL_KG,
                 QT_CABECA_CONDENADA,
                 QT_CABECA_MORTA    ,
                 NR_SEQUENCIA  ,
                 CD_MATERIAL,
				 CD_VARIACAO,CD_EMPRESA)
                values
                ('$data1',
                '$data1',
				'1',
				'0',
				'0',
				'0',
				'$novasequencia',
                '$animalvivo','$variacaoquestao','$codigoempresa'
			    )";
               //echo "$grava1</br>";
			   $res7 = mysql_db_query($banco,$grava1,$conexao);
               }

                 $achacondenacao1 = "SELECT QT_CABECA_CONDENADA,QT_CABECA_MORTA from condenacao_bi
                 where  CD_EMPRESA='$codigoempresa'
                 and CD_VARIACAO='$variacaoquestao' and  DT_INICIO='$data1'  ";
                 $achacondenacao2 = mysql_db_query($banco,$achacondenacao1,$conexao);
                 $achacondenacao3=mysql_fetch_array($achacondenacao2);
                 $cabecamg=$achacondenacao3["QT_CABECA_MORTA"];
                 $cabecacg=$achacondenacao3["QT_CABECA_CONDENADA"];

                 $grava = "INSERT INTO aux_erp_averama_aponta_vivo (DT_APONTAMENTO,QT_APONTAMENTO,CD_EMPRESA,CD_VARIACAO,PS_VIVO)
                 values ('$data1','$quantidadebruta','$codigoempresaerp','$variacaoquestao','$pesorecebido')";
                  //echo "</BR>DATA: $data1-VOLUME:$quantidadebruta-tIPO AVES:$tipoaves-PESO RECEBIDO:$pesorecebido- PESO MEDIO:$pesomediorecebido";
                  //$res = mysql_db_query($banco,$grava,$conexao);

                  $totalcabecagreadec=$quantidadebruta-$totalcabecaab;





                  $cabecascortadasgriller=$totalcabecagreadec+(($quantidadebruta-$cabecamg-$cabecacg-$totalcabecaag)-$totalcabecagreadec);




               $sequencia1  = "select MAX(NR_SEQUENCIA) SEQUENCIA from apontamento_abate_corte_bi ";
               //echo "$produto1 </br>";
	           $res7 = mysql_db_query($banco,$sequencia1 ,$conexao);
               $totallinha35=mysql_fetch_array($res7);
               $sequencia=$totallinha35["SEQUENCIA"];
               IF ($sequencia >"0"){
                 $sequencia=$sequencia+1;
	           }
	           ELSE
	           {
	             $sequencia="1";
               }

                $grava = "insert into  apontamento_abate_corte_bi
               (nr_sequencia,
               dt_inicio,
               dt_final,
			   qt_cabeca_abate,
			   peso_medio_abatido,
			   cd_turno,vl_hora_inicio,cd_empresa,cd_variacao,nr_sequencia_nota,kg_recebido)
               values
               ('$sequencia',
               '$data1' ,
               '$data1',
			   $quantidadebruta,
				$pesomediorecebido,
				'1','24:00','$codigoempresa','$variacaoquestao','1',$pesorecebido
			  )";

             $res7 = mysql_db_query($banco,$grava,$conexao);


             $sequencia1  = "select cd_material MATERIAL FROM  item_producao_bi WHERE ID_ITEM_CARCACA='S'
             and CD_EMPRESA='$codigoempresa'
                  and CD_VARIACAO='$variacaoquestao' ";
                  //echo "$produto1 </br>";
	              $res7 = mysql_db_query($banco,$sequencia1 ,$conexao);
                  $totallinha35=mysql_fetch_array($res7);
         	      $carcacag=$totallinha35["MATERIAL"];

         	      $sql = "delete from apontamento_item_bi where
	                               SUBSTR(DT_INICIO,6,2)='$mes' AND
                                   SUBSTR(DT_INICIO,1,4)='$ano' AND
                                   SUBSTR(DT_INICIO,9,2)='$data1' AND
	                               CD_TURNO ='1' and cd_material='$carcacag'";
                                   $res = mysql_db_query($banco,$sql,$conexao);


             //acha o rendimento  para o item mestre em analise
    	     $acharendi55 = "select pr_rendimento_vivo RENDI from absorcao_mp_bi where
		     cd_item='$carcacag' and  CD_EMPRESA='$codigoempresa'";
             $acharendi255= mysql_db_query($banco,$acharendi55,$conexao);
             $acharendi355=mysql_fetch_array($acharendi255);
             $partcipacaovivoitem=$acharendi355["RENDI"];
             $partcipacaovivoajuste = str_replace(",", ".","$partcipacaovivoitem" );

             //echo " cabecas=$cabecascortadasgriller//participacao=$partcipacaovivoajuste";
             $cabecascortadasgrillerfinal=$cabecascortadasgriller*($partcipacaovivoajuste/100);

             $grava = "insert into  apontamento_item_bi
            (CD_MATERIAL,
            dt_inicio,
            dt_final,
			QT_CABECA_APONTADA,
			cd_turno,CD_EMPRESA,cd_variacao,VL_PESO_MEDIO)
            values
            ('$carcacag',
             '$data1' ,
              '$data1',
				$cabecascortadasgrillerfinal,
				'1','$codigoempresa','$variacaoquestao',$pesomediorecebido
			  )";
             //echo "$grava</br>";
           $res7 = mysql_db_query($banco,$grava,$conexao);

           //acha o rendimento  para o item mestre em analise
    	     $acharendi = "select pr_rendimento_carcaca RENDI from absorcao_mp_bi where
		     cd_item='$carcacag' and  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacaoquestao'
             ";
             $acharendi2= mysql_db_query($banco,$acharendi,$conexao);
             $acharendi3=mysql_fetch_array($acharendi2);
             $partcipacaovivoitem=$acharendi3["RENDI"];
             $partcipacaovivoitem = str_replace(",", ".","$partcipacaovivoitem" );

          $coeficiente1g=$cabecascortadasgriller*$pesomediorecebido*$partcipacaovivoitem;
          $coeficientemiudosg=$quantidadebruta*$pesomediorecebido;

    }//FINAL QAUANDO APANHA=7 AVERAMA

    }//final da linha



   $s = OCIParse($ora_conexao, "SELECT to_char(DT_ABATE,'yyyy/mm/dd') DATA, QT_RECEBIDA, PS_RECEBIDO PESO,DS_TIPOAVE TIPO5,Cd_equipe EQUIPE from
   VIEW_MILENIO_ENTRADAVIVA where cd_empresa='$codigoempresaerp' and DT_ABATE='$dataestudo' and DS_TIPOAVE='BROILER'
   ");
   OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {

          $data1=ociresult($s, "DATA") ;
          $quantidadebruta=ociresult($s, "QT_RECEBIDA") ;
          $pesorecebido=ociresult($s, "PESO") ;
          $tipoaves=ociresult($s, "TIPO5") ;
          $equipeapanha=ociresult($s, "EQUIPE") ;
  ECHO "</BR>data:$data1//EQUIPE:$equipeapanha --> CABECAS:$quantidadebruta";
  //EQUIPE=7 AVERAMA; EQUIPE-6 CAPANEMA

  IF ($equipeapanha=="7"){


          $pesomediorecebido=$pesorecebido/$quantidadebruta;
          IF ($tipoaves=="BROILER"){$variacaoquestao="1";}
          IF ($tipoaves=="GRILLER"){$variacaoquestao="2";}



               $achacontador67 = "SELECT CD_PRODUTO,DS_PRODUTO FROM produto_bi  where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp' and cd_variacao='$variacaoquestao' ";
               $res67 = mysql_db_query($banco,$achacontador67,$conexao);
               $valor867=mysql_fetch_array($res67);
               $codigoproduto=$valor867["CD_PRODUTO"];
               $descricaoproduto=$valor867["DS_PRODUTO"];


               $achacontador66 = "SELECT count(*) CONTADOR   FROM produto_bi where CD_EMPRESA='$codigoempresa'
               and CD_VARIACAO='$variacaoquestao' and  cd_produto='$codigoproduto'  ";
               //echo "$achacontador66</br>";


               $res66 = mysql_db_query($banco,$achacontador66  ,$conexao);
               $valor866=mysql_fetch_array($res66);
               $existesim=$valor866["CONTADOR"];




                 $grava = "INSERT INTO aux_erp_averama_aponta_vivo (DT_APONTAMENTO,QT_APONTAMENTO,CD_EMPRESA,CD_VARIACAO,PS_VIVO)
                 values ('$data1','$quantidadebruta','$codigoempresaerp','$variacaoquestao','$pesorecebido')";



                  $acha2111="select MAX(nr_sequencia) SEQUENCIA2 from
          condenacao_bi";
          $res22 = mysql_db_query($banco,$acha2111,$conexao);
          $valor82=mysql_fetch_array($res22);
          $novasequencia=$valor82["SEQUENCIA2"];

	      IF ($novasequencia >"0"){
           $novasequencia=$novasequencia+1;
	      }
	      ELSE
	      {
          $novasequencia="1";
	      }
                   $achacontadorcondena = "SELECT count(*) CONTADOR   FROM condenacao_bi
                 where CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacaoquestao'
                  and  dt_inicio='$data1' and cd_turno='1' ";
               //echo "$achacontador66</br>";


               $achacontadorcondena2= mysql_db_query($banco,$achacontadorcondena,$conexao);
               $achacontadorcondena3=mysql_fetch_array($achacontadorcondena2);
               $existesimcondenacao=$achacontadorcondena3["CONTADOR"];

               if ($existesimcondenacao=="0"){
		         $grava1 = "insert into  condenacao_bi
                (DT_INICIO,
                 DT_FINAL,
                 CD_TURNO,
                 VL_KG,
                 QT_CABECA_CONDENADA,
                 QT_CABECA_MORTA    ,
                 NR_SEQUENCIA  ,
                 CD_MATERIAL,
				 CD_VARIACAO,CD_EMPRESA)
                values
                ('$data1',
                '$data1',
				'1',
				'0',
				'0',
				'0',
				'$novasequencia',
                '$animalvivo','$variacaoquestao','$codigoempresa'
			    )";
               //echo "$grava1</br>";
			   $res7 = mysql_db_query($banco,$grava1,$conexao);
               }

                 $achacondenacao1 = "SELECT QT_CABECA_CONDENADA,QT_CABECA_MORTA from condenacao_bi
                 where  CD_EMPRESA='$codigoempresa'
                 and CD_VARIACAO='$variacaoquestao' and  DT_INICIO='$data1'  ";
                 $achacondenacao2 = mysql_db_query($banco,$achacondenacao1,$conexao);
                 $achacondenacao3=mysql_fetch_array($achacondenacao2);
                 $cabecamb=$achacondenacao3["QT_CABECA_MORTA"];
                 $cabecacb=$achacondenacao3["QT_CABECA_CONDENADA"];




                  $cabecascortadasbroiller=($quantidadebruta-$cabecamb-$cabecacb-$totalcabecainteirab);



               $sequencia1  = "select MAX(NR_SEQUENCIA) SEQUENCIA from apontamento_abate_corte_bi ";
               //echo "$produto1 </br>";
	           $res7 = mysql_db_query($banco,$sequencia1 ,$conexao);
               $totallinha35=mysql_fetch_array($res7);
               $sequencia=$totallinha35["SEQUENCIA"];
               IF ($sequencia >"0"){
                 $sequencia=$sequencia+1;
	           }
	           ELSE
	           {
	             $sequencia="1";
               }

                $grava = "insert into  apontamento_abate_corte_bi
               (nr_sequencia,
               dt_inicio,
               dt_final,
			   qt_cabeca_abate,
			   peso_medio_abatido,
			   cd_turno,vl_hora_inicio,cd_empresa,cd_variacao,nr_sequencia_nota,kg_recebido)
               values
               ('$sequencia',
               '$data1' ,
               '$data1',
			   $quantidadebruta,
				$pesomediorecebido,
				'1','23:00','$codigoempresa','$variacaoquestao','1',$pesorecebido
			  )";
             //echo "$grava</br>";
             $res7 = mysql_db_query($banco,$grava,$conexao);

             $sequencia1  = "select cd_material MATERIAL FROM  item_producao_bi WHERE ID_ITEM_CARCACA='S'
             and CD_EMPRESA='$codigoempresa'
                  and CD_VARIACAO='$variacaoquestao' ";
                  //echo "$produto1 </br>";
	              $res7 = mysql_db_query($banco,$sequencia1 ,$conexao);
                  $totallinha35=mysql_fetch_array($res7);
         	      $carcacab=$totallinha35["MATERIAL"];

         	      $sql = "delete from apontamento_item_bi where
	                               SUBSTR(DT_INICIO,6,2)='$mes' AND
                                   SUBSTR(DT_INICIO,1,4)='$ano' AND
                                   SUBSTR(DT_INICIO,9,2)='$data1' AND
	                               CD_TURNO ='1' and cd_material='$carcacab'";
                                   $res = mysql_db_query($banco,$sql,$conexao);

             $grava = "insert into  apontamento_item_bi
            (CD_MATERIAL,
            dt_inicio,
            dt_final,
			QT_CABECA_APONTADA,
			cd_turno,CD_EMPRESA,cd_variacao,VL_PESO_MEDIO)
            values
            ('$carcacab',
             '$data1' ,
              '$data1',
				$cabecascortadasbroiller,
				'1','$codigoempresa','$variacaoquestao',$pesomediorecebido
			  )";
             //echo "$grava</br>";
           $res7 = mysql_db_query($banco,$grava,$conexao);


             //acha o rendimento  para o item mestre em analise
    	     $acharendi = "select pr_rendimento_carcaca RENDI from absorcao_mp_bi where
		     cd_item='$carcacab' and  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacaoquestao'
             ";
             $acharendi2= mysql_db_query($banco,$acharendi,$conexao);
             $acharendi3=mysql_fetch_array($acharendi2);
             $partcipacaovivoitem=$acharendi3["RENDI"];
             $partcipacaovivoitem = str_replace(",", ".","$partcipacaovivoitem" );


              $coeficiente1b=$cabecascortadasbroiller*$pesomediorecebido*$partcipacaovivoitem;
              $coeficientemiudosb=$quantidadebruta*$pesomediorecebido;


         }//FINAL QUANDO EQUIPE=7

    }//final do dia



    //grava o coeficiente de peso final
       $testecoef=$coeficiente1g+$coeficiente1b;
       if ($testecoef >"0"){
       $gravacoefgriller=$coeficiente1g/($coeficiente1g+$coeficiente1b);
       $gravacoefbroiller=$coeficiente1b/($coeficiente1g+$coeficiente1b);
       }
       else
       {
       $gravacoefgriller="0";
       $gravacoefbroiller="0";
       }


       $grava = "update  apontamento_item_bi  set VL_COEFICIENTE_PRODUCAO_FINAL='$gravacoefgriller' where
       DT_INICIO='$data1' AND  CD_TURNO ='1' and cd_material='$carcacag' and cd_variacao='2'";
       $res7 = mysql_db_query($banco,$grava,$conexao);

           $grava = "update  apontamento_item_bi  set VL_COEFICIENTE_PRODUCAO_FINAL='$gravacoefbroiller' where
           DT_INICIO='$data1' AND  CD_TURNO ='1' and cd_material='$carcacab' and cd_variacao='1'";
           $res7 = mysql_db_query($banco,$grava,$conexao);

         $testecoef99=$coeficientemiudosg+$coeficientemiudosb;
         if ($testecoef99 >"0"){
         $gravacoefgrillermiudos=$coeficientemiudosg/($coeficientemiudosg+$coeficientemiudosb);
         $gravacoefbroillermiudos=$coeficientemiudosb/($coeficientemiudosg+$coeficientemiudosb);
         }
         else
         {
          $gravacoefgrillermiudos="0";
          $gravacoefbroillermiudos="0";

         }


       $grava = "update  apontamento_abate_corte_bi  set VL_COEFICIENTE_PRODUCAO_FINAL='$gravacoefgrillermiudos',
       QT_CABECA_INTEIRA='$totalcabecaag'
       where
       DT_INICIO='$data1' AND  CD_TURNO ='1'  and cd_variacao='2'";
       //echo "$grava</br>";
       $res7 = mysql_db_query($banco,$grava,$conexao);

       $grava = "update  apontamento_abate_corte_bi  set VL_COEFICIENTE_PRODUCAO_FINAL='$gravacoefbroillermiudos',
       QT_CABECA_INTEIRA='$totalcabecainteirab'
        where
       DT_INICIO='$data1' AND  CD_TURNO ='1'  and cd_variacao='1'";
       //echo "$grava</br>";
       $res7 = mysql_db_query($banco,$grava,$conexao);










?><font style='font-size: 15px;color: black;text-align:center;bold: Negrito' ><?echo "Final da Sincronização do dia Para o Dia:$dataestudo</br>";
}


}//final da analise todos dias dias


//dechamento final

            $achaultimadata1= "SELECT ULTIMA_DATA_FECHADA_PRODUCAO DATA from parametro_bi WHERE
                        cd_empresa='$codigoempresa' ";
                        $achaultimadata2 = mysql_db_query($banco,$achaultimadata1,$conexao);
                        $achaultimadata3=mysql_fetch_array($achaultimadata2);
                        $ultimadata7=$achaultimadata3["DATA"];



                        $mesultimo=SUBSTR($ultimadata7,5,2);
                        $anoultimo=SUBSTR($ultimadata7,0,4);
                        $diaultimo=SUBSTR($ultimadata7,8,2);
                        $dataestudoultima=$diaultimo."/".$mesultimo."/".$anoultimo;






               $sachadia = OCIParse($ora_conexao, "SELECT distinct TO_CHAR(DT_PRODUCAO,'YYYY-mm-dd') DATA1, DT_PRODUCAO DATA from
               VIEW_MILENIO_APONTAPRODUCAO where cd_empresa='$codigoempresaerp' and DT_PRODUCAO >='$dataestudoultima'   order by DT_PRODUCAO desc
               ");
               OCIExecute($sachadia, OCI_DEFAULT);
               While (OCIFetch($sachadia)) {
                         $dataescolhida=ociresult($sachadia, "DATA") ;
                         $datagravar=ociresult($sachadia, "DATA1") ;



                         $ssoma = OCIParse($ora_conexao, "SELECT sum(QT_PRODUCAO) VALOR from
                         VIEW_MILENIO_APONTAPRODUCAO where cd_empresa='$codigoempresaerp' and  dt_producao='$dataescolhida' group by DT_PRODUCAO
                         ");
                         OCIExecute($ssoma, OCI_DEFAULT);
                         While (OCIFetch($ssoma)) {
                            $volumeerp=ociresult($ssoma, "VALOR") ;

                            $volumeerp=str_replace(",",".",$volumeerp);


                            $achaquantos777= "SELECT count(*) VALOR  from sincronizacao_producao_bi  WHERE
                            cd_turno='1' AND cd_empresa='$codigoempresa' AND DT_INICIO ='$datagravar' ";
                            $achaquantos7771 = mysql_db_query($banco,$achaquantos777,$conexao);
                            $achaquantos7772=mysql_fetch_array($achaquantos7771);
                            $contador44=$achaquantos7772["VALOR"];

                            if ($contador44=="0"){
                            //ECHO "datasssss:$dataescolhida//volume erp:$volumeerp//volume rendimento:$volumeapontadorendi</br>";
                            $grava77 = "INSERT INTO sincronizacao_producao_bi (DT_INICIO,CD_EMPRESA,CD_TURNO,VL_KG_APONTADO_ERP,
                            ID_STATUS_FECHAMENTO) values ('$datagravar','$codigoempresa','1',$volumeerp,'N')";
                            //echo "$grava77</br>";
                            $res = mysql_db_query($banco,$grava77,$conexao);
                            }
                            else
                            {
                             $grava77 = "update sincronizacao_producao_bi set VL_KG_APONTADO_ERP='$volumeerp'
                             where cd_turno='1' AND cd_empresa='$codigoempresa' AND DT_INICIO ='$datagravar'
                             ";
                            //echo "$grava77</br>";
                            $res = mysql_db_query($banco,$grava77,$conexao);
                            }



                         }

               }//final da nalise dos dias de cmparacao com erp

               //FECHA O APONTAMENTO SINCRONIZADO

               $achaentrada1dias = "SELECT SUM(VL_KG_APONTADO) VALOR,DT_INICIO from
               apontamento_producao_erp_bi  where cd_empresa='$codigoempresa' and DT_INICIO >='$ultimadata7'  GROUP
               BY  DT_INICIO ";


              $achaentrada2dias= mysql_db_query($banco,$achaentrada1dias,$conexao);

              while ($achaentrada3dias=mysql_fetch_array($achaentrada2dias)){
                     $data432=$achaentrada3dias["DT_INICIO"];
                     $valor432=$achaentrada3dias["VALOR"];
                     $valor432=str_replace(",",".",$valor432);

                            $grava779 = "UPDATE  sincronizacao_producao_bi  SET VL_KG_APONTADO_RENDIMENTO=$valor432 WHERE
                            DT_INICIO='$data432' AND CD_EMPRESA='$codigoempresa'";
                           // echo "$grava779</br>";
                            $res = mysql_db_query($banco,$grava779,$conexao);

               }

               //marca status
               $achaentrada1dias66 = "SELECT VL_KG_APONTADO_RENDIMENTO VALOR1,VL_KG_APONTADO_ERP VALOR2,DT_INICIO from
               sincronizacao_producao_bi  where cd_empresa='$codigoempresa' and DT_INICIO >='$ultimadata7'";
               //echo "$achaentrada1dias</br>";

              $achaentrada2dias66= mysql_db_query($banco,$achaentrada1dias66,$conexao);

              while ($achaentrada3dias66=mysql_fetch_array($achaentrada2dias66)){
                     $valorerp5=$achaentrada3dias66["VALOR2"];
                     $valorrendi5=$achaentrada3dias66["VALOR1"];
                     $data4325=$achaentrada3dias66["DT_INICIO"];

                     if ($valorrendi5==$valorerp5){
                            $grava779 = "UPDATE  sincronizacao_producao_bi  SET ID_STATUS_FECHAMENTO='S' WHERE
                            DT_INICIO='$data4325' AND CD_EMPRESA='$codigoempresa'";
                            //echo "$grava779</br>";
                            $res = mysql_db_query($banco,$grava779,$conexao);
                     }

               }




?><font style='font-size: 15px;color: black;text-align:center;bold: Negrito' ><?echo "Sincronização esta alinhada com o ERP</br>";

?>
</font>




