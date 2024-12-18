<?php

class TableHelper
{
    /**
     * @param string $area
     * @return array
     */
    public static function getAllObjectsByArea(string $area):array
    {
        $array = [];
        if ($area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($area === 'car') {
            $array = (new Car())->getAllAsObjects();
        } elseif ($area === 'rental') {
            $array = (new Rental())->getAllAsObjects();
        }
        return $array;
    }
}