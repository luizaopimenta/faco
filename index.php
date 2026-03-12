<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
 echo "<h3> Tentou acessar diretamente né?! </h3>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["v_email"])){
        echo "A informacao enviada foi " . $_POST["v_email"];
    }else{
        echo "Alguma coisa deu errado!";
    }
}
?>