<?




         $achacontador66 = "SELECT a.nr_banco,a.cd_pessoa_fisica PESSOA,a.cd_grupo GRUPO,
         b.DS_SENHA_HTTPS A,b.DS_USER_HTTPS B,DS_HOST_HTTPS C,
         b.DS_USUARIO_BANCO_DADOS E,c.ds_email EMAIL,b.cd_empresa EMPRESA,c.descricao NOME,d.descricao NOMEEMPRESA,
         b.nr_sequencia SEQUENCIABANCO,b.ds_banco_web BANCOWEB,
         c.DESCRICAO NOME,c.DT_NASCIMENTO NASC,
c.PF_SEXO SEXO, c.NR_CPF CPF,
c.nm_LOGRADOURO RUA , c.nm_BAIRRO ID_BAIRRO, c.NR_CEP ID_CEP,c.nr_endereco PF_NUMERO, c.DS_COMPLEMENTO PF_COMP,
c.CD_CIDADE PF_CIDA,
c.DS_EMaIL PF_EMAIL,
c.PF_TELEFONE1 FONE1
         
         FROM
         banco_bi b,candidato_pessoa_bi a,pessoa_bi c,pessoa_bi d
          where
          a.nr_banco=b.nr_sequencia and
          a.nr_sequencia='$acao' AND
          b.cd_empresa=d.codigo and
          a.cd_pessoa_fisica=c.codigo
          ";
          
           echo "$achacontador66";
          
         $res866 = mysql_db_query($banco,$achacontador66,$conexao);
         $valor8766=mysql_fetch_array($res866);
         $username_https=$valor8766["B"];
         $password_https=$valor8766["A"];
         $hostname_https=$valor8766["C"];


         $pessoag=$valor8766["PESSOA"];
         $emailg=$valor8766["EMAIL"];
         $empresag=$valor8766["EMPRESA"];
         $grupog=$valor8766["GRUPO"];
         $nomecaha=$valor8766["NOME"];
         $sequenciabanco=$valor8766["SEQUENCIABANCO"];
         $bancoweb=$valor8766["BANCOWEB"];
         
         $nomeempresag=$valor8766["NOMEEMPRESA"];
         
             $nome=$valor8766["NOME"];
             $nascimentograva=$valor8766["NASC"];
             $sexograva=$valor8766["SEXO"];
             $cpf=$valor8766["CPF"];
             $rua5grava=$valor8766["RUA"];
             $emailgrava=$valor8766["PF_EMAIL"];
             $bairrograva=$valor8766["ID_BAIRRO"];
             $cep=$valor8766["ID_CEP"];
             $numerograva=$valor8766["PF_NUMERO"];
             $complementograva=$valor8766["PF_COMP"];
             $cidadegrava=$valor8766["PF_CIDA"];
             $fone1=$valor8766["FONE1"];

         
             require("chamasenhaaleatoria.php");
         
             //transmite para os drmaisbancos fora o site , sejam eles mysql ou  oracle
              require("TRANSMITEPESSOAFISICA.php");
             //final da tramsissao

             echo "Bancooooooooooooooooooo:$banco";



            //CONTINUA NO AMBIENTE DO SITE
            
            require("configuramysqlversa2.php");




               $ultimousuario1= "SELECT MAX(CD_USUARIO) SEQUENCIA FROM usuario_bi";
               $ultimousuario2= mysql_db_query($banco,$ultimousuario1,$conexao);
               $ultimousuario3=mysql_fetch_array($ultimousuario2);
               $sequenciaus=$ultimousuario3["SEQUENCIA"];
               
               
               $achaempresasite1= "SELECT CODIGO FROM pessoa_bi where ID_EMPRESA_SITE='S'";
               $achaempresasite2= mysql_db_query($banco,$achaempresasite1,$conexao);
               $achaempresasite3=mysql_fetch_array($achaempresasite2);
               $empresag=$achaempresasite3["CODIGO"];

               
               $ultimousuarioNOME1= "SELECT CODIGO FROM pessoa_bi where descricao='$nomecaha'";
               $ultimousuario2NOME1= mysql_db_query($banco,$ultimousuarioNOME1,$conexao);
               $ultimousuario3NOME1=mysql_fetch_array($ultimousuario2NOME1);
               $gravapes=$ultimousuario3NOME1["CODIGO"];


               IF ($sequenciaus >"0"){
                  $sequenciaus=$sequenciaus+1;
	           }
	           ELSE
	           {
                 $sequenciaus="1";
	           }



               $existeusuario1= "SELECT count(*) CONTADOR FROM usuario_bi WHERE cd_pessoa='$gravapes' and
               cd_empresa='$empresag'";

               $existeusuario2= mysql_db_query($banco,$existeusuario1,$conexao);
               $existeusuario3=mysql_fetch_array($existeusuario2);
               $contadorusuario=$existeusuario3["CONTADOR"];

               if ($contadorusuario=="0"){

               $grava = "INSERT INTO usuario_bi(cd_usuario,cd_senha,nm_usuario,dt_atualizacao,cd_pessoa,
               cd_empresa,id_muda_ambiente_banco)
               VALUES ('$sequenciaus','$senha','$emailg','$today','$gravapes','$empresag','N')";


               $res = mysql_db_query($banco,$grava,$conexao);
               $linhas = mysql_affected_rows();
               $achausuario=$sequenciaus;
               }
               else
               {
               
               $existeusuario1= "SELECT cd_usuario CODIGO from  usuario_bi WHERE cd_pessoa='$gravapes' and
               cd_empresa='$empresag'";
               $existeusuario2= mysql_db_query($banco,$existeusuario1,$conexao);
               $existeusuario3=mysql_fetch_array($existeusuario2);
               $achausuario=$existeusuario3["CODIGO"];

               }
               
               
               
               
               
               $existeusuario16= "SELECT count(*) CONTADOR FROM usuario_grupo_bi
                WHERE cd_empresa='$empresag' and cd_usuario='$achausuario'";


               $existeusuario26= mysql_db_query($banco,$existeusuario16,$conexao);
               $existeusuario36=mysql_fetch_array($existeusuario26);
               $contadorusuario=$existeusuario36["CONTADOR"];

               if ($contadorusuario=="0"){


               $grava = "INSERT INTO usuario_grupo_bi(cd_usuario,cd_grupo,CD_EMPRESA,CD_PESSOA)
               VALUES ('$achausuario','$grupog','$empresag','$gravapes')";

               $res = mysql_db_query($banco,$grava,$conexao);

               }
               


               $grava = "UPDATE candidato_pessoa_bi SET ID_ABERTO='N' WHERE NR_SEQUENCIA='$acao'";
               $res = mysql_db_query($banco,$grava,$conexao);

               echo "$grava";

           

