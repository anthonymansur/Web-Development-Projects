<?php 
    $error = ""; $successMessage = "";
if($_POST){
    
    if(!$_POST["email"]){
        $error .= "The email field is required<br>";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "Your email address is not valid<br>"; 
        } 
    }
    
    if(!$_POST["subject"]){
      $error .= "The subject field is required<br>";
    }
    
    if(!$_POST["message"]){
        $error .= "The message field is required<br>";
    }
    
    if($error != ""){
        $error = "<div class=\"alert alert-danger\" role=\"alert\">"."<strong>There were error(s) in your form:</strong><br>".$error."</div>";
    }

    else {
        
        $emailTo = "contact@anthonysportfolio.com";
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $headers = "From: ".$_POST['email'];
        
        if(mail($emailTo, $subject, $message, $headers)){
            $successMessage = "<div class=\"alert alert-success\" role=\"alert\">Your message was sent, we/'ll get back to you ASAP!</div>";
        }
        else {
            $error = "<div class=\"alert alert-warning\" role=\"alert\">Your message has not been sent. Please try again later.</div>";
        }
        
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style type="text/css">

    </style>
</head>
<body>
    <div class="container">
        <h1>Get in touch!</h1>
        <div id="error"><? echo $error.$successMessage; ?></div>
        <form method="post">
            <div class="form-group">
                <label for="inputEmail">Email Address</label>
                <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" pla ceholder="example@domain.com">
                <small id="emailHelp" class="form-text text-muted">We don't sell your email to Russian hackers</small>
            </div>
            <div class="form-group">
                <label for="inputSubject">Subject</label>
                <input type="text" name="subject" class="form-control" id="inputSubject">
            </div>
            <div class="form-group">
                <label for="inputMessage">What would you like to ask us?</label>
                <textarea class="form-control" id="inputMessage" rows="5" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        
        $('form').submit(function(e) {            
            var statusMessage = "";
            var errorMessage = "<strong>There were error(s) in your form:</strong><br>";
            var errorStatus = false;
            
            $(".alert").alert();
            
            if(!isEmail($("#inputEmail").val())){
                errorMessage += "Your email address is not valid.<br>";  
                errorStatus = true;
            }
            
            if($("#inputEmail").val() == ""){
                errorMessage += "The email field is required.<br>"
                errorStatus = true;
            }
            
            if($("#inputSubject").val() == ""){
                errorMessage += "The subject field is required<br>";
                errorStatus = true;
            }
            
            if($("#inputMessage").val() == ""){
                errorMessage += "The message field is required<br>";
                errorStatus = true;
            }
            
            if(errorStatus){
                $("#error").html("<div class=\"alert alert-danger\" role=\"alert\">"+errorMessage+"</div>");
                return false;
            }
            else {
                return true;
            }
            
        });
        
           function isEmail(email) {
                var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                return regex.test(email);
            }
       
    </script>
</body>
</html>
