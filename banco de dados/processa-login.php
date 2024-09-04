<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recebe os dados do formulário de login
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

try {
    // Prepara a consulta SQL para buscar o usuário pelo CPF e senha
    $sql = "SELECT * FROM usuarios WHERE cpf = :cpf AND senha = :senha";
    $stmt = $conn->prepare($sql);
    
    // Vincula os parâmetros
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);
    
    // Executa a query
    $stmt->execute();
    
    // Verifica se foi encontrado um usuário
    if ($stmt->rowCount() > 0) {
        // Usuário encontrado, login bem-sucedido
        echo "Login realizado com sucesso!";
        // Aqui você pode iniciar a sessão e redirecionar o usuário para outra página
        // session_start();
        // $_SESSION['usuario'] = $stmt->fetch();
        // header('Location: dashboard.php');
    } else {
        // Nenhum usuário encontrado, login falhou
        echo "CPF ou senha incorretos.";
    }

} catch(PDOException $e) {
    echo "Erro ao realizar o login: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>
