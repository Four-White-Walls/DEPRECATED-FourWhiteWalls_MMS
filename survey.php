<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 

     //PAGE INCLUDES
     include 'functions.php';
     include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

     //OPEN HTML
     htmlOpen();
 
    //RENDER ADMINBAR IF USER LOGGED IN
     if ($_SESSION['userLoggedIn'] == "true") {
         adminBar();
     }
 
     //Parse URL to request page w/ 
     $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
 
     //Request 
     $stmt = $conn->query("SELECT * FROM posts WHERE pagetitle='{$url}' AND current='true' LIMIT 1");
     $post = $stmt->fetch();
 
 
     //Redirect to 404 if the page is page.php
     if ($_SERVER['REQUEST_URI'] == "/page.php") {
         header("Location: 404.php");
     } 
     
     //Redirect to 404 if the page does not exist
     else if ($post == false) {
         header("Location: 404.php");
     } 
 
     //If pages exists and is a valid request, request post body
     else {
         sectionOpen("row d-flex justify-content-center p-5");
         divOpen("col-md-4 bg-light rounded p-5 border border-dark");
         h2("{$post['title']}", "py-3");
         echo "<form action='/user_functions/form-write.php?id={$url}' method='POST'>";
         echo $post['body'];
         echo "<button type='submit' class='btn btn-primary my-2'>Submit</button>";
         echo "</form>";

         divClose();
         
         sectionClose();
         
     }
 
     
     //CLOSE HTML
     htmlClose();
 
 
 


?>