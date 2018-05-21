<?
         //ABRE OS BANCOS
         
         $bancoAQUI="site_maximiza";
         $bancoinicial=$banco;
         
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


           $nome=strtoupper($nome);//converte maiuscula


                  $sacho777F = OCIParse($ora_conexao, "select  COD_FORNECEDOR FROM FORNECEDOR_SADEGE where
                  EMPRESA='$nomeempresaassociada5'");
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $codigojuridica55=ociresult($sacho777F, "COD_FORNECEDOR") ;
                  }
                  
                  $cpf1=substr($cpf, 0, 3);
                  $cpf2=substr($cpf, 4, 3);

                  
                  $cpf3=substr($cpf, 8, 3);

                  $cpf4=substr($cpf, 12, 2);
                  $cpf=$cpf1.$cpf2.$cpf3.$cpf4;

                  


                  $sacho777F = OCIParse($ora_conexao, "select  COD_FORNECEDOR FROM FORNECEDOR_SADEGE where
                  UPPER(EMPRESA)='$nomeempresaassociada5'");
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $codigojuridica55=ociresult($sacho777F, "COD_FORNECEDOR") ;
                  }
                  


                  



                  $sgrava1= OCIParse($ora_conexao, "UPDATE  funcionario_sadege SET CD_FORNECEDOR='$codigojuridica55',
                  RG='$rggrava',CPF='$cpf',CADASTRO='$cadastro',NOME='$nome'
                  WHERE CADASTRO='$cadastro'
                  ");



                  
                  OCIExecute($sgrava1, OCI_DEFAULT);
                  oci_commit($ora_conexao);
                   $mensagemtela="</br>Atualização  com Sucesso";
                   $status="cancelar";
                   $iniciotela="nao";







         }//FINAL DE ANALSIAR OS BANCOS

         $banco=$bancoinicial;

