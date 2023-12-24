<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}

$queryuang = "SELECT * FROM kamar WHERE avail = 1";
$q1 = mysqli_query($conn, $queryuang);
$r1 = mysqli_fetch_array($q1);

$penghuni=0;
$totaluang=0;
$harga=0;



?>
<!DOCTYPE html>
<html>
<head>
    <title>KostEz</title>
    <link rel="stylesheet" type="text/css" href="lapuang.css">
</head>
<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="hero">
        <header id="header">
            <a href="#" class="judul"><b>KostEz</b></a>
            <ul>
                <li><a href="admin_index.php">BERANDA</a></li>
                <li><a href="verifpesanan.php">VERIFIKASI</a></li>
                <li><a href="lapkamar.php">LAPORAN KAMAR</a></li>
                <li><a href="lapuang.php" class="active">LAPORAN KEUANGAN</a></li> 
                <li><a href="logout.php">LOG OUT</a></li> 
                <li><div class="halo"><h3>Halo
                    <?php
                    if(isset($_SESSION["login"])){
                        echo $_SESSION["username"];
                    }
                    else{
                        echo ("ADMIN");
                    }
                    ?>
                    </h3></div></li>
            </ul>
        </header>
            <center>
                <div class="boxx">
                <br><br>
                <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>NO</th>
                        <th>NO KAMAR</th>
                        <th>JENIS</th>
                        <th>HARGA</th>
                    </tr>
                    <?php
                    while($r1 = mysqli_fetch_array($q1)){
                        $penghuni++;
                        $harga = $r1['harga'];
                        echo "
                        <tr>
                            <td>$penghuni</td>
                            <td>$r1[nokamar]</td>
                            <td>$r1[jenis]</td>
                            <td>$r1[harga]</td>
                        </tr>
                        
                        ";
                        
                        
                        $totaluang = $totaluang + $harga;
                    }                
                    ?>
                    
                    <tr>
                        <th></th>
                        <th colspan ="2">TOTAL PENDAPATAN </th>
                        <th><?php echo $totaluang?></th>
                    </tr>
                </table>
                </div>
            </center>
        
    </div>
</body>
</html>
