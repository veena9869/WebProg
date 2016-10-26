<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>ThronesRealm</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="logForm.php">Login/Register</a></li>
            <li><a href="tagDisplay.php">Questions</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>ThronesRealm.com</h1>
          </div>

    

<div class="panel panel-primary">
  <div class="panel-body">
    <div class="row">
      <div class="col-md-3">

       <?php
        if($_SESSION['logged_in'] and $_SESSION['username'] == "ADMINISTRATOR")
        {
          echo 'Logged in as: <mark>' . $_SESSION['username'] . '</mark><br><a href="logOut.php">Log out</a>';
        }
        else if ($_SESSION['logged_in'])
        {
           echo 'Logged in as: <p class="text-info">' . $_SESSION['username'] . '</p><a href="logOut.php">Log out</a>';
        }
        else
        {}
      ?>
      <br>
      <br>

      <p><a class="btn btn-primary btn-lg" href="submitQuestion.php" role="button">Create Question</a></p>

        <form>
          <div class="search box">
            <label class="sr-only" >user name live search</label>
                <div class="input-group">
                  <div class="input-group-addon">Search:</div>
                  <input type="text" class="form-control" id="keyword" placeholder="Handle">
                </div>
          </div>
        </form>

        <ul  id="searchBar" ></ul>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script type="text/javascript">
        $(document).ready(function() {
          $('#keyword').on('input', function()
          {
            var searchKeyword = $(this).val();
            if (searchKeyword.length >= 1 )
            {
              $.post('userLiveSearch.php', { keywords: searchKeyword }, function(data) {
                $('ul#searchBar').empty()
                $.each(data, function()
                {
                  $('ul#searchBar').append('<u><a href="searchProfile.php?searchname=' + this.name + '">' + this.name + '</a></li></u><p>  </p>');

                });
              }, "json");
            }

            
            else if (searchKeyword.length == 0 )
            {
              $.post('userLiveSearch.php', { keywords: searchKeyword }, function(data) {
                $('ul#searchBar').empty()
                $.each(data, function()
                {

                  $('ul#searchBar').append('');

                });
              }, "json");

            }
            
            else if (searchKeyword.length > 7 )
            {
              $('ul#searchBar').append('No match');

            }
          });
        });
        </script>

      </div>



      <div class="col-md-6">

      
      <table class="table table-striped table-hover">
          <thead>
            <tr>

            <th>Title</th>

            <th>Asker</th>

            <th>Value</th>

            

            </tr>
          </thead>
          <tbody>
            <?php

              include_once 'Db_Config.php';
              
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT *  FROM question
                      ORDER BY q_value DESC LIMIT 5";
              $result = $conn->query($sql);

              while($row = mysqli_fetch_array($result))
                {
                  echo '<tr><td><a href="conversation.php?var=' . $row['q_id'] . '">' . $row['q_title'] .
                  '</a></td><td>' . $row['q_asker'] . '</td><td>' . $row['q_value'] . '</td><td>' ;
                }

                 mysqli_close($conn);
            ?>
          </tbody>
          </table>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </div>
    </div>
            </div>
          </div>
        </div>
            </div>
  </body>
</html>
