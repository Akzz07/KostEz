<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}
$p1 = $_SESSION["nokamar"];
$p3=$_SESSION["userid"];
//echo $_SESSION["nokamar"];
//echo $_SESSION["userid"];

$query_room = "SELECT * FROM kamar WHERE nokamar = $p1";
$query_user = "SELECT * FROM user WHERE userid = $p3";
$q1 = mysqli_query($conn, $query_room);
$q2 = mysqli_query($conn, $query_user);
$r1 = mysqli_fetch_array($q1);
$r2 = mysqli_fetch_array($q2);

if($r1['nokamar'] == $p1){
    $p2 =$r1['jenis'];
    $p6 =$r1['harga'];
    $p7 =$r1['avail'];
    $avail =$r1['avail'];
}
if($r2['userid']== $p3){
    $p4 =$r2['username'];
    $p5 =$r2['nohp'];
}


$query_pesan = "INSERT INTO transaksikamar (nokamar, jenis, userid, username, nohp, harga, avail)
                VALUES ('$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7') ";

if(mysqli_query($conn, $query_pesan)){
    //echo "Berhasil Memesan";
    //header("Location: login.php");
}
else{
    echo "Pendaftaran gagal : ".mysqli_mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pesan.css">
    <title>Pesan Kamar</title>
</head>
<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="boxx">
        
            <div class="nav">
                <H1 align="center">PEMBAYARAN</H1>
            </div>
            <div class="gambar" align="center">
                <img src="img/brc.png" alt="scan" width="200" height="250">
            </div>
            <div class="desc">
                <h2>Cara Pembayaran:</h2>
                <h4>1. pembayaran bisa langsung scan barcode. </h4>
                <h4>2. pembayaran bisa lewat tf bank (3317366513/126872189) atas nama KostEz.</h4>
                <h4>3. Pembayaran bisa lewat Shopeepay/Dana (082322304800) atas nama KostEz.</h4>
                <h4>4. Bukti pembayaran dikirim pada Whatsapp: 082322304800. <a href="https://wa.me/082322304800"style="text-decoration: none;">klik disini</a></h4>
                <h4 align="center">JANGAN LUPA KIRIM BUKTI PEMBAYARAN!!!</h4>
            </div> 
            <center>
                <a href = "index.php" >MENGERTI</a>     
            </center>
    </div>
    
</body>
</html>