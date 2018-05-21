<?
if ($localbanco==null){$localbanco="Nuvem Maximiza";}

//ECHO "Banco:$banco-Local Banco:$localbanco";

if ($localbanco=="Nuvem Maximiza"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="nuvem"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="maker"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="predial"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="shoppingteste"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="maximiza"){

$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=200.175.53.47)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";

}

if ($localbanco=="vitsolo"){

$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=vitsolo.com.br)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";

}

if ($localbanco=="malharia"){

$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST= sadege.kyly.com.br)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";


}

if ($localbanco=="shopping"){

$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST= 189.114.223.40)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";


}

if ($localbanco=="mngranito"){

$ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST= mngranito.no-ip.biz)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";


}

if ($localbanco=="montenegro"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=cpro6636)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=xe))
     )";
}

if ($localbanco=="renaux"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=177.43.48.22)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=RVPROD))
     )";
}


if ($localbanco=="marcos"){
    $ora_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
              (HOST=179.181.94.120)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=XE))
     )";
}





//conexao usuario
   $ora_user=$banco;
  $ora_senha=$banco;
   
   if ($banco=="maker"){
   $ora_user="maker";
   $ora_senha="maker";
   }
   
   if ($banco=="malharia"){
   $ora_user="sadege";
   $ora_senha="sadege";
   }
   
   if ($banco=="predial"){
   $ora_user="predial";
   $ora_senha="predial";
   }

  if ($localbanco=="shopping"){
  
   $ora_user="waj";
   $ora_senha="waj";
  }
  

  if ($localbanco=="mngranito"){

   $ora_user="montenegro";
   $ora_senha="montenegro";
  }
  
  if ($localbanco=="montenegro"){

   $ora_user="montenegro";
   $ora_senha="montenegro";
  }
  

  if ($localbanco=="renaux"){

   $ora_user="sadege";
   $ora_senha="sadege";
  }
  
  if ($localbanco=="shoppingteste"){
     $ora_user="AJR";
   $ora_senha="AJR";

  }
  if ($localbanco=="manupred"){
     $ora_user="manupred";
     $ora_senha="manupred";

  }

   echo "Usuário: ".$ora_user;
   echo "Senha: ".$ora_senha;
   echo "Banco: ".$localbanco;
   if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd) ){
    //echo "Usuário conectado: ".$ora_user;
  }
  else
  {
    echo "Erro na conexão com o Oracle.";
  }




?>
