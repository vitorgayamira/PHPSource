<?
         //ABRE OS BANCOS
         
         $bancoAQUI="maker";
         $bancoinicial=$banco;
         
         $transmite77= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          id_banco_site='N' and
          DS_BANCO_WEB='$banco'
          union
          SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          DS_BANCO_WEB='maker'
          ";
         $transmite772= mysql_db_query($bancoAQUI,$transmite77,$conexao);
         while ($valor77=mysql_fetch_array($transmite772)) {


         $hostbanco=$valor77["HOSTBANCO"];
         $portabanco=$valor77["PORTA"];
         $servicobanco=$valor77["SERVICO"];



         $senhabancooracle=$valor77["SENHA"];
         


         $tipo=$valor77["TIPO"];


         IF ($tipo=="MYSQL"){
         
          $banco=$valor77["E"];
          $username_https=$valor77["B"];
          $password_https=$valor77["A"];
          $hostname_https=$valor77["C"];
          


            require("configuramysqlversa2.php");

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

             $codigopessoaatual=$sequencia;

             $grava = "INSERT INTO pessoa_bi(codigo,
             descricao,
             dt_nascimento,
             pf_sexo,
             nr_cpf,
             NM_LOGRADOURO,
             ds_email,
             nr_rg,
             nm_BAIRRO,
             nr_CEP,
             nr_endereco,
             ds_complemento,
             cd_cidade,
             PF_TELEFONE1,
             id_pessoa_candidata,id_tipo_pessoa
             )
             values ('$sequencia',
             '$nome',
             '$nascimentograva',
             '$sexograva',
             '$cpf',
             '$rua5grava',
             '$emailgrava',
             '$rggrava',
             '$bairrograva',
             '$cep',
             '$numerograva',
             '$complementograva',
             '$cidadegrava',
             '$fone1',
              'N','1'
              )";
              
              //echo "</br>$grava";

              $res = mysql_db_query($banco,$grava,$conexao);



          }//FINAL UANDO É MYSQL

          IF ($tipo=="ORACL"){

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

                  $sacho77 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM FUNCIONARIO_SADEGE where
                  cadastro='$codigosadege'");
                  OCIExecute($sacho77, OCI_DEFAULT);
                  While (OCIFetch($sacho77)) {
                    $achouquantos=ociresult($sacho77, "CONTADOR") ;
                  }

                  $sacho777 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM FUNCIONARIO_SADEGE where
                  UPPER(NOME)='$nome'");
                  OCIExecute($sacho777, OCI_DEFAULT);
                  While (OCIFetch($sacho777)) {
                    $achouquantos2=ociresult($sacho777, "CONTADOR") ;
                  }




                 if ($achouquantos >"0"){

                  $mensagemtela="Este codigo do Funcionario já Existe</br>";
                  $codigomensagem="inclusao";
                  $status="novo";
                  $iniciotela="nao";

                  $nome=strtoupper($nome);//converte maiuscula
                 }
                 else
                 {

                   if ($achouquantos2 >"0"){


                  $mensagemtela="Este Nome do Funcionario  já Existe</br>";
                  $codigomensagem="inclusao";
                  $status="novo";
                  $iniciotela="nao";
                  }
                  else
                  {

                   $sacho777 = OCIParse($ora_conexao, "select max(seq) CONTADOR7 FROM funcionario_sadege");
                  OCIExecute($sacho777, OCI_DEFAULT);
                  While (OCIFetch($sacho777)) {
                    $novafuncio=ociresult($sacho777, "CONTADOR7") ;


                  }

                  if ($novafuncio>"0"){$novafunciograva=$novafuncio+1;}else{$novafunciograva="1";}


                  $sacho777F = OCIParse($ora_conexao, "select  COD_FORNECEDOR FROM FORNECEDOR_SADEGE where
                  UPPER(EMPRESA)='$nomeempresaassociada5'");
                  OCIExecute($sacho777F, OCI_DEFAULT);
                  While (OCIFetch($sacho777F)) {
                    $codigojuridica55=ociresult($sacho777F, "COD_FORNECEDOR") ;
                  }
                  

                  $cpf1=substr($cpf, 0, 3);
                  $cpf2=substr($cpf, 4, 3);


                  $cpf3=substr($cpf, 8, 3);

                  $cpf4=substr($cpf, 12, 2);
                  $cpf=$cpf1.$cpf2.$cpf3.$cpf4;
                  

                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO funcionario_sadege(seq,cadastro,nome,email,cpf,CD_FORNECEDOR,
                  RG
                  )
                  values ('$novafunciograva','$cadastro','$nome','$emailgrava','$cpf','$codigojuridica55','$rggrava')
                  ");
                  



                  OCIExecute($sgrava1, OCI_DEFAULT);
                  oci_commit($ora_conexao);
                   $mensagemtela="</br>Inclusão com Sucesso";
                   $status="cancelar";
                   $iniciotela="nao";
                   }


                  }





          }//FINAL QUANDO É ORACLE

         }//FINAL DE ANALSIAR OS BANCOS
         
         $banco=$bancoinicial;

           

