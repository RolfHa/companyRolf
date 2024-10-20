<?php

class DeleteController
{
    private string $area;
    private string $view;
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $view = 'table';
    }
    public function invoke(int $id) : array
    {
        if ($this->area === 'employee'){
            (new Employee())->deleteObjectById($id);
        }elseif ($this->area === 'car'){
            (new Car())->deleteObjectById($id);
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