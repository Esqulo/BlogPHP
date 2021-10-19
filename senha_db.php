<?php
	session_start(); 
	require_once("email/PHPMailerAutoload.php");
	
	$mail = new PHPMailer();
	$mail->SMTPDebug  = 1; 
	$mail->isSMTP();
	$mail->IsHTML(true);
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tsl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = "projetoequipe004@gmail.com";
	$mail->Password = "equipe@123456";
	$mail->SetFrom('noreply@eqfour.com');
	$mail->Subject = 'Recuper Senha';
	$mail->Body = "sua senha";
	$mail->AltBody="sua senha";
	$mail->AddAddress('zecazeca11@hotmail.com');
	
	$enviado = $mail->Send();
	
	if ($enviado) {
		echo "E-mail enviado com sucesso!";
	}
	else {
		echo "Não foi possível enviar o e-mail.";
		echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}
?>