<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $celular = htmlspecialchars(trim($_POST["celular"]));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));
    
    $erros = [];

    if (empty($nome)) {
        $erros[] = "O campo Nome é obrigatório.";
    }
    
    if (!$email) {
        $erros[] = "O campo E-mail é inválido.";
    }
    
    if (empty($celular)) {
        $erros[] = "O campo Celular é obrigatório.";
    }
    
    if (empty($mensagem)) {
        $erros[] = "O campo Mensagem é obrigatório.";
    }
    
    if (empty($erros)) {
        $to = "seuemail@exemplo.com"; // Substitua pelo seu e-mail
        $subject = "Novo contato do site";
        $body = "Nome: $nome\n";
        $body .= "E-mail: $email\n";
        $body .= "Celular: $celular\n";
        $body .= "Mensagem:\n$mensagem\n";
        $headers = "From: $email";
        
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a mensagem.";
        }
    } else {
        foreach ($erros as $erro) {
            echo "<p>$erro</p>";
        }
    }
}
?>
