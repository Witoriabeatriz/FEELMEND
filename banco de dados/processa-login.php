<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recebendo os dados do formulário
$cpf = $_POST['CPF'];
$senha = $_POST['Senha'];

try {
    // Preparar a consulta
    $sql = "SELECT * FROM usuarios WHERE cpf = :cpf AND senha = :senha";
    $stmt = $conn->prepare($sql);
    
    // Bind dos parâmetros
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);
    
    // Executar a consulta
    $stmt->execute();

    // Verificar se o usuário existe
    if ($stmt->rowCount() > 0) {
        // Login bem-sucedido
        echo "Login realizado com sucesso!";
        // Redirecionar para a página principal ou dashboard
        header("Location: ../cyborg-master/roda.html");
        exit();
        
    } else {
        // Login falhou
        echo "CPF ou senha inválidos!";
    }
} catch (PDOException $e) {
    echo "Erro ao executar a consulta: " . $e->getMessage();
}

// Fechar a conexão
$conn = null;
?>
