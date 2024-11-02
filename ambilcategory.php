<?php

use App\Model\Pustaka\Category;
use App\View;


require_once 'vendor/autoload.php';


$category = Category::all();
View::json($category);