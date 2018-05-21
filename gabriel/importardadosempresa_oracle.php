 <?
         /*
         $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
          )";
          $ora_user="AJR";
   $ora_senha="AJR";
           */


          $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST= 189.114.223.40)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";

           $ora_user="waj";
   $ora_senha="waj";

       
   
   


          if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
            echo "Usuário conectado: ".$ora_user;
          }
          else
          {
            echo "Erro na conexão com o Oracle.";
          }


                  $nome=strtoupper($nome);//converte maiuscula

                  $sacho77 = OCIParse($ora_conexao, "select EMPRESA,CGC,E_MAIL,TELEFONE,TIPO,
                  CD_UNIDADE FROM  FORNECEDOR_SADEGE ");
                  OCIExecute($sacho77, OCI_DEFAULT);
                  While (OCIFetch($sacho77)) {

                    $empresa=ociresult($sacho77, "EMPRESA") ;
                    $cgc=ociresult($sacho77, "CGC") ;
                    $telefone=ociresult($sacho77, "TELEFONE") ;
                    $email=ociresult($sacho77, "E_MAIL") ;
                    $tipo=ociresult($sacho77, "TIPO") ;
                    $unidade4=ociresult($sacho77, "CD_UNIDADE") ;

                    IF ($tipo=="C"){$integrado="S";}ELSE{$integrado="N";}




                    //echo "cadastro:$cadastro-$nome-$cpf-$rg-$email</br>";
                    
                    $banco="shopping";
$username_https="root";
$password_https="di2040";
$hostname_https="Localhost";
require("configuramysqlversa2.php");



    $sacho777F = OCIParse($ora_conexao, "select  EMPRESA FROM FORNECEDOR_SADEGE where
                  COD_FORNECEDOR='$unidade'");
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $descricaoempresa67=ociresult($sacho777F, "EMPRESA") ;
                  }
                  
                  $sacho777F = OCIParse($ora_conexao, "select  EMPRESA FROM FORNECEDOR_SADEGE where
                  COD_FORNECEDOR='$unidade4'");
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $descricaoempresa66=ociresult($sacho777F, "EMPRESA") ;
                  }



   $sqlt = "select CODIGO from pessoa_bi  where descricao='$descricaoempresa67' ";
   $rest = mysql_db_query($banco,$sqlt,$conexao);
   $valor7t=mysql_fetch_array($rest);
   $valor13unidade=$valor7t["CODIGO"];
   
   $sqlt = "select CODIGO from pessoa_bi  where descricao='$descricaoempresa66' ";
   $rest = mysql_db_query($banco,$sqlt,$conexao);
   $valor7t=mysql_fetch_array($rest);
   $valor14unidade=$valor7t["CODIGO"];


   $sql = "select count(*) CONTADOR from pessoa_bi  where descricao='$empresa' ";
   $res = mysql_db_query($banco,$sql,$conexao);
   $valor7=mysql_fetch_array($res);
   $valor13=$valor7["CONTADOR"];
   if ($valor13=="0")
   {
                    $ultimo = "SELECT MAX(CODIGO) SEQUENCIA FROM pessoa_bi";
             $res7 = mysql_db_query($banco,$ultimo,$conexao);
             $totallinha35=mysql_fetch_array($res7);
             $sequencia=$totallinha35["SEQUENCIA"];

             IF ($sequencia >"0"){
               $sequencia=$sequencia+1;
	         }
	         ELSE
	         {
               $sequencia="1";
	         }

                     $grava = "INSERT INTO pessoa_bi(codigo,
             descricao,
             nr_cnpj,
             ds_email,
             pf_telefone1,
             id_pessoa_candidata,id_tipo_pessoa,cd_cidade,id_integrado,cd_unidade
             )
             values ('$sequencia',
             '$empresa',
             '$cgc',
             '$email',
             '$telefone',
             'N','2','1','$integrado','$valor13unidade'
              )";
              
              echo "$grava</br>";

              $res = mysql_db_query($banco,$grava,$conexao);

      }//final quanso testea
      else
      {
      
         $grava = "update  pessoa_bi set id_integrado='$integrado',cd_unidade='$valor14unidade'
          where descricao='$empresa'";
               //echo "$grava</br>";
               $res = mysql_db_query($banco,$grava,$conexao);

      }




          } //final da leitura do oracle
          
          
          ECHO "Final da Atualização";
          

