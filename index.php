<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php error_reporting(E_ALL); ?>
<html>
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
    <body class="container">
        <h1>Here is where you upload a json file</h1>

        <form   class="form-inline" action="insert.php" method="post"  id="form"enctype="multipart/form-data">
            <div class="form-group">
                <label>Please select a file to upload</label>
                <input type="file" class="form-control"  name="data" id="fileUpload">
            </div>

            <input type="hidden" name="summary" id="sum" >
            <input type="hidden" name="table" id="table">
            <input type="hidden" name="day-id"id="id">
            <input type="submit"  class="btn btn-default" id="submit" value="submit" name="submit">
        </form>
        <div class="col-md-6">
        <form  class="col-md-3"action="export.php" method="post" id="export-form">
            <input name="" type="hidden"/>
            <input type="submit" value="Export" class="btn btn-default" />
        </form>
        <a  href="/ANTTASK/list.php" class="col-md-3 btn btn-default">view the data</a>
        </div>
       
    </body>
</html>
