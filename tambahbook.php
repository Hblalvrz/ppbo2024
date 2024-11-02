<?php


use App\Model\Pustaka\Book;
use App\View;


require_once 'vendor/autoload.php';




$book = new Book();
$book->id = $_POST['id'];
$book->isbn = $_POST['isbn'];
$book->title = $_POST['title'];
$book->description = $_POST['description'];
$book->language = $_POST['language'];
$book->numberOfPage = $_POST['numberOfPage'];
$book->id_category = $_POST['id_category'];
$book->id_publisher = $_POST['id_publisher'];
$book->id_author = $_POST['id_author'];
View::json($book->save());