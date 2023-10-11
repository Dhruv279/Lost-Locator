<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email=$_POST['Email'];
    $pwd=$_POST['Password'];

    // if(!empty($email) && !empty($pwd))
    // {
    //     $query="select * from tourism_user_details where Email='$email' limit 1";
    //     $result=mysqli_query($con,$query);
    //     if($result)
    //     {
    //         if($result && mysqli_num_rows($result)>0)
    //         {
    //             // $user_data=mysqli_fetch_assoc($result);
    //             // if($user_data['Password']===$pwd)
    //             // {
    //             //     $_SESSION['User_Id']=$user_data['User_Id'];
    //             //     header("Location: logined.php");
    //             // }
    //             while($user_data=mysqli_fetch_assoc($result))
    //             {
    //                 // {
    //                 //     $email=$user_data['Email'];
    //                 //     header("Location: logined.php");
    //                 // }
    //                 // if($user_data['Password']===$pwd)
    //                 if(password_verify($pwd,$user_data['Password']))
    //                 {
    //                     $_SESSION['User_Id']=$user_data['User_Id'];
    //                     header("Location: logined.php");
    //                 }
    //             }
    //         }
    //     }
    //     echo "Enter correct email-id or password";
    // }
    $query="select * from user_details where Email='$email'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if(password_verify($pwd , $row['Password']))
            {
                $email=$row['Email'];
                header("Location: index.php");
            }
            else
            {
                header("Location: login.php");
            }
        }
    }
    else{
        echo "Enter some valid information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .login {
            margin: 130px auto;
            margin-top: 12%;
            width: 400px;
            height: 450px;
            padding: 20px;
            border: 5px double black;
            border-radius: 30px;
        }
        .button{
            width:200px;
            position: absolute;
            justify-content: center;

        }
        .login .desc
        {
            text-align: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="login">
        <form method="POST">
        <h1>Login</h1>
        <br><br>
        <label for="email">Email</label>
        <input required placeholder="Enter your email" class="form-control" name="Email" type="email" id="email">
        <br>
        <label for="password">Password</label>
        <br>
        <input class="form-control text2" name="Password" type="password" id="password" placeholder="Enter password">
        <img src="hidden.png" alt="ERROR" id="eyeicon">
        <label for="">Show Password</label>
        <br><br>
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-dark btn-lg">Login</button>
        </div><br>
        <div class="desc">
            You haven't any account?
        <a href="sign-up.php">Sign-up</a>
        </div>
        </form>
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