<?php
require("./db_connect.php");
include("./include/header.php");




?>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">  <?php 
                    if ($check) {
                       echo $_SESSION["emAil"];
                    }else{
                        echo "Navbar";
                    }
            ?> </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <li class="nav-item">
                <?php 
                    if ($check) {
                        
                    
                    ?>
                    <a class="nav-link" href="dash.php" aria-current="page">Home </a>
                    <?php  } ?>
                </li>
                <li class="nav-item">
                <?php 
                    if (!$check) {
                        
                    
                    ?>
                    <a class="nav-link" href="login.php">Login</a>

                    <?php  } ?>

                </li>


                <li class="nav-item">

                    <?php 
if (!$check) {
    

?>

                    <a class="nav-link" href="signUP.php">SignUP</a>
                    <?php  } ?>

                </li>

                </li>
                <?php 
                    if ($check) {
                        
                    
                    ?>
                    <a class="nav-link" href="todolist.php">todo list</a>

                    <?php  } ?>

                </li>


                <li class="nav-item">

                    <?php 
                    if ($check) {
                        
                    
                    ?>
                    <a class="nav-link" href="logout.php">LogOut</a>

                    <?php  } ?>
                </li>
            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
  </div>
</nav>



<?php 
 $user_id = $_SESSION["emAil"];

$sql = "SELECT * FROM userslogin Where email='$user_id'";
 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$todoa = $row["id"];
$errors = [];

if(isset($_POST["submit"])){
    $todo = $_POST["todo"];
   
   
    
    if(empty($todo)){
        $errors["todo"] =  "Please Enter your todo";
    }else{
     $sql = "INSERT INTO todo (todo,user_id) VALUES ('$todo','$todoa')";
     $result = $conn->query($sql);
    //  header("Refresh: 0");
    
    
    };
    };


    require("./select.php");


?>
<div class="container mt-5" > 
<ul>
		<?php foreach($errors as $error): ?>
			<li> <?php echo $error;  ?> </li>
			<?php endforeach ; ?>
	</ul>

<form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">

<div class="md-3">
 <h1 class="text-center">TODO LIST</h1>
  <input type="text" class="form-control" name="todo" id="todo"  placeholder="Please enter your email">
  <input class="btn btn-primary " type="submit" name="submit" value="submit">  
  </form>

  </div>

  <div class="container mt-5" > <table class="table">
  <thead>
  
      <th >id</th>
      <th >todo</th>
      <th >Action</th>

    </tr>
  

  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()): 
      
      

      ?>
    <tr>
      <th><?php echo $row["id"]   ?></th>
      <th><?php echo $row["todo"]   ?></th>
      <th><a href="./delete.php?id=<?php echo $row["id"] ?>" class="btn btn-outline-danger ">DELETE</a><a  href="./update_page.php?id=<?php echo $row["id"] ?>" class="btn btn-outline-warning ms-3">Update</a></th>
    
    </tr>

    <?php endwhile ;?>
    </tbody>
  
</div>



<?php 

include("./include/footer.php");


?>