<?
         //ABRE OS BANCOS
         
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
                  




                  $sgrava1= OCIParse($ora_conexao, "UPDATE  FORNECEDOR_SADEGE SET CD_UNIDADE='$codigojuridica55'
                  WHERE NOME='$nome'
                  ");
                  OCIExecute($sgrava1, OCI_DEFAULT);
                  oci_commit($ora_conexao);
                   $mensagemtela="</br>Atualização  com Sucesso";
                   $status="cancelar";
                   $iniciotela="nao";







         }//FINAL DE ANALSIAR OS BANCOS
           

