<?



    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=averama.agroparati.com.br)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=MAXY))
     )";

     
    /*
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=189.114.223.40)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

     */

   

//phpinfo();


//conexao usuario
   //$ora_user="waj";
   //$ora_senha="waj";
   
   //conexao usuario
   $ora_user="milenio";
   $ora_senha="consult";




   if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
    echo "Usuário conectado: ".$ora_user;
  }
  else
  {
    echo "Erro na conexão com o Oracle.";
  }



?>
