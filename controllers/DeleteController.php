<?php

class DeleteController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';

    }
    public function invoke($getData, $postData) : array
    {
        if ($this->area === 'employee'){
            (new Employee())->deleteObjectById($getData['id']);
        } elseif ($this->area === 'car'){
            (new Car())->deleteObjectById($getData['id']);
        } elseif ($this->area === 'rental'){
            (new Rental())->deleteObjectById($getData['id']);
        }
        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        } elseif ($this->area === 'rental') {
            $rentals = (new Rental())->getAllAsObjects();
            // workaround, set Objects wird im Konstruktor von Rental nicht bedient ??
            foreach ($rentals as $r){
                $r->setObjects();
            }
            return $rentals;
        }
        return [];
    }
}