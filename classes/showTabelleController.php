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
        $this->view = $view;
    }

    public function tuwas() : array
    {
        $view = 'tabelle';
        if ($this->area === 'mitarbeiter') {
            $ms = (new Mitarbeiter())->getAllAsObjects();
            return $ms;
        } elseif ($this->area === 'auto') {
            $cars = (new Auto())->getAllAsObjects();
            return $cars;
        }
    }


}