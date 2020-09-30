<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "estore";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {

    echo "Error" . "" . mysqli_error($conn);
}