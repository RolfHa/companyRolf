<?php

class showTableController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    /**
     * @param array $getData
     * @param array $postData
     * @return Response
     * @throws Exception
     */
    public function invoke(array $getData, array $postData): Response
    {
        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        return new Response($array);
    }

}