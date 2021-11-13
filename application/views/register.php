<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
    <title>MusicBuzz | Register</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <link rel="stylesheet" href="/w1742286/css/main.css">
</head>

<body>
    <div class="signup-form">
        <form action="/w1742286/index.php/Accounts/registerNewUser" method="post">
            <h2>Log In</h2>
            <?php if ($errorMessage) { ?>
                <p><?= $errorMessage ?></p>
            <?php } ?>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="firstName" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="lastName" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="userName" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="imgurl" placeholder="Insert Image URL" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <label>Select your favourite genre</label>
                <select name="genre" class="form-control">
                    <?php foreach ($genreList as $genre) { ?>
                        <option value="<?= array_search($genre, $genreList) ?>">
                            <?= $genre ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href="/w1742286/index.php/Accounts/login">Login here</a></div>
    </div>
</body>

</html>