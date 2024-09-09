<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recebe os dados do formulário
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$senha = $_POST['Senha'];
$confirmar_senha = $_POST['Confirmar_Senha'];
$cpf = $_POST['CPF'];
$rg = $_POST['RG'];
$cep = $_POST['Cep'];
$rua = $_POST['Rua'];
$numero = $_POST['Numero'];
$bairro = $_POST['Bairro'];
$estado = $_POST['Estado'];
$cidade = $_POST['Cidade'];
$complemento = $_POST['Complemento'];

// Insere os dados no banco de dados
  
 try {
        $sql = "INSERT INTO usuarios (nome, email, senha, confirmar_senha, cpf, rg, cep, rua, numero, bairro, estado, cidade, complemento) VALUES ('$nome','$email','$senha','$confirmar_senha','$cpf','$rg','$cep','$rua','$numero','$bairro','$estado','$cidade','$complemento')";

    $stmt = $conn->prepare($sql);   
   // Executa a query
   $stmt->execute();

    // Redireciona para a tela de login
    header("Location: ../cyborg-master/login.html");
    exit(); // Garante que o script PHP pare de executar após o redirecionamento

} catch(PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>