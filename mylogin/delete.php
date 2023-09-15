<?php
require("./db_connect.php");

$id = $_GET['id'];


$sql = "DELETE FROM todo WHERE id= $id";
$conn->query($sql);

header("location: ./dash.php");
?>