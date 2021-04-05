<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD 2</title>
</head>
<body>
<?php require_once 'process2.php'; ?>

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

$sql = 'SELECT * FROM data';
$stmt = $pdo->query($sql);

?>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php 
                while ($row = $stmt->fetch()) :?>
                    <tr>
                        <td> <?php echo $row['Name']; ?> </td>
                        <td> <?php echo $row['Location']; ?> </td>
                        <td></td>
                    </tr>
                    <?php endwhile; ?>
            </table>

        </div>






        <div class="row justify-content-center">
            <form action="process2.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="action" class="btn btn-primary" value="add">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


<!--  1.Create POST form with name and location input fields and save button
2. Add divs and Bootstrap classes to the form to make it look good, center the form
3.Create process.php, add it to form and include it from index.php
4.Create MySql db 'myDBPDO' and table 'data' with id, name and location fields (rankiniu budu)
5.connect to db
6.loop of records
7.
8.
9.
10.
-->