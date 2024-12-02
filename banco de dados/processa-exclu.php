<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];

    try {
        $sql = "DELETE FROM usuarios WHERE cpf = :cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        header("Location: sucesso.php?mensagem=exclusao"); // Página de sucesso
        exit;
    } catch (PDOException $e) {
        echo "Erro ao excluir o usuário: " . $e->getMessage();
    }
}
?>