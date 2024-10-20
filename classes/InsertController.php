<?php

class InsertController
{
    private string $area;
    private string $view;
    private array $postData;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area, string &$view, array $postData)
    {
        $this->area = $area;
        $this->postData = $postData;
        $view = 'table';
    }
    public function tuwas():array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            $object = (new Employee())->insert($this->postData['firstName'], $this->postData['lastName'],
                $this->postData['gender'], $this->postData['salary']);
        } elseif ($this->area === 'car'){
            $object = (new Car())->insert($this->postData['numberPlate'], $this->postData['maker'],
                $this->postData['type']);
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