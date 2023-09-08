<?php
try {
    $pdo = new PDO("mysql:dbname=hotel;host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro com banco de dados: " . $e->getMessage();
} catch (Exception $e) {
    echo "Erro genérico:" . $e->getMessage();
}
?>
