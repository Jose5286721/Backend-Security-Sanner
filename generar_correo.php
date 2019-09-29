<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('src/sentencias.php');
require('src/Exception.php');
require('src/PHPMailer.php');
require('src/SMTP.php');
//Aqui creamos el objeto que se utilizara para enviar el correo;
$mail = new PHPMailer(true);
//Encerramos estas expresiones en un try catch ya que puede producir un error al enviar el correo 
try{
/*
Aqui especificamos los parametros de seguridad y otros 
primero decimos que el informe de procesos este desactivado en SMTPDebug con valor 0, si cambiamos a 2 podemos observar el proceso para enviar el correo 
Luego indicamos que utilizamos el servidor smtp
Luego indicamos cual es el servidor de nuestro correo en mi caso estoy utilizando gmail por lo tanto el serivdor es smtp.gmail.com
Luego el usuario y contraseña que utilizan para ingresar a su correo 
Luego indicamos que utilice un protocolo tls tambien puede ser ssl 
Luego el puerto que quieran por defecto es 25 si no lo indicamos
*/
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'joseascurra123@gmail.com';
$mail->Password = '5286721/*-+';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
/*
Aqui indicamos quien hace el correo y a quien o quienes va dirigido, aqui tambien podemos adjuntar archivos utlizando el metodo addAttachment(ruta al archivo, (opcional) nuevo nombre del archivo que se mostrara al enviar)
*/
$mail->setFrom('joseascurra123@gmail.com','Scanner Security');
$mail->addAddress('jose2001ascurra@gmail.com');
$mail->addAttachment(dirName(__FILE__).'/informes/archvivosGenerados/hello.xlsx');
/*
Aqui basicamente se indica lo que dira en el correo la propiedad isHTML es para indicar si utilizamos codigo html ya sea en el titulo o en cuerpo del correo 
Luego obviamente viene el titulo y el cuerpo del correo y por ultimo enviamos ya que si no utlizamos ese metodo no serviria toda esta configuracion hecha en el objeto
*/
$mail->isHTML(true);
$mail->Subject = 'Reporte de prueba';
$mail->Body = 'Este es un reporte de prueba' ;
$mail->send();
echo "Correo enviado exitosamente";
}catch(Exception $e){
	echo $mail->ErrorInfo;
}