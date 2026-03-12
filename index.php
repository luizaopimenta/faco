<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
 echo "<h3> Tentou acessar diretamente né?! </h3>"
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    

    $arquivo = $_FILES['imagem'];

    if ($arquivo['error'] === 0) {
        $nomeOriginal`` = $arquivo['name'];
        $tipo = $arquivo['type'];
        $tamanho = $arquivo['size']; 
        $tmpNome = $arquivo['tmp_name']; 

        echo "<h3>Upload de Teste Recebido!</h3>";
        echo "E-mail: " . htmlspecialchars($email) . "<br>";
        echo "Arquivo: " . $nomeOriginal . "<br>";
        echo "Tipo: " . $tipo . "<br>";
        echo "Tamanho: " . ($tamanho / 1024) . " KB<br>";

      
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