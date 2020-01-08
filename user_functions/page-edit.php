<?php

      //CHECK IF SESSION STARTED, ELSE START SESSION
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 

      //INCLUDE DEPENDENCIES
      include '../functions.php';
      include __DIR__ . '/../data/database_handler.php';


      //DEFAULT CLASSES TO TEST WITH
      $defaultClasses = "col-med-12 py-5 ";


      //SQL CONNECTION STRING FOR MENU ITEMS
      $menuItems = $conn->query("SELECT menu_text, menu_links FROM menu");

      //OPEN HTML
      htmlOpen();

      //SEND USER TO LOGIN IF USER IS NOT LOGGED IN
      if ($_SESSION["userLoggedIn"] == "") {
          
          header("Location: /user_functions/user-login.php");

      } 

      //LOAD ADMIN BAR IF USER IS LOGGED IN
      else {
          //OPEN USER BAR DIV
          adminBar();


      $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
      $stmt = $conn->query("SELECT * FROM posts WHERE pagetitle='{$url}' LIMIT 1");
      $post = $stmt->fetch();

      sectionOpen("w-100 container");
      divOpen("pt-2 row d-flex justify-content-center flex-column");
      divOpen("col-md-12 my-auto");
      h1("Edit Page: <i>{$post['pagetitle']}</i>", "py-3");
      echo "<form action='try-pageedit.php?={$url}' method='post'>";
      echo "<textarea id='summernote' name='body'>{$post['body']}</textarea>";
      divClose();
      divClose();
      divOpen("text-right py-3");
      echo "<button class='btn btn-primary' type='submit'>Submit Changes</button>";
      divClose();
      sectionClose();

      //INCLUDE SUMMERNOTE SCRIPT
      echo "<script>
      $('#summernote').summernote({
        tabsize: 2
      });
      </script>";

    }

?>