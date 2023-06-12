<?php
session_start();
//Define an array with the different betting ranges to minimize using if/else statements
$bet_range = array(
    'low' => rand(-25, 100),
    'moderate' => rand(-100, 1000),
    'high' => rand(-500, 2500),
    'severe' => rand(-3000, 5000)
);

//Loop through the betting ranges in index.php
foreach($bet_range as $bet => $range){
    //Check which bet_type is clicked
    if (isset($_POST['bet_type']) && $_POST['bet_type'] == $bet) {
        //Check if the user has remaining chances and money
        if ($_SESSION['chances'] > 0 && $_SESSION['money'] > 0) {
            $_SESSION['bet'] = $bet;
            $_SESSION['chances'] = $_SESSION['chances'] - 1;
            $_SESSION['winnings'] = $range;
            $_SESSION['class'] = ($_SESSION['winnings'] > 0) ? 'win' : 'lose';
            $_SESSION['money'] = $_SESSION['money'] + $_SESSION['winnings'];
            $message = "<p class='" . $_SESSION['class'] . "'>" . $_SESSION['datetime'] . " You pushed " . $bet . ". Value is " . $_SESSION['winnings'] . ". Your current money now is " . $_SESSION['money'] . " with " . $_SESSION['chances'] . " chance(s) left.</p>";
            array_push($_SESSION['messages'], $message);
        } else {
            //if the user has no remaining chances or money
            $message = "GAME OVER!";
            array_push($_SESSION['messages'], $message);
        }
    }
}
header("Location: index.php");



if (isset($_POST['reset'])) {
    $_SESSION['chances'] = 10;
    $_SESSION['money'] = 500;
    $_SESSION['messages'] = array();

    header("Location: index.php");
    exit();
}
?>