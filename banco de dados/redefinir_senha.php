<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Verifica se o token está presente na URL
if (!isset($_GET['token'])) {
    die("Token não fornecido.");
}

$token = $_GET['token'];

// Verifica se o token é válido
try {
    $sql = "SELECT * FROM usuarios WHERE token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Token válido
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $senha = $_POST['Senha'];
            $confirmar_senha = $_POST['Confirmar_Senha'];

            if ($senha == $confirmar_senha) {
                // Atualiza a senha no banco de dados
                $sql = "UPDATE usuarios SET senha = :senha, token = NULL WHERE token = :token";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':token', $token);
                $stmt->execute();

                echo "Senha redefinida com sucesso!";
            } else {
                echo "As senhas não coincidem.";
            }
        } else {
            // Exibe o formulário de redefinição de senha
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Redefinir Senha - Feelmend</title>
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="assets/css/fontawesome.css">
                <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
            </head>
            <style>
                .btn-custom {
                    width: 100%;
                    background-color: #f28db1;
                    border-color: #f28db1;
                    color: white;
                    padding: 10px;
                    font-size: 16px;
                    transition: background-color 0.3s;
                }

                .btn-custom:hover {
                    background-color: #e75e8d;
                    border-color: #e75e8d;
                }
            </style>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Redefinir Senha</h2>
                            <form action="redefinir-senha.php?token=<?php echo htmlspecialchars($token); ?>" method="post">
                                <label id="Senha">Senha:</label>
                                <input class="form-control" id="loginsenha" type="password" name="Senha" required>
                                <br><br>
                                <label id="Confirmar_Senha">Confirmar Senha:</label>
                                <input class="form-control" id="confirmarsenha" type="password" name="Confirmar_Senha" required>
                                <br><br>
                                <button type="submit" value="Enviar" class="btn btn-primary btn-custom">Redefinir Senha</button>
                                <br><br>
                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <?php
        }
    } else {
        echo "Token inválido.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null; // Encerra a conexão
?>
