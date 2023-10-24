<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Multiple Checkboxes - Pizza Toppings</title>
</head> 

<body class="center">
    <main>
        <p><img src="img/pizza.png" height="72" width="72" title="Pizza Toppings"></p>
        <?php

session_start();

require 'inc/header.php';

require 'inc/functions.php';

$pizza_toppings = [
	'pepperoni' => 0.5,
	'mushrooms' => 1,
	'onions' => 1.5,
	'sausage' => 2.5,
	'bacon' => 1.0,
];

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
	require 'inc/get.php';
} elseif ($request_method === 'POST') {
	require 'inc/post.php';
}

require 'inc/footer.php';
