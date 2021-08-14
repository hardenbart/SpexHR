<?php
session_start();
$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";
$dbname = "spexhr_db";        /* Password */
$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
