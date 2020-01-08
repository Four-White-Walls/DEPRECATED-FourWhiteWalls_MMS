<?php

        //CHECK IF SESSION STARTED, ELSE START SESSION
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        //INCLUDE DEPENDENCIES
        include '../functions.php';


        //DEFAULT CLASSES TO TEST WITH
        $defaultClasses = "col-med-12 py-5 ";

        //OPEN HTML
        htmlOpen( );

        //SEND USER TO LOGIN IF USER IS NOT LOGGED IN
        if ($_SESSION["userLoggedIn"] == "") {
            
            header("Location: /user_functions/user-login.php");

        } 

        //LOAD ADMIN BAR IF USER IS LOGGED IN
        else {
            //OPEN USER BAR DIV
            adminBar();

        //RENDER CREATE MEMBER FORM
        sectionOpen("text-center");
        divOpen("pt-2");
        h1("Edit", "py-3" );
        echo "<form action='try-createmember.php?' method='post'>";
        divOpen("col-md-12 row");
        divOpen("d-flex flex-column col-md-6");
        echo "<label>First Name</label>";
        echo "<input name='firstName'></input>";
        echo "<label>Last Name</label>";
        echo "<input name='lastName'></input>";
        echo "<label>Company Name</label>";
        echo "<input name='companyName'></input>";
        echo "<label>Address</label>";
        echo "<input name='address'></input>";
        echo "<label>City</label>";
        echo "<input name='city'></input>";
        echo "<label>County</label>";
        echo "<input name='county'></input>";
        divClose();
        divOpen("d-flex flex-column col-md-6");
        echo "<label>State</label>";
        echo "<input name='state'></input>";
        echo "<label>Zip</label>";
        echo "<input name='zip'></input>";
        echo "<label>Phone 1</label>";
        echo "<input name='phone1'></input>";
        echo "<label>Phone 2</label>";
        echo "<input name='phone2'></input>";
        echo "<label>Email</label>";
        echo "<input name='email'></input>";
        echo "<label>Website</label>";
        echo "<input name='website'></input>";
        divClose();
        divClose();
        divClose();
        divOpen("pull-right");
        echo "<button class='btn btn-primary my-5' type='submit'>Submit Changes</button>";
        divClose();
        sectionClose();

        }

?>