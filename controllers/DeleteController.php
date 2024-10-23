<?php

class DeleteController implements IController
{

    private string $area;
    private string $view;

    public function getArea(): string
    {
        return $this->area;
    }

    public function getView(): string
    {
        return $this->view;
    }
    public function __construct(string $area)
    {
        $this->area = $area;
        $this->view = 'table';

    }
    public function invoke($getData, $postData) : array
    {
        if ($this->area === 'employee'){
            (new Employee())->deleteObjectById($getData['id']);
        }elseif ($this->area === 'car'){
            (new Car())->deleteObjectById($getData['id']);
        }
        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        }
        return [];
    }
}