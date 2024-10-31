<?php

class ShowEditController extends BaseController
{
    /**
     * @var ?int
     */
    private int $id;

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'edit';
    }

    public function invoke($getData, $postData): array
    {
        if (isset($getData['id'])) {
            if ($this->area === 'employee') {
                $array = (new Employee())->getObjectById($getData['id']);
            } elseif ($this->area === 'car') {
                $array = (new Car())->getObjectById($getData['id']);
            } elseif ($this->area === 'rental') {
                $array = (new Rental())->getObjectById($getData['id']);
            }
            return ['action' => 'update', 'array' => $array];
        }
        return ['action' => 'insert',[] ];
    }

    public function getId(): int
    {
        return $this->id;
    }

}