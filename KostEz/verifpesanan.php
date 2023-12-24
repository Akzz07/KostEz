<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}

$tampilverif = "SELECT * FROM transaksikamar WHERE verif = 0 ";
$q1 = mysqli_query($conn, $tampilverif);
//$r1 = mysqli_fetch_array($q1);

/*
$i=1;
$j=1;
$arry1 = array();
$arry2 = array();
$arry3 = array();
$arry4 = array();
$arry5 = array();
$arry6 = array();


while($r1 = mysqli_fetch_array($q1)){
    $arry1[$i]=$r1['idtransaksi'];
    $arry2[$i]=$r1['nokamar'];
    $arry3[$i]=$r1['jenis'];
    $arry4[$i]=$r1['username'];
    $arry5[$i]=$r1['nohp'];
    $arry6[$i]=$r1['harga'];
    echo $arry1[$i];
    $i++;
    
}*/
//echo "i adalah";
//echo $i;
$nnn;

?>
<!DOCTYPE html>
<html>
<head>
    <title>KostEz</title>
    <link rel="stylesheet" type="text/css" href="verif.css">
</head>
<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="hero">
        <header id="header">
            <a href="#" class="judul"><b>KostEz</b></a>
            <ul>
                <li><a href="admin_index.php">BERANDA</a></li>
                <li><a href="verifpesanan.php" class="active">VERIFIKASI</a></li>
                <li><a href="lapkamar.php">LAPORAN KAMAR</a></li>
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
                <br><br>
                <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>ID TRANSAKSI</th>
                        <th>NO KAMAR</th>
                        <th>JENIS</th>
                        <th>USERNAME</th>
                        <th>NO HP</th>
                        <th>HARGA</th>
                        <th>VERIFIKASI</th>
                    </tr>
                    <?php
                    $aksi = 34;
                    $aksi2 = 34;
                    while($r1 = mysqli_fetch_array($q1)){
                        $aksi = $r1['idtransaksi'];
                        $aksi2 = $r1['nokamar'];
                        echo "
                        <tr>
                            <td>$r1[idtransaksi]</td>
                            <td>$r1[nokamar]</td>
                            <td>$r1[jenis]</td>
                            <td>$r1[username]</td>
                            <td>$r1[nohp]</td>
                            <td>$r1[harga]</td>
                            <td>
                            <form method='POST' action='verifpesanan.php'>
                                <button name='acc' value='$r1[idtransaksi]'>ACCEPT</button>
                                <button name='rej' value='$r1[idtransaksi]'>REJECT</button>
                            </form>
                            </td>
                        </tr>
                        
                        ";
                        
                    }
                    if(isset($_POST['acc'])){
                        $queryacc = "UPDATE transaksikamar
                                    SET avail = 1, verif = 1
                                    WHERE idtransaksi = '$aksi'";
                        $queryupdate1="UPDATE kamar
                                    SET avail = 1
                                    WHERE nokamar = '$aksi2'";
                        $qqq = mysqli_query($conn, $queryacc);
                        $iii = mysqli_query($conn, $queryupdate1);
                    }
                    if(isset($_POST['rej'])){
                        $queryrej = "DELETE FROM transaksikamar
                                    WHERE idtransaksi = '$aksi'";
                        $qqqq = mysqli_query($conn, $queryrej);
                    }
                    
                    ?>
                </table>
            </div>
        </center>

        
    </div>
</body>
</html>
