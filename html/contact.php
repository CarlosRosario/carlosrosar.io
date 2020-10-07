<?php
    $error = "";
    $successMessage = "";
    
    if(isset($_POST["email"]) || isset($_POST["message"]) || isset($_POST["fullname"])){
        if(!$_POST["email"]){
            $error .= "Oops! An email address is required <br>";
        }

        if(!$_POST["message"]){
            $error .= "Oops! A message is required <br>";
        }

        if(!$_POST["fullname"]){
            $error .= "Oops! your name is required<br>";
        }

        if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "Invalid email format <br>"; 
        }

        if($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' .$error. '</div>';
        } else {

            $emailTo = "carlos.rosario1990@gmail.com";
            $subject = "Message from carlosrosar.io from " . $_POST["fullname"];
            $content = "From: " . $_POST["email"] . "\r\n" . $_POST["message"];
            //$headers = "From: ".$_POST['email'];
            $headers = "From: carlqejt@carlosrosar.io";

            if(mail($emailTo, $subject, $content, $headers)){
                $response_array = array();
                $response_array['status'] = 'success';
                header("Content-Type: application/json; charset=utf-8", true);
                echo json_encode($response_array);
            } else {
                $response_array = array();
                $response_array['status'] = 'error';
                header("Content-Type: application/json; charset=utf-8", true);
                echo json_encode($response_array);
            }
        }    
    }
?>
