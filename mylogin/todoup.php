<?php
require("./db_connect.php");


if(isset($_POST["submit"])){
    $todo = $_POST["todo"];
   
    $id= $_POST["id"];

    
    
    
        $sql = "UPDATE todo SET todo='$todo' WHERE id = $id";
    
    
     if($conn->query($sql)){
        header('Location: todolist.php');
    }
    else {
        echo "Could Not Update the records";
    }


}


?>