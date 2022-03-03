<?php

// This file is your starting point (= since it's the index)

// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function pre_r( $products )  // Super Gobal Variable ARRAY
{     
    echo '<pre>';
    print_r($products);
    echo '</pre>'; 
}

pre_r($_POST); // Calling SuperGlobal  $_POST

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
whatIsHappening();

// TODO: provide some products (you may overwrite the example)
$games = [
    ['name' => 'World of Warcraft', 'price' => 14.5],
    ['name' => 'Rocket League', 'price' => 30],
    ['name' => 'Call of Duty', 'price' => 65],
    ['name' => 'Age of Empires 3', 'price' => 20],
    ['name' => 'Pong Arcade', 'price' => 7],
];

$products = $games;

$totalValue = 0;

function validate()
{
    // This function will send a list of invalid fields back
    $email = $_POST['email']??''; // create POST Variables
    $street = $_POST['street']??'';
    $streetNum = $_POST['streetnumber']??'';
    $city = $_POST['city']??'';
    $zipCode = $_POST['zipcode']??'';

    $errors = []; // create an Empty array for errors

    // TODO find a way to display errors in field
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($email))
        {
            $emailError = ' Please fill in Email. ';
            
            $errors = $emailError;
            echo $errors;
        }  
    }
  
  
    return $errors;
}


function handleForm()
{
    // TODO: form related tasks (step 1)
   
    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}
handleForm($products, $totalValue);

// TODO: replace this if by an actual check
$formSubmitted = !empty($_POST);
$_SESSION = $_POST;
if ($formSubmitted) {
    handleForm($products, $totalValue);
}

require 'form-view.php';