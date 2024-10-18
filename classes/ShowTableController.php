<?php

class showTableController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $this->setView();
        $view = $this->view;
    }

    public function tuwas() : array
    {

        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        }

    }
    public function setView():void
    {
        $this->view = 'table';
    }


}