<?require("estilo2_sitenovo.css");
ini_set('display_errors', '0');// N�O HABILITAD 

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


?>
<form action="<?=$PHP_SELF?>" method="POST">
<?




$programa=$_GET['programa'];
$escolha=$_GET['escolha'];
$continuarmesmatela=$_POST['continuarmesmatela'];
$chacontadorgeral=$_GET['chacontadorgeral'];
$numerocolunastela=$_GET['numerocolunastela'];
$codigoachou=$_GET['codigoachou'];
$nomecolunaparapassar=$_GET['nomecolunaparapassar'];
$nometabelaparapassar=$_GET['nometabelaparapassar'];
$nomecolunaparapassaracao=$_GET['nomecolunaparapassaracao'];
$chacontadorgeralupdate=$_GET['chacontadorgeralupdate'];
$titulojanelaupdate=$_GET['titulojanelaupdate'];
$seelctcampolista2=$_GET['seelctcampolista2'];
$seelctcampolista1=$_GET['seelctcampolista1'];
$campolista2=$_GET['campolista2'];
$campolista1=$_GET['campolista1'];
$seelctcampolista3=$_GET['seelctcampolista3'];
$campolista3=$_GET['campolista3'];


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


}



IF (($programa=="V4_PESSOAJURIDICA.php") or ($programa=="FROTA.php") or ($programa=="V4_PESSOAFISICA.php"))
{
$tamanhojanela="janelagrande1";


}
else
{
$tamanhojanela="novoscadastros1";

}

if ($escolha=="atualiza"){





?>
<div  style="display: block;" id="<?echo $tamanhojanela;?>">

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelaupdate;?>
        <a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
<?


$sqlnovo=$chacontadorgeralupdate." and ".$nomecolunaparapassar."=".$codigoachou;


$rsRegistro8 = $conn->Execute($sqlnovo);

for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++ )
{
$obj = $rsRegistro8->FetchField($i);
$Campos[] =$obj->name;
}



?>
<table border="0" style='background:white;' width="80%">
<?
$s = new ManipulaSql();
$s->Seleciona($sqlnovo);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {



        for($i2 = 0;$i2 < $numerocolunastela; $i2++){
        ?>
        <tr>
        <th><?
		      if ($Campos[$i2]=="ID_CONDOMINO"){$Campos[$i2]="� Condomino";}
		      if ($Campos[$i2]=="CD_EMPRESA_ASSOCIADA"){$Campos[$i2]="Empresa";}
			  if ($Campos[$i2]=="DESCRICAO"){$Campos[$i2]="Nome";}
			  if ($Campos[$i2]=="CODIGO"){$Campos[$i2]="Codigo";}
			  if ($Campos[$i2]=="NM_LOGRADOURO"){$Campos[$i2]="Logradouro";}
			  if ($Campos[$i2]=="DS_COMPLEMENTO"){$Campos[$i2]="Complemento";}
			  if ($Campos[$i2]=="CD_CIDADE"){$Campos[$i2]="Cidade";}
              if ($Campos[$i2]=="NM_BAIRRO"){$Campos[$i2]="Bairro";}
			  if ($Campos[$i2]=="CD_TIPO_FORNECEDOR"){$Campos[$i2]="Tipo de Fornecedor";}
			  if ($Campos[$i2]=="NR_INSCRICAO"){$Campos[$i2]="Nr.Inscri��o Estadual";}
			  if ($Campos[$i2]=="NR_CEP"){$Campos[$i2]="Nr.Cep";}
			  if ($Campos[$i2]=="DS_EMAIL"){$Campos[$i2]="Email";}
			  if ($Campos[$i2]=="ID_TIPO_PESSOA"){$Campos[$i2]="Classifica��o Pessoa";}
			  if ($Campos[$i2]=="ID_MATRIZ"){$Campos[$i2]="Matriz";}
			  if ($Campos[$i2]=="ID_FILIAL"){$Campos[$i2]="Filial";}
			  if ($Campos[$i2]=="NR_CNPJ"){$Campos[$i2]="Cnpj";}
			  if ($Campos[$i2]=="ID_FORNECEDOR_SERVICO"){$Campos[$i2]="Fornece Servi�o";}
			  if ($Campos[$i2]=="NR_IDENTIDADE"){$Campos[$i2]="Rg";}
			  if ($Campos[$i2]=="DT_NASCIMENTO"){$Campos[$i2]="Dta Nascimento";}
			  if ($Campos[$i2]=="NR_CPF"){$Campos[$i2]="Cpf";}

			  	
		
		
		echo $Campos[$i2];?></th>
        <?
        if (($i2==$campolista1) or ($i2==$campolista2)  or ($i2==$campolista3)){


          if ($i2==$campolista1)
          {


          ?>
                    <td><select   name="campograva[]">
					<option value="<?echo $v[$i2];?>"><?echo $v[$i2];?></option>
					<?
					 $stmt1 = $seelctcampolista1;
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
           <?
          }
          if ($i2==$campolista2)
          {
          ?>
                    <td><select   name="campograva[]">
					<option value="<?echo $v[$i2];?>"><?echo $v[$i2];?></option>
     <?
					 $stmt1 = $seelctcampolista2;
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["0"]}-{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
           <?
          }
          if ($i2==$campolista3)
          {
          ?>
                    <td><select   name="campograva[]">
					<option value="">Todos</option>
           <?
					 $stmt1 = $seelctcampolista3;
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
           <?
          }

        }
        else
        {
        
		      if ($Campos[$i2]=="� Condomino")
                          {
                          ?>
                           <td><select   name="campograva[]">
						   <option value="<?echo $v[$i2];?>"><?echo $v[$i2];?></option>
					       <option value="N">N�o</option>
					       <option value="S">Sim</option>
                           </select></td>
                          <?
                          }
                          ELSE
                          {
			                 if ($Campos[$i2]=="Fornece Servi�o")
                             {
                             ?>
                             <td><select   name="campograva[]">
						     <option value="<?echo $v[$i2];?>"><?echo $v[$i2];?></option>
					         <option value="N">N�o</option>
					         <option value="S">Sim</option>
                             </select></td>
                             <?
                             }
                             ELSE
                             {
			
			                     if ($Campos[$i2]=="Dta Nascimento"){
									           ?>
											   <td><input type="date" name="campograva[]"  size=36 value="<?echo $v[$i2];?>"></td>
									           <?
											   }
											   else
											   {
											      if ($Campos[$i2]=="Classifica��o Pessoa"){
													  if ($programa=="V4_PESSOAFISICA.php"){$valorpessoa="1";}
			                                          if ($programa=="V4_PESSOAJURIDICA.php"){$valorpessoa="2";}
			                                          ?>
                                                      <td><input type="hidden" name="campograva[]"  value="<?ECHO $valorpessoa;?>" ><?ECHO $valorpessoa;?></td>
											      <?
												  }
												  else
												  {
											      ?>	   
									                <td><input type="txt" name="campograva[]"  size=36 value="<?echo $v[$i2];?>"></td>
                                                <?}
		                                       }
						     } 



		                        
						  }
        }
        ?>
        </tr>

        <?}
       
       
       

    }
 ?>
 </table>
 <?


}
?>

        <input type="hidden" name="escolha" size="5" value="<?echo "GRAVA1";?>" >
        <input type="hidden" name="continuarmesmatela" size="5" value="sim" >
        <input type="hidden" name="programa" size="5" value="<?echo $programa;?>" >
        <input type="hidden" name="nomecolunaparapassar" size="5" value="<?echo $nomecolunaparapassar;?>" >
        <input type="hidden" name="codigoachou" size="5" value="<?echo $codigoachou;?>" >
        <input type="hidden" name="nomecolunaparapassaracao" size="5" value="<?echo $nomecolunaparapassaracao;?>" >
        <input type="hidden" name="nometabelaparapassar" size="5" value="<?echo $nometabelaparapassar;?>" >
        
        <input type="hidden" name="numerocolunastela" size="5" value="<?echo $numerocolunastela;?>" >
        <input type="hidden" name="chacontadorgeral" size="5" value="<?echo $chacontadorgeral;?>" >
        <input type="hidden" name="chacontadorgeralupdate" size="5" value="<?echo $chacontadorgeralupdate;?>" >
        



        </br></br></br></br></br></br></br>
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

<?

}

if ($escolha=="GRAVA1"){



$campograva=$_POST['campograva'];


$sqlnovo=$chacontadorgeralupdate." and ".$nomecolunaparapassar."=".$codigoachou;


$rsRegistro8 = $conn->Execute($sqlnovo);

for ($i9 = 0; $i9 < $rsRegistro8->FieldCount(); $i9++ )
{
$obj = $rsRegistro8->FetchField($i9);
$Campospega4[] =$obj->name;




   $query = "UPDATE ".$nometabelaparapassar." SET ".$Campospega4[$i9]."='".$campograva[$i9]."' where ".$nomecolunaparapassaracao."=".$codigoachou;
   $result = $conn->Execute($query);
   $escolha="1";
   $erromostra=$conn->ErrorMsg();

  }
  
  require("logerrobi.php");

}

?>
<div>



</form>


