<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    include __DIR__ . '/../data/database_handler.php';

    //GET POST VARIABLES
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $website = $_POST['website'];
    $email = $_POST['email'];

    $url = substr($_SERVER[REQUEST_URI], strpos($_SERVER[REQUEST_URI], "=") + 1);

    $sql = "UPDATE members SET first_name=?, last_name=?, company_name=?, address=?, city=?, county=?, state=?, zip=?, phone1=?, phone2=?, website=?, email=? WHERE id={$url}";
    $conn->prepare($sql)->execute([$firstName, $lastName, $companyName, $address, $city, $county, $state, $zip, $phone1, $phone2, $website, $email]);

    header("Location: /../members.php");

?>