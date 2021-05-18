<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$email = $_POST['email'];

include "conexao.php";

//$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha'");


if($con){
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($con, $query);


        if(mysqli_num_rows($resultado) > 0) 
        {
            $registro = mysqli_fetch_assoc($resultado);
            $nome = $registro["nome"];
            $id = $registro["id"];
        }

    
}


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'your.moovies@gmail.com';                     //SMTP username
    $mail->Password   = 'puc@2021';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('your.moovies@gmail.com', 'Moovies');
    $mail->addAddress($email, $nome);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperar senha'; //assunto
    $mail->Body    = 'Olá ' . $nome . '<br>' . 'para recuperar sua senha, acesse esse link: http://localhost/Experiencia-PUC/paginas/alterarSenha.html?id=' . $id; //envia email em html
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //envia email sem html
    header("Location: ../paginas/esqueciMinhaSenha.html?envio=1");
    $mail->send();
    echo 'Message has been sent';
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit;
}

