<?php

class DeleteController
{
    private string $area;
    private string $view;
    private int $id;
    public function __construct(string $area, string &$view, int $id)
    {
        $this->area = $area;
        $this->id = $id;
        $this->tuwas();
        $view = $this->view;

    }
    public function tuwas() : array
    {
        $this->view = 'table';
//        if ($this->area === 'employee') {
//            $employees = (new Employee())->getAllAsObjects();
//            return $employees;
//        } elseif ($this->area === 'auto') {
//            $cars = (new Car())->getAllAsObjects();
//            return $cars;
//        }
        if ($this->area === 'employee'){
            (new Employee())->deleteObjectById($this->id);
        }elseif ($this->area === 'car'){
            (new Car())->deleteObjectById($this->id);
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