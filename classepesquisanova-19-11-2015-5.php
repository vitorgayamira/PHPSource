<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// NÃƒO HABILITAD

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
//$programa="consultapcmanual.php";
$titulo="Plano Anual";


?>


<div  style="display: block;" id="telapesquisa">
<?


if ( $fabricaescolha=="99999")//todas de acesso apenas
{
	                         $delecaousauio1= "delete from   AUX_USUARIO_UNIDADE where cd_usuario='$edusuario'";
			                 $delecaousauio12= $conn->Execute($delecaousauio1);

							 $result2Fmus5 = "select cd_fabrica from usuario_fabrica where cd_usuario in (select cd_usuario from usuario_bi
                             where nm_usuario='$edusuario')";
				             $result2Fmus51= $conn->Execute($result2Fmus5);
                             while ( !$result2Fmus51->EOF) {
				                    $pegafabrica=$result2Fmus51->fields["0"];
	                         	    $usu18ussG7dgpa7 = "insert into  AUX_USUARIO_UNIDADE(cd_usuario,cd_unidade) values
				                    ('$edusuario','$pegafabrica')";
			                        $resultussG77= $conn->Execute($usu18ussG7dgpa7);
							$result2Fmus51->MoveNext();
                            }

}
else
{
	                         $delecaousauio1= "delete from   AUX_USUARIO_UNIDADE where cd_usuario='$edusuario'";
			                 $delecaousauio12= $conn->Execute($delecaousauio1);

	                         $usu18ussG7dgpa7f = "insert into  AUX_USUARIO_UNIDADE(cd_usuario,cd_unidade) values
				             ('$edusuario','$fabricaescolha')";
			                 $resultussG77f= $conn->Execute($usu18ussG7dgpa7f);
}
?>



        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>

        <td  align=right>
        <a href="<?echo $programa;?>?pagina=1&escolha=pesquisa&programa=<?echo $programa;?>&navegando=sim&ordenaatual=<?echo $ordenaatual;?>&fabricaescolha=<?echo $fabricaescolha;?>">
        <IMG src="ordenacodigo.png"></a>


		<a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br></br></br>

		<table>


				<tr>
		        <td>
		        Unidade:
		        </td>
                <td>

     				 <?

					 if (!IsSet($fabricaescolha)){$fabricaescolha="";}

					 $datapegou1pe = "SELECT DS_FABRICA FROM   FABRICAS  WHERE CD_FABRICA='$fabricaescolha'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $fabricapesquisades=$datapegou2pe->fields["0"];

					 if ($fabricaescolha==""){$fabricapesquisades="Todas";}


                     ?>

                     <select name="fabricaescolha" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">


					 <option value="<?echo $fabricaescolha;?>"><? echo $fabricapesquisades;?></option>
                     <?
				     $stmt1 = "SELECT cd_fabrica,ds_fabrica
				                 FROM fabricas
				                WHERE cd_fabrica IN (SELECT cd_fabrica
				                                       FROM usuario_fabrica
				                                      WHERE cd_usuario IN (SELECT cd_usuario
				                                                             FROM usuario_bi
                                                                            WHERE nm_usuario='$edusuario'))
                             ORDER BY ds_fabrica";

					 $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }

				 ?>

				 </select>
				 </td>
				 </tr>

				 <tr>
				 <td>
		         Grupo de Ordens:
		         </td>
                 <td>
				 <select   name="grupoordens"  onchange="this.form.submit()">
                 <option value="<?echo $grupoordens;?>"><?echo $grupoordens;?></option>
                 <option value="C">Não Planejadas</option>
                 <option value="P">Planejadas</option>
                 <option value="T">Todas</option>
 	             </select>
				 </td>
				 </tr>


	<tr>
				 <td>
		        Familia:
		        </td>
                <td>

                     <?

					 $datapegou1pe = "SELECT DS_FAMILIA FROM  FAMILIAS WHERE CD_FAMLIA='$familiaescolha'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $familiadescricao=$datapegou2pe->fields["0"];

                   ?>

                 <select name="familiaescolha" onchange="this.form.submit()">
                 <option value="<?echo $familiaescolha;?>"><? echo $familiaescolha;?>-<? echo $familiadescricao;?></option>
                 <option value="">Todos Equipamentos</option>
                 <?
                 $result2 = "SELECT f.cd_famlia valor ,f.ds_familia descricao
							   FROM familias f";

				  $result3 = $conn->Execute($result2);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["VALOR"]}\">
                             {$result3->fields["VALOR"]}-{$result3->fields["DESCRICAO"]}</option>";
                     $result3->MoveNext();
                     }
				 ?>

				 </select>
				 </td>
 </tr>


				 <tr>
				 <td> Equipamento:  </td>
                <td>
                     <?

					 $datapegou1pe = "SELECT DS_COMPO FROM  COMPONENTE_AUXILIAR WHERE CD_COMPO='$equipamentoescolha'";

					 $datapegou2pe = $conn->Execute($datapegou1pe);
                     $componentedescricao=$datapegou2pe->fields["0"];

                   ?>

                 <select name="equipamentoescolha" onchange="this.form.submit()">
                 <option value="<?echo $equipamentoescolha;?>"><? echo $equipamentoescolha;?>-<? echo $componentedescricao;?></option>
                 <option value="">Todos Equipamentos</option>
                 <?
                 $result2 = "SELECT DISTINCT ma.cd_maquina valor
									  ,ma.ds_maquina maquina
								  FROM maquinas ma
									  ,centro_trabalhos ct
									  ,secaos se
									  ,areas ar
									  ,fabricas fa
								WHERE (ma.cd_famlia = '$familiaescolha' OR '$familiaescolha' IS NULL)
								  AND ma.cd_centro = ct.cd_centro
								  AND ct.cd_secao = se.cd_secao
								  AND se.cd_area = ar.cd_area
								  AND ar.cd_fabrica = fa.cd_fabrica
								  AND (fa.cd_fabrica ='$fabricaescolha' OR '$fabricaescolha' IS NULL)";


				  $result3 = $conn->Execute($result2);
                     while ( !$result3->EOF)
                            {
                              print "<option value=\"{$result3->fields["VALOR"]}\">{$result3->fields["VALOR"]}-{$result3->fields["MAQUINA"]}</option>";
                              $result3->MoveNext();
                            }
				 ?>

				 </select>
				 </td>
				 </tr>

				 <tr>
		        <td>
		        Ano:
		        </td>
                <td>
				<select  name="ano" onchange="this.form.submit()">
						<option value="<?echo $ano;?>">Ano:<? echo $ano;?></option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>

                 </select>
	</td>
	</tr>



				 <tr>
		        <td>
		        Atividade:
		        </td>
                <td>

                     <select name="atividadeescolha" onchange="this.form.submit()" >
					 <option value="<?echo $atividadeescolha;?>"><? echo $atividadeescolha;?></option>
                     <option></option>
                     <?
				     $stmt1a = "SELECT  at.cd_atividade valor , at.ds_atividade descricao
                                  FROM atividades at
                              ORDER BY at.ds_atividade";
                     $result3a = $conn->Execute($stmt1a);
                     while ( !$result3a->EOF) {
                           print "<option value=\"{$result3a->fields["VALOR"]}\">{$result3a->fields["VALOR"]}-{$result3a->fields["descricao"]}</option>";

                           $result3a->MoveNext();
                     }

				 ?>

				 </select>
				 </td>
				 </tr>

				  <td>
		        Componente:
		        </td>
                <td>

                     <select name="componenteescolha"  onchange="this.form.submit()" >
					 <option value="<?echo $componenteescolha;?>"><? echo $componenteescolha;?></option>
                     <option></option>

                    <?




				     $stmt1a = "SELECT DISTINCT ca.cd_compo valor
				                       ,ca.ds_compo descricao
				                  FROM componente_auxiliar ca
				                      ,maquinas            ma
				                 WHERE ma.cd_maquina = ca.cd_maquina
				                   AND (ca.cd_maquina='$equipamentoescolha' OR  '$equipamentoescolha' IS NULL)
				                   AND (ma.cd_famlia = '$familiaescolha'    OR '$familiaescolha'      IS NULL)
				                   AND ca.flag != 'Q'
				              ORDER BY ca.ds_compo ";


                     $result3a = $conn->Execute($stmt1a);
                     while ( !$result3a->EOF) {
                          print "<option value=\"{$result3a->fields["VALOR"]}\">{$result3a->fields["VALOR"]}-{$result3a->fields["descricao"]}</option>";
                     $result3a->MoveNext();
                     }

				 ?>

				 </select>
				 </td>
				 </tr>
				 <?if ($programa=="CONSULTAplanomesV3.php"){?>

				 <tr>

				  <td>
		        Mês:
		        </td>
                <td>

				 <select style="background-color:#8B8378;color: white;"  name="mes" onchange="this.form.submit()">
   	             <option value="<?echo $mes;?>">Mês:<? echo $mes;?></option>
                 <option value="01">Janeiro</option>
                 <option value="02">Fevereiro</option>
                 <option value="03">Março</option>
                 <option value="04">Abril</option>
                 <option value="05">Maio</option>
                 <option value="06">Junho</option>
                 <option value="07">Julho</option>
                 <option value="08">Agosto</option>
                 <option value="09">Setembro</option>
                 <option value="10">Outubro</option>
                 <option value="11">Novembro</option>
                 <option value="12">Dezembro</option>
	             </select>
				</td>
				</tr>
				 <?}
				 if (($programa=="CONSULTAplanomessemanaV2.php") or ($programa=="CONSULTAplanomessemanaV3.php")){


				 $diahojeteste=date('d');

                 $achadianovo1dd= "SELECT min(a.NR_SEMANA) SEMANA
                 from aux_semana a,meses_bi b
                 WHERE a.NR_MES='$mes' and a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias and
                 a.NR_DIA_FINAL >='$diahojeteste' ";

				 $datapegou2 = $conn->Execute($achadianovo1dd);
                 $semanapegouini=$datapegou2->fields["0"];




				 if (!IsSet($tipoconsulta)){
                    $tipoconsulta="Definindo Semana";
                 }
				 ?>
				 <tr>
		    <td>
		    Semana:
		    </td>
            <td>
				<select name="semanapegou" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                 <option value="<?echo $semanapegou;?>">Semana:<? echo $semanapegou;?></option>
                 <?

				 $stmt1 = "SELECT  distinct a.NR_SEMANA SEMANA
                 from aux_semana a,meses_bi b
                 WHERE  a.cd_ano='$ano' and
                 a.nr_mes=b.cd_mes and
                 a.nr_dia_final <=b.qt_dias order by NR_SEMANA asc ";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}</option>";


                     $result3->MoveNext();
                     }


					 ?>

     				 </select>
                </td>
				</tr>
				 <?}
				 ?>


	</table>
	<input type="hidden" name="continuarmesmatela" value="sim">
	<input type="hidden" name="programa" value="<?echo $programa;?>">
	<input type="hidden" name="escolha" value="pesquisa">
	<input type="hidden" name="tipoconsulta" value="Definindo Semana">


	<CENTER><input type="button"  value="Mostrar Resultado" onclick="window.location.href='<?echo $programa;?>?navegando=sim&escolha=1&fabricaescolha=<?echo $fabricaescolha;?>&grupoordens=<?echo $grupoordens;?>&grupoordens=<?echo $grupoordens;?>&equipamentoescolha=<?echo $equipamentoescolha;?>&ano=<?echo $ano;?>
	&familiaescolha=<?echo $familiaescolha;?>&atividadeescolha=<?echo $atividadeescolha;?>
	&componenteescolha=<?echo $componenteescolha;?>&mes=<?echo $mes;?>&semanapegou=<?echo $semanapegou;?>&datalargada=<?echo $datalargada;?>&tipoconsulta=<?echo $tipoconsulta;?>'">







</div>
