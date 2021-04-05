<?php
session_start();

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
    if(empty($_POST['name']) && empty($_POST['location'])) {
        $_SESSION['message'] = "Name and location is required";
        $_SESSION['msg_type'] = "warning";

        header('Location: http://localhost/CRUD/index2.php');
        die;
    } else{
        $name = $_POST['name'];
        $location = $_POST['location'];
        
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $_SESSION['message'] = "Letters only";
        $_SESSION['msg_type'] = "warning";
        }
        header('Location: http://localhost/CRUD/index2.php');
        die;
    }

    if('add' == $_POST['action']) {
        $sql = "INSERT INTO data (name, location)
        VALUES (?, ?)";
        $stmt = $pdo->prepare($sql); //paruosimas
        $stmt->execute([ $_POST['name'], $_POST['location'] ]);

        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    }

    header('Location: http://localhost/CRUD/index2.php');
    die;
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM data WHERE id=?"; //sql formavimas
    $stmt = $pdo->prepare($sql); //paruosimas
    $stmt->execute([$_GET['delete']]);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header('Location: http://localhost/CRUD/index2.php');
    die;
}