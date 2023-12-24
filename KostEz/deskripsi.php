<?php
session_start();
include ("koneksi.php");
$nokamar = $_POST["room"];
$query_room = "SELECT * FROM kamar WHERE nokamar = $nokamar";
$q1 = mysqli_query($conn, $query_room);
$r1 = mysqli_fetch_array($q1);
if($r1['nokamar'] == $nokamar){
    $no =$r1['nokamar'];
    $jenis =$r1['jenis'];
    $fas =$r1['fasilitas'];
    $harga =$r1['harga'];
    $avail =$r1['avail'];
    $_SESSION["nokamar"]=$r1['nokamar'];
}
$pesan = '<form action="pesan.php" method = "POST" class="input-group">
<a href = "pesan.php"><button class="button buttonpesan" name="pesan" type="button" >Pesan</button></a>
</form>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deskripsi.css">
    <title>Deskripsi</title>
</head>
<body>
    <a href = "index.php" >[Back]</a>
    <div class="box">
        <h2>DESKRIPSI KAMAR</h2>
        <img class="gambar" src="img/contoh.jpeg" alt="gambar" height="250px" width="250px">
        <div class="box1">
            <h4>Kamar <?php echo $no?></h4>
            <h5> Jenis : <?php echo $jenis?></h5>
            <h5>Fasilitas:</h5><tr>
                <h6><?php echo $fas?>
                </h6>
            <h5><?php echo $harga?></h5>
        
            <?php
            if($avail == 0){
                echo $pesan;
                if(isset($_POST['pesan'])){
                    header('location:pesan.php');
                }
                
            }
            else{
                echo "Kamar Sudah Terisi";
            }
            ?>
            
        </div>
        
        
    </div>
</body>
</html>