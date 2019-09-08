<?php

namespace app\models;


class InstallItemGoodView
{
    public $good;
    public $quantity;

    public function __construct(Good $g, $q)
    {
        $this->good = $g;
        $this->quantity = $q;
    }
}