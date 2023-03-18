<?php
// configurações de conexão com o banco de dados
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexão é bem sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// obtém o nome do usuário e a pontuação atualizada
$usuario = "Alice";
$pontos = 10;

// insere a pontuação do usuário na tabela de pontuação
$sql = "INSERT INTO pontuacao (usuario, pontos) VALUES ('$usuario', $pontos)";
if ($conn->query($sql) === TRUE) {
    echo "Pontuação adicionada com sucesso!";
} else {
    echo "Erro ao adicionar pontuação: " . $conn->error;
}

// fecha a conexão com o banco de dados
$conn->close();
?>
