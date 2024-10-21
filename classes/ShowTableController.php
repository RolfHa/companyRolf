<?php

class showTableController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area, string &$view, array $requestData = null)
    {
        $this->area = $area;
        $view = 'table';
    }

    public function invoke() : array
    {

        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        }

    }

}