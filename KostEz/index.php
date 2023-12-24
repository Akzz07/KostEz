<?php
session_start();
include ("koneksi.php");
//$_SESSION['user_username'];
if(isset($_POST['pilih'])){
    $nokamar = $_POST["room"];
    header ("location:deskripsi.php");
}

$query_tampil_kamar = "SELECT * FROM KAMAR";
$q1 = mysqli_query($conn, $query_tampil_kamar);
$r1 = mysqli_fetch_array($q1);

$avail = 0;

$arry = array();
$j =1;
$i = 1;

//echo nl2br("One line.\nAnother line.");

/*while($r1 = mysqli_fetch_array($q1)){
    if($i == $r1['nokamar']){
        echo true;
        echo $r1['nokamar'];
        if($r1['avail']== 0){
            echo "Kosong";
        }
        else{
            echo "Terisi";
        }
        echo "<br>";
    }
    $i++;
}*/

function cek($avail){
    if($avail == 0){
        echo "kosong";
    }
    else{
        echo "terisi";
    }
}

while($r1 = mysqli_fetch_array($q1)){
    //cek($r1['avail']);
    /*echo "
    <tr>
        <td>$i</td>
        <td>$r1[nokamar]</td>
        <td>$r1[avail]</td>
    </tr>
    <br>";*/
    $arry[$i]=$r1['avail'];
    $i++;
}
while($i>$j){
    echo "
    <tr>
        
    </tr>
    ";
    $j++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KostEz</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body >
    <div class="hero">
        <header id="header">
            <a href="#" class="judul"><b>KostEz</b></a>
            <ul>
                <li><a href="index.php" class="active">BERANDA</a></li>
                <!--<li><a href="checkout.php">RIWAYAT</a></li>-->
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="profil.php">PROFIL</a></li>
                <li><a href="logout.php">LOG OUT</a></li> 
                <li><div class="halo"><h3>Halo
                    <?php
                    if(isset($_SESSION["login"])){
                        echo $_SESSION["username"];
                    }
                    else{
                        echo ("Pengunjung");
                    }
                    ?>
                    </h3></div></li>
            </ul>
        </header>
        
        
        <!--
        <div class="kosong"><h1>kosong</h1></div>
        <div class="terisi"><h1>terisi</h1></div>

        <div class="<?php cek($arry[32])?>"><h1>ini coba<?php cek($arry[32])?></h1></div>
        <div class="<?php cek($arry[26])?>"><h1>ini coba coba <?php cek($arry[26])?></h1></div>
    -->
        <center>
        <div class="boxx">
            <h1 center >PETA KOST</h1>
            <!--<form id="pilih" action="deskripsi.php" method="POST">
                <input name="room" type="text" class="input-field" placeholder="kamar">
                <button type="submit" class="submit-button" name="pilih">PILIH</button>
                
                  
            </form>-->
            
            <form id="pilihkamar" action="deskripsi.php" method = "POST" class="input-group">
                <table border = "0" cellspacing = "0" cellpadding = "5">
                    <tr>
                        <td colspan = "7">Parkiran</td>
                        <td colspan = "3">Gerbang</td>
                        
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[32])?>"><a href="deskripsi.php"><button name ="room" value="32">32</button></a></div></td>
                        <td colspan = "3"rowspan = "8"></td>
                        <td><div class="<?php cek($arry[17])?>"><a href="deskripsi.php"><button name ="room" value="17">17</button></a></div></td>
                        <td><div class="<?php cek($arry[16])?>"><a href="deskripsi.php"><button name ="room" value="16">16</button></a></div></td>
                        <td colspan = "3"rowspan = "8"></td>
                        <td><div class="<?php cek($arry[1])?>"><a href="deskripsi.php"><button name ="room" value="1">1</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[31])?>"><a href="deskripsi.php"><button name ="room" value="31">31</button></a></div></td>
                        <td><div class="<?php cek($arry[18])?>"><a href="deskripsi.php"><button name ="room" value="18">18</button></a></div></td>
                        <td><div class="<?php cek($arry[15])?>"><a href="deskripsi.php"><button name ="room" value="15">15</button></a></div></td>
                        <td><div class="<?php cek($arry[2])?>"><a href="deskripsi.php"><button name ="room" value="2">2</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[30])?>"><a href="deskripsi.php"><button name ="room" value="30">30</button></a></div></td>
                        <td><div class="<?php cek($arry[19])?>"><a href="deskripsi.php"><button name ="room" value="19">19</button></a></div></td>
                        <td><div class="<?php cek($arry[14])?>"><a href="deskripsi.php"><button name ="room" value="14">14</button></a></div></td>
                        <td><div class="<?php cek($arry[3])?>"><a href="deskripsi.php"><button name ="room" value="3">3</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[29])?>"><a href="deskripsi.php"><button name ="room" value="29">29</button></a></div></td>
                        <td><div class="<?php cek($arry[20])?>"><a href="deskripsi.php"><button name ="room" value="20">20</button></a></div></td>
                        <td><div class="<?php cek($arry[13])?>"><a href="deskripsi.php"><button name ="room" value="13">13</button></a></div></td>
                        <td><div class="<?php cek($arry[4])?>"><a href="deskripsi.php"><button name ="room" value="4">4</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[28])?>"><a href="deskripsi.php"><button name ="room" value="28">28</button></a></div></td>
                        <td><div class="<?php cek($arry[21])?>"><a href="deskripsi.php"><button name ="room" value="21">21</button></a></div></td>
                        <td><div class="<?php cek($arry[12])?>"><a href="deskripsi.php"><button name ="room" value="12">12</button></a></div></td>
                        <td><div class="<?php cek($arry[5])?>"><a href="deskripsi.php"><button name ="room" value="5">5</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[27])?>"><a href="deskripsi.php"><button name ="room" value="27">27</button></a></div></td>
                        <td><div class="<?php cek($arry[22])?>"><a href="deskripsi.php"><button name ="room" value="22">22</button></a></div></td>
                        <td><div class="<?php cek($arry[11])?>"><a href="deskripsi.php"><button name ="room" value="11">11</button></a></div></td>
                        <td><div class="<?php cek($arry[6])?>"><a href="deskripsi.php"><button name ="room" value="6">6</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[26])?>"><a href="deskripsi.php"><button name ="room" value="26">26</button></a></div></td>
                        <td><div class="<?php cek($arry[23])?>"><a href="deskripsi.php"><button name ="room" value="23">23</button></a></div></td>
                        <td><div class="<?php cek($arry[10])?>"><a href="deskripsi.php"><button name ="room" value="10">10</button></a></div></td>
                        <td><div class="<?php cek($arry[7])?>"><a href="deskripsi.php"><button name ="room" value="7">7</button></a></div></td>
                    </tr>
                    <tr>
                        <td><div class="<?php cek($arry[25])?>"><a href="deskripsi.php"><button name ="room" value="25">25</button></a></div></td>
                        <td><div class="<?php cek($arry[24])?>"><a href="deskripsi.php"><button name ="room" value="24">24</button></a></div></td>
                        <td><div class="<?php cek($arry[9])?>"><a href="deskripsi.php"><button name ="room" value="9">9</button></a></div></td>
                        <td><div class="<?php cek($arry[8])?>"><a href="deskripsi.php"><button name ="room" value="8">8</button></a></div></td>
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
