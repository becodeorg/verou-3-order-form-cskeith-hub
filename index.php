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
//whatIsHappening();

// TODO: provide some products (you may overwrite the example)

$products = [
    ['name' => 'World of Warcraft', 'price' => 14.5],
    ['name' => 'Ark', 'price' => 30], 
    ['name' => 'Call of Duty', 'price' => 60],   

];

$items = $_POST['products'];

foreach($items as $key => $item)
{
    // var_dump($items); // gives full array * items
    //var_dump($key); // gets array position of an item
   //var_dump($item); // give value of item (checked in the check box)
    var_dump($products[$key]['name']); // give array out  selected games 
}



$totalValue = 0;





function validate()
{
    // This function will send a list of invalid fields back
    $errors = [] ;
    $confirm = [] ;
    // TODO find a way to display errors in field
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST['email'] ))
        {
            $emailError = ' Please fill in Email. ';
            $errors = $emailError;
            return $errors;
        } 
        else
        {
            $email = $_POST['email'];
            $confirm = $email;
            return $confirm;
        }

        if(empty($_POST['street']))
        {
            $streetError = ' Please fill in Street name. ';
            $errors = $streetError;
            return $errors;
        } 
        else
        {
            $street = $_POST['street'];
            $confirm = $street;
            return $confirm;
        }
    }
      
}

function handleForm()
{
    // TODO: form related tasks (step 1)
    $message = 'Your order will be send to:';
    
    return $message;
    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = !empty($_POST);
if ($formSubmitted) {
    $message = handleForm();
    $emailConfirm = $_POST['email'];
    $streetConfirm = $_POST['street'];
    $streetNumberConfirm = $_POST['streetnumber'];
    $cityConfirm = $_POST['city'];
    $zipCodeConfirm = $_POST['zipcode'];
}



require 'form-view.php';