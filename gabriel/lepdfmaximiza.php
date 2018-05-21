<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$banco=$_GET['banco'];
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$acaograva=$_GET['acaograva'];
$sequenciaelimina=$_GET['sequenciaelimina'];
$arquivopassa=$_GET['arquivopassa'];

}
require("configuramysql.php");
require("estilo2.css");



 if ($acaograva=="S")
 {

             $passa1="./arquivos/".$arquivopassa;

              $elimina = "DELETE FROM listagem_pdf_bi where nr_sequencia='$sequenciaelimina'";
              $res7 = mysql_db_query($banco,$elimina,$conexao);

              if(file_exists($passa1)){
                unlink($passa1);
                ECHO "Arquivo Pdf Eliminado";
              }

  }






?>

<body>

<form action="enviaremailrendi2maximiza.php"  name="teste"  method="POST" >
<center><font style='font-size: 34px;color: black;text-align:left;bold: Negrito' >Acessando Pdf Gerados</font></br>




</br></br></br></br>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;' width="70%">
             <tr>
             <th>Numero</th>
             <th>Data</th>
             <th>Descricao</th>
             <th>Visualizar Pdf</th>
             <th>Eliminar</th>

             </tr>
             <?



             $achaatividade88= "SELECT  NR_SEQUENCIA,DS_ARQUIVO,DT_GERACAO DATA,DS_DESCRICAO from listagem_pdf_bi order by DT_GERACAO desc ";
             $achaatividade28= mysql_db_query($banco,$achaatividade88,$conexao);
             while ($valor5=mysql_fetch_array($achaatividade28)){
                $arquivochama1=$valor5["DS_ARQUIVO"];
                $arquivochama2="./arquivos/".$arquivochama1;
                
                $dia99=substr($valor5["DATA"],8,2);
                $mes99=substr($valor5["DATA"],5,2);
                $ano99=substr($valor5["DATA"],0,4);
                $hora99=substr($valor5["DATA"],11,2);
                $minuto99=substr($valor5["DATA"],14,2);
                $sequenciaelimina=$valor5["NR_SEQUENCIA"];

                $mostradata=$dia99."/".$mes99."/".$ano99."-".$hora99.":".$minuto99;

                ?>
                <tr>
                  <td><?echo $valor5["NR_SEQUENCIA"];?></td>
                  <td><?echo $mostradata;?></td>
                  <td><?echo $valor5["DS_DESCRICAO"];?></td>
                  <td><a href='<?echo $arquivochama2;?>'><img src="existe.jpg" width="22" height="22"  border="0"></a></td>
                  <td><a href='lepdfmaximiza.php?navegando=sim&banco=<?echo $banco;?>&codigousuario=<?echo $codigousuario;?>&codigoempresa=<?echo $codigoempresa;?>&acaograva=S&sequenciaelimina=<?echo $sequenciaelimina;?>&arquivopassa=<?echo $arquivochama1;?>&localbanco=<?echo $localbanco;?>'><img src="existe.jpg" width="22" height="22"  border="0"></a></td>

                </tr>
              <?
              }
              ?>
             </table>
             
         <input type="hidden" name="continuarmesmatela" value="sim">
		 <input type="hidden" name="codigousuario" value="<?echo $codigousuario;?>">
		 <input type="hidden" name="codigoempresa" value="<?echo $codigoempresa;?>">
		 <input type="hidden" name="banco" value="<?echo $banco;?>">
         <input type="hidden" name="tipo" value="D">
         <input type="hidden" name="escolha" value="parametros">

             
             
</center>
</form>
</body>



