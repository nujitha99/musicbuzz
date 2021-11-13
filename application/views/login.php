<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <title>MusicBuzz | Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/w1742286/css/main.css">

</head>

<body>
    <div class="signup-form">
        <form action="/w1742286/index.php/Accounts/authenticateLogin" method="post">
            <h2>Log In</h2>
            <?php if ($errorMessage) { ?>
                <p><?= $errorMessage ?></p>
            <?php } ?>
            <div class="form-group">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Log In</button>
            </div>
        </form>
        <p class="text-center">Don't have an account? <a href="/w1742286/index.php/Accounts/register">Create an Account</a></p>
    </div>
</body>

</html>