<?php
// Menyambungkan antara file  connection.php dengan file regis.php agar variabel $conn dapat digunakan
include "connection.php";


$username = $_POST['username']; // Membuat variabel $username yang berisikan username yang telah diambil dari register.php
$email = $_POST['email']; // Membuat variabel $email yang berisikan email yang telah diambil dari register.php
$password = md5($_POST['password']); // Membuat variabel $password yang berisikan password yang telah diambil dari register.php

// Membuat perintah SQL untuk memasukkan data ke dalam database
$query = "INSERT INTO tbuser (username, email, password) VALUES('$username', '$email', '$password')";

// Menjalankan perintah SQL kedalam PHP
mysqli_query($conn, $query);

// Memindahkan user ke bagian login.php
header('location: login.php');
