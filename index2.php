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
    <div class="row justify-content-center">
        <form action="process2.php" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="Enter your name">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="Enter your location">
            </div>
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>


<!--  1.Create POST form with name and location input fields and save button
2. Add divs and Bootstrap classes to the form to make it look good, center the form
3.Create process.php, add it to form and include it from index.php
4.Create MySql db 'crud' and table 'data' with id, name and location fields
5.
6.
7.
8.
9.
10.
-->