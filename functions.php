<?php
function check_login($con)
{
    if(isset($_SESSION['User_Id']))
    {
        $id=$_SESSION['User_Id'];
        $query="select * from tourism_user_details where User_Id = '$id' limit 1";

        $result=mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data=mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
} 

function random_num($length)
{
    $text="";
    if($length<1)
    {
        $length=2;
    }
    $len=rand(1,$length);
    for($i=0;$i<$len;$i++)
    {
        $text .= rand(0,9);
    }
    return $text;
}