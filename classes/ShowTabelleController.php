<?php

class showTabelleController
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
        $this->setView();
        //$this->view = $view;
        $view = $this->view;
    }

    public function tuwas() : array
    {
        $view = 'tabelle';
        if ($this->area === 'mitarbeiter') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'auto') {
            $cars = (new Auto())->getAllAsObjects();
            return $cars;
        }
    }
    public function setView():void
    {
        $this->view = 'tabelle';
    }


}