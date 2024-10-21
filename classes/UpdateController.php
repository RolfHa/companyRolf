<?php

class updateController
{
    private string $area;
    private string $view;
    private array $requestData;

    public function __construct(string $area, string &$view, $requestData = null )
    {
        $this->area = $area;
        $view = 'table';
        if (isset($requestData)){
            $this->requestData = $requestData;
        }
    }
    public function invoke():array
    {
        $this->view = 'table';
        if ($this->area === 'employee'){
            (new Employee( $this->requestData['id'] ,$this->requestData['firstName'], $this->requestData['lastName'],
                $this->requestData['gender'], $this->requestData['salary']))->update();
        } elseif ($this->area === 'car'){
            (new Car($this->requestData['id'], $this->requestData['numberPlate'], $this->requestData['maker'],
                $this->requestData['type']))->update();
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