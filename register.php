<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="Container">

        <?php 
            if (isset($_POST["submit"])){
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $repeat_password = $_POST["repeat_password"];
                $errors = array();

                if (empty($fullname) OR empty($email) OR empty($password) OR empty($repeat_password)){
                    array_push($errors, "Full information required!");
                } 
                else if(!filter_var($email, FILTER_VALIDATE)){
                    array_push($errors, "Email is not valid");
                } 
                else if (strlen($password) < 8){
                    array_push($errors, "Password must be at least 8 characters long");
                } 
                else if ($password != $repeat_password){
                    array_push($errors, "not the same Passwords");
                }

                if (count($errors) > 0){
                    foreach($errors as $error){
                        echo "<div class='alert alert-danger'> $error </div>";
                    }
                } else{
                    // Inserting into db
                }
            }
            
        ?>

        <form action="register.php" method="Post">
            
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Enter your Full name"><br>
                <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
                <input type="password" class="form-control" name="password" placeholder="Enter Password"><br>
                <input type="password" class="form-control" name="repeat_password" placeholder="repeat Password"><br>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="register">
            </div>
        </form>

    </div>

    
</body>
</html>