<?
ini_set('display_errors', '0');// N�O HABILITAD                    
//PATH ONDE SE ENCONTRA A CLASSE ADODB


require(".\ADODB\adodb519\adodb.inc.php");

$nomeempresaconexao= preg_replace("/\s+/","_",$nomeempresaconexao);
$nomeempresaconexao=strtr($nomeempresaconexao, "��������������������������", "aaaaeeiooouucAAAAEEIOOOUUC");
$nomeempresaconexao=strtoupper($nomeempresaconexao);//converte maiuscula
$nomeempresaconexao= ltrim($nomeempresaconexao);//tira espaco brancoapos e antes

if(empty($nomeempresaconexao)  )
{
  ?><center><?ECHO "� Necess�rio Definir Nome da Empresa , Deseja Nova Tentativa?";
  ?>  
  <a href="indexnovomaximiza.php?navegando=sim&desconecta=nao&usuariomilenio=sim&bancopassa=<?echo $banco;?>&novologin=nao&pedealterarsenha=sim"
 style="text-decoration:none;color: black;"><IMG src="okmensagem.png" width="62" height="45" ></a>
<? 
}
else
{	

if ($nomeempresaconexao=="MAKER")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "maker";
$pass = "maker";
$db   = "xe";
$razaoempresa="Empresa MAKER";
}

if ($nomeempresaconexao=="KYLY")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "200.180.39.210:61521";
$user = "sadege";
$pass = "sadege";
$db   = "XE";
$razaoempresa="EMPRESA KYLY";
}

if ($nomeempresaconexao=="PREDIAL")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "predial";
$pass = "predial";
$db   = "xe";
$razaoempresa="Empresa Predial";
}

if ($nomeempresaconexao=="NIGRO")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "nigro";
$pass = "nigro";
$db   = "xe";
$razaoempresa="Empresa Nigro";
}


if ($nomeempresaconexao=="HENNINGS")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "hennings";
$pass = "hennings";
$db   = "xe";
$razaoempresa="Empresa Hennings";
}

if ($nomeempresaconexao=="BRUNING")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "bruning";
$pass = "bruning";
$db   = "xe";
$razaoempresa="Empresa Bruning";
}

if ($nomeempresaconexao=="EUROPACK")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "europack";
$pass = "europack";
$db   = "xe";
$razaoempresa="Empresa EUROPACKNE";
}

if ($nomeempresaconexao=="GERONIMO")
{
//DADOS PARA CONEX�O
$bd   = "oci8";
$host = "server";
$user = "geronimo";
$pass = "geronimo";
$db   = "xe";
$razaoempresa="Empresa Geronimo";
}




//EFETUA A CONEX�O
$conn = NewADOConnection($bd);
$conn->connect($host,$user,$pass,$db);

    $mostraerro=$conn->ErrorMsg();


    if(empty($mostraerro) )
    {
    }
    else
    {
     print "Erro:".$conn->ErrorMsg();
    }

}


?>


