<?

$mes=$_GET['mes'];
$ano=$_GET['ano'];
$data1=$_GET['data1'];
$codigoempresaerp=$_GET['codigoempresaerp'];
$codigoempresa=$_GET['codigoempresa'];
$animalvivo=$_GET['animalvivo'];


$diaatual=$_GET['diaatual'];
$diaintervalocominativos=$_GET['diaintervalocominativos'];
$data_inicial=$_GET['data_inicial'];
$animalvivo=$_GET['animalvivo'];

$variacao3="1";

require("configuraoracle_averama.php");

$banco="capanema";
$conexao = mysql_connect('mysql20.redehost.com.br', 'tonera4','rogerio2013') ;


$variacao3="1";


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

 echo "Quantos Dias Analisar:$diaintervalocominativos";

$diaintervalocominativos="5";
 
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
                        cd_turno='1' AND cd_empresa='$codigoempresa' AND DT_INATIVA ='$datainativateste'";
                        $achaquantosdiasinativos38 = mysql_db_query($banco,$achaquantosdiasinativos28,$conexao);
                        $achaquantosdiasinativos48=mysql_fetch_array($achaquantosdiasinativos38);
                        $achacontador7=$achaquantosdiasinativos48["DIAS"];

                        $achaquantosdiasabate= "SELECT count(*) CONTADOR from apontamento_abate_corte_bi WHERE
                        CD_EMPRESA='$codigoempresa' AND
                        dt_inicio='$datainativateste' and cd_turno='1'  ";

                        $achaquantosdiasabate2= mysql_db_query($banco,$achaquantosdiasabate,$conexao);
                        $achaquantosdiasabate3=mysql_fetch_array($achaquantosdiasabate2);
                        $existeabate=$achaquantosdiasabate3["CONTADOR"];

                        $achaquantosdiasproducao1= "SELECT count(*) CONTADOR from apontamento_producao_bi WHERE
                        CD_EMPRESA='$codigoempresa' AND
                        dt_inicio='$datainativateste' and cd_turno='1'  ";

                        $achaquantosdiasproducao2= mysql_db_query($banco,$achaquantosdiasproducao1,$conexao);
                        $achaquantosdiasproducao3=mysql_fetch_array($achaquantosdiasproducao2);
                        $existeprodutoapontado=$achaquantosdiasproducao3["CONTADOR"];



if ($achacontador7=="0" and $existeabate=="0" and $existeprodutoapontado=="0"){

                              $usuvivo1 = "SELECT CD_MATERIAL FROM item_producao_bi WHERE CD_EMPRESA='$codigoempresa'
                              and CD_VARIACAO='$variacao3' and
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

$dataestudo=$data1."/".$mes."/".$ano;
$dataestudo88=$ano."-".$mes."-".$data1;




                                   $sql = "delete from aux_erp_averama_aponta ";
                                   $res = mysql_db_query($banco,$sql,$conexao);

                                   $sql = "delete from aux_erp_averama_aponta_vivo ";
                                   $res = mysql_db_query($banco,$sql,$conexao);

                                   $sql = "delete from apontamento_producao_erp_bi where CD_EMPRESA='$codigoempresa' AND
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


                 $achaproduto1= "SELECT count(*) CONTADOR   FROM produto_bi WHERE CD_PRODUTO_ERP='$codigoprodutoerp'
                 AND  CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
                  ";
                 //echo "$achacontador66</br>";
                 $achaproduto2= mysql_db_query($banco,$achaproduto1,$conexao);
                 $achaproduto3=mysql_fetch_array($achaproduto2);
                 $existe66=$achaproduto3["CONTADOR"];
IF($existe66 >"0"){

               $achacontador67 = "SELECT CD_PRODUTO,DS_PRODUTO FROM produto_bi  where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp' and cd_produto in (
               select MIN(CD_PRODUTO) FROM produto_bi where CD_EMPRESA='$codigoempresa'
               and CD_PRODUTO_ERP='$codigoprodutoerp')
                 ";
               $res67 = mysql_db_query($banco,$achacontador67,$conexao);
               $valor867=mysql_fetch_array($res67);
               $codigoproduto=$valor867["CD_PRODUTO"];
               $descricaoproduto=$valor867["DS_PRODUTO"];

 //echo " codigo:$codigoproduto//$descricaoproduto</br>";


                 $grava = "INSERT INTO aux_erp_averama_aponta (DT_APONTAMENTO,CD_PRODUTO,QT_APONTAMENTO,CD_EMPRESA,CD_VARIACAO)
                 values ('$data1','$codigoproduto','$quantidade','$codigoempresaerp','$variacao3')";
                 $res = mysql_db_query($banco,$grava,$conexao);



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
				'1','$codigoempresa','$variacao3'
			    )";
               //ECHO "$grava1</BR>";
                $res7 = mysql_db_query($banco,$grava1,$conexao);

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
                 where CD_EMPRESA='$codigoempresa' and CD_VARIACAO='$variacao3'
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
                '$animalvivo','$variacao3','$codigoempresa'
			    )";
               //echo "$grava1</br>";
			   $res7 = mysql_db_query($banco,$grava1,$conexao);
               }



} //final do teste se esta em capanema

}//final do dia







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
               VIEW_MILENIO_APONTAPRODUCAO where cd_empresa='$codigoempresaerp' and DT_PRODUCAO >='$dataestudoultima'
               order by DT_PRODUCAO desc
               ");
               OCIExecute($sachadia, OCI_DEFAULT);
               While (OCIFetch($sachadia)) {
                         $dataescolhida=ociresult($sachadia, "DATA") ;
                         $datagravar=ociresult($sachadia, "DATA1") ;

                         $contador44="0";

                         $ssoma = OCIParse($ora_conexao, "SELECT sum(QT_PRODUCAO) VALOR from
                         VIEW_MILENIO_APONTAPRODUCAO where
                         cd_empresa='$codigoempresaerp' and
                         dt_producao='$dataescolhida' group by DT_PRODUCAO
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




