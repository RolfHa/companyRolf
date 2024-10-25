<?php

class updateController
{
    private string $area;
    private string $view;
   

    public function __construct(string $area)
    {
        $this->area = $area;
        $view = 'table';

    }
    public function invoke($getData, $postData):array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            (new Employee( $postData['id'] ,$postData['firstName'], $postData['lastName'],
                $postData['gender'], $postData['salary']))->update();
        } elseif ($this->area === 'car'){
            (new Car($postData['id'], $postData['numberPlate'], $postData['maker'],
                $postData['type']))->update();
        } elseif ($this->area === 'rental'){
            (new Rental($postData['id'], $postData['employeeId'], $postData['carId'],
                $postData['startDate'], $postData['endDate']))->update();
        }

        $array = [];
        if ($this->area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $array = (new Car())->getAllAsObjects();
        }
        elseif ($this->area === 'rental') {
            $array = (new Rental())->getAllAsObjects();
        }
        return $array;
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function getView(): string
    {
        return $this->view;
    }

}