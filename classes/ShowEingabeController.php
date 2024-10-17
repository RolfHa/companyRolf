<?php

class ShowEingabeController
{
    private string $area;
    private string $view;
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $this->tuwas();
        $view = $this->view;
    }
    public function tuwas() : array
    {
        $this->view = 'eingabe';
//        if ($this->area === 'mitarbeiter') {
//            $employees = (new Employee())->getAllAsObjects();
//            return $employees;
//        } elseif ($this->area === 'auto') {
//            $cars = (new Auto())->getAllAsObjects();
//            return $cars;
//        }
        return [];
    }


}