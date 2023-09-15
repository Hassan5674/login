
<?php  
include("./include/header.php");
?>

<form method="POST" action="./action_login.php" >

<div class="md-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" id="email"  aria-describedby="emailHelpId" placeholder="Please enter your email">
  
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="text" class="form-control" name="password" id="password"  aria-describedby="emailHelpId" placeholder="Please enter your password">
  
</div>
<input type="submit" name="submit" >
</form>


<?php 

include("./include/footer.php");


?>