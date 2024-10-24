<?php


class Car implements IBasic
{
    private int|null $id;
    private string|null $numberPlate;
    private string|null $maker;
    private string|null $type;

    /**
     * @param int|null $id
     * @param string|null $numberPlate
     * @param string|null $maker
     * @param string|null $type
     */
    public function __construct(?int $id = null, ?string $numberPlate = null, ?string $maker = null, ?string $type = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->numberPlate = $numberPlate;
            $this->maker = $maker;
            $this->type = $type;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberPlate(): ?string
    {
        return $this->numberPlate;
    }

    public function getMaker(): ?string
    {
        return $this->maker;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_CLASS, 'Car');
        return $cars;
    }

    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM car WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(string $numberPlate,
                           string $maker,
                           string $type): Car
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO car VALUES(NULL,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$numberPlate, $maker, $type]);
        $id = $pdo->lastInsertId();
        return new Car($id, $numberPlate, $maker, $type);
    }

    public function getObjectById(int $id): Car
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $c = $stmt->fetchObject('Car');
        return $c;
    }

    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE car SET numberPlate=?, maker=?, type=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->numberPlate, $this->maker, $this->type, $this->id]);
    }

    public function getPulldown()
    {
        $cars = $this->getAllAsObjects();
        $html = '<select name="carId">';
        foreach ($cars as $c){
            $html .= '<option value="'. $c->getId() . '">' .  $c->getNumberPlate() . '</option>';
        }
        $html .= '</select>';

        return $html;
    }
}