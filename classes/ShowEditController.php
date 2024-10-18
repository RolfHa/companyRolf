<?php

class ShowEditController
{
    private string $area;
    private string $view;

    public function __construct(string $area, string &$view, int $id = null)
    {
        $this->area = $area;
        $this->id = $id;
        $this->tuwas();
        $view = $this->view;
    }

    public function tuwas(): array
    {
        $this->view = 'edit';
        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'auto') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
//        }
            if ($this->area === 'employee') {
                return [(new Employee())->getObjectById($this->id)];
            } elseif ($this->area === 'car') {
                return [(new Car())->getObjectById($this->id)];
            } else {
                return [];


            }
        }

    }
}