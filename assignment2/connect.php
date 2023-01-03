<?php
$con = mysqli_connect(
    hostname : 'localhost',
    username : 'root',
    password : '',
    database : 'assignment_2'
);

if (mysqli_error($con)) 
{
    echo "Connection failed!";
}
?>