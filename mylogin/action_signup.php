<?php
session_start();
require("./db_connect.php");


if(isset($_POST["submit"])){
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];



$sql="SELECT * FROM userslogin WHERE email= '{$email}'";

  $result = $conn->query($sql);
 
  
  if ($result->num_rows > 0) {
       
    echo "This credential existed";
    
    
    }else
    {
      $password=password_hash($password,PASSWORD_DEFAULT);

      $sql = "INSERT INTO userslogin (name, email, phone, password) VALUES ('$name','$email','$phone','$password')";
      $result=$conn->query($sql);
      $_SESSION["emAil"]=$email;
if($result){
  
  echo "Data Has been inserted";
  header("Refresh:1,url=dash.php");
}


    }


}
?>