<?php

include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        label,input{

            display:block;
        }  
    </style>
</head>
<body>
   
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <h1>Sign Up</h1>


    <label for="userName">User Name</label>
    <input type="text" id="userName" name="user-name">

     
    <label for="pass">Password</label>
    <input type="password" id="pass" name=password>

    <label for="pass2">Confirm Password</label>
    <input type="password" id="pass2" name=password2>

    <input type="submit" value="Sign Up" name=submit>
    <a href="http://localhost:4433/website/login.php">Login</a>

</form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = filter_input(INPUT_POST,"user-name",FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST,"password2",FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) && empty($password)){
        echo"User Name & password Requied!";
       }

    elseif(empty($username)){
    echo"User Name Requied!";
   }
   elseif(empty($password)){
    echo "Password Requied!";
   }

   elseif(!($password==$password2)){
    echo "Enter Same Password!";
   }
   else{

    $sql = "INSERT INTO users (user_name,password) VALUES ('$username',' $password')";

    try{
        mysqli_query($conn,$sql);
    
    }
    
    catch(mysqli_sql_exception){
    
        echo "no";
    
    }
    
    mysqli_close($conn);
    echo "Sign Up Successfuly!";
    
   }
}

?>
    
