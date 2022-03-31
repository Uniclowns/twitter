<?php
include "connection.php";
include "tags.php";
include "commentTags.php";

$comments = $_POST['comment'];
$image = $_POST['image'];
$file = $_POST['file'];
$id = $_POST['id'];
$idUser = $_POST['idUser'];
$cmd = $_POST['cmd'];
$updateText = $_POST['updateText'];
$updateImage = $_POST['updateImage'];
$updateFile = $_POST['updateFile'];
$eventid = $_POST['idTweets'];

if ($cmd == "comment") {
    $tags = tags($comments);
    $sql = "INSERT INTO tbcomments(textComments, id, hastag, event_id, image, file) VALUES('$comments', $id, '$tags', $eventid, 'img/$image', '$file')";
    $query = mysqli_query($conn, $sql);

    if ($tags != null) {
        commentRelation($tags, $comments, $id);
    }
    header("location:comment.php?idTweets=$eventid");
} else if ($cmd == "deleteComment") {
    $sql = "DELETE FROM tbcomments WHERE idComments = '$id'";
    $query = mysqli_query($conn, $sql);

    $sqltagcomment = "DELETE FROM tbtag_comment WHERE comment_id ='$id'";
    $querytagcomment = mysqli_query($conn, $sqltagcomment);
    header("location:comment.php?idTweets=$eventid");
} else if ($cmd == 'updateComment') {
    $tags = tags($updateText);
    $sql = "UPDATE tbcomments SET textComments='$updateText', hastag='$tags', image='img/$updateImage', file='$updateFile' WHERE idComments=$id";
    $query = mysqli_query($conn, $sql);

    $deleCommentTag = "DELETE FROM tbtag_comment WHERE comment_id=$id";
    $queryDelete = mysqli_query($conn, $deleCommentTag);

    if ($tags != null) {
        commentRelation($tags, $updateText, $idUser);
    }
    header("location:comment.php?idTweets=$eventid");
}