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
        $this->view = 'tabelle';
//        if ($this->area === 'mitarbeiter') {
//            $employees = (new Employee())->getAllAsObjects();
//            return $employees;
//        } elseif ($this->area === 'auto') {
//            $cars = (new Auto())->getAllAsObjects();
//            return $cars;
//        }
        if ($this->area === 'mitarbeiter'){
            (new Employee())->deleteObjectById($this->id);
        }elseif ($this->area === 'auto'){
            (new Auto())->deleteObjectById($this->id);
        }
        if ($this->area === 'mitarbeiter') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'auto') {
            $cars = (new Auto())->getAllAsObjects();
            return $cars;
        }

        return [];
    }
}