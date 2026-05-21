<?php
$host = "localhost";
$db_name = "elivanflix";
$username = "root";
$password = ""; // No XAMPP, a senha do root por padrão é vazia

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configura para exibir erros caso a query falhe
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Define o charset para evitar erros de acentuação
    $conn->exec("set names utf8");
} catch(PDOException $exception) {
    echo "Erro na conexão: " . $exception->getMessage();
}
echo "conexao bem sucedida";
?>
