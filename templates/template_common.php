<?php 
    function draw_header($username, $subtitle) 
    { 
        if(!isset($_SESSION['username']))
        {
            $username = NULL;
            $points = 0;
        }
        else
            $points = getUserInfo($username)['points'];

?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Prayers R Us<?= $subtitle ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" media="screen" href="../styles/stylesheet.css" />
            <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
            <link rel="icon" href="../assets/logo.png" type="image/x-icon" />
        </head>

        <body>
            <header class="topnav" id="myTopnav">
                <a href="javascript:void(0);" class="icon" onclick="burger_menu()">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="../pages/initialPage.php" class="logo"> </a>            
                <a href="../pages/initialPage.php" class="button"><p>Home</p> </a>            
                <a href="../pages/fresh.php" class="button"><p>Fresh</p> </a>            
                <a href="../pages/categories.php" class="button"><p>Categories</p> </a>
                <div class="search-container">
                    <form method="post" action="../actions/search-bar.php">
                        <input type="text" placeholder="Search.." name="search" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <?php
                    if($username == null)
                    {
                ?>       
                        <a href="../pages/signup.php" class="button login-register"><p>Register</p> </a>         
                        <a href="../pages/login.php" class="button login-register"><p>Login</p> </a>  
                <?php
                    }
                    else
                    {
                ?>
                        <a href="../actions/logout.php" class="button login-register"><p>Logout</p> </a>
                        <a name="pontuation" class="button login-register">        
                            <?php drawPoints($points) ?>
                        </a>
                        <a href="../pages/user-posts.php?username=<?=$username?>" class="button login-register"><p>Hi, <?=$username?></p></a> 
                <?php
                    }
                ?>
            </header>
<?php 
    }
?>

<?php
    function drawPoints($points) 
    {
?>
        <p><?=$points?> point<?=$points==1?'':'s'?></p>
<?php
    }
?>

<?php 
    function print_messages() 
    { 
?>
    <?php if (isset($_SESSION['messages'])) { ?>
        <section>
            <?php foreach($_SESSION['messages'] as $message) { ?>
                <div class="message-log"><?=$message['content']?></div>
            <?php } ?>
        </section>
    <?php unset($_SESSION['messages']); } ?>
<?php 
    }
?>

<?php 
    function draw_footer() 
    { 
?>
            <footer>
                <div class="copywrite">
                    <span>All rights reserved to <a href="https://github.com/SantosAntero">Antero Santos™</a> <a href="https://github.com/EstevesAndre">André Esteves™</a> <a href="https://github.com/pedrogneto">Pedro Neto™</a></span>
                </div>
            </footer>
            <script src="../scripts/main.js"></script>
            <script src="../scripts/comments.js" defer></script>
            <script src="../scripts/publications.js" defer></script>
            <script src="../scripts/thumbs-up-down.js" defer></script>
            <script src="../scripts/un-subscribe.js" defer></script>
            <script src="../scripts/points.js" defer></script>
        </body>
    </html>
<?php 
    }
?>
