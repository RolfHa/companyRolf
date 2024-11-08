<?php

class DeleteController extends BaseController
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
            $message = ''; // Info an user
            if ($this->area === 'employee') {
                (new Employee())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'car') {
                (new Car())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'rental') {
                (new Rental())->deleteObjectById($getData['id']);
            }

        } catch (PDOException $e) {
            // bei Verstoß gegen FK-Constraint
            if (substr($e->getMessage(), 0, 15) === 'SQLSTATE[23000]') {
                $message = 'Ich kann keinen ' . $this->area . ' löschen, der noch in der Tabelle Ausleihe steht.';
            }

        } catch (Exception $e) {

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