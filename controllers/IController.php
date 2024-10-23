<?php

interface IController
{
    public function getView(): string;

    public function getArea(): string;
}