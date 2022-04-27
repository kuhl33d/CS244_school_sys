<?php
  session_start();
  if(isset($_SESSION['user'])){
    header("Location: index.php");
  }
?>
<form action="action.php" method="post">
  <link rel="stylesheet" type="text/css" href="Styles/loginstyle.css">
    </div>
  
    <div class="container">
       
        <h1>Login</h1>
        <p>Please fill in this form to log in to your account.</p>
        <hr>
    
      <label for="uname"><b>Username</b></label>
      <input id="uname" type="text" placeholder="Enter Username" name="uname" required>
  
      <label for="psw"><b>Password</b></label>
      <input id="psw" type="password" placeholder="Enter Password" name="passwd" required>
      <input type="submit" class="submitbtn" placeholder="submit">
      <input type="hidden" name="login">
    <div>
      <input id="chBox" type="checkbox" checked="checked" name="remember"> <label for="chBox">Remember me</label>
    </div>
    <a href="signup.php">Register</a>
  </form>