<?php
  session_start();
  if(isset($_SESSION['user'])){
    header("Location: index.php");
  }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="Styles/signupstyle.css">
    </head>

    <body>
        <form action="action.php" method="post">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                <hr>
                <button type="submit" class="registerbtn" >Register</button>
                <input type="hidden" name="register">
                <input type="hidden" name="Submit">
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="login.html">Sign in</a>.</p>
            </div>
        </form>
        <script src="JS/signup.js"></script>
    </body>

    </html>