<?php
session_start();
if(isset($_SESSION["login"])){
    //header ("location : index.php");
}
include ("koneksi.php");
$u="";
$username = "";
$password = "";
$alamat;
$nohp;
$gprofil;
$userid;
$akses;
$err = "";


if(isset($_POST['btnlogin'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == '' or $password == ''){
        $err .= "<li>Silahkan masukkan username dan password</li>";
    }
    if(empty($err)){
        $sqllogin = "select * from user where username = '$username'";
        $q1 = mysqli_query($conn, $sqllogin);
        $r1 = mysqli_fetch_array($q1);


        if($r1['username'] != $username){
            $err .= "<li>Akun Tidak ditemukan</li>";
        }
        else if($r1['password'] != $password){
            $err .= "<li>Password Salah</li>";
        }
        else{
            $id = $r1['userid'];

            $sqlakses = "SELECT * FROM userakses WHERE userid = '$id'";
            $q2 = mysqli_query($conn, $sqlakses);
            $r2 = mysqli_fetch_array($q2);

            $akses = $r2['akses'];

            $u = $username;
            $alamat = $r1['alamat'];
            $nohp = $r1['nohp'];
            $email = $r1['email'];
            $gprofil = $r1['gprofil'];
            $userid = $r1['userid'];
        }
    }
    if(empty($err)){
        $_SESSION["username"] = $u;
        $_SESSION["password"] = $password;
        $_SESSION["alamat"] = $alamat;
        $_SESSION["nohp"] = $nohp;
        $_SESSION["email"]= $email;
        $_SESSION["gprofil"] = $gprofil;
        $_SESSION["userid"]= $userid;
        $_SESSION["login"] = true;

        if($akses =='admin'){
            header("location:admin_index.php");
            exit();
        }
        else{
            header("location:index.php");
            exit();
        }
        
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Regres</title>
    <link rel="stylesheet" href="login.css">
</head>

<body style="background-image: linear-gradient(to right, red , white)";>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="button"></div>
                <button type="button" class="toggle-button" onclick="login()">Log In</button>
                <button type="button" class="toggle-button" onclick="register()">Register</button>
            </div>
            <?php
            if($err){
                echo "<ul>$err</ul>";
            }
            ?>
            <form id="login" class="input-group" method = "POST">
                <input name="username" type="text" value = "<?php echo $username ?>" class="input-field" placeholder="Username">
                <input name="password" type="password" class="input-field" placeholder="Password">
                <button type="submit" class="submit-button" name="btnlogin">Login</button>
                  
            </form>
            <form id="register" action="register.php" method = "POST" class="input-group">
                <input name="username" type="username" class="input-field" placeholder="Username">
                <input name="email" type="email" class="input-field" placeholder="Email">
                <input name="password" type="password" class="input-field" placeholder="Password">
                <input name="nohp" type="nohp" class="input-field" placeholder="Nomer Hp">
                <input name="alamat" type="alamat" class="input-field" placeholder="Alamat">
                <input type="checkbox" class="check-box"><span>I agree to the term & conditions</span>
                <button type="submit" class="submit-button" name="btnregis" onClick="alert('Registrasi Berhasil')">Register</button>
                <?php
                    if(isset($_POST["btnregis"])){
                        if($conn){
                            alert("Registrasi berhasil !!!");
                        }
                        else{
                            alert("Registrasi gagal !!!");
                        }
                    }
                ?>
            </form>
            
        </div>
        <a href = "index.php"><button type="submit" class="submit-button">Lewati</button></a> 
    </div>
    

    <!-- Java Script -->
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("button");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>

</html>
