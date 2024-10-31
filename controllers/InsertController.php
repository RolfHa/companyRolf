<?php

class InsertController extends BaseController
{
    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    public function invoke($getData, $postData):array
    {
        if ($this->area === 'employee'){
            $postData = (new FilterData($postData)) -> filter();
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
            // workaround, set Objects wird im Konstruktor von Rental nicht bedient ??
            foreach ($array as $r){
                $r->setObjects();
            }
        }
        return $array;
    }

}