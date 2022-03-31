<?php
$conn = mysqli_connect('localhost', 'root', '', 'sosmed');

function commentRelation($tags, $comment, $id)
{
    global $conn;
    $arrTag = explode(",", $tags);
    if ($arrTag != null) {
        foreach ($arrTag as $tag) {
            $getComment = "SELECT * FROM tbcomments WHERE textComments='$comment' && id=$id && hastag='$tags'";
            $queryGetComment = mysqli_query($conn, $getComment);
            var_dump($getComment);

            $dataComment = mysqli_fetch_array($queryGetComment);
            var_dump($dataComment);
            $commentId = $dataComment['idComments'];
            $tagId = $tag;

            $sqlTagComment = "INSERT INTO tbtag_comment(tag_id,comment_id) VALUES($tagId,$commentId)";
            $queryTagComment = mysqli_query($conn, $sqlTagComment);
        }
    }
}


function tweetRelation($tags, $text, $id)
{
    global $conn;
    $arrTag = explode(",", $tags);
    if ($arrTag != null) {
        foreach ($arrTag as $tag) {
            $getTweet = "SELECT * FROM tbtweets WHERE textTweets='$text'&& id=$id && hashtag=$tags";
            $queryGetTweet = mysqli_query($conn, $getTweet);
            $dataTweet = mysqli_fetch_array($queryGetTweet);
            $tweetId = $dataTweet['idTweets'];
            $tagId = $tag;
            $sqlTagCommit = "INSERT INTO tbtag_tweet(tag_id, tweet_id) VALUES('$tagId', $tweetId)";
            $queryCommit = mysqli_query($conn, $sqlTagCommit);
        }
    }
}