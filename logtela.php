<?//LOG DE TELA
 
 $diahoje=date('d');
				  $meshoje=date('m');
				  $anohoje=date('Y');
				  
				  $horahoje=date('H');
				  $minutohoje=date('i');
				  $segundohoje=date('s');
				  
                  $datapesquisahoje=$diahoje."/".$meshoje."/".$anohoje." ".$horahoje.":".$minutohoje.":".$segundohoje;
   
   $usu18uss = "SELECT CD_USUARIO FROM usuario_bi where nm_usuario='$edusuario'";
   $resultuss = $conn->Execute($usu18uss);
     while ( !$resultuss->EOF) {
       $codigousuarioachou=$resultuss->fields["CD_USUARIO"];
     $resultuss->MoveNext();
     }
        
        $query = "INSERT INTO log_erro_bi (CD_USUARIO,DT_OCORRENCIA,DS_ERRO,DS_PROGRAMA)
        VALUES('$codigousuarioachou',to_date('$datapesquisahoje','dd/mm/YYYY HH24:MI:SS'),'Acesso Normal','$programa')";
		
		$result = $conn->Execute($query);
		
		?>