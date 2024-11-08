<?php

class ShowEditController extends BaseController
{
    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'edit';
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
            if (isset($getData['id'])) {
                if ($this->area === 'employee') {
                    $array = (new Employee())->getObjectById($getData['id']);
                } elseif ($this->area === 'car') {
                    $array = (new Car())->getObjectById($getData['id']);
                } elseif ($this->area === 'rental') {
                    $array = (new Rental())->getObjectById($getData['id']);
                }
                $r = new Response([$array]);
                $r->setAction('update');
                return $r;

            }
            $r = new Response([]);
            $r->setAction('insert');
            return $r;
        } catch (Error $e) {
            throw new Exception($e);
        }
    }

}