<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Informações do arquivo enviado
    $arquivo = $_FILES['imagem'];

    if ($arquivo['error'] === 0) {
        $nomeOriginal = $arquivo['name'];
        $tipo = $arquivo['type'];
        $tamanho = $arquivo['size']; // em bytes
        $tmpNome = $arquivo['tmp_name']; // caminho temporário no servidor

        echo "<h3>Upload de Teste Recebido!</h3>";
        echo "E-mail: " . htmlspecialchars($email) . "<br>";
        echo "Arquivo: " . $nomeOriginal . "<br>";
        echo "Tipo: " . $tipo . "<br>";
        echo "Tamanho: " . ($tamanho / 1024) . " KB<br>";

        // TESTE: Vamos mover o arquivo para uma pasta local chamada 'uploads'
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        $destino = "uploads/" . $nomeOriginal;

        if (move_uploaded_file($tmpNome, $destino)) {
            echo "<br><strong>Status:</strong> Arquivo salvo em /uploads com sucesso!";
            echo "<br><img src='$destino' width='200'>";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no upload: " . $arquivo['error'];
    }
}
?>