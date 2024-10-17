<?php

interface IBasic
{
    public function getObjectById(int $id);
    public function getAllAsObjects();
    public  function deleteObjectById(int $id);

}