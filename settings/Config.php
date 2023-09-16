<?php
try {
    $pdo = new PDO("pgsql:host=localhost;port=5432;dbname=hotel;", "postgres", "2003");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro com banco de dados: " . $e->getMessage();
} catch (Exception $e) {
    echo "Erro genérico:" . $e->getMessage();
}
?>
