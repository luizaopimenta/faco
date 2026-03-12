<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    


    $email = trim($_POST['email']);
    $senha = $_POST['senha'];


    
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        echo "<h3>Dados Recebidos com Sucesso!</h3>";
        echo "<strong>E-mail:</strong> " . htmlspecialchars($email) . "<br>";
        echo "<strong>Senha:</strong> " . htmlspecialchars($senha) . "<br>";
    }
} else {
    echo "Acesso inválido.";
}
?>