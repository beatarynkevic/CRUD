<!-- https://www.youtube.com/watch?v=3xRMUDC74Cw&t=327s -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CRUD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <?php require_once 'process.php';
            $mysqli= new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            // echo '<pre>';
            // print_r($result->fetch_assoc());
            // print_r($result->fetch_assoc());
            // echo '</pre>';
            ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php while ($row = $result->fetch_assoc()) :?>
                    <tr>
                        <td> <?php echo $row['name']; ?> </td>
                        <td> <?php echo $row['location']; ?> </td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"> Edit </a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <div class="row justify-content-center">
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>