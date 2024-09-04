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
    $sql = "INSERT INTO usuarios (nome, email, senha, confirmar_senha, cpf, rg, cep, rua, numero, bairro, estado, cidade, complemento) 
            VALUES (:nome, :email, :senha, :confirmar_senha, :cpf, :rg, :cep, :rua, :numero, :bairro, :estado, :cidade, :complemento)";
    
    $stmt = $conn->prepare($sql);

    // Vincula os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':confirmar_senha', $confirmar_senha);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':complemento', $complemento);

    // Executa a query
    $stmt->execute();
    echo "Cadastro realizado com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>
