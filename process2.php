<?php

$host = '127.0.0.1';
$db   = 'myDBPDO';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if(!empty($_POST)) {

    if('add' == $_POST['action']) {
        $sql = "INSERT INTO data (name, location)
        VALUES (?, ?)";
        $stmt = $pdo->prepare($sql); //paruosimas
        $stmt->execute([ $_POST['name'], $_POST['location'] ]);
    }

    header('Location: http://localhost/CRUD/index2.php');
    die;
}