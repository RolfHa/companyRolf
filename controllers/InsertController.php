<?php

class InsertController extends BaseController
{
    /**
     * @param string $area
     */
    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    /**
     * @param $getData
     * @param $postData
     * @return Response
     * @throws Exception
     */
    public function invoke($getData, $postData): Response
    {
        try {
            if ($this->area === 'employee') {
                $postData = (new FilterData($postData))->filter();
                $object = (new Employee())->insert($postData['firstName'], $postData['lastName'],
                    $postData['gender'], $postData['salary']);
            } elseif ($this->area === 'car') {
                $object = (new Car())->insert($postData['numberPlate'], $postData['maker'],
                    $postData['type']);
            } elseif ($this->area === 'rental') {
                $object = (new Rental())->insert($postData['employeeId'], $postData['carId'],
                    $postData['startDate'], $postData['endDate']);
            }
        } catch (Error $e) {
            throw new Exception($e);
        }
        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        return new Response($array);
    }

}