<?php
session_start();
include("koneksi.php");

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}

$query_tampil_kamar = "SELECT * FROM KAMAR";
$q1 = mysqli_query($conn, $query_tampil_kamar);
$r1 = mysqli_fetch_array($q1);

$avail = 0;

$arry = array();
$i = 1;

function cek($avail){
    if($avail == 0){
        echo "kosong";
    }
    else{
        echo "terisi";
    }
}

while($r1 = mysqli_fetch_array($q1)){
    
    $arry[$i]=$r1['avail'];
    $i++;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>KostEz</title>
    <link rel="stylesheet" type="text/css" href="admin_index.css">
</head>
<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="hero">
        <header id="header">
            <a href="#" class="judul"><b>KostEz</b></a>
            <ul>
                <li><a href="admin_index.php" class="active">BERANDA</a></li>
                <li><a href="verifpesanan.php">VERIFIKASI</a></li>
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
            <h1 center >PETA KOST</h1>
            
            <form id="pilihkamar" action="deskripsi.php" method = "POST" class="input-group">
                <table border = "0" cellspacing = "0" cellpadding = "5">
                    <tr>
                        <td colspan = "7">Parkiran</td>
                        <td colspan = "3">Gerbang</td>
                        
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[32])?>">32</div></td>
                        <td colspan = "3"rowspan = "8"></td>
                        <td><div class="<?php cek($arry[17])?>">17</div></td>
                        <td><div class="<?php cek($arry[16])?>">16</div></td>
                        <td colspan = "3"rowspan = "8"></td>
                        <td><div class="<?php cek($arry[1])?>">1</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[31])?>">31</div></td>
                        <td><div class="<?php cek($arry[18])?>">18</div></td>
                        <td><div class="<?php cek($arry[15])?>">15</div></td>
                        <td><div class="<?php cek($arry[2])?>">2</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[30])?>">30</div></td>
                        <td><div class="<?php cek($arry[19])?>">19</div></td>
                        <td><div class="<?php cek($arry[14])?>">14</div></td>
                        <td><div class="<?php cek($arry[3])?>">3</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[29])?>">29</div></td>
                        <td><div class="<?php cek($arry[20])?>">20</div></td>
                        <td><div class="<?php cek($arry[13])?>">13<div></td>
                        <td><div class="<?php cek($arry[4])?>">4</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[28])?>">28</div></td>
                        <td><div class="<?php cek($arry[21])?>">21</div></td>
                        <td><div class="<?php cek($arry[12])?>">12</div></td>
                        <td><div class="<?php cek($arry[5])?>">5</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[27])?>">27</div></td>
                        <td><div class="<?php cek($arry[22])?>">22</div></td>
                        <td><div class="<?php cek($arry[11])?>">11</div></td>
                        <td><div class="<?php cek($arry[6])?>">6</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[26])?>">26</div></td>
                        <td><div class="<?php cek($arry[23])?>">23</div></td>
                        <td><div class="<?php cek($arry[10])?>">10</div></td>
                        <td><div class="<?php cek($arry[7])?>">7</div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[25])?>">25</div></td>
                        <td><div class="<?php cek($arry[24])?>">24</div></td>
                        <td><div class="<?php cek($arry[9])?>">9</div></td>
                        <td><div class="<?php cek($arry[8])?>">8</div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
        </center>
    </div>
</body>
</html>
