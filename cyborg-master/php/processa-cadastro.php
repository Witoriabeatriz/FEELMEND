<?php
// Configurações de conexão com o banco de dados
$servername = "localhost"; // Ou o IP do servidor MySQL
$username = "seu_usuario"; // Substitua pelo seu usuário MySQL
$password = "sua_senha"; // Substitua pela sua senha MySQL
$dbname = "feelmend"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['participantes'];
$email = $_POST['loginemail'];
$senha = $_POST['loginsenha'];
$confirmar_senha = $_POST['confirmarsenha'];
$cpf = $_POST['identificacao'];
$rg = $_POST['rg'];
$cep = $_POST['Cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['Bairro'];
$estado = $_POST['Estado'];
$cidade = $_POST['Cidade'];
$complemento = $_POST['complemento'];

// Verifica se as senhas conferem
if ($senha !== $confirmar_senha) {
    echo "Senhas não conferem!";
    exit();
}

// Cria o SQL para inserção
$sql = "INSERT INTO usuarios (nome, email, senha, cpf, rg, cep, rua, numero, bairro, estado, cidade, complemento) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param("ssssssssssss", $nome, $email, $senha, $cpf, $rg, $cep, $rua, $numero, $bairro, $estado, $cidade, $complemento);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
