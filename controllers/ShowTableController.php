<?php

class showTableController implements IController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area)
    {
        $this->area = $area;
        $this->view = 'table';
    }

    public function invoke(array $getData, array $postData) : array
    {
        if ($this->area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $array = (new Car())->getAllAsObjects();
        } elseif ($this->area === 'rental') {
            $array = (new Rental())->getAllAsObjects();
            // workaround, set Objects wird im Konstrutor von Rental nicht bedient ??
            foreach ($array as $r){
                $r->setObjects();
            }
        }
        return  $array;

    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function getView(): string
    {
        return $this->view;
    }

}