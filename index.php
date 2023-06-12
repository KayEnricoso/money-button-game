<?php
    session_start();
    //Initialize variables
    if(!isset($_SESSION['money'])){
        $_SESSION['money'] = 500;
    }
    
    if(!isset($_SESSION['chances'])){
        $_SESSION['chances'] = 10;
    }

    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }

    date_default_timezone_set('Asia/Manila');
    $_SESSION['datetime'] = date('[m/d/y h:i A] ');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Money Button Game</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <h1>Your money: <?=$_SESSION['money']?></h1>
        <h2>Chances left: <?=$_SESSION['chances']?></h2>
        <form id="reset" action="process.php" method="POST">
            <input name="reset" type="submit" value="Reset Game"/>
        </form>
        <form class="bet" action="process.php" method="POST">
            <h3>Low Risk</h3>
            <input type="hidden" name="bet_type" value="low"/>
            <input name="low_bet" type="submit" value="Bet">
            <p>by -25 up to 100</p>
            <input name="class" type="hidden" value="class"/>
        </form>
        <form class="bet" action="process.php" method="POST">
            <h3>Moderate Risk</h3>
            <input type="hidden" name="bet_type" value="moderate"/>
            <input name="moderate_bet" type="submit" value="Bet">
            <p>by -100 up to 1000</p>
        </form>
        <form class="bet" action="process.php" method="POST">
            <h3>High Risk</h3>
            <input type="hidden" name="bet_type" value="high"/>
            <input name="high_bet" type="submit" value="Bet">
            <p>by -500 up to 2500</p>
        </form>
        <form class="bet" action="process.php" method="POST">
            <h3>Severe Risk</h3>
            <input type="hidden" name="bet_type" value="severe"/>
            <input name="severe_bet" type="submit" value="Bet">
            <p>by -3000 up to 5000</p>
        </form>
        <h4>Game Host:</h4>
        <div>
            <p><?=$_SESSION['datetime']?> Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money 500. Choose wisely and good luck!"</p>
<?php
    foreach($_SESSION['messages'] as $message){
?>              <p><?=$message?></p>     
<?php  }
?>
        </div>
    </body>
</html>