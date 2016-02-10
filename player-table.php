<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" content="text/html" http-equiv="content-type" />
    <title>Player Table</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<main class="container">
    <h1>NBA Player Table</h1>

    <a href="player.php">Create a new entry</a>

    <?php
    //connect to db
    $conn = new PDO('mysql:host=sql.computerstudi.es; dbname=gc200323449', 'gc200323449', 'nTuWa7ZS');

    //access relevant sql db
    $sql = "SELECT * FROM player";

    //create a cmd object to link the php with sql and run it
    $cmd = $conn -> prepare($sql);
    $cmd -> execute();

    //store the results in an array
    $playerdata = $cmd -> fetchAll();

    //start an table table
    echo '<table class="table"><th>Name</th><th>Height</th><th>Position</th><th>Games Played</th>
    <th>Points</th><th>Rebounds</th><th>Assists</th><th>Email</th><tbody>';

    //loop through the array while displaying each result in relevant row of table
    foreach ($playerdata as $tablevalue) {
        echo '<tr><td>'. $tablevalue['name'] . '</td>
        <td>'. $tablevalue['height'] . '</td>
        <td>'. $tablevalue['position']. '</td>
        <td>'. $tablevalue['gamesPlayed']. '</td>
        <td>'. $tablevalue['points']. '</td>
        <td>'. $tablevalue['rebounds']. '</td>
        <td>'. $tablevalue['assists']. '</td>
        <td>'. $tablevalue['email'].'</td></tr>';
    }

    //close table
    echo '</tbody></table>';

    //disconnect
    $conn = null;

    ?>
</main>
</body>
</html>