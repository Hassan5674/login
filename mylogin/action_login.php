<?php
require("./db_connect.php");

session_start();

if(isset($_POST["submit"])){

$email = $_POST["email"];

$password = $_POST["password"];



$sql="SELECT * FROM userslogin WHERE email= '{$email}'";

  $result = $conn->query($sql);
$fetch= $result->fetch_assoc();
 $password=password_verify($password,$fetch["password"]);
  
  if ($password) {
    $sql="SELECT * FROM userslogin WHERE email= '{$email}'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $_SESSION["emAil"]=$email;
    echo "login succesfully";

    header("Refresh:1,url=dash.php");
    
    
    }else{
        echo "Email or password maybe wrong";

    }
}else{
    echo "Email or password maybe wrong";
}
}
?>