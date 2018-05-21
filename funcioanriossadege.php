<? session_start();?>
<?
$cortopo="#828282";
$corfundo="#4682B4";

$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$baseoracle=$_GET['baseoracle'];



}


$edusuario= $_SESSION["edusuario"];
$edsenha= $_SESSION["edsenha"];
$banco=$_SESSION["banco"];

                     $username_https=$_SESSION["username_https"];
                     $password_https=$_SESSION["password_https"];
                     $hostname_https=$_SESSION["hostname_https"];




//CHAMA O MENU PELA CONEXAO
require("carregamenumaximiza.php");
require("estilo2_sitenovo.css");



$today = date('d/m/y H:i:s');



require("configuramysqlversa2.php");


$bancoAQUI="site_maximiza";

         $transmite77= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          id_banco_site='N' and
          DS_BANCO_WEB='$banco'

          ";
         $transmite772= mysql_db_query($bancoAQUI,$transmite77,$conexao);
         while ($valor77=mysql_fetch_array($transmite772)) {


         $hostbanco=$valor77["HOSTBANCO"];
         $portabanco=$valor77["PORTA"];
         $servicobanco=$valor77["SERVICO"];



         $senhabancooracle=$valor77["SENHA"];

         $bancooracle=$valor77["E"];
         }

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





?>




<form action="funcioanriossadege.php"  name="formulario" method="POST">

<?
$navegando=$_GET['navegando'];
$continuarmesmatela=$_POST['continuarmesmatela'];

if ($navegando=="sim"){
$codigousuario=$_GET['codigousuario'];
$codigoempresa=$_GET['codigoempresa'];
$escolha=$_GET['escolha'];
$tela=$_GET['tela'];
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$ano=$_GET['ano'];

$pagina=$_GET['pagina'];
$mes1=$_GET['mes1'];
$tipoconsulta=$_GET['tipoconsulta'];


}
if ($continuarmesmatela=="sim"){
$codigousuario=$_POST['codigousuario'];
$codigoempresa=$_POST['codigoempresa'];
$escolha=$_POST['escolha'];
$tela=$_POST['tela'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$curva=$_POST['curva'];
$pesomedio=$_POST['pesomedio'];
$turnopesquisa=$_POST['turnopesquisa'];
$turno=$_POST['turno'];

$tipo=$_POST['tipo'];
$novo=$_POST['novo'];
$pagina=$_POST['pagina'];
$dia1=$_POST['dia1'];
$dia2=$_POST['dia2'];
$quantidade=$_POST['quantidade'];
$semanainicio=$_POST['semanainicio'];
	$semanafinal=$_POST['semanafinal'];
    $turno=$_POST['turno'];
	$primeirasemana=$_POST['primeirasemana'];
	$segundasemana=$_POST['segundasemana'];
	$diainicial=$_POST['diainicial'];
		$diafinal=$_POST['diafinal'];
		$sequencia3=$_POST['sequencia3'];
        $simulacao=$_POST['simulacao'];

		$datagravarinicio=$_POST['datagravarinicio'];
			$datagravarfinal=$_POST['datagravarfinal'];
			$quantaslinhas=$_POST['quantaslinhas'];
            $quantosmercado=$_POST['quantosmercado'];
			$mes1=$_POST['mes1'];
			$mes2=$_POST['mes2'];
			$tipoconsulta=$_POST['tipoconsulta'];
			$quantaslinhas2=$_POST['quantaslinhas2'];
			$volumeano=$_POST['volumeano'];
			$quantidadedia=$_POST['quantidadedia'];
			$semanahoje=$_POST['semanahoje'];
			$tempo2=$_POST['tempo2'];
			$volume2=$_POST['volume2'];
			$destino=$_POST['destino'];
			$idade2=$_POST['idade2'];
			$semanaotimizacao=$_POST['semanaotimizacao'];
			$tempo3=$_POST['tempo3'];
                 $tempo4=$_POST['tempo4'];
                   $tempo5=$_POST['tempo5'];
                    $cabeca5=$_POST['cabeca5'];
                    $dataamostra=$_POST['dataamostra'];
                    $quantaslinhasamostra=$_POST['quantaslinhasamostra'];
                    $intervalo=$_POST['intervalo'];
                    $quantaslinhasfaixa=$_POST['quantaslinhasfaixa'];
                    $sexagem=$_POST['sexagem'];
                    $quantaslinhasvolume=$_POST['quantaslinhasvolume'];
                    $custototalsimulacao=$_POST['custototalsimulacao'];
                    $quantidadetotal5=$_POST['quantidadetotal5'];
                    $consumo5=$_POST['consumo5'];
                    $consumo6=$_POST['consumo6'];
                    $consumo7=$_POST['consumo7'];
                    $classi=$_POST['classi'];

                    $caixa=$_POST['caixa'];
                    $caixa2=$_POST['caixa2'];
                    $novogrupo=$_POST['novogrupo'];
                    $valor17=$_POST['valor17'];
                    $contadorfamilia=$_POST['contadorfamilia'];
                    $listafamilia=$_POST['listafamilia'];



}



$ano=date('Y');





 ?>


<CENTER><font style='font-size: 19px;color: BLACK;text-align:left;bold: Negrito' >Cadastro de Funcionários </font></BR>





<center><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='background:#DCE5EC;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="90%">
 <tr >
  <th>Cadastro</th>
  <th>Nome</th>
  <th>Cpf</th>
  <th>Rg</th>
  <th>Codigo</br>Fornecedor</th>
  <th>Codigo</br>Seção</th>

</tr>
<?


 $quantaslinhasamostra="0";

 $s = OCIParse($ora_conexao, "SELECT CADASTRO,NOME,CD_FORNECEDOR,CD_SEC,CPF,RG  FROM FUNCIONARIO_SADEGE order by NOME asc ");
        OCIExecute($s, OCI_DEFAULT);
        While (OCIFetch($s)) {

          $codigo=ociresult($s, "CADASTRO") ;
          $descricao=ociresult($s, "NOME") ;
          $cpfdescricao=ociresult($s, "CPF") ;
          $rgdescricao=ociresult($s, "RG") ;
          $codigoFORNE=ociresult($s, "CD_FORNECEDOR") ;
          $codigoSECAO=ociresult($s, "CD_SEC") ;

   ?>
   <tr>
   <td><h1 style='font-size: 9px;color: black;text-align:left;bold: Negrito text-decoration: none' >
   <?echo $codigo;?> </td>
   <td><?echo $descricao;?> </td>
   <td><?echo $cpfdescricao;?> </td>
   <td><?echo $rgdescricao;?> </td>
   <td><?echo $codigoFORNE;?> </td>

   <td><?echo $codigoSECAO;?> </td>


   </tr>

   <?


}
?>
</TABLE>

</form>


