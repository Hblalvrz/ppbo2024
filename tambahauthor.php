<?php
use App\Model\Pustaka\Author;
use App\View;


require_once 'vendor/autoload.php';


$author = new Author();
$author->id = 11;
$author->name = 'Habiel Alvarezi';
$author->description = 'Penulis pemula yang menyukai hal terkait teknologi.';
View::json($author->save());