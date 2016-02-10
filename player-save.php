<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8"; http-equiv="content-type">
    <title>Player Saved Info</title>
</head>
<body>
<?php

//store form inputs in as variables
$name = $_POST['name'];
$height = $_POST['height'];
$position = $_POST['position'];
$gamesplayed = $_POST['gamesplayed'];
$points = $_POST['points'];
$rebounds = $_POST['rebounds'];
$assists = $_POST['assists'];
$email = $_POST['email'];

//input validation
$ok = true;

if ( empty($name) || is_numeric($name) ) {
    $ok = false;
    echo 'please enter in a valid name <br>';
}

if ( empty($height) ) {
    $ok = false;
    echo 'please enter height as: foot-inches e.g., 5-9 <br>';
}

if ( empty($position) ) {
    $ok = false;
    echo 'position dropdown requires selection <br>';
}

if ( empty($gamesplayed) || !is_numeric($gamesplayed) || $gamesplayed < 0 ) {
    $ok = false;
    echo 'please enter games played <br>';
}

if ( empty($points) || !is_numeric($points) || $points < 0 ) {
    $ok = false;
    echo 'please enter in points per game <br>';
}

if ( empty($rebounds) || !is_numeric($rebounds) || $rebounds < 0 ) {
    $ok = false;
    echo 'please enter in rebounds per game <br>';
}

if ( empty($assists) || !is_numeric($assists) || $assists < 0 ) {
    $ok = false;
    echo 'please enter in assists per game <br>';
}


if ( empty($email)) {
    $ok = false;
    echo 'please enter a valid email';
}





//run following code if input is validated
if ($ok == true) {

//connect to db
    $conn = new PDO('mysql:host=sql.computerstudi.es; dbname=gc200323449', 'gc200323449', 'nTuWa7ZS');

//setup an SQL query to populate db and create placeholders for variables so as to prevent sql injection and to set datatypes
    $sql = "INSERT INTO player (name, height, position, gamesPlayed, points, rebounds, assists, email) VALUES (:name, :height, :position, :gamesplayed, :points, :rebounds, :assists, :email)";

//populate placeholder values with variables by creating a php command object to link back to sql and using bindParam function
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 20);
    $cmd->bindParam(':height', $height, PDO::PARAM_STR, 6);
    $cmd->bindParam(':position', $position, PDO::PARAM_STR, 14);
    $cmd->bindParam(':gamesplayed', $gamesplayed, PDO::PARAM_INT);
    $cmd->bindParam(':points', $points, PDO::PARAM_INT);
    $cmd->bindParam(':rebounds', $rebounds, PDO::PARAM_INT);
    $cmd->bindParam(':assists', $assists, PDO::PARAM_INT);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 30);

//run query
    $cmd->execute();

//email user a cofirmation message
    mail($email, 'php email', 'Your entry has been saved in our db. Visit http://gc200323449.computerstudi.es/comp1006/a1/player-table.php to see the full list of player.', 'From:umar.shah@mygeorgian.ca');

//display confirm message
    echo 'Information has been successfully stored in player profile DB. A confirmation email has been sent to your inbox.' .
        '<p><a href="http://gc200323449.computerstudi.es/comp1006/a1/player.php">Enter another player</a></p>';

//disconnect
    $conn = null;

}

?>

</body>
</html>