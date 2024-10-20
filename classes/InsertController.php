<?php

class InsertController
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
        $view = 'table';
    }
    public function invoke(array $postData):array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            $object = (new Employee())->insert($postData['firstName'], $postData['lastName'],
                $postData['gender'], $postData['salary']);
        } elseif ($this->area === 'car'){
            $object = (new Car())->insert($postData['numberPlate'], $postData['maker'],
                $postData['type']);
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