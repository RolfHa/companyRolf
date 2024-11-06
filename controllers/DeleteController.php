<?php

class DeleteController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';

    }

    public function invoke($getData, $postData): array
    {
        try {
            if ($this->area === 'employee') {
                (new Employee())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'car') {
                (new Car())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'rental') {
                (new Rental())->deleteObjectById($getData['id']);
            }

        } catch(PDOException $e){
            // bei Verstoß gegen FK-Constraint
            if (substr($e->getMessage(),0,15) === 'SQLSTATE[23000]') {
                //$message = 'FK-CONSTRAINT';
            }

        } catch (Exception $e) {

            throw new Exception($e);
        }
        return TableHelper::getAllObjectsByArea($this->area);
    }
}