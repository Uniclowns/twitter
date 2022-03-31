<?php
session_start();
$username = $_SESSION['username'];
$image = $_SESSION['image'];
$id = $_SESSION['id'];
$idTweets = $_GET['idTweets'];

include "connection.php";
$sqlTweet = "SELECT * FROM tbtweets WHERE idTweets = '$idTweets'";
$queryTweet = mysqli_query($conn, $sqlTweet);

$sqlComment = "SELECT * FROM tbcomments WHERE event_id=$idTweets";
$queryComment = mysqli_query($conn, $sqlComment);

// $sqlUser = "SELECT * FROM tbuser WHERE id='$id'";
// $queryUser = mysqli_query($conn, $sqlUser);
// $arrayUser = mysqli_fetch_array($queryUser);
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

    <div class="container">
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <a href="#" class="text-light navbar-brand">Home</a>
                <a href="#" class="text-light navbar-brand">Search</a>
                <a href="tweets.php" class="text-light navbar-brand">Tweet</a>
                <a href="profile.php" class="text-light navbar-brand">Profile</a></a>
            </div>

            <div class="col-8">
                <?php foreach ($queryTweet as $key) : ?>
                <div class="card" style="width: 24rem; margin-left:60px;">
                    <?php if ($key['image'] != null) { ?>

                    <img src="<?= $key['image']; ?>" alt="">

                    <?php } ?>

                    <?php if ($key['file'] != null) { ?>

                    <input type="text" value="<?= $key['file']; ?>" disabled>
                    <?php } ?>

                    <p class="text-dark">
                        <?= $key['textTweets']; ?>
                    </p>

                </div>
                <div class="" style="margin-left: 60px; margin-top: 40px;">
                    <form action="comments.php" method="POST">
                        <input type="text" name="comment" id="comment" class="form-control" style="width: 24rem;"
                            placeholder="Put Your Comment Here">
                        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                        <input type="hidden" name="idTweets" id="idTweets" value="<?= $idTweets; ?>">
                        <span style="margin-top: 40px;">Comment Image</span>
                        <input type="file" name="image" id="image" class="form-control"
                            style="width: 24rem; margin: 0px 0px 20px 0" placeholder="Put Your Comment Here">
                        <span>Comment File</span>
                        <input type="file" name="file" id="file" class="form-control" style="width: 24rem;"
                            placeholder="Put Your Comment Here">
                        <button class="btn btn-primary" type="submit" id="cmd" name="cmd" style="margin-top: 20px;"
                            value="comment">Comment</button>
                    </form>
                </div>

                <?php foreach ($queryComment as $comment) :
                        $idTweeting = $comment['event_id'];
                        $idComments = $comment['idComments'];
                        $textComments = $comment['textComments'];
                    ?>

                <p><?= $comment['textComments']; ?></p>
                <img src="<?= $comment['image']; ?>" alt="" style="width: 40px; height:40px;">
                <input type="text" disabled value="<?= $comment['file']; ?>">

                <button class="btn btn-warning" id="updateCom"
                    onclick="editCom(<?php echo "'$idTweeting', '$textComments'" ?>)">Update Comment </button>

                <form action="comments.php" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $idComments; ?>">
                    <input type="hidden" name="idUser" id="idUser" value="<?= $id; ?>">
                    <input type="hidden" name="idTweets" id="idTweets" value="<?= $idTweets; ?>">
                    <input type="text" name="updateText" id="updateChange" style="display: none;"
                        value="<?= $textComments; ?>">
                    <input type="file" name="updateImage" id="updateImage" style="display: none;" value="">
                    <input type="file" name="updateFile" id="updateFile" value="" style="display: none;">
                    <button class="btn btn-danger" value="deleteComment" name="cmd" id="cmd">Delete Comment</button>
                    <button class="btn btn-warning" style="display: none;" id="updateBut" name="cmd"
                        value="updateComment">Save
                        Update</button>
                </form>

                <?php endforeach ?>

                <?php endforeach ?>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <script>
        function editCom(idTweeting, textComments) {
            document.getElementById('updateCom').style.display = "none";
            document.getElementById('updateBut').style.display = "block";
            document.getElementById('updateChange').style.display = "block";
            document.getElementById('updateImage').style.display = "block";
            document.getElementById('updateFile').style.display = "block";
        }
        </script>

</body>

</html>