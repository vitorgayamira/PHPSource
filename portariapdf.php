<?session_start();
require("conexaoadodb_oracle.php");
require_once('manipulasql.class_oraclenovo.php');
require("estilo2_sitenovo_maximiza.css");

//require("consultaliberacaoacesso.php");



$html="<html>";
?>


<div  style="display: block;" id="mostraexclusao">
<?



if (!IsSet($mes)){
$mes=date('m');
}

if (!IsSet($ano)){
$ano=date('Y');
}

if (!IsSet($turno)){
$turno="1";
}

if (!IsSet($anoescolha)){$anoescolha=date('Y');}

if (!IsSet($mesescolha)){$mesescolha=date('m');}

$usuario=$_GET['usuario'];

$ano77=date('Y');
   $mes77=date('m');
   $dia77=date('d');



  $diahoje=$dia77."/".$mes77."/".$ano77;


 $caminho3="./arquivos/";



$dataagora = date('Y-m-d H:i:s');



 $usu18ussMAXPED36qunatosabertos1 = "select count(*) CONTADOR  from SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao d,pessoa_bi b,pessoa_bi c,SOLICITACAO_MOTIVO_ACESSO e,pessoa_bi f WHERE a.CD_funcionario=b.codigo and a.CD_EMPRESA_SOLICITANTE=c.codigo and a.cd_motivo=d.cd_motivo and a.ID_LIBERADO='S' and a.dt_limite_acesso_inicial <=to_date('$diahoje','dd/mm/YYYY') and a.dt_limite_acesso_final>=to_date('$diahoje','dd/mm/YYYY') and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
e.CD_PESSOA_SOLICITANTE=f.codigo ";

                                     $usu18ussMAXPED36qunatosabertos2= $conn->Execute($usu18ussMAXPED36qunatosabertos1);
                                     while ( !$usu18ussMAXPED36qunatosabertos2->EOF) {
                                     $totalpagina55=$usu18ussMAXPED36qunatosabertos2->fields["CONTADOR"];

                                      $registros = "18";
                                      $paginasloop= ceil($totalpagina55 / $registros);

                                     $usu18ussMAXPED36qunatosabertos2->MoveNext();
                                     }

        

for ($pagina_atual = 1; $pagina_atual <= $paginasloop; $pagina_atual++)
{

$html.="<body>";

$html.="<font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >".$razaoempresa."</font><br />
<font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >Portaria - Autorizados</font>";

$html.="<font style='font-size: 8.0px;color: black;text-align:left;bold: Negrito' >

<table border=1 width=800px >
<tr>
    			<td style=background-color:#CDCDB4>Nome</td>
                <td style=background-color:#CDCDB4>Cpf</td>
                <td style=background-color:#CDCDB4>Rg</td>
                <td style=background-color:#CDCDB4>Empresa</td>
                <td style=background-color:#CDCDB4>Motivo</td>
                <td style=background-color:#CDCDB4>Obs</td>
                <td style=background-color:#CDCDB4>Solicitante</td>
               
                <td style=background-color:#CDCDB4>Data</td>
                <td style=background-color:#CDCDB4>Hora In�cio</td>
                <td style=background-color:#CDCDB4>Hora Final</td>
                <td style=background-color:#CDCDB4>Pedido</td>

</tr>";

$inicio = (($registros * $pagina_atual - $registros))+1;
             $fim =(($inicio-1)+$registros) ;

$achalistarelatorio1 = "SELECT * FROM (SELECT rownum r, b.codigo CADASTRO,b.descricao NOME,b.nr_cpf CPF,b.nr_identidade RG,c.descricao EMPRESA,d.ds_motivo MOTIVO,f.descricao SOLICITANTE,to_char(a.dt_limite_acesso_inicial,'dd/mm/yyyy') INICIO,to_char(a.dt_limite_acesso_final,'dd/mm/yyyy') FINAL,a.nr_pedido PEDIDO,a.hr_inicio HORAI,a.hr_final HORAF,a.ds_executor OBS
FROM SOLICITACAO_MOTIVO_FUNC_ACESSO a,motivo_solicitacao d,pessoa_bi b,pessoa_bi c,SOLICITACAO_MOTIVO_ACESSO e,pessoa_bi f WHERE a.CD_funcionario=b.codigo and a.CD_EMPRESA_SOLICITANTE=c.codigo and a.cd_motivo=d.cd_motivo and a.ID_LIBERADO='S' and a.dt_limite_acesso_inicial <=to_date('$diahoje','dd/mm/YYYY') and a.dt_limite_acesso_final>=to_date('$diahoje','dd/mm/YYYY') and
a. NR_PEDIDO=e.NR_PEDIDO and
a.CD_EMPRESA_ACESSO=e.CD_EMPRESA_ACESSO and
a.CD_EMPRESA_SOLICITANTE=e.CD_EMPRESA_SOLICITANTE and
a.CD_SERVICO=e.CD_SERVICO and
a.cd_motivo=e.cd_motivo and
e.CD_PESSOA_SOLICITANTE=f.codigo order by b.descricao asc ) WHERE  r >='$inicio' and  r <= '$fim'";

//ECHO "$achalistarelatorio1";

$achalistarelatorio2= $conn->Execute($achalistarelatorio1);
while ( !$achalistarelatorio2->EOF) {

      $nome=$achalistarelatorio2->fields["NOME"];
      $cadastro=$achalistarelatorio2->fields["CADASTRO"];
      $motivo=$achalistarelatorio2->fields["MOTIVO"];
      $cpf=$achalistarelatorio2->fields["CPF"];
      $rg=$achalistarelatorio2->fields["RG"];
      $rgin=$achalistarelatorio2->fields["INICIO"];
	  $rgfi=$achalistarelatorio2->fields["FINAL"];	  
      $empresasolicita=$achalistarelatorio2->fields["EMPRESA"];
      $hora1=$achalistarelatorio2->fields["HORAI"];
      $hora2=$achalistarelatorio2->fields["HORAF"];
      $pedido2=$achalistarelatorio2->fields["PEDIDO"];
      $nomesolicitante=$achalistarelatorio2->fields["SOLICITANTE"];
         
      $obsmostra1=$achalistarelatorio2->fields["OBS"];

      $mostra=$rgin." At� ".$rgfi;
      
      


		  $html.="<tr><td >$nome</td>
     			  <td >$cpf</td>
				  <td >$rg</td>
                  <td >$empresasolicita</td>
                  <td >$motivo</td>
                  <td >$obsmostra1</td>
                  <td >$nomesolicitante</td>
                  <td >$mostra</td>
                  <td >$hora1</td>
                  <td >$hora2</td>
                  <td >$pedido2</td>
                  ";
				  
          
          $contadoracesso="0";
         $achalistarelatorio2->MoveNext();
                                     }
      

 $html.="</tr>
 </table>";
 $html.="<table width=99%>
           <tr>
           <td  align=right>
            <font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >P�gina:".$pagina_atual."/".$paginasloop."</font>
           </td>
           </tr>
           </table>";


$html.="</body>";

}//final das paginas

$html.="</html>";






                                     $gerapdf1 = "SELECT MAX(NR_SEQUENCIA) MAXIMA FROM listagem_pdf_bi ";
                                     $gerapdf2= $conn->Execute($gerapdf1);
                                     while ( !$gerapdf2->EOF) {
                                     $maximaarquivo=$gerapdf2->fields["MAXIMA"];

                                     $gerapdf2->MoveNext();
                                     }



                 
                 
                 if ($maximaarquivo >"0"){$sequenciagravaarquivo=$maximaarquivo+1;}else{$sequenciagravaarquivo="1";}
                 
                 $nomeDoArquivo="portaria.pdf";
                 

                 
                 $today = date('Y-m-d H:i:s');


                 $grava66 = "delete from  listagem_pdf_bi where DS_DESCRICAO='Portaria'";
                 $result6 = $conn->Execute($grava66);
                 
                 $passa1="./arquivos/".$nomeDoArquivo;
                 unlink($passa1);
                 


                 $grava7 = "INSERT INTO listagem_pdf_bi (NR_SEQUENCIA,DS_ARQUIVO,DT_GERACAO,DS_DESCRICAO)
                 values ('$sequenciagravaarquivo','$nomeDoArquivo','$today','Portaria')";
                 $result7= $conn->Execute($grava7);



//$nomeDoArquivo = "rendimentodetalhadodire1.pdf";
$tipoFolha = "L"; // P = Retrato | L = Paisagem
require("./pdf/dompdf/dompdf_config.inc.php");
require("chamapdf.php");

if (geraPDF($nomeDoArquivo, $html, $tipoFolha))
{

?>


<table width="99%">

          <tr>
          <td>
          <titulo2><?echo "Impress�o de PDF";?></titulo2></td>

          </tr>
          </table>

          <hr>


               <center>
               <?echo "Arquivo Gerado";?></center>


           <table width="99%">
           <tr>
           <td  align=right>
           <a href="./arquivos/portaria.pdf">
           <IMG src="imprimirnovomax.png" width="42" height="38" ></a>

           <a href="CONSULTAACESSOLOCAIS1.php">
          <img src="sairtela.png" width="42" height="38"></a>
           
           </td>
           </tr>
           </table>


<?}?>
</div>





