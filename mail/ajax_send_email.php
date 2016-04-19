<?php
	require_once "orm.php"; 
	$respose = false;
	if($_POST){
		//$destinatario = "developer2585@gmail.com";
		$destinatario = "printspot@cusa.canon.com";
		$asunto = $_POST['asunto'];
		$cuerpo = '
		<html>
			<head>
				<title>Contacto</title>
			</head>
			<body>
				<h3>Nuevo mensaje</h3>
				nombre:  '.$_POST['nombre'].'  <br/>
				telefono:  '.$_POST['telefono'].'  <br/>
				email:  '.$_POST['email'].'  <br/>
				mensaje:  '.$_POST['mensaje'].'  <br/>
			</body>
		</html>
		';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: printspot <noreply@printspot.mx>\r\n";
		if(mail($destinatario,$asunto,$cuerpo,$headers)){
			$respose = true;
			$orm = new ORM();
			$query  = 'INSERT INTO 
						contact(name,phone,email,subject,message,date)
						VALUES("'.$_POST['nombre'].'","'.$_POST['telefono'].'","'.$_POST['email'].'","'.$_POST['asunto'].'","'.$_POST['mensaje'].'","'.date('Y-m-d').'")';
			$result = $orm->executeSql($query);
			$orm->close();
		}
	}
	echo $respose;


	
?>