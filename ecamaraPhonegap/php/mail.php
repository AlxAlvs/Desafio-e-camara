<?php
//página não configurada para envio local (localhost).
//pego os dados enviados pelo formulario
$nome = $_POST['hddName'];
$email = $_POST["emailSelect"];
$mensagem = $_POST["emailMsg"];
$assunto = $_POST["assunto"];
$email_from = $_POST['hddEmail'];
//formato o campo da mensagem
$mensagem = wordwrap( $mensagem, 50, "initial", 1);

$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));
$anexo = base64_encode($anexo);
fclose($fp);
$anexo = chunk_split($anexo);
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens = "--$boundary\n";
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; //plain
$mens .= "$mensagem\n";
$mens .= "--$boundary\n";
$mens .= "Content-Type: ".$arquivo["type"]."\n";
$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";
$mens .= "Content-Transfer-Encoding: base64\n\n";
$mens .= "$anexo\n";
$mens .= "--$boundary--\r\n";
$headers = "MIME-Version: 1.0\n";
$headers .= "From: \"$nome\" <$email_from>\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
$headers .= "$boundary\n";
//envio o email com o anexo
mail($email,$assunto,$mens,$headers);
echo  "<script>alert('Mensagem enviada. possivel resposta será enviada por email.');</script>";
header("location:..http://localhost/ecamaraProjeto/ecamara/ecamaraphonegap/www/index.html");
}
//se não tiver anexo
else{
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: \"$nome\" <$email_from>\r\n";
//envia o email sem anexo
mail($email,$assunto,$mensagem, $headers);
header("location:..http://localhost/ecamaraProjeto/ecamara/ecamaraphonegap/www/index.html");
}
?>