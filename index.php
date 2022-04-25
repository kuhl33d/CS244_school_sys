<?php
    session_start();
    if(isset($_SESSION))
        print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-learning</title>
</head>
<body>
    <?php
        if(!isset($_SESSION)){
            echo "<a href=\"login.php\">login</a>";
        }
    ?>
</body>
</html>