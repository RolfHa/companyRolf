<?php

class updateController
{
    private string $area;
    private string $view;
    private array $postData;

    public function __construct(string $area, string &$view, array $postData)
    {
        $this->area = $area;
        $this->postData = $postData;
        //$this->tuwas();
        //$view = $this->view;
        $view = 'table';
    }
    public function tuwas():array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            (new Employee( $this->postData['id'] ,$this->postData['firstName'], $this->postData['lastName'],
                $this->postData['gender'], $this->postData['salary']))->update();
        } elseif ($this->area === 'car'){
            (new Car($this->postData['id'], $this->postData['numberPlate'], $this->postData['maker'],
                $this->postData['type']))->update();
        }
        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        }
    }
}