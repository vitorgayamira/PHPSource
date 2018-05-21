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

                   
	 
					 


					 
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');


$passa1= "delete from aux_grafico";
$result = $conn->Execute($passa1);

$mes=date('m');

$year=date('Y');



$acha5= "SELECT TO_CHAR(DT_AVALIACAO,'DD') DATA ,VL_INDICADOR from IND_PLANEJAMENTO_MANUTENCAO where cd_fabrica='L121 BCS' and TO_CHAR(DT_AVALIACAO,'MM')='$mes' and TO_CHAR(DT_AVALIACAO,'YYYY')='$year' order by DATA ASC";


$result7 = $conn->Execute($acha5);
  while ( !$result7->EOF) 
  {
              	  $parcial=$result7->fields["1"];
				  $dia7=$result7->fields["0"];
				  
				  $sql88re = "INSERT into aux_grafico(dia,vl_coluna2)
                          values('$dia7',$parcial) ";
						  $result = $conn->Execute($sql88re);


              $valortotal=$valortotal+$parcial;
			 $result7->MoveNext();
  }
  
 

?>