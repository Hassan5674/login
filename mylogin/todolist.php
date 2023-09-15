<?php
require("./db_connect.php");
include("./include/header.php");


$user_id = $_SESSION["emAil"];

$sql = "SELECT * FROM userslogin Where email='$user_id'";
 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$todoa = $row["id"];
$errors = [];

$total_limit = 3;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
$page=1;

}
$offset = ($page - 1 ) * $total_limit; 


$sql = "SELECT * FROM todo WHERE user_id='$todoa ' LIMIT {$offset},{$total_limit}" ;
$result = $conn->query($sql);



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






<div class="container mt-5 " > <table class="table">
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
      <th><a href="./tododel.php?id=<?php echo $row["id"] ?>" class="btn btn-outline-danger">DELETE</a><a  href="./todoupdata_page.php?id=<?php echo $row["id"] ?>" class="btn btn-outline-warning ms-3">Update</a></th>
    
    </tr>

    <?php endwhile ;?>
    </tbody>
    </table>
  
</div>
<div class="container   mt-5">
<?php



$sql = "SELECT * FROM todo WHERE user_id='$todoa' ";
$result = $conn->query($sql);

    $total_page = $result->num_rows;
    $total_page_and_limit = ceil( $total_page/ $total_limit);
    echo '<ul class="wit mx-auto pagination">';
    for($i = 1 ; $i <= $total_page_and_limit ; $i++ ){
    echo '<li class="page-item"><a class="page-link" href="todolist.php?page='.$i.'">'.$i.'</a></li>';

    }
   echo '</ul>';


?>
</div>




<?php 

include("./include/footer.php");


?>
