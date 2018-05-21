<?
require("Correios.php");

echo "entracorreiro";


$correios = new Correios;
$correios->retornaInformacoesCep($cep);

$bairrograva=$correios->informacoesCorreios->getBairro();
$rua5grava=$correios->informacoesCorreios->getLogradouro();
$cidadecorreio=$correios->informacoesCorreios->getLocalidade();
$estadocorreio=$correios->informacoesCorreios->getUf();

$rua5gravacorreio=$correios->informacoesCorreios->getLogradouro();
$bairrogravacorreio=$correios->informacoesCorreios->getBairro();

echo "estado:$estadocorreio//ciadade:$cidadecorreio//bairro:$bairrogravacorreio//rua:$rua5gravacorreio";

 $usu18uss = "SELECT COUNT(*) CONTADOR from estado where cd_estado='$estadocorreio'";
$resultuss = $conn->Execute($usu18uss);
while ( !$resultuss->EOF) {
$existees=$resultuss->fields["CONTADOR"];
$resultuss->MoveNext();
}




     if ($existees=="0"){
        if(empty($estadocorreio))
        {

        }
        else
        {

         $query = "INSERT INTO estado(cd_estado,ds_estado,cd_pais)
         values ('$estadocorreio','$estadocorreio','BRA')";
         $result = $conn->Execute($query);


        }


     }

     
     $usu18uss = "SELECT COUNT(*) CONTADOR from cidade where ds_cidade='$cidadecorreio'";
$resultuss = $conn->Execute($usu18uss);
while ( !$resultuss->EOF) {
$existecidade=$resultuss->fields["CONTADOR"];
$resultuss->MoveNext();
}
     


     if ($existecidade=="0"){
     
          $ultimo22c = "SELECT MAX(CD_CIDADE) SEQUENCIA FROM cidade";
          $ultimo22c5 = $conn->Execute($ultimo22c);
          while ( !$ultimo22c5->EOF) {
            $sequencia22c=$ultimo22c5->fields["SEQUENCIA"];
          $ultimo22c5->MoveNext();
         }


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
          $query = "INSERT INTO cidade(cd_cidade,ds_cidade,cd_estado)
         values ('$sequencia23c','$cidadecorreio','$estadocorreio')";
         $result = $conn->Execute($query);

         $cidadegrava=$sequencia23c;
         
         }
     }
     else
     {
     
          $ultimo22cC = "SELECT CD_CIDADE from cidade where DS_CIDADE='$cidadecorreio'";
          $ultimo22c5C = $conn->Execute($ultimo22cC);
          while ( !$ultimo22c5C->EOF) {
            $cidadegrava=$ultimo22c5C->fields["CD_CIDADE"];
          $ultimo22c5C->MoveNext();
         }



     


     }





?>





