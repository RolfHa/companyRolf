<?php

class ShowEditController implements IController
{
    /**
     * @var string
     */
    private string $area;
    /**
     * @var string
     */
    private string $view;
    /**
     * @var ?int
     */
    private int $id;

    public function __construct(string $area)
    {
        $this->area = $area;
        $this->view = 'edit';
//        if (isset($id)) {
//            $this->id = $id;
//        }
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

    public function getArea(): string
    {
        return $this->area;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function getId(): int
    {
        return $this->id;
    }

}