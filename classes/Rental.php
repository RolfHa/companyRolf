<?php

class Rental implements IBasic
{

    private int $id;
    private int $employeeId;
    private int $carId;
    /**
     * @var string
     * soll später in ein date-Objekt überführt werden
     */
    private string $startDate;
    /**
     * @var ?string $endDate ;
     */
    private string $endDate;

    /**
     * @param ?int $id
     * @param ?int $employeeId
     * @param ?int $carId
     * @param ?string $startDate
     * @param ?string|null $endDate
     */
    public function __construct(?int $id = null, ?int $employeeId = null, ?int $carId = null, ?string $startDate = null, ?string $endDate = null)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->employeeId = $employeeId;
            $this->carId = $carId;
            // HTML datetime-local enthält ein 'T' als Trenner zwischen Tag und Uhrzeit
            $this->startDate = str_replace('T', ' ', $startDate);
            $this->endDate = str_replace('T', ' ', $endDate);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    public function getCarId(): int
    {
        return $this->carId;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param int $id
     * @return ?Rental
     */
    public function getObjectById(int $id): Rental
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM rental WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $r = $stmt->fetchObject('Rental');
        return $r;
    }

    /**
     * @return Rental[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM rental';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rentals = $stmt->fetchAll(PDO::FETCH_CLASS, 'Rental');
        return $rentals;
    }

    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM rental WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getName(): string
    {
        return (new Employee())->getObjectById($this->employeeId)->getName();
    }

    public function getNumberPlate(): string
    {
        return (new Car())->getObjectById($this->carId)->getNumberPlate();
    }

    public function getEmployeePulldown(): string
    {
        if (isset($this->id)) {
            return (new Employee())->getPulldownMenu($this);
        } else {
            return (new Employee())->getPulldownMenu();
        }
    }

    public function getCarPulldown(): string
    {
        if (isset($this->id)) {
            return (new Car())->getPulldownMenu($this);
        } else {
            return (new Car())->getPulldownMenu();
        }
    }
    public function insert(string $employeeId,
                           string $carId,
                           string $startDate,
                           string $endDate): Rental
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO rental VALUES(NULL,?,?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$employeeId, $carId, $startDate, $endDate]);
        $id = $pdo->lastInsertId();
        return new Rental($id, $employeeId, $carId, $startDate, $endDate);
    }
    /**
     * @return void
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE rental SET employeeId=?, carId=?, startDate=?, endDate=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->employeeId, $this->carId, $this->startDate, $this->endDate, $this->id]);
    }
}