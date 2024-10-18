<?php

class Employee implements IBasic
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
     * @return Employee[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee');
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM employee WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function insert(string $firstName,
                           string $lastName,
                           string $gender,
                           float  $salary): Employee
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO employee VALUES(NULL,?,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $gender, $salary]);
        $id = $pdo->lastInsertId();
        return new Employee($id, $firstName, $lastName, $gender, $salary);
    }

    public function getObjectById(int $id): Employee
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject('Employee');
    }

    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE employee SET firstName=?, lastName=?, gender=?, salary=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->firstName, $this->lastName, $this->gender, $this->salary, $this->id]);
    }
}