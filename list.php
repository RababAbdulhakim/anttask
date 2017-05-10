
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="ajax.js"></script>
        <meta charset="UTF-8">
        <title>

        </title>
    </head>
<div class="container">
    <a class=" btn btn-default"href="/ANTTASK/index.php"> Go Back</a>
    <h1>view the data</h1>
     <?php
        include 'init.php';
        $sql = "SELECT * FROM `dayes`";
        $result = mysqli_query($conn, $sql);

        $rows = mysqli_fetch_all($result);
        ?>

        <table class="table ajaxload">
            <thead>
                <tr>
                    <th>day</th>
                    <th>summary</th>
                    <th>table</th>
                    <th>data</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($rows as $row) {
    //could not convert the array from index to assosiative 
    ?>

                    <tr>
                        <td><?php echo($row[1]); ?></td>
                        <td><?php echo($row[2]); ?></td>
                        <td><?php echo($row[3]); ?></td>
                        <td><?php
 
                        
                        
                        foreach (json_decode($row[4])as $value) {
                            
                            //getting the date of all the dates in the array and converting them to local date
$datetime=date_create();
$sunrisedate=date_create();
$sunsetdate=date_create();
$temptimenimdate=date_create();
$temptimemaxdate=date_create();

$time=date_timestamp_set($datetime,$value->time );
$sunrise=date_timestamp_set($sunrisedate,$value->sunriseTime );
$sunset=date_timestamp_set($sunsetdate,$value->sunsetTime  );
$temptimenim=date_timestamp_set($temptimenimdate, $value->temperatureMinTime );
$temptimemax=date_timestamp_set($temptimemaxdate,$value->temperatureMaxTime );

                    echo "<ul>";
                    echo("<li> time:<b>" .  date_format($datetime," Y-m-d H:i:s"). "</b></li>");
                    echo("<li>summary:" . $value->summary . "</li>");
                    echo("<li>icon: " . $value->icon . "</li>");
                    echo("<li>sunrise time:<b> " . date_format($sunrisedate," Y-m-d H:i:s"). "</b></li>");
                    echo("<li>sunset time:<b> " . date_format($sunsetdate," Y-m-d H:i:s").  "</b></li>");
                    echo("<li>min temprature: "  .$value->temperatureMin. "</li>");
                    echo("<li>min temprature time: <b>" . date_format($temptimenimdate," Y-m-d H:i:s"). "</b></li>");
                    echo("<li>max temprature: " .  $value->temperatureMax. "</li>");
                    echo("<li>max temprature time: <b>" .  date_format($temptimemaxdate," Y-m-d H:i:s") . "</b></li>");
                    echo "</ul>";
                }
    ?></td>

                    </tr>
                        <?php } ?>
            </tbody>
        </table>
<?php
?>

<?php
mysqli_close($conn);
?>
        <form action="export.php" method="post" id="export-form">
            <input name="" type="hidden"/>
            <input type="submit" value="Export" class="btn btn-default" />
        </form>
    
</div>