<?php

class Mitarbeiter implements IBasic
{
    /**
     * @var int|null
     */
    private int|null $id;
    /**
     * @var string|null
     */
    private string|null $firstName;
    /**
     * @var string|null
     */
    private string|null $lastName;

    /**
     * @var string|null
     */
    private string|null $gender;
    /**
     * @var float|null
     */
    private float|null $salary;

    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $gender
     * @param float|null $salary
     */
    public function __construct(int $id = null, string $firstName = null, string $lastName = null, string $gender = null, float $salary = null)
    {
        //if ($id !== null || $gender !== null || $salary !== null) {
        if ($id !== null) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->gender = $gender;
            $this->salary = $salary;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return Mitarbeiter[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $mitarbeiter = $stmt->fetchAll(PDO::FETCH_CLASS, 'Mitarbeiter');
        return $mitarbeiter;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM mitarbeiter WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(string $firstName,
                           string $lastName,
                           string $gender,
                           float  $salary): Mitarbeiter
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO mitarbeiter VALUES(NULL,?,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $gender, $salary]);
        $id = $pdo->lastInsertId();
        return new Mitarbeiter($id, $firstName, $lastName, $gender, $salary);
    }

    public function getObjectById(int $id): Mitarbeiter
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $mitarbeiter = $stmt->fetchObject('Mitarbeiter');
        return $mitarbeiter;
    }

    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE mitarbeiter SET firstName=?, lastName=?, gender=?, salary=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->firstName, $this->lastName, $this->gender, $this->salary, $this->id]);
    }
}