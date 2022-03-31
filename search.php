<?php
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$image = $_SESSION['image'];
$search = $_GET['search'];

include "connection.php";
$sqlTweet = "SELECT * FROM tbtweets";
$queryTweet = mysqli_query($conn, $sqlTweet);

$sqlUser = "SELECT *, tbuser.username, tbuser.image FROM tbtweets LEFT JOIN tbuser ON tbtweets.id = tbuser.id";
$queryUser = mysqli_query($conn, $sqlUser);

$sqlSearch = "SELECT * FROM tbtags WHERE textTags = '$search'";
$querySearch = mysqli_query($conn, $sqlSearch);

$checkSearch = mysqli_num_rows($querySearch);

if ($checkSearch != 0) {
    $arraySearch = mysqli_fetch_array($querySearch);
    $tagid = $arraySearch['idTags'];

    $getTweets = "SELECT * FROM tbtag_tweet LEFT JOIN tbtweets ON tbtag_tweet.tweet_id = tbtweets.idTweets WHERE tag_id=$tagid";
    $queryGetTweet = mysqli_query($conn, $getTweets);

    $getComments = "SELECT * FROM tbtag_comment LEFT JOIN tbcomments ON tbtag_comment.comment_id = tbcomments.idComments WHERE tag_id=$tagid";
    $queryGetComments = mysqli_query($conn, $getComments);
} else {
    $queryGetComments = [];
    $queryGetTweet = [];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Twitter</title>
</head>

<body class="bg-dark text-light">
    <nav class="navbar navbar-light bg-dark">
        <div class="container text-light">
            <a class="navbar-brand" href="#" style="display: flex; justify-content:center; align-items:center;">
                <img src="<?= $image; ?>" alt="" class="rounded-circle"
                    style="margin-right: 20px; width: 40px; height:40px;">
                <h2 class="text-light fs-4 mt-2">Hi, <?= $username; ?></h2>
            </a>
            <a href="logout.php" class="btn btn-light">Log-Out</a>
        </div>
    </nav>

    <div class="container text-dark">
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <a href="#" class="text-light navbar-brand">Home</a>
                <a href="searchpage.php" class="text-light navbar-brand">Search</a>
                <a href="tweets.php" class="text-light navbar-brand">Tweet</a>
                <a href="profile.php" class="text-light navbar-brand">Profile</a></a>
            </div>

            <div class="col-8">
                <form action="search.php">
                    <input type="text" name="search" id="search" class="form-control">
                </form>

                <?php foreach ($queryGetTweet as $tweets) : ?>
                <div class="card">
                    <?php if ($tweets['image'] != null) {
                        ?>

                    <img src="<?= $tweets['image']; ?>" alt="">

                    <?php } ?>

                    <div>
                        <p><?= $tweets['textTweets']; ?></p>
                        <button class="btn btn-warning" onclick="comment(<?= $key['idTweets']; ?>)">Comment</button>
                    </div>
                </div>
                <?php endforeach ?>
            </div>


        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>

    </script>
</body>

</html>