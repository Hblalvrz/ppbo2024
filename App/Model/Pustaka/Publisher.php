<?php


namespace App\Model\Pustaka;


use App\Model\Model;


class Publisher extends Model
{
    public int $id;
    public string $name;
    public string $phone;
    public string $address;


    public function save()
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO Publisher (id, name, phone, address) VALUES (:id, :name, :phone, :address)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }

    public static function all(): array
    {
        $publisher = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT * FROM publisher");
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $key => $item) {
                $publisher[$key] = new Publisher();
                $publisher[$key]->id = $item['id'];
                $publisher[$key]->name = $item['name'];
                $publisher[$key]->phone = $item['phone'];
                $publisher[$key]->address = $item['address'];


            }
        } else {
            $publisher = null;
        }
        return $publisher;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM publisher WHERE id= {$id}");
        if ($stmt->execute()) {
            $publisher = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->id = $publisher['id'];
            $this->name = $publisher['name'];
            $this->phone = $publisher['phone'];
            $this->address = $publisher['address'];
        } else {
            $publisher = null;
        }
    }




    public function show(): array
    {
        return [];
    }
}