<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recebe o e-mail do formulário
$email = $_POST['Email'];

// Valida o e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("E-mail inválido.");
}

// Verifica se o e-mail existe no banco de dados
try {
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Gerar um token único para a recuperação
        $token = bin2hex(random_bytes(50));
        
        // Armazenar o token no banco de dados
        $sql = "UPDATE usuarios SET token = :token WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Enviar e-mail com link de recuperação
        $to = $email;
        $subject = "Recuperação de Senha";
        $message = "Clique no link abaixo para redefinir sua senha:\n";
        $message .= "http://seusite.com/redefinir-senha.php?token=$token";
        $headers = "From: no-reply@seusite.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Um e-mail de recuperação foi enviado para $email.";
        } else {
            echo "Não foi possível enviar o e-mail de recuperação.";
        }
    } else {
        echo "E-mail não encontrado.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>
