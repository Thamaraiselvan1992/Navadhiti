<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <style>
      .error{
        color:red;
      }
    </style>

   <div class="mt-5 text-center">
    <a target="_blank" href="https://www.navadhiti.com/">
       <img src='https://www.navadhiti.com/assets/img/logo-small.svg'>
     </a>
     <br>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<div class="text-center pt-5">Successfully your form Submitted <a href="index.php"> Home</a>';
}?>
