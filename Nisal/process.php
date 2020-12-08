<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud1') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$title = '';
$description = '';

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $mysqli->query("INSERT INTO data(name,title,description) VALUES('$name','$title','$description')") or
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "Success";

    header("location: index.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "Danger";

    header("location: index.php");

}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    $update = true;
    if(count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $title = $row['title'];
        $description = $row['description'];
    }

}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $mysqli->query("UPDATE data SET name='$name', title='$title',description='$description' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "Warning";

    header('location: index.php');
}


?>