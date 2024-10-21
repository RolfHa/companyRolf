<?php

class ShowEditController
{
    /**
     * @var string
     */
    private string $area;
    /**
     * @var string
     */
    private string $view;
    /**
     * @var ?int
     */
    private int $id;

    public function __construct(string $area, string &$view, int $id = null)
    {
        $this->area = $area;
        $view = 'edit';
        if (isset($id)) {
            $this->id = $id;
        }
    }

    public function invoke(): array
    {
        if (isset($this->id)) {
            if ($this->area === 'employee') {
                return [(new Employee())->getObjectById($this->id)];
            } elseif ($this->area === 'car') {
                return [(new Car())->getObjectById($this->id)];
            }
        }
        return [];
    }
}