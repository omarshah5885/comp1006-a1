<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NBA Player Profile</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
    <main class="container">
         <h1>Player Entry Form</h1>

        <a href="player-table.php">View Existing List</a>
                <form method="post" action="player-save.php">
            <fieldset>
                <label class="col-sm-2">Name:</label>
                <div class="form-group">
                <input name="name" required="required" />*
                </div>
            </fieldset>
            <fieldset>
                <label class="col-sm-2">Height:</label>
                <div class="form-group">
                <input name="height" required="required" />*
                </div>
            </fieldset>
            <fieldset>
                <label class="col-sm-2">Position:</label>
                <div class="form-group">
                <select name="position" required="required">
                    <?php
                    //connect to database
                    $conn = new PDO('mysql:host=sql.computerstudi.es; dbname=gc200323449', 'gc200323449', 'nTuWa7ZS');

                    //access relevant sql query
                    $sql = "SELECT positionType FROM positions";

                    //set a command object to allow for the transfer b/w network
                    $cmd = $conn -> prepare($sql);

                    //run the query
                    $cmd -> execute();

                    //store the results in an array
                    $dropdown = $cmd -> fetchAll();

                    //loop through the array and populate dropdown options one-by-one with position data
                    foreach ($dropdown as $positionvalue) {
                        echo '<option>' . $positionvalue['positionType'] . '</option>';
                    }

                    //disconnect from db
                    $conn = null;

                    ?>


                </select>*
                </div>
            </fieldset>

            <fieldset>
                <label class="col-sm-2">Games Played:</label>
                <div class="form-group">
                <input name="gamesplayed" type="number" required="required" />*
                </div>
            </fieldset>
            <fieldset>
                <label class="col-sm-2">Points:</label>
                <div class="form-group">
                <input name="points" type="number" step="0.1" required="required" />
                </div>
            </fieldset>
            <fieldset>
                <label class="col-sm-2">Rebounds:</label>
                <div class="form-group">
                <input name="rebounds" type="number" step="0.1" required="required" />*
                </div>
            </fieldset  >
            <fieldset>
                <label class="col-sm-2">Assists:</label>
                <div class="form-group">
                <input name="assists" type="number" step="0.1" required="required" />*
                </div>
            </fieldset>
            <fieldset>
                <label class="col-sm-2">Email:</label>
                <div class="form-group">
                <input name="email" type="email" required="" />*
                </div>
            </fieldset>

            <p>* = manditory fields</p>

            <button class="btn btn-primary col-sm-offset-2">Submit</button>

        </form>
    </main>
    </body>

</html>