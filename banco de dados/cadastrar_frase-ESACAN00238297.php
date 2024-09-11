<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recebe os dados do formulário
$frase = $_POST['frase'];

// Insere os dados no banco de dados
try {
    // Corrigido o erro na query SQL
    $sql = "INSERT INTO frases_motivacionais (frase) VALUES (:frase)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':frase', $frase, PDO::PARAM_STR);
    
    // Executa a query
    $stmt->execute();

    // Redireciona para a página desejada após o cadastro
    header("Location: ../cyborg-master/success.html"); // Atualize para a página de sucesso ou onde desejar
    exit(); // Garante que o script PHP pare de executar após o redirecionamento

} catch(PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>
