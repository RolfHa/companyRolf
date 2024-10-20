<?php

class ShowEditController
{
    private string $area;
    private string $view;

    public function __construct(string $area, string &$view, int $id = null)
    {
        $this->area = $area;
        $view = 'edit';
    }

    public function invoke($id = null): array
    {
        if (isset($id)) {
            if ($this->area === 'employee') {
                return [(new Employee())->getObjectById($id)];
            } elseif ($this->area === 'car') {
                return [(new Car())->getObjectById($id)];
            }
        }
        return [];
    }
}