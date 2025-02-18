<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    if ($nome && $email && $mensagem) {
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.seudominio.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'seuemail@seudominio.com';
            $mail->Password = 'sua_senha';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Remetente e destinatário
            $mail->setFrom($email, $nome);
            $mail->addAddress('mecanicarocha2011@gmail.com');

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Nova mensagem de contato';
            $mail->Body = "Nome: $nome<br>E-mail: $email<br><br>Mensagem:<br>$mensagem";

            $mail->send();
            echo 'Mensagem enviada com sucesso!';
        } catch (Exception $e) {
            echo "Erro ao enviar a mensagem. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Dados inválidos. Verifique os campos e tente novamente.';
    }
}
?>
