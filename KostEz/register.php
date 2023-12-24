<?php
require 'koneksi.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$nohp = $_POST["nohp"];
$alamat = $_POST["alamat"];
$gprofil = '<img src="img/profil.png">';


$query_sql = "INSERT INTO user (username, email, password, nohp, alamat, gprofil)
            VALUES ('$username', '$email', '$password', $nohp, '$alamat', '$gprofil')";

if(mysqli_query($conn, $query_sql)){
    header("Location: login.php");
}
else{
    echo "Pendaftaran gagal : ".mysqli_mysqli_error($conn);
}
?>