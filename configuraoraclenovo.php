<?
              $bancoinicial=$banco;
              $banco="maker";
              $username_https="root";
              $password_https="di2040";
              $hostname_https="Localhost";
              
         $transmite77u= "SELECT DS_SENHA_HTTPS A,DS_USER_HTTPS B,DS_HOST_HTTPS C,
         DS_USUARIO_BANCO_DADOS E,ID_TIPO_BANCO_DADOS TIPO,DS_HOST_BANCO HOSTBANCO,
         DS_PORTA_BANCO PORTA,DS_SERVICE_NAME_BANCO_DADOS SERVICO,DS_SENHA_BANCO_DADOS SENHA
         FROM
         banco_bi
          where
          id_banco_site='N' and
          ID_TIPO_BANCO_DADOS='ORACL' AND
          DS_BANCO='$labelbanco'
          ";

          
          $transmite77u2= mysql_db_query($banco,$transmite77u,$conexao);
          $transmite77u3=mysql_fetch_array($transmite77u2);
          


         $hostbanco=$transmite77u3["HOSTBANCO"];
         $portabanco=$transmite77u3["PORTA"];
         $servicobanco=$transmite77u3["SERVICO"];
         $bancooracle=$transmite77u3["E"];

         $senhabancooracle=$transmite77u3["SENHA"];
         
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
            //echo "Usuário conectado: ".$ora_user;
          }
          else
          {
            echo "Erro na conexão com o Oracle.";
          }

          $banco=$bancoinicial;

?>
