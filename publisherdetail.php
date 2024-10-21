<?php


use App\Model\Pustaka\Publisher;
use App\View;


require_once 'vendor/autoload.php';


$publisher = new Publisher();
$publisher->detail(8);
View::json($publisher);