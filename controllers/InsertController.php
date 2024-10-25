<?php

class InsertController implements IController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area)
    {
        $this->area = $area;
        $this->view = 'table';
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function invoke($getData, $postData):array
    {
//        if ($this->area == 'employee' && count($postData) > 0) {
//            (new Employee)->enterObject($delivery['firstname'], $delivery['surename'], $delivery['gender'], $delivery['salary']);
//            return ['arrayType' => 'employees', 'data' => (new Employee)->getAllAsObjects()];
//        } elseif ($this->area == 'car' && !empty($delivery)) {
//            (new Car)->enterObject($delivery['producer'], $delivery['type'], $delivery['licensePlate']);
//            return ['arrayType' => 'cars', 'data' => (new Car)->getAllAsObjects()];
//        } elseif ($this->area == 'employee' && empty($delivery)) {
//            return ['arrayType' => 'employees', 'data' => (new Employee)->getAllAsObjects()];
//        } elseif ($this->area == 'car' && empty($delivery)) {
//            return ['arrayType' => 'cars', 'data' => (new Car)->getAllAsObjects()];
//        }
//        return [];

        if ($this->area === 'employee'){
            $postData = (new FilterData($postData)) -> filter(); //echo 'nachher ';print_r($postData); echo '</pre>';
            $object = (new Employee())->insert($postData['firstName'], $postData['lastName'],
                $postData['gender'], $postData['salary'], );
        } elseif ($this->area === 'car'){
            $object = (new Car())->insert($postData['numberPlate'], $postData['maker'],
                $postData['type']);
        } elseif ($this->area === 'rental'){
            $object = (new Rental())->insert($postData['carId'], $postData['employeeId'],
                $postData['startDate'], $postData['endDate']);
        }
        $array = [];
        if ($this->area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $array = (new Car())->getAllAsObjects();
        }  elseif ($this->area === 'rental') {
            $array = (new Rental())->getAllAsObjects();
        }
        return $array;
        return [];
    }

}