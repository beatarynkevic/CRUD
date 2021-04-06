<!-- http://crud.lt -->

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
<?php require_once 'process.php'; ?>

<?php if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>

<?php endif ?>
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
                        <td>
                            <a href="index2.php?edit=<?php echo $row['Id']; ?>"
                            class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['Id']; ?>"
                            class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
            </table>

        </div>


        <div class="row justify-content-center">
            <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter your name" value="<?php echo $location; ?>">
                </div>
                <div class="form-group">
                <?php
                if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-info">Update</button>
                    <?php else: ?>
                    <button type="submit" name="action" class="btn btn-primary" value="add" >Save</button>
                    <?php endif; ?>
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
5.connect to db and insert 'name' and 'location' to data table if save button has been pressed
6.create loop to display
7.add edit and delete
8.delete record if button has been clicked
9.create session message
10.
-->