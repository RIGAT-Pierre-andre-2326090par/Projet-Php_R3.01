<?php

namespace blog\models;

class Repas
{
    public function __construct(private $id_rp, private $dates, private $id_cl){}

    public function show()
    {

    }
}