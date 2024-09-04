<?php

class Author
{
    public $name;
    public $description;

    public function __construct($name, $description) 
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function show($type) : array 
    {
        if ($type === 'name') 
        {
            return ['name' => $this->name];
        } 
        
        elseif ($type === 'description') 
        {
            return ['description' => $this->description];
        } 
        
        else 
        {
            return [];
        }
    }
}

class Book
{
    public $ISBN;
    public $title;
    public $description;
    public $category;
    public $language;
    public $numberOfPage;
    public $author;
    public $publisher;

    public function __construct($ISBN, $title, $description, $category, $language, $numberOfPage, $author, $publisher) 
    {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->language = $language;
        $this->numberOfPage = $numberOfPage;
        $this->author = $author;
        $this->publisher = $publisher;
    }

    public function showAll() : array 
    {
        return [
            'ISBN' => $this->ISBN,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'language' => $this->language,
            'numberOfPage' => $this->numberOfPage,
            'author' => $this->author,
            'publisher' => $this->publisher
        ];
    }

    public function detail($ISBN) : array 
    {
        if ($this->ISBN == $ISBN) 
        {
            return $this->showAll();
        } 
        else 
        {
            return ['error' => 'Buku tidak ditemukan'];
        }
    }
}

class Publisher
{
    private $name;
    private $address;
    private $phone;

    public function __construct($name, $address, $phone) 
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function setPhone($phone) 
    {
        $this->phone = $phone;
    }

    public function getPhone() : string 
    {
        return $this->phone;
    }
}

$author1 = new Author('Tereliye', 'Penulis asal Indonesia, dikenal karena kemampuannya dalam mengeksplorasi tema-tema kehidupan, cinta, perjalanan manusia, serta jiwa kritik yang kuat terhadap pemerintahan Indonesia.');
$book1 = new Book(9786238882205, 'Teruslah Bodoh Jangan Pintar', 'Menyajikan pandangan mendalam tentang pentingnya kesederhanaan dan kejujuran dalam menjalani hidup, serta bagaimana kita sering kali kehilangan makna sebenarnya di balik pencapaian dan ambisi yang tidak perlu.', 'Filosofi, Fantasy', 'Indonesia', 371, 'Tereliye', 'Sabak Grip');
$publisher1 = new Publisher('Sabak Grip', 'Depok, Jawa Barat', '6282298146308');

$author2 = new Author('Ben Bland', 'Penulis asal Inggris, dikenal dengan kemampuannya dalam menyajikan analisis tajam dan penulisan yang informatif mengenai politik dan budaya kontemporer, serta kemahirannya dalam mengungkap kompleksitas isu-isu global dengan cara yang menarik.');
$book2 = new Book(9781760145217, 'Man of Contradictions: A Lowy Institute Paper: Penguin Special: Joko Widodo and the struggle to remake Indonesia', 'The first English-language biography of Jokowi, argues that the president embodies the fundamental contradictions of modern Indonesia.', 'Politics', 'English', 192, 'Ben Bland', 'Penguin eBooks');
$publisher2 = new Publisher('Penguin eBooks', 'United Kingdom', '18007333000');

$author3 = new Author('Afrasiab', 'Penulis asal Pakistan, dikenal dengan bukunya yang menceritakan laki-laki terbaik di dunia dalam sejarah yaitu nabi Muhammad SAW.');
$book3 = new Book(9789699837043, 'The Greatest Man In History Is Muhammad Peace Be Upon Him', 'Sebuah buku yang mengupas kehidupan Nabi Muhammad SAW, menyoroti pengaruh dan prestasinya sebagai figur sejarah yang luar biasa dan teladan dalam berbagai aspek kehidupan.', 'History', 'English', 641, 'Afrasiab', 'Jellyman New Zealand Paperback');
$publisher3 = new Publisher('Jellyman New Zealand Paperback', 'New Zealand', '15005237000');

print_r($book1->detail(9786238882205));
echo "\n";
print_r($book2->detail(9781760145217));
echo "\n";
print_r($book3->detail(9789699837043));

echo "Publisher phone: {$publisher1->getPhone()}\n";
?>
