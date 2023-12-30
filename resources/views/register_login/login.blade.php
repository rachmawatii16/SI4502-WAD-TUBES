<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="stylesheet" href="style.css">
</head>
<body class="background">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card px-5 py-5">
                    <h3 class="text-center">Login</h3><br>
<!-- php -->
                    <form method="post" action="">
                        <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Username" required>
                        <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" required>
                        <label>
                             <input type="checkbox">Remember me</input>
                        </label>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-danger w-100">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text center">Don't have an account? <a href="/">Register here</a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>