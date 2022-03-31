<?php
session_start();
include "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tbuser WHERE email= '$email'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);



if ($num == 1) {

    $res = mysqli_fetch_assoc($query);

    password_verify($password, $res['password']);
    $username = $res['username'];
    $image = $res['image'];
    $id = $res['id'];
    $passData = $res["password"];

    $_SESSION['username'] = $username;
    $_SESSION['image'] = $image;
    $_SESSION['id'] = $id;
    header('location:index.php');
} else {
?>

<script>
alert('Maaf, Mungkin Email dan Password Anda Salah');
location.href = "login.php";
</script>

<?php
} ?>