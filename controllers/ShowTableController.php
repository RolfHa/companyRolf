<?php

class showTableController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    public function invoke(array $getData, array $postData) : array
    {
        return TableHelper::getAllObjectsByArea($this->area);
    }

}