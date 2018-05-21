<?

                                     $achapessoa1 = "SELECT a.CD_PESSOA_SOLICITANTE PESSOA,b.ds_email EMAIL7 
									 FROM SOLICITACAO_MOTIVO_ACESSO a,pessoa_bi b
									 where a.nr_pedido='$codigoachou' and
									 a.CD_PESSOA_SOLICITANTE=b.codigo
									 ";
                                     $achapessoa2= $conn->Execute($achapessoa1);
                                     while ( !$achapessoa2->EOF) {
                                     $pessoasolicitanteemail=$achapessoa2->fields["PESSOA"];
									 $destinoe=$achapessoa2->fields["EMAIL7"];
                                     $achapessoa2->MoveNext();
                                     }

               if(empty($destinoe))
			   {
               }
			   else
			   {
                   $emailorigem="'sadege@maximiza.com.br";

                   require_once('class.phpmailer.php');
                   $mail = new PHPMailer();
                   $mail->Mailer     = "smtp";
                   $mail->IsHTML(true);
                   //$mail->SMTPSecure = "tls";
                   $mail->Host       = "smtp.maximiza.com.br";
                   $mail->Port       = "587";
                   $mail->Username   = "sadege@maximiza.com.br";
                   $mail->Password   = "maximiza";
                   $mail->SMTPAuth   = "TRUE";
                   $mail->FromName   = $emailorigem;
                   $mail->AddAddress($destinoe); //email destino
                   $mail->Subject    = "Autorização de Solicitação";
                   $mail->Body       = "Autorizado pedido Nr. ".$codigoachou;
                   if (!$mail->Send())
                   {       echo "Erro de envio: " . $mail->ErrorInfo;}
                   else{}
			   }
?>
