<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Book extends Model
{
    public int $id;
    public string $isbn;
    public string $title;
    public string $description;
    public string $language;
    public int $numberOfPage;
    public int $id_category;
    public int $id_publisher;
    public int $id_author;

    public ?string $categoryName;
    public ?string $publisherName;
    public ?string $authorName;

    public function save()
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO book (id, isbn, title, description, language, numberOfPage, id_category, id_publisher) 
                                      VALUES (:id, :isbn, :title, :description, :language, :numberOfPage, :id_category, :id_publisher)");

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':isbn', $this->isbn);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':language', $this->language);
            $stmt->bindParam(':numberOfPage', $this->numberOfPage);
            $stmt->bindParam(':id_category', $this->id_category);
            $stmt->bindParam(':id_publisher', $this->id_publisher);

            $status = $stmt->execute();

            $stmt = $this->db->prepare("INSERT INTO book_author (id_book, id_author) VALUES (:id_book, :id_author)");
            $stmt->bindParam(':id_book', $this->id);
            $stmt->bindParam(':id_author', $this->id_author);
            $stmt->execute();

            $this->db->commit();

            $result = [
                'status' => $status,
                'id' => $this->id
            ];
        } catch (\PDOException $e) {
            $this->db->rollBack();
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }

    public static function all(): array
    {
        $books = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT book.*, 
            category.name AS categoryName,
            publisher.name AS publisherName,
            author.name AS authorName
            FROM book
            LEFT JOIN category ON category.id = book.id_category
            LEFT JOIN publisher ON publisher.id = book.id_publisher
            LEFT JOIN book_author ON book_author.id_book = book.id
            LEFT JOIN author ON author.id = book_author.id_author");

        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $key => $item) {
                $books[$key] = [
                    'id' => $item['id'],
                    'isbn' => $item['isbn'],
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'language' => $item['language'],
                    'numberOfPage' => $item['numberOfPage'],
                    'category' => [
                        'id' => $item['id_category'],
                        'name' => $item['categoryName']
                    ],
                    'publisher' => [
                        'id' => $item['id_publisher'],
                        'name' => $item['publisherName']
                    ],
                    'author' => [
                        'name' => $item['authorName']
                    ]
                ];
            }
        }
        return $books;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT book.*, 
            category.name AS categoryName,
            publisher.name AS publisherName,
            author.name AS authorName
            FROM book
            LEFT JOIN category ON category.id = book.id_category
            LEFT JOIN publisher ON publisher.id = book.id_publisher
            LEFT JOIN book_author ON book_author.id_book = book.id
            LEFT JOIN author ON author.id = book_author.id_author
            WHERE book.id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $books = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($books) {
                return [
                    'id' => $books['id'],
                    'isbn' => $books['isbn'],
                    'title' => $books['title'],
                    'description' => $books['description'],
                    'language' => $books['language'],
                    'numberOfPage' => $books['numberOfPage'],
                    'category' => [
                        'id' => $books['id_category'],
                        'name' => $books['categoryName']
                    ],
                    'publisher' => [
                        'id' => $books['id_publisher'],
                        'name' => $books['publisherName']
                    ],
                    'author' => [
                        'name' => $books['authorName']
                    ]
                ];
            }
        }
        return null;
    }

    public function show(): array
    {
        return [];
    }
}