<?


$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

   if ($banco=="maximiza"){//este � o banco para empresa vitsolo na nuvem
   $ora_user="VIT";
   $ora_senha="VIT";
   }
   
   
   
  if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
    //echo "Usu�rio conectado: ".$ora_user;
  }
  else
  {
    echo "Erro na conex�o com o Oracle Voce deve Acessar http://186.202.46.98/sitemilenioteste.php?cliente=maximiza";
    exit;
  }


?>
