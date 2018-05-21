<? session_start();

require("consultaliberacaoacesso.php");
$html="<html>";



?>


<div  style="display: block;" id="mostraexclusao">
<?

$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];



$bancoAQUI="site_maximiza";
$bancoinicial=$banco;


require("configuramysqlversa2.php");
require("estilo2.css");

         $transmite77= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          id_banco_site='N' and
          DS_BANCO_WEB='$banco'
          ";

          $transmite774= mysql_db_query($bancoAQUI,$transmite77,$conexao);
          $valor77=mysql_fetch_array($transmite774);
          $hostbanco=$valor77["HOSTBANCO"];
          $portabanco=$valor77["PORTA"];
          $servicobanco=$valor77["SERVICO"];



         $senhabancooracle=$valor77["SENHA"];

         $bancooracle=$valor77["E"];

            $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=$hostbanco)(PORT=$portabanco)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=$servicobanco))
          )";


           $ora_senha=$senhabancooracle;
           $ora_user=$bancooracle;





          if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){

          }
          else
          {
            echo "Erro na conexão com o Oracle.";
          }





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


//$usu18a = "SELECT DS_CAMINHO_GRAFICO CAMINHO FROM parametro_bi";
//$res8a = mysql_db_query($banco,$usu18a,$conexao);
//$valor87a=mysql_fetch_array($res8a);
//$caminho3=$valor87a["CAMINHO"];

$banco=$bancoinicial;
require("configuramysqlversa2.php");


$acha1 = "SELECT E.DESCRICAO NOMEEMPRESA
          FROM PESSOA_BI E
          WHERE
		  E.CODIGO in (select CD_EMPRESA from PARAMETRO_BI)
          ";

          $res = mysql_db_query($banco,$acha1,$conexao);
          $valor6=mysql_fetch_array($res);

          $nomeempresa88=$valor6["NOMEEMPRESA"];



$dataagora = date('Y-m-d H:i:s');



$chatotalpaginas1 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i,
                                    solicitacao_motivo j,
                                    funcionario_sadege l
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido and
                                    j.cd_func_solicitante=l.cadastro
                                    ");
                                     OCIExecute($chatotalpaginas1, OCI_DEFAULT);
    While (OCIFetch($chatotalpaginas1)) {
    $totalpagina55=ociresult($chatotalpaginas1, "CONTADOR") ;

             $registros = "10";
             $paginasloop= ceil($totalpagina55 / $registros);
    }

for ($pagina_atual = 1; $pagina_atual <= $paginasloop; $pagina_atual++) {






$html.="<body>";


$html.="<font style='font-size: 9px;color: black;text-align:left;bold: Negrito' >".$nomeempresa88."</font><br />
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
                <td style=background-color:#CDCDB4>Empresa</td>

                <td style=background-color:#CDCDB4>Data</td>
                <td style=background-color:#CDCDB4>Hora Início</td>
                <td style=background-color:#CDCDB4>Hora Final</td>
                <td style=background-color:#CDCDB4>Pedido</td>

</tr>";


             $inicio = (($registros * $pagina_atual - $registros))+1;
             $fim =(($inicio-1)+$registros) ;
             
             echo "</br>SELECT * FROM (SELECT rownum r, c.nr_pedido PEDIDO,d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,c.dt_limite_acesso_inicial INICIO,
                                    c.dt_limite_acesso_final FINAL,j.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    c.HR_INICIO HORA1,c.HR_FINAL HORA2,
                                    l.nome NOMESOLICITANTE,j.ds_solicitante OBS
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i,
                                    solicitacao_motivo j,
                                    funcionario_sadege l
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido and
                                    j.cd_func_solicitante=l.cadastro) WHERE r >='$inicio' and  r <= '$fim'";
             

$s = OCIParse($ora_conexao, "SELECT * FROM (SELECT rownum r, c.nr_pedido PEDIDO,d.ds_motivo MOTIVO,h.cd_sec SECAO ,h.cadastro CADASTRO,h.nome NOME,
                                    d.ds_motivo SERVICO,h.rg RG,h.cpf CPF,c.dt_limite_acesso_inicial INICIO,
                                    c.dt_limite_acesso_final FINAL,j.cd_empresa SOLICITA,i.empresa FORNECEDOR,
                                    c.HR_INICIO HORA1,c.HR_FINAL HORA2,
                                    l.nome NOMESOLICITANTE,j.ds_solicitante OBS
                                    FROM solicitacao_motivo_func c,
                                    motivo_solicitacao d,
                                    funcionario_sadege h,
                                    fornecedor_sadege i,
                                    solicitacao_motivo j,
                                    funcionario_sadege l
                                    where c.cd_funcionario=h.cadastro and
                                    c.cd_motivo=d.cd_motivo and
                                    c.ID_LIBERADO='S' and
                                    c.dt_limite_acesso_inicial <='$diahoje' and
                                    c.dt_limite_acesso_final>='$diahoje' and
                                    h.cd_fornecedor=i.cod_fornecedor(+) and
                                    c.nr_pedido=j.nr_pedido and
                                    j.cd_func_solicitante=l.cadastro) WHERE  r >='$inicio' and  r <= '$fim'
                                    ");
                                     OCIExecute($s, OCI_DEFAULT);
    While (OCIFetch($s)) {
      $nome=ociresult($s, "NOME") ;
      $cadastro=ociresult($s, "CADASTRO") ;
      $motivo=ociresult($s, "SERVICO") ;
      $cpf=ociresult($s, "CPF") ;
      $rg=ociresult($s, "RG") ;
      $rgin=ociresult($s, "INICIO") ;
      $rgfi=ociresult($s, "FINAL") ;
      $rgfi=ociresult($s, "FINAL") ;
      $secao8=ociresult($s, "SECAO") ;
      $fornecedor8=ociresult($s, "FORNECEDOR") ;
      $empresasolicita=ociresult($s, "SOLICITA") ;
      $hora1=ociresult($s, "HORA1") ;
      $hora2=ociresult($s, "HORA2") ;
      $pedido2=ociresult($s, "PEDIDO") ;
      $nomesolicitante=ociresult($s, "NOMESOLICITANTE") ;

      $nomesolicitante=ociresult($s, "NOMESOLICITANTE") ;
      $obsmostra1=ociresult($s, "OBS") ;

      $mostra=$rgin." Até ".$rgfi;

      $acha1acess= "SELECT COUNT(*) CONTADOR FROM usuario_grupo_bi a, pessoa_bi b
          where a.cd_usuario in (select cd_usuario from usuario_bi where nm_usuario='$edusuario') and
          a.cd_pessoa=b.codigo and
          b.descricao='$empresasolicita'
          ";


          $acha1acess2= mysql_db_query($banco,$acha1acess,$conexao);
          $acha1acess3=mysql_fetch_array($acha1acess2);
          $contadoracesso=$acha1acess3["CONTADOR"];

          if ($contadoracesso >"0"){


		  $html.="<tr><td >$nome</td>
     			  <td >$cpf</td>
				  <td >$rg</td>
                  <td >$fornecedor8</td>
                  <td >$motivo</td>
                  <td >$obsmostra1</td>
                  <td >$nomesolicitante</td>
                  <td >$empresasolicita</td>
                  <td >$mostra</td>
                  <td >$hora1</td>
                  <td >$hora2</td>
                  <td >$pedido2</td>
                  ";

          }
          $contadoracesso="0";
          }//FINAL DE TOADAS ORDENS


 $html.="</tr>
 </table>";
 
 $html.="<table width=99%>
           <tr>
           <td  align=right>
            <font style='font-size: 12px;color: black;text-align:left;bold: Negrito' >Página:".$pagina_atual."/".$paginasloop."</font>
           </td>
           </tr>
           </table>";


$html.="</body>";

}//final das paginas

$html.="</html>";





                 $sql99Y = "SELECT MAX(NR_SEQUENCIA) MAXIMA FROM listagem_pdf_bi";
                 $resY = mysql_db_query($banco,$sql99Y,$conexao);
                 $valor8Y=mysql_fetch_array($resY);
                 $maximaarquivo=$valor8Y["MAXIMA"];

                 if ($maximaarquivo >"0"){$sequenciagravaarquivo=$maximaarquivo+1;}else{$sequenciagravaarquivo="1";}

                 $nomeDoArquivo="portaria.pdf";



                 $today = date('Y-m-d H:i:s');


                 $grava66 = "delete from  listagem_pdf_bi where DS_DESCRICAO='Portaria'";
                 $res = mysql_db_query($banco,$grava66,$conexao);

                 $passa1="./arquivos/".$nomeDoArquivo;
                 unlink($passa1);



                 $grava = "INSERT INTO listagem_pdf_bi (NR_SEQUENCIA,DS_ARQUIVO,DT_GERACAO,DS_DESCRICAO)
                 values ('$sequenciagravaarquivo','$nomeDoArquivo','$today','Portaria')";
                 $res = mysql_db_query($banco,$grava,$conexao);



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
          <titulo2><?echo "Impressão de PDF";?></titulo2></td>

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

           <a href="consultaliberacaoacesso.php?escolha=1&navegando=sim&banco=<?echo $banco;?>&localbanco=<?echo $localbanco;?>&usuario=<?echo $usuario;?>">
          <img src="sairtela.png" width="42" height="38"></a>

           </td>
           </tr>
           </table>


<?}?>
</div>





