<?php
$mysqli= new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli)); //connect to DB

if(isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    
    // Performs a query(uzklausa) on the database
    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or
    die($mysqli->error);
}