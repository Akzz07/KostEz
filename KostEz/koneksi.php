<?php
$servername = "localhost";
$database = "kostez";
$user = "root";
$pass = "";

$conn = mysqli_connect($servername,$user,$pass,$database);

if (!$conn){

    die("koneksi gagal : ".mysqli_connect_error());

}
else{
    //echo "koneksi berhasil";
}