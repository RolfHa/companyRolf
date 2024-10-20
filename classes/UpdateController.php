<?php

class updateController
{
    private string $area;
    private string $view;
    private array $postData;

    public function __construct(string $area, string &$view, )
    {
        $this->area = $area;
        $view = 'table';
    }
    public function tuwas(array $postData):array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            (new Employee( $postData['id'] ,$postData['firstName'], $postData['lastName'],
                $postData['gender'], $postData['salary']))->update();
        } elseif ($this->area === 'car'){
            (new Car($postData['id'], $postData['numberPlate'], $postData['maker'],
                $postData['type']))->update();
        }

        $array = [];
        if ($this->area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $array = (new Car())->getAllAsObjects();
        }
        return $array;
    }
}