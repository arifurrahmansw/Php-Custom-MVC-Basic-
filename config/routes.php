<?php

$routes = [
    '/' => 'HomeController@index',
    '/landing' => 'HomeController@index',
    '/contact' => 'ContactController@form', // Ensure this route exists
    '/contact/submit' => 'ContactController@submit' // If you're using a submission route
];
