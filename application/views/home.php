<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<html>

<head>
    <title>MusicBuzz | Home</title>

    <link rel="stylesheet" href="/w1742286/css/homepage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    if (isset($this->session->username)) {
    ?>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <?php if ($userdata[0]->imgurl !== '') { ?>
                            <img class="profileimg" src="<?php echo $userdata[0]->imgurl ?>">
                        <?php } else { ?>
                            <img src="https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png" style="max-width: 90px; max-height: 90px; background-position: center center; background-repeat: no-repeat;">
                        <?php } ?>
                    </div>
                    <div class="col-5">
                        <h2 <?php if ($isHidden) echo 'hidden' ?>>Welcome to MusicBuzz <?php echo $userdata[0]->username ?>!</h2>
                        <h2 <?php if (!$isHidden) echo 'hidden' ?>> <?php echo $userdata[0]->username ?>'s Profile</h2>
                    </div>
                    <div class="col" <?php if (!$isHidden) echo 'hidden' ?>>
                        <form action="/w1742286/index.php/Profiles/follow" method="post">
                            <?php if (!$isFollowing) { ?>
                                <input type="hidden" name="followUser" value="<?php echo $userdata[0]->username ?>" />
                                <button type="submit" id="follow" class="btn btn-success">Follow</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin: 30px">
            <div class="row">
                <div class="col">
                    <div class="column side">
                        <div class="row" style="padding: 10px;">
                            <div class="col-sm">
                                <a href="/w1742286/index.php/Home">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                    </svg>Home</a>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <div class="col-sm">
                                <a href="/w1742286/index.php/Profiles">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>Search Users</a>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <div class="col-sm">
                                <a href="/w1742286/index.php/Communities">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                    </svg>Community</a>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <div class="col-sm">
                                <a href="/w1742286/index.php/Accounts/logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="column middle" <?php if ($isHidden) echo 'hidden' ?>>
                        <h4>Share your thoughts on Music today!</h4>
                        <form action="/w1742286/index.php/Posts/createPost" method="post">
                            <div class="form-group">
                                <label for="postcontent">Write here...</label>
                                <textarea class="form-control" id="postcontent" name="postcontent" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Post</button>
                        </form>
                    </div>
                    <?php
                    if ($posts !== null) {
                    ?>
                        <?php foreach ($posts as $post) { ?>
                            <div class="column middle">
                                <div class="row">
                                    <div class="col col-lg-2">
                                        <?php if ($post->imgurl !== '') { ?>
                                            <img src="<?= $post->imgurl ?>" style="height: 70px; width: 70px; background-position: center center; background-repeat: no-repeat;">
                                        <?php } else { ?>
                                            <img src="https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png" style="max-width: 70px; max-height: 70px; background-position: center center; background-repeat: no-repeat;">
                                        <?php } ?>
                                    </div>
                                    <div class="col-5">
                                        <p style="font-weight: bold;"> <?= $post->postAuthor ?> </p>
                                    </div>
                                    <div class="col">
                                        <p> <?= date("F j, g:i a", strtotime($post->postDate)) ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-2"></div>
                                    <div class="col">
                                        <p style="max-width: 100%; word-wrap:break-word;"> <?= auto_link($post->postContent) ?> </p>
                                        <?php if (preg_match_all('/\bhttps?:\/\/\S+(?:png|jpg)\b/', $post->postContent, $matches)) { ?>
                                            <?php foreach ($matches[0] as $match) { ?>
                                                <img src="<?= $match ?>" style="height: 100px; width: 150px">
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php
                    } else {
                    ?>
                        <div class="column middle">No posts to display.</div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col">
                </div>
            </div>
        </div>

    <?php

    } else {

    ?>
        <div>
            <a href="/w1742286/index.php/Accounts/register">Register</a>
        </div>
        <div>
            <a href="/w1742286/index.php/Accounts/login">Login</a>
        </div>

    <?php
    }
    ?>
</body>

</html>