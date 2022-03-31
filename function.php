<?php
// Memangill file connection.php
include "connection.php";

// Memanggil File commentTags
include "commentTags.php";

// Memanggil file tags.php
include "tags.php";

// Memanggil value dan membuatnya menjadi variabel
$id = $_POST['id'];
$tweets = $_POST['tweets'];
$imageUpd = $_POST['image'];
$bio = $_POST['bio'];
$cmd = $_POST['cmd'];
$idTweets = $_POST['idTweets'];
$textTweets = $_POST['textTweets'];
$imgTweets = $_POST['image'];
$fileTweets = $_POST['file'];
$textComments = $_POST['commentsec'];


// Membuat sebuah Function jika $cmd memiliki value update Prof
if ($cmd == 'updateProf') {
    $sqlUpdateProf = "UPDATE tbuser SET image='img/$imageUpd', bio='$bio' WHERE id='$id'";
    $queryUpdateProf = mysqli_query($conn, $sqlUpdateProf);
    header('location:profile.php');

    // Membuat sebuah Function jika $cmd memiliki value deleteTweet
} else if ($cmd == 'deleteTweet') {
    $sqlDeleteTweet = "DELETE FROM tbtweets WHERE idTweets = '$idTweets'";
    $queryDeleteTweet = mysqli_query($conn, $sqlDeleteTweet);
    header('location:profile.php');
    // Membuat sebuah Function jika $cmd memiliki value tweets
} else if ($cmd == 'tweets') {
    // Memanggil Function $tags agar bisa memecah tag
    $tags = tags($tweets);
    echo $tags;
    $sqlTweet = "INSERT INTO tbtweets(textTweets, id, hashtag, image, file) VALUES('$tweets', $id, '$tags', 'img/$imgTweets', '$fileTweets')";
    $queryTweet = mysqli_query($conn, $sqlTweet);

    // Jika nilai di dalam variabel tag tidak kosong maka kerjakan perintah berikut
    if ($tags != null) {
        tweetRelation($tags, $tweets, $id);
    }
    header('location:index.php');

    // Membuat sebuah Function jika $cmd memiliki value updateTweets
} else if ($cmd == 'updateTweets') {
    // Membuat Perintah SQL 
    $sqlUpdateTweet = "UPDATE tbtweets SET textTweets='$textTweets', image='img/$imgTweets', file='file/$fileTweets' WHERE idTweets = '$idTweets'";
    // Membuat variabel agar perintah SQL dapat bekerja di PHP
    $queryUpdateTweet = mysqli_query($conn, $sqlUpdateTweet);

    if ($tags != null) {
        tweetRelation($tags, $textTweets, $id);
    }

    header('location:profile.php');
}


// Filter
// DOkumentasi