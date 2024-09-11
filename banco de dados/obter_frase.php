<?php
$host = 'localhost';
$db = 'feelmend';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obter uma frase aleatória
    $stmt = $pdo->query("SELECT frase FROM frases_motivacionais ORDER BY RAND() LIMIT 1");
    $frase = $stmt->fetchColumn();
    
    if ($frase) {
        echo $frase;
    } else {
        echo "Nenhuma frase encontrada.";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
