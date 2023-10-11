<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="lost_and_found";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect");
}

