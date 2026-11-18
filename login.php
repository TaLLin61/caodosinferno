<?php

include "conecta.php";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM aluno WHERE cpf = :cpf AND senha = :senha";

try {
    
   $stmt = $conexao->prepare($sql);

     $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

    $stmt->execute();

    if ($linha = $stmt->fetch()) { 
        echo "Login bem-sucedido!";
    } else {
        echo "CPF ou senha incorretos.";
    }
} catch (PDOException $e) {
    echo "Erro ao executar consulta: " . $e->getMessage();
}
?>