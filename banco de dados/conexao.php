<?php
// Arquivo de configuração para a conexão com o banco de dados

$host = 'localhost';     // Endereço do servidor
$dbname = 'feelmend';    // Nome do banco de dados
$user = 'root';          // Usuário do banco de dados
$password = '';          // Senha do banco de dados

try {
    // Cria uma nova conexão PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida!"; // Mensagem de teste para indicar que a conexão foi estabelecida

} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage(); // Exibe mensagem de erro em caso de falha na conexão
}
?>
