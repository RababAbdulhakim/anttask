<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'init.php';

$file = file_get_contents("week-data.json");

$trim = trim($file);
$f = json_decode($file, true);

for ($i = 0; $i < count($f); $i++) {

    for ($d = 1; $d <= count($f['daily']); $d++) {
        // var_dump($f['daily']["day-" . $d]['data']);
          //in the commented code tried to change the keys of the arrayso that the resultes from the database would be associative array instead of a numeric array
        //  but the results wew null I have also tried array_combine
        

$f['daily']["day-" . $d] = array(
        'summary'=> $f['daily']["day-" . $d]['summary'],
        'data' => $f['daily']["day-" . $d]['data'],
        'table' => $f['daily']["day-" . $d]['table'],
        'day-id' => $d,
        
    );  

        $_POST['summary'] = $f['daily']["day-" . $d]['summary'];
        $_POST['data'] = json_encode($f['daily']["day-" . $d]['data']);
        $_POST['table'] = $f['daily']["day-" . $d]['table'];
        $_POST['day-id'] = $d;
        $sql = "INSERT INTO dayes (`day-id`, `summary`, `table`, `data`)
       VALUES ('" . $_POST['day-id'] . "', '" . $_POST['summary'] . "','" . $_POST['table'] . "','" . $_POST['data'] . "')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}