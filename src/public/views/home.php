<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>

<div class="box phone">
    <input type="tel" placeholder="Phone number" id="phone" value="+380">
    <button type="submit" id="sendPhone">Send</button>

</div>

<div class="box code">
    <input type="text" placeholder="Code" id="authCode">
    <button type="submit" id="sendCode">Confirm</button>
    <a class="repeatCode">Send code again?</a>
</div>

<div class="notification">
    <span class="text"></span>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="public/js/main.js"></script>
</html>