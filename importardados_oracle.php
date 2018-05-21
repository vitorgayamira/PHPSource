 <?
          $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST= 189.114.223.40)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";


           $ora_senha="waj";
           $ora_user="waj";


          if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
            echo "Usuário conectado: ".$ora_user;
          }
          else
          {
            echo "Erro na conexão com o Oracle.";
          }


                  $nome=strtoupper($nome);//converte maiuscula

                  $sacho77 = OCIParse($ora_conexao, "select CADASTRO,NOME,CPF,RG,EMAIL,CADASTRO,CD_FORNECEDOR
                  FROM  FUNCIONARIO_SADEGE ");
                  OCIExecute($sacho77, OCI_DEFAULT);
                  While (OCIFetch($sacho77)) {
                    $cadastro=ociresult($sacho77, "CADASTRO") ;
                    $nome=ociresult($sacho77, "NOME") ;
                    $cpf=ociresult($sacho77, "CPF") ;
                    $rg=ociresult($sacho77, "RG") ;
                    $email=ociresult($sacho77, "EMAIL") ;
                    $cadastro=ociresult($sacho77, "CADASTRO") ;
                    $fornecedory=ociresult($sacho77, "CD_FORNECEDOR") ;

                    $sacho777F = OCIParse($ora_conexao, "select  EMPRESA FROM FORNECEDOR_SADEGE where
                  COD_FORNECEDOR='$fornecedory'");
                  

                  
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $codigojuridica55=ociresult($sacho777F, "EMPRESA") ;
                  }


                    //echo "cadastro:$cadastro-$nome-$cpf-$rg-$email</br>";
                    
                    $banco="shopping";
$username_https="root";
$password_https="di2040";
$hostname_https="Localhost";
require("configuramysqlversa2.php");


$ultimo77 = "SELECT CODIGO FROM pessoa_bi WHERE DESCRICAO='$codigojuridica55' ";
             $res777 = mysql_db_query($banco,$ultimo77,$conexao);
             $totallinha3577=mysql_fetch_array($res777);
             $nova4444=$totallinha3577["CODIGO"];




   $sql = "select count(*) CONTADOR from pessoa_bi  where descricao='$nome' ";
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
             nr_cpf,
             ds_email,
             nr_rg,
             id_pessoa_candidata,id_tipo_pessoa,cd_cidade
             )
             values ('$sequencia',
             '$nome',
             '$cpf',
             '$email',
             '$rg',
             'N','1','1'
              )";
              
              //echo "$grava</br>";

              $res = mysql_db_query($banco,$grava,$conexao);

      }//final quanso testea
      else
      {
      

                     $grava = "update  pessoa_bi set nr_cadastro='$cadastro',CD_PESSOA_ASSOCIADA='$nova4444'
                     where descricao='$nome'";

              //echo "$grava</br>";

              $res = mysql_db_query($banco,$grava,$conexao);

      }




          } //final da leitura do oracle
          
          ECHO "Final da Atualização";

