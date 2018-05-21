<?
require("estilo2_sitenovo.css");
$codigoempresa=$_SESSION["codigoempresa"];
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
$titulojanelaassociacao1=$_GET['titulojanelaassociacao1'];
$seelctcampolista2=$_GET['seelctcampolista2'];
$seelctcampolista1=$_GET['seelctcampolista1'];
$campolista2=$_GET['campolista2'];
$campolista1=$_GET['campolista1'];
$nometabelaassociativa1=$_GET['nometabelaassociativa1'];
$ordenaatual=$_GET['ordenaatual'];
$chacontadorgeral=$_GET['chacontadorgeral'];
$numerocolunastela=$_GET['numerocolunastela'];



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
$nometabelaassociativa1=$_POST['nometabelaassociativa1'];


}

IF ($programa=="FUNCAO.php")
{
$tamanhojanela="janelagrande2";


}
else
{
$tamanhojanela="novoscadastros1";

}

if ($escolha=="associatabelas"){



?>
<div  style="display: block;" id="<?echo $tamanhojanela;?>">

        <table  width="100%"  border="0" background-image="sairmensagem.png" >
        <tr>
        <td  align=right>
        <?echo $titulojanelaassociacao1;?>
        	
		<a href="<?echo $programa;?>?navegando=sim&escolha=1">
        <IMG src="sairmensagem.png" width="38" height="38" ></a>
        </td>
        </tr>
        </table>
		</br>
<?


$sqlnovo=$seelctcampolista1;


$rsRegistro8 = $conn->Execute($sqlnovo);

for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++ )
{
$obj = $rsRegistro8->FetchField($i);
$Campos2[] =$obj->name;
}


$sqlnovo=$seelctcampolista2;


$rsRegistro8 = $conn->Execute($sqlnovo);

for ($i = 0; $i < $rsRegistro8->FieldCount(); $i++ )
{
$obj = $rsRegistro8->FetchField($i);
$Campos3[] =$obj->name;
}


?>



					 
<table border="0" style='background:white;' width="80%">

<?


?>


        <tr>
        <th>Grupo Usuário:</th>

                    <td><select   name="campogravapaiposicao1">
					<option value="">Todos</option>
					<?
					 $stmt1 = "SELECT CODIGO Grupo_Usuário ,DESCRICAO from grupo_usuario_bi";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}-{$result3->fields["2"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
        </tr>
        
        <tr>
        <th>Pasta:</th>

                    <td><select   name="campogravapaiposicao2">
					<option value="">Todos</option>
					<?
					 $stmt1 = "SELECT CD_PASTA Pasta,DS_PASTA from pasta_menu_bi";
                     $result3 = $conn->Execute($stmt1);
                     while ( !$result3->EOF) {
                          print "<option value=\"{$result3->fields["0"]}\">{$result3->fields["1"]}-{$result3->fields["2"]}</option>";


                     $result3->MoveNext();
                     }
                     ?>
					 </select></td>
        </tr>


 </table>

</br>

<div style="height:60%;width:90%;overflow:scroll" > 

<center><table  border=0
           style='background:white;' width="100%" align="center" class="tabela1">
<tr>
<?

$rsRegistro8AT = $conn->Execute($chacontadorgeral);


for ($iAT = 0; $iAT < $rsRegistro8AT->FieldCount(); $iAT++ )
{

$obj = $rsRegistro8AT->FetchField($iAT);
$CamposAT[] =$obj->name;
}

for($iAT2 = 0;$iAT2 < $rsRegistro8AT->FieldCount(); $iAT2++){
    ?><th><a href="classeassociadotabelas.php?pagina=1&escolha=associatabelas&programa=<?echo $programa;?>&navegando=sim&ordenaatual=<?echo $CamposAT[$iAT2];?>&chacontadorgeral=<?echo $chacontadorgeral;?>&numerocolunastela=<?echo $numerocolunastela;?>&titulojanelaassociacao1=<?echo $titulojanelaassociacao1;?>&nometabelaassociativa1=<?echo $nometabelaassociativa1;?>" style="text-decoration:none;color: white;">
		<? echo $CamposAT[$iAT2];?></a></th>
<?
}
?>
<th>Seleciona</th>
</tr>
<?

if ($ordenaatual=="DS_FUNCAO"){$chacontadorgeral=$chacontadorgeral." ORDER BY a.DS_FUNCAO ASC";}
if ($ordenaatual=="CD_FUNCAO"){$chacontadorgeral=$chacontadorgeral." ORDER BY a.CD_FUNCAO ASC";}
if ($ordenaatual=="CD_PROGRAMA"){$chacontadorgeral=$chacontadorgeral." ORDER BY a.CD_PROGRAMA ASC";}


//Instancio a classe de manipulação
$s = new ManipulaSql();
$s->Seleciona($chacontadorgeral);
if(!empty($s->content))
{
    foreach ($s->content as $v)
    {
    ?>
        <tr>
        <?
        for($i2 = 0;$i2 < $numerocolunastela; $i2++){
       	?>
		<td><?echo $v[$i2];?></td>
		<?
		}
		?>
        <td><input type="checkbox" name="campogravapaiposicao3[]" value="<?echo $v[0];?>"></td>




        </tr>
    <?
    }
}
 ?>
 </table>
 </div>




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
        <input type="hidden" name="chacontadorgeralinsert" size="5" value="<?echo $chacontadorgeralinsert;?>" >
        <input type="hidden" name="nometabelaassociativa1" size="5" value="<?echo $nometabelaassociativa1;?>" >

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



$campogravapaiposicao2=$_POST['campogravapaiposicao2'];
$campogravapaiposicao1=$_POST['campogravapaiposicao1'];
$campogravapaiposicao3=$_POST['campogravapaiposicao3'];


$campogravapaiposicao1grava=$campogravapaiposicao1[0];
$campogravapaiposicao2grava=$campogravapaiposicao2[0];



$sub66S = "SELECT count(*) CONTADOR  from funcao_bi";
            $result5nome586S = $conn->Execute($sub66S);
            while ( !$result5nome586S->EOF) {

              $totalr=$result5nome586S->fields["0"];
             $result5nome586S->MoveNext();
             }

   

for ($i87 = 0; $i87 < $totalr; $i87++ )
{
$campogravafinal=$campogravapaiposicao3[$i87];


   if ($campogravafinal >"0"){
   
     if ($nometabelaassociativa1=="funcao_grupo_bi"){

        $usu18ussm = "SELECT MAX(NR_SEQUENCIA) SEQUENCIA FROM funcao_grupo_bi";
        $resultussm = $conn->Execute($usu18ussm);
        while ( !$resultussm->EOF) {
         $sequencia=$resultussm->fields["SEQUENCIA"];
           IF ($sequencia >"0"){
           $sequencia=$sequencia+1;
	       }
	       ELSE
	       {
            $sequencia="1";
	       }

         $resultussm->MoveNext();
         }

        $camposgravainsert="insert into funcao_grupo_bi (nr_sequencia,cd_empresa,cd_grupo,cd_funcao,cd_pasta,id_select,id_atualizar)
		values('$sequencia','$codigoempresa','$campogravapaiposicao1','$campogravafinal','$campogravapaiposicao2','S','S')";
 	
		
        $result = $conn->Execute($camposgravainsert);
        $escolha="1";
        $erromostra=$conn->ErrorMsg();
     }//quano tabela é funcao grupo

   }


 }

  require("logerrobi.php");


}

?>
<div>



</form>


