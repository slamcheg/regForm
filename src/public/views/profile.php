<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>
<div class="box profile">
    <h2>Registration Success</h2>
    <div class="field">
        <label>Full Name : </label>
        <span><?= isset($_COOKIE['fullName']) ? $_COOKIE['fullName'] : '' ?></span>
    </div>
    <div class="field">

        <label>Email : </label>
        <span><?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?></span>
    </div>
    <div class="field">
        <label>Phone : </label>
        <span><?= isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '' ?></span>
    </div>
    <div class="field">
        <label>Password : </label>
        <span><?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?></span>
    </div>

    <a class="logout" href="/?r=logout">Logout</a>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="public/js/main.js"></script>
</html>