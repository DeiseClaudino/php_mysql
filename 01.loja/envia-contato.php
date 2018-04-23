<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailer.php");

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "deise.claudino98@gmail.com";
$mail->Password = "d1e9i9s8e";

$mail->setFrom("deise.claudino98@gmail.com", "Deise");
$mail->addAddress("deise.claudino98@gmail.com");
$mail->Subject = "Email de Contato";
$mail->msgHTML("<html> de: {$nome} <br/> email: {$email} <br/> mensagem: {$mensagem}</html>");

$mail->AltBody = "de: {$nome} \nemail: {$email} <br/> \nmensagem: {$mensagem}";

if($mail->send()){
  $_SESSION["success"] = "Mensagem enviada!";
  header("Location: index.php");
}else{
  $_SESSION["danger"] = "Mensagem NÃO enviada!";
  header("Location: contato.php");
}
die();
