<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}

$querykamar = "SELECT * FROM kamar";
$querykamar2 = "SELECT * FROM transaksikamar WHERE avail = 1";
$q1 = mysqli_query($conn, $querykamar);
$q2 = mysqli_query($conn, $querykamar2);
$r1 = mysqli_fetch_array($q1);

$kosong=0;
$terisi=0;
$total=0;
$ac =0;

while($r1 = mysqli_fetch_array($q1)){


    $total++;
    if($r1['jenis']=='Ac'){
        $ac++;
    }

    if($r1['avail']==0){
        $kosong++;
    }
    else{
        $terisi++;
    }

}
/*echo "kosong : $kosong<br>";
echo "terisi : $terisi<br>";
echo "total  : $total<br>";*/
$tac = $total - $ac;
?>
<!DOCTYPE html>
<html>
<head>
    <title>KostEz</title>
    <link rel="stylesheet" type="text/css" href="lapkamar.css">
</head>
<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="hero">
        <header id="header">
            <a href="#" class="judul"><b>KostEz</b></a>
            <ul>
                <li><a href="admin_index.php" >BERANDA</a></li>
                <li><a href="verifpesanan.php">VERIFIKASI</a></li>
                <li><a href="lapkamar.php" class="active">LAPORAN KAMAR</a></li>
                <li><a href="lapuang.php">LAPORAN KEUANGAN</a></li> 
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
                    <table border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td>Total Kamar</td>
                            <td>: <?php echo $total?></td>
                        </tr>
                        <tr>
                            <td>Kamar Terisi</td>
                            <td>: <?php echo $terisi?></td>
                        </tr>
                        <tr>
                            <td>Kamar Kosong</td>
                            <td>: <?php echo $kosong?></td>
                        </tr>
                        <tr>
                            <td>Kamar BerAC</td>
                            <td>: <?php echo $ac?></td>
                        </tr>
                        <tr>
                            <td>Kamar Tanpa AC</td>
                            <td>: <?php echo $tac?></td>
                        </tr>
                    </table>
                    <br>
                    <table border="1" cellspacing="0" cellpadding="5">
                        <tr>
                            <th>NO KAMAR</th>
                            <th>JENIS</th>
                            <th>PENYEWA</th>
                            <th>NO HP</th>
                            <th>HARGA</th>
                        </tr>
                        <?php
                        while($r2 = mysqli_fetch_array($q2)){
                            echo "
                            <tr>
                                <td>$r2[nokamar]</td>
                                <td>$r2[jenis]</td>
                                <td>$r2[username]</td>
                                <td>$r2[nohp]</td>
                                <td>$r2[harga]</td>
                            </tr>
                            
                            ";
                            
                        } 
                        ?>
                    </table>
                </div>
            </center>
        
    </div>
</body>
</html>
