<?php
namespace app\companyadmin\controller;

class Demand extends Common
{

    public function demandList()
    {
        return $this->fetch();
    }
}