<?php
include("./db_connect.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM todo where id='$id'";
$result = $conn->query($sql);


$row = $result->fetch_assoc();
?>

<?php
include("./include/header.php");
   ?>
    <div class="container mt-5" >

    
    <form method="POST" action="./todoup.php">

<div class="form-group mt-3">
    <input type="hidden" name="id" value="<?php echo $id ;?>">
    <h1 class="text-center">TODO LIST</h1>
  <input type="text" class="form-control" name="todo" id="todo" value="<?php echo $row['todo']; ?>"  placeholder="Please enter your email">
  <input class="btn btn-primary " type="submit" name="submit" value="submit">  
</div>

    </div>




    <?php
include("./include/footer.php");

?>