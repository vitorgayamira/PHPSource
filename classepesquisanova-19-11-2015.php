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
//$programa="consultapcmanual.php";
$titulo="Plano Anual";


?>


<div  style="display: block;" id="telapesquisa">  
<?

//if (!IsSet($fabricaescolha) or $fabricaescolha=="99999"){
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
					 
					 if (!IsSet($fabricaescolha)){$fabricaescolha="99999";}
					 
					 $datapegou1pe = "SELECT DS_FABRICA FROM   FABRICAS  WHERE CD_FABRICA='$fabricaescolha'";
				     $datapegou2pe = $conn->Execute($datapegou1pe);
                     $fabricapesquisades=$datapegou2pe->fields["0"];

					 if ($fabricaescolha=="99999"){$fabricapesquisades="Todas";}
     				 

                     ?>

                     <select name="fabricaescolha" style="background-color:#8B8378;color: white;" onchange="this.form.submit()">
                     
					 
					 <option value="<?echo $fabricaescolha;?>"><? echo $fabricapesquisades;?></option>
                     <?
				     $stmt1 = "SELECT CD_FABRICA,DS_FABRICA FROM FABRICAS where cd_fabrica in 
                     (select cd_fabrica from usuario_fabrica where cd_usuario in (select cd_usuario from usuario_bi 
                     where nm_usuario='$edusuario')) order by";
                     $stmt1=$stmt1." ".$pegavariavel[2];
	                 $stmt1=$stmt1." asc";
					 
					 
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
                 <option value="C">N�o Planejadas</option>
                 <option value="P">Planejadas</option>
                 <option value="T">Todas</option>
 	             </select>
				 </td>
				 </tr>
				 
				 <tr>
				 <td>
		        Equipamento:
		        </td>
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
                 $result2 = "SELECT DISTINCT OC.CD_COMPONENTE VALOR ,MA.DS_MAQUINA MAQUINA
                 FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
                 CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                 WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
                 AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
                 AND OC.CD_COMPONENTE = CA.CD_COMPO
                 AND CA.CD_MAQUINA = MA.CD_MAQUINA
                 AND MA.CD_FAMLIA = F.CD_FAMLIA
                 AND MA.CD_CENTRO = CT.CD_CENTRO
                 AND CT.CD_SECAO = SE.CD_SECAO
                AND SE.CD_AREA = AR.CD_AREA
                AND AR.CD_FABRICA = FA.CD_FABRICA AND
                FA.CD_FABRICA='$fabricaescolha'
                UNION
                SELECT DISTINCT EC.CD_COMPONENTE VALOR,MA.DS_MAQUINA MAQUINA
                FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
                CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
                AND CA.CD_MAQUINA = MA.CD_MAQUINA
                AND MA.CD_FAMLIA = F.CD_FAMLIA
                AND MA.CD_CENTRO = CT.CD_CENTRO
                AND CT.CD_SECAO = SE.CD_SECAO
                AND SE.CD_AREA = AR.CD_AREA
                AND AR.CD_FABRICA = FA.CD_FABRICA AND
                FA.CD_FABRICA='$fabricaescolha'";
				
				
				  $result3 = $conn->Execute($result2);
                     while ( !$result3->EOF) {
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
                 $result2 = "SELECT DISTINCT F.CD_FAMLIA VALOR ,F.DS_FAMILIA DESCRICAO
      FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
       AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
               AND OC.CD_COMPONENTE = CA.CD_COMPO
       AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
       AND MA.CD_CENTRO = CT.CD_CENTRO
       AND CT.CD_SECAO = SE.CD_SECAO
       AND SE.CD_AREA = AR.CD_AREA
       AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'
       UNION
       SELECT DISTINCT F.CD_FAMLIA VALOR ,F.DS_FAMILIA DESCRICAO
      FROM EMER_COMP EC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
           CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
     WHERE  EC.CD_COMPONENTE = CA.CD_COMPO
        AND CA.CD_MAQUINA = MA.CD_MAQUINA
       AND MA.CD_FAMLIA = F.CD_FAMLIA
         AND MA.CD_CENTRO = CT.CD_CENTRO
              AND CT.CD_SECAO = SE.CD_SECAO
              AND SE.CD_AREA = AR.CD_AREA
              AND AR.CD_FABRICA = FA.CD_FABRICA AND
       FA.CD_FABRICA like '%$fabricapesquisa%'";
				  $result3 = $conn->Execute($result2);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["VALOR"]}\">{$result3->fields["VALOR"]}-{$result3->fields["MAQUINA"]}</option>";


                     $result3->MoveNext();
                     }
				 ?>				 
				 
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
				     $stmt1a = "SELECT DISTINCT RC.CD_ATIVIDADE
                     FROM ROT_COMPO RC,ORDEM_COMP OC, COMPONENTE_AUXILIAR CA, MAQUINAS MA,FAMILIAS F,
                     CENTRO_TRABALHOS CT, SECAOS SE, AREAS AR, FABRICAS FA
                     WHERE RC.CD_COMPONENTE = OC.CD_COMPONENTE
                     AND RC.CD_ATIVIDADE = OC.CD_ATIVIDADE
                     AND OC.CD_COMPONENTE = CA.CD_COMPO
                     AND CA.CD_MAQUINA = MA.CD_MAQUINA
                     AND MA.CD_FAMLIA = F.CD_FAMLIA
                     AND MA.CD_CENTRO = CT.CD_CENTRO
                     AND CT.CD_SECAO = SE.CD_SECAO
                     AND SE.CD_AREA = AR.CD_AREA
                     AND AR.CD_FABRICA = FA.CD_FABRICA AND
                     FA.CD_FABRICA like '%$fabricapesquisa%' order by RC.CD_ATIVIDADE asc";
                     $result3a = $conn->Execute($stmt1a);
                     while ( !$result3a->EOF) {
                          print "<option value=\"{$result3a->fields["0"]}\">{$result3a->fields["0"]}</option>";


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
					 
					 
					 
					 
				     $stmt1a = "SELECT DISTINCT cd_compo,ds_compo   FROM  COMPONENTE_AUXILIAR  where cd_maquina='$equipamentoescolha' order by ";
	   $stmt1a=$stmt1a." ".$pegavariavel[1];
	   $stmt1a=$stmt1a." asc";

	   
                     $result3a = $conn->Execute($stmt1a);
                     while ( !$result3a->EOF) {
                          print "<option value=\"{$result3a->fields["0"]}\">{$result3a->fields["0"]}-->{$result3a->fields["1"]}</option>";


                     $result3a->MoveNext();
                     }
				 
				 ?>
				 		 
				 </select>
				 </td>
				 </tr>
				 <?if ($programa=="CONSULTAplanomesV3.php"){?>
				 
				 <tr>
				 
				  <td>
		        M�s:
		        </td>
                <td>
				 
				 <select style="background-color:#8B8378;color: white;"  name="mes" onchange="this.form.submit()">
   	             <option value="<?echo $mes;?>">M�s:<? echo $mes;?></option>
                 <option value="01">Janeiro</option>
                 <option value="02">Fevereiro</option>
                 <option value="03">Mar�o</option>
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
