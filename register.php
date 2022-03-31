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

<body style="overflow: hidden;">
    <div class="row">
        <div class="col">
            <img src="https://source.unsplash.com/800x657?social-media" alt="">
        </div>

        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 18rem; margin-top: 160px;">
                <form action="regis.php" method="POST">
                    <div class="card-body">
                        <span>Username</span>
                        <input type="text" class="form-control" id="username" name="username">
                        <span>Email</span>
                        <input type="email" class="form-control" id="email" name="email">
                        <span>Password</span>
                        <input type="password" class="form-control" id="password" name="password">
                        <button class="btn btn-primary mt-2 " type="submit" style="width: 100%;">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>