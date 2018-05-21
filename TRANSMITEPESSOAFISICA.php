<?


         //ABRE OS BANCOS
         $transmite77= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          id_banco_site='N' and
          nr_sequencia='$sequenciabanco'
          
          ";
          $transmite778= mysql_db_query($banco,$transmite77,$conexao);
          $valor77=mysql_fetch_array($transmite778);
          
          echo "</BR>Inicia transmissao banco:$banco";
         
         $hostbanco=$valor77["HOSTBANCO"];
         $portabanco=$valor77["PORTA"];
         $servicobanco=$valor77["SERVICO"];
         $senhabancooracle=$valor77["SENHA"];
         $tipo=$valor77["TIPO"];
         $banco=$bancoweb;



         
          $banco=$bancoweb;
          $username_https=$valor77["B"];
          $password_https=$valor77["A"];
          $hostname_https=$valor77["C"];
          


            require("configuramysqlversa2.php");


               $existepessoa4= "SELECT count(*) CONTADOR FROM pessoa_bi WHERE descricao='$nomecaha'";
               $existepessoa41= mysql_db_query($banco,$existepessoa4,$conexao);
               $existepessoa42=mysql_fetch_array($existepessoa41);
               $existepessoa43=$existepessoa42["CONTADOR"];

           if ($existepessoa43=="0")
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
             '1',
             '$bairrograva',
             '$cep',
             '$numerograva',
             '$complementograva',
             '$cidadegrava',
             '$fone1',
              'N','1'
              )";
              
              echo "</br>$grava";

              $res = mysql_db_query($banco,$grava,$conexao);

             }



          
          
               $ultimousuario1= "SELECT MAX(CD_USUARIO) SEQUENCIA FROM usuario_bi";
               $ultimousuario2= mysql_db_query($banco,$ultimousuario1,$conexao);
               $ultimousuario3=mysql_fetch_array($ultimousuario2);
               $sequenciaus=$ultimousuario3["SEQUENCIA"];

               $ultimousuarioNOME1= "SELECT CODIGO FROM pessoa_bi where descricao='$nomecaha'";
               $ultimousuario2NOME1= mysql_db_query($banco,$ultimousuarioNOME1,$conexao);
               $ultimousuario3NOME1=mysql_fetch_array($ultimousuario2NOME1);
               $gravapes=$ultimousuario3NOME1["CODIGO"];
               
               $empresaquestao1= "SELECT CODIGO FROM pessoa_bi where descricao='$nomeempresag'";
               $empresaquestao2= mysql_db_query($banco,$empresaquestao1,$conexao);
               $empresaquestao3=mysql_fetch_array($empresaquestao2);
               $empresagravafinal=$empresaquestao3["CODIGO"];




               IF ($sequenciaus >"0"){
                  $sequenciaus=$sequenciaus+1;
	           }
	           ELSE
	           {
                 $sequenciaus="1";
	           }
	           

               $existeusuario19= "SELECT count(*) CONTADOR FROM usuario_bi WHERE cd_pessoa='$gravapes' and
               cd_empresa='$empresagravafinal'";
               ECHO "$existeusuario19";
               
               $existeusuario29= mysql_db_query($banco,$existeusuario19,$conexao);
               $existeusuario39=mysql_fetch_array($existeusuario29);
               $contadorusuario9=$existeusuario39["CONTADOR"];

               if ($contadorusuario9=="0"){



               $grava = "INSERT INTO usuario_bi(cd_usuario,cd_senha,nm_usuario,dt_atualizacao,cd_pessoa,
               cd_empresa,id_muda_ambiente_banco)
               VALUES ('$sequenciaus','$senha','$emailg','$today','$gravapes','$empresagravafinal','N')";

               ECHO "</BR>$grava";
               $res = mysql_db_query($banco,$grava,$conexao);
               $achausuario9=$sequenciaus;
               
               }
               else
               {
               $existeusuario19= "SELECT cd_usuario CODIGO from  usuario_bi WHERE cd_pessoa='$gravapes' and
               cd_empresa='$empresagravafinal'";
               $existeusuario29= mysql_db_query($banco,$existeusuario19,$conexao);
               $existeusuario39=mysql_fetch_array($existeusuario29);
               $achausuario9=$existeusuario39["CODIGO"];
               }
               
               
               $existeusuario169= "SELECT count(*) CONTADOR FROM usuario_grupo_bi
                WHERE cd_pessoa='$gravapes' and
               cd_empresa='$empresagravafinal' and cd_usuario='$achausuario9'";
               echo "$existeusuario169";

               $existeusuario269= mysql_db_query($banco,$existeusuario169,$conexao);
               $existeusuario369=mysql_fetch_array($existeusuario269);
               $contadorusuario91=$existeusuario369["CONTADOR"];

               if ($contadorusuario91=="0"){
               

               $grava = "INSERT INTO usuario_grupo_bi(cd_usuario,cd_grupo,CD_EMPRESA,CD_PESSOA)
               VALUES ('$sequenciaus','$grupog','$empresagravafinal','$gravapes')";
               echo "</br>$grava";
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
           
           




                  $sacho777 = OCIParse($ora_conexao, "select count(*) CONTADOR FROM FUNCIONARIO_SADEGE where
                  nome='$nome'");
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
                  $sgrava1= OCIParse($ora_conexao, "INSERT INTO funcionario_sadege(cadastro,nome,email,cpf
                  )
                  values ('$nome','$nome','$emailgrava','$cpf')
                  ");

                  echo "INSERT INTO funcionario_sadege(cadastro,nome,email,cpf
                  )
                  values ('$codigosadege','$nome','$emailgrava','$cpf')";

                  OCIExecute($sgrava1, OCI_DEFAULT);
                  oci_commit($ora_conexao);
                   $mensagemtela="</br>Inclusão com Sucesso";
                   $status="cancelar";
                   $iniciotela="nao";
                   }


                  }










}//FINAL UANDO É MORACLE


              $banco="site_maximiza";
              $username_https="root";
              $password_https="di2040";
              $hostname_https="Localhost";


           

