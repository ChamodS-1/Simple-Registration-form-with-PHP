<?php

include("database.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label,input{

            display:block;
        }  
    </style>
</head>
<body>
   
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <h1>Login</h1>


    <label for="userName">User Name</label>
    <input type="text" id="userName" name="user-name">

     
    <label for="pass">Password</label>
    <input type="password" id="pass" name=password>


    <input type="submit" value="Login" name=submit>

</form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = filter_input(INPUT_POST,"user-name",FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) && empty($password)){
        echo"User Name & password Requied!";
       }

    elseif(empty($username)){
    echo"User Name Requied!";
   }
   elseif(empty($password)){
    echo "Password Requied!";
   }

   else{

    $sql = "SELECT * FROM users";

    try{
        $result = mysqli_query($conn,$sql);
    
    }
    
    catch(mysqli_sql_exception){
    
        echo "no";
    
    }

    if(mysqli_num_rows($result)>0){

        $number = 1;
        while($row = mysqli_fetch_assoc($result)){;

        /*foreach($row as $keys=> $values){
            echo $values . "<br>";
        }*/

        if(($row["user_name"] ==$username) && ($row["password"] == $password)){

            // $_SESSION["userName"] = $row["user_name"];
             echo "Successfull!";
             $_SESSION["name"] = $username;
             header("Location: user.php");
             break;
             
            // break;
                
          }

          $number++;

        if(mysqli_num_rows($result)<$number){
            echo "Not Found!";
        }

       /* elseif(!($row["user_name"] ==$username) && !($row["password"] == $password)){
            echo "Incorect user name and password!";
            break;
         }

         elseif(!($row["user_name"] ==$username)){
            echo "User Name does Not Exits!";
            break;
         }

         elseif(!($row["password"] == $password)){
            echo "Incorrect Password!";
            break;
         }*/

       // echo $row["user_name"] . "<br>";
        
    }
       
    mysqli_close($conn);

    }
   }
}

?>
    


