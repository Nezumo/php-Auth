<?php
    session_start();
    if (isset($_SESSION["user"])){
        header("Location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>


   
    <div class="container">
         <?php
    
            if (isset($_POST["login"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connect, $sql);
            $user  = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user){
                if(password_verify($password, $user["password"])){
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("location: index.php");
                    die();
                    
                }else{
                    echo "<div class='alert alert-danger'>Input does not exist </div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Input does not exist </div>";
                
            }

    
        ?>
        <form action="login.php" method="post"> 
            <div class="form-group" >
                <input type="email" placeholder="enter email" name="email" class="form-control"><br>
                <input type="password" placeholder="enter password"  name="password" class="form-control"><br>
                
                <input type="submit" value="login" name="login" class="btn btn-primary">

                <p>Not registered yet?<a href="register.php"> Register Here</a> </p>
            </div>

        </form>


    </div>
    
</body>
</html>