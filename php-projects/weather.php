<?php
    
$page = "";
$alert = "";
$city = "";
    if($_GET){ 
        $city = $_GET['city'];
        $city = trim($city);
        $city = str_replace(' ', '-', $city);
        $file = "https://www.weather-forecast.com/locations/".$city."/forecasts/latest";
        $file_headers = @get_headers($file);
        $exists = true;
        if ($file_headers[0] == 'HTTP/1.1 404 Not Found'){
            $exists = false;
        }
        if ($exists){
        $page = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest"); 

        $pageArray = explode('</h2>(1&ndash;3 days)</span><p class="b-forecast__table-description-content">', $page);
                             
        $secondPageArray = explode('</p></td><td colspan="9"><span class="b-forecast__table-description-title"><h2>', $pageArray[1]);
                             
        $alert = "<div class=\"alert alert-success\" role=\"alert\">".$secondPageArray[0]."</div>";
        } else {
            $alert = "<div class=\"alert alert-danger\" role=\"alert\">"."<strong>Error:</strong> Please try typing the city again"."</div>";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style type="text/css">
        body{
            background: url("benjamin-davies-272024.jpg") no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        
        .jumbotron {
            
            background: none;
            
        }
    </style>
    <title>Weather Scraper</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="jumbotron text-center">
              <h1 class="display-4">Find The Local Weather</h1>
              <p class="lead">Type the city you are looking for</p>
              <hr class="my-4">
              <form  class="input-group" method="get">
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="e.g. Dubai, San Francisco" name="city">
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" val>Search</button>
                  </div>
                </form>
                <br>
                <? echo $alert ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
