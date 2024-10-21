<?php

class InsertController
{
    private string $area;
    private string $view;
    private array $requestData;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area, string &$view, array $requestData = null)
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
            $object = (new Employee())->insert($this->requestData['firstName'], $this->requestData['lastName'],
                $this->requestData['gender'], $this->requestData['salary']);
        } elseif ($this->area === 'car'){
            $object = (new Car())->insert($this->requestData['numberPlate'], $this->requestData['maker'],
                $this->requestData['type']);
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