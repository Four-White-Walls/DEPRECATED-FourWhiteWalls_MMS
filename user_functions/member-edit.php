<?php

        //CHECK IF SESSION STARTED, ELSE START SESSION
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        //INCLUDE DEPENDENCIES
        include '../functions.php';
        include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';



        //DEFAULT CLASSES TO TEST WITH
        $defaultClasses = "col-med-12 py-5 ";


        //SQL CONNECTION STRING FOR MENU ITEMS
        $menuItems = $conn->query("SELECT menu_text, menu_links FROM menu");

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


        $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
        $stmt = $conn->query("SELECT * FROM members WHERE id='{$url}' LIMIT 1");
        $member = $stmt->fetch();

        sectionOpen("text-center");
        divOpen("pt-2");
        h1("Edit", "py-3" );
        echo "<form action='try-edit.php?={$url}' method='post'>";
        divOpen("col-md-12 row");
        divOpen("d-flex flex-column col-md-6");
        echo "<label>First Name</label>";
        echo "<input name='firstName' value='{$member['first_name']}'></input>";
        echo "<label>Last Name</label>";
        echo "<input name='lastName' value='{$member['last_name']}'></input>";
        echo "<label>Company Name</label>";
        echo "<input name='companyName' value='{$member['company_name']}'></input>";
        echo "<label>Address</label>";
        echo "<input name='address' value='{$member['address']}'></input>";
        echo "<label>City</label>";
        echo "<input name='city' value='{$member['city']}'></input>";
        echo "<label>County</label>";
        echo "<input name='county' value='{$member['county']}'></input>";
        divClose();
        divOpen("d-flex flex-column col-md-6");
        echo "<label>State</label>";
        echo "<input name='state' value='{$member['state']}'></input>";
        echo "<label>Zip</label>";
        echo "<input name='zip' value='{$member['zip']}'></input>";
        echo "<label>Phone 1</label>";
        echo "<input name='phone1' value='{$member['phone1']}'></input>";
        echo "<label>Phone 2</label>";
        echo "<input name='phone2' value='{$member['phone2']}'></input>";
        echo "<label>Email</label>";
        echo "<input name='email' value='{$member['email']}'></input>";
        echo "<label>Website</label>";
        echo "<input name='website' value='{$member['website']}'></input>";
        divClose();
        divClose();
        divClose();
        divOpen("pull-right");
        echo "<button class='btn btn-primary my-5' type='submit'>Submit Changes</button>";
        divClose();
        sectionClose();

        }

?>