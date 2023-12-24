<?php
include("koneksi.php");
session_start();

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit();
}
$p1 = $_SESSION['userid'];
$query = "SELECT * from user WHERE userid = '$p1'";

$q1 =  mysqli_query($conn,$query);
$r1 = mysqli_fetch_array($q1);

$img;


if($r1['userid']== $p1){
    $img = $r1['gprofil'];
    //echo "ini";
}

//echo $_SESSION['username'];
//echo $img;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <title>Profil</title>
</head>
<body>
    <!--
    <a href = "login.php" >[LogIn]</a>
    <a href = "logout.php" >[LogOut]</a>
-->
    <div class="kpl">
        <h1>PROFIL</h1>
    </div>
    <div class="box">
        <center>
            <!--<img width="240px" height ="200px"></img>-->
            <!--<div width="240px" height ="200px class="fotoprofil"><?php echo $img?></div>-->
            <!--<img src='gambar/<?php echo $img?>' width="240px" height ="200px">-->
            <img src="img/p.png" width="240px" height ="200px">
            <br><br>
            <table border="0" cellspacing = "0" cellpadding = "0">
                <tr>
                    <td><h3>USERNAME&nbsp</h3></td>
                    <td><h3> : <?php echo $_SESSION["username"]?> </h3></td>
                </tr>
                <tr>
                    <td><h3>EMAIL&nbsp</h3></td>
                    <td><h3> : <?php echo $_SESSION["email"]?> </h3></td>
                </tr>
                <tr>
                    <td><h3>PASSWORD&nbsp</h3></td>
                    <td><h3> : <?php echo $_SESSION["password"]?> </h3></td>
                </tr>
                <tr>
                    <td><h3>NO HP&nbsp</h3></td>
                    <td><h3> : <?php echo $_SESSION["nohp"]?> </h3></td>
                </tr>
                <tr>
                    <td><h3>ALAMAT&nbsp</h3></td>
                    <td><h3> : <?php echo $_SESSION["alamat"]?> </h3></td>
                </tr>
                
            </table>
        </center>
        <a href="index.php"><h3>Go Back</h3></a>
    </div>
    
</body>
<?php

?>
</html>