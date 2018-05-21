<?

         $banco="site_maximiza";
         $bancoinicial=$banco;
         $username_https="root";
         $password_https="di2040";
         $hostname_https="Localhost";
         
         require("configuramysqlversa2.php");

         //ABRE OS BANCOS
         $transmite77= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA,
         ds_banco_web  BANCOWEB
         FROM
         banco_bi

          ";

          
         $transmite772= mysql_db_query($banco,$transmite77,$conexao);
         while ($valor77=mysql_fetch_array($transmite772)) {


         $hostbanco=$valor77["HOSTBANCO"];
         $portabanco=$valor77["PORTA"];
         $servicobanco=$valor77["SERVICO"];



         $senhabancooracle=$valor77["SENHA"];

         $tipo=$valor77["TIPO"];
         $banco=$valor77["BANCOWEB"];

         

          $username_https=$valor77["B"];
          $password_https=$valor77["A"];
          $hostname_https=$valor77["C"];
          
          $achaexistepessoa376= "SELECT count(*) CONTADOR from pessoa_bi where
          descricao='$nome' and id_tipo_pessoa='2'";
          $achaexistepessoa3716= mysql_db_query($banco,$achaexistepessoa376,$conexao);
          $achaexistepessoa3726=mysql_fetch_array($achaexistepessoa3716);
          $contadorexistencia77=$achaexistepessoa3726["CONTADOR"];
         
         if ($contadorexistencia77=="0"){

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




             $grava = "INSERT INTO pessoa_bi(codigo,descricao,nr_cnpj,nm_logradouro,ds_email,
             nm_BAIRRO,nr_cep,ds_complemento,cd_cidade,
             PJ_TELEFONE1,id_tipo_pessoa)
             values ('$sequencia','$nome','$cnpj','$rua5grava',
             '$emailgrava','$bairrograva','$cep','$complementograva','$cidadegrava',
             '$fone3','2')";
              
              //echo "</br>$grava";

              $res = mysql_db_query($banco,$grava,$conexao);

            }



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
           


           
           echo "banco:$ora_user//senha:$ora_senha//host:$hostbanco//porta:$portabanco//servico:$servicobanco//banco:$banco";

          if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
            echo "Usuário conectado: ".$ora_user;
          }
          else
          {
            echo "Erro na conexão com o Oracle.";
          }

           $nome=strtoupper($nome);//converte maiuscula
           
                  $sacho77 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM fornecedor_sadege where
                  cod_fornecedor='$codigosadege'");
                  OCIExecute($sacho77, OCI_DEFAULT);
                  While (OCIFetch($sacho77)) {
                    $achouquantos=ociresult($sacho77, "CONTADOR") ;
                  }
                  
                  $sacho777 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM fornecedor_sadege where
                  empresa='$nome'");
                  OCIExecute($sacho777, OCI_DEFAULT);
                  While (OCIFetch($sacho777)) {
                    $achouquantos2=ociresult($sacho777, "CONTADOR") ;
                  }
                  



                 if ($achouquantos >"0"){

                  $mensagemtela="Este codigo do Fornecedor já Existe</br>";
                  $codigomensagem="inclusao";
                  $status="novo";
                  $iniciotela="nao";

                  $nome=strtoupper($nome);//converte maiuscula
                 }
                 else
                 {

                   if ($achouquantos2 >"0"){


                  $mensagemtela="Este Nome do Fornecedor já Existe</br>";
                  $codigomensagem="inclusao";
                  $status="novo";
                  $iniciotela="nao";
                  }
                  else
                  {
                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO fornecedor_sadege(cod_fornecedor,tipo,empresa,
                  ds_produto_servico,contato,home_page,
                  CGC,E_MAIL,OBS,insc_est,ENDERECO,bairro,
                  cep,CD_UNIDADE,estado,cidade,TELEFONE,TELEFONE_CELULAR,
                  TELEFONE_RESID,CD_UNIDADE
                  )
                  values ('$codigosadege','$tipograva','$nome','$produtoservico','$contatograva',
                  '$homepagegrava','$cnpj','$emailgrava','$observacao','$inscricao',
                  '$ruagrava','$bairrograva','$cep','$unidadegrava','$estadograva',
                  '$cidadegrava','$fone3','$fone1','$fone4','$pessoaassociada')
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

