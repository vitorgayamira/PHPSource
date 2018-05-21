<?session_start();?>
<head>
<Script Language="JavaScript">
function pegavalores(){


    document.getElementById('cadastrodestino').value = document.getElementById('cadastroorigem').value;
    document.getElementById('bancodestino').value = document.getElementById('bancoorigem').value;
  document.Form1.submit();
}

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
</script>
</head>

<?												
												
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo.css");


?>
<form name=Form1 action="<?=$PHP_SELF?>" method="POST">
<?



$continuarmesmatela=$_POST['continuarmesmatela'];


if ($continuarmesmatela=="sim"){
$escolha=$_POST['escolha'];
$programa=$_POST['programa'];
$nomecolunaparapassar=$_POST['nomecolunaparapassar'];
$codigoachou=$_POST['codigoachou'];
$nomecolunaparapassaracao=$_POST['nomecolunaparapassaracao'];
$nometabelaparapassar=$_POST['nometabelaparapassar'];
$numerocolunastela=$_POST['numerocolunastela'];
$chacontadorgeral=$_POST['chacontadorgeral'];
$chacontadorgeralupdate=$_POST['chacontadorgeralupdate'];
$chacontadorgeralinsert=$_POST['chacontadorgeralinsert'];
$nometabelaparapassar=$_POST['nometabelaparapassar'];
$tipopessoa=$_POST['tipopessoa'];
$cep=$_POST['cep'];
$numerocolunastela=$_POST['numerocolunastela'];
$campolista2=$_POST['campolista2'];
$campolista1=$_POST['campolista1'];
$rua5gravacorreio=$_POST['rua5gravacorreio'];
$codigoproximoregitro=$_POST['codigoproximoregitro'];
$numerojob=$_POST['numerojob'];
$customergrava=$_POST['customergrava'];
$load1=$_POST['load1'];
$lengthcar=$_POST['lengthcar'];
$widthcar=$_POST['widthcar'];
$roadcar=$_POST['roadcar'];
$airar=$_POST['airar'];
$sprayercar=$_POST['sprayercar'];
$dataj=$_POST['dataj'];



}
else
{

$programa=$_GET['programa'];
$escolha=$_GET['escolha'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$chacontadorgeralinsert=$_GET['chacontadorgeralinsert'];
$numerocolunastela=$_GET['numerocolunastela'];
$codigoachou=$_GET['codigoachou'];
$nomecolunaparapassar=$_GET['nomecolunaparapassar'];
$nometabelaparapassar=$_GET['nometabelaparapassar'];
$nomecolunaparapassaracao=$_GET['nomecolunaparapassaracao'];
$chacontadorgeralupdate=$_GET['chacontadorgeralupdate'];
$titulojanelainsert=$_GET['titulojanelainsert'];

$seelctcampolista2=$_GET['seelctcampolista2'];
$seelctcampolista1=$_GET['seelctcampolista1'];
$campolista2=$_GET['campolista2'];
$campolista1=$_GET['campolista1'];

$codigoproximoregitro=$_GET['codigoproximoregitro'];

}



$tamanhojanela="janelagrande1";

  





if ($escolha=="novoregistro"){


?>
<div  style="display: block;" id="<?echo $tamanhojanela;?>">

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelainsert;?>
        <a href="job.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>









<table border="0" style='background:white;' width="80%">

<tr> 
                    <td>Customer:</td>
					<td><select   name="customergrava">
     
					<?
					 $stmt1 = "select ID_CUSTOMER,CUSTOMER from customer";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
				
	                 <td>Nr.Job:</td>
					 <td><input type="txt" name="numerojob" size="5"  >- Data:<input type="text" name="dataj"  OnKeyUp="mascaraData(this);" size="8"  / VALUE="" ></td>
					 
					 
</tr>
</table>

					 
<table  border=1 style='background:white;' width="100%">
<tr>
<th>id</th>
<th>Work</th>
<th>Seleciona</th>
</tr>
<?


$sql = "select id_work,work from work";
          $result = $conn->Execute($sql);
          while ( !$result->EOF) {
            $campo1=$result->fields["0"];
			$campo2=$result->fields["1"];
    ?>
        <tr>
        <td><?echo $campo1;?></td>
		<td><?echo $campo2;?></td>
		<td><input type="checkbox" name="campogravawork[]" value="<?echo $campo1;?>"></td>

        </tr>
		<?
		$result->MoveNext();
          } 
		?>			 
 </table>
</BR>
<table  border=1 style='background:white;' width="100%">
<tr>
<th>id</th>
<th>Services</th>
<th>SRS</th>
<th>OTHERS</th>
</tr>
<?


$sql = "select id_service,service from service";
          $result = $conn->Execute($sql);
          while ( !$result->EOF) {
            $campo1=$result->fields["0"];
			$campo2=$result->fields["1"];
    ?>
        <tr>
        <td><?echo $campo1;?></td>
		<td><?echo $campo2;?></td>
		<td><input type="checkbox" name="campogravaservicosrs[]" value="<?echo $campo1;?>"></td>
		<td><input type="checkbox" name="campogravaservicooutro[]" value="<?echo $campo1;?>"></td>

        </tr>
		<?
		$result->MoveNext();
          } 
		?>			 
 </table>
 
 







        <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<?echo $nomecolunaparapassar;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<?echo $nomecolunaparapassaracao;?>" >
        <input type="hidden" name="nometabelaparapassar" size="5" value="<?echo $nometabelaparapassar;?>" >
        
        <input type="hidden" name="numerocolunastela" size="5" value="<?echo $numerocolunastela;?>" >
        <input type="hidden" name="chacontadorgeral" size="5" value="<?echo $chacontadorgeral;?>" >
        <input type="hidden" name="chacontadorgeralupdate" size="5" value="<?echo $chacontadorgeralupdate;?>" >
        <input type="hidden" name="chacontadorgeralinsert" size="5" value="<?echo $chacontadorgeralinsert;?>" >
        <input type="hidden" name="campolista1" size="5" value="<?echo $campolista1;?>" >
        <input type="hidden" name="campolista2" size="5" value="<?echo $campolista2;?>" >
        <input type="hidden" name="rua5gravacorreio" size="5" value="<?echo $rua5gravacorreio;?>" >
        <input type="hidden" name="seelctcampolista1" size="5" value="<?echo $seelctcampolista1;?>" >
        <input type="hidden" name="seelctcampolista2" size="5" value="<?echo $seelctcampolista2;?>" >
        
        <input type="hidden" name="codigoproximoregitro" size="5" value="<?echo $codigoproximoregitro;?>" >
		<input type="hidden" name="escolha" size="5" value="GRAVA1" >
        

        






        </br></br></br></br>
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>

        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="cancelarmensagem.png" width="92" height="48" ></a>

        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okmensagem.png" width="62" height="45" ></a>



        </td>

        </tr>
        </table>
		<div>

<?

}

if ($escolha=="GRAVA1"){
?>
<div  style="display: block;" id="<?echo $tamanhojanela;?>">

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        Nr.Job:<?echo $numerojob;?> - Nr.Load:<input type="txt" name="load1" size="5"  >
        <a href="job.php?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
<table  border=1 style='background:white;' width="100%">

<?


$sql = "select id_caracteristica,caracteristica  from caracteristica_spray";
          $result = $conn->Execute($sql);
          while ( !$result->EOF) {
            $campo1=$result->fields["0"];
			$campo2=$result->fields["1"];
    ?>
        <tr>
        <?
		if ($campo1=="2"){
		?>
		<td><?echo "$campo2</br>";?>
		
		 length (m):<input type="txt" name="lengthcar" size="5" ></br>
         width (m): <input type="txt" name="widthcar" size="5"  ></br>
        
         
		<?}
		if ($campo1=="1"){
		?>
		<td><?echo "$campo2</br>";?>
		 
		 Road:<input type="txt" name="roadcar" size="5"  ></br>
         Air:<input type="txt" name="airar" size="5"  ></br>
         Sprayer:<input type="txt" name="sprayercar" size="5"  ></br>
		<?}?>
		
		
        </tr>
		<input type="hidden" name="campogravacarac[]" value="<?echo $campo1;?>">
		<?
		$result->MoveNext();
          } 
		?>			 
 </table>
 
 <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<?echo $nomecolunaparapassar;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<?echo $nomecolunaparapassaracao;?>" >
        <input type="hidden" name="nometabelaparapassar" size="5" value="<?echo $nometabelaparapassar;?>" >
        
        <input type="hidden" name="numerocolunastela" size="5" value="<?echo $numerocolunastela;?>" >
        <input type="hidden" name="chacontadorgeral" size="5" value="<?echo $chacontadorgeral;?>" >
        <input type="hidden" name="chacontadorgeralupdate" size="5" value="<?echo $chacontadorgeralupdate;?>" >
        <input type="hidden" name="chacontadorgeralinsert" size="5" value="<?echo $chacontadorgeralinsert;?>" >
        <input type="hidden" name="campolista1" size="5" value="<?echo $campolista1;?>" >
        <input type="hidden" name="campolista2" size="5" value="<?echo $campolista2;?>" >
        <input type="hidden" name="rua5gravacorreio" size="5" value="<?echo $rua5gravacorreio;?>" >
        <input type="hidden" name="seelctcampolista1" size="5" value="<?echo $seelctcampolista1;?>" >
        <input type="hidden" name="seelctcampolista2" size="5" value="<?echo $seelctcampolista2;?>" >
        
        <input type="hidden" name="codigoproximoregitro" size="5" value="<?echo $codigoproximoregitro;?>" >
		<input type="hidden" name="escolha" size="5" value="GRAVA1" >
        <input type="hidden" name="numerojob" size="5" value="<?echo $numerojob;?>" >
		<input type="hidden" name="customergrava" size="5" value="<?echo $customergrava;?>" >
		<input type="hidden" name="dataj" size="5" value="<?echo $dataj;?>" >

      
		
 </br></br></br></br>
        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>

        <a href="job.php?navegando=sim&escolha=1">
        <IMG src="cancelingles.png" width="92" height="48" ></a>

        <a href="#" onclick="document.forms[0].submit();return false;">
        <IMG src="okfinalizar.png" width="62" height="45" ></a>



        </td>

        </tr>
        </table>


<?

        $usu18ussm = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM job";
        $resultussm = $conn->Execute($usu18ussm);
        while ( !$resultussm->EOF) {
         $sequencia=$resultussm->fields["SEQUENCIA"];
           IF ($sequencia >"0"){
           $proximo=$sequencia+1;
	       }
	       ELSE
	       {
            $proximo="1";
	       }

         $resultussm->MoveNext();
         }
		 
		 
		 
		 
        $usu18achajob1 = "SELECT count(*) CONTADOR from job  where id_customer='$customergrava' and nr_job='$numerojob' ";
        $usu18achajob2 = $conn->Execute($usu18achajob1);
        while ( !$usu18achajob2->EOF) {
         $contajob=$usu18achajob2->fields["CONTADOR"];
          if ($contajob=="0"){
            
			
			
			
			$query = "INSERT INTO job (nr_job,id_customer,nr_sequencia,dt_job) values ('$numerojob','$customergrava','$proximo',to_date('$dataj','dd/mm/YYYY'))";
            $result = $conn->Execute($query);
		    
		  }		  
		   
		 $usu18achajob2->MoveNext();
         }

         //GRVA WORK
		 
		$usu18achatotalwork1 = "SELECT count(*) CONTADOR from work";
        $usu18achatotalwork12 = $conn->Execute($usu18achatotalwork1);
        while ( !$usu18achatotalwork12->EOF) {
         $totalwork=$usu18achatotalwork12->fields["CONTADOR"];
		$usu18achatotalwork12->MoveNext();
        }
		
		
		
for ($i87W = 0; $i87W < $totalwork; $i87W++ )		 
{

$campogravafinal1=$campogravawork[$i87W];
  if ($campogravafinal1 >"0"){
      
            $usu18ussm6 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM job_work";
            $resultussm66 = $conn->Execute($usu18ussm6);
            while ( !$resultussm66->EOF) {
                $sequencia6=$resultussm66->fields["SEQUENCIA"];
               IF ($sequencia6 >"0"){
                 $proximowork=$sequencia6+1;
	           }
	           ELSE
	          {
                 $proximowork="1";
	          }

            $resultussm66->MoveNext();
            }
			
			$query = "INSERT INTO job_work (nr_job,id_customer,nr_sequencia,id_work) values ('$numerojob','$customergrava','$proximowork','$campogravafinal1')";
            $result = $conn->Execute($query);
		    //echo "$query</br>";
  }
}

    //grava servico
	
	$usu18achatotalwork1 = "SELECT count(*) CONTADOR from service";
        $usu18achatotalwork12 = $conn->Execute($usu18achatotalwork1);
        while ( !$usu18achatotalwork12->EOF) {
         $totalservico=$usu18achatotalwork12->fields["CONTADOR"];
		$usu18achatotalwork12->MoveNext();
        }
		
		
		
for ($i87s = 0; $i87s < $totalservico; $i87s++ )		 
{

$campogravafinaloutro=$campogravaservicooutro[$i87s];
$campogravafinalsrs=$campogravaservicosrs[$i87s];
  
  if ($campogravafinaloutro >"0"){
      
            $usu18ussm6 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM job_service";
            $resultussm66 = $conn->Execute($usu18ussm6);
            while ( !$resultussm66->EOF) {
                $sequencia6=$resultussm66->fields["SEQUENCIA"];
               IF ($sequencia6 >"0"){
                 $proximoservice=$sequencia6+1;
	           }
	           ELSE
	          {
                 $proximoservice="1";
	          }

            $resultussm66->MoveNext();
            }
			
			$query = "INSERT INTO job_service (nr_job,id_customer,nr_sequencia,id_service,id_srs,id_outros) values ('$numerojob','$customergrava','$proximoservice','$campogravafinaloutro','N','S')";
            $result = $conn->Execute($query);
		    //echo "$query</br>";
  }
  if ($campogravafinalsrs >"0"){
      
            $usu18ussm6 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM job_service";
            $resultussm66 = $conn->Execute($usu18ussm6);
            while ( !$resultussm66->EOF) {
                $sequencia6=$resultussm66->fields["SEQUENCIA"];
               IF ($sequencia6 >"0"){
                 $proximoservice=$sequencia6+1;
	           }
	           ELSE
	          {
                 $proximoservice="1";
	          }

            $resultussm66->MoveNext();
            }
			
			$query = "INSERT INTO job_service (nr_job,id_customer,nr_sequencia,id_service,id_srs,id_outros) values ('$numerojob','$customergrava','$proximoservice','$campogravafinalsrs','S','N')";
            $result = $conn->Execute($query);
		    //echo "$query</br>";
  }
  
}

 //GRVA caracteristcias
		 
		$usu18achatotalwork1 = "SELECT count(*) CONTADOR from caracteristica_spray";
        $usu18achatotalwork12 = $conn->Execute($usu18achatotalwork1);
        while ( !$usu18achatotalwork12->EOF) {
         $totalcara=$usu18achatotalwork12->fields["CONTADOR"];
		$usu18achatotalwork12->MoveNext();
        }
		
		
		
for ($i87W = 0; $i87W < $totalcara; $i87W++ )		 
{

$campogravafinal1=$campogravacarac[$i87W];
  
      
            $usu18ussm6 = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM job_caracteristica";
            $resultussm66 = $conn->Execute($usu18ussm6);
            while ( !$resultussm66->EOF) {
                $sequencia6=$resultussm66->fields["SEQUENCIA"];
               IF ($sequencia6 >"0"){
                 $proximocarcte=$sequencia6+1;
	           }
	           ELSE
	          {
                 $proximocarcte="1";
	          }

            $resultussm66->MoveNext();
            }
			
			if ($campogravafinal1=="2"){//area
			$areacalculada=$lengthcar*$widthcar;
			$query = "INSERT INTO job_caracteristica (nr_job,id_customer,nr_sequencia,id_caracteristica,nr_load,VL_LENGTH,VL_WIDTH,VL_SQUARE_METRES) values ('$numerojob','$customergrava','$proximocarcte','$campogravafinal1','$load1','$lengthcar','$widthcar','$areacalculada')";
            $result = $conn->Execute($query);
		    
			}
			
			if ($campogravafinal1=="1"){//temperatura
			
			$query = "INSERT INTO job_caracteristica (nr_job,id_customer,nr_sequencia,id_caracteristica,nr_load,VL_ROAD,VL_AIR,VL_SPRAYER) values ('$numerojob','$customergrava','$proximocarcte','$campogravafinal1','$load1','$roadcar','$airar','$sprayercar')"; 
            $result = $conn->Execute($query);
		    
			}
			
			
			
  
}
	
   
   
   $erromostra=$conn->ErrorMsg();

   //require("logerrobi.php");

}

?>
</div>



</form>


