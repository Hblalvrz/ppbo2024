<?php
use App\Model\Pustaka\Publisher;
use App\View;


require_once 'vendor/autoload.php';


$publisher = new Publisher();
$publisher->id = 8;
$publisher->name = 'Penerbit Erlangga';
$publisher->phone = '081911500885';
$publisher->address = 'Jl. H. Baping Raya No. 100 Ciracas, Jakarta Timur 13740';
View::json($publisher->save());