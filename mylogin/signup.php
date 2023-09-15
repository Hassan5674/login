
<?php  
include("./include/header.php");
?>

<form method="POST" action="./action_signup.php">
<div class="mb-3">
  <label for="name" class="form-label">name</label>
  <input type="text" class="form-control" name="name" id="name"  aria-describedby="emailHelpId" placeholder="Please enter your name">
  
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" id="email"  aria-describedby="emailHelpId" placeholder="Please enter your email">
  
</div>
<div class="mb-3">
  <label for="phone" class="form-label">Phone</label>
  <input type="text" class="form-control" name="phone" id="phone"  aria-describedby="emailHelpId" placeholder="Please enter your phone">
  
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