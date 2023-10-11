<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $fName=$_POST['Fname'];
        $lName=$_POST['Lname'];
        $email=$_POST['Email'];
        $pwd=password_hash($_POST['Password'],PASSWORD_DEFAULT);
        
        $existsql="select * from user_details where Email='$email'";
        $result=mysqli_query($con,$existsql);
        $numExistRows=mysqli_num_rows($result);
        if(!empty($fName) && !empty($lName) && !empty($email) && !empty($pwd) && !is_numeric($fName) && !is_numeric($lName))
        {
            if($numExistRows>0)
            {
                echo "Username Already Exists";
            }
        else
        {
            $user_id=random_num(3);
            $query="insert into user_details (User_Id, First_Name, Last_Name, Email, Password) values ('$user_id','$fName','$lName','$email','$pwd')";
            mysqli_query($con,$query);
            header("Location: login.php");
            // else
            // {
            //     echo "Password do-not match";
            // } 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign_up Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sign_up {
            margin: 5px auto;
            margin-top: 4%;
            width: 400px;
            height: 600px;
            padding: 20px;
            border: 5px double black;
            border-radius: 30px;
        }

        .button {
            width: 200px;
            position: absolute;
            justify-content: center;

        }

        .sign_up .desc {
            text-align: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="sign_up">
        <form method="POST">
        <h1>Sign-up</h1>
        <br>
        <label for="first_name">First Name</label><br>
        <input required placeholder="Enter first name" class="form-control" name="Fname" type="first_name"
            id="first_name"><br>
        <label for="last_name">Last Name</label><br>
        <input required placeholder="Enter last name" class="form-control" name="Lname" type="last_name"
            id="last_name"><br>
        <label for="email">Email</label><br>
        <input required placeholder="Enter email" class="form-control" name="Email" type="email" id="email">
        <br>

        <label for="password">Password</label>
        <br>
        <input class="form-control text2" name="Password" type="password" id="password" placeholder="Enter password">
        <img src="hidden.png" alt="ERROR" id="eyeicon">
        <label for="">Show Password</label>
        <br><br>
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-dark btn-lg">Sign-up</button>
        </div><br>
        <div class="desc">
            You have an account?
            <a href="login.php">Login</a>
        </div>
    </div>
    <script>
        let eyeicon=document.getElementById("eyeicon");
        let password=document.getElementById("password");

        eyeicon.onclick=function()
        {
            if(password.type=="password")
            {
                password.type="text";
                eyeicon.src="view.png";
            }
            else
            {
                password.type="password";
                eyeicon.src="hidden.png";
            }
        }
    </script>
</body>

</html>