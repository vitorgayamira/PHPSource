<?
require("Correios.php");


$bancochegainicio=$banco;

$banco="site_maximiza";

$correios = new Correios;
$correios->retornaInformacoesCep($cep);

$bairrograva=$correios->informacoesCorreios->getBairro();
$rua5grava=$correios->informacoesCorreios->getLogradouro();
$cidadecorreio=$correios->informacoesCorreios->getLocalidade();
$estadocorreio=$correios->informacoesCorreios->getUf();

$rua5gravacorreio=$correios->informacoesCorreios->getLogradouro();
$bairrogravacorreio=$correios->informacoesCorreios->getBairro();


//================
//ABRE OS BANCOS
         $transmite775= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA,DS_BANCO_WEB
         FROM
         banco_bi";


$transmite775= mysql_db_query($banco,$transmite775,$conexao);
while ($valor77=mysql_fetch_array($transmite775))
{

         $banco=$valor77["DS_BANCO_WEB"];;
         $username_https=$valor77["B"];
         $password_https=$valor77["A"];
         $hostname_https=$valor77["C"];



            require("configuramysqlversa2.php");


     $achaestado= "SELECT COUNT(*) CONTADOR from estado_bi where cd_estado='$estadocorreio'";

     $achaestado2= mysql_db_query($banco,$achaestado,$conexao);
     $achaestado3=mysql_fetch_array($achaestado2);
     
     $existees=$achaestado3["CONTADOR"];

     if ($existees=="0"){
        if(empty($estadocorreio))
        {

        }
        else
        {

         $grava5es= "INSERT INTO estado_bi(cd_estado,ds_estado,cd_pais)
         values ('$estadocorreio','$estadocorreio','BRA')";
         $res = mysql_db_query($banco,$grava5es,$conexao);

        }


     }

     
     
     $achacidade= "SELECT COUNT(*) CONTADOR from cidade_bi where ds_cidade='$cidadecorreio'";

     $achacidade2= mysql_db_query($banco,$achacidade,$conexao);
     $achacidade3=mysql_fetch_array($achacidade2);
     $existecidade=$achacidade3["CONTADOR"];
     
     if ($existecidade=="0"){
     
         $ultimo22c = "SELECT MAX(CD_CIDADE) SEQUENCIA FROM cidade_bi";
         $res722c = mysql_db_query($banco,$ultimo22c,$conexao);
         $totallinha3522c=mysql_fetch_array($res722c);
         $sequencia22c=$totallinha3522c["SEQUENCIA"];

         IF ($sequencia22c >"0"){
          $sequencia23c=$sequencia22c+1;
	     }
	     ELSE
	     {
          $sequencia23c="1";
	     }
     
        if(empty($estadocorreio))
        {
        }
        else
        {
        $grava5es= "INSERT INTO cidade_bi(cd_cidade,ds_cidade,cd_estado)
         values ('$sequencia23c','$cidadecorreio','$estadocorreio')";
         $res = mysql_db_query($banco,$grava5es,$conexao);

         $cidadegrava=$sequencia23c;
         
         }
     }
     else
     {
     
                       $usuachacida77= "SELECT CD_CIDADE from cidade_bi where DS_CIDADE='$cidadecorreio'";
                       $usuachacida277= mysql_db_query($banco,$usuachacida77,$conexao);
                       $usuachacida377=mysql_fetch_array($usuachacida277);
                       $cidadegrava=$usuachacida377["CD_CIDADE"];


     


     }

}

$banco=$bancochegainicio;
///echo "cep:$cep//Rua:$rua//bairro:$bairro//cidade:$cidade//estado:$estado";
?>





