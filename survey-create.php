
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <style>
        #fb-editor, #fb-rendered-form {
          width: 50vw;
          margin: auto;
          padding-top: 50px;
        }
        
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
    </body>
</html>



<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

//PAGE INCLUDES
include 'functions.php';
include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

adminBar();
?>
<h1 id="form-title" style="display: none"></h1>
<div id="fb-editor">
<input type="text" id="formtitle"> Form Title</input>
</div>
<div id="fb-rendered-form" style="display: none">
  <form action="#"></form>
  
  <button class="btn btn-default edit-form">Edit</button>
</div>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/form-builder.js" type="text/javascript"></script>
<script src="js/form-render.js" type="text/javascript"></script>
<script src="js/survey-js.js" type="text/javascript"> </script>

<?php
htmlClose();
?>






