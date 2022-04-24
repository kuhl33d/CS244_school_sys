<?php
    include("../CRUD.php");
    if(isset($_POST['submit'])){
        Create("users.txt",$_POST['line'],true);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <?php
    // try{
        if(file_exists("users.txt")){
            $f = fopen("users.txt","r");
            if($f){
                while(!feof($f)){
                    $str = fgets($f);
                    echo $str."<br>";
                }
            }
            fclose($f);
            // $str = file_get_contents("users.txt");
            // echo $str;
        }
    // }catch(Exception $s){
    //     echo "file not found";
    // }
    ?>
    <hr>
    <p>create</p>
    <form action="" method="post">
        <p>enter line:</p>
        <input type="text" name="line">
        <input type="submit" name="submit">
    </form>
    <hr>
</body>
</html>