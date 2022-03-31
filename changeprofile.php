<?php
session_start();
$username = $_SESSION['username'];
$image = $_SESSION['image'];

include "connection.php";
$sqlUser = "SELECT * FROM tbuser WHERE username LIKE '$username'";
$queryUser = mysqli_query($conn, $sqlUser);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Twitter</title>
</head>

<body class="bg-dark text-light">
    <nav class="navbar navbar-light bg-dark">
        <div class="container text-light">
            <a class="navbar-brand" href="#" style="display: flex; justify-content:center; align-items:center;">
                <img src="<?= $image; ?>" alt="" class="rounded-circle" style="margin-right: 20px;">
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
                    <img src="<?= $image; ?>" alt="" class="rounded-circle" width="40px" height="40px">
                    <p style="margin-left: 20px;"><?= $username; ?></p>
                </div>


                <form action="function.php" method="POST">
                    <div class="d-flex flex-column mt-4">
                        <?php foreach ($queryUser as $key) :
                            $id = $key['id'];
                        ?>
                            <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                        <?php endforeach ?>
                        <span>Change Profile Picture :</span>
                        <input type="file" name="image" id="image">
                        <span>Bio :</span>
                        <input type="text" class="form-control" name="bio" id="bio">
                        <button type="submit" value="updateProf" name="cmd" id="cmd" class="btn btn-danger mt-5">Change Profile</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>