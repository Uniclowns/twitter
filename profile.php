<?php
session_start();
$username = $_SESSION['username'];
$image = $_SESSION['image'];
$id = $_SESSION['id'];

include "connection.php";
$sqlTweetUser = "SELECT *, tbuser.username, tbuser.image  FROM tbtweets LEFT JOIN tbuser ON tbtweets.id = tbuser.id WHERE username LIKE '$username'";
$queryTweetUser = mysqli_query($conn, $sqlTweetUser);

$sqlUser = "SELECT * FROM tbuser WHERE username LIKE '$username'";
$queryUser = mysqli_query($conn, $sqlUser);

$sqlTweet = "SELECT * FROM tbtweets WHERE id = '$id'";
$queryTweet = mysqli_query($conn, $sqlTweet);

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
                <a href="index.php" class="text-light navbar-brand">Home</a>
                <a href="#" class="text-light navbar-brand">Search</a>
                <a href="tweets.php" class="text-light navbar-brand">Tweet</a>
                <a href="profile.php" class="text-light navbar-brand">Profile</a></a>
            </div>

            <div class="col-8">
                <div class="d-flex">
                    <?php foreach ($queryUser as $result) :
                        $usernameUser = $result['username'];
                        $imageUser = $result['image'];
                        $id = $result['id'];
                    ?>
                    <img src="<?= $imageUser; ?>" alt="" class="rounded-circle" width="40px" height="40px">
                    <p style="margin-left: 20px;"><?= $usernameUser; ?></p>
                    <?php endforeach ?>
                    <a href="changeprofile.php" class="text-light"
                        style="margin-left: 16px; text-decoration: none;">Change Profile</a>
                </div>

                <div>
                    <?php foreach ($queryUser as $result) :
                        $bioUser = $result['bio'];
                    ?>
                    <p style="margin-left: 60px"><?= $bioUser; ?></p>
                    <?php endforeach ?>
                </div>

                <div class="d-flex" style="margin-top: 60px">
                    <h5 style="margin-right: 16px;">Recent Tweets</h5>
                    <h5 style="margin-right: 16px;"> | </h5>
                    <h5 style="margin-right: 16px; color: #707070">Top Tweets</h5>
                </div>

                <?php foreach ($queryTweetUser as $result) :
                    $username = $result['username'];
                    $image = $result['image'];
                    $idTweets = $result['idTweets'];
                    $textTweets = $result['textTweets'];
                ?>
                <div>
                    <div class="d-flex" style="margin-top: 60px">
                        <img src="<?= $image; ?>" alt="" class="rounded-circle" width="40px" height="40px">
                        <p style="margin-left: 20px;"><?= $username; ?></p>
                    </div>

                    <?php foreach ($queryTweet as $key) : ?>
                    <div>
                        <img src="<?= $key['image']; ?>" alt="" style="width: 40px; height:40px;">
                        <input type="text" value="<?= $key['file']; ?>" disabled style="margin-top: 30px;">
                        <p style="margin-top: 20px;"><?= $key['textTweets']; ?></p>
                        <div class="d-flex">
                            <form action="function.php" method="POST">
                                <input type="hidden" id="idTweets" name="idTweets" value="<?= $result['idTweets']; ?>">
                                <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                                <button type="submit" class="btn btn-danger" name="cmd" id="cmd" value="deleteTweet"
                                    style="margin-right: 20px; margin-left: 20px;" </button>Delete Tweet</button>
                            </form>
                            <button type="submit" class="btn btn-danger" name="cmd" id="update" value="updateTweet"
                                onclick="edit(<?php echo "'$idTweets', '$textTweets'" ?>)">Update Tweet</button>
                        </div>

                        <form action="function.php" method="POST">
                            <input type="text" value="" style="display: none;" id="textTweets" name="textTweets">
                            <?php foreach ($queryTweetUser as $result) :
                                        $idTweets = $result['idTweets'];
                                    ?>
                            <input type="file" value="" style="display: none" id="fileTweets" name="fileTweets">
                            <input type="file" value="" style="display: none" id="imgTweets" name="imgTweets">
                            <input type="hidden" value="<?= $idTweets; ?>" id="idTweets" name="idTweets">
                            <?php endforeach ?>
                            <button id="buton" class="btn btn-danger" value="updateTweets" name="cmd"
                                style="display: none;">Update Tweets</button>
                        </form>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    function edit(idTweets, textTweets) {
        document.getElementById('textTweets').value = textTweets;
        document.getElementById('textTweets').style.display = "block";
        document.getElementById('imgTweets').style.display = "block";
        document.getElementById('fileTweets').style.display = "block";
        document.getElementById('buton').style.display = "block";
        document.getElementById('update').style.display = "none";
    }
    </script>

</body>

</html>