<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>

<div class="box registration">
    <form action="?r=registration" method="POST">
        <input name="fullName" placeholder="Full Name" type="text">
        <input name="email" placeholder="Email" type="email">
        <input name="password" placeholder="Password" type="password">
        <input name="phone" value="<?= isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '' ?>" placeholder="Phone">
        <button type="submit">Register</button>
    </form>
    <div class="errors">
        <ul>
            <?php if (!empty($errors)): foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="public/js/main.js"></script>
</html>