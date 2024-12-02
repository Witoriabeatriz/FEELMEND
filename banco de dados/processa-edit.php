<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];

    try {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, rua = :rua, cidade = :cidade";
        
        // Apenas atualiza a senha se ela for fornecida
        if (!empty($senha)) {
            $sql .= ", senha = :senha";
        }
        
        $sql .= " WHERE cpf = :cpf";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':cpf', $cpf);
        
        if (!empty($senha)) {
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
            $stmt->bindParam(':senha', $senhaHash);
        }
        
        $stmt->execute();
        header("Location: sucesso.php?mensagem=alteracao"); // Página de sucesso
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar o usuário: " . $e->getMessage();
    }
}?>
