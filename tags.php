<?php
// membuat variabel conn;
$conn = mysqli_connect('localhost', 'root', '', 'sosmed');

// membuat function tag untuk memecahkan hashtag dengan text biasa
function tags($text)
{
    global $conn;
    $tags = explode('#', $text);
    array_splice($tags, 0, 1);
    $tagdata = "";

    foreach ($tags as $tag) {
        $sqlTagData = "SELECT * FROM tbtags WHERE textTags='$tag'";
        $queryDataTag = mysqli_query($conn, $sqlTagData);
        $checkDataTag = mysqli_num_rows($queryDataTag);
        if ($checkDataTag == 0) {
            $insertTag = "INSERT INTO tbtags(textTags) VALUES('$tag')";
            mysqli_query($conn, $insertTag);

            $getTag = "SELECT * FROM tbtags WHERE textTags='$tag'";
            $queryGetTag = mysqli_query($conn, $getTag);
            $dataTag = mysqli_fetch_array($queryGetTag);
            $tagId = $dataTag['idTags'];
            $tagdata = $tagdata . $dataTag['idTags'] . ",";
        } else {
            $getTag = "SELECT * FROM tbtags WHERE textTags='$tag'";
            $queryGetTag = mysqli_query($conn, $getTag);
            $dataTag = mysqli_fetch_array($queryGetTag);
            $tagdata = $tagdata . $dataTag['idTags'] . ",";
        }
    }
    $twitter = substr_replace($tagdata, "", -1);
    return $twitter;
}